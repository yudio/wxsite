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



}
