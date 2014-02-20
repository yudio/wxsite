<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="uyan_auth" content="04a3f6938d" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="奈斯、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="奈斯，国内最大的微信公众智能服务平台，奈斯八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <script src="<?php echo RES;?>/src/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/www/index1/index.css?2014-01-24-6" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-01-24-6"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/project.js?2014-01-24-6"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/carouFredSel.js?2014-01-24-6"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/weimob-index.js?2014-01-24-6"></script>
<title>奈斯（Weimob）—国内最大的微信公众服务平台</title>
<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
</head>
<body>
<!--[if lte IE 8]>  <script language="javascript">$(function (){$.browser.msie&&$("#ie9-tips").show().find("#stopSuggestA").click(function(){$("#ie9-tips").hide()})})</script><![endif]-->
<div class="nav clearfix">
    <div class="nav-content">
        <h1 class="left"><a href="/">奈斯·微信营销，如此简单！</a></h1>
        <div class="left city">
            <h2>上海</h2>
            <a href="/site/city1">
                切换城市<i class="tri4"></i>
            </a>
        </div>
        <div class="right line-li">
            <ul>
                <li>
                    <a href="/" class="hover">首页</a>
                </li>
                <li>
                    <a href="npHome/Index/case.act" >经典案例</a>
                </li>
                <li>
                    <a href="npHome/Index/proxy.act" >渠道代理</a>
                </li>
                <li>
                    <a href="npHome/Index/guide.act" >功能介绍</a>
                </li>
                <li>
                    <a href="/site/weipai"  class="navtwo" target="_black">微拍</a>
                </li>
                <li>
                    <a href="javascript:;" class="hover navtwo" onclick="loginBox.toggle(this, event);">登录</a>
                </li>
                <li>
                    <a href="/site/reg1" class="navtwo" target="_black">注册</a>
                </li>
                <li>
                    <a href="/site/help"  class="navtwo" target="_black">帮助</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="loginBox">
    <div class="login-panel">
        <h3>登录</h3>
        <div class="login-mod">
            <div class="login-err-panel dn" id="err_area">
                <span class="icon-wrapper"><i class="icon24-login err" style="margin-top:-.2em;*margin-top:0;"></i></span>
                <span id="err_tips"></span>
            </div>
            <form class="login-form" id="login-form">
                <div class="login-un">
                    <span class="icon-wrapper"><i class="icon24-login un"></i></span>
                    <input type="text" id="username" placeholder="奈斯号">
                </div>
                <div class="login-pwd">
                    <span class="icon-wrapper"><i class="icon24-login pwd"></i></span>
                    <input type="password" id="password" placeholder="密码">
                </div>
            </form>
            <div class="login-help-panel">
                <a id="rememberPwd" class="login-remember-pwd" href="javascript:;">
                    <input type="checkbox" id="rememberPwdIcon">记住帐号
                </a>
                <a class="login-forget-pwd" href="/site/reg1">我是新用户!<strong>申请入驻</strong></a>
            </div>
            <div class="login-btn-panel">
                <a class="login-btn" title="点击登录" href="javascript:;" id="login_button" onclick="login();">登录</a>
            </div>
        </div>
    </div>
    <div class="login-cover" onclick="loginBox.toggle(this, event);"></div>
</div>
<div id="ie9-tips" class="clearfix">
    <div id="tipsPanel">
        <div id="tipsDesc">系统检测到您所使用的浏览器版本较低，推荐使用<a href="http://www.firefox.com.cn/download/" target="_blank">Firefox</a>或<a href="http://www.google.cn/intl/zh-CN/chrome/browser/index.html" target="_blank">Chrome</a>浏览器打开，否则将无法体验完整产品功能。</div>
        <a id="stopSuggestA" href="javascript:;">×</a>
    </div>
</div>

<script>
    var $do_submit = false;

    // 绑定回车键
    $('#loginBox').keydown(function(e){
        if(13 == event.keyCode){
            login();
        }
    });

    function login()
    {
        if (true == $do_submit)
        {
            return false;
        }

        var $pre_submit = '登录', $done_submit = '登录中...';
        var $username = $('#username').val(), $password = $('#password').val(), $keepalive = $('#rememberPwdIcon').val();
        $('#login_button').text($done_submit);
        $do_submit = true;

        // check
        if ('' == $username || '' == $password)
        {
            $('#err_tips').text('您输入的奈斯号或密码错误，请重新输入！');
            $('#err_area').show();
            $('#login_button').text($pre_submit);
            $do_submit = false;
            return false;
        }

        var $login_data = {
            username:$username,
            password:$password,
            keepalive:$keepalive
        };
        $.post('/login', $login_data, function(rs){
            if(rs.errno == 200)
            {
                location.href = rs.url_route;
            }
            else
            {
                $('#err_tips').text(rs.error);
                $('#err_area').show();
                $('#login_button').text($pre_submit);
            }
            $do_submit = false;
        }, 'json');
    }
</script>

<div class="Public-content clearfix">
<div class="Public">
<h1 class="Public-h1">经典案例</h1>
<div class="Public-box clearfix">
<ul id="nav_lis" class="case-nav left">
	<li data-index="0" data-hash="#case-a">汽车</li>
	<li data-index="1" data-hash="#case-b">房产</li>
	<li data-index="6" data-hash="#case-g">电商</li>
	<li data-index="4" data-hash="#case-e">餐饮</li>
	<li data-index="9" data-hash="#case-j">婚纱摄影</li>
	<li data-index="17" data-hash="#case-r">婚庆</li>
	<li data-index="3" data-hash="#case-d">酒店</li>
	<li data-index="2" data-hash="#case-c">医疗</li>
	<li data-index="5" data-hash="#case-f">旅游</li>
	<li data-index="20" data-hash="#case-u">生活服务</li>
	<li data-index="7" data-hash="#case-h">娱乐</li>
	<li data-index="8" data-hash="#case-i">装潢装饰</li>
	<li data-index="10" data-hash="#case-k">通讯</li>
	<li data-index="11" data-hash="#case-l">养生美容健身</li>
	<li data-index="12" data-hash="#case-m">金融</li>
	<li data-index="13" data-hash="#case-n">广告传媒</li>
	<li data-index="14" data-hash="#case-o">零售</li>
	<li data-index="15" data-hash="#case-p">百货</li>
	<li data-index="16" data-hash="#case-q" style="display:none;">法律</li>
	<li data-index="18" data-hash="#case-s">IT</li>
	<li data-index="19" data-hash="#case-t">教育</li>
	<li data-index="21" data-hash="#case-u">珠宝</li>
	<li data-index="22" data-hash="#case-v">艺术文化</li>
	<li data-index="23" data-hash="#case-w">酒水咖啡</li>
	<li data-index="24" data-hash="#case-x">其它</li>

</ul>
<div id="nav_uls" style="overflow:hidden;">
<style type="text/css">
	.icon_wm_case.tx5 {
		background-position: -320px -80px;
	}
	.icon_wm_case.on.tx5, .icon_wm_case:hover.tx5 {
		background-position: -320px 0;
	}

	.icon_wm_case.tx6 {
		background-position: -400px -80px;
	}
	.icon_wm_case.on.tx6, .icon_wm_case:hover.tx6 {
		background-position: -400px 0;
	}
	.icon_wm_case.tx7 {
		background-position: -480px -80px;
	}
	.icon_wm_case.on.tx7, .icon_wm_case:hover.tx7 {
		background-position: -480px 0;
	}
</style>


<!-- 汽车开始 -->
<div data-index="0" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case car1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">绿地宝马5S</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case car2" style="background-image:url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">威汉汽车</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case car3" style="background-image:url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">奔驰世家</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case car4" style="background-image:url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">沃尔沃丰颐</h4>
		</li>

		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case car5" style="background-image:url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">长安铃木</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case car6" style="background-image:url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">郑州日产</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case car7" style="background-image: url(http://stc.weimob.com/img/www/index1/car/icon_wm_case_car.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">湘潭润锦汽车</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/car/car1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/car/car1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/car/car1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/car/car2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/car/car2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/car/car2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/car/car3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/car/car3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/car/car3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/car/car4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/car/car4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/car/car4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/car/car6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/car/car6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/car/car6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/car/car7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/car/car7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/car/car7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img379" src="http://stc.weimob.com/img/www/index1/car/car8-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img380" src="http://stc.weimob.com/img/www/index1/car/car8-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img381" src="http://stc.weimob.com/img/www/index1/car/car8-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<span class="arrow" id="case_arrow">
		<i class="arrow_out"></i>
		<i class="arrow_in"></i>
	</span>
</div>
<!--汽车结束-->

<!--房地产开始-->
<div data-index="1" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case est1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">石梅湾九里</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case est2" style="background-image:url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">曲江公馆·和园</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case est3" style="background-image:url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">雅居乐·剑桥郡</h4>
		</li>

		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case est4" style="background-image:url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">金地檀溪</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case est5" style="background-image:url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">万科学府</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case est6" style="background-image:url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">安阳恒大绿洲</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case est7" style="background-image: url(http://stc.weimob.com/img/www/index1/fdc/icon_wm_case_est.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">武汉和昌都汇华府</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0" >
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/fdc/fdc1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/fdc/fdc1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/fdc/fdc1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/fdc/fdc2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/fdc/fdc2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/fdc/fdc2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/fdc/fdc3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/fdc/fdc3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/fdc/fdc3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/fdc/fdc5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/fdc/fdc5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/fdc/fdc5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/fdc/fdc9-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/fdc/fdc9-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/fdc/fdc9-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/fdc/fdc8-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/fdc/fdc8-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/fdc/fdc8-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img382" src="http://stc.weimob.com/img/www/index1/fdc/fdc9-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img383" src="http://stc.weimob.com/img/www/index1/fdc/fdc9-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img384" src="http://stc.weimob.com/img/www/index1/fdc/fdc9-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--房地产结束-->

<!--医疗开始-->
<div data-index="2" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case med1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">上海复大医院</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case med2" style="background-image:url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">美缔整形美容</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case med3" style="background-image:url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">德泰恒</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case med4" style="background-image:url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">玛丽亚妇产医院</h4>
		</li>

		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case med5" style="background-image:url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">泰安丽人妇产医院</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case med6" style="background-image:url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">济南爱容整形</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case med7" style="background-image: url(http://stc.weimob.com/img/www/index1/yl/icon_wm_case_yl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">上海中大肿瘤医院</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yl/yl1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yl/yl1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yl/yl1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yl/yl2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yl/yl2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yl/yl2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yl/yl3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yl/yl3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yl/yl3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yl/yl4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yl/yl4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yl/yl4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yl/yl6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yl/yl6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yl/yl6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yl/yl9-2.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yl/yl9-1.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yl/yl9-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img397" src="http://stc.weimob.com/img/www/index1/yl/yl20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img398" src="http://stc.weimob.com/img/www/index1/yl/yl20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img399" src="http://stc.weimob.com/img/www/index1/yl/yl20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--医疗结束-->

<!--开始-->
<div data-index="3" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case jd1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/jd/icon_wm_case_jd.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">柳林赛威快捷</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case jd2" style="background-image:url(http://stc.weimob.com/img/www/index1/jd/icon_wm_case_jd.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">年代风尚</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case jd3" style="background-image:url(http://stc.weimob.com/img/www/index1/jd/icon_wm_case_jd.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">五环大</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case jd4" style="background-image:url(http://stc.weimob.com/img/www/index1/jd/icon_wm_case_jd.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">最佳财富西方</h4>
		</li>

		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case jd5" style="background-image:url(http://stc.weimob.com/img/www/index1/jd/icon_wm_case_jd.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">丽江懒阳阳客栈</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case jd6" style="background-image:url(http://stc.weimob.com/img/www/index1/jd/icon_wm_case_jd.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">深圳唐拉雅秀</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/jd/jd1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/jd/jd1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/jd/jd1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/jd/jd2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/jd/jd2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/jd/jd2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/jd/jd3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/jd/jd3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/jd/jd3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/jd/jd4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/jd/jd4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/jd/jd4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/jd/jd6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/jd/jd6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/jd/jd6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/jd/jd7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/jd/jd7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/jd/jd7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--酒店结束-->

<!--餐饮开始-->
<div data-index="4" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case cy1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">海底捞</h4>
		</li>

		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case cy2" style="background-image:url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">麦兜点点</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case cy3" style="background-image:url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">到家会</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case cy4" style="background-image:url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">黔香阁</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case cy5" style="background-image:url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">舌尖上的酸菜鱼</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case cy6"  style="background-image:url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">泰和阁</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case med7" style="background-image: url(http://stc.weimob.com/img/www/index1/ys/icon_wm_case_cy.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">莆田奥维斯西餐吧</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ys/ys10-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ys/ys10-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ys/ys10-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ys/ys3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ys/ys3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ys/ys3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ys/ys4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ys/ys4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ys/ys4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ys/ys5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ys/ys5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ys/ys5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ys/ys6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ys/ys6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ys/ys6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ys/ys7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ys/ys7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img"> <img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ys/ys7-erwei.jpg?v=2014-01-24-6" width="180" height="180"></p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img385" src="http://stc.weimob.com/img/www/index1/ys/ys20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img386" src="http://stc.weimob.com/img/www/index1/ys/ys20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img387" src="http://stc.weimob.com/img/www/index1/ys/ys20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--餐饮结束-->

<!--旅游开始-->
<div data-index="5" class="wm_case_mod_bd right">
	<ul class="wm_case_list">

		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case ly1" style="background-image:url(http://stc.weimob.com/img/www/index1/ly/icon_wm_case_ly.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">美地度假</h4>
		</li>

		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case ly2" style="background-image:url(http://stc.weimob.com/img/www/index1/ly/icon_wm_case_ly.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">滁州琅琊山</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case ly3" style="background-image:url(http://stc.weimob.com/img/www/index1/ly/icon_wm_case_ly.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">西林生态旅游</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case ly4" style="background-image:url(http://stc.weimob.com/img/www/index1/ly/icon_wm_case_ly.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">爱游团</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case ly5" style="background-image: url(http://stc.weimob.com/img/www/index1/ly/icon_wm_case_ly.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">河北康辉旅行社</h4>
		</li>

	</ul>

	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ly/ly2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ly/ly2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ly/ly2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="1">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ly/ly4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ly/ly4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ly/ly4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ly/ly5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ly/ly5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ly/ly5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="3">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ly/ly7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ly/ly7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ly/ly7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img400" src="http://stc.weimob.com/img/www/index1/ly/ly8-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img401" src="http://stc.weimob.com/img/www/index1/ly/ly8-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img402" src="http://stc.weimob.com/img/www/index1/ly/ly8-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--旅游结束-->

<!--电商开始-->
<div data-index="6" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">虎都男装</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds2"  style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">欧培拉</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds3"  style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">婴缘坊</h4>
		</li>

		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds4"  style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">神农蜂语 </h4>
		</li>

		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds5"  style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">TCL上海电视</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds6"  style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">北京大生酒业</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case ds7"  style="background-image:url(http://stc.weimob.com/img/www/index1/ds/icon_wm_case_ds.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">团购礼品</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ds/ds7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ds/ds7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ds/ds7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--电商结束-->

<!--娱乐开始-->
<div data-index="7" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">BBOSS至尊</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul2" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">丹东二人转大</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul3" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">名流之星KTV</h4>
		</li>
		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul4" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">西安倾国倾城</h4>
		</li>
		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul5" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">东方明珠娱乐会所</h4>
		</li>
		<li class="wm_case_item"  data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul6" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">金莎国际娱乐会所</h4>
		</li>
		<li class="wm_case_item"  data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case yul7" style="background-image:url(http://stc.weimob.com/img/www/index1/yul/icon_wm_case_yul.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">中国K-Show娱乐</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="5">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="6">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/yul/yl7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/yul/yl7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/yul/yl7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--娱乐结束-->

<!--装潢开始-->
<div data-index="8" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on zh1"  style="background-image:url(http://stc.weimob.com/img/www/index1/zh/icon_wm_case_zh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">科勒成都</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case zh2"  style="background-image:url(http://stc.weimob.com/img/www/index1/zh/icon_wm_case_zh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">品川室内设计</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case zh3"  style="background-image:url(http://stc.weimob.com/img/www/index1/zh/icon_wm_case_zh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">惠能地暖</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case zh4"  style="background-image:url(http://stc.weimob.com/img/www/index1/zh/icon_wm_case_zh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">宁波浪琴屿</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case zh5"  style="background-image:url(http://stc.weimob.com/img/www/index1/zh/icon_wm_case_zh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">欧派木门</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case zh6" style="background-image:url(http://stc.weimob.com/img/www/index1/zh/icon_wm_case_zh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">广州三星装饰</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zh/zh1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zh/zh1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zh/zh1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zh/zh2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zh/zh2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zh/zh2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zh/zh3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zh/zh3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zh/zh3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zh/zh5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zh/zh5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zh/zh5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zh/zh6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zh/zh6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zh/zh6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zh/zh7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zh/zh7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zh/zh7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--装潢结束-->

<!--婚纱开始-->
<div data-index="9" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs2" style="background-image:url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">韩国艺匠</h4>
		</li>

		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs1" style="background-image:url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">iweddingstudio</h4>
		</li>

		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs3" style="background-image:url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">美十摄影</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs4" style="background-image:url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">星梦奇缘</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs5" style="background-image:url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">拍吧视觉</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs6" style="background-image:url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">纽约VIP婚纱</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case hs7" style="background-image: url(http://stc.weimob.com/img/www/index1/hs/icon_wm_case_hs.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">巴黎春天婚纱</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/hs/hs3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/hs/hs3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/hs/hs3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/hs/hs2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/hs/hs2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/hs/hs2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/hs/hs4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/hs/hs4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/hs/hs4-erwei.jpg?v=2014-01-24-6" width="180" height="180"></p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/hs/hs5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/hs/hs5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/hs/hs5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/hs/hs6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/hs/hs6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/hs/hs6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/hs/hs7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/hs/hs7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/hs/hs7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img388" src="http://stc.weimob.com/img/www/index1/hs/hs8-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img389" src="http://stc.weimob.com/img/www/index1/hs/hs8-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img390" src="http://stc.weimob.com/img/www/index1/hs/hs8-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--婚纱结束-->

<!--通讯开始-->
<div data-index="10" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">衡阳金联合通讯</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx2" style="background-image:url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">洛阳移动</h4>
		</li>


		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx3" style="background-image:url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">南昌联通</h4>
		</li>

		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx4" style="background-image:url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">厦门移动</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx5" style="background-image: url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">华为</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx6" style="background-image: url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">保定宽带</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx7" style="background-image: url(http://stc.weimob.com/img/www/index1/tx/icon_wm_case_tx.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">汇川电信</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/tx/tx1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/tx/tx1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/tx/tx1-erwei.jpg?v=2014-01-24-6" width="180" height="180"></p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/tx/tx2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/tx/tx2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/tx/tx2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/tx/tx5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/tx/tx5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/tx/tx5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/tx/tx4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/tx/tx4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/tx/tx4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img403" src="http://stc.weimob.com/img/www/index1/tx/tx6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img404" src="http://stc.weimob.com/img/www/index1/tx/tx6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img405" src="http://stc.weimob.com/img/www/index1/tx/tx6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img406" src="http://stc.weimob.com/img/www/index1/tx/tx7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img407" src="http://stc.weimob.com/img/www/index1/tx/tx7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img408" src="http://stc.weimob.com/img/www/index1/tx/tx7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img409" src="http://stc.weimob.com/img/www/index1/tx/tx8-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img410" src="http://stc.weimob.com/img/www/index1/tx/tx8-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img411" src="http://stc.weimob.com/img/www/index1/tx/tx8-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--通讯结束-->

<!--美容开始-->
<div data-index="11" class="wm_case_mod_bd right">
	<ul class="wm_case_list">

		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case mr1" style="background-image:url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">辰嫣国际微刊</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case mr2" style="background-image:url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">凤凰温泉</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case mr3" style="background-image:url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">慧之通</h4>
		</li>
		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case mr4" style="background-image:url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">匠人造型</h4>
		</li>

		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case mr5" style="background-image:url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">五和养生堂</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx6" style="background-image: url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">怡德御方养生</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case tx7" style="background-image: url(http://stc.weimob.com/img/www/index1/mr/icon_wm_case_mr.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">元一正脊养生馆</h4>
		</li>
	</ul>


	</ul>

	<div class="default_wrapper wm_case_desc" data-id="0" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/mr/mr2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/mr/mr2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/mr/mr2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/mr/mr3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/mr/mr3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/mr/mr3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/mr/mr4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/mr/mr4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/mr/mr4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/mr/mr5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/mr/mr5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/mr/mr5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/mr/mr6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/mr/mr6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/mr/mr6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display: none;">
		<img id="Img412" src="http://stc.weimob.com/img/www/index1/mr/mr20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img413" src="http://stc.weimob.com/img/www/index1/mr/mr20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img414" src="http://stc.weimob.com/img/www/index1/mr/mr20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img415" src="http://stc.weimob.com/img/www/index1/mr/mr21-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img416" src="http://stc.weimob.com/img/www/index1/mr/mr21-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img417" src="http://stc.weimob.com/img/www/index1/mr/mr21-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--美容结束-->

<!--金融开始-->
<div data-index="12" class="wm_case_mod_bd right">
	<ul class="wm_case_list">

		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk1" style="background-image:url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">微诺亚</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk2" style="background-image:url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">陕西信合</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk3" style="background-image:url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">建行重庆分行</h4>
		</li>

		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk4" style="background-image:url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">中国邮政</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk5" style="background-image: url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">苏州光大银行</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk6" style="background-image: url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">神木农商银行</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case bk7" style="background-image: url(http://stc.weimob.com/img/www/index1/bk/icon_wm_case_bk.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">侯马农商银行</h4>
		</li>

	</ul>

	<div class="default_wrapper wm_case_desc" data-id="0" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bk/bk2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bk/bk2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bk/bk2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bk/bk3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bk/bk3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bk/bk3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bk/bk1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bk/bk1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bk/bk1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bk/bk4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bk/bk4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bk/bk4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img418" src="http://stc.weimob.com/img/www/index1/bk/bk20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img419" src="http://stc.weimob.com/img/www/index1/bk/bk20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img420" src="http://stc.weimob.com/img/www/index1/bk/bk20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display: none;">
		<img id="Img421" src="http://stc.weimob.com/img/www/index1/bk/bk21-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img422" src="http://stc.weimob.com/img/www/index1/bk/bk21-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img423" src="http://stc.weimob.com/img/www/index1/bk/bk21-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img424" src="http://stc.weimob.com/img/www/index1/bk/bk22-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img425" src="http://stc.weimob.com/img/www/index1/bk/bk22-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img426" src="http://stc.weimob.com/img/www/index1/bk/bk22-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--金融结束-->

<!--广告开始-->
<div data-index="13" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case ad1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">乐享南平</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case ad2" style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">JM传媒</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case  ad3" style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">四川广电星空</h4>
		</li>
		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case ad4"  style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">车视传媒</h4>
		</li>
		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case ad5" style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">彭城晚报</h4>
		</li>
		<li class="wm_case_item"  data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case ad6" style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">浙江影视娱乐频道</h4>
		</li>
		<li class="wm_case_item"  data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case ad7" style="background-image:url(http://stc.weimob.com/img/www/index1/ad/icon_wm_case_ad.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">微客</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ad/ad7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ad/ad7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ad/ad7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--广告结束-->

<!--零售开始-->
<div data-index="14" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis1 on"  style="background-image:url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">安贝儿童座椅</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis2" style="background-image:url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">拜耳水产</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis3" style="background-image:url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">超凡计算机</h4>
		</li>
		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis4" style="background-image:url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">牛牛生态水产</h4>
		</li>
		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis5" style="background-image:url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">YFAN伊梵</h4>
		</li>
		<li class="wm_case_item"  data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis6" style="background-image:url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">多乐士</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case lis7" style="background-image: url(http://stc.weimob.com/img/www/index1/lis/icon_wm_case_lis.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">便利365</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/lis/ls1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/lis/ls1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/lis/ls1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/lis/ls2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/lis/ls2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/lis/ls2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/lis/ls3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/lis/ls3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/lis/ls3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/lis/ls4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/lis/ls4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/lis/ls4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/lis/ls5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/lis/ls5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/lis/ls5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/lis/ls6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/lis/ls6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/lis/ls6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img427" src="http://stc.weimob.com/img/www/index1/lis/ls7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img428" src="http://stc.weimob.com/img/www/index1/lis/ls7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img429" src="http://stc.weimob.com/img/www/index1/lis/ls7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--零售结束-->

<!--百货结束-->
<div data-index="15" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">潮流百货</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh2" style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">兰州美伦百货</h4>
		</li>
		<li class="wm_case_item" name="shdz" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh3" style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">廊坊万达广场</h4>
		</li>
		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh4"  style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">知名度服饰</h4>
		</li>
		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh5"  style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">岳阳百货</h4>
		</li>
		<li class="wm_case_item"  data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh6"  style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">友好集团</h4>
		</li>
		<li class="wm_case_item"  data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case bh7"  style="background-image:url(http://stc.weimob.com/img/www/index1/bh/icon_wm_case_bh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">武商亚贸广场</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/bh/bh7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/bh/bh7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/bh/bh7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--百货场结束-->

<!--法律开始-->
<div data-index="16" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case fl1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/ls/icon_wm_case_fl.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">大成律师</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/ls/ls1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/ls/ls1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/ls/ls1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--法律结束-->

<!--婚庆开始-->
<div data-index="17" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case hq1 on" style="background-image:url(<?php echo RE;?>/img/www/index1/hq/icon_wm_case_hq.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">铂菲婚礼顾问</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case hq2 on" style="background-image:url(<?php echo RE;?>/img/www/index1/hq/icon_wm_case_hq.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">福州婚庆导航</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case hq3 on" style="background-image:url(<?php echo RE;?>/img/www/index1/hq/icon_wm_case_hq.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">花香阁婚庆花艺</h4>
		</li>

		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case hq4 on" style="background-image:url(<?php echo RE;?>/img/www/index1/hq/icon_wm_case_hq.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">糖果树婚礼定制</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case hq5" style="background-image: url(<?php echo RE;?>/img/www/index1/hq/icon_wm_case_hq.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">金夫人萝亚婚礼</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case hq6" style="background-image: url(<?php echo RE;?>/img/www/index1/hq/icon_wm_case_hq.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">乐婚网</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0" >
		<img id="case_img_left" src="<?php echo RE;?>/img/www/index1/hq/hq1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="<?php echo RE;?>/img/www/index1/hq/hq1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="<?php echo RE;?>/img/www/index1/hq/hq1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" >
		<img id="case_img_left" src="<?php echo RE;?>/img/www/index1/hq/hq2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="<?php echo RE;?>/img/www/index1/hq/hq2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="<?php echo RE;?>/img/www/index1/hq/hq2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" >
		<img id="case_img_left" src="<?php echo RE;?>/img/www/index1/hq/hq3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="<?php echo RE;?>/img/www/index1/hq/hq3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="<?php echo RE;?>/img/www/index1/hq/hq3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" >
		<img id="case_img_left" src="<?php echo RE;?>/img/www/index1/hq/hq5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="<?php echo RE;?>/img/www/index1/hq/hq5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="<?php echo RE;?>/img/www/index1/hq/hq5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img391" src="<?php echo RE;?>/img/www/index1/hq/hq6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img392" src="<?php echo RE;?>/img/www/index1/hq/hq6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img393" src="<?php echo RE;?>/img/www/index1/hq/hq6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display: none;">
		<img id="Img394" src="<?php echo RE;?>/img/www/index1/hq/hq7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img395" src="<?php echo RE;?>/img/www/index1/hq/hq7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img396" src="<?php echo RE;?>/img/www/index1/hq/hq7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

</div>
<!--婚庆结束-->

<!--it开始-->
<div data-index="18" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item" data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case it1 on" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">艾定义互动</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case it2" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">新疆玖久</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case it3" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">武夷奈斯</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case it4" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">深圳盘古开天</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case it5" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">云图信息科技</h4>
		</li>

		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case it6" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">深圳永图网络</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case it7" style="background-image:url(http://stc.weimob.com/img/www/index1/it/icon_wm_case_it.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">德宏州朝阳信息</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/it/it7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/it/it7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/it/it7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--it结束-->

<!--教育开始-->
<div data-index="19" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on edu1" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">佳音英语</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case  edu2" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">迈蔚树英语</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case edu3" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">廊坊第六小学</h4>
		</li>

		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case edu4" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">愚公移山美术</h4>
		</li>
		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case edu5" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">阿杰发艺</h4>
		</li>
		<li class="wm_case_item"  data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case edu6" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">维恩教育</h4>
		</li>

		<li class="wm_case_item"  data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case edu7" style="background-image:url(http://stc.weimob.com/img/www/index1/edu/icon_wm_case_edu.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">学大教育</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>

	<div class="default_wrapper wm_case_desc" data-id="7" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/edu/edu7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/edu/edu7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/edu/edu7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>

	</div>
</div>
<!--教育结束-->

<!--生活开始-->
<div data-index="20" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on wsh1" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">微生活-衡阳</h4>
		</li>

		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case  wsh2" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">通灵珠宝</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case  wsh3" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">嘉州生活</h4>
		</li>
		<li class="wm_case_item"  data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case  wsh4" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">吾爱柳巷</h4>
		</li>
		<li class="wm_case_item"  data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case  wsh5" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">太仓南洋广场</h4>
		</li>
		<li class="wm_case_item"  data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case  wsh6" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">新疆公号导航</h4>
		</li>
		<li class="wm_case_item"  data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case  wsh7" style="background-image:url(http://stc.weimob.com/img/www/index1/wsh/icon_wm_case_wsh.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">校园微生活</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh4-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh4-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh4-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh5-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh5-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh5-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh6-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh6-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh6-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh7-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh7-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh7-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="6" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/wsh/wsh2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/wsh/wsh2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/wsh/wsh2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>


</div>
<!--生活结束-->

<!--珠宝开始-->
<div data-index="21" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on zb1" style="background-image:url(http://stc.weimob.com/img/www/index1/zb/icon_wm_case_zb.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">周大生</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case  zb2" style="background-image:url(http://stc.weimob.com/img/www/index1/zb/icon_wm_case_zb.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">玛丽莱珠宝</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case zb4" style="background-image: url(http://stc.weimob.com/img/www/index1/zb/icon_wm_case_zb.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">周六福珠宝</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case zb5" style="background-image: url(http://stc.weimob.com/img/www/index1/zb/icon_wm_case_zb.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">世纪缘珠宝</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case zb6" style="background-image: url(http://stc.weimob.com/img/www/index1/zb/icon_wm_case_zb.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">佳名珠宝</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case zb7" style="background-image: url(http://stc.weimob.com/img/www/index1/zb/icon_wm_case_zb.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">香港传祺国际珠宝</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zb/zb1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zb/zb1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zb/zb1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/zb/zb2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/zb/zb2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/zb/zb2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display: none;">
		<img id="Img430" src="http://stc.weimob.com/img/www/index1/zb/zb20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img431" src="http://stc.weimob.com/img/www/index1/zb/zb20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img432" src="http://stc.weimob.com/img/www/index1/zb/zb20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display: none;">
		<img id="Img433" src="http://stc.weimob.com/img/www/index1/zb/zb21-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img434" src="http://stc.weimob.com/img/www/index1/zb/zb21-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img435" src="http://stc.weimob.com/img/www/index1/zb/zb21-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img436" src="http://stc.weimob.com/img/www/index1/zb/zb22-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img437" src="http://stc.weimob.com/img/www/index1/zb/zb22-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img438" src="http://stc.weimob.com/img/www/index1/zb/zb22-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display: none;">
		<img id="Img439" src="http://stc.weimob.com/img/www/index1/zb/zb23-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img440" src="http://stc.weimob.com/img/www/index1/zb/zb23-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img441" src="http://stc.weimob.com/img/www/index1/zb/zb23-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img442" src="http://stc.weimob.com/img/www/index1/zb/zb24-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img443" src="http://stc.weimob.com/img/www/index1/zb/zb24-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img444" src="http://stc.weimob.com/img/www/index1/zb/zb24-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>


</div>
<!--珠宝结束-->


<!--艺术文化-->
<div data-index="22" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on art1" style="background-image:url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">侯马晋国博物馆</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case art2" style="background-image:url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">张军昆曲艺术中心</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case art3" style="background-image: url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">库尔勒圣桑</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case art4" style="background-image: url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">苏州鼎藏文化艺术</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case art5" style="background-image: url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">万仟堂艺术品</h4>
		</li>
		<li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case art6" style="background-image: url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">湘谊紫砂艺术</h4>
		</li>
		<li class="wm_case_item" data-id="6">
			<span class="icon_wrapper">
				<i class="icon_wm_case art7" style="background-image: url(http://stc.weimob.com/img/www/index1/art/icon_wm_case_art.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">龙中龙环境艺术</h4>
		</li>


	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/art/art1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/art/art1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/art/art1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/art/art2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/art/art2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/art/art2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display: none;">
		<img id="Img445" src="http://stc.weimob.com/img/www/index1/art/art20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img446" src="http://stc.weimob.com/img/www/index1/art/art20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img447" src="http://stc.weimob.com/img/www/index1/art/art20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display: none;">
		<img id="Img448" src="http://stc.weimob.com/img/www/index1/art/art21-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img449" src="http://stc.weimob.com/img/www/index1/art/art21-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img450" src="http://stc.weimob.com/img/www/index1/art/art21-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img451" src="http://stc.weimob.com/img/www/index1/art/art22-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img452" src="http://stc.weimob.com/img/www/index1/art/art22-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img453" src="http://stc.weimob.com/img/www/index1/art/art22-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display: none;">
		<img id="Img454" src="http://stc.weimob.com/img/www/index1/art/art23-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img455" src="http://stc.weimob.com/img/www/index1/art/art23-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img456" src="http://stc.weimob.com/img/www/index1/art/art23-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="6" style="display: none;">
		<img id="Img457" src="http://stc.weimob.com/img/www/index1/art/art24-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img458" src="http://stc.weimob.com/img/www/index1/art/art24-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img459" src="http://stc.weimob.com/img/www/index1/art/art24-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>


</div>
<!--其它结束-->


<!--酒水-->
<div data-index="23" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on  co1" style="background-image:url(http://stc.weimob.com/img/www/index1/co/icon_wm_case_co.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">绿岛咖啡</h4>
		</li>
		<li class="wm_case_item" data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case co2" style="background-image: url(http://stc.weimob.com/img/www/index1/co/icon_wm_case_co.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">云咖啡</h4>
		</li>
		<li class="wm_case_item" data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case co3" style="background-image: url(http://stc.weimob.com/img/www/index1/co/icon_wm_case_co.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">上岛咖啡玉祥门</h4>
		</li>
		<li class="wm_case_item" data-id="3">
			<span class="icon_wrapper">
				<i class="icon_wm_case co4" style="background-image: url(http://stc.weimob.com/img/www/index1/co/icon_wm_case_co.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">云端时光咖啡</h4>
		</li>
		<li class="wm_case_item" data-id="4">
			<span class="icon_wrapper">
				<i class="icon_wm_case co5" style="background-image: url(http://stc.weimob.com/img/www/index1/co/icon_wm_case_co.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">可那咖啡</h4>
		</li><li class="wm_case_item" data-id="5">
			<span class="icon_wrapper">
				<i class="icon_wm_case co6" style="background-image: url(http://stc.weimob.com/img/www/index1/co/icon_wm_case_co.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">angelwithus</h4>
		</li>

	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/co/co1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/co/co1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/co/co1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display: none;">
		<img id="Img460" src="http://stc.weimob.com/img/www/index1/co/co20-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img461" src="http://stc.weimob.com/img/www/index1/co/co20-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img462" src="http://stc.weimob.com/img/www/index1/co/co20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>

	<div class="default_wrapper wm_case_desc" data-id="2" style="display: none;">
		<img id="Img463" src="http://stc.weimob.com/img/www/index1/co/co21-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img464" src="http://stc.weimob.com/img/www/index1/co/co21-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img465" src="http://stc.weimob.com/img/www/index1/co/co21-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="3" style="display: none;">
		<img id="Img466" src="http://stc.weimob.com/img/www/index1/co/co22-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img467" src="http://stc.weimob.com/img/www/index1/co/co22-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img468" src="http://stc.weimob.com/img/www/index1/co/co20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="4" style="display: none;">
		<img id="Img469" src="http://stc.weimob.com/img/www/index1/co/co23-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img470" src="http://stc.weimob.com/img/www/index1/co/co23-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img471" src="http://stc.weimob.com/img/www/index1/co/co20-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="5" style="display: none;">
		<img id="Img472" src="http://stc.weimob.com/img/www/index1/co/co24-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="Img473" src="http://stc.weimob.com/img/www/index1/co/co24-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="Img474" src="http://stc.weimob.com/img/www/index1/co/co24-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>



</div>
<!--酒水结束-->

<!--其它开始-->
<div data-index="24" class="wm_case_mod_bd right">
	<ul class="wm_case_list">
		<li class="wm_case_item"  data-id="0">
			<span class="icon_wrapper">
				<i class="icon_wm_case on zb1" style="background-image:url(http://stc.weimob.com/img/www/index1/qt/icon_wm_case_qt.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">林鼎护栏</h4>
		</li>
		<li class="wm_case_item"  data-id="1">
			<span class="icon_wrapper">
				<i class="icon_wm_case  zb2" style="background-image:url(http://stc.weimob.com/img/www/index1/qt/icon_wm_case_qt.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">济南途顺代驾</h4>
		</li>
		<li class="wm_case_item"  data-id="2">
			<span class="icon_wrapper">
				<i class="icon_wm_case  zb3" style="background-image:url(http://stc.weimob.com/img/www/index1/qt/icon_wm_case_qt.png?v=2014-01-24-6);"></i>
			</span>
			<h4 class="wm_case_t">沁阳韵达快递</h4>
		</li>
	</ul>
	<div class="default_wrapper wm_case_desc" data-id="0">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/qt/qt1-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/qt/qt1-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/qt/qt1-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="1" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/qt/qt2-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/qt/qt2-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/qt/qt2-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
	<div class="default_wrapper wm_case_desc" data-id="2" style="display:none;">
		<img id="case_img_left" src="http://stc.weimob.com/img/www/index1/qt/qt3-1.jpg?v=2014-01-24-6" class="wm_case_desc_img">
		<img id="case_img_right" src="http://stc.weimob.com/img/www/index1/qt/qt3-2.jpg?v=2014-01-24-6" class="wm_case_desc_img extra">
		<p class="case_ewm_img">
			<img id="case_ewm" src="http://stc.weimob.com/img/www/index1/qt/qt3-erwei.jpg?v=2014-01-24-6" width="180" height="180">
		</p>
	</div>
</div>
<!--其它结束-->
</div>
</div>
</div>

<div class="erwei" title="微信扫一扫">
    <span class="hudongzhushou">官方微信</span>
    <div class="erwei_big" style="display:none;">
        <p>扫一扫，关注奈斯官方微信，体验奈斯智能服务</p>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var erwei_time = null;
        $(".erwei").hover(function(){
            $(".erwei_big").show();
        }).mouseleave(function(){
                    erwei_time = setTimeout(function(){
                        $(".erwei_big").hide();
                    },1000);
                });
        $(".erwei_big").mouseenter(function(){
            if(erwei_time){
                clearTimeout(erwei_time);
            }
        }).mouseleave(function(){
                    erwei_time = setTimeout(function(){
                        $(".erwei_big").hide();
                    },1000);
                });
    });
</script>
<!-- 意见反馈 -->
<div class="feedback" id="feedback">
    <p class="feedsize"><b>亲爱的用户</b><a class="close" href="javascript:;" onclick= "$('#feedback, #feedback_cover').toggleClass('on');">×</a></p>
    <p class="bbottom">欢迎您访问奈斯官方网站！您对奈斯有任何意见和建议，或在使用过程中遇到问题，请在本页面反馈。我们会实时关注您的反馈不断优化，您的建议将帮助我们改进，为您提供更好的服务！</p>
    <p class="feedsize"><b>请留下您的宝贵意见和建议！（请填写）</b></p>
    <form>
        <textarea  id="feedback-text" name="" id="feedback-text" placeholder="输入文本..."></textarea>
        <p class="feedsize"><b>您常用的电子邮箱是？（请填写）</b></p>
        <p style="color:#666; text-indent:1em;"><b class="blue">★</b>请尽量填写，以便我们尽快回复您！</p>
        <input type="text" placeholder="如：@163.com" id="feedback-input" />
        <p class="feedsize"><b>验证码</b></p>
        <input type="text" name="captcha" id="feedback-Captcha" maxlength="4" onclick="">
        <span name="feedback_captcha" id="feedback_captcha">
				<img title="看不清？点击更换" style="cursor: pointer;" src="<?php echo RES;?>/img/www/index1/captcha.png" id="yanzhen" width="60" height="20" border="1">
	    </span>
        <br />
        <input type="button"  class="feed-btn" value="" onclick="feedbackSubmit(); return false;" />
    </form>
</div>
<div class="footer">
    <div class="footer-content clearfix">
        <div class="foot-menu">
            <p>
                <a href="<?php echo C('site_url');?>" target="_blank">奈斯首页</a>&nbsp;|&nbsp;
                <a href="/site/reg1" target="_blank">申请入驻</a>&nbsp;|&nbsp;
                <a href="/site/proxy1" target="_blank">渠道代理</a>&nbsp;|&nbsp;
                <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank">接口定制</a>&nbsp;|&nbsp;
                <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank">微信托管</a>&nbsp;|&nbsp;
                <a href="/site/about1" target="_blank">关于奈斯</a>
            </p>
            <p>免费热线：4006305400&nbsp;&nbsp;&nbsp;QQ：4006305400&nbsp;&nbsp;&nbsp;邮箱：feedback@hsmob.com</p>
            <p>地址：
                上海市杨浦区政益路28号1106-1109室</p>
        </div>
        <div class="copyright">
            Copyright © 2011-2014 www.weimob.com. All Rights Reserved 上海晖硕信息科技有限公司版权所有 沪ICP备13021836号-1
        </div>
    </div>
</div>
<a class="feedbackbot" href="javascript:;" onclick= "$('#feedback, #feedback_cover').toggleClass('on');"></a>
<script>
    $(document).ready(function(){
        $("#yanzhen").click(function(){
            var img_src= '/site/captcha?f=feedback&v=';
            $(this).attr({"src":img_src + Math.random()*100000});
        });
    });
    function feedbackSubmit(){
        var $data = {
            feedback: $('#feedback-text').val(),
            email: $('#feedback-input').val(),
            captcha: $('#feedback-Captcha').val(),
            url: self.location.href
        };
        $.post('/site/feedback', $data, function(rs){
            alert(rs.error);
            if (200 == rs.code)
            {
                $('#feedback, #feedback_cover').toggleClass('on');
            }
        }, 'json');
    }
</script>
<!--公告信息-->
<div id="notice_mask"></div>
<div id="notice_message" style="position: absolute; left: 373.5px; top: 20%;">
    <div class="title">公 告<a onclick="javascript:jQuery('#notice_mask').show(),jQuery('#notice_message').hide();">×</a></div>
    <div class="content">
			<pre style="white-space:pre-wrap;"><p class="MsoNormal">
                尊敬的奈斯用户：
            </p>
<p class="MsoNormal" style="text-indent:21pt;">
    您还在为绑定公众帐号时在微信公众帐号后台与奈斯帐号后台切换而烦恼么？还在为公众号原始ID是什么而无从下手么？又或者担心微信公众后台添加服务器配置出现错误？或者不知道将应用ID及密钥填写在何处？
</p>
<p class="MsoNormal">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 现在，奈斯告诉您，这些都不会再困扰您啦！微信公众帐号智能绑定，将帮您解决上面所有问题。您只需输入微信公众平台帐号及密码，奈斯将自动帮您完成奈斯平台与微信公众平台的数据对接。微信公众平台帐号及密码我们将仅用于智能绑定，不保存！不泄漏！如果您不放心，依旧可以选择手动绑定。
</p>
<p class="MsoNormal">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 绑定完成，您仅需按照提示使用个人帐号向您的公众帐号发送一条文本消息“验证”，如收到“绑定成功， 盟妹来了”问题提示，则表明您已成功完成智能绑定。
</p>
<p class="MsoNormal">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公众帐号智能绑定，奈斯将带您走进商机无限的“微”世界，与您共创“微”未来！
</p>
<p class="MsoNormal">
    <img src="http://img.weimob.com/static/7f/6f/fa/image/20140124/20140124164904_75320.png" width="749" height="300" alt="" />
</p>
<p class="MsoNormal">
    <br />
</p>
<p class="MsoNormal">
    <br />
</p>
<p class="MsoNormal">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;盟妹
</p>
<p>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 2014-1-24
</p>
<p>
    <br />
</p>
<p>
    关注盟妹，惊喜每一天！
</p>
<p>
    盟妹作为奈斯官方个人微信号（微信号：weimob001），她将主要为所有伙伴实时播报奈斯最新上线产品、产品的使用方法及常见问题（包括问题的在线解答）以及各类行业资讯信息。赶快关注盟妹妹吧，惊喜天天等着你！
</p>
<p>
    &nbsp;<img src="http://img.weimob.com/static/7f/6f/fa/image/20140124/20140124170121_48249.jpg" width="250" height="348" alt="" />
</p>
<p>
    <img class="     mail_scale_image" id="mail_scale_image_4294982212_0" src="file://C:/Users/yjsong/AppData/Roaming/Foxmail7/Temp-5848/Catch5D42(01-24-17-00-28).jpg" />
</p>
<div>
    <br />
</div></pre>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#notice_mask').click(function(){
            $('#notice_mask').hide();
            $('#notice_qrcode').hide();
            $('#notice_message').hide();
        });

        $(window).resize(function(){
            $('#notice_qrcode').css({
                position:'absolute',
                left: ($(window).width() - $('#notice_qrcode').outerWidth())/2,
                top: ($(window).height() - $('#notice_qrcode').outerHeight())/2
            });

            $('#notice_message').css({
                position:'absolute',
                left: ($(window).width() - $('#notice_message').outerWidth())/2,
                top: ($(window).height() - $('#notice_message').outerHeight())/2
            });
        });
    });
</script>
</body>
</html>