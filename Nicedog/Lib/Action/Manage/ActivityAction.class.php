<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-7
 * Time: 上午11:59
 */

class ActivityAction extends UserAction{

    public function _initialize() {
        parent::_initialize();
        if(session('gid')<=1){
            $this->error('vip0无法使用微活动,请充值后再使用','/npManage/account/home.php');
        }
        C('TMPL_FILE_DEPR','/');
    }

    //大转盘
    public function addLottery(){
        C('TOKEN_ON',false);
        $db = D('Lottery');
        if (IS_POST){
            $id = $this->_post('id','intval');
            if ($id){//更新操作
                LOG::write('Lottery save',LOG::ERR);
                if ($db->create()){
                    $data['pid']    = $id;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $db->save();
                    Keyword::update($data,'Lottery');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/activity/lotteryList.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                LOG::write('Lottery add'.$_POST['time'],LOG::ERR);
                if ($db->create()){
                    $data['pid']     = 0;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'Lottery');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/activity/lotteryList.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }
        }
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->where(array('id'=>$id))->find();
            $this->assign('info',$info);
        }
        $this->display();
    }

    public function getActivityJSON(){
        LOG::write('getActivityJSON',LOG::ERR);
        $act= $this->_post('action');
        $type = $this->_post('type');
        if ($type=='lottery'){
            $db = M('Lottery');
            $where['token'] = session('token');
            $time = time();
            $where['stime'] = array('lt',$time);
            $where['etime'] = array('gt',$time);
            $where['status'] = 1;
            $list = $db->where($where)->select();
            if($list){
                foreach($list as &$vo){
                    $vo['start_time'] = date('Y-m-d H:i:s',$vo['stime']);
                    $vo['end_time'] = date('Y-m-d H:i:s',$vo['etime']);
                }
                $this->ajaxReturn(array('success'=>true,'counts'=>count($list),'data'=>$list),'JSON');
            }
        }

        $this->ajaxReturn(array('success'=>true,'counts'=>0,'data'=>array()),'JSON');
    }

    public function lotteryList(){
        $db = M('Lottery');
        $user=M('Users')->field('gid,activitynum')->where(array('id'=>session('uid')))->find();
        $group=M('User_group')->where(array('id'=>$user['gid']))->find();
        $this->assign('group',$group);
        $this->assign('activitynum',$user['activitynum']);
        $list=M('Lottery')->where(array('token'=>session('token'),'type'=>1))->select();
        foreach($list as $key=>&$vo){
            $vo['sn_num'] = $vo['l_num_one'] + $vo['l_num_two'] + $vo['l_num_three'] + $vo['l_num_four'] + $vo['l_num_five'] + $vo['l_num_six'];
        }
        $this->assign('count',count($list));
        $this->assign('list',$list);
        $this->display();
    }

    public function updateLottery(){
        $db = M('Lottery');
        $id = $this->_get('id','intval');
        $status = $this->_get('status','intval');
        if ($id){
            $data['id'] = $id;
            if ($status=='1'){
                $db->where($data)->save(array('status'=>$status));
                $vo = $db->where($data)->find();
                $vo['sn_num'] = $vo['l_num_one'] + $vo['l_num_two'] + $vo['l_num_three'] + $vo['l_num_four'] + $vo['l_num_five'] + $vo['l_num_six'];
                if ($vo['sn_num']>0){
                    $this->genSncode(array('type'=>'Lottery','pid'=>$vo['id'],'num'=>$vo['sn_num']));
                }
                $this->success('开始活动成功！','/npManage/activity/lotteryList.act');
            }else if ($status=='2'){
                $db->where($data)->save(array('status'=>$status));
                //TODO 更新SNcode库 状态
            }else{
                $this->error('该活动状态异常,请联系管理员!','/npManage/activity/lotteryList.act');
            }
        }else{
            $this->error('该活动不存在！','/npManage/activity/lotteryList.act');
        }

    }

    //Sncode列表
    public function snlist(){
        $db = M('Sncode');
        $id = $this->_get('pid','intval');
        $type = $this->_get('type');
        if($type&&$id){
            $list = $db->where(array('pid'=>$id,'type'=>$type,'token'=>session('token')))->select();
            $this->assign('list',$list);
        }
        $this->display();
    }

    protected function genSncode($data){
        $db = M('Sncode');
        $data['token'] = session('token');
        $data['createtime'] = time();
        $data['status']     = 1;
        for($i=0;$i<$data['num'];$i++){
            $data['sncode']     = $this->makeNID();
            $vo = $data;
            $db->add($vo);
        }
    }

    protected function makeNID(){
        $str = uniqid();
        $str =  preg_replace('/[a-z]/','',$str);
        $str = str_pad($str, 11, time(), STR_PAD_BOTH);
        return "N00{$str}";
    }

    //优惠券
    public function addCoupons(){

    }

    public function couponsList(){
        $this->display();
    }
}