<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<title><?php echo ($metaTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" />
	<meta name="format-detection" content="telephone=no" />
	<link type="text/css" rel="stylesheet" href="<?php echo $staticFilePath;?>/css/style.css" />
	<script src="<?php echo $staticFilePath;?>/js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $staticFilePath;?>/js/main.js"></script>
</head>

<body>
	<!--头部-->
	<header class="ts1">
		<a class="u_back fl" href="javascript:history.go(-1)"></a>
		<ul class="topbar fr">
			<li>
				<a class="icon_user" href="<?php echo U('Product/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>"> <i></i>
					我的
				</a>
			</li>
			<li>
				<a class="icon_shopping" href="<?php echo U('Product/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>"> <i></i>
					购物车
				</a>
			</li>
			<li>
				<a class="icon_class" href="<?php echo U('Product/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>">
					<i></i>
					分类
				</a>
			</li>
			<li>
				<a class="icon_index" href="<?php echo U('Product/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>">
					<i></i>
					主页
				</a>
			</li>
		</ul>
	</header><!--主体-->
	<div class="p_floatbox">
    <div class="f_list_car p_buy clearfix" id="p_buy">
    	<span class="all_price">总价格：<font id="all_price">￥<?php echo ($totalProductFee); ?></font></span>
    	<span>总共<font id="all_numb"><?php echo ($totalProductCount); ?></font>件商品</span>
    	<a href="<?php echo U('Product/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>$isDining));?>" class="p_btn_buy"><span class="ts1">进入购物车</span></a>
    </div>
</div>
<style>
.deploy_ctype_tip{z-index:1001;width:100%;text-align:center;position:fixed;top:50%;margin-top:-23px;left:0;}.deploy_ctype_tip p{display:inline-block;padding:13px 24px;border:solid #d6d482 1px;background:#f5f4c5;font-size:16px;color:#8f772f;line-height:18px;border-radius:3px;}
</style>
<form method="post" action="" onsubmit="return tgSubmit()">
<?php if($cartIsDining == 1): ?><a class="more" id="show_more" href="javascript:void(0);" style="color:#fff;background:#f90">属于餐饮类订单，请先填写点餐方式等信息</a>
<input type="hidden" name="diningtype" id="diningtype" value="3" />
   <div class="p_mod table_1 table_3 desks" id="desks" style="display: block;" >
        <h2 class="p_mod_title">请填写就餐时间</h2>
        <dl class="f_order_list single">
        <select name="buytimestamp" id="buytimestamp" onchange="tables()">
        <?php if(is_array($dateTimes)): $i = 0; $__LIST__ = $dateTimes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d): $mod = ($i % 2 );++$i;?><option value="<?php echo ($d); ?>"><?php echo date('m月d日',$d); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select> <select name="hour" id="hour" onchange="tables()">
        <option value="" selected>选择时间</option>
        <?php if(is_array($hours)): $i = 0; $__LIST__ = $hours;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?><option value="<?php echo ($h); ?>"><?php echo $h.'时'; ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
          <input type="hidden" placeholder="请输入具体日期和时间" id="buytime" name="buytime" value="" />
                  </dl>
        </div>
<?php if($totalProductCount != 0): ?><div class="p_mod">
        <h2 class="p_mod_title">您的点餐方式</h2>
        <dl class="f_order_list single dining_type">
          <dd><label for="table_1">点餐</label>
            <input type="radio" id="table_1" name="diningtypes" title="点餐" value="1" />
          </dd>
          <?php if($diningConfig['diningwaimai']==1){ ?>
          <dd><label for="table_2">外卖</label>
            <input type="radio" id="table_2" name="diningtypes" title="外卖" value="2" />
          </dd>
         <?php } ?>
         <?php if($diningConfig['diningyuding']==1){ ?>
          <dd class="on"><label for="table_3">预定</label>
            <input type="radio" id="table_3" name="diningtypes" title="预定" value="3" checked="true" />
          </dd>
          <?php } ?>
        </dl>
        </div><?php endif; ?>       

        
        
     
        
        
        <?php if($tables): ?><div class="p_mod table_1 table_3 desks" id="desks" style="display: block;">
        <h2 class="p_mod_title">请选择桌台</h2>
        <dl class="f_order_list single">
            <?php if(is_array($tables)): $i = 0; $__LIST__ = $tables;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><dd id="table_radio_<?php echo ($t["id"]); ?>" <?php if($i == 0): ?>class = "on"<?php endif; ?>><label><?php echo ($t["name"]); ?>
            <input type="radio" class="radio_tableid" name="tableid" value="<?php echo ($t["id"]); ?>" /></label>
          </dd><?php endforeach; endif; else: echo "" ;endif; ?>
         
                  </dl>
        </div><?php endif; endif; ?>
        
<div class="main" id="wrap">
    
    	<div class="p_mod o_address">
    		<h2 class="p_mod_title">请填写个人信息</h2>
            <div id="city">
    		<ul>
    			<li><strong>姓名：</strong><input type="text" placeholder="请输入姓名" id="truename" name="truename" value="<?php echo ($thisUser["truename"]); ?>" /></li>
    			<li><strong>手机：</strong><input type="text" placeholder="请输入联系人手机号" id="tel" name="tel" value="<?php echo ($thisUser["tel"]); ?>" /></li>
    			<li><strong>地址：</strong><input type="text" placeholder="请输入详细地址" id="address" name="address" value="<?php echo ($thisUser["address"]); ?>" /></li>
                <li><strong>联系方式保存到用户库：</strong><input type="checkbox" value="1" name="saveinfo" style="width: 16px;" checked="true" /></li>
    		</ul>
            </div>
    	</div>
    	<div class="o_btn clearfix">
    		<input type="button" class="o_btn_back ts1" onclick="history.go(-1);" value="返回" />
    		<input type="submit" class="o_btn_submit ts1" value="<?php if(($alipayConfig["open"] == 0) OR ($totalProductFee < 0.1)): ?>保存<?php else: ?>保存并付款<?php endif; ?>" />
    	</div>
    
</div>
</form>
<script>
$(".dining_type dd").click(function(){
    $(this).parent().children('.on').removeClass('on');
    $(this).addClass('on');
    $(this).parent().children('input').removeAttr('checked');
    $(this).children('input').attr('checked', 'true');
   $('#diningtype').attr('value',$(this).children('input').attr('value'));
    var table_class = $(this).children('input').attr('id');
    $('.desks').hide();
    $('.'+table_class).show();
})
$('.desks dd').click(function(){
    $(this).parent().children('.on').removeClass('on');
    $(this).addClass('on');
    $(this).parent().children('input').removeAttr('checked');
    $(this).children('input').attr('checked', 'true');    
}) 
function showTip(tipTxt) {
        var div = document.createElement('div');
        div.innerHTML = '<div class="deploy_ctype_tip"><p>' + tipTxt + '</p></div>';
        var tipNode = div.firstChild;
        $("#wrap").after(tipNode);
        setTimeout(function () {
            $(tipNode).remove();
        }, 1500);
		}
	function tgSubmit(){
		if($('#hour')&&$('#desks').css.display=='block'){
			if($('#hour').val()==""){
				showTip('请选择时间')
				return false;
			}
		}
		//
		var userName=$('#truename').val();
		if($.trim(userName) == ""){
			showTip('请填写姓名')
			return false;
		}
		//
		var userPhone = $("#tel").val()
		if ($.trim(userPhone) == "") {
			showTip('请填写您的手机号码')
			
			return false;
		}

		var patrn = /^(1(([35][0-9])|(47)|[8][01256789]))\d{8}$/;
		if (!patrn.exec($.trim(userPhone))) {
			showTip('手机号格式错误')
			return false;
		}
		return true;
	}
	function tables(){
		$.ajax({
					url:'?g=Wap&m=Product&a=ajaxTables&token=<?php echo ($token); ?>&time='+$('#buytimestamp').attr('value')+'&hour='+$('#hour').attr('value'),
					success : function(data) {
						var tableids=data.split(',');

						var count=tableids.length;
						if(count){
							$('.radio_tableid').checked=false;
							$('.f_order_list dd').removeClass('on');
							$('.f_order_list dd').css('display','');
							for(i=0;i<count;i++){
								var id=tableids[i];
								if($('#table_radio_'+id)){
									$('#table_radio_'+id).css('display','none');
								}
							}
						}

					}
				});
	}
	</script>
</body>
</html>