<?php
	class EstateSpaceModel extends Model{

	protected $_validate = array(
			array('title','require','全景图标题不能为空',Model::MUST_VALIDATE),
            array('pid','require','户型不能为空',Model::VALUE_VALIDATE),
            array('pid','checkPid','户型不存在！',MODEL::VALUE_VALIDATE,'callback',MODEL::MODEL_BOTH),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
        array('pname','getPName',MODEL::MODEL_INSERT,'callback'),
	);

    /*
     * 成功新增后添加记录外链
     */
    protected function _after_insert($data,$options) {
        $adb = M('EstateAlbum');
        $kdata['type'] = 3;//三维图相册
        $kdata['title'] = $data['title'];
        $kdata['pid']   = $data['pid'];//指向户型
        $kdata['pname'] = $data['pname'];
        $kdata['create_time'] = time();
        $kdata['token'] = $data['token'];
        $kdata['uid']   = $data['uid'];
        $abid = $adb->data($kdata)->add();
        M('EstateSpace')->data(array('id'=>$data['id'],'abid'=>$abid))->save();
    }
    /*
     * 成功更新后添加记录外链
     */
    protected function _after_update($data,$options) {
        $adb = M('EstateAlbum');
        $kdata['id']   = $data['abid'];
        $kdata['title'] = $data['title'];
        $kdata['update_time'] = time();
        $adb->data($kdata)->save();
    }

    function checkPid(){
        $pid = $_POST['pid'];
        $pinfo = M('EstateHouse')->field('id')->where('id='.$pid)->find();
        if ($pinfo){
            return true;
        }else{
            return false;
        }
    }

    function getPName(){
        $pid = $_POST['pid'];
        if ($pid){
            $pinfo = M('EstateHouse')->field('name')->where('id='.$pid)->find();
            return $pinfo['name'];
        }else{
            return "";
        }
    }

    function getUid(){
        return session('uid');
    }

    function getToken(){
        return session('token');
    }
}

?>