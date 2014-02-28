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
        return array('url'=>CURL_SITE.'/wechat.wx/'.sesson('token').'?wechatid=fromUsername','token'=>session('token'));
    }
    //微官网配置
    public function set(){
        $home=$this->home_db->where(array('token'=>session('token')))->find();
        if(IS_POST){
            if($home==false){
                //$this->all_insert('Home','/set');
                $_POST['wxkey'] = mb_strtoupper($_POST['wxkey'],'UTF-8');
                $db   = D('Home');
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');//error($db->getError());
                } else {
                    $id = $db->add();
                    $data['pid']     = $id;
                    $data['module']  = 'Home';
                    $data['token']   = session('token');
                    $data['keyword'] = $_POST['info'];
                    M('Keyword')->add($data);
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/MicroSite/set.act'),'JSON');
                }
            }else{
                $_POST['wxkey'] = mb_strtoupper($_POST['wxkey'],'UTF-8');
                $_POST['id']=$home['id'];
                //$this->all_save('Home','/set');
                $db   = D('Home');
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');//error($db->getError());
                } else {
                    $id = $db->save();
                    $data['pid']    = $_POST['id'];
                    $data['module'] = 'Home';
                    $data['token']  = session('token');
                    $da['keyword']  = $_POST['info'];
                    M('Keyword')->where($data)->save($da);
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/MicroSite/set.act'),'JSON');
                }
            }
        }else{
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
                $data['tpltypename'] = $value.'_index';
                break;
            case 'channel':
                $data['tplchid'] = $value;
                $data['tplchname'] = $value.'_ch';
                break;
            case 'list':
                $data['tpllistid'] = $value;
                $data['tpllistname'] = $value.'_list';
                break;
            case 'detail':
                $data['tplcontentid'] = $value;
                $data['tplcontentname'] = $value.'_detail';
                break;
            case 'menu':
                $data['tplmenuid'] = $value;
                $data['tplmenuname'] = $value.'_menu';
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


}


?>