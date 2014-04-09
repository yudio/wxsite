<?php
class MemberUserModel extends Model{
	protected $_validate =array(
		//array('token','require','TOKEN不能为空',1),
		//array('token','','token已经存在！',1,'unique',1),
	);
	
	protected $_auto = array (
		array('total_score','0',self::MODEL_INSERT),
		array('sign_score','0',self::MODEL_INSERT),
		array('amount','0',self::MODEL_INSERT),
        array('continuous','0',self::MODEL_INSERT),
        array('expend_score','0',self::MODEL_INSERT),
        array('expend_amount','0',self::MODEL_INSERT),
		array('getcardtime','time',self::MODEL_INSERT,'function'),
		array('livetime','time',self::MODEL_BOTH,'function'),
        array('card_no','getCardNo',self::MODEL_INSERT,'callback'),
		//array('typeid','gettypeid',self::MODEL_BOTH,'callback'),
	);

    public function chekWechatCardNums(){
		$data=M('User_group')->field('wechat_card_num')->where(array('id'=>session('gid')))->find();
		$users=M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->find();
		if($users['wechat_card_num']<$data['wechat_card_num']){
			//M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->setInc('wechat_card_num');
			return 0;
		}else{
			return 1;
		}
	
	}
    public function getCardNo(){
        $infoset = M('MemberCardSet')->where(array('token'=>$_POST['token']))->find();
        switch($infoset['kh_type']){
            case 0:
                $res = '1'.str_pad($infoset['kh_no'], 8, "0", STR_PAD_LEFT);
                M('MemberCardSet')->where(array('token'=>$_POST['token']))->setInc('kh_no');
                break;
            case 1:
                $res = $_POST['tel'];
                M('MemberCardSet')->where(array('token'=>$_POST['token']))->setInc('kh_no');
                break;
            case 2:
                $res = $infoset['cardno_prefix'].str_pad($infoset['kh_no'], 8-strlen($infoset['cardno_suffix']), "0", STR_PAD_LEFT).$infoset['cardno_suffix'];
                M('MemberCardSet')->where(array('token'=>$_POST['token']))->setInc('kh_no');
                break;
        }
        return $res;
    }
	
}