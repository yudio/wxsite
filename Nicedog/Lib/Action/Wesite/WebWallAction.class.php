<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-4-6
 * Time: 下午5:29
 */

class WebWallAction extends WebAction{
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
        C('TMPL_FILE_DEPR','/');

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

        //获取用户Wecha_id
        if (session('wecha_id')){
            $this->wecha_id = session('wecha_id');
        }else{
            $this->wecha_id	= $this->_get('wecha_id');
            if (!$this->wecha_id){
                $this->wecha_id = $this->_post('wecha_id');
            }
            session('wecha_id',$this->wecha_id);
        }
        //验证wecha_id有效性
        if (!$this->wecha_id||$this->wecha_id=='FromUserName'){
            $this->wecha_id='0';
        }
        $this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('wxuid',$this->wxuid);
        //
    }

    public function index(){
        $db = D('Wall');
        $id = $this->_get('wid');
        if ($id){
            $info = $db->where('id='.$id)->find();
            if (!$info){exit('该微信墙活动不存在或已经结束！');}
            $this->assign('wid',$id);
            $this->assign('info',$info);
            $this->display('index'.$info['template']);
        }else{
            echo '该微信墙活动不存在或已经结束！';
            exit;
        }
    }

    public function home(){
        $id = $this->_get('wid');
        $this->assign('wid',$id);
        $this->display();
    }

    public function shakeStart()
    {
        $id = $this->_get('wid','intval');
        $db = D('Wall');
        if($id != 0){
            $info = $db->where('id='.$id)->find();
            //dump($info);
            if (!$info){exit('该微信墙活动不存在或已经结束！');}
            $this->assign('wid',$id);
            $this->assign('info',$info);
        }else{
            echo '该微信墙活动不存在或已经结束！';
            exit;
        }

        $this->display();
    }

    public function shake()
    {
        $wid =$this->_get('wid','intval');
        $token=$this->_get('token');
        $db=M('ShakeSet');
        if($wid!=0 && !$token){
           // $where =
        }
    }


    public function  getMsgList(){
        $db = M('WallMsg');
        $wid = $this->_get('wid');
        $maxid = $this->_get('maxid','intval');
        $lastid = $this->_get('lastid','intval');
        if($wid){
            //$wall = M('WallMsg')->where('id='.$wid)->find();
            $where['token'] = $this->token;
            $where['wid']	= $wid;
            $where['status']= 1;
            $where['id']=array('gt',$maxid);
            $msglist=$db->where($where)->order('id desc')->find();
            if(!$msglist)
            {
                $where['id']=array('lt',$lastid);
                $msglist=$db->where($where)->order('id desc')->find();
            }
            if($msglist)
            {
                $this->ajaxReturn(array('data'=>array(array(
                    'id'=>$msglist['id'],
                    'num'=>$msglist['id'],
                    'content'=>$msglist['content'],
                    'nickname'=>$msglist['title'],
                    'avatar'=>$msglist['headpic']
                )),'ret'=>1));
            }
           else{
               $this->ajaxReturn(array('data'=>array(),'ret'=>0));
           }
        }

    }
    public function getCon(){
        $db = M('WallMsg');
        $id = $this->_post('id');
        if ($id){
            $wall = M('Wall')->where('id='.$id)->find();
            $where['token'] = $this->token;
            $where['wid']	= $id;
            $where['status']= 1;
            $msglist = $db->where($where)->order('create_time desc')->select();
            $arr = array();
            foreach($msglist as $msg){
                $arr[] = array('id'=>$msg['id'],'img'=>$msg['headpic'],'title'=>$msg['title'],'pdate'=>date('Y-m-d H:i:s',$msg['create_time']),'content'=>$msg['content']);
            }
            $this->ajaxReturn(array('result'=>1,'message'=>'success','data'=>$arr));
        }else{
            $this->ajaxReturn(array('result'=>0));
        }
    }


}