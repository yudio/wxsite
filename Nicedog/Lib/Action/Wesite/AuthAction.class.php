<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-19
 * Time: 下午5:29
 */

class AuthAction extends WebAction{
    private $token;
    private $wxuid;
    private $wecha_id;
    private $wxuser;
    private $code;
    private $state;
    private $error;


    public function _initialize(){
        parent::_initialize();
        $agent = $_SERVER['HTTP_USER_AGENT'];

        if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
            echo '此功能只能在微信浏览器中使用';exit;
        }
        C('TOKEN_ON',false);

        $this->wxuid    = $this->_get('wxuid');
        if (!$this->wxuid){
            echo '该账号不存在！';exit;
        }
        $wxuser=D('Wxuser')->where(array('id'=>$this->wxuid))->find();
        if (!isset($this->token)){
            $this->token = $wxuser['token'];
        }
        $this->wxuser = $wxuser;
        $this->wxname     = $wxuser['wxname'];

        /*$this->wecha_id	= $this->_get('wecha_id');
        if (!$this->wecha_id||$this->wecha_id=='FromUserName'){
            $this->wecha_id='0';
        }*/

        $this->assign('wxname',$this->wxname);
        $this->assign('wxuid',$this->wxuid);
        //
    }
    public function redirect(){
        $code  = $this->_get('code');
        $state = $this->_get('state');
        if (!$code){
            echo "授权失败！";
            exit;
        }else{
            $authserv = new AuthService($this->wxuser);
            $this->code = $code;$this->state = $state;
            switch ($state){
                case 'official':
                    $json = $authserv->auth2($code);
                    if ($this->recordAuth($json)){
                        redirect(C('site_url').'/wesite/'.$this->wxuid.'/index?wecha_id='.$json['openid']);
                    }else{
                        echo "授权失败!".$this->error;
                    }
                    break;
                default:
                    echo "未定义的授权回调方式！";
            }
        }
    }

    public function recordAuth($data){
        $db = D('AuthRecord');
        if ($data['errcode']){ $this->error = $data['errmsg'];return false;}
        $data['token'] = $this->token;
        $data['code']  = $this->code;
        $data['state'] = $this->state;
        $db->create($data);
        $db->add();
        return true;
    }

}