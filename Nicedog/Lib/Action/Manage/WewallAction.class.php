<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-24
 * Time: 上午9:48
 */

class WewallAction extends UserAction{
    private $token;
    public function _initialize() {
        parent::_initialize();
        $this->token = session('token');
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');
    }

    public function index(){
        $db = D('Wall');
        $where['token'] = session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('update_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }

    public function addWall(){
        $db = D('Wall');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>0,'error'=>'更新成功！','url'=>'/npManage/WeWall/index.act'));
                }
            }else{
                if ($db->create()){
                    $db->add();
                    $this->ajaxReturn(array('errno'=>0,'error'=>'编辑成功！','url'=>'/npManage/WeWall/index.act'));
                }else{
                    $this->ajaxReturn(array('errno'=>100,'error'=>$db->getError()));
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $this->display();
    }
}
