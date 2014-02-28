<?php

/**
 * 微信公共平台的私有接口
 * 思路: 模拟登录, 再去调用私有web api
 *
 * 功能: 发送信息, 批量发送(未测试), 得到用户信息, 得到最近信息, 解析用户信息(fakeId)
 *
 * @author life lifephp@gmail.com https://github.com/reqlife/WeiXin-Private-API
 *
 * 参考了gitHub微信的api: https://github.com/zscorpio/weChat, 在此基础上作了修改和完善
 *    (该接口经测试不能用, 因为webToken的问题, 还有cookie生成的问题, 本接口已修复这些问题)
 */
class WeiXinClient
{
    private $token; // 公共平台申请时填写的token
    private $account;
    private $password;

// 每次登录后将cookie, webToken缓存起来, 调用其它api时直接使用
// 注: webToken与token不一样, webToken是指每次登录后动态生成的token, 供难证用户是否登录而用
    private $cookiePath; // 保存cookie的文件路径
    private $webTokenPath; // 保存webToken的文路径

// 缓存的值
    private $webToken; // 登录后每个链接后都要加token
    private $cookie;
    private $wxid;
    private $wxname;
    private $nkname;
    private $wxfakeid;
    private $setdata;
    private $jsdata;
    private $contactdata;


    private $req;

// 构造函数
    public function __construct($data)
    {
        if (!$data) {
            exit("error");
        }

// 配置初始化
        $this->account = $data['account'];
        $this->password = $data['password'];
        //$this->cookiePath = $data['temp_path'].'data/Conf/logs/Cache/cookie';
        //$this->webTokenPath = $data['temp_path'].'data/Conf/logs/Cache/webToken';

        $this->req = new WeiXinReq();
        $this->req->get("https://mp.weixin.qq.com");
        LOG::write("C|".$this->cookie,LOG::ERR);
        LOG::write("C|".$this->webToken,LOG::ERR);
// 读取cookie, webToken
        //$this->getCookieAndWebToken();
    }

// 登录, 并获取cookie, webToken

    /**
     * 模拟登录获取cookie和webToken
     */
    public function login()
    {
        $url = "https://mp.weixin.qq.com/cgi-bin/login?lang=zh_CN";
        $post['username'] = $this->account;
        $post['pwd'] = $this->password;
        $post['f'] = "json";
        $re = $this->req->submit($url, $post);
        // 保存cookie
        $this->cookie = $re['cookie'];
        //file_put_contents($this->cookiePath, $this->cookie);
        // 得到token
        $this->getWebToken($re['body']);
        LOG::write("LOGIN:".$this->cookie,LOG::ERR);
        LOG::write("LOGIN:".$this->webToken,LOG::ERR);
        if (!$this->webToken){
            return $re['body'];
        }else{
            return true;
        }
    }

    public function logout(){
        $url = "https://mp.weixin.qq.com/cgi-bin/logout?t=wxm-logout&lang=zh_CN&token=".$this->webToken;
        $this->req->get($url);
        $this->cookie   = "";
        $this->webToken = "";
    }

    public function checkLogin()
    {
        $url = "https://mp.weixin.qq.com/cgi-bin/login?lang=zh_CN";
        $post["username"] = $this->account;
        $post["pwd"] = $this->password;
        $post["f"] = "json";

        $re = $this->req->submit($url, $post);
        $result = json_decode($re['body'], 1);
        if ($result['Ret'] == '400'){
            return $result;
        }
        return true;
    }

    /*
     * 分析账号
     */
    public function getSetting()
    {
        if (!$this->setdata){
            $url = "https://mp.weixin.qq.com/cgi-bin/settingpage?t=setting/index&action=index&token={$this->webToken}&lang=zh_CN";
            $ret = $this->req->get($url,$this->cookie);
            $this->setdata = $ret['body'];
            preg_match_all('/window.wx ={(.*)};/iUs', $ret['body'], $arr);
            $this->jsdata = $arr[1][0];
        }

        return $this->setdata;
        //$preg = '/window.wx ={(.*)};/iUs';
        //preg_match_all($preg, $ret['body'], $arr);
        //return $arr[1][0];
        //return json_decode($arr[1][0], 1);
    }
    /*
     * 获取用户MSG DATA
     */
    public function getContact(){
        if (!$this->contactdata){
            $url = "https://mp.weixin.qq.com/cgi-bin/contactmanage?t=user/index&pagesize=10&pageidx=0&type=0&token={$this->webToken}&lang=zh_CN";
            $ret = $this->req->get($url,$this->cookie);
            preg_match('/wx.cgiData={(.*)};/iUs',$ret['body'],$arr);
            $this->contactdata = $arr[1];
        }
        return $this->contactdata;
    }

    /**
     * @return mixed
     * 获取用户的Fakeid
     */
    public function getFakeId(){
        if (!$this->setdata){$this->getSetting();}
        if (!$this->wxfakeid){
            preg_match('/uin:"(.*)"/', $this->jsdata, $uniarr);
            $this->wxfakeid = $uniarr[1];
        }
        return $this->wxfakeid;
    }

    /*
     *
     * 获取用户的wxname
     */
    public function getWxName(){
        if (!$this->setdata){$this->getSetting();}
        if (!$this->wxname){
            preg_match('/user_name:"(.*)"/',$this->jsdata,$wxnames);
            $this->wxname = $wxnames[1];
        }
        return $this->wxname;
    }

    /**
     * @return mixed
     * 获取用户昵称nickname
     */
    public function getNickName(){
        if (!$this->setdata){$this->getSetting();}
        if (!$this->nkname){
            preg_match('/"nickname">(\w*)<\/a>/i',$this->setdata,$nicknames);
            $this->nkname = $nicknames[1];
        }
        return $this->nkname;
    }
    /*
     * 获取用户的wxid，微信原始ID
     */
    public function getwxid()
    {
        if (!$this->wxid){
            preg_match('/slave_user=(.*);/iUs',$this->cookie,$arr);
            $this->wxid = $arr[1];
        }
        return $this->wxid;
    }

    /**
     * 登录后从结果中解析出webToken
     * @param  [String] $logonRet
     * @return [Boolen]
     */
    private function getWebToken($logonRet)
    {
        $logonRet = json_decode($logonRet, true);
        $msg = $logonRet["ErrMsg"]; // /cgi-bin/indexpage?t=wxm-index&lang=zh_CN&token=1455899896
        $msgArr = explode("&token=", $msg);
        if (count($msgArr) != 2) {
            return false;
        } else {
            $this->webToken = $msgArr[1];
            //file_put_contents($this->webTokenPath, $this->webToken);
            return true;
        }
    }

    /**
     * 从缓存中得到cookie和webToken
     * @return [type]
     */
    public function getCookieAndWebToken()
    {
            //$this->cookie = file_get_contents($this->cookiePath);
            //$this->webToken = file_get_contents($this->webTokenPath);

// 如果有缓存信息, 则验证下有没有过时, 此时只需要访问一个api即可判断
        if ($this->cookie && $this->webToken) {
            $url = "https://mp.weixin.qq.com/cgi-bin/getcontactinfo?t=ajax-getcontactinfo&lang=zh_CN&token={$this->webToken}&fakeid=";
            $re = $this->req->submit(@$url, array(), $this->cookie);
            $result = json_decode($re['body'], 1);

            if (!$result) {
                $this->login();
            }
        } else {
             $this->login();
        }
    }

// 其它API, 发送, 获取用户信息

    /**
     * 主动发消息
     * @param  string $id 用户的fakeid
     * @param  string $content 发送的内容
     * @return [type]          [description]
     */
    public function send($id, $content)
    {
        $post = array();
        $post['type'] = 1;
        $post['content'] = $content;
        $post['error'] = false;
        $post['tofakeid'] = $id;
        $post['token'] = $this->webToken;
        $post['ajax'] = 1;
        $url = "https://mp.weixin.qq.com/cgi-bin/singlesend?t=ajax-response&lang=zh_CN";
        $re = $this->req->submit($url, $post, $this->cookie);
        return json_decode($re['body']);
    }

    /**
     * 批量发送
     * @param  [array] $ids     用户的fakeid集合
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function batSend($ids, $content)
    {
        $result = array();
        foreach ($ids as $id) {
            $result[$id] = $this->send($id, $content);
        }
        return $result;
    }

    /**
     * 发送图片
     * @param  int $fakeId [description]
     * @param  int $fileId 图片ID
     * @return [type]         [description]
     */
    public function sendImage($fakeId, $fileId)
    {
        $post = array();
        $post['tofakeid'] = $fakeId;
        $post['type'] = 2;
        $post['fid'] = $post['fileId'] = $fileId; // 图片ID
        $post['error'] = false;
        $post['ajax'] = 1;
        $post['token'] = $this->webToken;

        $url = "https://mp.weixin.qq.com/cgi-bin/singlesend?t=ajax-response&lang=zh_CN";
        $re = $this->req->submit($url, $post, $this->cookie);

        return json_decode($re['body']);
    }

    /**
     * 获取用户的信息
     * @param  string $fakeId 用户的fakeId
     * @return [type]     [description]
     */
    public function getUserInfo($fakeId)
    {
        $url = "https://mp.weixin.qq.com/cgi-bin/getcontactinfo?t=ajax-getcontactinfo&lang=zh_CN&token={$this->webToken}&fakeid=$fakeId";
        $re = $this->req->submit($url, array(), $this->cookie);
        $result = json_decode($re['body'], 1);
        if (!$result) {
            $this->login();
        }
        return $result;
    }

    /*
     *
     * 获取用户头像
     */
    public function getUserFace($fakeId){
        $url = "https://mp.weixin.qq.com/cgi-bin/getheadimg?fakeid={$fakeId}&token={$this->webToken}&lang=zh_CN";
        $ret = $this->req->get($url,$this->cookie);
        return $ret['body'];
    }

    /*
    * 绑定微信号高级功能
    * url:http://www.weimob.com/api?t=fd5caedbcdf4fd69da6e08c252d4f825==R
    c    * allback_token:374100_a
    */
    public function bindUrlDev($devurl, $devtoken)
    {
        $url = "https://mp.weixin.qq.com/cgi-bin/callbackprofile?t=ajax-response&token={$this->webToken}&lang=zh_CN";
        $re = $this->req->submit($url, array('url' => $devurl, 'callback_token' => $devtoken), $this->cookie);
        $result = json_decode($re['body'], 1);
        if (!$result) {
            $this->login();
        }
        return $result;
    }

    /*
    得到最近发来的信息
    [0] => Array
    (
    [id] => 189
    [type] => 1
    [fileId] => 0
    [hasReply] => 0
    [fakeId] => 1477341521
    [nickName] => reqlife
    [remarkName] =>
    [dateTime] => 1374253963
    )
    [ok]
    */
    public function getLatestMsgs($page = 0)
    {
// frommsgid是最新一条的msgid
        $frommsgid = 100000000;
        $offset = 50 * $page;
        $url = "https://mp.weixin.qq.com/cgi-bin/message?t=message/list&action=&keyword=&count=100&day=7&token={$this->webToken}&lang=zh_CN";
        $re = $this->req->get($url, $this->cookie);

// echo $re['body'];
        //return $re['body'];
        $preg = '/"msg_item":(.*)}\).msg_item/iUs';
        //list : ({"msg_item":[{"id":200044548,"type":1,"fakeid":"2241001125","nick_name":"逆行的方舟","date_time":1392636845,"content":"首页","source":"","msg_status":4,"has_reply":0,"refuse_reason":""},{"id":200044334,"type":1,"fakeid":"1150920200","nick_name":"Eric.H","date_time":1392626894,"content":"首页","source":"","msg_status":4,"has_reply":1,"refuse_reason":""},{"id":200044322,"type":1,"fakeid":"1150920200","nick_name":"Eric.H","date_time":1392626636,"content":"首页","source":"","msg_status":4,"has_reply":0,"refuse_reason":""},{"id":200034420,"type":1,"fakeid":"2241001125","nick_name":"逆行的方舟","date_time":1392302008,"content":"Cheshire","source":"","msg_status":4,"has_reply":0,"refuse_reason":""}]}).msg_item,
        preg_match_all($preg, $re['body'], $arr);
// return $arr;
        return json_decode($arr[1][0], 1);
    }

// 解析用户信息
// 当有用户发送信息后, 如何得到用户的fakeId?
// 1. 从web上得到最近发送的信息
// 2. 将用户发送的信息与web上发送的信息进行对比, 如果内容和时间都正确, 那肯定是该用户
// 		实践发现, 时间可能会不对, 相隔1-2s或10多秒也有可能, 此时如果内容相同就断定是该用户
// 		如果用户在时间相隔很短的情况况下输入同样的内容很可能会出错, 此时可以这样解决: 提示用户输入一些随机数.

    /**
     * 通过时间 和 内容 双重判断用户
     * @param  [type] $createTime
     * @param  [type] $content
     * @return [type]
     */
    public function getLatestMsgByCreateTimeAndContent($createTime, $content)
    {
        $lMsgs = $this->getLatestMsgs(0);

// 最先的数据在前面

        $contentMatchedMsg = array();
        foreach ($lMsgs as $msg) {
// 仅仅时间符合
            if ($msg['dateTime'] == $createTime) {
// 内容+时间都符合
                if ($msg['content'] == $content) {
                    return $msg;
                }

// 仅仅是内容符合
            } else if ($msg['content'] == $content) {
                $contentMatchedMsg[] = $msg;
            }
        }

// 最后, 没有匹配到的数据, 内容符合, 而时间不符
// 返回最新的一条
        if ($contentMatchedMsg) {
            return $contentMatchedMsg[0];
        }

        return false;
    }
}