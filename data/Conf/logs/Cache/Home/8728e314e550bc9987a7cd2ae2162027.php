<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="uyan_auth" content="04a3f6938d" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
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
                    <a href="npHome/Index/fc.act" >功能介绍</a>
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
        alert('doLogin');
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

<div class="Public-content clearfix">
	<div class="Public">
		<h1 class="Public-h1">功能介绍</h1>
		<div class="Public-box clearfix">
			<ul id="nav_lis" class="case-nav left">
				<li data-index="0"  data-hash="#site">微官网</li>
				<li data-index="1" data-hash="#member">微会员</li>
				<li data-index="2" data-hash="#activities">微活动</li>
				<li data-index="3" data-hash="#push">微推送</li>
				<li data-index="4" data-hash="#services">微服务</li>
				<li data-index="5" data-hash="#message">微留言</li>
				<li data-index="6" data-hash="#photo">微相册</li>
				<li data-index="7" data-hash="#menu">自定义菜单</li>
				<li data-index="8" data-hash="#research">微调研</li>
				<li data-index="9" data-hash="#estate">微房产</li>
				<li data-index="10" data-hash="#car">微汽车</li>
				<li data-index="11" data-hash="#wedd">微喜帖</li>
				<li data-index="12" data-hash="#medical">微医疗</li>
				<li data-index="13" data-hash="#hotels">微酒店</li>
				<li data-index="14" data-hash="#lbs">LBS图文回复</li>
                <li data-index="15" data-hash="#cate">微餐饮</li>
				<li data-index="16" data-hash="#vshop">微商城</li>
                <li data-index="17" data-hash="#reser">微预约</li>
                <li data-index="18" data-hash="#vlife">微生活</li>
                <li data-index="19" data-hash="#vkefu"><span style=" left:3px; position:absolute; "><ins style=" text-decoration:none;color:#4343fd;font-size:11px;">N</ins><ins style="color:#6d7183;font-size:8px;text-decoration:none;">EW</ins></span>微客服</li>
                <li data-index="20" data-hash="#addup"><span style=" left:3px; position:absolute; "><ins style=" text-decoration:none;color:#4343fd;font-size:11px;">N</ins><ins style="color:#6d7183;font-size:8px;text-decoration:none;">EW</ins></span>数据魔方</li>
				<li data-index="21" data-hash="#vwall"><span style=" left:3px; position:absolute; "><ins style=" text-decoration:none;color:#4343fd;font-size:11px;">N</ins><ins style="color:#6d7183;font-size:8px;text-decoration:none;">EW</ins></span>微信墙</li>
                <li data-index="22" data-hash="#vwall"><span style=" left:3px; position:absolute; "><ins style=" text-decoration:none;color:#4343fd;font-size:11px;">N</ins><ins style="color:#6d7183;font-size:8px;text-decoration:none;">EW</ins></span>微拍</li>
				</ul>
			<div id="nav_uls">
				<div data-index="0" data-on class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微官网:快速帮用户打造超炫微信移动网站<a href="/site/help?help=6" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob1.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微盟全国首创微信3G网站，用户只要通过简单的设置，就能快速生成属于您自己的微信3G网站，并且有各种精美模板，可供选择，还有自定义模版，可以设计出自己的风格，让您的粉丝有种惊艳的感觉。在微盟官方微信号输入"首页"体验微信3G网站。</p>
					</div>
				</div>
				<div data-index="1" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微信会员卡:微时代会员卡，方便携带，永不挂失<a href="/site/help?help=5" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob2.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微信会员卡通过在微信内植入会员卡，基于全国4亿微信用户，帮助企业建立集品牌推广、会员管理、营销活动、统计报表于一体的微信会员管理平台。清晰记录企业用户的消费行为并进行数据分析；还可根据用户特征进行精细分类，从而实现各种模式的精准营销。</p>
					</div>
				</div>
				<div data-index="2" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微活动——优惠券+刮刮卡+大转盘+微投票+一战到底的会员再营销<a href="/site/help?help=3" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p  class="guideimg"><img src="static/img/www/index1/weimob3.jpg?v=2014-01-24-6" /></p>
						<p  class="guidep">我们将利用微信的强交互性，让您通过对互动流程、环节和方式的设计，运用各种设计活动从而实现与用户的互动交流,，微整合系统互动符合微信娱乐性强的产品本质，微盟内置了专为商家定制的“商家营销服务模块”，包括优惠券推广模块、幸运大转盘推广模块、刮刮卡抽奖模块、微投票、一战到底等功能模块，商家通过发起营销活动，对已有客户进行再营销，通过不断更新补充主题，用户可以反复参与，并可带动周边朋友一起分享，从而形成极强的口碑营销效果。</p>
					</div>
				</div>
				<div data-index="3" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微推送（LSP）：微信附近的人——精准营销</h2>
						<p  class="guideimg"><img src="static/img/www/index1/weimob4.jpg?v=2014-01-24-6" /></p>
						<p  class="guidep">Location Surround Push(基于附近的人的消息推送)微信中基于LBS(基于位置的服务)的功能插件“查看附近的人”便可以使更多陌生人看到这种强制性广告。 用户点击“查看附近的人”后，可以根据自己的地理位置查找到周围的微信用户。在这些附近的微信用户中，除了显示用户姓名等基本信息外，还会显示用户签名档的内容。所以用户可以利用这个免费的广告位为自己的产品打广告。
							营销人员在人流最旺盛的地方后台24小时运行微信，如果“查看附近的人”使用者足够多，这个广告效果也会不断随着微信用户数量的上升，可能这个简单的签名栏也会变成会移动的“黄金广告位”。</p>
					</div>
				</div>
				<div data-index="4" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微服务——微信企业应用与电子商务<a href="/site/help?help=4" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob5.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">有小黄鸡陪聊加强版510万数据，过滤了广告和一些敏感词汇。 还有天气查询 ，手机查询，邮编查询，快递查询（支持160家快递公司），身份证查询，人品计算，翻译，字典，百科（全网数据），音乐80.1万 ，笑话5万条，小黄鸡陪聊510万条，诗词23万首，诗句 225万，成语5万，谜语5万，解梦3万，糗事55万，公交线路4万，火车线路4500，机器人学习功能等等......</p>
					</div>
				</div>
				<div data-index="5" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微留言:用户的互动交流利器</h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob6.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">“微留言”是一种能为商家带来巨大的社会化流量的功能，允许留言可以被分享于留言者的朋友圈、腾讯微博和发送给好友，这意味着留言可以被无数的粉丝分享，用户对商家进行实时且客观的评价，真实的社交环境保证了留言的客观性和有效性。“微留言”的使用商家只需做好产品和用户服务即可，随着口碑的传播，消费者将源源不断。</p>
					</div>
				</div>
				<div data-index="6" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微相册:照片展现，让商品一览无余</h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob7.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微相册作为微盟平台的一项主打基本功能，为微盟用户提供图片的存储和展示服务，是基于图片兴趣分享的社区型产品。在微相册里，您可以方便的创建相册，轻松地发布您需要展示的照片，还可以拓展为商家开展活动的一种展现方式。</p>
					</div>
				</div>
				<div data-index="7" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">自定义菜单：各模块均可直接展现使用，随需求而定，随需要而链</h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob8.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微盟提供微信公众号自定义菜单管理功能，用户无需再通过输入关键词触发回复，直接点击菜单就可以看相关的内容，微盟可与企业原有Wap进行打通，复用企业APP原有功能，同时可定制个性化功能、使用HTML5新技术进行无限拓展，帮助企业打造最便捷、易推广的微信内置APP，此功能如果结合微信3G网站可以使您的公众号用户体验更好，带给粉丝不一样的感受。</p>
					</div>
				</div>
				<div data-index="8" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微调研：实时统计，为市场调研添加一份有力数据</h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob9.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微调研是一种以问卷调查的方式，基于微盟平台而展现出的一种新的在线调研应用方式，微调研已经完成调研项目数十个，涉及游戏、快速消费品、汽车、房产、美食、数码产品、家用电器等多个行业，具备有对微信用户进行生活形态研究的能力，受到行业客户的一致认可。</p>
					</div>
				</div>
				
				<div data-index="9" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微房产:360度全景看房<a href="/site/help?help=9" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob11.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微房产是利用微盟平台打造的一款全新超炫酷的房产官方网站，其功能非常强大，包含了楼盘介绍、子楼盘管理、户型介绍及户型图、楼盘相册、房友印象以及专家点评等功能，更有360度全景看房超强大功能震撼登场！花几分钟时间即可打造微房产官网。</p>
					</div>
				</div>
				<div data-index="10" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微汽车：预约试驾、预约保养、360度看车、车主关怀应有尽有！<a href="/site/help?help=8" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob12.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微汽车采用微盟平台进行汽车的销售管理、预约保养、预约试驾、保险计算、车贷计算、车型比较、违章查询、360度全景看车、车主关怀等功能，整个过程非常便捷，省时省力省心，并通过与微盟平台有交互能力的手机客户端，快速便捷的实现了商家的销售管理与预约过程，同时也实现了客户无需进入4s店就能进行预约保养和试驾的功能。</p>
					</div>
				</div>
				<div data-index="11" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微喜帖：颠覆传统方式，让庆典更时尚环保</h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob13.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微喜帖是针对结婚庆典而推出的一款行业产品，主要是为计划结婚的用户们，通过使用微喜帖应用来向亲朋好友传播自己即将结婚的动态，可以展现用户想要表达的话、结婚日期、地址、导航、接待电话，同时亲朋好友可以在微喜帖平台上提交赴宴通知、送上祝福，并且转发喜帖。</p>
					</div>
				</div>
				<div data-index="12" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微医疗：互联网时代的医疗小助手</h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob14.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">用户可通过微盟平台实现在线挂号、内容设置、预约查询、预约统计的一整套服务体系，能够有效解决患者挂号难、排队累、就医不方便等一系列难题</p>
					</div>
				</div>
				<div data-index="13" class="weimob_guide right">
					<div class="wm_case_list">
						<h2  class="guideh2">微酒店：一键点击，轻松订房<a href="/site/help?help=7" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob15.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">1、消息管理：包含自动消息回复和功能性消息编辑功能，优化对用户的消息服务，提升用户体验。</p>
						<p class="guidep">2、门店管理：即对门店详情页面显示内容进行管理，且用户可直接一键导航或一键拨号。</p>
						<p class="guidep">3、用户管理：用户信息管理模块，给每个用户打上各种标签，为精准营销提供服务。</p>
						<p class="guidep">4、数据统计：各式各样的数据为后期运营提供重要帮助。</p>
						<p class="guidep">5、提供服务：用户直接可在公众账号进行预约房间、预约餐厅等操作。</p>
					</div>
				</div>
                <div data-index="14" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">LBS回复:LBS范围内精准的商家地理位置回复</h2>
							<p class="guideimg"><img src="static/img/www/index1/weimob16.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">LBS图文回复是由商家设置店铺位置，用户提交当前所在位置后，可以找到最近的商家店铺，并进行一键导航、一键拨号，如果店铺当前有进行的活动（如：优惠券、刮刮卡），也可把活动显示出来。</p>
					</div>
				</div>
				<div data-index="15" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微餐饮——实时数据统计，监控运营效果<a href="/site/help?help=11" target="_blank" class="guideright ">查看该项使用指南</a></h2>
					
                        <p class="guideimg"><img src="static/img/www/index1/weimob17.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</p>
					</div>
				</div>
				<div data-index="16" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微商城：打造微信移动电商 <a href="/site/vshop" target="_blank" class="guideright-topic">查看专题</a> <a href="/site/help?help=12" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						
                        <p class="guideimg"><img src="static/img/www/index1/weimob18.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">“微商城”（又名Vshop）是由上海晖硕信息科技有限公司推出的，一款基于移动互联网的商城应用服务产品，以时下最热门的互动应用微信为媒介，配合微信5.0微信支付功能，实现商家与客户的在线互动，即时推送最新商品信息给微信用户，实现微信在线的购物功能。
							其主要功能包括：支持商品管理、支持会员管理、支持购物车、支持商品分类管理、支持订单管理、支持店铺设置、支持支付方式管理、支持配送方式管理。</p>
					</div>
				</div>
				
                <div data-index="17" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微预约：在线预约，微盟帮您一键搞定<a href="/site/help?help=10" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob19.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">微预约是商家利用微盟平台实现在线预约的一种服务，可以运用于汽车、房产、酒店、医疗、餐饮等一系列行业，给用户的出行办事、购物、消费带来了极大的便利！且操作简单，响应速度非常快，受到业界的一致好评！</p>
					</div>
				</div>
                <div data-index="18" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微生活：生活服务、方便快捷更高效  <a href="/site/help?help=13" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob20.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">随着微信等新媒介的兴起，生活方式正在发生“微”“秒”的变化，微生活是通过微盟平台打造的一款彻底专为用户提供全方位生活服务的移动网站，通过微生活服务，用户可以时时刻刻享受在线购物、点餐、定机票、预约酒店等多项服务的功能，彻底改变了用户传统的生活模式。<br />
                        1、商户管理：微生活支持商户管理功能，其中包括商户的基础设置、商户信息设置、会员设置、优惠设置以及商品的展示功能，让用户通过微盟平台可以浏览整个商圈。<br />
                        2、会员管理：用户通过在手机端领取会员卡，商家就可以在微盟后台查询到用户的会员记录，包括会员卡号、用户姓名、手机号、领取卡的时间、所属用户以及会员卡的状态设置，让用户资源随手可得。
</p>
					</div>
				</div>
                
                <div data-index="19" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微客服：沟通6亿用户、创造无限商机<a href="/site/kefu" target="_blank" class="guideright-topic">查看专题</a><a href="/site/help?help=14" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob21.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">随着互联网的发展及网络营销模式重要性的凸显，在线客服系统 会成为网络营销的重要工具，也是提示企业形象、加强企业与访 客互动的必备工具；如今，微信迅速崛起，商家都把店铺搬进了 公众账号，而微盟微客服系统，就是一款为微信商家打造的实时 沟通软件，让商家可以分享微信6亿用户，创造无限商机。</p>
					</div>
				</div>
                
                <div data-index="20" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">数据魔方，轻松了解买家，不错过任何一个客户<a href="/site/datacube" target="_blank" class="guideright-topic">查看专题</a><a href="/site/help?help=15" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob22.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">通过数据魔方，商家可轻松了解买家，诊断微网信息，不错过任何一个潜在客户。数据魔方将包括：用户分析、图文内容分析、渠道分析、关键词分析等功能。</p>
					</div>
				</div>

				<div data-index="21" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微信墙——活跃现场气氛！<a href="/site/wallcame" target="_blank" class="guideright-topic">查看专题</a><a href="/site/help?help=16" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob23.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">现场用户关注活动主办方微信公众账号，发送文字、表情、图片消息就可上墙展示，迅速提升现场热度，让大家互动起来。</p>
					</div>
				</div>
                
                	<div data-index="22" class="weimob_guide right">
					<div class="wm_case_list">
						<h2 class="guideh2">微拍，让顾客在体验中感受企业魅力<a href="/site/weipai" target="_blank" class="guideright-topic">查看专题</a><a href="/site/help?help=17" target="_blank" class="guideright ">查看该项使用指南</a></h2>
						<p class="guideimg"><img src="static/img/www/index1/weimob24.jpg?v=2014-01-24-6" /></p>
						<p class="guidep">通过“微拍”产品将可轻松的打印时尚美照、给微信加粉、对企业进行品牌推广，让顾客在体验中感受企业魅力！同时，购微拍产品，还可尊享微官网等一系列功能，让企业营销线上线下完美结合！。</p>
					</div>
				</div>

                
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