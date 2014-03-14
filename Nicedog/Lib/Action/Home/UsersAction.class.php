<?php
class UsersAction extends BaseAction{
	public function index(){
		header("Location: /");
	}

	public function checklogin(){
        C('TOKEN_ON',false);
		$db=D('Users');
		$where['username']=$this->_post('username','trim');
		
		// if($db->create()==false)
			// $this->error($db->getError());
		$pwd=$this->_post('password','trim,md5');
		$res=$db->where($where)->find();
		if($res&&($pwd===$res['password'])){
			
			if($res['status']==0){
				$this->error('请联系在线客户，为你人工审核帐号');exit;
			}
			session('uid',$res['id']);
			session('gid',$res['gid']);
			session('uname',$res['username']);
			$info=M('user_group')->find($res['gid']);
			session('diynum',$res['diynum']);
			session('connectnum',$res['connectnum']);
			session('activitynum',$res['activitynum']);
			session('viptime',$res['viptime']);
			session('gname',$info['name']);
            //为每个用户建立一个上传目录
            $picpath = dirname(__FILE__).'/../../../../Uploads/userShare/'.substr(md5($res['id']),16).'/';
            //$picpath            =   realpath($picpath);
            LOG::write('创建用户图片空间|'.$picpath,LOG::ERR);
            if (!is_dir($picpath)) {
                mkdir($picpath,0777,true);
                chmod($picpath,0777);
            }
			//每个月第一次登陆数据清零
			$now=time();
			$month=date('m',$now);
			if($month!=$res['lastloginmonth']&&$res['lastloginmonth']!=0){
				$data['id']=$res['id'];
				$data['imgcount']=0;
				$data['diynum']=0;
				$data['textcount']=0;
				$data['musiccount']=0;
				$data['connectnum']=0;
				$data['activitynum']=0;
				$db->save($data);
				//
				session('diynum',0);
				session('connectnum',0);
				session('activitynum',0);
			}
			//登陆成功，记录本月的值到数据库
			
			//
			$db->where(array('id'=>$res['id']))->save(array('lasttime'=>$now,'lastloginmonth'=>$month,'lastip'=>$_SERVER['REMOTE_ADDR']));//最后登录时间
			//$this->success('登录成功',U('User/Index/index'));
            $ret = array('errno'=>'200','error'=>'登录成功','url_route'=>'/npManage/account/main.act');
            $this->ajaxReturn($ret,'JSON');
		}else{
			//$this->error('帐号密码错误',U('Index/login'));
            $ret = array('errno'=>'0','error'=>'帐号密码错误','url_route'=>'/');
            $this->ajaxReturn($ret,'JSON');
        }
	}
	
	public function checkreg(){
        C('TOKEN_ON',false);
		$db=D('Users');
        $code=$this->_post('captcha','intval,md5',0);
        if($code != $_SESSION['verify']){
            echo '5';
            exit;
            $this->error('验证码错误','/npHome/Index/reg.act');
        }
        $condition['username'] = $this->_post('username');
        $condition['email'] = $this->_post('email');
        $condition['_logic'] = 'OR';
        $user = $db->where($condition)->find();
        if ($user){
            echo '2';
            exit;
            $this->ajaxReturn(array('errno'=>'100','error'=>'用户名或邮箱已注册！'),'JSON');
        }
		$info=M('User_group')->find(1);
		if($db->create()){
			$id=$db->add();
			if($id){				
				if(C('ischeckuser')!='true'){
                    echo '4';
                    exit;
                    $this->ajaxReturn(array('errno'=>'0','error'=>'注册成功,请联系在线客服审核帐号！','url'=>'/'),'JSON');
					//$this->success('注册成功,请联系在线客服审核帐号','');exit;
				}
				$viptime=time()+3*24*3600;
				$db->where(array('id'=>$id))->save(array('viptime'=>$viptime));
				session('uid',$id);
				session('gid',1);
				session('uname',$_POST['username']);
				session('diynum',0);
				session('connectnum',0);
				session('activitynum',0);
				session('gname',$info['name']);
                echo '1';
                exit;
                $this->ajaxReturn(array('errno'=>'0','error'=>'注册成功！','url'=>'/npManage/Account/main.act'),'JSON');
				//$this->success('注册成功','npManage/Account/main.act');
			}else{
                $this->ajaxReturn(array('errno'=>'101','error'=>'注册失败！','url'=>'//npHome/Index/reg.act'),'JSON');
                //$this->error('注册失败','/npHome/Index/reg.act');
			}
		}else{
            LOG::write('Home-Users-reg:'.$db->getError(),LOG::ERR);
            $this->ajaxReturn(array('errno'=>'101','error'=>'内部错误，请稍后重试！','url'=>'//npHome/Index/reg.act'),'JSON');
			//$this->error($db->getError(),'/npHome/Index/reg.act');
		}
	}

    public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
    public function checkverify(){
        $code=$this->_post('vcode','intval,md5',0);
        if($code != $_SESSION['verify']){
            $this->ajaxReturn(array('errno'=>'100','error'=>'验证码错误'));
        }else{
            $this->ajaxReturn(array('errno'=>'0'));
        }
    }

	public function checkpwd(){

		$where['username']=$this->_post('username');
		$where['email']=$this->_post('email');
		$db=D('Users');
		$list=$db->where($where)->find();
		if($list==false) $this->error('邮箱和帐号不正确',U('Index/regpwd'));
		
		$smtpserver = C('email_server'); 
		$port = C('email_port');
		$smtpuser = C('email_user');
		$smtppwd = C('email_pwd');
		$mailtype = "TXT";
		$sender = C('email_user');
		$smtp = new Smtp($smtpserver,$port,true,$smtpuser,$smtppwd,$sender); 
		$to = $list['email']; 
		$subject = C('pwd_email_title');
		$code = C('site_url').U('Index/resetpwd',array('uid'=>$list['id'],'code'=>md5($list['id'].$list['password'].$list['email']),'resettime'=>time()));
		$fetchcontent = C('pwd_email_content');
		$fetchcontent = str_replace('{username}',$where['username'],$fetchcontent);
		$fetchcontent = str_replace('{time}',date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),$fetchcontent);
		$fetchcontent = str_replace('{code}',$code,$fetchcontent);
		$body=$fetchcontent;
		//$body = iconv('UTF-8','gb2312',$fetchcontent);
		$send=$smtp->sendmail($to,$sender,$subject,$body,$mailtype);
		$this->success('请访问你的邮箱 '.$list['email'].' 验证邮箱后登录!<br/>');
		
	}
	
	public function resetpwd(){
		$where['id']=$this->_post('uid','intval');
		$where['password']=$this->_post('password','md5');
		if(M('Users')->save($where)){
			$this->success('修改成功，请登录！',U('Index/login'));
		}else{
			$this->error('密码修改失败！',U('Index/index'));
		}
	}
	
}