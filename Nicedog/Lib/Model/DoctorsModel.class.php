<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 14-5-28
 * Time: 下午4:16
 */
class DoctorsModel extends Model{
    protected $_validate =array(
        array('name','require','医生姓名不能为空',1),
        array('desc','require','个人简介不能为空',1),
    );

    protected $_auto = array (
        array('token','gettoken',self::MODEL_INSERT,'callback')
    );

    public function gettoken(){
        return session('token');
    }

} 