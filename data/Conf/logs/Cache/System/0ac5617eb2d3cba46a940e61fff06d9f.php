<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
<title>
	<?php echo C('site_name');?>-LanRain后台管理登录
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="LanRain微信营销系统" />
<meta name="Description" content="LanRain微信营销系统" />
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/css/reset.css" />
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/css/common.css" />
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/css/page.css" />
<script type="text/javascript" src="<?php echo STATICS;?>/jquery.min.js"></script>
<!--[if IE 6]>
 
<script language="javascript" type="text/javascript" src="<?php echo RES;?>/js/DD_belatedPNG.js"></script>
 
<script language="javascript" type="text/javascript">
 
DD_belatedPNG.fix(".logo a img,.shade img");
 
</script>
 
<![endif]-->
<script type="text/javascript">
    $(function () {
        $("input").focus(function () {
            $(this).addClass("inputFocus");
        }).blur(function () {
            $(this).removeClass("inputFocus");
        });
    });

    function refresh() {
        var randomRZ = Math.random();
        $("#imgCheckB").attr("src", "/index.php?g=Admin&m=Admin&a=verify&rz=" + randomRZ);
    }
</script>
</head>
<body style="background: #378ECD url(tpl/Admin/common/login/A001.jpg)repeat-x;">
<!--container-->
<div class="container bc">
	<div class="loginBox">
			<div class="top clearfix">
				<div class="tl"></div>
				<div class="tr"></div>
				<div class="t"></div>
			</div>
			<div class="content">
            	<form name="form1" method="post" action="<?php echo U('Admin/insert');?>" id="form1" class="myform">

                	<fieldset>
                		<legend><h1>LanRain 后台管理系统</h1></legend>
                       
                  		<p><span><input name="username" type="text" id="username" class="username_input" /></span></p>
                   	    <p><span><input name="password" type="password" id="pw" class="ps_input" /></span></p>
                    	<p>
                        	<span><input name="code" type="text" id="txtCheckCode" class="chk_input" maxlength="4" /></span>
                        	<span class="chk_img"><img src="<?php echo U('Admin/verify');?>" id="imgCheckB"/></span>
                            <span class="chk_txt"><a href="javascript:refresh();" style="color: #0033CC">看不清？换一张</a></span>
                        </p>
                      
               <input type="submit" name="Button1" value="" id="Button1" class="subBtn" />

                    </fieldset>

                </form>	
			</div>
			<div class="bottom clearfix">
				<div class="bl"></div>
				<div class="br"></div>
				<div class="b"></div>
			</div>
		</div>

        
</div>

<!--footer-->
<div class="footer pt30">
	CopyRight &copy 2013 LanRain All Rights Reserved 版权所有 LanRain<br />
	
</div>
</body>
</html>