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

        $this->wecha_id	= $this->_get('wecha_id');
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