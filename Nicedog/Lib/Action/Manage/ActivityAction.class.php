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
    /*
     * 优惠券模块
     */
    public function couponList(){
        $db = D('Coupon');
        $where['token'] = session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('update_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as $key=>&$vo){
            $vo['sn_num'] = $vo['l_num_one'] + $vo['l_num_two'] + $vo['l_num_three'] + $vo['l_num_four'] + $vo['l_num_five'] + $vo['l_num_six'];
        }
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }
    //添加优惠券
    public function addCoupon(){
        $db = D('Coupon');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/activity/couponList.act'));
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()));
                }
            }else{
                if ($db->create()){
                    $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/activity/couponList.act'));
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()));
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->find($id);
            $this->assign('info',$info);
        }
        $this->display();
    }
    //更新优惠券状态
    public function updateCoupon(){
        $db = M('Coupon');
        $id = $this->_get('id','intval');
        $status = $this->_get('state','intval');
        if ($id){
            $data['id'] = $id;
            if ($status=='1'){
                $db->where($data)->save(array('status'=>$status));
                $vo = $db->where($data)->find();
                $vo['sn_num'] = $vo['l_num_one'] + $vo['l_num_two'] + $vo['l_num_three'] + $vo['l_num_four'] + $vo['l_num_five'] + $vo['l_num_six'];
                if ($vo['sn_num']>0){
                    $this->genSncode(array('type'=>'Coupon','pid'=>$vo['id'],'num'=>$vo['sn_num']));
                }
                $this->success('开始活动成功！','/npManage/activity/couponList.act');
            }else if ($status=='2'){
                $db->where($data)->save(array('status'=>$status));
                //TODO 更新SNcode库 状态
            }else{
                $this->error('该活动状态异常,请联系管理员!','/npManage/activity/couponList.act');
            }
        }else{
            $this->error('该活动不存在！','/npManage/activity/couponList.act');
        }
    }
    //删除优惠券
    public function delCoupon(){
        $db = D('Coupon');
        $id = $this->_get('id');
        if ($id){
            $where['id'] = $id;$where['token'] = session('token');
            $info = $db->where($where)->find();
            if ($info){
                $db->delete($id);
                KeyWord::delete(array('pid'=>$info['id'],'token'=>$info['token']),'Coupon');
                $this->success('成功删除！',U('CouponList'));
            }else{
                $this->error('记录不存在或已删除！',U('CouponList'));
            }
        }else{
            $this->error('参数错误！',U('CouponList'));
        }
    }

    //获取外链数据
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
        if ($type=='coupon'){
            $db = M('Coupon');
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

    //Sncode列表
    public function snlist(){
        $db = M('Sncode');
        $id = $this->_get('pid','intval');
        $type = $this->_get('type');
        $status = $this->_get('state');
        if($type&&$id){
            $where['pid'] = $id;
            $where['type'] = $type;
            $where['token'] = session('token');
            $count = $db->where($where)->count();
            if ($status){
                $where['status'] = $status;
            }
            $list = $db->where($where)->select();
            $where['status'] = 2;
            $sentnum = $db->where($where)->count();
            $where['status'] = 3;
            $usenum = $db->where($where)->count();
            $this->assign('count',$count);  //奖品总数
            $this->assign('sentnum',$sentnum);  //抽中未兑奖
            $this->assign('usenum',$usenum);    //抽中已兑奖
            $this->assign('list',$list);
        }
        $this->assign('pid',$id);
        $this->assign('type',$type);
        $this->assign('state',$status);
        $this->display();
    }

    protected function genSncode($data){
        $db = M('Sncode');
        $data['token'] = session('token');
        $data['create_time'] = NOW_TIME;
        $data['update_time'] = NOW_TIME;
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

}