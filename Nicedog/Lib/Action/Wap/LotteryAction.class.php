<?php
class LotteryAction extends BaseAction{
	public function index(){
		/*$agent = $_SERVER['HTTP_USER_AGENT'];
		if(!strpos($agent,"icroMessenger")) {
			echo '此功能只能在微信浏览器中使用';exit;
		}*/
		$token		= $this->_get('token');
		$wecha_id	= $this->_get('wecha_id');
		$id 		= $this->_get('actid');
		
		$redata		= M('Lottery_record');
		$where 		= array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id);
		$record 	= $redata->where($where)->find();		
		if($record == Null){
			$redata->add($where);
			$record = $redata->where($where)->find();
		}
		$Lottery 	= M('Lottery')->where(array('id'=>$id,'token'=>$token,'type'=>1,'status'=>1))->find();
		
		//1.活动过期,显示结束
		  
		//4.显示奖项,说明,时间
		if ($Lottery['etime'] < time()) {
             $this->assign('lottery',$Lottery);
			 $this->display();
			 exit();
		}
		// 1. 中过奖金	
		if ($record['islottery'] == 1) {				
			$data['end'] = 5;
			$data['sn']	 	 = $record['sn'];
			$data['uname']	 = $record['wecha_name'];
			$data['prize']	 = $record['prize'];
			$data['tel'] 	 = $record['phone'];	
		}

        $this->assign('token',$token);
        $this->assign('wecha_id',$wecha_id);
        $this->assign('lottery',$Lottery);
		$this->assign('record',$record);
		//var_dump($data);exit();
		$this->display();
	}
	
	/**
	 * Enter description here...
	 *
	 * @param unknown_type $proArr
	 * @param unknown_type $total 预计参与人数
	 * @return unknown
	 */
	protected function get_rand($proArr,$total) { 
		    $result = 7; 
		    $randNum = mt_rand(1, $total); 
		    foreach ($proArr as $k => $v) {
		    	
		    	if ($v['v']>0){//奖项存在或者奖项之外
		    		if ($randNum>$v['start']&&$randNum<=$v['end']){
		    			$result=$k;
		    			break;
		    		}
		    	}
		    }
		    return $result; 
	}  
	
	protected function get_prize($id){
		$Lottery 	= M('Lottery')->where(array('id'=>$id))->find();
		//
		$firstNum=intval($Lottery['l_num_one'])-intval($Lottery['l_luck_one']);
		$secondNum=intval($Lottery['l_num_two'])-intval($Lottery['l_luck_two']);
		$thirdNum=intval($Lottery['l_num_three'])-intval($Lottery['l_luck_three']);
		$fourthNum=intval($Lottery['l_num_four'])-intval($Lottery['l_luck_four']);
		$fifthNum=intval($Lottery['l_num_five'])-intval($Lottery['l_luck_five']);
		$sixthNum=intval($Lottery['l_num_six'])-intval($Lottery['l_luck_six']);
		$multi=intval($Lottery['total_num']);//最多抽奖次数
		$prize_arr = array(
			'0' => array('id'=>1,'prize'=>'一等奖','v'=>$firstNum,'start'=>0,'end'=>$firstNum), 
			'1' => array('id'=>2,'prize'=>'二等奖','v'=>$secondNum,'start'=>$firstNum,'end'=>$firstNum+$secondNum), 
			'2' => array('id'=>3,'prize'=>'三等奖','v'=>$thirdNum,'start'=>$firstNum+$secondNum,'end'=>$firstNum+$secondNum+$thirdNum),
			'3' => array('id'=>4,'prize'=>'四等奖','v'=>$fourthNum,'start'=>$firstNum+$secondNum+$thirdNum,'end'=>$firstNum+$secondNum+$thirdNum+$fourthNum),
			'4' => array('id'=>5,'prize'=>'五等奖','v'=>$fifthNum,'start'=>$firstNum+$secondNum+$thirdNum+$fourthNum,'end'=>$firstNum+$secondNum+$thirdNum+$fourthNum+$fifthNum),
			'5' => array('id'=>6,'prize'=>'六等奖','v'=>$sixthNum,'start'=>$firstNum+$secondNum+$thirdNum+$fourthNum+$fifthNum,'end'=>$firstNum+$secondNum+$thirdNum+$fourthNum+$fifthNum+$sixthNum),
			'6' => array('id'=>7,'prize'=>'谢谢参与','v'=>(intval($Lottery['probability']))*$multi-($firstNum+$secondNum+$thirdNum+$fourthNum+$fifthNum+$sixthNum),'start'=>$firstNum+$secondNum+$thirdNum+$fourthNum+$fifthNum+$sixthNum,'end'=>intval($Lottery['probability'])*$multi)
		);
		//
		foreach ($prize_arr as $key => $val) { 
			$arr[$val['id']] = $val; 
		} 
		//-------------------------------	 
		//随机抽奖[如果预计活动的人数为1为各个奖项100%中奖]
		//-------------------------------	 
		if ($Lottery['probability'] == 1) {
	 
			if ($Lottery['l_luck_one'] <= $Lottery['l_num_one']) {
				$prizetype = 1;	
			}else{
				$prizetype = 7;	
			}			
			 
		}else{
			$prizetype = $this->get_rand($arr,intval($Lottery['allpeople'])*$multi); 
		}
		 
		//$winprize = $prize_arr[$rid-1]['prize'];

		switch($prizetype){
			case 1:
					 
				if ($Lottery['l_luck_one'] >= $Lottery['l_num_one']) {
					 $prizetype = ''; 
					 //$winprize = '谢谢参与'; 
				}else{
					 
					$prizetype = 1; 					
				    M('Lottery')->where(array('id'=>$id))->setInc('l_luck_one');
				}
			break;
				
			case 2:
				if ($Lottery['l_luck_two'] >= $Lottery['l_num_two']) {
						$prizetype = ''; 
						//$winprize = '谢谢参与';
				}else{
					//判断是否设置了2等奖&&数量
					if(empty($Lottery['l_name_two']) && empty($Lottery['l_num_two'])){
						$prizetype = ''; 
						//$winprize = '谢谢参与';
					}else{ //输出中了二等奖
						$prizetype = 2; 					
						M('Lottery')->where(array('id'=>$id))->setInc('l_luck_two');
					}	 
					
				}
				break;
							
			case 3:
				if ($Lottery['l_luck_three'] >= $Lottery['l_num_three']) {
					 $prizetype = ''; 
					// $winprize = '谢谢参与';
				}else{
					if(empty($Lottery['l_name_three']) && empty($Lottery['l_num_three'])){
						 $prizetype = ''; 
						// $winprize = '谢谢参与';
					}else{
						$prizetype = 3; 					
						M('Lottery')->where(array('id'=>$id))->setInc('l_luck_three');
					} 
					
				}
				break;
						
			case 4:
				if ($Lottery['l_luck_four'] >= $Lottery['l_num_four']) {
					  $prizetype =  ''; 
					// $winprize = '谢谢参与';
				}else{
					 if(empty($Lottery['l_name_four']) && empty($Lottery['l_num_four'])){
					   	$prizetype =  ''; 
					 	//$winprize = '谢谢参与';
					 }else{
					 	$prizetype = 4; 					
						M('Lottery')->where(array('id'=>$id))->setInc('l_luck_four');
					 }					
				}
			break;
			
			case 5:
				if ($Lottery['l_luck_five'] >= $Lottery['l_num_five']) {
					 $prizetype =  ''; 
					 //$winprize = '谢谢参与';
				}else{
					if(empty($Lottery['l_name_five']) && empty($Lottery['l_num_five'])){
						$prizetype =  ''; 
					 	//$winprize = '谢谢参与';
					}else{
						$prizetype = 5; 					
						M('Lottery')->where(array('id'=>$id))->setInc('l_luck_five');
					} 
				}
			break;
			
			case 6:
				if ($Lottery['l_luck_six'] >= $Lottery['l_num_six']) {
					 $prizetype =  ''; 
					// $winprize = '谢谢参与';
				}else{
					 if(empty($Lottery['l_name_six']) && empty($Lottery['l_num_six'])){
					 	$prizetype =  ''; 
					 	//$winprize = '谢谢参与';
					 }else{
					 	$prizetype = 6; 					
						M('Lottery')->where(array('id'=>$id))->setInc('l_luck_six');
					 }
					
				}
			break;
							
			default:
					$prizetype =  ''; 
					//$winprize = '谢谢参与';
					
					break;
		}
		
		return $prizetype;
	}
	
	public function getajax(){	
		
		$token 		=	$this->_post('token');
		$wecha_id	=	$this->_post('oneid');
		$id 		=	$this->_post('id');
		$rid 		= 	$this->_post('rid');	
		$redata 	=	M('Lottery_record');
		$where 		= 	array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id);
		$record 	=	$redata->where($where)->find();	
		// 1. 中过奖金	
		if ($record['islottery'] == 1) {				
			//$norun = 1;
			$sn	 	 = $record['sn'];
			$uname	 = $record['wecha_name'];
			$prize	 = $record['prize'];
			$tel 	 = $record['phone'];
			$msg = "尊敬的:<font color='red'>$uname</font>,您已经中过<font color='red'> $prize</font> 了,您的领奖序列号:<font color='red'> $sn </font>请您牢记及尽快与我们联系.";
			echo '{"norun":1,"msg":"'.$msg.'"}';
			exit;		
		}
		// 2. 抽奖次数是否达到			
		$Lottery 	= M('Lottery')->where(array('id'=>$id,'token'=>$token,'type'=>1,'status'=>1))->find();
        LOG::write('usenums'.$record['usenums'].'|total_num:'.$Lottery['total_num'],LOG::ERR);
		if ($record['usenums'] >= $Lottery['total_num'] ) {
			//$norun 	  =  2;
			//$usenums  =  $record['usenums'];
			//$totalnum =	$Lottery['total_num'];
            $data['norun'] = 2;
            $data['usenums'] = $record['usenums'];
            $data['totalnum'] = $Lottery['total_num'];
            $data['token']    = $token;
            $data['status']   = $Lottery['status'];
            $this->ajaxReturn($data,'JSON');
		}else{ //每次请求先增加 使用次数 usenums
			M('Lottery_record')->where(array('id'=>$rid))->setInc('usenums');
			$record = M('Lottery_record')->where(array('id'=>$rid))->find();
			$prizetype	=	$this->get_prize($id);			
			if ($prizetype >= 1 && $prizetype <= 6) {
                $snwhere['token']  = $token;
                $snwhere['pid']    = $id;
                $snwhere['status'] = 1;
				$sn 	= M('Sncode')->where($snwhere)->find();
                if ($sn){
                    M('Sncode')->data(array('prize'=>$prizetype,'phone'=>$record['phone'],'wechaname'=>$record['wecha_name'],'status'=>2))->save();
                    //echo '{"success":1,"sn":"'.$sn.'","prizetype":"'.$prizetype.'","usenums":"'.$record['usenums'].'"}';
                    $this->ajaxReturn(array('success'=>1,'sn'=>$sn['sncode'],'prizetype'=>$prizetype,'usenums'=>$record['usenums']),'JSON');
                }else{
                    $this->ajaxReturn(array('success'=>0,'prizetype'=>'','usenums'=>$record['usenums']),'JSON');
                }
            }else{
				//echo '{"success":0,"prizetype":"","usenums":"'.$record['usenums'].'"}';
                $this->ajaxReturn(array('success'=>0,'prizetype'=>'','usenums'=>$record['usenums']),'JSON');
			}			
			exit;
		} 
	}
	
	
	//中奖后填写信息
	public function add(){
		 if($_POST['action'] ==  'add' ){
			$lid 				= $this->_post('lid');
			$wechaid 			= $this->_post('wechaid');
			$data['sn']			= $this->_post('sncode');
			$data['phone'] 		= $this->_post('tel');
			$data['prize']		= $this->_post('prizetype');
			$data['wecha_name'] = $this->_post('wxname');
			$data['time']		= time(); 
			$data['islottery']	= 1;			

			$rollback = M('Lottery_record')->where(array('lid'=> $lid,
				'wecha_id'=>$wechaid))->save($data);
			$msg['success'] = 1;
            $msg['msg'] = "恭喜！尊敬的 {$data['wecha_name']},请您保持手机通畅！你的领奖序号:{$data['sn']}";
			$this->ajaxReturn($msg,'JSON');
			//echo'{"success":1,"msg":"恭喜！尊敬的 '.$data['wecha_name'].',请您保持手机通畅！你的领奖序号:'.$data['sn'].'"}';
			//exit;
		}
	}
}
	
?>