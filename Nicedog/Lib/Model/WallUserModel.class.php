<?php
	class WallUserModel extends Model{

	protected $_validate = array(
			//array('score','require','积分不能为空！'),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'), // 对createtime字段在更新的时候写入当前时间戳);
        array('update_time','time',MODEL::MODEL_BOTH,'function')
    );

}

?>