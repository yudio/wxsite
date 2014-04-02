<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-17
 * Time: 下午3:38
 */
class MemberAction extends BaseAction{
    private $token;
    private $wxuid;
    private $wecha_id;
    private $wxuser;


    public function _initialize(){
        parent::_initialize();
        /*$agent = $_SERVER['HTTP_USER_AGENT'];

        if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
            echo '此功能只能在微信浏览器中使用';exit;
        }*/
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');  // tpl/default/wesite'/'member/*.html

        $this->wxuid    = $this->_get('wxuid');
        if (!$this->wxuid){
            echo '该账号不存在！';exit;
        }
        $wxuser=D('Wxuser')->where(array('id'=>$this->wxuid))->find();
        if (!isset($this->token)){
            $this->token = $wxuser['token'];
        }
        $this->wxuser = $wxuser;
        $this->wxname     = $wxuser['wxname'];

        $this->wecha_id	= $this->_get('wecha_id');
        LOG::write('WECHAT_ID:'.$this->wecha_id,LOG::ERR);
        if (!$this->wecha_id||$this->wecha_id=='FromUserName'){
            $this->wecha_id='0';
        }
        LOG::write('WECHAT_ID:'.$this->wecha_id,LOG::ERR);
        $this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('wxuid',$this->wxuid);
    }
    //会员卡页面
    public function index(){
        //用户已申请
        $user = D('MemberUser')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
        if ($user&&$user['status']){
            redirect('/Webmember/'.$this->wxuid.'/center?wecha_id='.$this->wecha_id);
        }
        if ($user){
            $this->assign('cardstatus',$user['status']);
        }
        $db = D('MemberCardInfo');
        $carddb = M('MemberCardSet');
        $info = $db->where(array('token'=>$this->token))->find();
        $infoset = $carddb->where(array('token'=>$this->token))->find();
        $mempriv = M('MemberPrivilege')->where(array('token'=>$this->token,'is_show'=>'1'))->find();
        $this->assign('info',$info);
        $this->assign('infoset',$infoset);
        $this->assign('mempriv',$mempriv);
        $this->display();
    }

    //领取会员卡
    public function addMember(){
        $db = D('MemberUser');
        if (IS_POST){
            $id = $db->field('id')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find()['id'];
            $_POST['token'] = $this->token;
            $_POST['wecha_id'] = $this->wecha_id;
            if ($id){
                $_POST['birthday'] = strtotime($_POST['birth_year'].'/'.$_POST['birth_month'].'/'.$_POST['birth_date']);
                $_POST['age']  = date('Y') - $_POST['birth_year'];
                $_POST['id'] = $id;
                $db->data($_POST)->save();
                $this->ajaxReturn(array('errno'=>0,'error'=>'更新成功!','url'=>'/Webmember/'.$this->wxuid.'/center?wecha_id='.$this->wecha_id),'JSON');
            }else{
                $_POST['birthday'] = strtotime($_POST['birth_year'].'/'.$_POST['birth_month'].'/'.$_POST['birth_date']);
                $_POST['age']  = date('Y') - $_POST['birth_year'];
                //会员卡是否审核
                $cardset = M('MemberCardSet')->field('audit')->where(array('token'=>$this->token))->find();
                $_POST['status'] = $cardset['audit'];
                /*$_POST['province'] = M('Location')->find($_POST['province'])['name'];
                $_POST['city'] = M('Location')->find($_POST['city'])['name'];
                $_POST['town'] = M('Location')->find($_POST['town'])['name'];*/
                if ($db->create()){
                    $db->add();
                    if ($cardset['audit']){
                        $this->ajaxReturn(array('errno'=>0,'error'=>'申请成功!','url'=>'/Webmember/'.$this->wxuid.'/center?wecha_id='.$this->wecha_id),'JSON');
                    }else{
                        $this->ajaxReturn(array('errno'=>0,'error'=>'审核中!','url'=>'/Webmember/'.$this->wxuid.'/index?wecha_id='.$this->wecha_id),'JSON');
                    }
                }else{
                    $this->ajaxReturn(array('errno'=>100,'error'=>$db->getError()),'JSON');
                }
            }
        }
        //用户已申请
        $user = D('MemberUser')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
        if ($user&&$user['status']){
            redirect('/Webmember/'.$this->wxuid.'/center?wecha_id='.$this->wecha_id);
        }
        if ($user&&$user['status']==0){
            redirect('/Webmember/'.$this->wxuid.'/index?wecha_id='.$this->wecha_id);
        }
        //加载会员卡资料项
        $db = D('MemberFieldSet');
        $infoset = $db->where(array('token'=>$this->token))->find();
        if ($infoset){
            $this->assign('infoset',$infoset);
        }
        $this->display();
    }
    //完善用户资料
    public function editmember(){
        $db = D('MemberFieldSet');
        $info = D('MemberUser')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
        $infoset = $db->where(array('token'=>$this->token))->find();
        if ($infoset&&$info){
            $this->assign('infoset',$infoset);
            $this->assign('info',$info);
        }
        $this->display();

    }

    //会员中心
    public function center(){
        $db = D('MemberUser');
        //会员卡信息
        $info =$db->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
        //会员卡设置
        $cardset = M('MemberCardSet')->where(array('token'=>$this->token))->find();
        //商家信息
        $cardinfo = M('MemberCardInfo')->where(array('token'=>$this->token))->find();
        //会员特权
        $mempriv = M('MemberPrivilege')->where(array('token'=>$this->token,'is_show'=>'1'))->find();

        $this->assign('info',$info);
        $this->assign('cardset',$cardset);
        $this->assign('cardinfo',$cardinfo);
        $this->assign('mempriv',$mempriv);
        $this->display();
    }

    public function submit(){
        $db = M('ReserveRecord');
        if (IS_POST){
            if (!$db->autoCheckToken($_POST)){
                // 令牌验证错误
                $this->ajaxReturn(array('errno'=>'1','msg'=>'请勿重复提交！'),'JSON');
            }
            $id = $this->_post('id','intval');
            $rid = $this->_post('rid','intval');
            $wecha_id = $this->_post('wecha_id');
            $_POST['token'] = $this->token;
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','msg'=>'预约成功！','url'=>'/reserve/'.$this->wxuid.'/showlist?rid='.$rid.'&wecha_id='.$wecha_id),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','msg'=>'空操作'),'JSON');
                    LOG::write('Reserve|submit'.$db->getError(),LOG::ERR);
                }
            }else{
                $info = M('Reserve')->where(array('id'=>$rid))->find();
                if (!$info){
                    $this->ajaxReturn(array('errno'=>'101','msg'=>'该预约已结束或删除！'),'JSON');
                }else{
                    $time = time();
                    if ($info['type']==1){
                        if ($info['stime']>time()||$info['etime']<time()){
                            $this->ajaxReturn(array('errno'=>'101','msg'=>'该预约已过期！'),'JSON');
                        }
                    }
                    if ($info['type']==2){
                        $where['createtime'] = array('lt',$time);                                      //小于现在
                        $where['createtime'] = array('gt',mktime(0,0,0,date('m'),date('d'),date('Y')));//大于今天
                        $where['rid'] = $rid;
                        $num = $db->where($where)->count();
                        if ($num=$info['allnums']){
                            $this->ajaxReturn(array('errno'=>'101','msg'=>'今日已经预约满额！'),'JSON');
                        }
                    }
                    if ($info['type']==3){
                        $where['rid'] = $rid;
                        $num = $db->where($where)->count();
                        if ($num=$info['allnums']){
                            $this->ajaxReturn(array('errno'=>'101','msg'=>'全部预约已经满额！'),'JSON');
                        }
                    }
                }

                $_POST['createtime'] = time();
                $_POST['del_flag']   = 0;
                $_POST['status']     = 0;
                if($db->create()){
                    $db->add();
                    $this->ajaxReturn(array('errno'=>'0','msg'=>'预约成功！','url'=>'/reserve/'.$this->wxuid.'/showlist?rid='.$rid.'&wecha_id='.$wecha_id),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','msg'=>$db->getError()),'JSON');
                }
            }
        }
    }

    public function showlist(){
        $db = M('ReserveRecord');
        $rid  = $this->_get('rid','intval');
        $where['del_flag'] = 0;
        $where['rid']      = $rid;
        $where['wecha_id'] = $this->wecha_id;
        $list = $db->where($where)->select();
        $info = M('Reserve')->where('id='.$rid)->find();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->display();
    }

    public function detail(){
        $db = M('ReserveRecord');
        $id  = $this->_get('id','intval');
        $rid = $this->_get('rid','intval');
        $where['del_flag'] = 0;
        $where['id']      = $id;
        $where['rid']     = $rid;
        $where['wecha_id'] = $this->wecha_id;
        $info = $db->where($where)->find();
        $this->assign('info',$info);
        $this->display();
    }

    public function delRecord(){
        $db = M('ReserveRecord');
        $id  = $this->_post('id','intval');
        $rid = $this->_post('rid','intval');
        $where['del_flag'] = 0;
        $where['id']       = $id;
        $where['rid']      = $rid;
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->data(array('del_flag'=>1))->save();
            $this->ajaxReturn(array('errno'=>'0','msg'=>'删除成功','url'=>'/reserve/'.$this->wxuid.'/showlist?rid='.$rid.'&wecha_id='.$info['wecha_id']),'JSON');
        }else{
            LOG::write('Reserve|delRecord'.$db->getError(),LOG::ERR);
            $this->ajaxReturn(array('errno'=>'1','msg'=>'删除失败'),'JSON');
        }
    }
}
function generateQRfromGoogle($chl,$widhtHeight ='150',$EC_level='L',$margin='0'){
    $chl = urlencode($chl);
    $src='http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl;
    return $src;
}
?>