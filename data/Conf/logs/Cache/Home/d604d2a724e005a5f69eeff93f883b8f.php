<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>功能介绍－奈斯伙伴 微信帮手 微信公众账号</title>
<meta name="keywords" content="Nice 奈斯伙伴 微信帮手 微信公众账号 微信公众平台 微信公众账号开发 微信二次开发 微信接口开发 微信托管服务 微信营销 微信公众平台接口开发"/>
<meta name="description" content="微信公众平台接口开发、托管、营销活动、二次开发"/>
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
                    <a href="/npHome/Index/case.act" >经典案例</a>
                </li>
                <li>
                    <a href="/npHome/Index/proxy.act" >渠道代理</a>
                </li>
                <li>
                    <a href="/npHome/Index/fc.act" >功能介绍</a>
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
<div class="main">
   <div class="pos"> 当前位置&raquo;<a href="<?php echo C('site_url');?> "><?php echo C('site_name');?></a> &raquo; <a href="">帮助中心</a></div>
<style type="text/css">
.normalTitle {
    border-bottom: 1px solid #D7DDE6;
    border-radius: 10px 10px 0 0;
    padding: 20px;
    text-shadow: 0 1px 1px #FFFFFF;
}
.normalTitle h2, .panelTitle h2, .processTitle h2 {
    font-size: 20px;
    font-weight: bold;
}
.content {
 margin: 0 auto;
    text-align: left;
    width: 707px;
}
.article, .intro, .download, .document, .developer {
margin:40px 0px;

background:#f5f6f7;
box-shadow:0px 1px 3px #ccc;
}
.section {
padding:0 0 20px 0;
margin:0 0 20px 0;
border-bottom:1px solid #eee;
overflow: hidden;
}
.lastSection {
border:none;
margin-bottom:0px;
}
.normalTitle {
border-bottom:1px solid #d7dde6;
border-radius:10px 10px 0 0;
padding:20px 40px;
text-shadow:0 1px 1px #fff;
}
.normalContent {
background:#fff;/*border-radius:0 0 10px 10px;*/
padding:40px;
}
.normalTitle h2, .panelTitle h2, .processTitle h2 {
font-size:20px;
font-weight:bold;
}
.green{ color:#090}
.red{ color: #F00}
.collapsible {
    background: none repeat scroll 0 0 #FFFFFF;
    padding: 20px;
}
.CollapsiblePanel {
    margin-bottom: 10px;
    width: 870px;
}
.CollapsiblePanelTab {
    background: url(style/images/img/arrow_unclick.png) no-repeat scroll 820px 20px #FFFFFF;
    border: 1px solid #DEDEDE;
    border-radius: 3px 3px 3px 3px;
    color: #626B8A;
    cursor: pointer;
    font-size: 18px;
    padding: 20px 40px 20px 20px;
    text-shadow: 0 1px 0 white;
}
.CollapsiblePanelTab.hover {
    background: url(style/images/img/arrow_unclick.png) no-repeat scroll 820px 20px #D7DDE6;
border: 1px solid #C1C9D4;
}
.CollapsiblePanelTab.clicked {
    background: url(style/images/img/arrow_click.png) no-repeat scroll 820px 20px #D7DDE6;
border: 1px solid #C1C9D4;
}
.CollapsiblePanelContent {
    display: none;
    overflow: hidden;
}
.CollapsiblePanelContent .normalContent {
    padding: 20px 20px 0;
}
</style>
<div class="content" style="width:985px;">
<div class="document" style="margin-top:0px;">
            <div class="normalTitle"><h2>如何为微信公众号配置接口？</h2></div>
                <div class="collapsible">
<div class="section lastSection">
<p>请务必认真阅读以下2步内容，才能更有效的完成配置工作，有疑问的请联系QQ：<?php echo C('site_qq');?>提问。<br/><?php if($_GET['token'] != ''): ?>你的接口URL是：<font color="red"><?php echo C('site_url');?>/index.php/api/<?php echo $_GET['token']; ?></font><br>您的token是：<font color="red"><?php echo $_GET['token']; ?></font><?php endif; ?></p>
</div>
                <div id="CollapsiblePanel2" class="CollapsiblePanel">
                    <div class="CollapsiblePanelTab clicked">第一步、在<?php echo C('site_name');?>绑定你的微信公众号。<span></span></div>
                    <div style="" class="">
                        <div class="articleContent catalogHome normalContent">
                            <div class="section lastSection">
                                <p>1、注册并登录<a href="<?php echo U('Index/login');?>"><?php echo C('site_name');?>接口平台</a></p>
                                <p>2、添加公众号 → 功能管理 → 勾选要开启的功能</p>									
								<p><img src="<?php echo STATICS;?>/help/help01.jpg" width="790px"></p>
								<p><img src="<?php echo STATICS;?>/help/help0.jpg" width="790px"></p>
                            </div>
                        </div>
                    </div>                        
                </div>
<div id="CollapsiblePanel3" class="CollapsiblePanel">
                        <div class="CollapsiblePanelTab clicked">第二步、到微信公众平台设置接口。<span></span></div>
                        <div style="" class="">
                            <div class="articleContent catalogHome normalContent">
                                <div class="section lastSection">
                                   <div class="section lastSection">
                                    <p>1、登录 <a href="http://mp.weixin.qq.com/">微信公众平台</a>（<a href="http://mp.weixin.qq.com/">http://mp.weixin.qq.com/</a>），进行身份认证，填写信息，提交身份证。</p>
                                    <p>认证后，点击高级功能 → 进入开发模式</p><br>
                                    <p><img src="<?php echo STATICS;?>/help/help002.jpg" width="790px"></p><br>
									<p>2、点击"成为开发者"按钮</p>
									<p><img src="<?php echo STATICS;?>/help/help003.jpg" width="790px"></p><br>
									<p>3、填写接口配置信息</p>
									<?php if($_GET['token'] == ''): ?><p>比如你<?php echo C('site_name');?>平台上的地址是<?php echo C('site_url');?>/index.php/api/demo</p>
									<p>那么URL就是<?php echo C('site_url');?>/INDEX.PHP/api/demo</p>
									<?php else: ?>
									<p>你的URL是 <font color="red"><?php echo C('site_url');?>/index.php/api/<?php echo $_GET['token']; ?></font></p><?php endif; ?>
									<p>Token填写 <font color="red"><?php echo $_GET['token']; ?></font></p>
									<p><img src="<?php echo STATICS;?>/help/help004.jpg" width="790px"></p><br>
									<p>4、确认开启</p>
									<p>5、在手机上用微信给你的公众号输入"帮助"，测试你的接口是否配置正常！</p><br>									
                                </div>
                              
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
    </div>
<!--结束-->
</div>
<script type="text/javascript">try{Dd('webpage_7').className='left_menu_on';}catch(e){}</script>
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