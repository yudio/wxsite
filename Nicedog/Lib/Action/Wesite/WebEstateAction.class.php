<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-4-6
 * Time: 下午5:29
 */

class WebEstateAction extends WebAction{
    private $token;
    private $wxuid;
    private $wecha_id;
    private $wxuser;


    public function _initialize(){
        parent::_initialize();
        /*$agent = $_SERVER['HTTP_USER_AGENT'];

        if(!strpos($agent,"icroMessenger")&&!isset($_GET['show'])&&!isset($_SESSION['uid'])) {
            echo '此功能只能在微信浏览器中使用';exit;
        }*/
        C('TOKEN_ON',false);
        C('TMPL_FILE_DEPR','/');

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
        $this->assign('wxname',$this->wxname);
        $this->assign('wecha_id',$this->wecha_id);
        $this->assign('wxuid',$this->wxuid);
        //
    }

    public function index(){
        $this->display();
    }

    public function setsdata(){
        $db = D('EstateSet');
        $arr = array();
        $arr['top'] = array("wxuid"=>$this->wxuid,"Subject"=>$this->wxname."的楼盘列表","PicUrl"=>C('site_url').STATICS."/Resources/obproj_1.jpg");
        $where['token'] = $this->token;
        $list = $db->field('id,title,banner,place,desc,tel')->where($where)->select();
        //.id, context[i].title, context[i].banner, context[i].title, context[i].place, context[i].desc, context[i].tel
        $arr['plist'] = $list;
        $this->ajaxReturn($arr,'JSON');
    }

    public function detail(){
        $db = D('EstateSet');
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $this->assign('info',$info);
        }
        $this->display();
    }
    public function setdetaildata(){
        $db = D('EstateSet');
        $id = $this->_get('id','intval');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $arr['banner'] = $info['banner'];
            $arr['sellInfo'] = array($info['estate_desc']);
            $arr['map'] = array('pic'=>'http://st.map.soso.com/api?size=720*75&center='.$info['lng'].','.$info['lat'].'&zoom=14&markers='.$info['lng'].','.$info['lat'].',1',
                                'addr'=>$info['place'],'latlng'=>array('lat'=>$info['lat'],'lng'=>$info['lng']));
            $arr['intro'] = array('title'=>'项目简介','detail'=>$info['object_desc']);
            $arr['traffic'] = array('title'=>'交通配套','detail'=>array($info['traffic_desc']));
            header('Content-type: application/json');
            exit('renderData('.json_encode($arr).')');
        }
    }
    //楼盘列表For户型
    public function indexHouse(){
        $db = D('EstateSet');
        $where['token'] = $this->token;
        $list = $db->field('id,title,banner')->where($where)->select();
        if (count($list)==1){
            $this->listHouse($list[0]['id']);
        }
        $this->assign('list',$list);
        $this->display('index_house');
    }

    public function listHouse($eid=0){
        $db = D('EstateHouse');
        if (!$eid){
            $eid = $this->_get('eid');
        }
        $this->assign('eid',$eid);
        $this->display('listHouse');
        exit;
    }

    public function houseData(){
        $db = D('EstateHouse');
        $eid = $this->_get('eid');
        $res = array();
        $info = M('EstateSet')->where('id='.$eid)->find();
        $res['banner'] = $info['banner'];
        $where['token'] = $this->token;
        $where['pid']   = $eid;
        $cates = M('EstateCategory')->where($where)->select();
        $rooms = array();
        foreach($cates as $category){
            $where['pid'] = $category['id'];
            $houses = $db->field('id,name,fang,ting,desc,floor_num,area,fulldnum')->where($where)->select();
            if ($houses){
                foreach($houses as $house){
                    $house['rooms'] = $house['fang'].'房'.$house['ting'].'厅';
                    $house['floor'] = $house['floor_num'];
                    $house['category'] = $category['title'];
                    $rooms[] =$house;
                }
            }
        }
        $res['rooms'] = $rooms;
        header('Content-type: application/json');
        exit('showRooms('.json_encode($res).')');
        //$this->ajaxReturn($res,'JSON');
        //$list = $db->where()
    }
    //楼盘列表For便民
    public function indexService(){
        $db = D('EstateSet');
        $where['token'] = $this->token;
        $list = $db->field('id,title,banner')->where($where)->select();
        if (count($list)==1){
            $this->listService($list[0]['id']);
        }
        $this->assign('list',$list);
        $this->display('index_service');
    }

    public function listService($eid=0){
        $db = D('EstateService');
        if (!$eid){
            $eid = $this->_get('eid');
        }
        $info = M('EstateSet')->where('id='.$eid)->find();
        $where['token'] = $this->token;
        $where['pid']   = $eid;
        $list = $db->where($where)->order('sort desc')->select();
        $this->assign('list',$list);
        $this->assign('setname',$info['title']);
        $this->assign('eid',$eid);
        $this->display('listService');
        exit;
    }
    //楼盘列表For相册
    public function indexAlbum(){
        $db = D('EstateSet');
        $where['token'] = $this->token;
        $list = $db->field('id,title,banner')->where($where)->select();
        if (count($list)==1){
            $this->listAlbum($list[0]['id']);
        }
        $this->assign('list',$list);
        $this->display('index_album');
    }

    public function listAlbum($eid=0){
        if (!$eid){
            $eid = $this->_get('eid');
        }
        $info = M('EstateSet')->where('id='.$eid)->find();
        $this->assign('setname',$info['title']);
        $this->assign('eid',$eid);
        $this->display('listAlbum');
        exit;
    }
    public function albumdata(){
        $db = D('EstateAlbum');
        $eid = $this->_get('eid');
        $res = array();
        $where['token'] = $this->token;
        $where['pid']   = $eid;
        $where['type']  = 1;//楼盘相册类型
        $albums = M('EstateAlbum')->where($where)->select();
        foreach($albums as $album){
            $resalbum = array();
            $ps1arr = array();$ps2arr = array();
            $cond['pid'] = $album['id'];
            $ps1arr[] = array('type'=>'title','title'=>$album['pname'],'subTitle'=>$album['title']);
            //加载图片数据
            $imglist = M('EstateImg')->where($cond)->select();
            if ($imglist){
                $listsize = count($imglist);$halfnum = ceil($listsize/2);
                for($i=0;$i<$listsize;$i++){
                    if ($i<$halfnum){
                        $width = 400 + mt_rand(0,100);
                        $ps1arr[] = array('type'=>'img','name'=>$imglist[$i]['title'],'img'=>$imglist[$i]['imgurl'],'size'=>array($width,450));
                    }else{
                        $width = 400 + mt_rand(0,100);
                        if ($listsize>=4&&$i==$halfnum){
                            $ps2arr[] = array('type'=>'img','name'=>$imglist[$i]['title'],'img'=>$imglist[$i]['imgurl'],'size'=>array($width,450));
                            $ps2arr[] = array('type'=>'text','content'=>$album['desc']);
                        }else{
                            $ps2arr[] = array('type'=>'img','name'=>$imglist[$i]['title'],'img'=>$imglist[$i]['imgurl'],'size'=>array($width,450));
                        }
                    }
                }
            }
            if ($listsize<4){
                $ps2arr[] = array('type'=>'text','content'=>$album['desc']);
            }
            $resalbum['title'] = $album['title'];
            $resalbum['ps1']   = $ps1arr;
            $resalbum['ps2']   = $ps2arr;
            $res[] = $resalbum;
        }
        header('Content-type: application/json');
        exit('showPics('.json_encode($res).')');
    }
    //楼盘列表For印象/点评
    public function indexReview(){
        $db = D('EstateSet');
        $where['token'] = $this->token;
        $list = $db->field('id,title,banner')->where($where)->select();
        if (count($list)==1){
            $this->listAlbum($list[0]['id']);
        }
        $this->assign('list',$list);
        $this->display('index_review');
    }

    public function listReview($eid=0){
        if (!$eid){
            $eid = $this->_get('eid');
        }
        $info = M('EstateSet')->where('id='.$eid)->find();
        $this->assign('setname',$info['title']);
        $this->assign('eid',$eid);
        $this->display('listReview');
        exit;
    }
    //印象数据
    public function impressData($callback='reviewResult'){
        $db = D('EstateImpress');
        $eid = $this->_get('eid');
        $res = array();
        $where['token'] = $this->token;
        $where['pid']   = $eid;
        $where['is_show']  = 1;//显示印象
        $impresses = $db->where($where)->order('sort desc')->select();
        $arr = array();$sum = 0;
        foreach($impresses as $impress){
            $arr[] = array('content'=>$impress['title'],'count'=>intval($impress['comment']),'id'=>intval($impress['id']));
            $sum += $impress['comment'];
        }
        $res['msg'] = 'ok';
        $res['ret'] = 0;
        //加载用户印象
        $cond['token'] = $this->token;
        $cond['eid']   = $eid;
        $cond['wecha_id'] = $this->wecha_id;
        $info = M('EstateUser')->where($cond)->find();
        if ($info){
            $im = $db->where('id='.$info['impressid'])->find();
            $res['user'] = array('content'=>$info['impress'],'count'=>intval($im['comment']),'id'=>intval($info['impressid']));
            if ($im['is_show']==2){
                $sum += $im['comment'];
            }
        }else{
            $res['user'] = array('content'=>'','count'=>0,'id'=>-1);
        }
        $res['top'] = $arr;
        $res['sum'] = $sum;
        if (count($impresses)<1){
            $res['ret'] = 1;
        }
        header('Content-type: application/json');
        exit($callback.'('.json_encode($res).')');
    }

    //保存用户印象
    public function userReview(){
        $db = D('EstateImpress');
        $eid = $this->_get('eid');
        $title = $this->_get('content');
        $objid = $this->_get('objid');
        if ($objid){
            $data['token'] = $this->token;
            $data['wecha_id'] = $this->wecha_id;
            $data['eid']  = $eid;
            $data['impress']  = $title;
            $data['impressid'] = $objid;
            $data['update_time'] = time();
            M('EstateUser')->data($data)->add();
            $db->where('id='.$objid)->setInc('comment');//累计印象数
        }else{
            $im = $db->where(array('pid'=>$eid,'title'=>$title))->find();
            if (!$im){
                //添加用户印象
                $im['pid'] = $eid;
                $im['title'] = $title;
                $im['comment'] = 1;
                $im['token']   = $this->token;
                $im['uid']   = $this->wxuser['uid'];
                $im['pname'] = M('EstateSet')->field('title')->where('id='.$eid)->find()['title'];
                $im['is_show'] = 2;//用户印象
                $im['sort'] = 0;
                $im['create_time'] = time();
                $im['update_time'] = time();
                $objid = $db->data($im)->add();
            }else{
                $db->where('id='.$im['id'])->setInc('comment');
                $objid = $im['id'];
            }
            //新增用户数据
            $data['token'] = $this->token;
            $data['wecha_id'] = $this->wecha_id;
            $data['eid']  = $eid;
            $data['impress']  = $title;
            $data['impressid'] = $objid;
            $data['update_time'] = time();
            M('EstateUser')->data($data)->add();
        }
        $this->impressData('sendReviewResult');
    }
    //专家数据
    public function expertData(){
        $db = D('EstateExpert');
        $eid = $this->_get('eid');
        $res = array();
        $where['token'] = $this->token;
        $where['pid']   = $eid;
        $where['is_show']  = 1;//楼盘相册类型
        $experts = $db->where($where)->order('sort desc')->select();
        $arr = array();
        foreach($experts as $expert){
            $arr[] = array('name'=>$expert['name'],'title'=>$expert['position'],'photo'=>$expert['faceurl'],
                           'intro'=>$expert['desc'],'reviewTitle'=>$expert['title'],'reviewDesc'=>$expert['comment']);
        }
        $res = $arr;
        header('Content-type: application/json');
        exit('renderProList('.json_encode($res).')');
    }
    /*
     * 3D全景图
     */
    public function picFull(){
        $db = D('EstateHouse');
        $eid = $this->_get('eid');
        $hid = $this->_get('houseid');
        $this->assign('eid',$eid);
        $this->assign('hid',$hid);
        $this->display();
    }
    //3D全景图数据
    public function picFullData(){
        $db = D('EstateHouse');
        $hid = $this->_get('hid');
        $where['token'] = $this->token;
        $where['id']   = $hid;
        if ($hid){
            $house = $db->field('id,name,pname,fang,ting,desc,floor_num,area')->where($where)->find();
            $cond['pid'] = $house['id'];
            $spaces = M('EstateSpace')->where($cond)->order('sort desc')->select();
            $fullarr = array();
            if ($spaces&&count($spaces)>0){
                foreach($spaces as $sp){
                    $vlist = array();
                    $vlist[] = array('name'=>$sp['title'],'url'=>$sp['id']);
                    $fullarr[] = array('name'=>$sp['title'],'list'=>$vlist,
                                       'bimg'=>'http://localhost/tpl/static/img/bg_space.jpg');
                }
            }
            $house['rooms'] = $house['fang'].'房'.$house['ting'].'厅';
            $house['floor'] = $house['floor_num'];
            $house['category'] = $house['pname'];

            $house['full3d'] = $fullarr;
            $res['rooms'][] = $house;
        }
        header('Content-type: application/json');
        exit('showRooms('.json_encode($res).')');
    }
    /*
     * 全景图展示
     */
    public function picfullshow(){
        $db = D('EstateHouse');
        $eid = $this->_get('eid');
        $hid = $this->_get('houseid');
        $sid = $this->_get('sid');
        $this->assign('eid',$eid);
        $this->assign('hid',$hid);
        $this->assign('sid',$sid);
        $this->display();
    }
    //全景图片数据
    public function picfullxml(){
        $db = D('EstateSpace');
        $sid = $this->_get('sid');
        if ($sid){
            $info = $db->where('id='.$sid)->find();
            $imglist = M('EstateImg')->where(array('pid'=>$info['abid']))->order('sort desc')->select();
            $this->assign('info',$info);
            $this->assign('imglist',$imglist);
            $this->display('picfullxml','utf-8','application/xml');
        }
    }

    public function estateset(){
        $db = D('EstateSet');
        $info = $db->where(array('token'=>$this->token))->find();
        $list = M('Album')->where(array('token'=>$this->token,'pid'=>$info['id']))->select();
        foreach($list as &$vo){
            $vo['count'] = M('AlbumImg')->where(array('pid'=>$vo['id'],'status'=>'0'))->count();
        }
        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display();
    }

    public function showlist(){
        $db = M('Album');
        $id = $this->_get('pid','intval');
        $info = $db->where(array('token'=>$this->token,'id'=>$id))->find();
        $list = M('AlbumImg')->where(array('pid'=>$id))->select();

        $this->assign('info',$info);
        $this->assign('list',$list);
        $this->display('list');
    }

}