<?php
function strExists($haystack, $needle)
{
	return !(strpos($haystack, $needle) === FALSE);
}


class IndexAction extends BaseAction{
	private $wxuser;	//微信公共帐号信息
	private $classify;	//分类信息
	private $wecha_id;
	private $copyright;
	public $company;
	public $token;
	public $weixinUser;
	public $homeInfo;
    //wxnmae
    public $wxname;

	public function _initialize(){
		parent::_initialize();
		$agent = $_SERVER['HTTP_USER_AGENT'];

		if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
			echo '此功能只能在微信浏览器中使用';exit;
		}

        $this->wxname = $this->_get('wxname','trim');
        $where = array();
        if(!$this->wxname){
            $this->token=$this->_get('token','trim');
            $where['token']=$this->token;
        }else{
            $where['wxname'] = $this->wxname;
        }

		$wxuser=D('Wxuser')->where($where)->find();
        if (!$this->token){
            $this->token = $wxuser['token'];
        }
		$this->weixinUser=$wxuser;
		
		if (isset($_GET['wecha_id'])&&$_GET['wecha_id']){
			$_SESSION['wecha_id']=$_GET['wecha_id'];
			$this->wecha_id=$this->_get('wecha_id');
		}
		if (isset($_SESSION['wecha_id'])){
			$this->wecha_id=$_SESSION['wecha_id'];
		}
		//获取分类信息Classify
        $classify=M('Classify')->where(array('token'=>$this->token,'status'=>1))->order('sorts desc')->select();
        $classify=$this->convertLinks($classify);//加外链等信息
        //获取用户组ID
		$gid=D('Users')->field('gid')->find($wxuser['uid']);
		$this->userGroup=M('User_group')->where(array('id'=>$gid['gid']))->find();
		$this->copyright=$this->userGroup['iscopyright'];
		
		$this->classify=$classify;
        $wxuser['color_id']=intval($wxuser['color_id']);
		$this->wxuser=$wxuser;
        //旧版门店Company
		$company_db=M('company');
		$this->company=$company_db->where(array('token'=>$this->token,'isbranch'=>0))->find();
		$this->assign('company',$this->company);
		//微官网主表Home
		$homeInfo=M('home')->where(array('token'=>$this->token))->find();
		$this->homeInfo=$homeInfo;
		$this->assign('iscopyright',$this->copyright);//是否允许自定义版权
		$this->assign('siteCopyright',C('copyright'));//站点版权信息
		$this->assign('homeInfo',$homeInfo);
		//Wxuser token
		$this->assign('token',$this->token);
		$this->assign('copyright',$this->copyright);
		//plugmenus
		$plugMenus=$this->_getPlugMenu();
		$this->assign('plugmenus',$plugMenus);
		$this->assign('showPlugMenu',count($plugMenus));
        //wxname&token&wecha_id
        $this->assign('wxname',$this->wxname);
        $this->assign('token',$this->token);
        $this->assign('wecha_id',$this->wecha_id);

        $this->assign('classify',$this->classify);
        $this->assign('wxuser',$this->wxuser);
	}
	
	
	public function classify(){
		$this->display($this->wxuser['tpltypename']);
	}

    public function test(){
        print_r($this->tVar);
        exit;
    }

	public function index(){
		//是否是高级模板    预留
		if ($this->homeInfo['advancetpl']){
			echo '<script>window.location.href="/cms/index.php?token='.$this->token.'&wecha_id='.$this->wecha_id.'";</script>';
			exit();
		}
		//
		$where['token']=$this->_get('token');
        LOG::write($this->_get('wechatid'),LOG::ERR);
		//dump($where);
		//	$where['status']=1;  幻灯片Flash
		$flash=M('Flash')->where($where)->select();
		$flash=$this->convertLinks($flash);
		$count=count($flash);
		$this->assign('flash',$flash);
		$this->assign('num',$count);
        //print_r($this->tpl);
		$this->display($this->wxuser['tpltypename']);
	}
	
	public function lists(){
		$where['token']=$this->token;
		$db=D('Img');	
		if($_GET['pageNum']==false){
			$pageNum=1;
		}else{
            $pageNum=$_GET['pageNum'];
		}		
		$where['classid']=$this->_get('classid','intval');
		$count=$db->where($where)->count();	
		$pageSize=8;	
		$pagecount=ceil($count/$pageSize);
		if($pageNum > $pagecount){$pageNum=$pagecount;}
		if($pageNum >=1){$pageNum=($pageNum-1)*$pageSize;}
		if($pageNum==false){$pageNum=0;}
		$info=$db->where($where)->order('createtime DESC')->limit("{$pageNum},".$pageSize)->select();
		$info=$this->convertLinks($info);
		$this->assign('pageCount',$pagecount);
		$this->assign('pageNum',$pageNum);
		$this->assign('info',$info);
		$this->assign('copyright',$this->copyright);
        dump($info);
		if ($count==1){
			$this->detail($info[0]['id']);
			exit();
		}
		$this->display($this->wxuser['tpllistname']);
	}
	
	public function detail($contentid=0){
        $where['wxname']=$this->_get('wxname','trim');
		$db=M('Img');
		if (!$contentid){
			$contentid=intval($_GET['id']);
		}
		$where['id']=array('neq',$contentid);
		$lists=$db->where($where)->limit(5)->order('updatetime')->select();
		$where['id']=$contentid;
		$res=$db->where($where)->find();
		$this->assign('lists',$lists);		//列表信息
		$this->assign('res',$res);			//内容详情;
		$this->assign('copyright',$this->copyright);	//版权是否显示
        LOG::write('图文手机页面:WAP/Index/'.$this->wxuser['tplcontentname'],LOG::ERR);
		$this->display($this->wxuser['tplcontentname']);
	}
	
	public function flash(){
		$where['token']=$this->_get('token','trim');
		$flash=M('Flash')->where($where)->select();
		$count=count($flash);
		$this->assign('flash',$flash);
		$this->assign('info',$this->info);
		$this->assign('num',$count);
		$this->display('ty_index');
	}
	/**
	 * 获取链接
	 *
	 * @param unknown_type $url
	 * @return unknown
	 */
	public function getLink($url){
		$urlArr=explode(' ',$url);
		$urlInfoCount=count($urlArr);
		if ($urlInfoCount>1){
			$itemid=intval($urlArr[1]);
		}
		//会员卡 刮刮卡 团购 商城 大转盘 优惠券 订餐 商家订单 表单
		if (strExists($url,'刮刮卡')){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'大转盘')){
			$link='/index.php?g=Wap&m=Lottery&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'砸金蛋')){
			$link='/index.php?g=Wap&m=Zadan&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'优惠券')){
			$link='/index.php?g=Wap&m=Coupon&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'刮刮卡')){
			$link='/index.php?g=Wap&m=Guajiang&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link.='&id='.$itemid;
			}
		}elseif (strExists($url,'商家订单')){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Host&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&hid='.$itemid;
			}else {
				$link='/index.php?g=Wap&m=Host&a=Detail&token='.$this->token.'&wecha_id='.$this->wecha_id;
			}
		}elseif (strExists($url,'万能表单')){
			if ($itemid){
				$link=$link='/index.php?g=Wap&m=Selfform&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif (strExists($url,'相册')){
			$link='/index.php?g=Wap&m=Photo&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Photo&a=plist&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif (strExists($url,'全景')){
			$link='/index.php?g=Wap&m=Panorama&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
			if ($itemid){
				$link='/index.php?g=Wap&m=Panorama&a=item&token='.$this->token.'&wecha_id='.$this->wecha_id.'&id='.$itemid;
			}
		}elseif (strExists($url,'会员卡')){
			$link='/index.php?g=Wap&m=Card&a=vip&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'商城')){
			$link='/index.php?g=Wap&m=Product&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'订餐')){
			$link='/index.php?g=Wap&m=Product&a=dining&dining=1&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'团购')){
			$link='/index.php?g=Wap&m=Groupon&a=grouponIndex&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'留言')){
			$link='/index.php?g=Wap&m=Liuyan&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}elseif (strExists($url,'首页')){
			$link='/index.php?g=Wap&m=Index&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
		}else {
			if (strpos($url,'?')){
				$link=str_replace('{wechat_id}',$this->wecha_id,$url).'&wecha_id='.$this->wecha_id;
			}else {
				$link=str_replace('{wechat_id}',$this->wecha_id,$url).'?wecha_id='.$this->wecha_id;
			}
			
		}
		return $link;
	}
	public function convertLinks($arr){
		$i=0;
		foreach ($arr as $a){
			if ($a['url']){
				$arr[$i]['url']=$this->getLink($a['url']);
			}
			$i++;
		}
		return $arr;
	}
	public function _getPlugMenu(){
		$company_db=M('company');
		$this->company=$company_db->where(array('token'=>$this->token,'isbranch'=>0))->find();
		$plugmenu_db=M('site_plugmenu');
		$plugmenus=$plugmenu_db->where(array('token'=>$this->token,'display'=>1))->order('taxis ASC')->limit('0,4')->select();
		if ($plugmenus){
			$i=0;
			foreach ($plugmenus as $pm){
				switch ($pm['name']){
					case 'tel':
						if (!$pm['url']){
							$pm['url']='tel:'.$this->company['tel'];
						}else {
							$pm['url']='tel:'.$pm['url'];
						}
						break;
					case 'memberinfo':
						if (!$pm['url']){
							$pm['url']='/index.php?g=Wap&m=Userinfo&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
						}
						break;
					case 'nav':
						if (!$pm['url']){
							$pm['url']='/index.php?g=Wap&m=Company&a=map&token='.$this->token.'&wecha_id='.$this->wecha_id;
						}
						break;
					case 'message':
						break;
					case 'share':
						break;
					case 'home':
						if (!$pm['url']){
							$pm['url']='/index.php?g=Wap&m=Index&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
						}
						break;
					case 'album':
						if (!$pm['url']){
							$pm['url']='/index.php?g=Wap&m=Photo&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
						}
						break;
					case 'email':
						$pm['url']='email:'.$pm['url'];
						break;
					case 'shopping':
						if (!$pm['url']){
							$pm['url']='/index.php?g=Wap&m=Product&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id;
						}
						break;
					case 'membercard':
						$card=M('member_card_create')->where(array('token'=>$this->token,'wecha_id'=>$this->wecha_id))->find();
						if (!$pm['url']){
							if($card==false){
								$pm['url']=rtrim(C('site_url'),'/').U('Wap/Card/get_card',array('token'=>$this->token,'wecha_id'=>$this->wecha_id));
							}else{
								$pm['url']=rtrim(C('site_url'),'/').U('Wap/Card/vip',array('token'=>$this->token,'wecha_id'=>$this->wecha_id));
							}
						}
						break;
					case 'activity':
						$pm['url']=$this->getLink($pm['url']);
						break;
					case 'weibo':
						break;
					case 'tencentweibo':
						break;
					case 'qqzone':
						break;
					case 'wechat':
						$pm['url']='weixin://addfriend/'.$this->weixinUser['wxid'];
						break;
					case 'music':
						break;
					case 'video':
						break;
					case 'recommend':
						$pm['url']=$this->getLink($pm['url']);
						break;
					case 'other':
						$pm['url']=$this->getLink($pm['url']);
						break;
				}
				$plugmenus[$i]=$pm;
				$i++;
			}
			
		}else {//默认的
			$plugmenus=array();
			/*
			$plugmenus=array(
			array('name'=>'home','url'=>'/index.php?g=Wap&m=Index&a=index&token='.$this->token.'&wecha_id='.$this->wecha_id),
			array('name'=>'nav','url'=>'/index.php?g=Wap&m=Company&a=map&token='.$this->token.'&wecha_id='.$this->wecha_id),
			array('name'=>'tel','url'=>'tel:'.$this->company['tel']),
			array('name'=>'share','url'=>''),
			);
			*/
		}
		return $plugmenus;
	}
}

