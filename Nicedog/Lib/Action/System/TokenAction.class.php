<?php
class TokenAction extends BackAction{
	public function index(){
		$map = array();
		$UserDB = D('Wxuser');
		$count = $UserDB->where($map)->count();
		$Page       = new Page($count,5);// 实例化分页类 传入总记录数
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$nowPage = isset($_GET['p'])?$_GET['p']:1;
		$show       = $Page->show();// 分页显示输出
		$list = $UserDB->where($map)->order('id ASC')->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
		foreach($list as $key=>$value){
			$user=M('Users')->field('id,gid,username')->where(array('id'=>$value['uid']))->find();
			if($user){
				$list[$key]['user']['username']=$user['username'];
				$list[$key]['user']['gid']=$user['gid']-1;
			}
		}
		//dump($list);
		$this->assign('list',$list);
		$this->assign('page',$show);// 赋值分页输出
		$this->display();
		
		
	}

    /* ========权限设置部分======== */
    //权限浏览
    public function access(){
        $wxuid = $this->_get('wxuid','intval',0);
        if(!$wxuid) $this->error('参数错误!');

        $Tree = new Tree();
        $Tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $Tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $NodeDB = D('WxuserNode');
        $node = $NodeDB->getAllNode();

        $AccessDB = D('WxuserAccess');
        $access = $AccessDB->getAllAccess('','wxuid,node_id,pid,level');


        foreach ($node as $n=>$t) {
            $node[$n]['checked'] = ($AccessDB->is_checked($t,$wxuid,$access))? ' checked' : '';
            $node[$n]['depth'] = $AccessDB->get_level($t['id'],$node);
            $node[$n]['pid_node'] = ($t['pid'])? ' class="tr lt child-of-node-'.$t['pid'].'"' : '';
        }
        $str  = "<tr id='node-\$id' \$pid_node>
                    <td style='padding-left:30px;'>\$spacer<input type='checkbox' name='nodeid[]' value='\$id' class='radio' level='\$depth' \$checked onclick='javascript:checknode(this);'/ > \$title (\$name)</td>
                </tr>";

        $Tree->init($node);
        $html_tree = $Tree->get_tree(0, $str);
        $this->assign('html_tree',$html_tree);

        $this->display();
    }

    //权限编辑
    public function access_edit(){
        $wxuid = $this->_post('wxuid','intval',0);
        $nodeid = $_REQUEST['nodeid'];
        if(!$wxuid) $this->error('参数错误!');
        $AccessDB = D('WxuserAccess');
        if (is_array($nodeid) && count($nodeid) > 0) {  //提交得有数据，则修改原权限配置
            $AccessDB -> delAccess(array('wxuid'=>$wxuid));  //先删除原用户组的权限配置
            $NodeDB = D('WxuserNode');
            $node = $NodeDB->getAllNode();

            foreach ($node as $_v) $node[$_v[id]] = $_v;
            foreach($nodeid as $k => $node_id){
                $data[$k] = $AccessDB -> get_nodeinfo($node_id,$node);
                $data[$k]['wxuid'] = $wxuid;
            }
            $AccessDB->addAll($data);   // 重新创建角色的权限配置
        } else {    //提交的数据为空，则删除权限配置
            $AccessDB -> delAccess(array('wxuid'=>$wxuid));
        }
        $this->assign("jumpUrl",U('Token/access',array('wxuid'=>$wxuid)));
        $this->success('设置成功！');
    }

	public function del(){
		$id=$this->_get('id','intval',0);
		$wx=M('Wxuser')->where(array('id'=>$id))->find();
		M('Img')->where(array('token'=>$wx['token']))->delete();
		M('Text')->where(array('token'=>$wx['token']))->delete();
		M('Lottery')->where(array('token'=>$wx['token']))->delete();
		M('Keyword')->where(array('token'=>$wx['token']))->delete();
		M('Photo')->where(array('token'=>$wx['token']))->delete();
		M('Home')->where(array('token'=>$wx['token']))->delete();
		M('Areply')->where(array('token'=>$wx['token']))->delete();
		M('Diymen_class')->where(array('token'=>$wx['token']))->delete();
		$diy=M('Wxuser')->where(array('id'=>$id))->delete();
		if($diy){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
	}
	public function edit(){
		if(IS_POST){
			$this->all_save();
		}else{
			$id=$this->_get('id','intval',0);
			if($id==0)$this->error('非法操作');
			$this->assign('tpltitle','编辑');
			$fun=M('Function')->where(array('id'=>$id))->find();
			$this->assign('info',$fun);
			$group=D('User_group')->getAllGroup('status=1');
			$this->assign('group',$group);
			$this->display('add');
		}
	}
}
?>