<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="uyan_auth" content="04a3f6938d" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="奈斯、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
    <meta content="奈斯，国内最大的微信公众智能服务平台，奈斯八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
<script src="<?php echo RES;?>/src/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/www/index1/index.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/project.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/carouFredSel.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/weimob-index.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/region_select.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/omvalidate.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap.js"></script>
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
                    <a href="/npHome/Index/case.act" >经典案例</a>
                </li>
                <li>
                    <a href="/npHome/Index/proxy.act" >渠道代理</a>
                </li>
                <li>
                    <a href="/npHome/Index/fc.act" >功能介绍</a>
                </li>
                <li>
                    <a href="javascript:;" class="hover navtwo" onclick="loginBox.toggle(this, event);">登录</a>
                </li>
                <li>
                    <a href="/npHome/Index/reg.act" class="navtwo" target="_black">注册</a>
                </li>
                <li>
                    <a href="javascript:;"  class="navtwo" target="_black">帮助</a>
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
                {__TOKEN__}
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
            __hash__:$("input[name='__hash__']").val()
        };
        $.post('/npHome/Users/checklogin.act', $login_data, function(rs){
            if(rs.errno == 200)
            {
                $('#err_tips').text(rs.error);
                $('#err_area').show();
                location.href = rs.url_route;
            }
            else
            {
                $('#err_tips').text(rs.error);
                $('#err_area').show();
                $('#login_button').text($pre_submit);
            }
            $do_submit = true;
        }, 'json');
    }
</script>
<script>
    if(top!=self) if(self!=top) top.location=self.location;
</script>

<div class="Public-content clearfix">
	<div class="Public">
		<h1 class="Public-h1">注册</h1>
		<div class="Public-box clearfix">
			<div class="reg-wrapper2">
				<form id="regform" class="form-horizontal" method="post" action="/npHome/Users/checkreg.act">
					<div class="control-group">
						<label class="control-label" for="username">用户名</label>
						<div class="controls" >
							<input type="text" name="username" id="username">
							<span class="maroon">*</span><span class="help-inline">长度为6~16位字符，可以为“数字/字母/中划线/下划线”组成</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">设置密码</label>
						<div class="controls">
							<input type="password" name="password" id="password">
							<span class="maroon">*</span><span class="help-inline">长度为6~16位字符</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="repassword">确认密码</label>
						<div class="controls">
							<input type="password" name="repassword" id="repassword" >
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="location_p">详细地址</label>
						<div class="controls">
							<select name="location_p" id="location_p"></select>
							<select name="location_c" id="location_c"></select>
							<select name="location_a" id="location_a"></select>
							<script type="text/javascript">
								new PCAS('location_p', 'location_c', 'location_a', '', '', '');
							</script>
						</div>
					</div>
					<div class="control-group" style="display:none;">
						<label class="control-label" for="address"></label>
						<div class="controls">
							<input type="text" class="input-xlarge" name="address" id="address" data-rule-required="true" value="" style="width:426px;" />
							<span class="maroon">*</span><span class="help-inline">详细地址：xx路xx号</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="mobile">手机</label>
						<div class="controls">
							<input type="text" name="mobile" id="mobile">
							<span class="maroon">*</span><span class="help-inline">请输入正确的手机号码</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="email">邮箱</label>
						<div class="controls">
							<input type="text" name="email" id="email">
							<span class="maroon">*</span><span class="help-inline">邮箱将与支付及优惠相关，请填写正确的邮箱</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="qq">QQ</label>
						<div class="controls">
							<input type="text" name="qq" id="qq" >
						</div>
					</div>
					<div class="control-group" style="display: none;">
						<label class="control-label" for="invite_code">邀请码</label>
						<div class="controls">
							<input type="text" name="invite_code" readonly id="invite_code" value="48e4e74db53195615096c5d2c6f12d3f" >
							<span class="maroon">*</span><span class="help-inline">请输入32位邀请码</span><span class="help-inline"><a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" style="color:#54c11a;" target="_blank">如果没有邀请码，联系客服</a></span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="randcode">验证码</label>
						<div class="controls">
							<input type="text" name="captcha" id="captcha" maxlength="4" >
							<span class="maroon">*</span>
		      <span name="show_captcha" id="show_captcha" >
				<img title="看不清？点击更换" style="cursor: pointer;" src="/npHome/Users/verify.act" id="imgCheckB" width="60" height="20" border="1">
	      	  </span>
                            <script type="text/javascript">
                                function refresh() {
                                    var randomRZ = Math.random();
                                    $("#imgCheckB").attr("src", "/npHome/Users/verify.act?rz=" + randomRZ);
                                }
                            </script>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="reg-btn" class="btn-register" style="display:none;"></button>
							<button type="button" class="btn-register" ></button>
						</div>
					</div>
				</form>
			</div>
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