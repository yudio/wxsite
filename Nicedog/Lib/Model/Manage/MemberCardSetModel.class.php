<?php
	class MemberCardSetModel extends Model{
	protected $_validate = array(
			array('cname','require','会员卡名称不能为空',1),
			array('instructions','require','会员卡使用说明不能为空',1),
            array('password','require','商家消费密码不能为空',1),
	 );
	protected $_auto = array (    
        //array('status','0'),  // 新增的时候把status字段设置为1
        array('kh_no','1'),
        array('create_time','time',MODEL::MODEL_INSERT,'function'), // 对create_time字段在更新的时候写入当前时间戳);
	);
}

?>