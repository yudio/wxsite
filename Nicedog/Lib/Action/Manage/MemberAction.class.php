<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-2-28
 * Time: 上午11:17
 */

class MemberAction extends UserAction{
    public function _initialize() {
        parent::_initialize();
        $token = session('token');
        C('TMPL_FILE_DEPR','/');
        //验证权限
        /*$token_open=M('token_open')->field('queryname')->where(array('token'=>session('token')))->find();
        if(!strpos($token_open['queryname'],'huiyuanka')){
            $this->error('您还未开启该模块的使用权,请到功能模块中添加','/npManage/func/app.act');
        }*/
        //获取所在组的开卡数量
        //user_group.create_card_num     wxuser.allcardnum,yetcardnum,cardisok
        /*$thisWxUser=$db->where(array('token'=>$token))->find();
        $wxuserinfo = M('WxuserInfo')->where(array('token'=>$token,'year'=>date('Y'),'month'=>date('m')))->find();
        */

    }

    //商家设置
    public function setBusiness(){
        $db = D('MemberCardInfo');
        if (IS_POST){
            //$_POST['token'] = session('token');
            $id = $this->_post('id');
            $_POST['class'] = $this->_post('category_f').'/'.$this->_post('category_s');//兼容旧系统
            if ($id){//更新操作
                if ($db->create()){
                    //关键字
                    $data['pid']    = $id;
                    $data['match_type'] = 1;
                    $data['token']  = session('token');
                    $data['keyword']  = $this->_post('keyword');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！','url'=>'/npManage/reply/addtext.act?id='.$id),'JSON');
                    }
                    $db->save();
                    Keyword::update($data,'MemberCard');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/setBusiness.act'));
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    //关键字
                    $data['pid']     = 0;
                    $data['match_type'] = 1;
                    $data['token']  = session('token');
                    $data['keyword']  = $this->_post('keyword');
                    $keymatch = Keyword::select($data);
                    if (count($keymatch)>1){
                        $this->ajaxReturn(array('errno'=>'101','error'=>'该关键字冲突！'),'JSON');
                    }
                    $id = $db->add();
                    $data['pid']     = $id;
                    Keyword::update($data,'MemberCard');
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/setBusiness.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token')))->find();
            $this->assign('info',$info);
        }
        $this->display();
    }

    //会员卡配置
    public function addcard(){
        $db = D('MemberCardSet');
        if (IS_POST){
            $_POST['token'] = session('token');
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addcard.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addcard.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token')))->find();
            $addr = M('MemberCardInfo')->field('address')->where(array('token'=>session('token')))->find()['address'];
            $this->assign('info',$info);
            $this->assign('addr',$addr);
        }
        $this->display();
    }

    /*
     *
     * 会员卡资料项
     */
    public function addmemfields(){
        //C('TOKEN_ON',false);
        $db = M('MemberFieldSet');
        if (IS_POST){
            $_POST['token'] = session('token');
            $_POST['uid']   = session('uid');
            if (!$_POST['name_is_edit']){$_POST['name_is_edit']=0;}
            if (!$_POST['phone_is_edit']){$_POST['phone_is_edit']=0;}
            if (!$_POST['birthday_is_must']){$_POST['birthday_is_must']=0;}
            if (!$_POST['birthday_is_edit']){$_POST['birthday_is_edit']=0;}
            if (!$_POST['gender_is_must']){$_POST['gender_is_must']=0;}
            if (!$_POST['address_is_must']){$_POST['address_is_must']=0;}
            $info = $db->where(array('token'=>session('token')))->find();
            if ($info){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'更新成功！','url'=>'/npManage/member/addmemfields.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/addmemfields.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }
        }
        $info = $db->where(array('token'=>session('token')))->find();
        $this->assign('info',$info);
        $this->display('memberfields');
    }

    //会员特权
    public function listprivilege(){
        $db   = M('MemberPrivilege');
        $info = $db->where(array('token'=>session('token')))->select();
        $time = time();
        foreach($info as $key=>&$vo){
            if ($vo['etime']<$time){
                $vo['flag']  =  '已结束';  //已结束
                $vo['label'] = '';
            }else if ($vo['btime']>$time){
                $vo['flag']  =  '未开始';  //未开始
                $vo['label'] = 'label-satgreen';
            }else{
                $vo['flag']  =  '进行中';  //进行中
                $vo['label'] = 'label-lightred';
            }
        }
        //dump($info);
        $this->assign('info',$info);
        $this->display();
    }

    /*
     *
     * 会员特权
     */
    public function addmemberprivilege(){
        $db = D('MemberPrivilege');
        if (IS_POST){
            $_POST['token'] = session('token');
            $id = $this->_post('id');
            if ($id){//更新操作
                if ($db->create()){
                    $db->save();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/listprivilege.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
                }
            }else{
                if ($db->create()){
                    $id = $db->add();
                    $this->ajaxReturn(array('errno'=>'0','error'=>'成功！','url'=>'/npManage/member/listprivilege.act'),'JSON');
                }else{
                    $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
                }
            }
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token')))->find();
            $this->assign('info',$info);
            $levels = M('Member_card_level')->field('id,cname')->where(array('token'=>session('token')))->select();
            $this->assign('levels',$levels);
        }
        /*if ($info['crowd_type']!='0'&&$info['crowd_type']){
            $where['id'] = array('in',$info['crowd_type']);
            $levels = M('Member_card_level')->field('id,cname')->where($where)->select();
            $this->assign('levels',$levels);
        }*/
        $this->display();
    }

    /*
     *
     * 会员等级设置
     */
    public function setCardLevel(){
        //C('TOKEN_ON',false);
        $db = M('Member_card_level');
        $data = array();
        if (IS_POST){
            $data['token'] = session('token');
            $data['uid']   = session('uid');
            $data['basis'] = $this->_post('basis');

            $data['id']      = $this->_post('zid');
            $data['cname']   = $this->_post('sxname');
            $data['bscore']  = $this->_post('sxstarjf');
            $data['zk']      = $this->_post('sxzk');
            $data['type']    = 0;
            $this->updatecardlevel($data);

            $add = $_REQUEST['add'];
            foreach($add as $key=>$vo){
                $data['id']     = "";//新增ID自增
                $data['cname']  = $vo['name'];
                $data['bscore'] = $vo['startjf'];
                $data['escore'] = $vo['endjf'];
                $data['zk']     = $vo['zk'];
                $data['type']   = 1;
                $this->updatecardlevel($data);
            }
            $psarr = $_REQUEST['ps'];
            foreach($psarr as $key=>$vo){
                $data['id']     = $vo['id'];//新增ID自增
                $data['cname']  = $vo['cname'];
                $data['bscore'] = $vo['bscore'];
                $data['escore'] = $vo['escore'];
                $data['zk']     = $vo['zk'];
                $data['type']   = 1;
                $this->updatecardlevel($data);
            }
            $this->ajaxReturn(array('errno'=>'0','error'=>'更新成功！','url'=>'/npManage/member/setCardLevel.act'),'JSON');
        }
        //$id = $this->_get('id','intval');
        if (session('token')){
            $info = $db->where(array('token'=>session('token'),'type'=>0))->find();
            $this->assign('info',$info);
            $list = $db->where(array('token'=>session('token'),'type'=>1))->select();
            $this->assign('list',$list);
        }
        //dump($list);
        $this->display();
    }

    public function delcardlevel(){
        $db = M('Member_card_level');
        $id = $this->_get('id','intval');
        $level = $db->where(array('token'=>session('token'),'uid'=>session('uid'),'id'=>$id))->find();
        if ($level){
            $db->where(array('id'=>$id))->delete();
            $this->success('删除成功！','/npManage/member/setCardLevel.act');
        }else{
            $this->error('该记录不存在或已经删除！','/npManage/member/setCardLevel.act');
        }
    }
    public function updatecardlevel($data){
        $db = M('Member_card_level');
        if ($data['id']){
            if ($db->create($data)){
                $db->save();
                return true;
            }else{
                $this->ajaxReturn(array('errno'=>'100','error'=>$db->getError()),'JSON');
            }
        }else{
            if (!$data['escore']){$data['escore']=0;}
            if ($db->create($data)){
                $db->add();
                return true;
            }else{
                $this->ajaxReturn(array('errno'=>'101','error'=>$db->getError()),'JSON');
            }
        }
    }
    /*
     *
     * 微信用户管理aid:78071/keyword-input:samon/integral-grade:/type:
     */
    public function memberlist(){
        $type = $this->_get('type');
        $keys = $this->_get('keyword-input');
        $integral = $this->_get('integral-grade');
        $db=M('MemberUser');
        //$where['uid']=session('uid');
        $where['token']=session('token');
        if ($type){
            $where['type'] = $type;
        }
        if ($keys){$where['keyword'] = array('like','%'.$keys.'%');}
        $count=$db->where($where)->count();
        $page=new NPage($count,5);
        $list=$db->where($where)->order('getcardtime DESC')->limit($page->firstRow.','.$page->listRows)->select();
        //用户总数
        $totalCount = $db->where(array('token'=>session('token')))->count();
        //新增用户
        $todaywhere['getcardtime'] = array('between',array(mktime(0,0,0,date('m'),date('d'),date('Y')),time()));
        $todaywhere['token'] = session('token');
        $todayCount = $db->where($todaywhere)->count();

        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->assign('totalCount',$totalCount);
        $this->assign('todayCount',$todayCount);
        $this->display();
    }
    /*
     *
     * 编辑会员卡用户资料
     */
    public function memberEdit(){
        $db = D('MemberUser');
        if (IS_POST){
            $id = $this->_post('id','intval');
            if ($id){
                $_POST['birthday'] = strtotime($_POST['birthday']);
                $db->data($_POST)->save();
                $this->ajaxReturn(array('errno'=>0,'error'=>'修改成功！','url'=>'/npManage/Member/memberList.act'),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>100,'error'=>'该记录不存在！'),'JSON');
            }
        }
        $id = $this->_get('id');
        $info = $db->find($id);
        $this->assign('info',$info);
        $this->display();
    }
    //冻结该会员卡
    public function freeze(){
        $db=M('MemberUser');
        $id = $this->_get('id','intval');
        $db->where('id='.$id)->save(array('status'=>0));
        redirect('/npManage/Member/memberlist.act');
    }
    //解冻该会员卡
    public function unfreeze(){
        $db=M('MemberUser');
        $id = $this->_get('id','intval');
        $db->where('id='.$id)->save(array('status'=>1));
        redirect('/npManage/Member/memberlist.act');
    }
    //会员充值
    public function recharge(){
        C('TOKEN_ON',false);
        $db=M('MemberUser');
        $id = $this->_post('memberid','intval');
        $nick = $this->_post('nick');
        $urls     = $this->_post('urls'); //兼容跳转  默认为微信用户列表
        if (!$id){
            $this->ajaxReturn(array('errno'=>1,'error'=>'用户不存在！'),'JSON');
        }
        $user = $db->where('id='.$id)->find();
        //验证金额格式是否正确
        $price = $this->_post('price');
        if (!preg_match('/^[0-9]+(\.[0-9]{0,2})?$/',$price)){
            $this->ajaxReturn(array('errno'=>1,'error'=>'金额格式不正确！'),'JSON');
        }
        if ($price<=0){
            $this->ajaxReturn(array('errno'=>1,'error'=>'金额数额不正确！'),'JSON');
        }
        $user['amount'] = $user['amount'] + $price;
        $db->data($user)->save();
        //   充值记录
        $data['token'] = $user['token'];
        $data['wecha_id'] = $user['wecha_id'];
        $data['truename'] = $user['truename'];
        $data['card_no']  = $user['card_no'];
        $data['tel']      = $user['tel'];
        $data['price'] = $price;$data['money'] = $price;
        $datadb = D('MemberAmountdata');
        $datadb->create($data);
        $datadb->nick = $nick;$datadb->type = 1;
        $datadb->add();
        if ($urls){
            $this->ajaxReturn(array('errno'=>0,'error'=>'成功充值！','url'=>$urls),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>0,'error'=>'成功充值！','url'=>'/npManage/Member/memberlist.act'),'JSON');
        }
    }
    //会员消费
    public function purchase(){
        C('TOKEN_ON',false);
        $db=M('MemberUser');
        $pswd = M('MemberCardSet')->field('password')->where(array('token'=>session('token')))->find();
        $password = $this->_post('password');
        $buyty    = $this->_post('buy_ty');
        $urls     = $this->_post('urls'); //兼容跳转  默认为微信用户列表
        if ($pswd['password']!=$password){
            $this->ajaxReturn(array('errno'=>1,'error'=>'商家消费密码错误！'),'JSON');
        }
        //验证用户
        $id = $this->_post('memberid','intval');
        if (!$id){
            $this->ajaxReturn(array('errno'=>1,'error'=>'用户不存在！'),'JSON');
        }
        $user = $db->where('id='.$id)->find();
        //验证金额格式是否正确
        $price = $this->_post('money');
        if (!preg_match('/^[0-9]+(\.[0-9]{0,2})?$/',$price)){
            $this->ajaxReturn(array('errno'=>1,'error'=>'金额格式不正确！'),'JSON');
        }
        if ($price<=0){
            $this->ajaxReturn(array('errno'=>1,'error'=>'金额数额不正确！'),'JSON');
        }
        //支付方式
        if ($buyty==1){
            //  消费记录
            $data['token'] = $user['token'];
            $data['wecha_id'] = $user['wecha_id'];
            $data['truename'] = $user['truename'];
            $data['card_no']  = $user['card_no'];
            $data['tel']      = $user['tel'];
            $data['price'] = $price;$data['money'] = $price;
            $datadb = D('MemberAmountdata');
            $datadb->create($data);
            $datadb->type = 3;  //现金消费
            $datadb->add();
            if ($urls){
                $this->ajaxReturn(array('errno'=>0,'error'=>'消费成功！','url'=>$urls),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>0,'error'=>'消费成功！','url'=>'/npManage/Member/memberlist.act'),'JSON');
            }
        }else if ($buyty==2){

            $user['amount'] = $user['amount'] - $price;
            if ($user['amount']<0){
                $this->ajaxReturn(array('errno'=>1,'error'=>'用户余额不足！'),'JSON');
            }
            $db->data($user)->save();
            //   消费记录
            $data['token'] = $user['token'];
            $data['wecha_id'] = $user['wecha_id'];
            $data['truename'] = $user['truename'];
            $data['card_no']  = $user['card_no'];
            $data['tel']      = $user['tel'];
            $data['price'] = $price;$data['money'] = $price;
            $datadb = D('MemberAmountdata');
            $datadb->create($data);
            $datadb->type = 2;  //余额消费
            $datadb->add();
            if ($urls){
                $this->ajaxReturn(array('errno'=>0,'error'=>'消费成功！','url'=>$urls),'JSON');
            }else{
                $this->ajaxReturn(array('errno'=>0,'error'=>'消费成功！','url'=>'/npManage/Member/memberlist.act'),'JSON');
            }
        }else{
            $this->ajaxReturn(array('errno'=>1,'error'=>'支付方式错误！'),'JSON');
        }
    }
    //会员积分操作
    public function integral(){
        C('TOKEN_ON',false);
        $db=M('MemberUser');
        //验证用户
        $id = $this->_post('memberid','intval');
        if (!$id){
            $this->ajaxReturn(array('errno'=>1,'error'=>'用户不存在！'),'JSON');
        }
        //验证积分格式是否正确
        $score = $this->_post('score');
        $nick = $this->_post('nick');
        $urls     = $this->_post('urls'); //兼容跳转  默认为微信用户列表
        if (!preg_match('/^[+|-]?[0-9]+$/',$score)){
            $this->ajaxReturn(array('errno'=>1,'error'=>'积分格式不正确！'),'JSON');
        }
        if (intval($score)==0){
            $this->ajaxReturn(array('errno'=>1,'error'=>'积分数额不正确！'),'JSON');
        }
        $user = $db->where('id='.$id)->find();
        $user['total_score'] = $user['total_score'] + intval($score);
        if ($user['total_score']<0){
            $this->ajaxReturn(array('errno'=>1,'error'=>'积分余额不足！'),'JSON');
        }
        $db->data($user)->save();
        //   积分记录
        $data['token'] = $user['token'];
        $data['wecha_id'] = $user['wecha_id'];
        $data['truename'] = $user['truename'];
        $data['card_no']  = $user['card_no'];
        $data['tel']      = $user['tel'];
        $data['nick']     = $nick;
        $data['score'] = abs(intval($score));
        $datadb = D('MemberIntegraldata');
        $datadb->create($data);
        if ($score>0){
            $datadb->type = 1; //手动减积分
            $datadb->add();
        }else{
            $datadb->type = 0; ////手动加积分
            $datadb->add();
        }
        if ($urls){
            $this->ajaxReturn(array('errno'=>0,'error'=>'修改成功！','url'=>$urls),'JSON');
        }else{
            $this->ajaxReturn(array('errno'=>0,'error'=>'修改成功！','url'=>'/npManage/Member/memberlist.act'),'JSON');
        }
    }
    //会员消费统计
    public function stat(){
        $db=M('MemberUser');
        //验证用户
        $id = $this->_get('member_id','intval');
        if (!$id){
            $this->ajaxReturn(array('errno'=>1,'error'=>'用户不存在！'),'JSON');
        }
        $user = $db->field('id,token,wecha_id,total_score,expend_score')->where('id='.$id)->find();

        $thisYear = date('Y');
        $thisMon  = date('m');
        $this->assign('thisYear',$thisYear);
        $this->assign('thisMon',$thisMon);
        $this->assign('user',$user);
        $this->display();
    }
    //会员数据统计
    public function countMember(){
        $thisYear = date('Y');
        $thisMon  = date('m');
        $this->assign('thisYear',$thisYear);
        $this->assign('thisMon',$thisMon);
        $this->display();
    }
    //获取会员卡用户信息
    /*
     * method:user_query
     * username:dfdsaf
     * ty:phone
     *
     */
    public function getMember(){
        $db = M('MemberUser');
        $type = $this->_post('ty');
        $name = $this->_post('username');
        $json = array();
        if ($type=='phone'){
            $where['tel'] = $name;
            $where['token'] = session('token');
            $info = $db->where($where)->find();
            $json = array('id'=>$info['id'],'name'=>$info['truename']);
        }else if ($type=='cardnumber'){
            $where['card_no'] = $name;
            $where['token'] = session('token');
            $info = $db->where($where)->find();
            $json = array('id'=>$info['id'],'name'=>$info['truename']);
        }
        $this->ajaxReturn($json,'JSON');
    }
    //消费明细查询
    public function consumptionList(){
        $db = M('MemberAmountdata');
        $where['token'] = session('token');
        $where['type']  = array(array('eq',2),array('eq',3),'OR');
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }
    //充值明细查询
    public function rechargeList(){
        $db = M('MemberAmountdata');
        $where['token'] = session('token');
        $where['type']  = 1;
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }
    //充值明细查询
    public function integralList(){
        $db = M('MemberIntegraldata');
        $where['token'] = session('token');
        $count=$db->where($where)->count();
        $page=new Page($count,10);
        $list=$db->where($where)->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$page->show());
        $this->assign('list',$list);
        $this->assign('count',$count);
        $this->display();
    }
    //所有用户消费统计
    public function statisticConsumption(){
        $thisYear = date('Y');
        $thisMon  = date('m');
        $this->assign('thisYear',$thisYear);
        $this->assign('thisMon',$thisMon);
        $this->display();
    }
    //所有用户积分统计
    public function statisticIntegral(){
        $thisYear = date('Y');
        $thisMon  = date('m');
        $this->assign('thisYear',$thisYear);
        $this->assign('thisMon',$thisMon);
        $this->display();
    }
    //会员消费统计数据
    public function statAmountData(){
        $db=M('MemberUser');
        $mdb = M('MemberAmountdata');
        $id = $this->_get('member_id','intval');
        $year = $this->_get('year');
        $month = $this->_get('month');
        $jsonRes = array();
        //验证用户
        if (!$id){
            //$this->ajaxReturn(array('errno'=>1,'error'=>'用户不存在！'),'JSON');
            $where['token']    = session('token');
        }else{
            $user = $db->field('id,token,wecha_id,total_score,expend_score')->where('id='.$id)->find();
            $where['token']    = $user['token'];
            $where['wecha_id'] = $user['wecha_id'];
        }

        $where['year'] = $year;$where['month'] = $month;
        $where['type'] = array(array('eq',2),array('eq',3), 'or');
        $total = $mdb->where($where)->sum('price');
        $data  = $mdb->field('sum(price) as money,year,month,day')->where($where)->group('year,month,day')->order('day')->select();
        $jsonData = array();
        $days = date('t',mktime(0,0,1,$month,1,$year));
        $j = 0;$num = count($data);
        for($i=1;$i<=$days;$i++){
            if ($i==$data[$j]['day']&&$j<$num){
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,floatval($data[$j]['money']));
                $j++;
            }else{
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,0);
            }
        }
        $jsonRes['total'] = floatval($total);
        $jsonRes['chart'] = array(array('data'=>$jsonData,'name'=>'消费金额'));
        $this->ajaxReturn($jsonRes,'JSON');
    }
    //会员积分统计数据
    public function statIntegralData(){
        $db=M('MemberUser');
        $mdb = M('MemberIntegraldata');
        $id = $this->_get('member_id','intval');
        $year = $this->_get('year');
        $month = $this->_get('month');
        $jsonRes = array();
        //验证用户
        if (!$id){
            //$this->ajaxReturn(array('errno'=>1,'error'=>'用户不存在！'),'JSON');
            $where['token']    = session('token');
        }else{
            $user = $db->field('id,token,wecha_id,total_score,expend_score')->where('id='.$id)->find();
            $where['token']    = $user['token'];
            $where['wecha_id'] = $user['wecha_id'];
        }

        $where['year'] = $year;$where['month'] = $month;
        $where['type'] = array(array('eq',1),array('eq',2), 'or'); // 新增积分 TODO 消费，签到，转发
        $updata  = $mdb->field('sum(score) as score,year,month,day')->where($where)->group('year,month,day')->order('day')->select();
        $where['type'] = 0;//array(array('eq',0),array('eq',2), 'or'); // 减积分
        $downdata = $mdb->field('sum(score) as score,year,month,day')->where($where)->group('year,month,day')->order('day')->select();
        $jsonData = array();
        $days = date('t',mktime(0,0,1,$month,1,$year));
        $j = 0;$num = count($updata);
        for($i=1;$i<=$days;$i++){
            if ($i==$updata[$j]['day']&&$j<$num){
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,floatval($updata[$j]['score']));
                $j++;
            }else{
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,0);
            }
        }
        $jsonRes[] = array('data'=>$jsonData,'name'=>'发送积分');
        $jsonData = array();
        $j = 0;$num = count($downdata);
        for($i=1;$i<=$days;$i++){
            if ($i==$downdata[$j]['day']&&$j<$num){
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,floatval($downdata[$j]['score']));
                $j++;
            }else{
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,0);
            }
        }
        $jsonRes[] = array('data'=>$jsonData,'name'=>'回收积分');
        $this->ajaxReturn($jsonRes,'JSON');
    }

    //获取用户数据
    public function statMemberData(){
        $db=M('MemberUser');
        $year = $this->_get('year');
        $month = $this->_get('month');
        $jsonRes = array();
        $where['token']    = session('token');
        $start = mktime(0,0,0,$month,1,$year);
        $end   = mktime(0,0,0,$month+1,1,$year);
        $where['getcardtime'] = array('between',array($start,$end));
        $total = $db->where($where)->sum('id');
        $data  = $db->field('count(id) as num,getcardtime')->where($where)->group('getcardtime')->order('getcardtime')->select();
        $jsonData = array();
        $days = date('t',mktime(0,0,1,$month,1,$year));
        $j = 0;$num = count($data);
        for($i=1;$i<=$days;$i++){
            if ($i==date('d',$data[$j]['getcardtime'])&&$j<$num){
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,floatval($data[$j]['num']));
                $j++;
            }else{
                $jsonData[] = array(mktime(0,0,0,$month,$i,$year)*1000,0);
            }
        }
        $jsonRes['total'] = intval($total);
        $jsonRes['chart'] = array(array('data'=>$jsonData,'name'=>'新增会员'));
        $this->ajaxReturn($jsonRes,'JSON');
    }


    /*
     *
     * 会员营销
     */
    public function market(){

        $this->display();
    }
    /*
     * 签到分享设置
     */
    public function setScores(){
        $db = D('MemberCardSet');
        if (IS_POST){
            $db->data($_POST)->save();
            $this->ajaxReturn(array('errno'=>0,'error'=>'保存成功！','url'=>U('setScores')));
        }
        $info = $db->where(array('token'=>$this->token))->find();
        if (!$info){
            $this->redirect('Manage/Member/setBusiness',null,3,'请先设置商家信息！');
        }
        $this->assign('info',$info);
        $this->display();
    }
}


?>