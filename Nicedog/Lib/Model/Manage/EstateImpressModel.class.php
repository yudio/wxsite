<?php
	class EstateImpressModel extends Model{

	protected $_validate = array(
	    array('title','require','印象名称不能为空',Model::MUST_VALIDATE),
        array('comment','require','印象数不能为空',Model::MUST_VALIDATE),
        array('pid','require','所属楼盘不能为空',Model::MUST_VALIDATE),
        array('pid','checkPid','所属楼盘不存在！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_BOTH),
        array('title','checkTitle','印象标题重复或格式不对！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
        array('pname','getPName',MODEL::MODEL_BOTH,'callback'),
	);

    function checkTitle(){
        $title = $_POST['title'];
        if (!preg_match('/^[\x{4e00}-\x{9fa5}]{4}$/u',$title)){//匹配中文
            return false;
        }
        $where['title'] = $title;
        $where['pid']   = $_POST['pid'];
        $where['token'] = session('token');
        $info = M('EstateImpress')->where($where)->find();
        if ($info){
            return false;
        }
        return true;
    }

    function checkPid(){
        $pid = $_POST['pid'];
        $pinfo = M('EstateSet')->field('id')->where('id='.$pid)->find();
        if ($pinfo){
            return true;
        }else{
            return false;
        }
    }

    function getPName(){
        $pid = $_POST['pid'];
        $pinfo = M('EstateSet')->field('title')->where('id='.$pid)->find();
        return $pinfo['title'];
    }

    function getUid(){
        return session('uid');
    }

    function getToken(){
        return session('token');
    }
}

?>