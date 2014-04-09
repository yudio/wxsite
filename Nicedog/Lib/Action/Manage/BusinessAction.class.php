<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-3-14
 * Time: 下午9:22
 */

class BusinessAction extends UserAction{

    public function _initialize() {
        parent::_initialize();
        C('TOKEN_ON',false);
        /*if(session('gid')==1){
            $this->error('vip0无法使用微活动,请充值后再使用','/npManage/account/home.php');
        }*/
    }

    //====预约管理====
    /*
     * 预约列表
     */
    public function reserveList(){
        $db = M('Reserve');
        /*$user=M('Users')->field('gid,activitynum')->where(array('id'=>session('uid')))->find();
        $group=M('User_group')->where(array('id'=>$user['gid']))->find();
        $this->assign('group',$group);
        $this->assign('activitynum',$user['activitynum']);*/
        $list=M('Reserve')->where(array('token'=>session('token')))->select();
        $this->assign('count',count($list));
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 新增预约
     */
    public function addReserve(){
        $db = D('Reserve');
        if (IS_POST){
            $id = $this->_post('id','intval');
            if ($id){//更新操作
                LOG::write('Reserve save',LOG::ERR);
                if ($db->create()){
                    $data['pid']    = $id;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $db->save();
                    Keyword::update($data,'Reserve');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/business/reserveList.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                LOG::write('Reserve add'.$_POST['time'],LOG::ERR);
                if ($db->create()){
                    $data['pid']     = 0;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'Reserve');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/business/reserveList.act'),'JSON');
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
     * 删除预约
     */
    public function delReserve(){
        $where['id']=$this->_get('id','intval');
        $where['token']=session('token');
        $db = D('Reserve');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            M('Keyword')->where(array('pid'=>$info['id'],'module'=>'Reserve','token'=>session('token')))->delete();
            $this->ajaxReturn(array('errno'=>'0','error'=>'删除成功','url'=>'/npManage/business/reserveList.act'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'1','error'=>'微预约不存在!'),'JSON');
        }
    }

    /*
     * 预约记录列表
     */
    public function reserveRecordList(){
        $db = M('ReserveRecord');
        $where['rid'] = $this->_get('rid','intval');
        $list = $db->where($where)->select();
        //等待客服电话
        $where['status'] = 0;
        $waitCount = $db->where($where)->count();
        //成功预定
        $where['status'] = 1;
        $passCount = $db->where($where)->count();
        //失败预定
        $where['status'] = 2;
        $failCount = $db->where($where)->count();
        $this->assign('list',$list);
        $this->assign('count',count($list));
        $this->assign('waitCount',$passCount);
        $this->assign('passCount',$passCount);
        $this->assign('failCount',$failCount);
        $this->display();
    }

    /*
     * 预约记录详细页
     */
    public function reserveRecordDetail(){
        $db = M('ReserveRecord');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        $this->assign('info',$info);
        $this->display();
    }

    /*
     * 审核预约记录
     */
    public function updateReserveRecord(){
        $db = M('ReserveRecord');
        $where['id'] = $this->_get('id','intval');
        $where['del_flag'] = '0';
        $status = $this->_get('state','intval');
        $order  = $this->_get('order_msg');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->data(array('status'=>$status,'order_msg'=>$order))->save();
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'记录不存在或已被删除！'),'JSON');
        }
    }

    /*
     * 删除预约记录
     */
    public function delReserveRecord(){
        $db = M('ReserveRecord');
        $where['id'] = $this->_get('id','intval');
        $info = $db->where($where)->find();
        if ($info){
            $db->where($where)->delete();
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'101','error'=>'记录不存在或已被删除！'),'JSON');
        }
    }

    /*
     * 预约统计
     */
    public function myReserve(){
        $db = M('ReserveRecord');
        $pointstart = mktime (0,0,0,date("m")-2,date("d")-1,  date("Y"));
        $lastmonth = mktime (0,0,0,date("m")-1,date("d"),  date("Y"));
        $thisday   = mktime(0,0,0,date('m'),date('d'),date('Y'));
        $lastday   = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
        $today     = time();
        $list = $db->query("select count(*) as num,DATE_FORMAT(FROM_UNIXTIME(a.createtime),'%Y-%m-%d') as e,floor((a.createtime-{$lastmonth})/24/3600) as day from __TABLE__ a where a.createtime > {$lastmonth} and a.createtime < {$today} and a.token = '{$_SESSION['token']}' group by e order by e");
        $tonum = $db->query("select count(*) as num from __TABLE__ a where a.createtime > {$thisday} and a.token = '{$_SESSION['token']}'");
        $lanum = $db->query("select count(*) as num from __TABLE__ a where a.createtime > {$lastday} and a.token = '{$_SESSION['token']}'");
        $total = $db->where(array('token'=>session('token'),'del_flag'=>'0'))->count();
        $num  = round(($today-$lastmonth)/24/3600);
        $this->assign('pointstart',$pointstart);
        $this->assign('start',$lastmonth);
        $this->assign('today',$today);
        $this->assign('list',$list);
        $this->assign('num',$num);
        $this->assign('tonum',$tonum[0]['num']);//今日新增预约
        $this->assign('lanum',$lanum[0]['num']-$tonum[0]['num']);
        $this->assign('total',$total);
        $this->display();
    }

    //====微相册管理====
    /*
     * 相册设置
     */
    public function albumset(){
        $db = M('AlbumSet');
        if (IS_POST){
            $id = $this->_post('id','intval');
            $_POST['token'] = session('token');
            if ($id){
                $db->data($_POST)->save();
                $this->ajaxReturn(array('errno'=>'0','error'=>'设置成功','url'=>'/npManage/business/albumset.act'),'JSON');
            }else{
                $db->data($_POST)->add();
                $this->ajaxReturn(array('errno'=>'0','error'=>'设置成功','url'=>'/npManage/business/albumset.act'),'JSON');
            }
        }
        $info = $db->where(array('token'=>session('token')))->find();
        if ($info){
            $this->assign('info',$info);
        }
        $this->display();
    }
    /*
     * 相册管理列表
     */
    public function albumlist(){
        $db = D('Album');
        $list = $db->where(array('token'=>session('token')))->order('sort desc')->select();
        foreach($list as &$vo){
            $vo['count'] = M('AlbumImg')->where(array('pid'=>$vo['id'],'status'=>'0'))->count();
        }
        $this->assign('list',$list);
        $this->display();
    }

    /*
     * 相册图片管理
     */
    public function albumupload(){
        $db = D('Album');
        if (IS_POST){
            $ids = $_REQUEST['photoid'];
            for($i=0;$i<count($ids);$i++){
                $data['id'] = $ids[$i];
                $data['title'] = $_REQUEST['title'][$data['id']];
                $data['desc'] = $_REQUEST['description'][$data['id']];
                $data['sort'] = $i;
                M('AlbumImg')->data($data)->save();
            }
            $this->ajaxReturn(array('errno'=>'0','error'=>'更新成功！','url'=>'/npManage/business/albumlist.act'),'JSON');
        }
        $pid = $this->_get('pid','intval');
        $info = $db->find($pid);
        $list = M('AlbumImg')->where(array('pid'=>$pid))->order('sort')->select();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->display();
    }

    /*
     * 相册图片上传
     */
    public function albumimgadd(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 512000 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  dirname(__FILE__).'/../../../../Uploads/userShare/'.substr(md5(session('uid')),16).'/album/';// 设置附件上传目录
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix = 'm_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '400';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '400';
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
        $db = M('AlbumImg');
        $data['token'] = session('token');
        $data['pid']   = $this->_post('pid');
        $data['filename'] = $info[0]['name'];
        $data['title']    = explode('.',$info[0]['name'],2)[0];
        $data['desc']     = '';
        $data['filetype'] = $info[0]['extension'];
        $data['createtime'] = time();
        $data['sort']      = 0;
        $data['status']    = 0;
        $data['thumb']     = C('site_url').'/Uploads/userShare/'.substr(md5(session('uid')),16).'/album/m_'.$info[0]['savename'];
        $data['imgurl']    = C('site_url').'/Uploads/userShare/'.substr(md5(session('uid')),16).'/album/'.$info[0]['savename'];
        $id = $db->data($data)->add();
        if ($id){
            $this->ajaxReturn(array('result'=>'SUCCESS','image'=>array('id'=>$id,'url'=>$data['imgurl'],'thm_url'=>$data['thumb'],'title'=>$data['title'],'content'=>'')),'JSON');
        }else{
            $this->ajaxReturn(array('result'=>'FAIL','message'=>'文件写入失败!MSG:'.$db->getError()),'JSON');
        }
    }

    /*
     * 相册图片删除
     */
    public function albumimgdel($id=0){
        $db = M('AlbumImg');
        if (!$id){
            $id = $this->_post('id','intval');
        }
        $info = $db->where(array('token'=>session('token'),'id'=>$id))->find();
        if ($info){
            $db->where('id='.$id)->delete();
            //文件删除处理
            $path = dirname(__FILE__).'/../../../../Uploads/userShare/'.substr(md5(session('uid')),16).'/album/';
            @unlink($path.basename($info['imgurl']));
            @unlink($path.basename($info['thumb']));
        }else{
            LOG::write('微相册删除文件失败'.$info['imgurl'],LOG::ERR);
        }
    }

    /*
     * 相册删除
     */
    public function albumdel(){
        $db = M('Album');
        $id = $this->_get('id','intval');
        $info = $db->where(array('token'=>session('token'),'id'=>$id))->find();
        if ($info){
            $db->where('id='.$id)->delete();
            //删除关键字关联
            $data['pid'] = $id;
            $data['token'] = session('token');
            KeyWord::delete($data,'Album');
            $list = M('AlbumImg')->field('id')->where('pid='.$id)->select();
            foreach($list as $vo){
                $this->albumimgdel($vo['id']);
            }
            $this->ajaxReturn(array('errno'=>'0'),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>'1'),'JSON');
            LOG::write('微相册删除文件失败'.$info['imgurl'],LOG::ERR);
        }
    }

    /*
     * 新增相册
     */
    public function albumadd(){
        $db = D('Album');
        if (IS_POST){
            $id = $this->_post('id','intval');
            $_POST['token'] = session('token');
            if ($id){
                if ($db->create()){
                    $data['pid']    = $id;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $db->save();
                    Keyword::update($data,'Album');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'设置成功','url'=>'/npManage/business/albumlist.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $data['pid']     = 0;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'Album');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'设置成功','url'=>'/npManage/business/albumlist.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }
        }
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->find($id);
            $this->assign('info',$info);
        }
        $this->display();
    }

    //====微留言====
    /*
     * 留言板设置
     */
    public function msgset(){
        $db = M('CommentSet');
        if (IS_POST){
            $id = $this->_post('id','intval');
            $_POST['token'] = session('token');
            $openids = $_REQUEST['openidlist'];
            $_POST['openids'] = implode(',',$openids)||'';
            if ($id){
                if ($db->create()){
                    $data['pid']    = $id;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $db->save();
                    Keyword::update($data,'Comment');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'设置成功','url'=>'/npManage/business/msgset.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $data['pid']     = 0;
                    $data['keyword'] = $this->_post('keyword');
                    $data['token']  = session('token');
                    $data['match_type']  = 1;
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'Comment');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'设置成功','url'=>'/npManage/business/msgset.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'1','error'=>$db->getError()),'JSON');
                }
            }
        }
        $info = $db->where(array('token'=>session('token')))->find();
        if ($info){
            $ids = explode(',',$info['openids']);
            $this->assign('list',$list);
            $this->assign('info',$info);
        }
        $this->display();
    }

    /**
     * 留言列表
     */
    public function msgList(){
        $db = M('Comment');
        $list=M('Comment')->where(array('token'=>session('token'),'status'=>array('neq',3)))->select();
        $this->assign('count',count($list));
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 留言操作|删除或屏蔽
     */
    public function msgUpdate(){
        $db = M('Comment');
        $id = $this->_get('id','intval');
        $op = $this->_get('op');
        $info = $db->find($id);
        if (!$info){
            $this->error('该记录不存在','/npManage/business/msgList.act');
        }
        if ($op=='del'){
            $db->where(array('id'=>$id))->delete();
            $this->success('删除成功','/npManage/business/msgList.act');
        }else if ($op=='black'){
            //屏蔽用户
            $user = M('CommentUser')->where(array('token'=>$info['token'],'wecha_id'=>$info['wecha_id']))->find();
            M('CommentUser')->data(array('id'=>$user['id'],'status'=>0,'updatetime'=>time()))->save();
            $db->where(array('token'=>$info['token'],'wecha_id'=>$info['wecha_id'],'status'=>1))->data(array('status'=>3))->save();
            $this->success('加入黑名单成功','/npManage/business/msgList.act');
        }
    }
    /*
     * 批量操作
     */
    public function msgBatch(){
        $db = M('Comment');
        $tid = $_REQUEST['tid'];
        $op = $this->_post('op');
        $tid = implode(',',$tid);
        $where['id']    = array('in',$tid);
        $where['token'] = session('token');
        if ($op=='del'){
            $db->where($where)->delete();
            $this->ajaxReturn(array('errno'=>'0','error'=>'批量删除成功!','url'=>'/npManage/business/msgList.act'),'JSON');
        }else if ($op=='audit'){
            $res = $db->where($where)->save(array('status'=>1));
            $this->ajaxReturn(array('errno'=>'0','error'=>'批量更新成功!','url'=>'/npManage/business/msgList.act'),'JSON');
        }
    }
    /**
     * 黑名单列表
     */
    public function msgBlack(){
        $db = M('CommentUser');
        $list=M('CommentUser')->where(array('token'=>session('token'),'status'=>0))->select();
        $this->assign('count',count($list));
        $this->assign('list',$list);
        $this->display();
    }
    /*
     * 取消拉黑
     */
    public function msgBlackOp(){
        $db = M('CommentUser');
        $op = $this->_get('op');
        if ($op=='blackdel'){
            $id = $this->_get('id','intval');
            $db->where(array('id'=>$id))->save(array('status'=>1));
            $user = $db->find($id);
            M('Comment')->where(array('token'=>$user['token'],'wecha_id'=>$user['wecha_id'],'status'=>3))->data(array('status'=>1))->save();
            $this->success('取消成功','/npManage/business/msgBlack.act');
        }else if ($op=='batch'){
            $tid = $_REQUEST['tid'];
            $tid = implode(',',$tid);
            $where['id'] = array('in',$tid);
            $where['token'] = session('token');
            $db->where($where)->save(array('status'=>1,'updatetime'=>time()));
            $userlist = $db->where($where)->select();
            foreach($userlist as $user){
                M('Comment')->where(array('token'=>$user['token'],'wecha_id'=>$user['wecha_id'],'status'=>3))->data(array('status'=>1))->save();
            }
            $this->ajaxReturn(array('errno'=>'0','error'=>'取消成功!','url'=>'/npManage/business/msgBlack.act'),'JSON');
        }
    }



    //====获取外链====
    public function getBusinessJSON(){
        LOG::write('getBusinessJSON',LOG::ERR);
        $act= $this->_post('action');
        $type = $this->_post('type');
        if ($type=='reservation'){
            $db = M('Reserve');
            $where['token'] = session('token');
            $where['status'] = 0;
            $list = $db->where($where)->select();
            if($list){
                foreach($list as &$vo){
                    if ($vo['stime']&&$vo['etime']){
                        $vo['start_time'] = date('Y-m-d H:i:s',$vo['stime']);
                        $vo['end_time'] = date('Y-m-d H:i:s',$vo['etime']);
                    }
                }
                $this->ajaxReturn(array('success'=>true,'counts'=>count($list),'data'=>$list),'JSON');
            }
        }
    }





} 