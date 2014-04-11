<?php
class TextModel extends Model{

	protected $_validate =array(
		array('text','require','内容不能为空',1),
		array('keyword','require','关键词不能为空',1),
		array('match_type','require','类型不能为空',1),
	);
	
	protected $_auto = array (
		array('uid','getuser',self::MODEL_INSERT,'callback'),
		array('uname','getname',self::MODEL_UPDATE,'callback'),
		array('createtime','time',self::MODEL_INSERT,'function'),
		array('text','string2br',self::MODEL_BOTH,'callback'),
		array('updatetime','time',self::MODEL_BOTH,'function'),
		array('token','gettoken',self::MODEL_INSERT,'callback'),
		array('click','0'),
	);
    //输出反转义内容
    /*protected function _after_find(&$result,$options) {
        $result['text'] = htmlspecialchars_decode($result['text']);
    }*/

    protected function _after_select(&$resultSet,$options) {
        foreach($resultSet as &$result){
            $result['text'] = htmlspecialchars($result['text'],ENT_QUOTES);
        }
    }

	function string2br(){
		return preg_replace("/(\015\012)|(\015)|(\012)/", "\n",$_POST['text']);
	
	}
	function getuser(){
		return session('uid');
	}
	
	function getname(){
		return session('uname');
	}
	
	function gettoken(){
		return session('token');
	}
	
}