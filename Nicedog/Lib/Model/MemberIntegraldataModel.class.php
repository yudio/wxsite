<?php
	class MemberIntegraldataModel extends Model{

	protected $_validate = array(
			array('score','require','积分不能为空！'),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'), // 对createtime字段在更新的时候写入当前时间戳);
        array('year','getYear',MODEL::MODEL_INSERT,'callback'),
        array('month','getMon',MODEL::MODEL_INSERT,'callback'),
        array('day','getDay',MODEL::MODEL_INSERT,'callback'),
    );
    //type  0 减少积分  1手动增积分                    7签到

    public function getYear(){
        return date('Y');
    }

    public function getMon(){
        return date('m');
    }

    public function getDay(){
        return date('d');
    }
}

?>