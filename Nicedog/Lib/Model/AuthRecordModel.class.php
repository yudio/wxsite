<?php 
class AuthRecordModel extends Model {
    //自动完成
	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
	);
    /*

	//自动验证
	protected $_validate=array(
		array('username','require','用户名称必须！',1,'',3),
		array('username','','用户名称已经存在！',1,'unique',3), // 新增修改时候验证username字段是否唯一
	);*/

}