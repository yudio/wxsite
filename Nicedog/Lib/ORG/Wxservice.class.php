<?php
class WxService
{
    private $data = array();
    private $repxml = null;
    private $appaccess = "";
    private $apptime = 0;

    public function __construct($apidata)
    {
        //$this->auth($token) || die;

            // dump($api);die;
            $url_get='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$apidata['appid'].'&secret='.$apidata['appsecret'];
            $json = "";
            if (!isset($apidata['appaccess'])||(time()-intval($apidata['updatetime'])>7200)){
                $json=json_decode($this->curlGet($url_get));
                if ($json->access_token){
                    $this->appaccess   = $json->access_token;
                    $this->apptime     = time();
                }else{
                    Log::write('WxService请求ACCESS_TOKEN错误'.$json,Log::ERR);
                    $this->error('WxService请求ACCESS_TOKEN错误'.$json);exit;
                }
            }else{
                $this->appaccess = $apidata['appaccess'];
                $this->apptime   = $apidata['updatetime'];
            }
    }
    //高级接口
    //自定义菜单
    public function menu_update($data){
        file_get_contents('https://api.weixin.qq.com/cgi-bin/menu/delete?access_token='.$this->appaccess);
        $url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->appaccess;
        return $this->curlPost($url,$data);
    }
    public function menu_get(){
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token='.$this->appaccess;
        return json_decode($this->curlGet($url));
    }
    //用户管理
    public function user_get($openid=''){
        $url='https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$this->appaccess.'&next_openid='.$openid;
        return json_decode($this->curlGet($url));
    }
    public function user_info($openid){
        $url='https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->appaccess.'&openid='.$openid;
        return json_decode($this->curlGet($url));
    }
    //分组
    public function group_get(){
        $url='https://api.weixin.qq.com/cgi-bin/groups/get?access_token='.$this->appaccess;
        return json_decode($this->curlGet($url));
    }
    //客服消息
    public function msg_customer_send($data){
        $url='https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$this->appaccess;
        return json_decode($this->curlPost($url,$data));
    }
    //多媒体消息
    public function media_upload($type,$file){
        $url = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token='.$this->appaccess.'&type='.$type;
        return;
    }

    public function getAccessToken(){
        return $this->appaccess;
    }
    public function getAccessTime(){
        return $this->apptime;
    }

    public function request()
    {
        return $this->data;
    }
    public function response($content, $type = 'text', $flag = 0)
    {
        $this->data = array('ToUserName' => $this->data['FromUserName'], 'FromUserName' => $this->data['ToUserName'], 'CreateTime' => NOW_TIME, 'MsgType' => $type);
        $this->{$type}($content);
        $this->data['FuncFlag'] = $flag;
        $xml = new SimpleXMLElement('<xml></xml>');
        $this->data2xml($xml, $this->data);
        $this->repxml = $xml;
    }
    public function getXMLRES(){
        return $this->repxml->asXML();
    }
    public function close($xml){
        //die($xml->asXML());
        die($xml);
    }
    private function text($content)
    {
        $this->data['Content'] = $content;
    }
    private function music($music)
    {
        list($music['Title'], $music['Description'], $music['MusicUrl'], $music['HQMusicUrl']) = $music;
        $this->data['Music'] = $music;
    }
    private function news($news)
    {
        $articles = array();
        foreach ($news as $key => $value) {
            list($articles[$key]['Title'], $articles[$key]['Description'], $articles[$key]['PicUrl'], $articles[$key]['Url']) = $value;
            if ($key >= 9) {
                break;
            }
        }
        $this->data['ArticleCount'] = count($articles);
        $this->data['Articles'] = $articles;
    }
    private function data2xml($xml, $data, $item = 'item')
    {
        foreach ($data as $key => $value) {
            is_numeric($key) && ($key = $item);
            if (is_array($value) || is_object($value)) {
                $child = $xml->addChild($key);
                $this->data2xml($child, $value, $item);
            } else {
                if (is_numeric($value)) {
                    $child = $xml->addChild($key, $value);
                } else {
                    $child = $xml->addChild($key);
                    $node = dom_import_simplexml($child);
                    $node->appendChild($node->ownerDocument->createCDATASection($value));
                }
            }
        }
    }
    private function auth($token)
    {
        $data = array($_GET['timestamp'], $_GET['nonce'], $token);
        $sign = $_GET['signature'];
        sort($data);
        $signature = sha1(implode($data));
        return $signature === $sign;
    }
    function curlPost($url, $data){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if (curl_errno($ch)) {
            return false;
        }else{

            return true;
        }
    }
    function curlGet($url){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        return $temp;
    }
}