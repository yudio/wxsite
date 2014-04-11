<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-4-6
 * Time: 下午5:29
 */

class WebEstateAction extends BaseAction{
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
    public function estateset(){
        $db = D('EstateSet');
        $info = $db->where(array('token'=>$this->token))->find();
        $list = M('Album')->where(array('token'=>$this->token,'pid'=>$info['id']))->select();
        foreach($list as &$vo){
            $vo['count'] = M('AlbumImg')->where(array('pid'=>$vo['id'],'status'=>'0'))->count();
        }
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display();
    }

    public function showlist(){
        $db = M('Album');
        $id = $this->_get('pid','intval');
        $info = $db->where(array('token'=>$this->token,'id'=>$id))->find();
        $list = M('AlbumImg')->where(array('pid'=>$id))->select();

        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display('list');
    }

}