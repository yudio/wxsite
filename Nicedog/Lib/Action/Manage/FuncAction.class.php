<?php
class FuncAction extends UserAction{
    public function app(){
        /*$id=$this->_get('id','intval');
        $token=$this->_get('token','trim');
        $info=M('Wxuser')->find($id);
        if($info==false||$info['token']!==$token){
            $this->error('非法操作',U('Home/Index/index'));
        }
        session('token',$token);
        session('wxid',$info['id']);*/
        //第一次登陆　创建　功能所有权
        $token_open=M('Token_open');
        $toback=$token_open->field('id,queryname')->where(array('token'=>session('token'),'uid'=>session('uid')))->find();
        $open['uid']=session('uid');
        $open['token']=session('token');
        //遍历功能列表
        $group=M('User_group')->field('id,name')->where('status=1')->select();
        $check=explode(',',$toback['queryname']);
        $this->assign('check',$check);
        foreach($group as $key=>$vo){
            $fun=M('Function')->where(array('status'=>1,'gid'=>$vo['id']))->select();
            foreach($fun as $vkey=>$vo){
                $function[$key][$vkey]=$vo;
            }
        }
        $this->assign('fun',$function);
        //
        $wecha=M('Wxuser')->field('wxname,wxid,headerpic,weixin')->where(array('token'=>session('token'),'uid'=>session('uid')))->find();
        $this->assign('wecha',$wecha);
        $this->assign('token',session('token'));
        //
        $this->display();
    }


    public function appset(){
        $chk    = $this->_post('chk');
        $appid  = $this->_post('appid');
        LOG::write("CHK={$chk}",LOG::ERR);
        $fun=M('Function')->where(array('id'=>$appid))->find();
        $openwhere=array('uid'=>session('uid'),'token'=>session('token'));
        $open=M('Token_open')->where($openwhere)->find();
        if (!$open){
            $openwhere['queryname'] = '';
            M('Token_open')->data($openwhere)->add();
            $open['queryname'] = '';
        }
        if($chk=='true'){
            $str['queryname']=str_replace(',,',',',$open['queryname'].','.$fun['funname']);
            LOG::write("chk true".strlen($str['queryname']).$fun['funname'],LOG::ERR);
            $back=M('Token_open')->where($openwhere)->save($str);
            if($back){
                $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功'),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>'100','error'=>$back),'JSON');
            }
        }else{
            $str['queryname']=ltrim(str_replace(',,',',',str_replace($fun['funname'],'',$open['queryname'])),',');
            LOG::write("chk false".strlen($str['queryname']).$fun['funname'],LOG::ERR);
            $back=M('Token_open')->where($openwhere)->save($str);
            if($back){
                $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功'),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>'100','error'=>$back),'JSON');
            }
        }
        LOG::write("appset error",LOG::ERR);

    }
}

?>