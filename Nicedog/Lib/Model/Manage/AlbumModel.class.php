<?php
	class AlbumModel extends Model{


	protected $_validate = array(
			array('keyword','require','关键词不能为空',1),
			array('title','require','标题不能为空',1)
	 );
	protected $_auto = array (
        array('createtime','time',MODEL::MODEL_INSERT,'function'), // 对create_time字段在更新的时候写入当前时间戳);
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
	);

    function getToken(){
        return session('token');
    }
}

?>