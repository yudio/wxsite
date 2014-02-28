<?php
class WxmenuModel extends Model{
	protected $_validate = array(
			array('name','require','菜单名称必须填写',1),
			array('key','require','关键字或链接内容必须填写',1),

	 );
	protected $_auto = array (		
		array('token','getToken',Model:: MODEL_BOTH,'callback'),
        array('uid','getuser',self::MODEL_INSERT,'callback'),
	);
	function getToken(){	
		return $_SESSION['token'];
	}
    public function getuser(){
        return session('uid');
    }
}

?>
