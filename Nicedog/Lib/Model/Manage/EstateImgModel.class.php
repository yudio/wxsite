<?php
	class EstateImgModel extends Model{

	protected $_validate = array(
			//array('keyword','require','关键词不能为空',MODEL::MODEL_INSERT),
            //array('keyword','insertKeyword','该关键字冲突！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
			//array('title','require','相册名称不能为空',Model::MUST_VALIDATE),
            //array('pid','require','所属楼盘不能为空',Model::MUST_VALIDATE),
            //array('pid','checkPid','所属楼盘不存在！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_BOTH),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('sort',0,MODEL::MODEL_INSERT),
        array('status',0,MODEL::MODEL_INSERT),
	);


    function getToken(){
        return session('token');
    }
}

?>