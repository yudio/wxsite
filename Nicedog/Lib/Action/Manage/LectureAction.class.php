<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-14
 * Time: 下午9:22
 */

class LectureAction extends UserAction{

    public function _initialize() {
        parent::_initialize();
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');
        /*if(session('gid')==1){
            $this->error('vip0无法使用微活动,请充值后再使用','/npManage/account/home.php');
        }*/
    }

    /*
     * 微报告列表
     */
    public function lectureList(){
        $db =D('Lecture');
        $where['token'] = session('token');
        $key = $this->_get('keyword');
        if ($key){
            $where['keyword'] = array('like','%'.trim($key).'%');
        }
        //$where['type']  = array(array('eq',2),array('eq',3),'OR');
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('create_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }
    /*
     * 新增微报告
     */
    public function addLecture(){
        $db = D('Lecture');
        if (IS_POST){
            $id = $this->_post('id','intval');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/Lecture/lectureList.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/Lecture/lectureList.act'),'JSON');
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

    /*
     * 删除微报告
     */
    public function delLecture(){
        $where['id']=$this->_get('id','intval');
        $where['token']=session('token');
        $db = D('Lecture');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            M('Keyword')->where(array('pid'=>$info['id'],'module'=>'Lectured','token'=>session('token')))->delete();
            $this->ajaxReturn(array('errno'=>'0','error'=>'删除成功','url'=>'/npManage/business/LecturedList.act'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>'微预约不存在!'),'JSON');
        }
    }

    /*
     * 微报告记录列表
     */
    public function lectureRecordList(){
        $db = M('LectureRecord');
        $rid = $this->_get('rid','intval');
        if ($rid){
            $where['rid'] = $rid;
        }
        //搜索 － 订单状态
        $state = $this->_get('state');
        if ($state){
            $where['status'] = $state;
        }
        //搜索 - 客户名字
        $key = $this->_get('key');
        if ($key){
            $where['name'] = array('like','%'.$key.'%');
        }

        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('create_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($list as &$vo){
            $vo['lecture'] = M('Lecture')->find($vo['rid'])['title'];
        }
        //等待客服电话
        $where['status'] = 0;
        $waitCount = $db->where($where)->count();
        //成功预定
        $where['status'] = 1;
        $passCount = $db->where($where)->count();
        //失败预定
        $where['status'] = 2;
        $failCount = $db->where($where)->count();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('waitCount',$passCount);
        $this->assign('passCount',$passCount);
        $this->assign('failCount',$failCount);
        $this->display();
    }

    /*
     * 微报告记录详细页
     */
    public function lectureRecordDetail(){
        $db = M('LectureRecord');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        $this->assign('info',$info);
        $this->display();
    }

    /*
     * 审核微报告记录
     */
    public function updatelectureRecord(){
        $db = M('LectureRecord');
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

    /*
     * 删除微报告记录
     */
    public function dellectureRecord(){
        $db = M('LectureRecord');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'记录不存在或已被删除！'),'JSON');
        }
    }

    /*
     * 微报告用户列表
     */
    public function lectureuserList(){
        $db =D('LectureUser');
        $where['token'] = session('token');
        $key = $this->_get('keyword');
        if ($key){
            $where['keyword'] = array('like','%'.trim($key).'%');
        }
        //$where['type']  = array(array('eq',2),array('eq',3),'OR');
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('update_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }
    /*
     * 删除微报告用户
     */
    public function dellectureUser(){
        $db = M('LectureUser');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'记录不存在或已被删除！'),'JSON');
        }
    }

    /*
     * 微报告统计
     */
    public function myLecture(){
        $db = M('LectureRecord');
        $pointstart = mktime (0,0,0,date("m")-2,date("d")-1,  date("Y"));
        $lastmonth = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
        $thisday   = mktime(0,0,0,date('m'),date('d'),date('Y'));
        $lastday   = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
        $today     = time();
        $list = $db->query("select count(*) as num,DATE_FORMAT(FROM_UNIXTIME(a.createtime),'%Y-%m-%d') as e,floor((a.createtime-{$lastmonth})/24/3600) as day from __TABLE__ a where a.createtime > {$lastmonth} and a.createtime < {$today} and a.token = '{$_SESSION['token']}' group by e order by e");
        $tonum = $db->query("select count(*) as num from __TABLE__ a where a.createtime > {$thisday} and a.token = '{$_SESSION['token']}'");
        $lanum = $db->query("select count(*) as num from __TABLE__ a where a.createtime > {$lastday} and a.token = '{$_SESSION['token']}'");
        $total = $db->where(array('token'=>session('token'),'del_flag'=>'0'))->count();
        $num  = round(($today-$lastmonth)/24/3600);
        $this->assign('pointstart',$pointstart);
        $this->assign('start',$lastmonth);
        $this->assign('today',$today);
        $this->assign('list',$list);
        $this->assign('num',$num);
        $this->assign('tonum',$tonum[0]['num']);//今日新增预约
        $this->assign('lanum',$lanum[0]['num']-$tonum[0]['num']);
        $this->assign('total',$total);
        $this->display();
    }

} 