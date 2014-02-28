<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-26
 * Time: 上午1:21
 */
class MenuAction extends UserAction{

    public function index(){
        $data=M('Diymen_set')->where(array('token'=>$_SESSION['token']))->find();
        $this->assign('diymen',$data);
        $menu=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>0))->order('sort desc')->select();//dump($class);
        foreach($menu as $key=>$vo){
            $re=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>$vo['id']))->order('sort desc')->select();
            $menu[$key]['submenu']=$re;
            LOG::write('KEY'.$key,LOG::ERR);
        }
            //dump($class);
        $this->assign('wxmenu',$menu);
        $this->display();

    }


    public function  add(){
        if(IS_POST){
            $newarr  =  $_REQUEST['new'];
            $psarr   =  $_REQUEST['ps'];
            $db      =  D('Wxmenu');
            foreach($newarr as $key=>$vo){
                $vo['uid']   = session('uid');
                $vo['token'] = session('token');
                if(!$db->add($vo)){
                    $this->ajaxReturn(array('errno'=>'100','error'=>'newarr{$key}:'.$db->getError()),'JSON');
                }
            }
            foreach($psarr as $key=>$vo){
                $vo['id']  =  $key;
                LOG::write("NAME:".$vo['name'],LOG::ERR);
                $db->where(array('id'=>$key))->save($vo);
                //    $this->ajaxReturn(array('errno'=>'100','error'=>"psarr{$key}:".$db->getError()),'JSON');

            }
            $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/menu/index.act'),'JSON');
        }else{
            /*$class=M('Diymen_class')->where(array('token'=>$_SESSION['token'],'pid'=>0))->order('sort desc')->select();
            //dump($class);
            $this->assign('class',$class);
            $this->display();*/
            $this->ajaxReturn(array('errno'=>'200','error'=>'POST数据出错！'),'JSON');
        }
    }
    public function  del(){
        $class=M('Diymen_class')->where(array('token'=>$_SESSION['token'],'pid'=>$this->_get('id')))->order('sort desc')->find();
        //echo M('Diymen_class')->getLastSql();exit;
        if($class==false){
            $back=M('Diymen_class')->where(array('token'=>$_SESSION['token'],'id'=>$this->_get('id')))->delete();
            if($back==true){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }else{
            $this->error('请删除该分类下的子分类');
        }


    }
}