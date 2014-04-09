<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-24
 * Time: 上午9:48
 */

class EstateAction extends UserAction{
    private $token;
    public function _initialize() {
        parent::_initialize();
        $this->token = session('token');
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');
    }

    public function estateList(){
        $db = M('EstateSet');
        $where['token'] = $this->token;
        $list = $db->where($where)->select();
        $this->assign('list',$list);
        $this->display();
    }

    //微房产配置
    public function addEstate(){
        $db   = D('EstateSet');
        if(IS_POST){
            $id = $this->_post('id');
            if($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/estateList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/estateList.act'),'JSON');
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
    //删除房产信息
    public function estateDel(){
        $db   = D('EstateSet');
        $id = $this->_post('id');
        if ($id){
            $info = $db->field('id')->where('id='.$id)->find();
            if ($info){
                $db->delete($id);
                $this->ajaxReturn(array('errno'=>'0','error'=>'成功删除！'),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }

    //子楼盘列表
    public function categorylist(){
        $db = D('EstateCategory');
        $where['token'] = $this->token;
        $pid = $this->_get('pid','intval');
        if ($pid){
            $where['pid'] = $pid;
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增子楼盘
    public function addCategory(){
        $db = D('EstateCategory');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/categoryList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/categoryList.act'),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $plist = M('EstateSet')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除子楼盘
    public function categoryDel(){
        $db   = D('EstateCategory');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $this->success('成功删除！','/npManage/Estate/categoryList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/categoryList.act');
                //$this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/categoryList.act');
            //$this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }

    //便民信息列表
    public function servicelist(){
        $db = D('EstateService');
        $where['token'] = $this->token;
        $pid = $this->_get('pid','intval');
        if ($pid){
            $where['pid'] = $pid;
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增便民信息
    public function addService(){
        $db = D('EstateService');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/serviceList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/serviceList.act'),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $plist = M('EstateSet')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除便民信息
    public function serviceDel(){
        $db   = D('EstateService');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $this->success('成功删除！','/npManage/Estate/serviceList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/serviceList.act');
                //$this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/serviceList.act');
            //$this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }

    //户型列表
    public function houseList(){
        $db = D('EstateHouse');
        $where['token'] = $this->token;
        $pid = $this->_get('pid','intval');
        if ($pid){
            $where['pid'] = $pid;
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增户型
    public function addHouse(){
        $db = D('EstateHouse');
        if (IS_POST){
            $id = $this->_post('id');
            $plist = $_REQUEST['phout_list'];
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    //更新上传图片
                    $i=0;
                    foreach($plist as $vo){
                        $imgdb = M('EstateImg');
                        $da['id'] = intval($vo);
                        $da['title'] = $_REQUEST['imagestexts'][$vo];
                        $da['sort'] = $i++;
                        $imgdb->data($da)->save();
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/houseList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    //更新上传图片
                    $i=0;
                    foreach($plist as $vo){
                        $imgdb = M('EstateImg');
                        $da['id'] = intval($vo);
                        $da['title'] = $_REQUEST['imagestexts'][$vo];
                        $da['sort'] = $i++;
                        $imgdb->data($da)->save();
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/addHouse.act?id='.$id),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $imglist = M('EstateImg')->where(array('token'=>$this->token,'pid'=>$info['abid'],'type'=>0))->order('sort')->select();
            $this->assign('imglist',$imglist);
            $this->assign('info',$info);
        }
        $plist = M('EstateCategory')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除户型
    public function houseDel(){
        $db   = D('EstateHouse');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id,abid')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $imglist = M('EstateImg')->field('id')->where(array('token'=>session('token'),'pid'=>$info['abid'],'type'=>0))->select();
                foreach($imglist as $img){
                    $this->imgDel($img['id']);
                }
                $this->success('成功删除！','/npManage/Estate/houseList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/houseList.act');
                //$this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/houseList.act');
            //$this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }

    //三维图列表
    public function spaceList(){
        $db = D('EstateSpace');
        $where['token'] = $this->token;
        $hid = $this->_get('hid','intval');
        if ($hid){
            $where['pid'] = $hid;
            $this->assign('hid',$hid);
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增三维图
    public function addSpace(){
        $db = D('EstateSpace');
        if (IS_POST){
            $id = $this->_post('id');
            $hid = $this->_post('hid','intval');
            $plist = $_REQUEST['phout_list'];
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    //更新上传图片
                    $i=0;
                    foreach($plist as $vo){
                        $imgdb = M('EstateImg');
                        $da['id'] = intval($vo);
                        $da['title'] = $_REQUEST['imagestexts'][$vo];
                        $da['sort'] = $i++;
                        $imgdb->data($da)->save();
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/spaceList.act?hid='.$hid),'JSON');
                }
            }else{
                $_POST['pid'] = $hid;
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    //更新上传图片
                    $i=0;
                    foreach($plist as $vo){
                        $imgdb = M('EstateImg');
                        $da['id'] = intval($vo);
                        $da['title'] = $_REQUEST['imagestexts'][$vo];
                        $da['sort'] = $i++;
                        $imgdb->data($da)->save();
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/addSpace.act?id='.$id),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        $hid = $this->_get('hid');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $imglist = M('EstateImg')->where(array('token'=>$this->token,'pid'=>$info['abid'],'type'=>3))->order('sort')->select();
            $this->assign('imglist',$imglist);
            $this->assign('info',$info);
            $this->assign('hid',$info['pid']);
        }
        if ($hid){
            $this->assign('hid',$hid);
        }
        $plist = M('EstateCategory')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除三维图
    public function spaceDel(){
        $db   = D('EstateSpace');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id,abid')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $imglist = M('EstateImg')->field('id')->where(array('token'=>session('token'),'pid'=>$info['abid'],'type'=>3))->select();
                foreach($imglist as $img){
                    $this->imgDel($img['id']);
                }
                $this->success('成功删除！','/npManage/Estate/spaceList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/spaceList.act');
                //$this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/spaceList.act');
            //$this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }


    //相册列表
    public function albumList(){
        $db = D('EstateAlbum');
        $where['token'] = $this->token;
        $where['type']  = 1; //区分户型相册
        $pid = $this->_get('pid','intval');
        if ($pid){
            $where['pid'] = $pid;
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增相册
    public function addAlbum(){
        $db = D('EstateAlbum');
        if (IS_POST){
            $id = $this->_post('id');
            $plist = $_REQUEST['phout_list'];
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    //更新上传图片
                    $i=0;
                    foreach($plist as $vo){
                        $imgdb = M('EstateImg');
                        $da['id'] = intval($vo);
                        $da['title'] = $_REQUEST['imagestexts'][$vo];
                        $da['sort'] = $i++;
                        $imgdb->data($da)->save();
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/albumList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    //更新上传图片
                    $i=0;
                    foreach($plist as $vo){
                        $imgdb = M('EstateImg');
                        $da['id'] = intval($vo);
                        $da['title'] = $_REQUEST['imagestexts'][$vo];
                        $da['sort'] = $i++;
                        $imgdb->data($da)->save();
                    }
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/addAlbum.act?id='.$id),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $imglist = M('EstateImg')->where(array('token'=>$this->token,'pid'=>$id,'type'=>1))->order('sort')->select();
            $this->assign('imglist',$imglist);
            $this->assign('info',$info);
        }
        $plist = M('EstateSet')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除相册
    public function albumDel(){
        $db   = D('EstateAlbum');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $imglist = M('EstateImg')->field('id')->where(array('token'=>session('token'),'pid'=>$id,'type'=>1))->select();
                foreach($imglist as $img){
                    $this->imgDel($img['id']);
                }
                $this->success('成功删除！','/npManage/Estate/albumList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/albumList.act');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/albumList.act');
        }
    }

    //印象列表
    public function impressList(){
        $db = D('EstateImpress');
        $where['token'] = $this->token;
        $pid = $this->_get('pid','intval');
        if ($pid){
            $where['pid'] = $pid;
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增印象
    public function addImpress(){
        $db = D('EstateImpress');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/impressList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/impressList.act'),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $plist = M('EstateSet')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除印象
    public function impressDel(){
        $db   = D('EstateImpress');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $this->success('成功删除！','/npManage/Estate/impressList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/impressList.act');
                //$this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/impressList.act');
            //$this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }

    //专家点评列表
    public function expertList(){
        $db = D('EstateExpert');
        $where['token'] = $this->token;
        $pid = $this->_get('pid','intval');
        if ($pid){
            $where['pid'] = $pid;
        }
        $count = $db->where($where)->count();
        $page = new NPage($count,25);
        $list = $db->where($where)->order('sort DESC')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$page->show());
        $this->assign('count',$count);
        $this->display();
    }

    //新增专家点评
    public function addExpert(){
        $db = D('EstateExpert');
        if (IS_POST){
            $id = $this->_post('id');
            if ($id){
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                } else {
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'修改成功','url'=>'/npManage/Estate/expertList.act'),'JSON');
                }
            }else{
                if ($db->create() === false) {
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }else {
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'新增成功','url'=>'/npManage/Estate/expertList.act'),'JSON');
                }
            }
        }
        $id = $this->_get('id');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $plist = M('EstateSet')->field('id,title')->where(array('token'=>session('token')))->select();
        $this->assign('plist',$plist);
        $this->display();
    }

    //删除专家点评
    public function expertDel(){
        $db   = D('EstateExpert');
        $id = $this->_get('id');
        if ($id){
            $info = $db->field('id')->where(array('token'=>session('token'),'id'=>$id))->find();
            if ($info){
                $db->delete($id);
                $this->success('成功删除！','/npManage/Estate/expertList.act');
            }else{
                $this->error('该记录不存在！','/npManage/Estate/expertList.act');
                //$this->ajaxReturn(array('errno'=>'1','error'=>'该记录不存在！'),'JSON');
            }
        }else{
            $this->error('参数错误！','/npManage/Estate/expertList.act');
            //$this->ajaxReturn(array('errno'=>'1','error'=>'参数错误！'),'JSON');
        }
    }

    //上传图片文件
    public function upload(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 512000 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  dirname(__FILE__).'/../../../../Uploads/userShare/'.substr(md5(session('uid')),16).'/estate/';// 设置附件上传目录
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix = 'm_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '110';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '80';
        //设置命名规则
        $upload->saveRule = uniqid;
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->ajaxReturn(array('result'=>'FAIL','message'=>'上传文件失败!MSG:'.$upload->getErrorMsg()),'JSON');
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            /*import("@.ORG.Image");
            Image::water($info[0]['savepath'] . 'm_' . $info[0]['savename'], '/thinkphp/examples/File/Tpl/Public/Images/logo2.png');
            */

        }
        // 保存表单数据 包括附件数据
        $db = D('EstateImg');
        $data['pid']   = $this->_post('pid');
        $data['type']  = $this->_post('type_id');
        $data['filename'] = $info[0]['name'];
        $data['title']    = explode('.',$info[0]['name'],2)[0];
        $data['filetype'] = $info[0]['extension'];
        $data['thumb']     = C('site_url').'/Uploads/userShare/'.substr(md5(session('uid')),16).'/estate/m_'.$info[0]['savename'];
        $data['imgurl']    = C('site_url').'/Uploads/userShare/'.substr(md5(session('uid')),16).'/estate/'.$info[0]['savename'];
        $db->create($data);
        $id = $db->add();
        if ($id){
            $this->ajaxReturn(array('result'=>'SUCCESS','image'=>array('id'=>$id,'url'=>$data['imgurl'],'thm_url'=>$data['thumb'],'title'=>$data['title'],'content'=>'')),'JSON');
        }else{
            $this->ajaxReturn(array('result'=>'FAIL','message'=>'文件写入失败!MSG:'.$db->getError()),'JSON');
        }
    }

    /*
     * 图片删除
     */
    public function imgDel($id=0){
        $db = D('EstateImg');
        if (!$id){
            $id = $this->_post('id','intval');
        }
        $info = $db->where(array('token'=>session('token'),'id'=>$id))->find();
        if ($info){
            $db->where('id='.$id)->delete();
            //文件删除处理
            $path = dirname(__FILE__).'/../../../../Uploads/userShare/'.substr(md5(session('uid')),16).'/estate/';
            @unlink($path.basename($info['imgurl']));
            @unlink($path.basename($info['thumb']));
        }else{
            LOG::write('微相册删除文件失败'.$info['imgurl'],LOG::ERR);
        }
    }
}
