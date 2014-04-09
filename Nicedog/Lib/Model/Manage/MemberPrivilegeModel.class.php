<?php
class MemberPrivilegeModel extends Model{

	protected $_validate =array(
		array('title','require','标题不能为空',3),
		array('content','require','内容不能为空',3),
	);
	
	protected $_auto = array (
		array('uid','getuser',self::MODEL_INSERT,'callback'),
		array('token','gettoken',self::MODEL_INSERT,'callback'),
        array('btime','getbtime',self::MODEL_INSERT,'callback'),
        array('etime','getetime',self::MODEL_INSERT,'callback'),
        array('crowd_type','getcrowdType',self::MODEL_BOTH,'callback'),
        array('updatetime','time',self::MODEL_BOTH,'function'),
	);
	
	public function getuser(){
		return session('uid');
	}

    function gettoken(){
        return session('token');
    }

    function getcrowdType(){
        $crowds = $_REQUEST['crowd_type'];
        foreach($crowds as $key=>$vo){
            if ($vo==0){return 0;}
        }
        return implode(',',$crowds);
    }
	//获取分类ID
	public function getbtime(){
		$id=explode('-',$_POST['time']);
		return strtotime($id[0]);
	}
	//获取分类名字
	public function getetime(){
		$id=explode('-',$_POST['time']);
		return strtotime($id[1]);
	}
	
}