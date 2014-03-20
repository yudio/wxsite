<?php
	class ReserveModel extends Model{


	protected $_validate = array(
			array('keyword','require','关键词不能为空',1),
			array('title','require','标题不能为空',1),
			array('info','require','订单详情不能为空',1),
            array('address','require','预约地址不能为空',1),
            array('tel','require','预约电话不能为空',1),
	 );
	protected $_auto = array (    
        array('status','0'),  // 新增的时候把status字段设置为0
        array('createtime','time',MODEL::MODEL_INSERT,'function'), // 对create_time字段在更新的时候写入当前时间戳);
        array('stime','getstime',MODEL::MODEL_BOTH,'callback'),
        array('etime','getetime',MODEL::MODEL_BOTH,'callback'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
	);

    function getstime(){
        $times = explode('-',$_POST['time']);
        LOG::write('getstime:'.$times[0],LOG::ERR);
        return strtotime($times[0]);
    }

    function getetime(){
        $times = explode('-',$_POST['time']);
        LOG::write('getetime:'.$times[1],LOG::ERR);
        return strtotime($times[1]);
    }

    function getToken(){
        return session('token');
    }

    function getUid(){
        return session('uid');
    }
}

?>