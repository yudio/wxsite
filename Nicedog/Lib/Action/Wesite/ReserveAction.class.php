<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-17
 * Time: 下午3:38
 */
class ReserveAction extends WebAction{
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
        if (!$this->wecha_id||$this->wecha_id=='FromUserName'){
            $this->wecha_id='0';
        }
        $this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('wxuid',$this->wxuid);
        //
    }
    public function index(){
        $db = D('Reserve');
        $rid = $this->_get('rid','intval');
        $info = $db->where(array('token'=>$this->token,'id'=>$rid))->find();
        $count = M('ReserveRecord')->where(array('token'=>$this->token,'rid'=>$rid,'wecha_id'=>$this->wecha_id))->count();
        $this->assign('info',$info);
        $this->assign('count',$count);
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
                        if ($num>=$info['allnums']){
                            $this->ajaxReturn(array('errno'=>'101','msg'=>'今日已经预约满额！'),'JSON');
                        }
                    }
                    if ($info['type']==3){
                        $where['rid'] = $rid;
                        $num = $db->where($where)->count();
                        if ($num>=$info['allnums']){
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