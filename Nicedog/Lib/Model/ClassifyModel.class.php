<?php
class ClassifyModel extends Model{
	protected $_validate =array(
		array('name','require','分类名不能为空',1),
	);
	
	protected $_auto = array (
		array('token','gettoken',self::MODEL_INSERT,'callback'),
        array('url','getTypeLink',MODEL::MODEL_BOTH,'callback'),
        array('typename','getTypeName',MODEL::MODEL_BOTH,'callback'),
	);
	
	public function gettoken(){
		return session('token');
	}

    public function getTypeName(){
        $typemap = C('class_typemap');
        return $typemap[$_POST['type']];
    }

    /*
     * 通过TypeLink类生成链接地址
     */
    public function getTypeLink(){
        return TypeLink::getTypeLink($_POST,'Classify');
    }

    /*
     * 成功新增后添加记录外链
     */
    protected function _after_insert($data,$options) {
        $db = D('Typelink');
        $kdata = $_POST;
        $kdata['url'] = $data['url'];
        $kdata['pid'] = $data['id'];
        $kdata['module'] = 'Classify';
        $db->data($kdata)->add();
    }

    /*
     * 成功更新后添加记录外链
     */
    protected function _after_update($data,$options) {
        $db = D('Typelink');
        $kdata = $_POST;
        $kdata['typename'] = $this->getTypeName();
        LOG::write('KDATA:'.$kdata['typename'],LOG::ERR);
        $where['pid'] = $data['id'];
        $where['module'] = 'Classify';
        $vo = $db->where($where)->find();
        if ($vo){
            $kdata['id']  = $vo['id'];
            $kdata['url'] = $data['url'];
            $kdata['pid'] = $data['id'];
            $kdata['module'] = 'Classify';
            $db->data($kdata)->save();
        }else{
            unset($kdata['id']);
            $kdata['url'] = $data['url'];
            $kdata['pid'] = $data['id'];
            $kdata['module'] = 'Classify';
            $db->data($kdata)->add();
        }
    }
	
}