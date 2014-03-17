<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-14
 * Time: 下午9:22
 */

class BusinessAction extends UserAction{

    public function _initialize() {
        parent::_initialize();
        C('TOKEN_ON',false);
        /*if(session('gid')==1){
            $this->error('vip0无法使用微活动,请充值后再使用','/npManage/account/home.php');
        }*/
    }

    //预约管理
    public function reserveList(){
        $db = M('Reserve');
        /*$user=M('Users')->field('gid,activitynum')->where(array('id'=>session('uid')))->find();
        $group=M('User_group')->where(array('id'=>$user['gid']))->find();
        $this->assign('group',$group);
        $this->assign('activitynum',$user['activitynum']);*/
        $list=M('Reserve')->where(array('token'=>session('token')))->select();
        $this->assign('count',count($list));
        $this->assign('list',$list);
        $this->display();
    }

    public function addReserve(){
        $db = D('Reserve');
        if (IS_POST){
            $id = $this->_post('id','intval');
            if ($id){//更新操作
                LOG::write('Reserve save',LOG::ERR);
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
                    Keyword::update($data,'Reserve');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/business/reserveList.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                LOG::write('Reserve add'.$_POST['time'],LOG::ERR);
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
                    Keyword::update($data,'Reserve');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/business/reserveList.act'),'JSON');
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

    public function delReserve(){
        $where['id']=$this->_get('id','intval');
        $where['token']=session('token');
        $db = D('Reserve');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            M('Keyword')->where(array('pid'=>$info['id'],'module'=>'Reserve','token'=>session('token')))->delete();
            $this->ajaxReturn(array('errno'=>'0','error'=>'删除成功','url'=>'/npManage/business/reserveList.act'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>'微预约不存在!'),'JSON');
        }
    }

    public function reserveRecordList(){
        $db = M('ReserveRecord');
        $where['rid'] = $this->_get('rid','intval');
        $list = $db->where($where)->select();
        //等待客服电话
        $where['status'] = 0;
        $waitCount = $db->where($where)->count();
        //成功预定
        $where['status'] = 1;
        $passCount = $db->where($where)->count();
        //失败预定
        $where['status'] = 2;
        $failCount = $db->where($where)->count();
        $this->assign('list',$list);
        $this->assign('count',count($list));
        $this->assign('waitCount',$passCount);
        $this->assign('passCount',$passCount);
        $this->assign('failCount',$failCount);
        $this->display();
    }

    public function reserveRecordDetail(){
        $db = M('ReserveRecord');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        $this->assign('info',$info);
        $this->display();
    }

    public function updateReserveRecord(){
        $db = M('ReserveRecord');
        $where['id'] = $this->_get('id','intval');
        $where['del_flag'] = '0';
        $status = $this->_get('state','intval');
        $order  = $this->_get('order_msg');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->data(array('status'=>$status,'order_msg'=>$order))->save();
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'记录不存在或已被删除！'),'JSON');
        }
    }

    public function delReserveRecord(){
        $db = M('ReserveRecord');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'记录不存在或已被删除！'),'JSON');
        }
    }


    //获取外链
    public function getBusinessJSON(){
        LOG::write('getBusinessJSON',LOG::ERR);
        $act= $this->_post('action');
        $type = $this->_post('type');
        if ($type=='reservation'){
            $db = M('Reserve');
            $where['token'] = session('token');
            $where['status'] = 0;
            $list = $db->where($where)->select();
            if($list){
                /*foreach($list as &$vo){
                    $vo['start_time'] = date('Y-m-d H:i:s',$vo['stime']);
                    $vo['end_time'] = date('Y-m-d H:i:s',$vo['etime']);
                }*/
                $this->ajaxReturn(array('success'=>true,'counts'=>count($list),'data'=>$list),'JSON');
            }
        }
    }





} 