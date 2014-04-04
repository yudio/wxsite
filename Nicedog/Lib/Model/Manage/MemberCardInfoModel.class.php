<?php
	class MemberCardInfoModel extends Model{

    function _initialize() {
        //LOG::write('FILE:'.__FILE__,LOG::ERR);
    }

	protected $_validate = array(
			/*array('cname','require','会员卡名称不能为空',1),
			array('instructions','require','会员卡使用说明不能为空',1),
            array('password','require','商家消费密码不能为空',1),*/
	 );
	protected $_auto = array (
        array('keyword','getKeyword',Model::MODEL_BOTH,'callback'),
        array('token','getToken',Model::MODEL_INSERT,'callback'),
        array('create_time','time',MODEL::MODEL_INSERT,'function'), // 对create_time字段在更新的时候写入当前时间戳);
	);

    public function getToken(){
        return session('token');
    }

    public function getKeyword(){
        $keys = $_POST['keyword'];
        $keys = mb_strtoupper($keys,'UTF-8');
        return preg_replace('/\s{2,}/', ' ', $keys);
    }

}

?>