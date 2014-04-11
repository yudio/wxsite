<?php
	class EstateHouseModel extends Model{

	protected $_validate = array(
			//array('keyword','require','关键词不能为空',MODEL::MODEL_INSERT),
            //array('keyword','insertKeyword','该关键字冲突！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
			array('name','require','户型名称不能为空',Model::MUST_VALIDATE),
            array('pid','require','子楼盘不能为空',Model::VALUE_VALIDATE),
            array('pid','checkPid','子楼盘不存在！',MODEL::VALUE_VALIDATE,'callback',MODEL::MODEL_BOTH),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
        array('pname','getPName',MODEL::MODEL_BOTH,'callback'),
	);

    /*
     * 成功新增后添加记录外链
     */
    protected function _after_insert($data,$options) {
        $adb = D('EstateAlbum');
        $kdata = $data;
        unset($kdata['id']);
        $kdata['type'] = 0;//户型相册
        $kdata['title'] = $data['name'];
        $kdata['pid'] = isset($data['pid'])?M('EstateCategory')->field('pid')->where('id='.$data['pid'])->find()['pid']:'';
        $adb->create($kdata);
        $adb->pname = isset($kdata['pid'])?M('EstateSet')->field('title')->where('id='.$kdata['pid'])->find()['title']:'';
        $abid = $adb->add();
        if ($abid){
            M('EstateHouse')->data(array('id'=>$data['id'],'abid'=>$abid))->save();
        }
    }
    /*
     * 成功更新后添加记录外链
     */
    protected function _after_update($data,$options) {
        $adb = D('EstateAlbum');
        LOG::write('ABID:'.$data['abid'],LOG::ERR);
        if (!$data['abid']){
            $kdata['type'] = 0;//户型相册
            $kdata['title'] = $data['name'];
            $kdata['pid'] = isset($data['pid'])?M('EstateCategory')->field('pid')->where('id='.$data['pid'])->find()['pid']:'';
            $adb->create($kdata);
            $adb->pname = isset($kdata['pid'])?M('EstateSet')->field('title')->where('id='.$kdata['pid'])->find()['title']:'';
            $abid = $adb->add();
            if ($abid){
                M('EstateHouse')->data(array('id'=>$data['id'],'abid'=>$abid))->save();
            }
        }else{
            $kdata['id'] = $data['abid'];
            $kdata['title'] = $data['name'];
            $kdata['pid'] = isset($data['pid'])?M('EstateCategory')->field('pid')->where('id='.$data['pid'])->find()['pid']:'';
            $adb->create($kdata);
            $adb->pname = isset($kdata['pid'])?M('EstateSet')->field('title')->where('id='.$kdata['pid'])->find()['title']:'';
            $adb->save();
            M('EstateHouse')->data(array('id'=>$data['id'],'abid'=>$data['abid']))->save();
        }
    }

    function checkPid(){
        $pid = $_POST['pid'];
        $pinfo = M('EstateCategory')->field('id')->where('id='.$pid)->find();
        if ($pinfo){
            return true;
        }else{
            return false;
        }
    }

    function getPName(){
        $pid = $_POST['pid'];
        if ($pid){
            $pinfo = M('EstateCategory')->field('title')->where('id='.$pid)->find();
            return $pinfo['title'];
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