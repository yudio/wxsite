<?php
/**
 * Created by PhpStorm.
 * User: samonyu
 * Date: 14-4-6
 * Time: 下午5:29
 */

class WebActivityAction extends WebAction{
    private $token;
    private $wxuid;
    private $wecha_id;
    private $wxuser;



    public function _initialize(){
        parent::_initialize();
        /*
        $agent = $_SERVER['HTTP_USER_AGENT'];
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

    public function coupon(){
        $db = M('Coupon');
        $rdb = M('CouponRecord');
        $sndb = M('Sncode');
        $id = $this->_get('actid');
        if ($id){
            $info = $db->where('id='.$id)->find();
            $where 		= array('token'=>$this->token,'wecha_id'=>$this->wecha_id,'lid'=>$id);
            $record 	= $rdb->where($where)->find();
            $sncode     = $sndb->where(array('token'=>$this->token,'pid'=>$id,'type'=>'Coupon','status'=>1))->find();
            if(!$record){
                $where['time'] = NOW_TIME;
                $rid = $rdb->add($where);
                $record = $rdb->where('id='.$rid)->find();
            }
            if (NOW_TIME < $info['stime'] || $info['status']==0){
                $msg = '活动还未开始！';
                $this->display('coupon_start');
            }elseif(NOW_TIME > $info['etime']){
                $msg = '活动已经结束！';
                if ($record['is_luck']){
                    $tk = md5(NOW_TIME);//表单令牌
                    session('coupon_tk',$tk);
                    $this->assign('tk',$tk);
                    $this->assign('prizeType',$record['prize_type']);
                    $this->assign('prizeName',$record['prize_name']);
                    $this->assign('info',$info);
                    $this->assign('record',$rdb->find($record['id']));
                    $this->display('coupon_end');
                }else{
                    echo $msg;
                }
            }else{
                if ($record['is_luck']==1){
                    $msg = '已领奖';
                    $tk = md5(NOW_TIME);//表单令牌
                    session('coupon_tk',$tk);
                    $this->assign('tk',$tk);
                    $this->assign('prizeType',$record['prize_type']);
                    $this->assign('prizeName',$record['prize_name']);
                    $this->assign('info',$info);
                    $this->assign('record',$rdb->find($record['id']));
                    $this->display('coupon_get');
                }else{
                    if ((!$sncode)||($info['l_luck_one']  == $info['l_num_one'] &&
                            $info['l_luck_two'] == $info['l_num_two'] &&
                            $info['l_luck_three']  == $info['l_num_three'] &&
                            $info['l_luck_four']  == $info['l_num_four'] &&
                            $info['l_luck_five']  == $info['l_num_five'] &&
                            $info['l_luck_six']  == $info['l_num_six'])){
                        $msg = '您来晚了，被抢光了。';
                        echo $msg;
                        exit;
                        //$this->display('coupon_fail');
                    }else{
                        $flag = false;
                        while(!$flag){
                            $prizeType=mt_rand(1,6);$prizeName='';
                            switch($prizeType){
                                case '1':
                                    if ($info['l_name_one']&&$info['l_luck_one']<$info['l_num_one']){
                                        $rdb->data(array('id'=>$record['id'],'usenums'=>$record['usenums']+1,'is_luck'=>1,'sncode'=>$sncode['sncode'],'sendstatus'=>1,'sendtime'=>NOW_TIME,'prize_name'=>$info['l_name_one'],'prize_type'=>1))->save();
                                        $sndb->data(array('id'=>$sncode['id'],'wecha_id'=>$this->wecha_id,'prize'=>1,'update_time'=>NOW_TIME,'status'=>2))->save();
                                        $flag = true;$prizeName = $info['l_name_one'];$db->where('id='.$info['id'])->setInc('l_luck_one');
                                    }
                                    break;
                                case '2':
                                    if ($info['l_name_two']&&$info['l_luck_two']<$info['l_num_two']){
                                        $rdb->data(array('id'=>$record['id'],'usenums'=>$record['usenums']+1,'is_luck'=>1,'sncode'=>$sncode['sncode'],'sendstatus'=>1,'sendtime'=>NOW_TIME,'prize_name'=>$info['l_name_two'],'prize_type'=>2))->save();
                                        $sndb->data(array('id'=>$sncode['id'],'wecha_id'=>$this->wecha_id,'prize'=>2,'update_time'=>NOW_TIME,'status'=>2))->save();
                                        $flag = true;$prizeName = $info['l_name_two'];$db->where('id='.$info['id'])->setInc('l_luck_two');
                                    }
                                    break;
                                case '3':
                                    if ($info['l_name_three']&&$info['l_luck_three']<$info['l_num_three']){
                                        $rdb->data(array('id'=>$record['id'],'usenums'=>$record['usenums']+1,'is_luck'=>1,'sncode'=>$sncode['sncode'],'sendstatus'=>1,'sendtime'=>NOW_TIME,'prize_name'=>$info['l_name_three'],'prize_type'=>3))->save();
                                        $sndb->data(array('id'=>$sncode['id'],'wecha_id'=>$this->wecha_id,'prize'=>3,'update_time'=>NOW_TIME,'status'=>2))->save();
                                        $flag = true;$prizeName = $info['l_name_three'];$db->where('id='.$info['id'])->setInc('l_luck_three');
                                    }
                                    break;
                                case '4':
                                    if ($info['l_name_four']&&$info['l_luck_four']<$info['l_num_four']){
                                        $rdb->data(array('id'=>$record['id'],'usenums'=>$record['usenums']+1,'is_luck'=>1,'sncode'=>$sncode['sncode'],'sendstatus'=>1,'sendtime'=>NOW_TIME,'prize_name'=>$info['l_name_four'],'prize_type'=>4))->save();
                                        $sndb->data(array('id'=>$sncode['id'],'wecha_id'=>$this->wecha_id,'prize'=>4,'update_time'=>NOW_TIME,'status'=>2))->save();
                                        $flag = true;$prizeName = $info['l_name_four'];$db->where('id='.$info['id'])->setInc('l_luck_four');
                                    }
                                    break;
                                case '5':
                                    if ($info['l_name_five']&&$info['l_luck_five']<$info['l_num_five']){
                                        $rdb->data(array('id'=>$record['id'],'usenums'=>$record['usenums']+1,'is_luck'=>1,'sncode'=>$sncode['sncode'],'sendstatus'=>1,'sendtime'=>NOW_TIME,'prize_name'=>$info['l_name_five'],'prize_type'=>5))->save();
                                        $sndb->data(array('id'=>$sncode['id'],'wecha_id'=>$this->wecha_id,'prize'=>5,'update_time'=>NOW_TIME,'status'=>2))->save();
                                        $flag = true;$prizeName = $info['l_name_five'];$db->where('id='.$info['id'])->setInc('l_luck_five');
                                    }
                                    break;
                                case '6':
                                    if ($info['l_name_six']&&$info['l_luck_six']<$info['l_num_six']){
                                        $rdb->data(array('id'=>$record['id'],'usenums'=>$record['usenums']+1,'is_luck'=>1,'sncode'=>$sncode['sncode'],'sendstatus'=>1,'sendtime'=>NOW_TIME,'prize_name'=>$info['l_name_six'],'prize_type'=>6))->save();
                                        $sndb->data(array('id'=>$sncode['id'],'wecha_id'=>$this->wecha_id,'prize'=>6,'update_time'=>NOW_TIME,'status'=>2))->save();
                                        $flag = true;$prizeName = $info['l_name_six'];$db->where('id='.$info['id'])->setInc('l_luck_six');
                                    }
                                    break;
                            }
                        }
                        $tk = md5(NOW_TIME);//表单令牌
                        session('coupon_tk',$tk);
                        $this->assign('tk',$tk);
                        $this->assign('prizeType',$prizeType);
                        $this->assign('prizeName',$prizeName);
                        $this->assign('info',$info);
                        $this->assign('record',$rdb->find($record['id']));
                        $this->display('coupon_get');
                    }
                }
            }

        }else{
            echo '该活动不存在!';
        }
    }

    public function updateCoupon(){
        if (IS_POST){
            $tk = $this->_post('tk');
            if ($tk!=session('coupon_tk')){
                $this->ajaxReturn(array('success'=>false,'msg'=>'禁止重复提交!'));
            }else{
                session('coupon_tk',md5(NOW_TIME));
                $type = $this->_post('type');
                $id = $this->_post('id');
                $where['wecha_id'] = $this->_post('fromUsername');
                $where['token']    = $this->token;
                $where['lid']      = $id;
                $record = M('CouponRecord')->where($where)->find();
                if ($type=='tel'){
                    M('CouponRecord')->data(array('id'=>$record['id'],'phone'=>$this->_post('tel')))->save();
                    $where['type'] = 'Coupon';$where['pid'] = $id;
                    M('Sncode')->where($where)->save(array('update_time'=>NOW_TIME,'phone'=>$this->_post('tel')));
                    $this->ajaxReturn(array('success'=>true,'msg'=>'提交成功!'));
                }elseif ($type=='business'){
                    $pswd = $this->_post('password');
                    $info = M('Coupon')->find($id);
                    if ($pswd==$info['password']){
                        M('CouponRecord')->data(array('id'=>$record['id'],'sendstatus'=>2))->save();
                        $where['type'] = 'Coupon';$where['pid'] = $id;
                        M('Sncode')->where($where)->save(array('status'=>3,'update_time'=>NOW_TIME,'usetime'=>NOW_TIME));
                        $this->ajaxReturn(array('success'=>true,'msg'=>'使用成功!','changed'=>true));
                    }else{
                        $this->ajaxReturn(array('success'=>false,'msg'=>'密码错误!'));
                    }
                }
            }
        }else{
            $this->ajaxReturn(array('success'=>false,'msg'=>'参数错误!'));
        }
    }

    public function home(){
        $id = $this->_get('wid');
        $this->assign('wid',$id);
        $this->display();
    }


}