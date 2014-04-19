<?php
	class VcardModel extends Model{

	protected $_validate = array(
			//array('keyword','require','关键词不能为空',MODEL::MODEL_INSERT),
            //array('keyword','insertKeyword','该关键字冲突！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
			array('title','require','公司名称不能为空',Model::MUST_VALIDATE),
            array('keyword','require','关键词不能为空',Model::MUST_VALIDATE),
            array('keyword','insertKeyword','该关键字冲突！',MODEL::MUST_VALIDATE,'callback',MODEL::MODEL_INSERT),
	 );

	protected $_auto = array (
        array('create_time','time',MODEL::MODEL_INSERT,'function'),
        array('update_time','time',MODEL::MODEL_BOTH,'function'),
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
            $data['match_type'] = 1;
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
            $kdata['match_type'] = 1;
            $kdata['token'] = session('token');
            unset($kdata['id']);
            KeyWord::update($kdata,'VCard');
        }

        /*
         * 成功更新后添加关键字入库
         */
        protected function _after_update($data,$options) {
            $kdata = $data;
            $kdata['pid'] = $data['id'];
            $kdata['match_type'] = 1;
            $kdata['token'] = session('token');
            unset($kdata['id']);
            KeyWord::update($kdata,'VCard');
        }

    function getUid(){
        return session('uid');
    }

    function getToken(){
        return session('token');
    }
}

?>