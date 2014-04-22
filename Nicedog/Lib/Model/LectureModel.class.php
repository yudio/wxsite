<?php
	class LectureModel extends Model{

    protected function _initialize() {
        LOG::write('LectureModel Init',LOG::ERR);
    }

	protected $_validate = array(
            array('keyword','require','关键词不能为空',MODEL::MUST_VALIDATE),
            array('keyword','insertKeyword','该关键字冲突！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
			array('title','require','标题不能为空',MODEL::MUST_VALIDATE),
            array('content','require','邀请函内容不能为空',MODEL::MUST_VALIDATE),
            array('address','require','活动地点不能为空',MODEL::MUST_VALIDATE),
            array('activity_time','require','活动时间不能为空',MODEL::MUST_VALIDATE),
			array('info','require','订单详情不能为空',MODEL::MUST_VALIDATE),
            array('tel','require','联系电话不能为空',MODEL::MUST_VALIDATE),
	 );
	protected $_auto = array (
        array('status','0'),  // 新增的时候把status字段设置为0
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
        array('stime','getstime',MODEL::MODEL_BOTH,'callback'),
        array('etime','getetime',MODEL::MODEL_BOTH,'callback'),
        array('token','getToken',MODEL::MODEL_INSERT,'callback'),
        array('uid','getUid',MODEL::MODEL_INSERT,'callback'),
	);

        /*
         * 加载数据时验证关键字冲突
         */
        function insertKeyword(){
            $data['pid']     = 0;
            $data['token']   = session('token');
            $data['keyword'] = $_POST['keyword'];
            $keymatch = Keyword::select($data);
            if (count($keymatch)>1){
                return false;
            }
            return true;
        }

        /*
         * 成功新增后添加关键字入库
         */
        protected function _after_insert($data,$options) {
            $kdata = $data;
            $kdata['pid'] = $data['id'];
            $kdata['token'] = session('token');
            $kdata['match_type'] = 1;
            unset($kdata['id']);
            KeyWord::update($kdata,'Lecture');
        }

        /*
         * 成功更新后添加关键字入库
         */
        protected function _after_update($data,$options) {
            $kdata = $data;
            $kdata['pid'] = $data['id'];
            $kdata['token'] = session('token');
            $kdata['match_type'] = 1;
            unset($kdata['id']);
            KeyWord::update($kdata,'Lecture');
        }

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