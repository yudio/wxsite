<?php
class AccountAction extends UserAction{

    private $token;
    public function _initialize() {
        parent::_initialize();
        $this->token=$this->_session('token');
    }

    public function main(){
        if (session('uid')==false){
            $this->error('非法操作','/nphome/index/index.act');
        }
        $this->display();
    }
    /**
     *
     * 公众号管理 /Manage/account/index
     */
    public function index(){
        $where['uid']=session('uid');
        $group=D('User_group')->select();
        foreach($group as $key=>$val){
            $groups[$val['id']]['did']=$val['diynum'];
            $groups[$val['id']]['cid']=$val['connectnum'];
        }
        unset($group);
        $db=M('Wxuser');
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $data=M('User_group')->field('wechat_card_num')->where(array('id'=>session('gid')))->find();
        $users=M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->find();
        $this->assign('uwxnum',$users['wechat_card_num']);
        $this->assign('gwxnum',$data['wechat_card_num']);
        $this->assign('info',$info);
        $this->assign('group',$groups);
        $this->assign('page',$page->show());
        $this->display();
    }

    public function user(){
        $user = M('Users')->where(array('id'=>$_SESSION['uid']))->find();
        $this->assign('info',$user);
        $this->display();
    }

    /*
     *
     *
     */
    public function logout(){
        session(null);
        session_destroy();
        unset($_SESSION);
        if(session('?'.C('USER_AUTH_KEY'))) {
            session(C('USER_AUTH_KEY'),null);

            redirect('/');
        }else {
            $this->error('已经登出！','/');
        }
    }
    /*
     *
     * 修改商户信息
     */
    public function updateuser(){
        $user['id']       = $_SESSION['uid'];
        $user['nickname'] = $this->_post('nickname');
        $user['mobile']   = $this->_post('mobile');
        $user['qq']       = $this->_post('qq');
        $user['email']    = $this->_post('email');
        $db = M('Users');
        if ($db->save($user)){
            $this->ajaxReturn(array('errno'=>0,'error'=>'商户信息修改成功！','url'=>'/npManage/account/user.act'),'JSON');
        }else{
            if ($db->getError()){
                $this->ajaxReturn(array('error'=>$db->getError()),'JSON');
            }else{
                $this->ajaxReturn(array('error'=>'商户信息更新！'),'JSON');
            }
        }
    }

    public function detail(){
        $id=$this->_get('id','intval');
        $where['uid']=session('uid');
        $res=M('Wxuser')->where($where)->find($id);
        $this->assign('info',$res);
        $this->display();
    }

    /**
     * @return string
     * 修改密码
     */
    public function updatepwd(){
        $pwd=$this->_post('old_password');
        $newpass=$this->_post('new_password');
        if($pwd!=false&&$newpass!=false){
            $pwd=md5($pwd);
            $user = M('Users')->where(array('id'=>$_SESSION['uid']))->find();
            LOG::write('DATA:'.$user['password'],LOG::ERR);
            if ($pwd!=$user['password']){
                $this->ajaxReturn(array('error'=>'原密码错误！'),'JSON');
            }
            $user['password'] =md5($newpass);
            if(M('Users')->save($user)){
                $this->ajaxReturn(array('error'=>'密码修改成功！','url'=>'/npManage/account/index.act'),'JSON');
            }else{
                $this->ajaxReturn(array('error'=>'密码修改失败！'),'JSON');
            }
        }else{
            $this->ajaxReturn(array('error'=>'密码不能为空！'),'JSON');
        }
    }
    /*
     *
     * 生产token
     */
    private function genToken(){
        $randLength=6;
        $chars='abcdefghijklmnopqrstuvwxyz';
        $len=strlen($chars);
        $randStr='';
        for ($i=0;$i<$randLength;$i++){
            $randStr.=$chars[rand(0,$len-1)];
        }
        $tokenvalue=$randStr.time();
        return $tokenvalue;
    }

    /**
     * 自动绑定
     */
    public function bind(){
        $wxclient = new WeiXinClient(array('account'=>$_POST['wxaccount'],'password'=>md5($_POST['wxpwd']),'temp_path'=>THINK_PATH));
        $loginret = $wxclient->login();
        if ($loginret!="true"){
            $ret =    json_decode($loginret,1);
            $retcode = $ret['ErrCode'];
            switch ($retcode){
                case '-3':
                    $data=array('errno'=>'-3','error'=>"密码错误！",'pid'=>session('uid'));
                    $this->ajaxReturn($data,'JSON');
                    break;
                case '-6':
                    $data=array('errno'=>'-6','error'=>"绑定失败，请稍后重试或手动绑定！",'pid'=>session('uid'));
                    $this->ajaxReturn($data,'JSON');
                    break;
                case '-4':
                    $data=array('errno'=>'-4','error'=>"账号不存在！",'pid'=>session('uid'));
                    $this->ajaxReturn($data,'JSON');
                    break;
                default:
                    $data=array('errno'=>'100','error'=>"发生未知错误{$retcode}，请尝试手动绑定！",'pid'=>session('uid'));
                    $this->ajaxReturn($data,'JSON');
            }
        }
        $_POST['wxid'] = $wxclient->getwxid();
        $_POST['weixin'] = $wxclient->getWxName();
        $_POST['wxname'] = $wxclient->getNickName();
        $_POST['wxfakeid'] = $wxclient->getFakeId();
        $_POST['wxaccount'] = $_POST['wxaccount'];
        $_POST['wxpwd'] = $_POST['wxpwd'];
        $_POST['token'] = $this->genToken();
        $_POST['type'] = '8,服务';
        $picpath = 'Uploads/ufaceimg/'.date('Ymd').'-'.time().'.jpg';
        $_POST['headerpic'] = '/'.$picpath;
        file_put_contents(THINK_PATH.$picpath,$wxclient->getUserFace($wxclient->getFakeId()));
        $tokenurl = C('site_url').'/wechat/'.$_POST['token'];
        $ret = $wxclient->bindUrlDev($tokenurl,$_POST['token']);
        LOG::write($wxclient->getWxName(),LOG::ERR);
        if ($ret['ret']>0){
            $this->ajaxReturn($ret,'JSON');
        }
        //ddump($_POST);
        $db=D('Wxuser');//->where(array('token'=>session('token'),'wxid'=>$wxclient->getwxid()))->find();
        if($db->create()===false){
            $data=array('errno'=>'2','error'=>$db->getError(),'pid'=>session('uid'));
            $this->ajaxReturn($data,'JSON');
            //return $db->getError();
        }else{
            $id=$db->add();
            if($id){
                M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->setInc('wechat_card_num');
                $this->addfc();
                //jsret {"errno":0,"error":"信息","pid":69535}
                $data=array('errno'=>'0','error'=>'操作成功','pid'=>session('uid'),'tip'=>"<h5>复制此处token和url到腾讯平台绑定</h5><p>URL:<input style='width:300px'  value='{$tokenurl}'/> </p><p>token:{$_POST['token']}</p>");
                $this->ajaxReturn($data,'JSON');
                //$this->success('操作成功',U('Index/index'));
            }else{
                $data=array('errno'=>'1','error'=>'操作失败','pid'=>session('uid'));
                $this->ajaxReturn($data,'JSON');
                //$this->error('操作失败',U('Index/index'));
            }
        }
    }

    /*
     *
     * 手动绑定公众号
     */
    public function addwxuser(){
        $db = D('Wxuser');
        if (IS_POST){
            $tokenurl = C('site_url').'/wechat/'.$_POST['token'];
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/account/index.act'),'JSON');
                    //,'tip'=>"<h5>复制此处token和url到腾讯平台绑定</h5><p>URL:<input style='width:300px'  value='{$tokenurl}'/> </p><p>token:{$_POST['token']}</p>"),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                $_POST['token'] = $this->genToken();
                if ($db->create()){
                    $id = $db->add();
                    M('Users')->field('wechat_card_num')->where(array('id'=>session('uid')))->setInc('wechat_card_num');
                    $this->addfc();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/account/index.act','tip'=>"<h5>复制此处token和url到腾讯平台绑定</h5><p>URL:<input style='width:300px'  value='{$tokenurl}'/> </p><p>token:{$_POST['token']}</p>"),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }
        }
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->where(array('id'=>$id))->find();
            $this->assign('info',$info);
        }
        $this->display();
    }

    /*
     *
     * 删除公众号
     */
    public function delwxuser(){
        $db = D('Wxuser');
        $where['id']=$this->_get('id','intval');
        $where['uid']=session('uid');
        if($db->where($where)->delete()){
            LOG::write('/npManage/account/index.act',LOG::ERR);
            redirect('/npManage/account/index.act');
        }else{
            LOG::write('ajaxReturn',LOG::ERR);
            $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
        }
    }
    /*
     *
     * 添加功能列表
     */
    public function addfc(){
        $token_open=M('Token_open');
        $open['uid']=session('uid');
        $open['token']=$_POST['token'];
        $gid=session('gid');
        $fun=M('Function')->field('funname,gid,isserve')->where('`gid` <= '.$gid)->select();
        $queryname = "";//功能选项
        foreach($fun as $key=>$vo){
            $queryname.=$vo['funname'].',';
        }
        $open['queryname']=rtrim($queryname,',');
        $token_open->data($open)->add();
    }

    /*
     *
     * 新后台首页
     */
    public function home(){
        $user = M('Wxuser')->where(array('token'=>session('token')))->find();
        $this->assign('user',$user);
        $this->display();
    }

    /*
     *
     * 配置plugmenu菜单 可删除
     */
    public function plugmenu(){

        $where=array('token'=>$this->token);
        $menuArr=array('tel','memberinfo','nav','message','share','home','album','email','shopping','membercard','activity','weibo','tencentweibo','qqzone','wechat','music','video','recommend','other');
        $home=$this->home_db->where(array('token'=>session('token')))->find();
        $plugmenu_db=M('site_plugmenu');
        if (!$home){
            $this->error('请先配置3g网站信息',U('Home/set',array('token'=>session('token'))));
        }else {
            if(IS_POST){
                //保存版权信息和菜单颜色
                $this->home_db->where($where)->save(array('plugmenucolor'=>$this->_post('plugmenucolor'),'copyright'=>$this->_post('copyright')));
                //保存各个菜单
                //先删除原来的
                $plugmenu_db->where($where)->delete();
                //添加
                foreach ($menuArr as $m){
                    $row=array('token'=>$this->token);
                    $row['name']=$m;
                    //$row['url']=$this->$_POST['url_'.$m];
                    $row['url']=intval($_POST['url_'.$m]);
                    $row['taxis']=intval($_POST['sort_'.$m]);
                    $row['display']=intval($_POST['display_'.$m]);
                    //if (strlen(trim($row['url']))){
                    $plugmenu_db->add($row);
                    //}
                }
                $this->success('设置成功',U('Home/plugmenu',array('token'=>$this->token)));
            }else {
                $homeInfo=$this->home_db->where($where)->find();
                if (!$homeInfo['plugmenucolor']){
                    $homeInfo['plugmenucolor']='#ff0000';
                }
                //
                $this->assign('userGroup',$this->userGroup);
                //
                $this->assign('homeInfo',$homeInfo);
                $menus=$plugmenu_db->where($where)->select();
                $menusArr=array();
                foreach ($menus as $m){
                    $menusArr[$m['name']]=$m;
                }
                $this->assign('menus',$menusArr);
                $this->display();
            }
        }
    }
    /**
     *
     * 公众号类型
     */
    public function type(){
        $token = session('token');
        $user  = M('Wxuser')->where(array('token'=>$token))->find();
        $this->assign('user',$user);
        $this->display();
    }
    public function typeset(){
        if (IS_POST){
            $db = M('Wxuser');
            if($db->create()){
                $db->save();
                $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/account/type.act'));
            }else{
                $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()));
            }


        }else{
            $this->ajaxReturn(array('errno'=>'100','error'=>'请提交数据！'));
        }

    }

}



?>