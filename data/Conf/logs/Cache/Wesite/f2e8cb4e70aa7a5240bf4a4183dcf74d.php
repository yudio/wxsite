<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<title>奈斯伙伴—国内最大的微信公众智能服务平台</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
        <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
        <!-- Mobile Devices Support @begin -->
            <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
            <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
            <meta content="no-cache" http-equiv="pragma">
            <meta content="0" http-equiv="expires">
            <meta content="telephone=no, address=no" name="format-detection">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
            <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <!-- Mobile Devices Support @end -->

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/reset.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/common.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/peak-3.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/home-menu-4.css" media="all" />
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
        <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
        <style>
            img{max-width:100%!important;}
        </style>
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/wm-xin-a/font-awesome.css" media="all" />

<div class="body" style="padding-bottom:60px;">
						<article id="shareCover" class="toshare" onclick="$('#shareCover').toggleClass('on')">
		<table>
			<tr>
				<td colspan="2"  style="text-align:right;">
					<img src="<?php echo RES;?>/img/share_1.png" style="width:120px!important;" />
					<img src="<?php echo RES;?>/img/share_2.png" style="width:30px!important;" />
				</td>
			</tr>
			<tr>
				<td style="width:50%;">
					<img src="<?php echo RES;?>/img/share_4.png" />
					<div>发送给朋友</div>
				</td>
				<td>
					<img src="<?php echo RES;?>/img/share_3.png" />
					<div>分享到朋友圈</div>
				</td>
			</tr>
		</table>
	</article>
	<script>
		window.addEventListener("DOMContentLoaded", function(){
			var nav = document.querySelectorAll(".nav_8")[0];

			var evts = {
				handleEvent: function(evt){
					if("A" == evt.target.nodeName){
						evt.target.classList.toggle("active");
					}
				}
			}
			nav.addEventListener("mousedown", evts, false);
			nav.addEventListener("mouseup", evts, false);
			nav.addEventListener("touchstart", evts, false);
			nav.addEventListener("touchend", evts, false);
		});
	</script>
	<div class="top_bar footer_bar">
			<section>
					<div class="nav_8">
						<ul class="box">
							<li>
								<a href="javascript:history.go(-1);">
									<p class="back2"></p>
									<span>返回</span>
								</a>
							</li>
															<li>
								<a href="tel:0591-87570191">
									<p class="tel"></p>
									<span>联系电话</span>
								</a>
							</li>
																						<li>
								<a href="http://j.map.baidu.com/uL4XT">
									<p class="addr"></p>
									<span>地址导航</span>
								</a>
							</li>
														<li>
								<a href="/weisite/home?pid=1071&bid=5&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&wxref=mp.weixin.qq.com">
									<p class="home"></p>
									<span>首页</span>
								</a>
							</li>
							<li>
								<a href="javascript:$('#shareCover').toggleClass('on');">
									<p class="share"></p>
									<span>分享</span>
								</a>
							</li>
						</ul>
					</div>
			</section>
		</div>

<!--
分享前控制
-->
	<script>
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			window.shareData = {
				"imgUrl": "<?php echo RES;?>/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828151354_22096.jpg",
				"timeLineLink": "/weisite/detail?pid=1071&bid=5&did=1596&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
				"sendFriendLink": "/weisite/detail?pid=1071&bid=5&did=1596&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
				"weiboLink": "/weisite/detail?pid=1071&bid=5&did=1596&wechatid=fromUsername&from=list&wxref=mp.weixin.qq.com",
				"tTitle": "奈斯伙伴—国内最大的微信公众智能服务平台",
				"tContent": "<p style="color:#000000;text-indent:0px;" align="left">
	<span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;微盟是一个专门针对微信公众账号提供营销推广服务的第三方平台。主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。</span>
</p>
<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823205408_83803.jpg" /><span style="color:#000000;">&nbsp;</span>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 微盟平台主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	<strong><span style="color:#009900;font-size:16px;">微盟八大“微体系”</span></strong>
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 奈斯伙伴，国内最大的微营销联盟，八大微体系为企业微信营销保驾护驾。微官网，微会员、微活动、微服务、微预约、微团购、微商城、微支付，企业微信营销必备。
</p>
<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="">
<p align="left">
	<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823210206_62530.jpg" />
</p>
<strong>
<p align="left">
	<br />
</p>
<p align="left">
	自定义菜单——打造最便捷的微信内置APP
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164133_80419.jpg" alt="" />
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微盟提供微信公众号自定义菜单管理功能用户无需再通过输入关键词触发回复，直接点击菜单就可以看相关的内容，微盟可与企业原有Wap进行打通，复用企业APP原有功能，同时可定制个性化功能、使用HTML5新技术进行无限拓展，帮助企业打造最便捷、易推广的微信内置APP，此功能如果结合微信3G网站可以使您的公众号用户体验更好，带给粉丝不一样的感受。</span><span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><br />
</span>
</p>
</strong><strong>
<p align="left">
	<span style="color:#E56600;">微官网——五分钟打造超炫微信3G网站</span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<div>
	<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?=""><strong>
	<p>
		<span style="font-weight:normal;line-height:1.5;color:#000000;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164520_59074.jpg" alt="" /></span><strong></strong>
	</p>
</strong></span>
</div>
</strong></span>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp; 微官网是指将企业信息、服务、活动等内容通过微信网页的方式进行表现，用户只要通过简单的设置，就能快速生成属于您自己的微信3G网站，并且有各种精美模板，供您选择，还有自定义模版，可以设计出自己的风格，不但提高了信息量，也使信息的展现更加赏心悦目，进一步提高用户体验。</span></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong>
</p>
<strong>
<p align="left">
	<strong></strong>
</p>
<div>
	<span arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="" style="color: rgb(229, 102, 0);"><strong>
	<div>
		<strong>
		<p align="left">
			微会员——移动时代的社会化会员管理平台
		</p>
</strong>
	</div>
</strong></span>
</div>
</strong>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164617_57398.jpg" alt="" /><strong></strong>
</p>
<p>
	<strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"></span></strong></strong>
</p>
<div>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微信会员卡通过在微信内植入会员卡，基于全国4亿微信用户，帮助企业建立集品牌推广、会员管理、营销活动、统计报表于一体的微信会员管理平台。清晰记录企业用户的消费行为并进行数据分析；还可根据用户特征进行精细分类，从而实现各种模式的精准营销。</span></strong></strong></strong></strong>
</div>
<p>
	<br />
</p>
<p align="left">
	<span style="line-height:1.5;color:#E56600;"><strong>微活动——优惠券+刮刮卡+大转盘+微投票</strong></span><span style="line-height:1.5;color:#E56600;"><strong>+一战到底的会员再营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164816_52592.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>我们将利用微信的强交互性，让您通过对互动流程环节和方式的设计，运用各种设计活动从而实现与用户的互动交流,，微整合系统互动符合微信娱乐性强的产品本质，微盟内置了专为商家定制的“商家营销服务模块”，包括优惠券推广模块、幸运大转盘推广模块、刮刮卡抽奖模块、微投票、一战到底等功能模块，商家通过发起营销活动，对已有客户进行再营销，通过不断更新补充主题，用户可以反复参与，并可带动周边朋友一起分享，从而形成极强的口碑营销效果。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微商城——打造微信在线购物平台</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165002_28752.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微商城是国内首款基于移动互联网的商城应用服务产品以时下最热门的互动应用微信为媒介，配合微信5.0微信支付功能，实现商家与客户的在线互动，即时推送最新商品信息给微信用户，可以为每一个公众号建立品牌微信商城，实现商城的在线支付功能，并且对商城参与人数，交易量进行跟踪。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微推送（LSP）：微信附近的人——精准营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165121_87309.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>Location Surround Push(基于附近的人的消息推送)微信中基于LBS(基于位置的服务)的功能插件“查看附近的人”便可以使更多陌生人看到这种强制性广告。 用户点击“查看附近的人”后，可以根据自己的地理位置查找到周围的微信用户。在这些附近的微信用户中，除了显示用户姓名等基本信息外，还会显示用户签名档的内容。所以用户可以利用这个免费的广告位为自己的产品打广告。营销人员在人流最旺盛的地方后台24小时运行微信，如果“查看附近的人”使用者足够多，这个广告效果也会不断随着微信用户数量的上升，可能这个简单的签名栏也会变成会移动的“黄金广告位”。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<span style="color:#E56600;"><strong>微服务——微信企业应用与电子商务</strong></span>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165258_28008.jpg" alt="" />
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>有小黄鸡陪聊加强版510万数据，过滤了广告和一些感词汇。 还有天气查询 ，手机查询，邮编查询，快递询（支持160家快递公司），身份证查询，人品计算，译字典，百科（全网数据），音乐80.1万 ，笑话5万条小黄鸡陪聊510万条，诗词23万首，诗句 225万，成语万谜语5万，解梦3万，糗事55万，公交线路4万，火车线路4500，机器人学习功能等等......</span></strong></strong></strong></strong>
</p>
<p>
	<strong><span style="color:#333333;font-size:16px;"></span></strong>&nbsp;
</p>
<p>
	<strong><span style="color:#E56600;">数据魔方——实时数据统计，监控运营效果</span></strong>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165428_36554.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"></span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微客服——沟通6亿用户，创造无限商机</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165700_21898.jpg" alt="" /><br />
</span></strong></strong></strong></strong></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong></span></strong></strong></strong></strong>随着互联网的发展及网络营销模式重要性的凸显，在线客服系统 会成为网络营销的重要工具，也是提示企业形象、加强企业与访 客互动的必备工具；如今，微信迅速崛起，商家都把店铺搬进了 公众账号，而微盟微客服系统，就是一款为微信商家打造的实时 沟通软件，让商家可以分享微信6亿用户，创造无限商机。
</p>
<p>
	<br />
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微餐饮——实时数据统计，监控运营效果</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225170308_66043.jpg" alt="" /></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<span style="line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span>
</p>
<p>
	<span id="__kindeditor_bookmark_start_206__"></span>
</p>
<p>
	<br />
</p>
<img alt="" src="/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828151902_97516.jpg" />
<p>
	<br />
</p>",
				"fTitle": "奈斯伙伴—国内最大的微信公众智能服务平台",
				"fContent": "<p style="color:#000000;text-indent:0px;" align="left">
	<span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;微盟是一个专门针对微信公众账号提供营销推广服务的第三方平台。主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。</span>
</p>
<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823205408_83803.jpg" /><span style="color:#000000;">&nbsp;</span>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 微盟平台主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	<strong><span style="color:#009900;font-size:16px;">微盟八大“微体系”</span></strong>
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 奈斯伙伴，国内最大的微营销联盟，八大微体系为企业微信营销保驾护驾。微官网，微会员、微活动、微服务、微预约、微团购、微商城、微支付，企业微信营销必备。
</p>
<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="">
<p align="left">
	<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823210206_62530.jpg" />
</p>
<strong>
<p align="left">
	<br />
</p>
<p align="left">
	自定义菜单——打造最便捷的微信内置APP
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164133_80419.jpg" alt="" />
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微盟提供微信公众号自定义菜单管理功能用户无需再通过输入关键词触发回复，直接点击菜单就可以看相关的内容，微盟可与企业原有Wap进行打通，复用企业APP原有功能，同时可定制个性化功能、使用HTML5新技术进行无限拓展，帮助企业打造最便捷、易推广的微信内置APP，此功能如果结合微信3G网站可以使您的公众号用户体验更好，带给粉丝不一样的感受。</span><span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><br />
</span>
</p>
</strong><strong>
<p align="left">
	<span style="color:#E56600;">微官网——五分钟打造超炫微信3G网站</span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<div>
	<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?=""><strong>
	<p>
		<span style="font-weight:normal;line-height:1.5;color:#000000;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164520_59074.jpg" alt="" /></span><strong></strong>
	</p>
</strong></span>
</div>
</strong></span>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp; 微官网是指将企业信息、服务、活动等内容通过微信网页的方式进行表现，用户只要通过简单的设置，就能快速生成属于您自己的微信3G网站，并且有各种精美模板，供您选择，还有自定义模版，可以设计出自己的风格，不但提高了信息量，也使信息的展现更加赏心悦目，进一步提高用户体验。</span></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong>
</p>
<strong>
<p align="left">
	<strong></strong>
</p>
<div>
	<span arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="" style="color: rgb(229, 102, 0);"><strong>
	<div>
		<strong>
		<p align="left">
			微会员——移动时代的社会化会员管理平台
		</p>
</strong>
	</div>
</strong></span>
</div>
</strong>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164617_57398.jpg" alt="" /><strong></strong>
</p>
<p>
	<strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"></span></strong></strong>
</p>
<div>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微信会员卡通过在微信内植入会员卡，基于全国4亿微信用户，帮助企业建立集品牌推广、会员管理、营销活动、统计报表于一体的微信会员管理平台。清晰记录企业用户的消费行为并进行数据分析；还可根据用户特征进行精细分类，从而实现各种模式的精准营销。</span></strong></strong></strong></strong>
</div>
<p>
	<br />
</p>
<p align="left">
	<span style="line-height:1.5;color:#E56600;"><strong>微活动——优惠券+刮刮卡+大转盘+微投票</strong></span><span style="line-height:1.5;color:#E56600;"><strong>+一战到底的会员再营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164816_52592.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>我们将利用微信的强交互性，让您通过对互动流程环节和方式的设计，运用各种设计活动从而实现与用户的互动交流,，微整合系统互动符合微信娱乐性强的产品本质，微盟内置了专为商家定制的“商家营销服务模块”，包括优惠券推广模块、幸运大转盘推广模块、刮刮卡抽奖模块、微投票、一战到底等功能模块，商家通过发起营销活动，对已有客户进行再营销，通过不断更新补充主题，用户可以反复参与，并可带动周边朋友一起分享，从而形成极强的口碑营销效果。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微商城——打造微信在线购物平台</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165002_28752.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微商城是国内首款基于移动互联网的商城应用服务产品以时下最热门的互动应用微信为媒介，配合微信5.0微信支付功能，实现商家与客户的在线互动，即时推送最新商品信息给微信用户，可以为每一个公众号建立品牌微信商城，实现商城的在线支付功能，并且对商城参与人数，交易量进行跟踪。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微推送（LSP）：微信附近的人——精准营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165121_87309.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>Location Surround Push(基于附近的人的消息推送)微信中基于LBS(基于位置的服务)的功能插件“查看附近的人”便可以使更多陌生人看到这种强制性广告。 用户点击“查看附近的人”后，可以根据自己的地理位置查找到周围的微信用户。在这些附近的微信用户中，除了显示用户姓名等基本信息外，还会显示用户签名档的内容。所以用户可以利用这个免费的广告位为自己的产品打广告。营销人员在人流最旺盛的地方后台24小时运行微信，如果“查看附近的人”使用者足够多，这个广告效果也会不断随着微信用户数量的上升，可能这个简单的签名栏也会变成会移动的“黄金广告位”。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<span style="color:#E56600;"><strong>微服务——微信企业应用与电子商务</strong></span>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165258_28008.jpg" alt="" />
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>有小黄鸡陪聊加强版510万数据，过滤了广告和一些感词汇。 还有天气查询 ，手机查询，邮编查询，快递询（支持160家快递公司），身份证查询，人品计算，译字典，百科（全网数据），音乐80.1万 ，笑话5万条小黄鸡陪聊510万条，诗词23万首，诗句 225万，成语万谜语5万，解梦3万，糗事55万，公交线路4万，火车线路4500，机器人学习功能等等......</span></strong></strong></strong></strong>
</p>
<p>
	<strong><span style="color:#333333;font-size:16px;"></span></strong>&nbsp;
</p>
<p>
	<strong><span style="color:#E56600;">数据魔方——实时数据统计，监控运营效果</span></strong>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165428_36554.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"></span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微客服——沟通6亿用户，创造无限商机</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165700_21898.jpg" alt="" /><br />
</span></strong></strong></strong></strong></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong></span></strong></strong></strong></strong>随着互联网的发展及网络营销模式重要性的凸显，在线客服系统 会成为网络营销的重要工具，也是提示企业形象、加强企业与访 客互动的必备工具；如今，微信迅速崛起，商家都把店铺搬进了 公众账号，而微盟微客服系统，就是一款为微信商家打造的实时 沟通软件，让商家可以分享微信6亿用户，创造无限商机。
</p>
<p>
	<br />
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微餐饮——实时数据统计，监控运营效果</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225170308_66043.jpg" alt="" /></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<span style="line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span>
</p>
<p>
	<span id="__kindeditor_bookmark_start_206__"></span>
</p>
<p>
	<br />
</p>
<img alt="" src="/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828151902_97516.jpg" />
<p>
	<br />
</p>",
				"wContent": "<p style="color:#000000;text-indent:0px;" align="left">
	<span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;微盟是一个专门针对微信公众账号提供营销推广服务的第三方平台。主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。</span>
</p>
<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823205408_83803.jpg" /><span style="color:#000000;">&nbsp;</span>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 微盟平台主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	<strong><span style="color:#009900;font-size:16px;">微盟八大“微体系”</span></strong>
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 奈斯伙伴，国内最大的微营销联盟，八大微体系为企业微信营销保驾护驾。微官网，微会员、微活动、微服务、微预约、微团购、微商城、微支付，企业微信营销必备。
</p>
<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="">
<p align="left">
	<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823210206_62530.jpg" />
</p>
<strong>
<p align="left">
	<br />
</p>
<p align="left">
	自定义菜单——打造最便捷的微信内置APP
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164133_80419.jpg" alt="" />
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微盟提供微信公众号自定义菜单管理功能用户无需再通过输入关键词触发回复，直接点击菜单就可以看相关的内容，微盟可与企业原有Wap进行打通，复用企业APP原有功能，同时可定制个性化功能、使用HTML5新技术进行无限拓展，帮助企业打造最便捷、易推广的微信内置APP，此功能如果结合微信3G网站可以使您的公众号用户体验更好，带给粉丝不一样的感受。</span><span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><br />
</span>
</p>
</strong><strong>
<p align="left">
	<span style="color:#E56600;">微官网——五分钟打造超炫微信3G网站</span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<div>
	<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?=""><strong>
	<p>
		<span style="font-weight:normal;line-height:1.5;color:#000000;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164520_59074.jpg" alt="" /></span><strong></strong>
	</p>
</strong></span>
</div>
</strong></span>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp; 微官网是指将企业信息、服务、活动等内容通过微信网页的方式进行表现，用户只要通过简单的设置，就能快速生成属于您自己的微信3G网站，并且有各种精美模板，供您选择，还有自定义模版，可以设计出自己的风格，不但提高了信息量，也使信息的展现更加赏心悦目，进一步提高用户体验。</span></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong>
</p>
<strong>
<p align="left">
	<strong></strong>
</p>
<div>
	<span arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="" style="color: rgb(229, 102, 0);"><strong>
	<div>
		<strong>
		<p align="left">
			微会员——移动时代的社会化会员管理平台
		</p>
</strong>
	</div>
</strong></span>
</div>
</strong>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164617_57398.jpg" alt="" /><strong></strong>
</p>
<p>
	<strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"></span></strong></strong>
</p>
<div>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微信会员卡通过在微信内植入会员卡，基于全国4亿微信用户，帮助企业建立集品牌推广、会员管理、营销活动、统计报表于一体的微信会员管理平台。清晰记录企业用户的消费行为并进行数据分析；还可根据用户特征进行精细分类，从而实现各种模式的精准营销。</span></strong></strong></strong></strong>
</div>
<p>
	<br />
</p>
<p align="left">
	<span style="line-height:1.5;color:#E56600;"><strong>微活动——优惠券+刮刮卡+大转盘+微投票</strong></span><span style="line-height:1.5;color:#E56600;"><strong>+一战到底的会员再营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164816_52592.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>我们将利用微信的强交互性，让您通过对互动流程环节和方式的设计，运用各种设计活动从而实现与用户的互动交流,，微整合系统互动符合微信娱乐性强的产品本质，微盟内置了专为商家定制的“商家营销服务模块”，包括优惠券推广模块、幸运大转盘推广模块、刮刮卡抽奖模块、微投票、一战到底等功能模块，商家通过发起营销活动，对已有客户进行再营销，通过不断更新补充主题，用户可以反复参与，并可带动周边朋友一起分享，从而形成极强的口碑营销效果。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微商城——打造微信在线购物平台</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165002_28752.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微商城是国内首款基于移动互联网的商城应用服务产品以时下最热门的互动应用微信为媒介，配合微信5.0微信支付功能，实现商家与客户的在线互动，即时推送最新商品信息给微信用户，可以为每一个公众号建立品牌微信商城，实现商城的在线支付功能，并且对商城参与人数，交易量进行跟踪。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微推送（LSP）：微信附近的人——精准营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165121_87309.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>Location Surround Push(基于附近的人的消息推送)微信中基于LBS(基于位置的服务)的功能插件“查看附近的人”便可以使更多陌生人看到这种强制性广告。 用户点击“查看附近的人”后，可以根据自己的地理位置查找到周围的微信用户。在这些附近的微信用户中，除了显示用户姓名等基本信息外，还会显示用户签名档的内容。所以用户可以利用这个免费的广告位为自己的产品打广告。营销人员在人流最旺盛的地方后台24小时运行微信，如果“查看附近的人”使用者足够多，这个广告效果也会不断随着微信用户数量的上升，可能这个简单的签名栏也会变成会移动的“黄金广告位”。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<span style="color:#E56600;"><strong>微服务——微信企业应用与电子商务</strong></span>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165258_28008.jpg" alt="" />
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>有小黄鸡陪聊加强版510万数据，过滤了广告和一些感词汇。 还有天气查询 ，手机查询，邮编查询，快递询（支持160家快递公司），身份证查询，人品计算，译字典，百科（全网数据），音乐80.1万 ，笑话5万条小黄鸡陪聊510万条，诗词23万首，诗句 225万，成语万谜语5万，解梦3万，糗事55万，公交线路4万，火车线路4500，机器人学习功能等等......</span></strong></strong></strong></strong>
</p>
<p>
	<strong><span style="color:#333333;font-size:16px;"></span></strong>&nbsp;
</p>
<p>
	<strong><span style="color:#E56600;">数据魔方——实时数据统计，监控运营效果</span></strong>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165428_36554.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"></span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微客服——沟通6亿用户，创造无限商机</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165700_21898.jpg" alt="" /><br />
</span></strong></strong></strong></strong></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong></span></strong></strong></strong></strong>随着互联网的发展及网络营销模式重要性的凸显，在线客服系统 会成为网络营销的重要工具，也是提示企业形象、加强企业与访 客互动的必备工具；如今，微信迅速崛起，商家都把店铺搬进了 公众账号，而微盟微客服系统，就是一款为微信商家打造的实时 沟通软件，让商家可以分享微信6亿用户，创造无限商机。
</p>
<p>
	<br />
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微餐饮——实时数据统计，监控运营效果</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225170308_66043.jpg" alt="" /></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<span style="line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span>
</p>
<p>
	<span id="__kindeditor_bookmark_start_206__"></span>
</p>
<p>
	<br />
</p>
<img alt="" src="/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828151902_97516.jpg" />
<p>
	<br />
</p>"
			};

			// 发送给好友
			WeixinJSBridge.on('menu:share:appmessage', function (argv) {
				WeixinJSBridge.invoke('sendAppMessage', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.sendFriendLink,
					"desc": window.shareData.fContent,
					"title": window.shareData.fTitle
				}, function (res) {
					_report('send_msg', res.err_msg);
				})
			});

			// 分享到朋友圈
			WeixinJSBridge.on('menu:share:timeline', function (argv) {
				WeixinJSBridge.invoke('shareTimeline', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.timeLineLink,
					"desc": window.shareData.tContent,
					"title": window.shareData.tTitle
				}, function (res) {
					_report('timeline', res.err_msg);
				});
			});

			// 分享到微博
			WeixinJSBridge.on('menu:share:weibo', function (argv) {
				WeixinJSBridge.invoke('shareWeibo', {
					"content": window.shareData.wContent,
					"url": window.shareData.weiboLink,
				}, function (res) {
					_report('weibo', res.err_msg);
				});
			});
		}, false)
	</script>
				<section class="news_article">
			<header>
				<h3 style="font-size:14px;">奈斯伙伴—国内最大的微信公众智能服务平台</h3>
				<small class="gray">2013.08.28</small>
			</header>
			<article>
				<p>
											<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828151354_22096.jpg" style="width:100%;"/>
										<p style="color:#000000;text-indent:0px;" align="left">
	<span style="color:#000000;">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;微盟是一个专门针对微信公众账号提供营销推广服务的第三方平台。主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。</span>
</p>
<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823205408_83803.jpg" /><span style="color:#000000;">&nbsp;</span>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 微盟平台主要功能是针对微信商家公众号提供与众不同的、有针对性的营销推广服务。通过微盟平台，用户可以轻松管理自己的微信各类信息，对微信公众账号进行维护、开展智能机器人、在线发优惠劵、抽奖、刮奖、派发会员卡、打造微官网、开启微团购等多种活动，对微信营销实现有效监控，极大扩展潜在客户群和实现企业的运营目标。微盟平台很好的弥补了微信公众平台本身功能不足、针对性不强、交互不便利的问题，为商家公众账号提供更为贴心的、且是核心需求的功能和服务。在线优惠劵、转盘抽奖、微信会员卡等推广服务更是让微信成为商家推广的利器。智能客服的可调教功能让用户真正从微信繁琐的日常客服工作中解脱出来，真正成为商家便利的新营销渠道。
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	<strong><span style="color:#009900;font-size:16px;">微盟八大“微体系”</span></strong>
</p>
<p style="color:#000000;text-indent:0px;" align="left">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 奈斯伙伴，国内最大的微营销联盟，八大微体系为企业微信营销保驾护驾。微官网，微会员、微活动、微服务、微预约、微团购、微商城、微支付，企业微信营销必备。
</p>
<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="">
<p align="left">
	<img style="border:0px currentColor;" alt="" src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823210206_62530.jpg" />
</p>
<strong>
<p align="left">
	<br />
</p>
<p align="left">
	自定义菜单——打造最便捷的微信内置APP
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164133_80419.jpg" alt="" />
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微盟提供微信公众号自定义菜单管理功能用户无需再通过输入关键词触发回复，直接点击菜单就可以看相关的内容，微盟可与企业原有Wap进行打通，复用企业APP原有功能，同时可定制个性化功能、使用HTML5新技术进行无限拓展，帮助企业打造最便捷、易推广的微信内置APP，此功能如果结合微信3G网站可以使您的公众号用户体验更好，带给粉丝不一样的感受。</span><span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"><br />
</span>
</p>
</strong><strong>
<p align="left">
	<span style="color:#E56600;">微官网——五分钟打造超炫微信3G网站</span>
</p>
<p>
	<span style="font-weight:normal;line-height:1.5;color:#000000;"></span>
</p>
<div>
	<span style="color: rgb(229, 102, 0); font-family: ;" arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?=""><strong>
	<p>
		<span style="font-weight:normal;line-height:1.5;color:#000000;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164520_59074.jpg" alt="" /></span><strong></strong>
	</p>
</strong></span>
</div>
</strong></span>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp; 微官网是指将企业信息、服务、活动等内容通过微信网页的方式进行表现，用户只要通过简单的设置，就能快速生成属于您自己的微信3G网站，并且有各种精美模板，供您选择，还有自定义模版，可以设计出自己的风格，不但提高了信息量，也使信息的展现更加赏心悦目，进一步提高用户体验。</span></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong>
</p>
<strong>
<p align="left">
	<strong></strong>
</p>
<div>
	<span arial="" black?;font-size:18px;font-style:normal;font-weight:normal;?="" style="color: rgb(229, 102, 0);"><strong>
	<div>
		<strong>
		<p align="left">
			微会员——移动时代的社会化会员管理平台
		</p>
</strong>
	</div>
</strong></span>
</div>
</strong>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164617_57398.jpg" alt="" /><strong></strong>
</p>
<p>
	<strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"></span></strong></strong>
</p>
<div>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;color:#000000;"><span>&nbsp; &nbsp; &nbsp;&nbsp;</span>微信会员卡通过在微信内植入会员卡，基于全国4亿微信用户，帮助企业建立集品牌推广、会员管理、营销活动、统计报表于一体的微信会员管理平台。清晰记录企业用户的消费行为并进行数据分析；还可根据用户特征进行精细分类，从而实现各种模式的精准营销。</span></strong></strong></strong></strong>
</div>
<p>
	<br />
</p>
<p align="left">
	<span style="line-height:1.5;color:#E56600;"><strong>微活动——优惠券+刮刮卡+大转盘+微投票</strong></span><span style="line-height:1.5;color:#E56600;"><strong>+一战到底的会员再营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225164816_52592.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>我们将利用微信的强交互性，让您通过对互动流程环节和方式的设计，运用各种设计活动从而实现与用户的互动交流,，微整合系统互动符合微信娱乐性强的产品本质，微盟内置了专为商家定制的“商家营销服务模块”，包括优惠券推广模块、幸运大转盘推广模块、刮刮卡抽奖模块、微投票、一战到底等功能模块，商家通过发起营销活动，对已有客户进行再营销，通过不断更新补充主题，用户可以反复参与，并可带动周边朋友一起分享，从而形成极强的口碑营销效果。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微商城——打造微信在线购物平台</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165002_28752.jpg" alt="" />
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微商城是国内首款基于移动互联网的商城应用服务产品以时下最热门的互动应用微信为媒介，配合微信5.0微信支付功能，实现商家与客户的在线互动，即时推送最新商品信息给微信用户，可以为每一个公众号建立品牌微信商城，实现商城的在线支付功能，并且对商城参与人数，交易量进行跟踪。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p align="left">
	<span style="color:#E56600;"><strong>微推送（LSP）：微信附近的人——精准营销</strong></span>
</p>
<p align="left">
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165121_87309.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>Location Surround Push(基于附近的人的消息推送)微信中基于LBS(基于位置的服务)的功能插件“查看附近的人”便可以使更多陌生人看到这种强制性广告。 用户点击“查看附近的人”后，可以根据自己的地理位置查找到周围的微信用户。在这些附近的微信用户中，除了显示用户姓名等基本信息外，还会显示用户签名档的内容。所以用户可以利用这个免费的广告位为自己的产品打广告。营销人员在人流最旺盛的地方后台24小时运行微信，如果“查看附近的人”使用者足够多，这个广告效果也会不断随着微信用户数量的上升，可能这个简单的签名栏也会变成会移动的“黄金广告位”。</span></strong></strong></strong></strong>
</p>
<p align="left">
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<span style="color:#E56600;"><strong>微服务——微信企业应用与电子商务</strong></span>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165258_28008.jpg" alt="" />
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>有小黄鸡陪聊加强版510万数据，过滤了广告和一些感词汇。 还有天气查询 ，手机查询，邮编查询，快递询（支持160家快递公司），身份证查询，人品计算，译字典，百科（全网数据），音乐80.1万 ，笑话5万条小黄鸡陪聊510万条，诗词23万首，诗句 225万，成语万谜语5万，解梦3万，糗事55万，公交线路4万，火车线路4500，机器人学习功能等等......</span></strong></strong></strong></strong>
</p>
<p>
	<strong><span style="color:#333333;font-size:16px;"></span></strong>&nbsp;
</p>
<p>
	<strong><span style="color:#E56600;">数据魔方——实时数据统计，监控运营效果</span></strong>
</p>
<p>
	<img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165428_36554.jpg" alt="" /><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><br />
</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"></span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微客服——沟通6亿用户，创造无限商机</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225165700_21898.jpg" alt="" /><br />
</span></strong></strong></strong></strong></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;&nbsp;</span></strong></strong></strong></strong></span></strong></strong></strong></strong>随着互联网的发展及网络营销模式重要性的凸显，在线客服系统 会成为网络营销的重要工具，也是提示企业形象、加强企业与访 客互动的必备工具；如今，微信迅速崛起，商家都把店铺搬进了 公众账号，而微盟微客服系统，就是一款为微信商家打造的实时 沟通软件，让商家可以分享微信6亿用户，创造无限商机。
</p>
<p>
	<br />
</p>
<p>
	<strong><strong><strong><strong><span style="color:#E56600;">微餐饮——实时数据统计，监控运营效果</span></strong></strong></strong></strong>
</p>
<p>
	<strong><strong><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;"><img src="http://img.weimob.com/static/1c/38/3c/image/20131225/20131225170308_66043.jpg" alt="" /></span></strong></strong></strong></strong></strong></strong>
</p>
<p>
	<span style="line-height:1.5;"><strong><strong><strong><strong><span style="font-weight:normal;line-height:1.5;">&nbsp; &nbsp; &nbsp;</span></strong></strong></strong></strong>微盟后台可以实时统计微信公众号的粉丝关注情况和用户语音请求数，根据统计对相关推广营销活动效果及某些敏感因素对您的影响作出判断，并对相关市场行为作出相应调整，从一定程度上实现了对市场的监控与及时应对。</span>
</p>
<p>
	<span id="__kindeditor_bookmark_start_206__"></span>
</p>
<p>
	<br />
</p>
<img alt="" src="/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828151902_97516.jpg" />
<p>
	<br />
</p>
</p>
			</article>
		</section>
		<section style="width:95%; margin:0px auto;">
	<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display:none;">
		<img src="http://stc.weimob.com/img/guide.png">
	</div>
	<div class="text" id="content">
		<div id="mess_share">
			<div id="share_1">
				<button class="button2" onclick="document.getElementById('mcover').style.display='block';">
					<img src="<?php echo RES;?>/img/icon_msg.png">&nbsp;发送给朋友
				</button>
			</div>
			<div id="share_2">
				<button class="button2" onclick="document.getElementById('mcover').style.display='block';">
					<img src="<?php echo RES;?>/img/icon_timeline.png">&nbsp;分享到朋友圈
				</button>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</section>
<div style="padding-bottom:0!important;">
	<a href="javascript:window.scrollTo(0,0);" style="font-size:12px;margin:5px auto;display:block;color:#fff;text-align:center;line-height:35px;background:#333;margin-bottom:-10px;">返回顶部</a>
</div>
</div>
<footer style="overflow:visible;">
    <div class="weimob-copyright" style="padding-bottom:50px;">
        <a href="/">© NicePa技术支持</a>
    </div>
    <span class="weimob-support" style="display:none;">©NicePa提供</span>
</footer>
</body>
</html>