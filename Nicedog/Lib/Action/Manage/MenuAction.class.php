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
        $menu=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>0))->order('sort asc')->select();//dump($class);
        foreach($menu as $key=>$vo){
            $re=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>$vo['id']))->order('sort asc')->select();
            $menu[$key]['submenu']=$re;
            //LOG::write('KEY'.$key,LOG::ERR);
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
                if (preg_match('/(http|https|ftp):\/\/(.+)/i',$vo['key'])){
                    $vo['url'] = $vo['key'];
                }else if (preg_match('/tel:(.+)/i',$vo['key'])){
                    $vo['url'] = $vo['key'];
                }else{
                    $vo['url'] = '';
                }
                if(!$db->add($vo)){
                    $this->ajaxReturn(array('errno'=>'100','error'=>'newarr{$key}:'.$db->getError()),'JSON');
                }
            }
            foreach($psarr as $key=>$vo){
                $vo['id']  =  $key;
                if (preg_match('/(http|https|ftp):\/\/(.+)/i',$vo['key'])){
                    $vo['url'] = $vo['key'];
                }else if (preg_match('/tel:(.+)/i',$vo['key'])){
                    $vo['url'] = $vo['key'];
                }else{
                    $vo['url'] = '';
                }
                $db->where(array('id'=>$key))->save($vo);
            }
            $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/menu/index.act'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'200','error'=>'POST数据出错！'),'JSON');
        }
    }
    public function  del(){
        $class=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>$this->_get('id')))->order('sort desc')->find();
        //echo M('Diymen_class')->getLastSql();exit;
        if($class==false){
            $back=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'id'=>$this->_get('id')))->delete();
            if($back==true){
                $this->success('删除成功');
            }else{
                $this->error('删除失败');
            }
        }else{
            $this->error('请删除该分类下的子分类');
        }
    }

    public function send(){
        if(IS_GET){
            $wxuser = M('Wxuser')->field('token,appid,appsecret')->where(array('token'=>session('token')))->find();
            if($wxuser['appid']==false||$wxuser['appsecret']==false){
                $this->ajaxReturn(array('errno'=>'100','error'=>'必须先填写【AppId】【 AppSecret】'),'JSON');
            }

            $jsondata = array();

            $class=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>0))->limit(3)->order('sort asc')->select();
            //主菜单
            //dump($class);
            foreach($class as $key=>$vo){
                $subclass=M('Wxmenu')->where(array('token'=>$_SESSION['token'],'parent_id'=>$vo['id']))->limit(5)->order('sort asc')->select();
                //子菜单
                if($subclass!=false){
                    $subdata = array();
                    foreach($subclass as $voo){
                        //LOG::write('SUB:'.$voo['name'],LOG::ERR);
                        if($voo['url']){
                            $subdata[] = array('type'=>'view','name'=>$voo['name'],'url'=>$voo['url']);
                        }else{
                            $subdata[] = array('type'=>'click','name'=>$voo['name'],'key'=>$voo['key']);
                        }
                    }
                    $jsondata[] = array('name'=>$vo['name'],'sub_button'=>$subdata);
                }else{
                    //LOG::write('Main:'.$vo['name'],LOG::ERR);
                    //$jsondata.='"type":"click","key":"'.$vo['key'].'"';
                    if ($vo['url']){
                        $jsondata[] = array('type'=>'view','name'=>$vo['name'],'url'=>$vo['url']);
                    }else{
                        $jsondata[] = array('type'=>'click','name'=>$vo['name'],'key'=>$vo['key']);
                    }
                }
            }
            $jsondata = array('button'=>$jsondata);
            //print_r(json_encode($jsondata));
            //$this->ajaxReturn(array('errno'=>'0','error'=>json_encode($jsondata)),'TEXT');
            //exit;
            //调用微信接口更新
            $db = M('Diymen_set');
            $menuset = $db->where(array('token'=>$_SESSION['token']))->find();
            if (!$menuset){
                $data = $wxuser;
                $setid = $db->data($data)->add();
                $menuset['id'] = $setid;
            }else{
                $menuset['appid'] = $wxuser['appid'];
                $menuset['appsecret']  = $wxuser['appsecret'];
                $db->data($menuset)->save();
            }
            $wxservice = new WxService($menuset);
            $menuset['appaccess'] = $wxservice->getAccessToken();
            if ($wxservice->getAccessTime()>0){
                $menuset['updatetime'] = $wxservice->getAccessTime();
            }
            M('Diymen_set')->where(array('token'=>$_SESSION['token']))->data($menuset)->save();



            $res = $wxservice->menu_update(json_encode($jsondata,JSON_UNESCAPED_UNICODE));
            $res = json_decode($res);
            if($res->errcode>0){
                $this->ajaxReturn(array('errno'=>$res->errcode,'error'=>'接口调用出错:'.$res->errmsg),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>'0','error'=>'操作成功'),'JSON');
                //$this->success('操作成功',U('Diymen/index'));
            }
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'操作失败'),'JSON');
        }
    }

    public function show(){
        $db = M('Diymen_set');
        $menuset = $db->where(array('token'=>$_SESSION['token']))->find();
        $wxservice = new WxService($menuset);
        $menuset['appaccess'] = $wxservice->getAccessToken();
        if ($wxservice->getAccessTime()>0){
            $menuset['updatetime'] = $wxservice->getAccessTime();
        }
        M('Diymen_set')->where(array('token'=>$_SESSION['token']))->data($menuset)->save();

        dump($wxservice->menu_get());
    }

}