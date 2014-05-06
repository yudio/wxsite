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
            if (!$info){
                exit('该微信墙活动不存在或已经结束！');
            }
            else{
                //查询当前用户是否已经加入到当前的跑马活动中来
                $where['token'] =$this->token;
                $where['wid'] = $id;
                $ssdb = M('ShakeSet');
                $shakeinfo =$ssdb->where($where)->find();
                if(!$shakeinfo){
                    exit('该跑马活动不存在或者已经结束！');
                }
                /*
                else{
                    //跑马活动存在，查询用户是否通过授权，是否上墙
                    $walluser = M('WallUser')->where(array('wecha_id'=>$this->wecha_id,'token'=>$this->token,'round'=>$shakeinfo['now_round']))->find();
                    //用户上墙
                    if($walluser){
                        $srinfo=M('ShakeRecord')->where(array('pid'=>$shakeinfo['id'],'wecha_id'=>$this->wecha_id))->find();
                        //抽奖记录中不存在用户
                        if(!$srinfo){
                            M('ShakeRecord')->data(array('pid'=>$shakeinfo['id'],'rid'=>0,'round'=>$shakeinfo['now_round'],'steps'=>0,'wecha_id'=>$this->wecha_id,'wxname'=>$walluser['wxname'],'headpic'=>$walluser['headpic'],'create_time'=>NOW_TIME))->add();
                        }
                    }
                }*/
            }
            $this->assign('wid',$id);
            $this->assign('info',$info);
        }else{
            echo '该微信墙活动不存在或已经结束！';
            exit;
        }
        $this->display();
    }

    //web shake页面
    public function shake()
    {
        $id = $this->_get('wid','intval');
        $db = D('Wall');
        if($id != 0){
            $info = $db->where('id='.$id)->find();
            if(!$info){
                echo "该活动不存在或者已经结束！";
                exit;
            }
            else
            {
                //查询当前用户是否已经加入到当前的跑马活动中来
                $where['token'] =$this->token;
                $where['wid'] = $id;
                $ssdb = M('ShakeSet');
                $shakeinfo =$ssdb->where($where)->find();
                if(!$shakeinfo){
                    exit('该跑马活动不存在或者已经结束！');
                }else{
                    $pid = $shakeinfo['id'];
                    $ljnum = $shakeinfo['lj_num'];
                    $prizeinfo = M('ShakeReward')->where(array('pid'=>$pid,'round'=>$shakeinfo['now_round']))->order('type asc')->select();
                }
            }

        }else{
            echo '非法访问';
            exit;
        }
        $this->assign('wid',$id);
        $this->assign('info',$info);
        $this->assign('pid',$pid);
        $this->assign('ljnum',$ljnum);
        $this->assign('prizelist',$prizeinfo);
        $this->display();
        //$wid =$this->_get('wid','intval');
        //$token=$this->_get('token');
        //$db=M('ShakeSet');
        //if($wid!=0 && !$token){
        //  $where['wid']=$wid;
        //$where['token']=$token;
        //}
    }

    public function wapShake(){
        $id = $this->_get('wid','intval');
        $isover = 0;
        if($id!=0){
            $where['token'] =$this->token;
            $where['wid'] = $id;
            $ssdb = M('ShakeSet');
            $shakeinfo =$ssdb->where($where)->find();
            if($shakeinfo['total_round']<$shakeinfo['now_round']){
                $isover=1;
            }
            $pid = $shakeinfo['id'];
            $this->assign('pid',$pid);
        }else{
            echo '非法访问';
            exit;
        }
        $this->assign('isover',$isover);
        $this->display();
    }

    //获取排名前8的shake记录
    public function getShake(){
        $id = $this->_post('pid','intval');
        $token = $this->token;

        $where['token'] =$this->token;
        $where['id'] = $id;
        $ssdb = M('ShakeSet');
        $shakeinfo =$ssdb->where($where)->find();

        $now_round = $shakeinfo['now_round'];
        $pid = $shakeinfo['id'];
        $srdb = M('ShakeRecord');
        $playerlist = $srdb->field('id,headpic as img,wxname as nickName,steps as totalStep')->where(array('pid'=>$pid,'round'=>$now_round))->limit(8)->select();
        // dump($playerlist);
        //dump($srdb->getLastSql());
        if($playerlist){
            $this->ajaxReturn(array('result'=>1,'message'=>'','data'=>array('players'=>$playerlist)));
        }else{
            $this->ajaxReturn(array('result'=>0,'message'=>'','data'=>array()));
        }
    }

    //插入获奖记录
    public function getShakeWin(){
        //跑马set id
        $id = $this->_post('pid','intval');
        $token = $this->token;
        $where['token'] =$this->token;
        $where['id'] = $id;
        $ssdb = M('ShakeSet');
        $shakeinfo =$ssdb->where($where)->find();

        $ljnum = $shakeinfo['lj_num'];
        $now_round = $shakeinfo['now_round'];

        $reqData = $_REQUEST['result'];
        //dump($reqData);
        LOG::write('更新记录',LOG::ERR);
        $rwdb = M('ShakeReward');
        $rcdb = M('ShakeRecord');
        if($reqData){
            for($i=0;$i< $ljnum;$i++){
                if($i>count($reqData)){
                    break;
                }
                $type=$i+1;
                $rwinfo = $rwdb->where(array('pid'=>$id,'type'=>$type,'round'=>$now_round))->find();
                $reward_id =$rwinfo['id'];
                //更新中奖记录
                LOG::write('ID:'.$reqData[$i]['id'].' RID:'.$reward_id,LOG::ERR);
                $rcdb->data(array('id'=>$reqData[$i]['id'],'rid'=>$reward_id))->save();
            }
        }

        //更新完中奖信息以后，更新当前轮次
        $ssdb->data(array('id'=>$id,'now_round'=>$now_round+1))->save();

    }

    //手机摇动
    public function sendShakeData(){
        $round = $this->_post('round');
        $pid = $this->_post('pid');
        $wecha_id = $this->_post('wechatid');
        //LOG::write("yao-yao".$req,LOG::ERR);
        LOG::write("yao-yao p:".$pid.' r:'.$round.' wecha_id '.$wecha_id.' wid'.$this->wecha_id,LOG::ERR);
        if($wecha_id!=$this->wecha_id){
            //echo('请勿非法访问！');
            $this->ajaxReturn(array('result'=>2,'message'=>'请勿非法访问！'));
            exit;
        }

        $where['token'] =$this->token;
        $where['id'] = $pid;
        $ssdb = M('ShakeSet');
        $shakeinfo =$ssdb->where($where)->find();
        $rcdbid = $shakeinfo['id'];

        $rcdb = M('ShakeRecord');

        $now_round = $shakeinfo['now_round'];
        $total_round = $shakeinfo['total_round'];

        if($now_round > $total_round){
            $this->ajaxReturn(array('result'=>3,'message'=>'本次活动已经结束，感谢参与！'));
            exit;
        }

        LOG::write("round info now_round ".$now_round.' round '.$round,LOG::ERR);
       if($round !=$now_round){
           $recinfo = $rcdb->where(array('pid'=>$rcdbid,'round'=>$now_round,'wecha_id'=>$wecha_id))->find();
           if($recinfo){
               LOG::write("table updated with setps:".$recinfo['steps'],LOG::ERR);
               $rcdb->data(array('id'=>$recinfo['id'],'steps'=>$recinfo['steps']+1))->save();

           }else{
               LOG::write("user not exist,then create it.",LOG::ERR);
               $walluser = M('WallUser')->where(array('wecha_id'=>$this->wecha_id,'token'=>$this->token))->find();
               $rcdb->data(array('pid'=>$shakeinfo['id'],'rid'=>0,'round'=>$shakeinfo['now_round'],'steps'=>0,'wecha_id'=>$this->wecha_id,'wxname'=>$walluser['wxname'],'headpic'=>$walluser['headpic'],'create_time'=>NOW_TIME))->add();
           }
       }
       else{
           LOG::write("in round,update steps.",LOG::ERR);
           $rcdb->where(array('pid'=>$rcdbid,'round'=>$now_round,'wecha_id'=>$wecha_id))->setInc('steps');
       }
       $this->ajaxReturn(array('result'=>1,'round'=>$now_round));
       LOG::write("ret 1,and now_round is ".$now_round,LOG::ERR);
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