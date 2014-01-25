<?php
class IndexAction extends BaseAction{
	//关注回复
	public function index(){
        //测试接口记录
        $vo = M('Actlog');
        $arr = array();
        $arr['act_url'] = "HTTP";
        $arr['act_date'] = date("Y-m-d");
        $arr['act_data'] = "DATATATATATATATATD123";
        $arr['act_reply'] = "REPLY";
        $vo->add($arr);
        dump($vo);
        //$vo->add();
		$this->display();
	}
	public function resetpwd(){
		$uid=$this->_get('uid','intval');
		$code=$this->_get('code','trim');
		$rtime=$this->_get('resettime','intval');
		$info=M('Users')->find($uid);
		if( (md5($info['uid'].$info['password'].$info['email'])!==$code) || ($rtime<time()) ){
			$this->error('非法操作',U('Index/index'));
		}

		$this->assign('uid',$uid);
		$this->display();
	}
}