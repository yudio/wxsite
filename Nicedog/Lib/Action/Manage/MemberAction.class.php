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
        //验证权限
        $token_open=M('token_open')->field('queryname')->where(array('token'=>session('token')))->find();
        if(!strpos($token_open['queryname'],'huiyuanka')){
            $this->error('您还未开启该模块的使用权,请到功能模块中添加','/npManage/func/app.act');
        }
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
        $db = D('Member_card_set');
        if (IS_POST){
            $_POST['token'] = session('token');
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addcard.act'),'JSON');
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
    public function addmemfields(){
        //C('TOKEN_ON',false);
        $db = M('Member_field_set');
        if (IS_POST){
            $_POST['token'] = session('token');
            $_POST['uid']   = session('uid');
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addmemfields.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    if (!$_POST['name_is_edit']){$_POST['name_is_edit']=0;}
                    if (!$_POST['phone_is_edit']){$_POST['name_is_edit']=0;}
                    if (!$_POST['birthday_is_must']){$_POST['name_is_edit']=0;}
                    if (!$_POST['birthday_is_edit']){$_POST['name_is_edit']=0;}
                    if (!$_POST['gender_is_must']){$_POST['name_is_edit']=0;}
                    if (!$_POST['address_is_must']){$_POST['name_is_edit']=0;}
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addmemfields.act'),'JSON');
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
        $this->display('memberfields');
    }
    public function listmemberprivilege(){
        $db   = M('Member_card_privilege');
        $info = $db->where(array('token'=>session('token')))->select();
        $this->assign('info',$info);
        $this->display();
    }

    public function setCardLevel(){
        C('TOKEN_ON',false);
        $db = M('Member_card_level');
        $data = array();
        if (IS_POST){
            $data['token'] = session('token');
            $data['uid']   = session('uid');
            $data['basis'] = $this->_post('basis');

            $data['id']      = $this->_post('zid');
            $data['cname']   = $this->_post('sxname');
            $data['bscore']  = $this->_post('sxstarjf');
            $data['zk']      = $this->_post('sxzk');
            $data['type']    = 0;
            $this->updatecardlevel($data);

            $add = $_REQUEST['add'];
            foreach($add as $key=>$vo){
                $data['id']     = "";//新增ID自增
                $data['cname']  = $vo['name'];
                $data['bscore'] = $vo['startjf'];
                $data['escore'] = $vo['endjf'];
                $data['zk']     = $vo['zk'];
                $data['type']   = 1;
                $this->updatecardlevel($data);
            }
            $psarr = $_REQUEST['ps'];
            foreach($add as $key=>$vo){
                $data['id']     = $vo['id'];//新增ID自增
                $data['cname']  = $vo['name'];
                $data['bscore'] = $vo['startjf'];
                $data['escore'] = $vo['endjf'];
                $data['zk']     = $vo['zk'];
                $data['type']   = 1;
                $this->updatecardlevel($data);
            }
            $this->ajaxReturn(array('errno'=>'0','error'=>'更新成功！','url'=>'/npManage/member/setCardLevel.act'),'JSON');
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token'),'type'=>0))->find();
            $this->assign('info',$info);
            $list = $db->where(array('token'=>session('token'),'type'=>1))->select();
            $this->assign('list',$list);
        }
        $this->display();
    }
    public function updatecardlevel($data){
        $db = M('Member_card_level');
        if ($data['id']){
            if ($db->create($data)){
                $db->save();
                return true;
            }else{
                $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
            }
        }else{
            if (!$data['escore']){$data['escore']=0;}
            if ($db->create($data)){
                $db->add();
                return true;
            }else{
                $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
            }
        }
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