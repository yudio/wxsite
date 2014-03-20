<?php

class ReplyAction extends UserAction
{

    /*
     *
     * 自动回复设置
     */
    public function autoset(){
        $db  = D('Areply');
        $res = $db->where(array('uid'=>session('uid'),'token'=>session('token')))->find();
        $this->assign('info',$res);
        $this->display();
    }

    public function autoupdate(){
        C('TOKEN_ON',false);
        if (IS_POST){
            $db  = M('Areply');
            $res = $db->where(array('uid'=>session('uid'),'token'=>session('token')))->find();
            $_POST['token'] = session('token');
            $_POST['uid']   = session('uid');
            if ($res == false) {
                if ($_POST['is_news']=='1'){
                    $_POST['home']  = 1;
                }else{
                    $_POST['home']  = "";
                }
                if (!isset($_POST['default_reply_flag'])){
                    $_POST['default_reply_flag'] = 0;
                }
                $_POST['createtime'] = time();
                if ($db->create()){
                    $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }else{
                $_POST['id'] =$res['id'];
                if ($_POST['is_news']=='1'){
                    $_POST['home']  = 1;
                }else{
                    $_POST['home']  = "";
                }
                if (!isset($_POST['default_reply_flag'])){
                    $_POST['default_reply_flag'] = 0;
                }
                $_POST['updatetime'] = time();
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }
        }
    }
    /*
     *
     * 关注文本回复
     */
    public function subscribe(){
        C('TOKEN_ON',false);
        $db  = D('Areply');
        $res = $db->where(array('uid'=>session('uid'),'token'=>session('token')))->find();
        $this->assign('info',$res);
        $this->display();
    }

    public function subsupdate(){
        C('TOKEN_ON',false);
        if (IS_POST){
            $db  = D('Areply');
            $res = $db->where(array('uid'=>session('uid'),'token'=>session('token')))->find();
            if ($res == false) {
                $_POST['createtime'] = time();
                $_POST['updatetime'] = $_POST['createtime'];
                if ($db->create()){
                    $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }else{
                $_POST['id'] =$res['id'];
                $_POST['updatetime'] = time();
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }
        }
    }


    public function subscribenews(){
        C('TOKEN_ON',false);
        $db  = D('Img');
        $res = $db->where(array('uid'=>session('uid'),'token'=>session('token'),'match_type'=>'3'))->find();
        $this->assign('info',$res);
        $this->display();
    }

    public function subsnewsupdate(){
            C('TOKEN_ON',false);
            //$pat = "/<(\/?)(script|i?frame|style|html|body|title|font|strong|span|div|marquee|link|meta|\?|\%)([^>]*?)>/isU";
            //添加图文是保留格式
            $pat = "/<(\/?)(script|i?frame|style|html|body|title|marquee|link|meta|\?|\%)([^>]*?)>/isU";
            $_POST['info'] = preg_replace($pat,"",$_POST['info']);
            //$_POST['info']=strip_tags($this->_post('info'),'<a> <p> <br>');
            //dump($_POST['info']);
            $db   = D('Img');
            $res = $db->where(array('uid'=>session('uid'),'token'=>session('token'),'match_type'=>'3'))->find();
            if ($res == false) {
                if ($db->create()){
                    $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }else{
                $_POST['id'] =$res['id'];
                $_POST['updatetime'] = time();
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }

    }
    /*
     *
     * 自定义文本信息
     */
    public function textlist(){
        $type = $this->_get('type');
        $keys = $this->_get('keywords');
        $db=D('Text');
        $where['uid']=session('uid');
        $where['token']=session('token');
        if ($type){$where['type'] = $type;}
        if ($keys){$where['keyword'] = array('like','%'.$keys.'%');}
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }
    public function addtext(){
        C('TOKEN_ON',false);
        $db = D('Text');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $data['pid']    = $id;
                    $data['match_type'] = $this->_post('match_type');
                    $data['token']  = session('token');
                    $data['keyword']  = $this->_post('keyword');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！','url'=>'/npManage/reply/addtext.act?id='.$id),'JSON');
                    }
                    $db->save();
                    Keyword::update($data,'Text');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/reply/textlist.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $data['pid']     = 0;
                    $data['match_type'] = $this->_post('match_type');
                    $data['token']  = session('token');
                    $data['keyword']  = $this->_post('keyword');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'Text');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/reply/textlist.act'),'JSON');
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
    public function textdel(){
        $where['id']=$this->_post('id','intval');
        $where['uid']=session('uid');
        $db = D('Text');
        if(D('Text')->where($where)->delete()){
            M('Keyword')->where(array('pid'=>$where['id'],'token'=>session('token'),'module'=>'Text'))->delete();
            $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
        }
    }

    /*
     *
     * 自定义图文News
     */
    public function newslist(){
        $type = $this->_get('type');
        $keys = $this->_get('keywords');
        $classid = $this->_get('classid');
        $db=D('Img');
        //$where['uid']=session('uid');
        $where['token']=session('token');
        if ($type){
            $where['type'] = $type;
        }else{
            $where['type'] = array('LT','3');
        }
        if ($keys){$where['keyword'] = array('like','%'.$keys.'%');}
        if ($classid){$where['classid'] = array('eq',$classid);}
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info=$db->where($where)->order('createtime DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('info',$info);
        $this->display();
    }
    public function addnews(){
        C('TOKEN_ON',false);
        $db = D('Img');
        if (IS_POST){
            $id = $this->_post('id');
            $subnews = implode(',',$_REQUEST['votetouser'][0]);
            $_POST['news'] = $subnews;
            //外链配置
            $_POST['type'] = $this->_post('type');
            $typemap = C('img_typemap');
            $_POST['typename'] = $typemap[$_POST['type']];
            $_POST['uid']    = session('uid');
            $_POST['token']    = session('token');
            LOG::write('URL'.$_POST['url'],LOG::ERR);
            if ($id){//更新操作
                $_POST['url'] = TypeLink::getTypeLink($_POST,'Img');
                if ($db->create()){
                    //关键字应答
                    $data['pid']    = $id;
                    $data['match_type'] = $this->_post('match_type','intval');
                    $data['token']  = session('token');
                    $data['keyword']  = $this->_post('keyword');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    Keyword::update($data,'Img');
                    //外链配置
                    $newdb = D('Typelink');
                    $tlink = $newdb->field('id')->where($data)->find();
                    $data  = $_POST;
                    $data['pid'] = $id;
                    $data['module'] = 'Img';
                    $data['id']     = $tlink['id'];
                    if ($newdb->create($data)){
                        $newdb->save();
                    }else{
                        LOG::write('addnews|save'.$newdb->getError(),LOG::ERR);
                    }
                    //更新
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/reply/newslist.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    //关键字应答
                    $data['pid']     = 0;
                    $data['match_type'] = $this->_post('match_type','intval');
                    $data['token']  = session('token');
                    $data['keyword']  = $this->_post('keyword');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']      = $id;
                    Keyword::update($data,'Img');
                    //外链配置
                    $data = $_POST;
                    $_POST['id'] = $id;
                    $url = TypeLink::getTypeLink($_POST,'Img');
                    $db->save(array('id'=>$id,'url'=>$url));  //生成URL
                    $data['url'] = $url;
                    $data['pid'] = $id;
                    $data['module'] = 'Img';
                    $newdb = D('Typelink');
                    if ($newdb->create($data)){
                        $newdb->add();
                    }else{
                        LOG::write('addnews|add'.$newdb->getError(),LOG::ERR);
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/reply/newslist.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }
        }
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->where(array('id'=>$id))->find();
            $this->assign('info',$info);
            if ($info['news']){
                $newswhere['id'] = array('in',$info['news']);
                $news = M('Img')->field('id,title')->where($newswhere)->select();
                $this->assign('news',$news);
            }
        }
        $class=M('Classify')->field('id,name')->where(array('token'=>session('token')))->select();
        /*if(!$class){
            //$this->ajaxReturn(array('errno'=>'0','error'=>'请先添加分类信息！','/npManage/microsite/classify.act'),'JSON');
            $this->error('请先添加分类信息！','/npManage/microsite/classify.act');
        }*/
        $this->assign('classinfo',$class);
        //加载外链配置
        $this->assign('typelist',C('img_typelist'));
        $this->assign('businesslist',C('businesslist'));
        $this->assign('activitylist',C('activitylist'));
        //dump($info);
        $this->display();
    }
    public function newsdel(){
        $where['id']=$this->_post('id','intval');
        $where['uid']=session('uid');
        $db = D('Img');
        if(D('Img')->where($where)->delete()){
            M('Keyword')->where(array('pid'=>$where['id'],'token'=>session('token'),'module'=>'Img'))->delete();
            $this->ajaxReturn(array('errno'=>'0','error'=>'成功！'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
        }
    }
    public function newsinsert(){
        //$pat = "/<(\/?)(script|i?frame|style|html|body|title|font|strong|span|div|marquee|link|meta|\?|\%)([^>]*?)>/isU";
        //添加图文是保留格式
        $pat = "/<(\/?)(script|i?frame|style|html|body|title|marquee|link|meta|\?|\%)([^>]*?)>/isU";
        $_POST['info'] = preg_replace($pat,"",$_POST['info']);
        //$_POST['info']=strip_tags($this->_post('info'),'<a> <p> <br>');
        //dump($_POST['info']);
        $this->all_insert();
    }
    public function newssave(){
        $this->all_save();
    }

    public function getjsonnews(){
        $db = M('Img');
        $where = array();
        if($key=$this->_get('key')){
            $where['like'] = array('keyword','%'.$key.'%');
        }
        $where['uid']    = session('uid');
        $where['token']  = session('token');
        $where['id']     = array('neq',$this->_get('tid'));
        $where['match_type']   = array('lt',3);
        $count=$db->where($where)->count();
        $page=new Page($count,25);
        $info = array();
        $info=$db->where($where)->order('createtime DESC')->limit($page->firstRow.','.$page->listRows)->select();
        LOG::write('SQL:'.$db->getLastSql(),LOG::ERR);
        //$this->assign('page',$page->show());
        //$this->assign('info',$info);
        $this->ajaxReturn(array('count'=>$count,'list'=>$info),'JSON');
    }

}
?>