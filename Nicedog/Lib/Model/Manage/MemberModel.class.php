<?php
	class WallModel extends Model{

	protected $_validate = array(

	 );

	protected $_auto = array (
        array('status',0),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
	);

    function getUid(){
        return session('uid');
    }

    function getToken(){
        return session('token');
    }
}

?>