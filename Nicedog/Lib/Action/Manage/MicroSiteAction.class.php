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
        $this->token=session('token');
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
        $access = M('WxuserAccess')->field('node_id')->where(array('wxuid'=>$info['id']))->order('pid')->select();
        $menu = M('WxuserNode')->where(array('status'=>1,'pid'=>1))->select();
        foreach($menu as $key=>&$vo){
            LOG::write('IN_ARRAY'.$vo['id'],LOG::ERR);
            if (!in_array(array('node_id'=>$vo['id']),$access)){
                unset($menu[$key]);
            }
            $submenu = M('WxuserNode')->where(array('status'=>1,'pid'=>$vo['id']))->select();
            foreach($submenu as $ki=>$vi){
                if (!in_array(array('node_id'=>$vi['id']),$access)){
                    unset($submenu[$ki]);
                }
            }
            $vo['submenu'] = $submenu;
        }
        //dump($menu);
        session('token',$token);
        session('wxid',$info['id']);
        $this->assign('menu',$menu);
        $this->assign('token',session('token'));
        $this->assign('info',$info);
        //
        $this->display();
    }
    /*
     *
     * 运营图表
     */
    public function stat(){
        $month = $this->_get('period','intval');
        if (!$month){
            $month = date('m');
        }
        $this->assign('month',$month);
        $this->display();
    }
    public function getStatXML(){
        $db = M('Requestdata');
        $period = $this->_get('period','intval');
        $type = $this->_get('type');
        $time = mktime(0,0,1,$period,date('d'),date('Y'));
        $tcount = date('t',$time);
        if ($type=='req'){
            $where['month'] = $period;
            $where['year']  = date('Y');
            $where['token'] = session('token');
            $where['module'] = array('exp','is null');
            $list = $db->where($where)->order('day')->select();
            LOG::write('XML:'.$db->getError(),LOG::ERR);
            $this->assign('list',$list);
            $this->assign('tcount',$tcount);
            $this->assign('head',date('Y').'-'.$period.'月请求曲线');
            $this->display('reqxml','utf-8','application/xml');
        }
        if ($type=='user'){
            $where['month'] = $period;
            $where['year']  = date('Y');
            $where['token'] = session('token');
            $where['module'] = array('exp','is null');
            $list = $db->where($where)->order('day')->select();
            LOG::write('XML:'.$db->getError(),LOG::ERR);
            $this->assign('list',$list);
            $this->assign('tcount',$tcount);
            $this->assign('head',date('Y').'-'.$period.'用户曲线');
            $this->display('userxml','utf-8','application/xml');
        }

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
        C('TOKEN_ON',false);
        $db   = D('Home');
        $home=$db->where(array('token'=>session('token')))->find();
        if(IS_POST){
            $_POST['token'] = $this->token;
            if($home==false){
                //$this->all_insert('Home','/set');
                $_POST['wxkey'] = mb_strtoupper($_POST['wxkey'],'UTF-8');
                $_POST['smart_branch'] = $this->_post('smart_branch','htmlspecialchars');
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');//error($db->getError());
                } else {
                    $_POST['token'] = session('token');
                    $data['pid']     = 0;
                    $data['token']   = session('token');
                    $data['keyword'] = $this->_post('wxkey');
                    $data['match_type'] = $this->_post('match_type','intval');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'Home');
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
                    $data['pid']    = $this->_post('id','intval');
                    $data['token']   = session('token');
                    $data['keyword'] = $this->_post('wxkey');
                    $data['match_type'] = $this->_post('match_type','intval');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->save();
                    Keyword::update($data,'Home');
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
        $where['token']=session('token');
        $where['category_id'] = array('eq',0);
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->order('sorts')->limit($page->firstRow.','.$page->listRows)->select();
        foreach($info as $key=>&$vo){
            $list = $db->where(array('category_id'=>$vo['id']))->order('sorts')->select();
            $vo['sub'] = $list;
        }
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }

    public function addclassify(){
        $db=D('Classify');
        $where['token']=session('token');
        $where['category_id'] = 0; // 取一级分类
        $info = $db->where($where)->order('sorts')->select();
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
        $db = M('Plugmenu');
        $homedb = M('Home');
        $info = $db->where(array('token'=>session('token')))->select();
        $home = $homedb->field('id,plugmenu,plugmenucolor,copyright')->where(array('token'=>session('token')))->find();
        $this->assign('home',$home);
        $this->assign('info',$info);
        $this->display();

    }
    public function addplugmenu(){
        $db = M('Plugmenu');
        C('TOKEN_ON',false);
        if (IS_POST){
            $id = $this->_post('id');
            //$types = explode(',',$_POST['type']);
            $_POST['type'] = $this->_post('type');
            $typemap = C('plugmenu_typemap');
            $_POST['typename'] = $typemap[$_POST['type']];
            $_POST['uid']    = session('uid');
            $_POST['token']    = session('token');
            if ($id){//更新操作
                $_POST['url'] = TypeLink::getTypeLink($_POST,'Plugmenu');
                if ($db->create()){
                    //外链设置START
                    $where['pid'] = $id;
                    $where['module'] = 'Plugmenu';
                    $newdb = D('Typelink');
                    $tlink = $newdb->field('id')->where($where)->find();
                    $data  = $_POST;
                    $data['pid'] = $id;
                    $data['module'] = 'Plugmenu';
                    $data['id']     = $tlink['id'];
                    if ($newdb->create($data)){
                        $newdb->save();
                    }else{
                        dump($newdb->getError());
                    }
                    //外链设置END
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/microsite/plugmenu.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $data = $_POST;
                    $_POST['id']  = $id;
                    $url = TypeLink::getTypeLink($_POST,'Plugmenu');
                    $db->save(array('id'=>$id,'url'=>$url));       //生成URL
                    //外链设置START
                    $data['url'] = $url;
                    $data['pid'] = $id;
                    $data['module'] = 'Plugmenu';
                    $newdb = D('Typelink');
                    if ($newdb->create($data)){
                        $newdb->add();
                    }else{
                        dump($newdb->getError());
                    }
                    //外链设置END
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/microsite/plugmenu.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }
        }
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->where(array('id'=>$id))->find();
            $plugmens = M('Typelink')->where(array('pid'=>$id,'module'=>'Plugmenu'))->find();
            if ($plugmens){
                $info = array_merge($plugmens,$info);
            }
            $this->assign('info',$info);
        }
        //加载外链配置
        $this->assign('typelist',C('plugmenu_typelist'));
        $this->assign('businesslist',C('businesslist'));
        $this->assign('activitylist',C('activitylist'));
        $this->display();
    }
    public function delplugmenu(){
        $back=M('Plugmenu')->where(array('token'=>session('token'),'id'=>$this->_get('id')))->delete();
        if($back==true){
            $this->success('删除成功','/npManage/microsite/plugmenu.act');
        }else{
            $this->error('删除失败','/npManage/microsite/plugmenu.act');
        }
    }

    public function plugmenu_show(){
        $db = M('Plugmenu');
        $data['id'] = $this->_post('id','intval');
        $data['is_show'] = $this->_post('ck','intval');
        if ($db->save($data)){
            $this->ajaxReturn(array('errno'=>'0','error'=>'更新成功'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>'更新失败'),'JSON');
        }
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
                $this->ajaxReturn(array('errno'=>'100','error'=>'更新完成！'),'JSON');
                LOG::write('updateplugmenu'.$db->getError(),LOG::ERR);
            }


        }

    }

}
