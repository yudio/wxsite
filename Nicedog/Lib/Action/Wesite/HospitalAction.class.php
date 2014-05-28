<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 14-4-6
 * Time: 下午5:29
 */
function strExists($haystack, $needle)
{
    return !(strpos($haystack, $needle) === FALSE);
}

class HospitalAction extends WebAction{
    private $wxuser;	//微信公共帐号信息
    public $classify;	//分类信息
    private $wecha_id;
    private $copyright;
    public $company;
    public $token;
    public $weixinUser;
    public $homeInfo;
    //wxnmae
    public $wxname;
    public $wxuid;

    public function _initialize(){
        parent::_initialize();
        /*$agent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
            echo '此功能只能在微信浏览器中使用';exit;
        }*/
        C('TMPL_FILE_DEPR','/');//定义分割符

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
        //$this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        //$this->assign('wxuid',$this->wxuid);
        //
        //获取分类信息Classify
        $classify=M('Classify')->where(array('token'=>$this->token,'category_id'=>0,'status'=>1))->order('sorts desc,id desc')->select();
        $this->classify=$classify;
    }
    public function doclist(){
        $db=D('Doctors');
        $where['token']=session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,100);
        $info=$db->where($where)->order('sorts')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->assign('classify',$this->classify);
        $this->display();
    }
}