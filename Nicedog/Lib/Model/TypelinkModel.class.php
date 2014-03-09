<?php
class TypelinkModel extends Model{

	protected $_validate =array(
		array('pid','require','外链ID不能为空',1),
		array('module','require','外链模块不能为空',1),
        array('type','require','类型不能为空',1),
        array('typename','require','类型名不能为空',1),
	);
	
	protected $_auto = array (
		//array('url','geturl',self::MODEL_BOTH,'callback'),
	);
	
	public function geturl(){
        $type = $this->type;
        switch($type){
            case "link":
                return $this->link;
                break;
            default:
        }
		return "";
	}
	
}