<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="keywords" content="<?php echo C('Keywords');?>" />
<meta name="description" content="<?php echo C('Description');?>" />
<!-- Mobile Devices Support @begin -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

<link rel="shortcut icon" href="<?php echo STATICS;?>/img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/css/bootstrap.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/css/reg/reg.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/css/reg/style.css" media="all" />
<script type="text/javascript" src="<?php echo STATICS;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/src/utils/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/src/utils/omvalidate.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/src/reg/reg.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/src/www/placeholder.js"></script>
<!--[if IE 6]><script src="<?php echo STATICS;?>/src/js/DD_belatedPNG.js" type="text/javascript"></script><![endif]-->
 
<title>注册-奈斯伙伴</title>
        <!--[if IE 7]>
            <link href="<?php echo STATICS;?>/css/font_awesome_ie7.css" rel="stylesheet" />
        <![endif]-->
        <!--[if lte IE 8]>
            <script src="<?php echo STATICS;?>/src/excanvas_min.js"></script>
        <![endif]-->
        <!--[if lte IE 9]>
            <script src="<?php echo STATICS;?>/src/watermark.js"></script>
        <![endif]-->
    </head>
    
	<div class="header">
	</div>
	<div class="mainbody">
		<div class="top">

        <div id="hd" class="clearfix">
            <div class="logo"><a href="/" hidefocus="true" onfocus="this.blur();"></a></div>
        </div>

        <div class="info">
        <span><a href="/" target="_blank" title="首页" hidefocus="true" onfocus="this.blur();">首页</a></span>
        <span class="split">|</span>
        <span><a href="/" class="registerNew" title="登录" hidefocus="true" onfocus="this.blur();">登录</a></span>
    </div>
    <div style="clear:both;"></div>
		</div>
     <div class="reg-wrapper2">
	<form id="regform" class="form-horizontal" action="#" method="post">
		  <div class="control-group error">
		    <label class="control-label" for="username">用户名</label>
		    <div class="controls">
		      <input type="text" name="username" id="username" title="请输入用户名">
		      <span class="maroon">*</span><span class="help-inline">长度为6~16位字符，可以为“数字/字母/中划线/下划线”组成</span>
		    </div>
		  </div>
		  <div class="control-group error">
		    <label class="control-label" for="password">设置密码</label>
		    <div class="controls">
		      <input type="password" name="password" id="password"  title="请输入密码">
		      <span class="maroon">*</span><span class="help-inline">长度为6~16位字符</span>
		    </div>
		  </div>
		  <div class="control-group error">
		    <label class="control-label" for="repassword">确认密码</label>
		    <div class="controls">
		      <input type="password" name="repassword" id="repassword"  title="请输入密码">
		    </div>
		  </div>
            <div class="control-group">
                <label class="control-label" for="province">详细地址</label>
                <div class="controls">
                    <select name="province" id="province"></select>
                    <select name="city" id="city"></select>
                    <select name="town" id="town"></select>
		    <script src="<?php echo STATICS;?>/src/region_select.js"></script>
                    <script type="text/javascript">
                          new PCAS('province', 'city', 'town', '', '', '');
                    </script>
                </div>
            </div>
            
            <div class="control-group error">
		    <label class="control-label" for="mobile">手机</label>
		    <div class="controls">
		      <input type="text" name="mobile" id="mobile"  title="请输入手机">
		      <span class="maroon">*</span><span class="help-inline">请输入正确的手机号码</span>
		    </div>
		  </div>
		  <div class="control-group error">
		    <label class="control-label" for="email">邮箱</label>
		    <div class="controls">
		      <input type="text" name="email" id="email" title="请输入邮箱">
		      <span class="maroon">*</span><span class="help-inline">忘记密码会用到邮箱，请填写正确的邮箱</span>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="qq">QQ</label>
		    <div class="controls">
		      <input type="text" name="qq" id="qq">
		    </div>
		  </div>
		 
                    <div class="control-group">
		    <label class="control-label" for="randcode">验证码</label>
		    <div class="controls">
		      <input type="text" name="captcha" id="captcha" maxlength="4"   title="请输入验证码">
		      <span class="maroon">*</span>
		      <span name="show_captcha" id="show_captcha" >
				<img title="看不清？点击更换" id="imgCheckB" style="cursor: pointer;" onclick="javascript:refresh();" src="/npHome/Users/verify.act" width="60" height="20" border="0">
	      	  </span>
		    </div>
		  </div>

		  
		  <div class="control-group">
		  	<div class="controls">
			    <button type="submit" id="reg-btn" class="btn-register"  ></button>
                <button type="button" class="btn-register" onclick="validityInvitecode(this); return false;" style="display:none;"></button>
		  	</div>
		  </div>
		</form>
     </div>
	</div>

<script type="text/javascript">
	$(function(){
	    $('#username').focus();

	});
function refresh()
{
        var randomRZ = Math.random();
        $("#imgCheckB").attr("src", "/npHome/Users/verify.act?rz=" + randomRZ);
}
  function validityInvitecode(obj){
        obj = $(obj);
        obj.attr('disabled', 'true');
        $.post('/npHome/Users/checkverify&vcode='+$('#captcha').val(), function(rs){
	        if (rs.errno==0){
                $('#reg-btn').click();
                obj.removeAttr('disabled');
            }else{
                alert(rs.error);
            }
        }, 'json');
	 
    }
 
</script></html>