<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-4-6
 * Time: 下午5:29
 */

class WebAppAction extends WebAction{
    private $token;
    private $wxuid;
    private $wecha_id;
    private $wxuser;


    public function _initialize(){
        parent::_initialize();
        /*$agent = $_SERVER['HTTP_USER_AGENT'];

        if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
            echo '此功能只能在微信浏览器中使用';exit;
        }*/
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');

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

        $this->wecha_id	= $this->_get('wecha_id');
        if (!$this->wecha_id||$this->wecha_id=='FromUserName'){
            $this->wecha_id='0';
        }
        $this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('wxuid',$this->wxuid);
        //
    }

    public function index(){
        $this->display();
    }


}