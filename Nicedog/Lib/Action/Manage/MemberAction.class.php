<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-28
 * Time: 上午11:17
 */

class MemberAction extends UserAction{
    public function _initialize() {
        parent::_initialize();
        $token = session('token');
        $db=M("Wxuser");
        //获取所在组的开卡数量
        $thisWxUser=$db->where(array('token'=>$token))->find();
        $thisUser=M("Users")->where(array('id'=>$thisWxUser['uid']))->find();
        $thisGroup=M("User_group")->where(array('id'=>$thisUser['gid']))->find();
        $db->where(array('token'=>$token))->save(array('allcardnum'=>$thisGroup['create_card_num']));
        $can_cr_num = $thisWxUser['allcardnum'] - $thisWxUser['yetcardnum'];
        if($can_cr_num > 0){
            $data['cardisok'] = 1;
            $db->where(array('uid'=>session('uid'),'token'=>session('token')))->save($data);
        }
    }

    //商家设置
    public function setBusiness(){
        $db = D('Member_card_info');
        if (IS_POST){
            $_POST['token'] = session('token');
            $id = $this->_post('id');
            $_POST['class'] = $this->_post('category_f').'/'.$this->_post('category_s');//兼容旧系统
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/setBusiness.act'));
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/setBusiness.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token')))->find();
            $this->assign('info',$info);
        }
        $this->display();
    }

    //会员卡配置
    public function addcard(){
        $token_open=M('token_open')->field('queryname')->where(array('token'=>session('token')))->find();
        if(!strpos($token_open['queryname'],'huiyuanka')){
            $this->error('您还未开启该模块的使用权,请到功能模块中添加','/npManage/func/app.act');
        }
        $db = D('Member_card_set');
        if (IS_POST){
            $_POST['token'] = session('token');
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addcard.act'));
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addcard.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token')))->find();
            $this->assign('info',$info);
        }
        $this->display();
    }
    /*
     *
     * 微信用户管理aid:78071/keyword-input:samon/integral-grade:/type:
     */
    public function memberlist(){
        $type = $this->_get('type');
        $keys = $this->_get('keyword-input');
        $integral = $this->_get('integral-grade');
        $db=M('Userinfo');
        //$where['uid']=session('uid');
        $where['token']=session('token');
        if ($type){
            $where['type'] = $type;
        }
        if ($keys){$where['keyword'] = array('like','%'.$keys.'%');}
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->order('getcardtime DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }

}


?>