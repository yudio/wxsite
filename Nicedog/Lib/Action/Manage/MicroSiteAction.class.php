<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-24
 * Time: 上午9:48
 */

class MicroSiteAction extends UserAction{
    private $token;
    private $home_db;
    public function _initialize() {
        parent::_initialize();
        $this->token=$this->_session('token');
        $this->home_db=M('home');
    }
    /*
     *
     * 进入公众号管理页面
     */
    public function main(){
        $id=$this->_get('id','intval');
        $token=$this->_get('token','trim');
        $info=M('Wxuser')->find($id);
        if($info==false||$info['token']!==$token){
            $this->error('非法操作','/');
        }
        session('token',$token);
        session('wxid',$info['id']);
        $this->assign('token',session('token'));
        $this->assign('info',$info);
        //
        $this->display();
    }
    /*
     *
     * 获取接口地址
     */
    public function getAPIAddr(){
        return array('url'=>CURL_SITE.'/wechat/'.session('token'),'token'=>session('token'));
    }
    //微官网配置
    public function set(){
        $db   = D('Home');
        $home=$db->where(array('token'=>session('token')))->find();
        if(IS_POST){
            if($home==false){
                //$this->all_insert('Home','/set');
                $_POST['wxkey'] = mb_strtoupper($_POST['wxkey'],'UTF-8');
                $_POST['smart_branch'] = $this->_post('smart_branch','htmlspecialchars');
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');//error($db->getError());
                } else {
                    $_POST['token'] = session('token');
                    $id = $db->add();
                    $data['pid']     = $id;
                    $data['module']  = 'Home';
                    $data['token']   = session('token');
                    $data['keyword'] = $_POST['wxkey'];
                    M('Keyword')->add($data);
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/MicroSite/set.act'),'JSON');
                }
            }else{
                $_POST['wxkey'] = mb_strtoupper($_POST['wxkey'],'UTF-8');
                $_POST['id']=$home['id'];
                //过滤htmlspecialchars
                $_POST['smart_branch'] = $this->_post('smart_branch','htmlspecialchars');
                //$this->all_save('Home','/set');
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');//error($db->getError());
                } else {
                    $id = $db->save();
                    $data['pid']    = $_POST['id'];
                    $data['module'] = 'Home';
                    $data['token']  = session('token');
                    $da['keyword']  = $_POST['wxkey'];
                    M('Keyword')->where($data)->save($da);
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/MicroSite/set.act'),'JSON');
                }
            }
        }else{
            $wxuser = M('Wxuser')->field('id,wxname')->where(array('token'=>session('token')))->find();
            $this->assign('wxuser',$wxuser);
            $this->assign('home',$home);
            $this->display();
        }
    }
    /*
     *
     * 幻灯片列表
     */
    public function slide(){
        $db=D('Flash');
        $where['uid']=session('uid');
        $where['token']=session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->order('sort')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }

    public function slide_insert(){
        $db = D('Flash');
        if ($db->create() === false) {
            $this->ajaxReturn(array('errno'=>'1','error'=>'M(slide_insert).'.$db->getError()),'JSON');
        } else {
            $id = $db->add();
            if ($id) {
                $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/MicroSite/slide.act'),'JSON');
            } else {
                $this->ajaxReturn(array('errno'=>'1','error'=>'M(slide_insert).'.$db->getError()),'JSON');
            }
        }
    }
    public function slide_update(){
        $db = D('Flash');
        if ($db->create() === false) {
            $this->ajaxReturn(array('errno'=>'1','error'=>'M(slide_update).'.$db->getError()),'JSON');
        } else {
            $id = $db->save();
            if ($id) {
                $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/MicroSite/slide.act'),'JSON');
            } else {
                $this->ajaxReturn(array('errno'=>'1','error'=>'M(slide_update).'.$db->getError()),'JSON');
            }
        }
    }

    public function editslide(){
        $where['id']=$this->_get('id','intval');
        $where['uid']=session('uid');
        $res=D('Flash')->where($where)->find();
        $this->assign('info',$res);
        $this->display();
    }
    public function slide_del(){
        $where['id']=$this->_get('id','intval');
        $where['uid']=session('uid');
        $db = D('Flash');
        if($db->where($where)->delete()){
            $this->redirect('Manage/MicroSite/slide');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
        }
    }

    /*
     *
     * 分类信息
     */
    public function classify(){
        $db=D('Classify');
        $where['uid']=session('uid');
        $where['token']=session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->order('sorts')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }

    public function classify_insert(){
        $db = D('Classify');
        if ($db->create() === false) {
            $this->ajaxReturn(array('errno'=>'1','error'=>'M(classify_insert).'.$db->getError()),'JSON');
        } else {
            $id = $db->add();
            if ($id) {
                $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/MicroSite/classify.act'),'JSON');
            } else {
                $this->ajaxReturn(array('errno'=>'1','error'=>'M(classify_insert).'.$db->getError()),'JSON');
            }
        }
    }
    public function classify_update(){
        $db = D('Classify');
        if ($db->create() === false) {
            $this->ajaxReturn(array('errno'=>'1','error'=>'M(classify_update).'.$db->getError()),'JSON');
        } else {
            $id = $db->save();
            if ($id) {
                $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/MicroSite/classify.act'),'JSON');
            } else {
                $this->ajaxReturn(array('errno'=>'1','error'=>'M(classify_update).'.$db->getError()),'JSON');
            }
        }
    }

    public function editclassify(){
        $where['id']=$this->_get('id','intval');
        $where['uid']=session('uid');
        $res=D('Classify')->where($where)->find();
        $this->assign('info',$res);
        $this->display();
    }
    public function classify_del(){
        $where['id']=$this->_get('id','intval');
        $where['uid']=session('uid');
        $db = D('Classify');
        if($db->where($where)->delete()){
            $this->redirect('Manage/MicroSite/classify');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
        }
    }
    /*
     *
     * 模版管理
     */
    public function tmpls_update(){
        $key    = $this->_post('key');
        $value  = $this->_post('value');
        //$gets = $this->_get('style');
        //LOG::write("{$key}=>{$value}",LOG::ERR);
        if (!isset($key)||!isset($value)){
            $this->ajaxReturn(array('code'=>100,'error'=>'数据错误！请联系管理员！'),'JSON');
        }
        $db = M('Wxuser');
        switch ($key) {
            case 'home':
                $data['tpltypeid'] = $value;
                $data['tpltypename'] = 'index';
                break;
            case 'channel':
                $data['tplchid'] = $value;
                $data['tplchname'] = 'channel';
                break;
            case 'list':
                $data['tpllistid'] = $value;
                $data['tpllistname'] = 'list';
                break;
            case 'detail':
                $data['tplcontentid'] = $value;
                $data['tplcontentname'] = 'detail';
                break;
            case 'menu':
                $data['tplmenuid'] = $value;
                $data['tplmenuname'] = 'menu';
                break;
        }
        $where['token'] = session('token');
        $db->where($where)->save($data);
        //屏蔽高级模版
        M('Home')->where(array('token'=>session('token')))->save(array('advancetpl'=>0));
        $this->ajaxReturn(array('code'=>200,'error'=>''),'JSON');
    }
    /**
     *
     *
     * plugmenu
     */
    public function plugmenu(){
        $db = D('Plugmenu');
        $homedb = M('Home');
        $info = $db->where(array('token'=>session('token')))->select();
        $home = $homedb->field('id,plugmenu,plugmenucolor,copyright')->where(array('token'=>session('token')))->find();
        $this->assign('home',$home);
        $this->assign('info',$info);
        $this->display();

    }
    public function addplugmenu(){
        $db = D('Plugmenu');
        if (IS_POST){
            $id = $this->_post('id');
            $types = explode(',',$_POST['type']);
            $_POST['type'] = $types[0];
            $_POST['typename'] = $types[1];
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/microsite/plugmenu.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/microsite/plugmenu.act'),'JSON');
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

    public function updateplugmenu(){
        $db = M('Home');
        if (IS_POST){
            $home = $db->field('id')->where(array('token'=>session('token')))->find();
            if (!home){
                $this->error('请先设置微官网','/npManage/microsite/set.act');
            }
            $data = array();
            $data['id'] = $home['id'];
            $data['plugmenu'] = $this->_post('plugmenu');
            $data['plugmenucolor'] = $this->_post('plugmenucolor');
            $data['copyright'] = $this->_post('copyright');
            if($db->data($data)->save()){
                $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/microsite/plugmenu.act'),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
            }


        }

    }

}


?>