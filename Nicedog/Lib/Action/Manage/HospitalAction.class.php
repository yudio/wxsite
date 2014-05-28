<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-24
 * Time: 上午9:48
 */

class HospitalAction extends UserAction{
    private $token;
    public function _initialize() {
        parent::_initialize();
        $this->token = session('token');
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');
    }

    /*
      *
      * 团队专家列表
      */
    public function doclist(){
        $db=D('Doctors');
        $where['token']=session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,100);
        $info=$db->where($where)->order('sorts')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }
    public function docinsert(){
        $db =D('Doctors');
        if ($db->create() === false) {
            $this->ajaxReturn(array('errno'=>'1','error'=>'M(doctors_insert).'.$db->getError()),'JSON');
        } else {
            $id = $db->add();
            if ($id) {
                $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/hospital/doclist.act'),'JSON');
            } else {
                $this->ajaxReturn(array('errno'=>'1','error'=>'M(classify_insert).'.$db->getError()),'JSON');
            }
        }
    }
    //编辑专家
    public function editdoc(){
        $where['id']=$this->_get('id','intval');
        $where['token'] = session('token');
        $res=D('Doctors')->where($where)->find();
        $this->assign('info',$res);
        $this->display();
    }

    public function updatedoc(){
        $db = D('Doctors');
        if ($db->create() === false) {
            $this->ajaxReturn(array('errno'=>'1','error'=>'M(doctors_update).Create'.$db->getError()),'JSON');
        } else {
            $id = $db->save();
            if ($id||''==$db->getError()) {
                $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/hospital/doclist.act'),'JSON');
            } else {
                $this->ajaxReturn(array('errno'=>'1','error'=>'M(doctors_update).Save'.$db->getError()),'JSON');
            }
        }
    }

    public function deldoc(){
        $where['id']=$this->_get('id','intval');
        $where['uid']=session('uid');
        $db = D('Doctors');
        if($db->where($where)->delete()){
            $this->redirect('Manage/hospital/doclist');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
        }
    }


    public function adddoc(){
        $this->display();
    }

}
