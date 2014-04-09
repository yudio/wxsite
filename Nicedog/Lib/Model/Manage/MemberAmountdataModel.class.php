<?php
	class MemberAmountdataModel extends Model{

	protected $_validate = array(
			array('price','require','金额不能为空！'),
	 );

	protected $_auto = array (
        array('createtime','time',MODEL::MODEL_INSERT,'function'), // 对createtime字段在更新的时候写入当前时间戳);
        array('year','getYear',MODEL::MODEL_INSERT,'callback'),
        array('month','getMon',MODEL::MODEL_INSERT,'callback'),
        array('day','getDay',MODEL::MODEL_INSERT,'callback'),
    );

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