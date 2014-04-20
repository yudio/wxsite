<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-19
 * Time: 下午5:29
 */

class CommentAction extends WebAction{
    private $token;
    private $wxuid;
    private $wecha_id;
    private $wxuser;


    public function _initialize(){
        parent::_initialize();
        /*$agent = $_SERVER['HTTP_USER_AGENT'];

        if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
            echo '此功能只能在微信浏览器中使用';exit;
        }*/
        C('TOKEN_ON',false);

        $this->wxuid    = $this->_get('wxuid');
        if (!$this->wxuid){
            echo '该账号不存在！';exit;
        }
        $wxuser=D('Wxuser')->where(array('id'=>$this->wxuid))->find();
        if (!isset($this->token)){
            $this->token = $wxuser['token'];
        }
        $this->wxuser = $wxuser;
        $this->wxname     = $wxuser['wxname'];

        $this->wecha_id	= $this->_get('wecha_id');
        if (!$this->wecha_id||$this->wecha_id=='FromUserName'){
            $this->wecha_id='0';
        }
        $this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('wxuid',$this->wxuid);
        //
    }
    public function comment(){
        $db = D('CommentSet');
        $info = $db->where(array('token'=>$this->token))->find();
        $list = M('Comment')->where(array('token'=>$this->token,'fid'=>'0','status'=>'1'))->select();
        $user = M('CommentUser')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
        if (!$user){
            M('CommentUser')->data(array('token'=>$this->token,'wecha_id'=>$this->wecha_id,'status'=>1,'nickname'=>'匿名','updatetime'=>time()))->add();
        }
        foreach($list as &$vo){
            $vo['msglist'] = M('Comment')->where(array('fid'=>$vo['id'],'token'=>$this->token,'status'=>'1'))->select();
        }
        $this->assign('user',$user);
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display('index');
    }

    public function submit(){
        $db = M('Comment');
        if (IS_POST){
            $fid = $this->_post('fid','intval');
            LOG::write('========fid:'.$fid,LOG::ERR);
            if (!$fid){$fid = 0;}
            $_POST['wecha_id']   = $this->wecha_id;
            $_POST['token']      = $this->token;
            $_POST['createtime'] = time();
            $_POST['updatetime'] = $_POST['createtime'];
            //是否需要审核
            $info = M('CommentSet')->where(array('token'=>$this->token))->find();
            if ($info['audit']==2){
                $_POST['status']     = 1;
            }else{
                $_POST['status']     = 0;
            }
            if($db->create()){
                $db->add();
                $user = M('CommentUser')->field('id')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
                M('CommentUser')->data(array('id'=>$user['id'],'nickname'=>$_POST['nickname']))->save();
                $this->ajaxReturn(array('success'=>true,'msg'=>'发送成功！','url'=>'/webmessage/'.$this->wxuid.'/comment?wecha_id='.$this->wecha_id),'JSON');
            }else{
                $this->ajaxReturn(array('success'=>false,'msg'=>$db->getError()),'JSON');
            }
        }
    }

}