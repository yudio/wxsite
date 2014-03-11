<?php
	class LotteryModel extends Model{


	protected $_validate = array(
			array('keyword','require','关键词不能为空',1),
			array('title','require','兑奖信息不能为空',1),
			array('content','require','简介不能为空',1),
			array('stime','require','开始时间不能为空',1),
			array('etime','require','结束时间不能为空',1),
			array('info','require','活动说明不能为空',1),
			//array('aginfo','require','重复抽奖信息不能为空',1),
			array('end_title','require','活动结束公告内容不能为空',1),
			array('end_info','require','活动结束说明不能为空',1),
			array('l_name_one','require','一等奖奖品不能为空',1),
			array('l_num_one','require','一等奖奖品数量不能为空',1),
			array('probability','require','预计抽奖人数不能为空',1),
	 );
	protected $_auto = array (    
        array('status','1'),  // 新增的时候把status字段设置为1
        array('createtime','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳);
        array('sn_type','1'), //SN码自动生成
        array('l_luck_one','0'),
        array('l_luck_two','0'),
        array('l_luck_three','0'),
        array('l_luck_four','0'),
        array('l_luck_five','0'),
        array('l_luck_six','0'),
        array('stime','getstime',MODEL::MODEL_BOTH,'callback'),
        array('etime','getetime',MODEL::MODEL_BOTH,'callback'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
	);

    function getstime(){
        LOG::write('getstime',LOG::ERR);
        $times = explode('-',$_POST['time']);
        return strtotime($times[0]);
    }

    function getetime(){
        LOG::write('getetime',LOG::ERR);
        $times = explode('-',$_POST['time']);
        return strtotime($times[1]);
    }

    function getToken(){
        LOG::write('getToken',LOG::ERR);
        return session('token');
    }
}

?>