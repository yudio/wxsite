<?php

class WeixinAction extends Action
{
    private $token;
    private $wxuid;
    private $fun;
    private $wecha_id;
    private $data = array();
    private $my = '奈斯伙伴';
    private $usertype;
    private $themeid;

    public function index()
    {
        $this->token = $this->_get('token');
        //验证并获取微信消息
        $weixin = new Wechat($this->token);
        $data = $weixin->request();
        $this->data = $weixin->request();
        $this->wecha_id = $data['FromUserName'];
        $this->my = C('site_my');
        //验证服务用户存在
        $db = M('Wxuser');
        $wxuser = $db->where(array('token'=>$this->token))->find();
        if (!$wxuser){
            $weixin->response('该公众号已解除服务!','text');
            $weixin->close($weixin->getXMLRES());
        }
        $this->usertype = $wxuser['type'];
        $this->wxuid = $wxuser['id'];


        if ($data['Event']&&$data['MsgType']=='event'){
            list($content, $type) = $this->replyEvent($data);
            $weixin->response($content, $type);
        }else{  //场景设置
            $themedb = M('MemberTheme');
            $theme = $themedb->where(array('token'=>$this->token,'wecha_id'=>$data['FromUserName']))->find();
            if (!$theme){   //theme_type   0 默认   3微信墙
                $tid = $themedb->data(array('token'=>$this->token,'wecha_id'=>$data['FromUserName'],'theme'=>'默认','type'=>0,'status'=>0,'update_time'=>NOW_TIME,'expire_time'=>7200))->add();
                $theme = $themedb->find($tid);
            }elseif (NOW_TIME - $theme['update_time']>$theme['expire_time']){   //场景超时
                $themedb->data(array('id'=>$theme['id'],'theme'=>'默认','type'=>0,'status'=>0,'update_time'=>NOW_TIME,'expire_time'=>7200))->save();
                $theme = $themedb->find($theme['id']);
            }
            $this->themeid = $theme['id'];
            LOG::write('场景ID:'.$theme['type'],LOG::INFO);
            if ($theme['type']==0){ //默认回复
                list($content, $type) = $this->reply($data);
                $weixin->response($content, $type);
                $themedb->data(array('id'=>$theme['id'],'update_time'=>NOW_TIME))->save();
            }
            if ($theme['type']==3){ //微信墙场景   status 0:进入微信墙  1:资料完整或修改   2:发言状态    3:跑马
                switch($theme['status']){
                    case 0:
                        LOG::write('usertype'.$this->usertype,LOG::ERR);

                        break;
                    case 1:
                        //验证用户资料是否齐全   不齐全提示其操作
                        $walluser = D('WallUser')->where(array('token'=>$this->token,'wecha_id'=>$data['FromUserName']))->find();
                        $nextstatus = 1;
                        //处理消息
                        if ($data['MsgType']=='text'){
                            D('WallUser')->data(array('id'=>$walluser['id'],'wxname'=>$data['Content']))->save();
                            if (!$walluser['headpic']||$walluser['headpic']==''){
                                $weixin->response('请发送图片作为你的头像！3分钟内无响应自动退出！','text');
                            }else{
                                D('WallUser')->data(array('id'=>$walluser['id'],'status'=>1))->save();
                                $nextstatus = 2;
                                $weixin->response('请发送文本消息上墙吧！3分钟内无响应自动退出！','text');
                            }
                        }elseif ($data['MsgType']=='image'){
                            D('WallUser')->data(array('id'=>$walluser['id'],'headpic'=>$data['PicUrl']))->save();
                            if (!$walluser['nickname']||$walluser['nickname']==''){
                                $weixin->response('请发送你的"姓名"或"昵称"！3分钟内无响应自动退出！','text');
                            }else{
                                D('WallUser')->data(array('id'=>$walluser['id'],'status'=>1))->save();
                                $nextstatus = 2;
                                $weixin->response('请发送文本消息上墙吧！3分钟内无响应自动退出！','text');
                            }
                        }else{
                            $weixin->response('请发送文本或图片格式的消息！3分钟内无响应自动退出！','text');
                        }
                        $themedb->data(array('id'=>$theme['id'],'status'=>$nextstatus,'update_time'=>NOW_TIME))->save();
                        //匹配关键字"上墙"进入下一状态
                        break;
                    case 2://发言状态   回复'修改资料'返回状态1  回复'离开或0'退出微信墙
                        $walluser = D('WallUser')->where(array('token'=>$this->token,'wecha_id'=>$data['FromUserName']))->find();
                        if ($data['MsgType']=='text'){
                            $content = $data['Content'];
                            if ('0'==trim($content)){
                                $weixin->response('你已退出微信墙，非常感谢你的参与！','text');
                                $themedb->data(array('id'=>$theme['id'],'theme'=>'默认','type'=>0,'status'=>0,'update_time'=>NOW_TIME,'expire_time'=>7200))->save();
                            }else{
                                $msg = array();
                                $msg['token'] = $this->token;
                                $msg['wecha_id'] = $data['FromUserName'];
                                $msg['wid']     = $theme['pid'];
                                $msg['title']  = $walluser['wxname'];
                                $msg['headpic'] = $walluser['headpic'];
                                $msg['content'] = $content;
                                $msg['status']  = 1;
                                $msg['create_time'] = NOW_TIME;
                                M('WallMsg')->data($msg)->add();
                                $weixin->response('消息发送成功！3分钟内无响应自动退出！','text');
                                $themedb->data(array('id'=>$theme['id'],'update_time'=>NOW_TIME))->save();
                            }
                        }else{
                            $weixin->response('请发送文本消息上墙吧！3分钟内无响应自动退出！','text');
                            $themedb->data(array('id'=>$theme['id'],'update_time'=>NOW_TIME))->save();
                        }
                        break;
                    default:
                        $weixin->response('微信墙状态异常,请等待！','text');
                }
            }
        }

        //测试接口记录
        $vo = M('Actlog');
        $arr['act_url'] = "HTTP";
        $arr['act_date'] = date("Y-m-d");
        $arr['act_data'] = $data['orgin']; //is_array($weixin->request());//explode('|',$weixin->request());
        $arr['act_reply'] = $weixin->getXMLRES();
        $arr['act_time'] = NOW_TIME;
        $vo->add($arr);
        $weixin->close($weixin->getXMLRES());

    }


    private function replyEvent($data){
        //记录事件
        $event['token'] = $this->token;
        $event['wecha_id'] = $this->wecha_id;
        $event['tousername'] = $data['ToUserName'];
        $event['create_time'] = NOW_TIME;
        $event['msg_type']  = 'event';
        //匹配事件
        switch($data['Event']){
            case 'subscribe'://用户关注 和 用户未关注时，进行关注后的事件推送
                //记录关注事件
                $event['event']   = $data['Event'];
                if ($data['EventKey']){
                    $event['event_key'] = $data['EventKey'];
                    $event['ticket'] = $data['Ticket'];
                }
                M('MemberEvent')->data($event)->add();
                //统计关注事件
                $follow_data['follow_form_id'] = $data['FromUserName'];
                $follow_data['follow_to_id'] = $data['ToUserName'];
                $follow_data['follow_time'] = $data['CreateTime'];
                $foloow_lists = M('Follow')->add($follow_data);
                $this->requestdata('follownum');//REQUEST
                //写入Member
                $mdata['token'] = $this->token;
                $mdata['wecha_id'] = $this->wecha_id;
                $mdata['subscribe_time'] = NOW_TIME;
                $member = M('Member')->where($mdata)->find();
                if (!$member){
                    if ($this->usertype>2){ //服务号高级接口
                        $member = D('Member')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
                        if (!$member){
                            //调用微信接口更新
                            $dbset = M('Diymen_set');
                            $wxset = $dbset->where(array('token'=>$this->token))->find();
                            $wxservice = new WxService($wxset);
                            $wxset['appaccess'] = $wxservice->getAccessToken();
                            if (NOW_TIME-$wxservice->getAccessTime()>7200){
                                $wxset['updatetime'] = $wxservice->getAccessTime();
                                M('Diymen_set')->where(array('token'=>$this->token))->data($wxset)->save();
                            }
                            $mdata = $wxservice->user_info($this->wecha_id,true);
                            $mdata['status']   = 1; //完整资料
                            $mdata['wecha_id'] = $this->wecha_id;
                            $mdata['token'] = $this->token;
                            $mdata['update_time'] = NOW_TIME;
                            M('Member')->data($mdata)->add();
                        }//TODO  取消关注后再关注，更新用户资料status
                    }else{
                        M('Member')->data($mdata)->add();
                    }
                }

                $autoreply = M('Areply')->where(array('token' => $this->token))->find();
                //未定义默认回复，返回微官网
                if (!$autoreply){
                    LOG::write("未定义默认回复，返回微官网",LOG::INFO);
                    $homestr = M('Home')->field('wxkey')->where(array('token' => $this->token))->find();
                    if ($homestr) {
                        return $this->shouye();
                    }else{
                        return array('用户未设置关注回复！','text');
                    }
                }
                //开启默认无匹配回复
                if ($autoreply['default_reply_flag']){
                    LOG::write("开启默认无匹配回复，返回微官网",LOG::INFO);
                    $this->keyword($data['keyword']);
                }

                if ($autoreply['is_news'] == 1) {    //返回关注图文本回复
                    $where['token'] = $this->token;
                    $where['match_type']  =  3;      //关注图文
                    $img = M('Img')->field('id,info,pic,url,title,news')->where($where)->find();
                    $return[] = array($img['title'],$img['info'],$img['pic'],$img['url']);;                //首条
                    if ($img['news']){
                        $newswhere['token'] = $this->token;
                        $newswhere['id']    = array('in',$img['news']);
                        $news = M('Img')->where($newswhere)->order('id desc')->limit(9)->select();
                        foreach ($news as $keya => $infot) {
                            $return[] = array($infot['title'],$infot['info'],$infot['pic'],$infot['url']);
                        }
                    }
                    return array($return,'news');
                } else {
                    //返回关注时文本回复
                    return array($autoreply['content'],'text');
                }
                break;
            case 'unsubscribe':
                //取消关注事件
                $event['event']   = $data['Event'];
                M('MemberEvent')->data($event)->add();
                //更新用户状态
                $mdata['token'] = $this->token;
                $mdata['wecha_id'] = $this->wecha_id;
                $member = M('Member')->where($mdata)->find();
                M('Member')->data(array('id'=>$member['id'],'status'=>0))->save();
                //取消关注统计数据
                $this->requestdata('unfollownum');//REQUEST
                return array('感谢关注！','text');
            case 'SCAN'://用户已关注时的事件推送
                $event['event']   = $data['Event'];
                $event['event_key'] = $data['EventKey'];
                $event['ticket'] = $data['Ticket'];
                M('MemberEvent')->data($event)->add();
                $this->trackdata('SCAN');//REQUEST
                break;
            case 'LOCATION'://上报地理位置事件
                $event['event']   = $data['Event'];
                $event['event_key'] = $data['EventKey'];
                $event['lat'] = $data['Latitude'];
                $event['lng'] = $data['Longitude'];
                $event['precision'] = $data['Precision'];
                M('MemberEvent')->data($event)->add();
                $this->trackdata('LOCATION');//REQUEST
                break;
            case 'CLICK'://点击菜单拉取消息时的事件推送
                $event['event']   = $data['Event'];
                $event['event_key'] = $data['EventKey'];
                M('MemberEvent')->data($event)->add();
                $this->trackdata('MENU_CLICK');//REQUEST
                return $this->keyword($data['EventKey']);
                break;
            case 'VIEW'://点击菜单跳转链接时的事件推送
                $event['event']   = $data['Event'];
                $event['event_key'] = $data['EventKey'];
                M('MemberEvent')->data($event)->add();
                $this->trackdata('MENU_VIEW');//REQUEST
                break;
            default:
                return array('未匹配事件','text');
        }
    }

    private function reply($data)
    {
        //记录消息
        $msg['token'] = $this->token;
        $msg['wecha_id'] = $this->wecha_id;
        $msg['tousername'] = $data['ToUserName'];
        $msg['create_time'] = NOW_TIME;
        $msg['msg_id']  = $data['MsgId'];
        //匹配消息
        switch($data['MsgType']){
            case 'image':
                $msg['picurl'] = $data['PicUrl'];
                $msg['media_id'] = $data['MediaId'];
                M('MemberMsg')->data($msg)->add();
                return array('图片接收成功！','text');
                break;
            case 'voice':
                $msg['media_id'] = $data['MediaId'];
                $msg['format'] = $data['Format'];
                M('MemberMsg')->data($msg)->add();
                return array('音频接收成功！','text');
                break;
            case 'video':
                $msg['media_id'] = $data['MediaId'];
                $msg['thumb_media_id'] = $data['ThumbMediaId'];
                M('MemberMsg')->data($msg)->add();
                return array('音频接收成功！','text');
                break;
            case 'location':
                $msg['location_x'] = $data['Location_X'];
                $msg['location_y'] = $data['Location_Y'];
                $msg['scale'] = $data['Scale'];
                $msg['label'] = $data['Label'];
                M('MemberMsg')->data($msg)->add();
                return array('定位接收成功！','text');
                break;
            case 'link':
                $msg['title'] = $data['Title'];
                $msg['description'] = $data['Description'];
                $msg['url'] = $data['Url'];
                M('MemberMsg')->data($msg)->add();
                return array('链接接收成功！','text');
                break;
        }
        $msg['content'] = $data['Content'];
        M('MemberMsg')->data($msg)->add();

        $key = $data['Content'];
        $Pin = new GetPin();
        $open = M('Token_open')->where(array('token' => $this->_get('token')))->find();
        $this->fun = $open['queryname'];        $datafun = explode(',', $open['queryname']);
        $tags = $this->get_tags($key);
        $back = explode(',', $tags);
        foreach ($back as $keydata => $data) { //开放功能模块过滤
            $string = $Pin->Pinyin($data);
            if (in_array($string, $datafun)) {
                $check = $this->user('connectnum');
                if ($string == 'fujin') {
                    $this->recordLastRequest($key);
                }
                if ($check['connectnum'] != 1) {
                    $return = C('connectout');
                    continue;
                }
                unset($back[$keydata]);
                eval('$return= $this->' . $string . '($back);');
                continue;
            }
        }
        if (!empty($return)) {
            if (is_array($return)) {
                $this->trackdata('Token_OPEN');
                return $return;
            } else {
                $this->trackdata('textnum');//REQUEST
                return array(
                    $return,
                    'text'
                );
            }
        } else {
            /*LOG::write("Location_X",LOG::INFO);
            if ($this->data['Location_X']) {
                $this->recordLastRequest($this->data['Location_Y'] . ',' . $this->data['Location_X'], 'location');
                $this->trackdata('Location');
                return $this->map($this->data['Location_X'], $this->data['Location_Y']);
            }
            if (!(strpos($key, '开车去') === FALSE) || !(strpos($key, '坐公交') === FALSE) || !(strpos($key, '步行去') === FALSE)) {
                $this->recordLastRequest($key);
                $user_request_model = M('User_request');
                $loctionInfo = $user_request_model->where(array(
                    'token' => $this->_get('token'),
                    'msgtype' => 'location',
                    'uid' => $this->data['FromUserName']
                ))->find();
                if ($loctionInfo && intval($loctionInfo['time'] > (NOW_TIME - 60))) {
                    $latLng = explode(',', $loctionInfo['keyword']);
                    return $this->map($latLng[1], $latLng[0]);
                }
                $this->trackdata('Location');//REQUEST
                return array(
                    '请发送您所在的位置',
                    'text'
                );
            }*/
            switch ($key) {
                case '地图':
                    return $this->companyMap();
                case '最近的':
                    $this->recordLastRequest($key);
                    $user_request_model = M('User_request');
                    $loctionInfo = $user_request_model->where(array(
                        'token' => $this->_get('token'),
                        'msgtype' => 'location',
                        'uid' => $this->data['FromUserName']
                    ))->find();
                    if ($loctionInfo && intval($loctionInfo['time'] > (NOW_TIME - 60))) {
                        $latLng = explode(',', $loctionInfo['keyword']);
                        return $this->map($latLng[1], $latLng[0]);
                    }
                    return array(
                        '请发送您所在的位置',
                        'text'
                    );
                    break;
                case '帮助':
                    return $this->help();
                    break;
                case '笑话':
                    return $this->xiaohua();
                    break;
                case '快递':
                    return $this->kuaidi(array());
                    break;
                case '公交':
                    return $this->gongjiao(array());
                    break;
                case '火车':
                    return $this->huoche(array());
                    break;
                case 'help':
                    return $this->help();
                    break;
                case '身份证':
                    return $this->shenfenzheng(array());
                    break;
                case '商城':
                    $pro = M('reply_info')->where(array(
                        'infotype' => 'Shop',
                        'token' => $this->token
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['title'],
                                strip_tags(htmlspecialchars_decode($pro['info'])),
                                $pro['picurl'],
                                C('site_url') . '/index.php?g=Wap&m=Product&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName']
                            )
                        ),
                        'news'
                    );
                    break;
                case '订餐':
                    $pro = M('reply_info')->where(array(
                        'infotype' => 'Dining',
                        'token' => $this->token
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['title'],
                                strip_tags(htmlspecialchars_decode($pro['info'])),
                                $pro['picurl'],
                                C('site_url') . '/index.php?g=Wap&m=Product&a=dining&dining=1&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName']
                            )
                        ),
                        'news'
                    );
                    break;
                case '团购':
                    $pro = M('reply_info')->where(array(
                        'infotype' => 'Groupon',
                        'token' => $this->token
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['title'],
                                strip_tags(htmlspecialchars_decode($pro['info'])),
                                $pro['picurl'],
                                C('site_url') . '/index.php?g=Wap&m=Groupon&a=grouponIndex&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName']
                            )
                        ),
                        'news'
                    );
                    break;
                default:
                    return $this->keyword($key);
            }
        }
    }

    function companyMap()
    {
        import("Home.Action.MapAction");
        $mapAction = new MapAction();
        return $mapAction->staticCompanyMap();
    }

    function shenhe($name)
    {
        $name = implode('', $name);
        if (empty($name)) {
            return '正确的审核帐号方式是：审核+帐号';
        } else {
            $user = M('Users')->field('id')->where(array(
                'username' => $name
            ))->find();
            if ($user == false) {
                return '主人' . $this->my . "提醒您,您还没注册吧\n正确的审核帐号方式是：审核+帐号,不含+号";
            } else {
                $up = M('users')->where(array(
                    'id' => $user['id']
                ))->save(array(
                        'status' => 1,
                        'viptime' => strtotime("+1 day")
                    ));
                if ($up != false) {
                    return '主人' . $this->my . '恭喜您,您的帐号已经审核,您现在可以登陆平台测试功能啦!';
                } else {
                    return '服务器繁忙请稍后再试';
                }
            }
        }
    }

    /*
     * 淘宝连接
     */
    function taobao($name)
    {
        $name = array_merge($name);
        $data = M('Taobao')->where(array(
            'token' => $this->token
        ))->find();
        if ($data != false) {
            if (strpos($data['keyword'], $name)) {
                $url = $data['homeurl'] . '/search.htm?search=y&keyword=' . $name . '&lowPrice=&highPrice=';
            } else {
                $url = $data['homeurl'];
            }
            return array(
                array(
                    array(
                        $data['title'],
                        $data['keyword'],
                        $data['picurl'],
                        $url
                    )
                ),
                'news'
            );
        } else {
            return '商家还未及时更新淘宝店铺的信息,回复帮助,查看功能详情';
        }
    }

    /*
     *
     * 图文消息关联地址url[string] = fun(infot[Img])
     */
    public function getRelatedImg($infot){
        if ($infot['url'] != false) {
            if (!(strpos($infot['url'], 'http') === FALSE)) {
                $url = $infot['url'];
            } else {
                $urlInfos = explode(' ', $infot['url']);
                switch ($urlInfos[0]) {
                    case '刮刮卡':
                        $url = C('site_url') . U('Wap/Guajiang/index', array(
                                'token' => $this->token,
                                'wecha_id' => $this->data['FromUserName'],
                                'id' => $urlInfos[1]
                            ));

                        break;
                    case '砸金蛋':
                        $url = C('site_url') . U('Wap/Zadan/index', array(
                                'token' => $this->token,
                                'wecha_id' => $this->data['FromUserName'],
                                'id' => $urlInfos[1]
                            ));

                        break;
                    case '大转盘':
                        $url = C('site_url') . U('Wap/Lottery/index', array(
                                'token' => $this->token,
                                'wecha_id' => $this->data['FromUserName'],
                                'id' => $urlInfos[1]
                            ));
                        break;
                    case '商家订单':
                        $url = C('site_url') . '/index.php?g=Wap&m=Host&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'] . '&hid=' . $urlInfos[1];
                        break;
                    case '优惠券':
                        $url = C('site_url') . U('Wap/Coupon/index', array(
                                'token' => $this->token,
                                'wecha_id' => $this->data['FromUserName'],
                                'id' => $urlInfos[1]
                            ));
                        break;
                }
            }
        } else {
            $url = rtrim(C('site_url'), '/') . U('Wap/Index/content', array(
                    'token' => $this->token,
                    'id' => $infot['id']
                ));
        }
        return $url;
    }

    /*
     * 关键字匹配
     */
    function keyword($key,$reload = false)
    {
       //$key = mb_strtoupper($key,'UTF-8');
        LOG::write('关键字匹配'.$key,LOG::INFO);
        //模糊匹配
        $where['keyword'] = $key;
        $where['token']   = $this->token;
        $where['match_type'] = 1;
        $res = M('Keyword')->where($where)->find();
        //完全匹配
        if (!$res){
            $where['keyword']    = array('like','%'.$key.'%');
            $where['match_type'] = 2;
            $where['token']      = $this->token;
            $res = M('Keyword')->where($where)->find();
        }
        if ($res) {
            switch ($res['module']) {
                case 'Home':  //微官网
                    LOG::write('匹配微官网',LOG::INFO);
                    $this->trackdata('Home');//REQUEST
                    return $this->shouye();
                    break;
                case 'Img':   //图文回复
                    LOG::write('组装多图文'.$key,LOG::INFO);
                    $this->requestdata('imgnum');//REQUEST
                    $img_db = M('Img');
                    //多图文关联
                    $like['id']    = $res['pid'];
                    $imgmsg = $img_db->field('id,info,pic,url,title,news')->where($like)->find();
                    LOG::write('图文'.$imgmsg['id'],LOG::INFO);
                    //替代wecha_id
                    $imgmsg['url'] = @ereg_replace('FromUserName',$this->data['FromUserName'],$imgmsg['url']);
                    $return[] = array($imgmsg['title'],$imgmsg['info'],$imgmsg['pic'],$imgmsg['url']);

                    $back = array();
                    if($imgmsg['news']){
                        $backwhere['id'] = array('in',$imgmsg['news']);
                        $back = $img_db->field('id,info,pic,url,title')->limit(9)->order('id desc')->where($backwhere)->select();
                    }
                    foreach ($back as $keya => $infot) {
                        LOG::write('图文'.$infot['id'],LOG::INFO);
                        $infot['url'] = @ereg_replace('FromUserName',$this->data['FromUserName'],$infot['url']);
                        $return[] = array($infot['title'],$infot['info'],$infot['pic'],$infot['url']);
                    }
                    return array(
                        $return,
                        'news'
                    );
                    break;
                case 'Text': //文本回复
                    LOG::write('匹配关键字:'.$key,LOG::INFO);
                    $this->requestdata('textnum');//REQUEST
                    $info = M('Text')->order('id desc')->find($res['pid']);
                    return array(
                        htmlspecialchars_decode($info['text']),
                        'text'
                    );
                    break;
                case 'Reserve':   //预约
                    LOG::write('匹配关键字:'.$key,LOG::INFO);
                    $this->trackdata('Reserve');//REQUEST
                    $info = M('Reserve')->find($res['pid']);
                    return array(
                        array(
                            array(
                                $info['title'],
                                $info['info'],
                                $info['picurl'],
                                C('site_url')."/reserve/{$this->wxuid}/index?rid={$res['pid']}&wecha_id={$this->data['FromUserName']}"
                            )
                        ),
                        'news'
                    );
                    break;
                case 'Album':  //相册
                    LOG::write('匹配相册:'.$key,LOG::INFO);
                    $this->trackdata('Album');//REQUEST
                    $info = M('Album')->find($res['pid']);
                    return array(
                        array(
                            array(
                                $info['title'],
                                $info['info'],
                                $info['picurl'],
                                C('site_url')."/album/{$this->wxuid}/showlist?pid={$res['pid']}&wecha_id={$this->data['FromUserName']}"
                            )
                        ),
                        'news'
                    );
                    break;
                case 'Comment'://留言板
                    LOG::write('匹配留言板:'.$key,LOG::INFO);
                    $this->trackdata('Comment');//REQUEST
                    $info = M('CommentSet')->find($res['pid']);
                    return array(
                        array(
                            array(
                                $info['msg_name'],
                                $info['msg_name'],
                                $info['picurl'],
                                C('site_url')."/Webmessage/{$this->wxuid}/comment?wecha_id={$this->data['FromUserName']}"
                            )
                        ),
                        'news'
                    );
                    break;
                case 'MemberCard'://会员卡
                    LOG::write('匹配MemberCard:'.$key,LOG::INFO);
                    $this->trackdata('MemberCard');
                    $info = M('MemberCardInfo')->find($res['pid']);
                    $msg = array($info['shop_name'],$info['info'],$info['logo'],
                        C('site_url')."/Webmember/{$this->wxuid}/index?wecha_id={$this->data['FromUserName']}");
                    return array(array($msg),'news');
                    break;
                case 'Wall'://微信墙
                    LOG::write('匹配Wall:'.$key,LOG::INFO);
                    $this->trackdata('Wall');
                    $info = M('Wall')->find($res['pid']);
                    $msg = '';
                    //同步微信墙资料
                    $themedb = M('MemberTheme');
                    $walluser = D('WallUser')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
                    if (!$walluser||$walluser['status']==0){//资料不全
                        LOG::write('usertype:'.$this->usertype,LOG::ERR);
                        if ($this->usertype == 4){//服务号账户
                            $member = M('Member')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
                            if (!$walluser){    //同步资料
                                $walluser['token'] = $member['token'];
                                $walluser['wecha_id'] = $member['wecha_id'];
                                $walluser['wxname'] = $member['nickname'];
                                $walluser['headpic'] = $member['headimgurl'];
                                $walluser['status'] = 1;$walluser['msgnum'] = 0;
                                $walluser['create_time'] = NOW_TIME;$walluser['update_time'] = NOW_TIME;
                                D('WallUser')->data($walluser)->add();
                            }else{
                                $walluser['wxname'] = $member['nickname'];
                                $walluser['headpic'] = $member['headimgurl'];
                                $walluser['status'] = 1;$walluser['update_time'] = NOW_TIME;
                                D('WallUser')->data($walluser)->save();
                            }
                            $themedb->data(array('id'=>$this->themeid,'theme'=>'微信墙','type'=>3,'status'=>2,'pid'=>$res['pid'],'update_time'=>NOW_TIME,'expire_time'=>180))->save();
                            $msg = '请发送文本消息上墙吧！3分钟内无响应自动退出！';
                        }else{
                            $walluser['token'] = $this->token;
                            $walluser['wecha_id'] = $this->wecha_id;
                            $walluser['status'] = 0;$walluser['msgnum'] = 0;
                            $walluser['create_time'] = NOW_TIME;$walluser['update_time'] = NOW_TIME;
                            D('WallUser')->data($walluser)->add();
                            $themedb->data(array('id'=>$this->themeid,'theme'=>'微信墙','type'=>3,'status'=>1,'pid'=>$res['pid'],'update_time'=>NOW_TIME,'expire_time'=>180))->save();
                            $msg = '请发送你的"姓名"或"昵称"！3分钟内无响应自动退出！';
                        }
                    }else{
                        $themedb->data(array('id'=>$this->themeid,'theme'=>'微信墙','type'=>3,'status'=>2,'pid'=>$res['pid'],'update_time'=>NOW_TIME,'expire_time'=>180))->save();
                        $msg = '请发送文本消息上墙吧！3分钟内无响应自动退出！';
                    }
                    return array($msg,'text');
                    break;
                case 'Lecture'://微报名
                    LOG::write('匹配微报名:'.$key,LOG::INFO);
                    $this->trackdata('Lecture');
                    $info = M('Lecture')->find($res['pid']);
                    $url = C('site_url')."/WebLecture/{$this->wxuid}/index?rid={$res['pid']}&wecha_id={$this->data['FromUserName']}";
                    if ($info['is_auth']==1){//授权链接
                        $wxuser = M('Wxuser')->find($this->wxuid);
                        $authservice = new AuthService($wxuser);
                        $url = $authservice->auth2url(C('site_url').'/webauth/'.$this->wxuid.'/redirect','snsapi_base','lecture_'.$res['pid']);
                    }
                    $msg = array($info['info'],$info['desc'],$info['picurl'],$url);
                    return array(array($msg),'news');
                    break;
                case 'Host':
                    $this->requestdata('other');
                    $host = M('Host')->where(array('id' => $res['pid']))->find();

                    return array(
                        array(
                            array(
                                $host['name'],
                                $host['info'],
                                $host['ppicurl'],
                                C('site_url') . '/index.php?g=Wap&m=Host&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'] . '&hid=' . $res['pid']
                            )
                        ),
                        'news'
                    );
                    break;
                case 'Product':
                    $this->requestdata('other');
                    $pro = M('Product')->where(array(
                        'id' => $res['pid']
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['name'],
                                strip_tags(htmlspecialchars_decode($pro['intro'])),
                                $pro['logourl'],
                                C('site_url') . '/index.php?g=Wap&m=Product&a=product&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'] . '&id=' . $res['pid']
                            )
                        ),
                        'news'
                    );
                    break;
                case 'Xitie':
                    $this->trackdata('Xitie');//REQUEST
                    $this->requestdata('other');
                    $pro = M('Xitie')->where(array(
                        'id' => $res['pid']
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['title'],
                                strip_tags(htmlspecialchars_decode($pro['message'])),
                                $pro['pic'],
                                C('site_url') . '/index.php?g=Wap&m=Xitie&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'] . '&id=' . $res['pid']
                            )
                        ),
                        'news'
                    );
                    break;
                case 'liuyan':
                    $this->requestdata('other');
                    $pro = M('liuyan')->where(array(
                        'id' => $res['pid']
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['title'],
                                strip_tags(htmlspecialchars_decode($pro['message'])),
                                $pro['pic'],
                                C('site_url') . '/index.php?g=Wap&m=Liuyan&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'] . '&id=' . $res['pid']
                            )
                        ),
                        'news'
                    );
                    break;
                case 'Selfform':
                    $this->requestdata('other');
                    $pro = M('Selfform')->where(array(
                        'id' => $res['pid']
                    ))->find();
                    return array(
                        array(
                            array(
                                $pro['name'],
                                strip_tags(htmlspecialchars_decode($pro['intro'])),
                                $pro['logourl'],
                                C('site_url') . '/index.php?g=Wap&m=Selfform&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'] . '&id=' . $res['pid']
                            )
                        ),
                        'news'
                    );
                    break;
                case 'Lottery':
                    $this->trackdata('Lottery');//REQUEST
                    $this->requestdata('other');
                    $info = M('Lottery')->find($res['pid']);
                    if ($info == false || $info['status'] == 3) {
                        return array(
                            '活动可能已经结束或者被删除了',
                            'text'
                        );
                    }
                    switch ($info['type']) {
                        case 1:
                            $model = 'Lottery';
                            break;
                        case 2:
                            $model = 'Guajiang';
                            break;
                        case 3:
                            $model = 'Coupon';
                            break;
                        case 4:
                            $model = 'Zadan';
                    }
                    $id = $info['id'];
                    $type = $info['type'];
                    if ($info['status'] == 1) {
                        $picurl = $info['start_picurl'];
                        $title = $info['title'];
                        $id = $info['id'];
                        $info = $info['info'];
                    } else {
                        $picurl = $info['end_picurl'];
                        $title = $info['end_title'];
                        $info = $info['end_info'];
                    }
                    $url = C('site_url')."/npWap/{$model}/index.act?actid={$id}&token={$this->token}&wecha_id={$this->data['FromUserName']}";

                    /*C('site_url') . U('Wap/' . $model . '/index', array(
                        'token' => $this->token,
                        'type' => $type,
                        'wecha_id' => $this->data['FromUserName'],
                        'id' => $id,
                        'type' => $type
                    ));*/
                    return array(array(array($title,$info,$picurl,$url)),'news');
                case 'Coupon':
                    $this->trackdata('Coupon');//REQUEST
                    $this->requestdata('other');
                    $info = M('Coupon')->find($res['pid']);
                    LOG::write('info_id:'.$res['pid'],LOG::ERR);
                    if ($info == false || $info['status'] == 3) {
                        return array(
                            '活动可能已经结束或者被删除了',
                            'text'
                        );
                    }
                    if ($info['status'] == 1) {
                        $picurl = $info['start_picurl'];
                        $title = $info['title'];
                        $info = $info['content'];
                    } else {
                        $picurl = $info['end_picurl'];
                        $title = $info['end_title'];
                        $info = $info['end_intro'];
                    }
                    $url = C('site_url')."/WebActivity/{$this->wxuid}/{$res['module']}?actid=".$res['pid']."&token={$this->token}&wecha_id={$this->data['FromUserName']}";
                    return array(array(array($title,$info,$picurl,$url)),'news');
                default:
                    $this->requestdata('videonum');
                    $info = M($res['module'])->order('id desc')->find($res['pid']);
                    return array(
                        array(
                            $info['title'],
                            $info['keyword'],
                            $info['musicurl'],
                            $info['hqmusicurl']
                        ),
                        'music'
                    );
            }
        } else {
            $this->trackdata('UNMATCH');//REQUEST
            if (!strpos($this->fun, 'liaotian')) {
                $auto = M('Areply')->where(array('token' => $this->token))->find();
                if ($auto['default_reply_flag']&&!$reload){
                    return $this->keyword($auto['default_reply'],true);
                }else{
                    return array('无法匹配回复,请提醒商家，重新设定关键词','text');
                }
            }
            return array($this->chat($key),'text');
        }
    }

    //首页
    function shouye()
    {
        $home = M('Home')->where(array('token' => $this->token))->find();
        if ($home == false) {
            return array(
                '商家未做首页配置，请稍后再试',
                'text'
            );
        } else {
            $wxuser = M('Wxuser')->field('id')->where(array('token'=>$this->token))->find();
            if ($home['homeurl'] == false) {
                $url = rtrim(C('site_url'), '/') . '/wesite/'.$wxuser['id'].'/index?token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'];
            } else {
                $url = @ereg_replace('FromUserName',$this->data['FromUserName'],$home['homeurl']);;
            }
        }
        return array(
            array(array($home['title'],$home['info'],$home['picurl'],$url)),
            'news'
        );
    }

    //快递
    function kuaidi($data)
    {
        $data = array_merge($data);
        $str = file_get_contents('http://www.weinxinma.com/api/index.php?m=Express&a=index&name=' . $data[0] . '&number=' . $data[1]);
        return $str;
    }

    //朗读
    function langdu($data)
    {
        $data = implode('', $data);
        $mp3url = 'http://www.apiwx.com/aaa.php?w=' . urlencode($data);
        return array(
            array(
                $data,
                '点听收听',
                $mp3url,
                $mp3url
            ),
            'music'
        );
    }

    //健康
    function jiankang($data)
    {
        if (empty($data))
            return '主人，' . $this->my . "提醒您\n正确的查询方式是:\n健康+身高,+体重\n例如：健康170,65";
        $height = $data[1] / 100;
        $weight = $data[2];
        $Broca = ($height * 100 - 80) * 0.7;
        $kaluli = 66 + 13.7 * $weight + 5 * $height * 100 - 6.8 * 25;
        $chao = $weight - $Broca;
        $zhibiao = $chao * 0.1;
        $res = round($weight / ($height * $height), 1);
        if ($res < 18.5) {
            $info = '您的体形属于骨感型，需要增加体重' . $chao . '公斤哦!';
            $pic = 1;
        } elseif ($res < 24) {
            $info = '您的体形属于圆滑型的身材，需要减少体重' . $chao . '公斤哦!';
        } elseif ($res > 24) {
            $info = '您的体形属于肥胖型，需要减少体重' . $chao . '公斤哦!';
        } elseif ($res > 28) {
            $info = '您的体形属于严重肥胖，请加强锻炼，或者使用我们推荐的减肥方案进行减肥';
        }
        return $info;
    }

    //附近
    function fujin($keyword)
    {
        $keyword = implode('', $keyword);
        if ($keyword == false) {
            return $this->my . "很难过,无法识别主淫的指令,正确使用方法是:输入【附近+关键词】当" . $this->my . '提醒您输入地理位置的时候就OK啦';
        }
        $data = array();
        $data['time'] = NOW_TIME;
        $data['token'] = $this->_get('token');
        $data['keyword'] = $keyword;
        $data['uid'] = $this->data['FromUserName'];
        $re = M('Nearby_user');
        $user = $re->where(array(
            'token' => $this->_get('token'),
            'uid' => $data['uid']
        ))->find();
        if ($user == false) {
            $re->data($data)->add();
        } else {
            $id['id'] = $user['id'];
            $re->where($id)->save($data);
        }
        return "主人【" . $this->my . "】已经接收到你的指令\n请发送您的地理位置给我哈";
    }

    //查询上一请求
    function recordLastRequest($key, $msgtype = 'text')
    {
        $rdata = array();
        $rdata['time'] = NOW_TIME;
        $rdata['token'] = $this->_get('token');
        $rdata['keyword'] = $key;
        $rdata['msgtype'] = $msgtype;
        $rdata['uid'] = $this->data['FromUserName'];
        $user_request_model = M('User_request');
        $user_request_row = $user_request_model->where(array(
            'token' => $this->_get('token'),
            'msgtype' => $msgtype,
            'uid' => $rdata['uid']
        ))->find();
        if (!$user_request_row) {
            $user_request_model->add($rdata);
        } else {
            $rid['id'] = $user_request_row['id'];
            $user_request_model->where($rid)->save($rdata);
        }
    }

    //地图
    function map($x, $y)
    {
        $user_request_model = M('User_request');
        $user_request_row = $user_request_model->where(array(
            'token' => $this->_get('token'),
            'msgtype' => 'text',
            'uid' => $this->data['FromUserName']
        ))->find();
        if (!(strpos($user_request_row['keyword'], '附近') === FALSE)) {
            $user = M('Nearby_user')->where(array(
                'token' => $this->_get('token'),
                'uid' => $this->data['FromUserName']
            ))->find();
            $keyword = $user['keyword'];
            $radius = 2000;
            $str = file_get_contents(C('site_url') . '/map.php?keyword=' . urlencode($keyword) . '&x=' . $x . '&y=' . $y);
            $array = json_decode($str);
            $map = array();
            foreach ($array as $key => $vo) {
                $map[] = array(
                    $vo->title,
                    $key,
                    rtrim(C('site_url'), '/') . '/tpl/static/images/home.jpg',
                    $vo->url
                );
            }
            return array(
                $map,
                'news'
            );
        } else {
            import("Home.Action.MapAction");
            $mapAction = new MapAction();
            if (!(strpos($user_request_row['keyword'], '开车去') === FALSE) || !(strpos($user_request_row['keyword'], '坐公交') === FALSE) || !(strpos($user_request_row['keyword'], '步行去') === FALSE)) {
                if (!(strpos($user_request_row['keyword'], '步行去') === FALSE)) {
                    $companyid = str_replace('步行去', '', $user_request_row['keyword']);
                    if (!$companyid) {
                        $companyid = 1;
                    }
                    return $mapAction->walk($x, $y, $companyid);
                }
                if (!(strpos($user_request_row['keyword'], '开车去') === FALSE)) {
                    $companyid = str_replace('开车去', '', $user_request_row['keyword']);
                    if (!$companyid) {
                        $companyid = 1;
                    }
                    return $mapAction->drive($x, $y, $companyid);
                }
                if (!(strpos($user_request_row['keyword'], '坐公交') === FALSE)) {
                    $companyid = str_replace('坐公交', '', $user_request_row['keyword']);
                    if (!$companyid) {
                        $companyid = 1;
                    }
                    return $mapAction->bus($x, $y, $companyid);
                }
            } else {
                switch ($user_request_row['keyword']) {
                    case '最近的':
                        return $mapAction->nearest($x, $y);
                        break;
                }
            }
        }
    }

    //算命
    function suanming($name)
    {
        $name = implode('', $name);
        if (empty($name)) {
            return '主人' . $this->my . '提醒您正确的使用方法是[算命+姓名]';
        }
        $data = require_once(CONF_PATH . 'suanming.php');
        $num = mt_rand(0, 80);
        return $name . "\n" . trim($data[$num]);
    }

    //
    function yinle($name)
    {
        $name = implode('', $name);
        $url = 'http://httop1.duapp.com/mp3.php?musicName=' . $name;
        $str = file_get_contents($url);
        $obj = json_decode($str);
        return array(
            array(
                $name,
                $name,
                $obj->url,
                $obj->url
            ),
            'music'
        );
    }

    function geci($n)
    {
        $name = implode('', $n);
        @$str = 'http://api.ajaxsns.com/api.php?key=free&appid=0&msg=' . urlencode('歌词' . $name);
        $json = json_decode(file_get_contents($str));
        $str = str_replace('{br}', "\n", $json->content);
        return str_replace('mzxing_com', 'nicedog', $str);
    }

    function yuming($n)
    {
        $name = implode('', $n);
        @$str = 'http://api.ajaxsns.com/api.php?key=free&appid=0&msg=' . urlencode('域名' . $name);
        $json = json_decode(file_get_contents($str));
        $str = str_replace('{br}', "\n", $json->content);
        return str_replace('mzxing_com', 'nicedog', $str);
    }

    function tianqi($n)
    {
        $name = implode('', $n);
        @$str = 'http://api.ajaxsns.com/api.php?key=free&appid=0&msg=' . urlencode('天气' . $name);
        $json = json_decode(file_get_contents($str));
        $str = str_replace('{br}', "\n", $json->content);
        return str_replace('mzxing_com', 'nicedog', $str);
    }

    function shouji($n)
    {
        $name = implode('', $n);
        @$str = 'http://api.ajaxsns.com/api.php?key=free&appid=0&msg=' . urlencode('归属' . $name);
        $json = json_decode(file_get_contents($str));
        $str = str_replace('{br}', "\n", $json->content);
        return str_replace('mzxing_com', 'nicedog', $n);
    }

    function shenfenzheng($n)
    {
        $n = implode('', $n);
        if (count($n) > 1) {
            $this->error_msg($n);

            return false;
        };
        $xml_array = simplexml_load_file('http://api.k780.com/?app=idcard.get&idcard=' . $n . '&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=xml'); //将XML中的数据,读取到数组对象中
        foreach ($xml_array as $tmp) {
            if ($tmp !== iconv('UTF-8', 'UTF-8', iconv('UTF-8', 'UTF-8', $tmp))) {
                $tmp = iconv('GBK', 'UTF-8', $tmp);
            }
            $str = "【身份证】" . $tmp->idcard . "【地址】" . $tmp->att . "【性别】" . $tmp->sex . "【生日】" . $tmp->born;
            //$str=$xml_array;
        }
        return $str;
    }

    function gongjiao($data)
    {
        $data = array_merge($data);
        if (count($data) != 2) {
            $this->error_msg('公交');
            return false;
        }

        $json = file_get_contents("http://www.twototwo.cn/bus/Service.aspx?format=json&action=QueryBusByLine&key=5da453b2-b154-4ef1-8f36-806ee58580f6&zone=" . $data[0] . "&line=" . $data[1]);
        $data = json_decode($json);
        $xianlu = $data->Response->Head->XianLu;
        $xdata = get_object_vars($xianlu->ShouMoBanShiJian);
        $xdata = $xdata['#cdata-section'];
        $piaojia = get_object_vars($xianlu->PiaoJia);
        $xdata = $xdata . ' -- ' . $piaojia['#cdata-section'];
        $main = $data->Response->Main->Item->FangXiang;
        $xianlu = $main[0]->ZhanDian;
        $str = "【本公交途经】\n";
        for ($i = 0; $i < count($xianlu); $i++) {
            $str .= "\n" . trim($xianlu[$i]->ZhanDianMingCheng);
        }
        return $str;
    }

    function huoche($data, $time = '')
    {
        $data = array_merge($data);
        $data[2] = date('Y', NOW_TIME) . $time;
        if (count($data) != 3) {
            $this->error_msg($data[0] . '至' . $data[1]);
            return false;
        };
        $time = empty($time) ? date('Y-m-d', NOW_TIME) : date('Y-', NOW_TIME) . $time;
        $json = file_get_contents("http://www.twototwo.cn/train/Service.aspx?format=json&action=QueryTrainScheduleByTwoStation&key=5da453b2-b154-4ef1-8f36-806ee58580f6&startStation=" . $data[0] . "&arriveStation=" . $data[1] . "&startDate=" . $data[2] . "&ignoreStartDate=0&like=1&more=0");
        if ($json) {
            $str = "";
            $data = json_decode($json);
            $main = $data->Response->Main->Item;
            if (count($main) > 10) {
                $conunt = 10;
            } else {
                $conunt = count($main);
            }
            for ($i = 0; $i < $conunt; $i++) {
                $str .= "\n 【编号】" . $main[$i]->CheCiMingCheng . "\n 【类型】" . $main[$i]->CheXingMingCheng . "\n【发车时间】:　" . $time . ' ' . $main[$i]->FaShi . "\n【耗时】" . $main[$i]->LiShi . ' 小时';
                $str .= "\n----------------------";
            }
        } else {
            //$str = '没有找到 ' . $name . ' 至 ' . $toname . ' 的列车';
        }
        return $str;
    }

    function fanyi($name)
    {
        $name = array_merge($name);
        $url = "http://openapi.baidu.com/public/2.0/bmt/translate?client_id=kylV2rmog90fKNbMTuVsL934&q=" . $name[0] . "&from=auto&to=auto";
        $json = Http::fsockopenDownload($url);
        if ($json == false) {
            $json = file_get_contents($url);
        }
        $json = json_decode($json);
        $str = $json->trans_result;
        if ($str[0]->dst == false)
            return $this->error_msg($name[0]);
        $mp3url = 'http://www.apiwx.com/aaa.php?w=' . $str[0]->dst;
        return array(
            array(
                $str[0]->src,
                $str[0]->dst,
                $mp3url,
                $mp3url
            ),
            'music'
        );
    }

    function caipiao($name)
    {
        $name = array_merge($name);
        $url = "http://api2.sinaapp.com/search/lottery/?appkey=0020130430&appsecert=fa6095e113cd28fd&reqtype=text&keyword=" . $name[0];
        $json = Http::fsockopenDownload($url);
        if ($json == false) {
            $json = file_get_contents($url);
        }
        $json = json_decode($json, true);
        $str = $json['text']['content'];
        return $str;
    }

    function mengjian($name)
    {
        $name = array_merge($name);
        if (empty($name))
            return '周公睡着了,无法解此梦,这年头神仙也偷懒';
        $data = M('Dream')->field('content')->where("`title` LIKE '%" . $name[0] . "%'")->find();
        if (empty($data))
            return '周公睡着了,无法解此梦,这年头神仙也偷懒';
        return $data['content'];
    }

    function test($name, $data)
    {
        file_put_contents($name, $data);
    }

    function gupiao($name)
    {
        $name = array_merge($name);
        $url = "http://api2.sinaapp.com/search/stock/?appkey=0020130430&appsecert=fa6095e113cd28fd&reqtype=text&keyword=" . $name[0];
        $json = Http::fsockopenDownload($url);
        if ($json == false) {
            $json = file_get_contents($url);
        }
        $json = json_decode($json, true);
        $str = $json['text']['content'];
        return $str;
    }

    function getmp3($data)
    {
        $obj = new getYu();
        $ContentString = $obj->getGoogleTTS($data);
        $randfilestring = 'mp3/' . NOW_TIME . '_' . sprintf('%02d', rand(0, 999)) . ".mp3";
        file_put_contents($randfilestring, $ContentString);
        return rtrim(C('site_url'), '/') . $randfilestring;
    }

    function xiaohua()
    {
        $str = 'http://api.ajaxsns.com/api.php?key=free&appid=0&msg=' . urlencode('笑话');
        $json = json_decode(file_get_contents($str));
        $str = str_replace('{br}', "\n", $json->content);
        return str_replace('mzxing_com', 'nicedog', $str);
    }

    //聊天
    function liaotian($name)
    {
        $name = array_merge($name);
        $this->chat($name[0]);
    }

    function chat($name)
    {
        $this->requestdata('textnum');
        $check = $this->user('connectnum');
        if ($check['connectnum'] != 1) {
            return C('connectout');
        }
        if ($name == "你叫什么" || $name == "你是谁") {
            return '咳咳，我是聪明与智慧并存的美女，主淫你可以叫我' . $this->my . ',人家刚交男朋友,你不可追我啦';
        } elseif ($name == "你父母是谁" || $name == "你爸爸是谁" || $name == "你妈妈是谁") {
            return '主人,' . $this->my . '是NiceDog创造的,所以他们是我的父母,不过主人我属于你的';
        } elseif ($name == '糗事') {
            $name = '笑话';
        } elseif ($name == '网站' || $name == '官网' || $name == '网址' || $name == '3g网址') {
            return "【百度官网网址】\nwww.baidu.com\n【百度服务综旨】\n化繁为简,让菜鸟(pig)也能使用强大的系统!";
        }
        $str = 'http://api.ajaxsns.com/api.php?key=free&appid=0&msg=' . urlencode($name);
        $json = json_decode(file_get_contents($str));
        $str = str_replace('菲菲', $this->my, str_replace('提示：', $this->my . '提醒您:', str_replace('{br}', "\n", $json->content)));
        return $str;
    }

    public function fistMe($data)
    {
        if ('event' == $data['MsgType'] && 'subscribe' == $data['Event']) {
            return $this->help();
        }
    }

    public function help()
    {
        $data = M('Areply')->where(array('token' => $this->token))->find();
        return array(
            preg_replace("/(\015\012)|(\015)|(\012)/", "\n", $data['content']),
            'text'
        );
    }

    function error_msg($data)
    {
        return '没有找到' . $data . '相关的数据';
    }

    public function user($action, $keyword = '')
    {
        $user = M('Wxuser')->field('uid')->where(array(
            'token' => $this->token
        ))->find();
        $usersdata = M('Users');
        $dataarray = array(
            'id' => $user['uid']
        );
        $users = $usersdata->field('gid,diynum,connectnum,activitynum,viptime')->where(array(
            'id' => $user['uid']
        ))->find();
        $group = M('User_group')->where(array(
            'id' => $users['gid']
        ))->find();
        if ($users['diynum'] < $group['diynum']) {
            $data['diynum'] = 1;
            if ($action == 'diynum') {
                $usersdata->where($dataarray)->setInc('diynum');
            }
        }
        if ($users['connectnum'] < $group['connectnum']) {
            $data['connectnum'] = 1;
            if ($action == 'connectnum') {
                $usersdata->where($dataarray)->setInc('connectnum');
            }
        }
        if ($users['viptime'] > NOW_TIME) {
            $data['viptime'] = 1;
        }
        return $data;
    }

    //基本模块请求数据
    public function requestdata($field)
    {
        $data['year'] = date('Y');
        $data['month'] = date('m');
        $data['day'] = date('d');
        $data['token'] = $this->token;
        $data['wecha_id'] = $this->wecha_id;
        $data['module'] = 'Public';
        $mysql = M('Requestdata');
        $check = $mysql->field('id')->where($data)->find();
        if ($check == false) {
            $data['time'] = NOW_TIME;
            $data[$field] = 1;
            $mysql->add($data);
        } else {
            $mysql->where($data)->setInc($field);
            $this->addLimit();
        }
    }
    //业务模块请求数据
    public function trackdata($module){
        $data['year'] = date('Y');
        $data['month'] = date('m');
        $data['day'] = date('d');
        $data['token'] = $this->token;
        $data['wecha_id'] = $this->wecha_id;
        $data['module'] = $module;
        $mysql = M('Requestdata');
        $check = $mysql->field('id')->where($data)->find();
        if ($check == false) {
            $data['time'] = NOW_TIME;
            $data['click']  = 1;
            $mysql->add($data);
        } else {
            $mysql->where($data)->setInc('click');
            $this->addLimit();
        }
    }
    /*
         * 添加用户限制INFO
         */
    public function addLimit(){
        $db=M('WxuserInfo');
        $data['token'] = $this->token;
        $data['month']      = date('m');
        $data['year']       = date('Y');
        $userinfo = $db->where($data)->find();
        if (!$userinfo){
            //获取最近的历史数据
            $userinfo = $db->where(array('token'=>$this->token))->order('year desc,month desc')->find();
            $userinfo['monthnum'] = 1;
            $userinfo['requestnum']++;
            $userinfo['month']    = date('m');
            $userinfo['year']     = date('Y');
            unset($userinfo['id']);
            $db->data($userinfo)->add();
            return true;
        }else{
            if ($userinfo['monthnum']<$userinfo['monthall']){
                $db->where($data)->setInc('requestnum');
                $db->where($data)->setInc('monthnum');
                return true;
            }else{
                return false;
            }
        }
    }


    function baike($name)
    {
        $name = implode('', $name);
        if ($name == 'nicedog') {
            return '世界上最牛B的微信营销系统，两天前被腾讯收购，当然这只是一个笑话';
        }
        $name_gbk = iconv('utf-8', 'gbk', $name);
        $encode = urlencode($name_gbk);
        $url = 'http://baike.baidu.com/list-php/dispose/searchword.php?word=' . $encode . '&pic=1';
        $get_contents = $this->httpGetRequest_baike($url);
        $get_contents_gbk = iconv('gbk', 'utf-8', $get_contents);
        preg_match("/URL=(\S+)'>/s", $get_contents_gbk, $out);
        $real_link = 'http://baike.baidu.com' . $out[1];
        $get_contents2 = $this->httpGetRequest_baike($real_link);
        preg_match('#"Description"\scontent="(.+?)"\s\/\>#is', $get_contents2, $matchresult);
        if (isset($matchresult[1]) && $matchresult[1] != "") {
            return htmlspecialchars_decode($matchresult[1]);
        } else {
            return "抱歉，没有找到与“" . $name . "”相关的百科结果。";
        }
    }

    function httpGetRequest_baike($url)
    {
        $headers = array(
            "User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:14.0) Gecko/20100101 Firefox/14.0.1",
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            "Accept-Language: en-us,en;q=0.5",
            "Referer: http://www.baidu.com/"
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);
        if ($output === FALSE) {
            return "cURL Error: " . curl_error($ch);
        }
        return $output;
    }

    public function get_tags($title, $num = 10)
    {
        vendor('Pscws.Pscws4', '', '.class.php');
        $pscws = new PSCWS4();
        $pscws->set_dict(CONF_PATH . 'etc/dict.utf8.xdb');
        $pscws->set_rule(CONF_PATH . 'etc/rules.utf8.ini');
        $pscws->set_ignore(true);
        $pscws->send_text($title);
        $words = $pscws->get_tops($num);
        $pscws->close();
        $tags = array();
        foreach ($words as $val) {
            $tags[] = $val['word'];
        }
        return implode(',', $tags);
    }
}

?>