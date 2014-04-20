<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-24
 * Time: 上午9:48
 */

class FollowerAction extends UserAction{
    private $token;
    public function _initialize() {
        parent::_initialize();
        $this->token = session('token');
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');
    }

    //粉丝列表
    public function index(){
        $db = D('Member');
        $wxtype = M('Wxuser')->where(array('token'=>$this->token))->find()['type'];
        $where['token'] = $this->token;
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('update_time desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('wxtype',$wxtype);
        $this->display();
    }

    //导入微信粉丝
    public function import(){
        $wxuser = M('Wxuser')->field('token,appid,appsecret')->where(array('token'=>session('token')))->find();
        //调用微信接口更新
        $dbset = M('Diymen_set');
        $wxset = $dbset->where(array('token'=>$this->token))->find();
        if (!$wxset){
            $data = $wxuser;
            $setid = $dbset->data($data)->add();
            $wxset['id'] = $setid;
        }else{
            $wxset['appid'] = $wxuser['appid'];
            $wxset['appsecret']  = $wxuser['appsecret'];
            $dbset->data($wxset)->save();
        }
        $wxservice = new WxService($wxset);
        $wxset['appaccess'] = $wxservice->getAccessToken();
        if ($wxservice->getAccessTime()>0){
            $wxset['updatetime'] = $wxservice->getAccessTime();
        }
        M('Diymen_set')->where(array('token'=>$_SESSION['token']))->data($wxset)->save();
        //$res = $wxservice->user_get(json_encode($jsondata,JSON_UNESCAPED_UNICODE));
        $count = 0;$total = 1;$nexttoken = ''; $openarr = array();
        while($total>$count){
            $res = $wxservice->user_get($nexttoken,true);
            $total = $res['total'];
            if ($total<1) break; //零关注则退出
            $count += $res['count'];
            $openarr = $res['data']['openid'];
            $now = time();
            foreach($openarr as $open){
                $member = D('Member')->where(array('token'=>$this->token,'wecha_id'=>$open))->find();
                if ($member){
                    if ($now-$member['update_time']>24*3600){
                        $mdata = $wxservice->user_info($open,true);
                        $mdata['status']   = $mdata['subscribe'];
                        $mdata['wecha_id'] = $mdata['openid'];
                        $mdata['id'] = $member['id'];
                        $mdata['update_time'] = time();
                        D('Member')->data($mdata)->save();
                    }
                }else{
                    $mdata = $wxservice->user_info($open,true);
                    $mdata['status']   = $mdata['subscribe'];
                    $mdata['wecha_id'] = $mdata['openid'];
                    $mdata['token'] = session('token');
                    $mdata['update_time'] = time();
                    D('Member')->data($mdata)->add();
                }
            }
            $nexttoken = $res['next_openid'];
        }
        redirect('/npManage/Follower/index.act',3,'导入成功,请等待跳转！');
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
