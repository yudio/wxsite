<?php
class UserAction extends BaseAction{
	protected function _initialize(){
		parent::_initialize();
		$usergroup=M('User_group')->where(array('id'=>session('gid')))->find();
		$users=M('Users')->where(array('id'=>$_SESSION['uid']))->find();
		$this->assign('thisUser',$users);
		//dump($users);
		$this->assign('viptime',$users['viptime']);
		if(session('uid')){
			if($users['viptime']<time()){
				session(null);
				session_destroy();
				unset($_SESSION);
				$this->error('您的帐号已经到期，请充值后再使用');
			}
		}
        if (session('token')){
            $wecha=M('Wxuser')->field('id,wxname,wxid,headerpic,weixin')->where(array('token'=>session('token'),'uid'=>session('uid')))->find();
            $this->assign('wecha',$wecha);
            $this->assign('token',session('token'));
        }
		//
		$this->assign('usergroup',$usergroup);
		if(!session('uid')){
			$this->redirect('/npHome/Index/index.act',null,3,'请登录！');
		}else{
            $livetime = session('livetime');
            if ((time()-$livetime)>144000){
                $this->redirect('/npHome/Index/index.act',null,3,'请重新登录！');
            }else{
                session('livetime',time());
            }
        }
	}
}