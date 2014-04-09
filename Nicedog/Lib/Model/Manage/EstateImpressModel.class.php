<?php
	class EstateImpressModel extends Model{

	protected $_validate = array(
			//array('keyword','require','关键词不能为空',MODEL::MODEL_INSERT),
            //array('keyword','insertKeyword','该关键字冲突！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
			array('title','require','相册名称不能为空',Model::MUST_VALIDATE),
            array('comment','require','印象数不能为空',Model::MUST_VALIDATE),
        array('pid','require','所属楼盘不能为空',Model::MUST_VALIDATE),
        array('pid','checkPid','所属楼盘不存在！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_BOTH),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
        array('pname','getPName',MODEL::MODEL_BOTH,'callback'),
	);

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