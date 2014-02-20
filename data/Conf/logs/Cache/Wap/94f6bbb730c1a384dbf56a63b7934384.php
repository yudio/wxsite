<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/template/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/template/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/template/list-10.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/template/home-menu-4.css" media="all" />
<script type="text/javascript" src="src/jQuery.js"></script>
<script type="text/javascript" src="src/template/zepto.js"></script>
<script type="text/javascript" src="src/template/swipe.js"></script>
<title>成功案例</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
        <meta name="Keywords" content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
        <meta name="Description" content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
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
        <link rel="shortcut icon" href="http://stc.weimob.com/img/favicon.ico" />
    </head>
    <body onselectstart="return true;" ondragstart="return false;">
        <link rel="stylesheet" type="text/css" href="wm-xin-a/font-awesome.css?v=2014021911" media="all" />
<div class="body">
			<article id="shareCover" class="toshare" onclick="$('#shareCover').toggleClass('on')">
		<table>
			<tr>
				<td colspan="2"  style="text-align:right;">
					<img src="img/share_1.png?v=2014-02-17-2" style="width:120px!important;" />
					<img src="img/share_2.png?v=2014-02-17-2" style="width:30px!important;" />
				</td>
			</tr>
			<tr>
				<td style="width:50%;">
					<img src="img/share_4.png?v=2014-02-17-2" />
					<div>发送给朋友</div>
				</td>
				<td>
					<img src="img/share_3.png?v=2014-02-17-2" />
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
								<a href="tel:400-6305-400">
									<p class="tel"></p>
									<span>联系电话</span>
								</a>
							</li>
																						<li>
								<a href="http://api.map.baidu.com/marker?location=31.307002,121.522989&title=微盟&name=微盟&content=上海市杨浦区政旦东路42号&output=html&src=weiba|weiweb">
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
				"imgUrl": "http://stc.weimob.com//img/template/lib/home-300200.jpg?v=2013-08-17?=2013-08-17",
				"timeLineLink": "http://www.weimob.com/weisite/list?pid=1071&bid=5&wechatid=fromUsername&ltid=860&wxref=mp.weixin.qq.com",
				"sendFriendLink": "http://www.weimob.com/weisite/list?pid=1071&bid=5&wechatid=fromUsername&ltid=860&wxref=mp.weixin.qq.com",
				"weiboLink": "http://www.weimob.com/weisite/list?pid=1071&bid=5&wechatid=fromUsername&ltid=860&wxref=mp.weixin.qq.com",
				"tTitle": "成功案例",
				"tContent": "成功案例",
				"fTitle": "成功案例",
				"fContent": "成功案例",
				"wContent": "成功案例"
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
	<section>
				<div>
			<ul class="list_ul">
							 					<li>
					<a href="/weisite/detail?pid=1071&bid=5&did=1587&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&from=list&wxref=mp.weixin.qq.com"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823212705_98469.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>微盟成功案例</h1>
								<h2>微盟，自开放运营以来，一个月内商户突破一万。微盟正走入每一个商家品牌公众号。</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=3453&bid=7443&wechatid=oVK73jvpIWqFMOO0f1fHalK6nZts&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011152730_11927.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>上海地绿宝仕</h1>
								<h2>上海地绿宝仕</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=3427&bid=5231&wechatid=o5JGbjuf9xfGBB41DySka4SVOGs0&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011152625_29396.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>上海复大医院</h1>
								<h2>上海复大医院</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=616&bid=1488&wechatid=ouHGIjnUJMdDdjbEhIJ0SDdgV8r8&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153315_83089.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>韩国艺匠婚纱摄影</h1>
								<h2>韩国艺匠婚纱摄影</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=2806&bid=6169&wechatid=o5h_HjrwBuUMU8DrJay4e_AREn5s&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011160824_48377.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>BBOSS至尊party</h1>
								<h2>BBOSS至尊party</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home/pid/278/bid/645/wechatid/oKvTnjgldiUWdYZ5K8LQ5ZKdxdHQ"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153042_34574.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>angel with us咖啡厅</h1>
								<h2>angelwithus</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.4213945.com/mobile/main.aspx"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011152849_71360.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>麦兜点点</h1>
								<h2>麦兜点点</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=5236&bid=10726&wechatid=ospGBjhDYhG9USredsDnVhSthjec"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011165225_93190.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>黔香阁</h1>
								<h2>黔香阁</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=5848&bid=11891&wechatid=o18Qqt_M8flDbZkZgh3DVSYA0pWk&from=1&from=timeline&isappinstalled=0"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011164955_93334.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>西安倾国倾城国际私属俱乐部</h1>
								<h2>西安倾国倾城国际私属俱乐部</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=5881&bid=11930&wechatid=okMwqt6cBpHo4B43yCR9-G1MAmAc&from=1&from=timeline&isappinstalled=0&from=timeline&isappinstalled=0"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011164834_48106.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>珍皮士包袋</h1>
								<h2>珍皮士包袋</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=1729&bid=3960&wechatid=ohda9jtgYGw4F0WavLqeGSU39_QI&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011162323_70965.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>爱女神3D婚纱摄影</h1>
								<h2>爱女神3D婚纱摄影</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=2546&bid=5629&wechatid=oLQmljrkqP7ljcdfo5GJMgWAXwSI&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011162112_61496.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>沃尔沃宁波丰颐</h1>
								<h2>沃尔沃宁波丰颐</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://novitawap.brandsh.cn/"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161949_79073.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>诺维达</h1>
								<h2>诺维达</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=4127&bid=8602&wechatid=oNKb1jl5Y7LpMu7Ootr-O-w486zc&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161813_66274.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>拍吧视觉</h1>
								<h2>拍吧视觉</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=1489&bid=3472&wechatid=oS-imjnLBjS0gogovH-e-FG88d5I&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161656_18038.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>衡阳市五环广场</h1>
								<h2>衡阳市五环广场</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home/pid/1942/bid/4357/wechatid/oSBYMjxiD_Ki8BbeLZNEnv1Jtv1s"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161353_94593.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>Thinkpad</h1>
								<h2>Thinkpad</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=3436&bid=7416&wechatid=oJO_PjugPz0ynzmXJtqSoKGhseys&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161230_41396.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>舌尖上的酸菜鱼</h1>
								<h2>舌尖上的酸菜鱼</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=708&bid=1609&wechatid=oFTcMj0vErNiKyYg_KUjobExRk7k"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161022_34789.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>美地度假</h1>
								<h2>美地度假</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=1615&bid=3723&wechatid=olOH5jr9AbXAPLkPpqEGyKMN0tWE&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011160922_87277.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>健威人性家具</h1>
								<h2>健威人性家具</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=2244&bid=4641&wechatid=oV8KOjvQrl9M_ITFv9w-Ipc4S3b4&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011160704_56227.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>辰嫣国际微刊</h1>
								<h2>辰嫣国际微刊</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=77&bid=136&wechatid=oZLKfjmCjC3HSNWYtzL6jxf8SC-E"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011160449_66741.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>JM营销</h1>
								<h2>JM营销</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=4586&bid=9242&wechatid=o8XKBjrJhvkrdGlZ7QAhHs8pxam8&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011154807_91915.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>慧之通高尔夫</h1>
								<h2>慧之通高尔夫</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=4323&bid=8958&wechatid=oVyKsjl-LWFwvzfvGUZdoM9a_UtY&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011154559_62999.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>潮流百货</h1>
								<h2>潮流百货</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=3573&bid=7666&wechatid=orUTQjkUWp-tFwUzCx142fOA7HyE"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011154356_49157.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>岳阳百盛商场</h1>
								<h2>岳阳百盛商场</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=2967&bid=6422&wechatid=oJWt6joqLp5IdFcAkceTUbqHCTYM&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011154233_36060.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>牛牛生态水产</h1>
								<h2>牛牛生态水产</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=3336&bid=7235&wechatid=oVD34jttt45v8MDe60LI3bZMAE0w"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153854_74697.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>岳阳罗门婚纱摄影品牌店</h1>
								<h2>岳阳罗门婚纱摄影品牌店</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home?pid=49&bid=9&wechatid=oqVkKj3Um3M01OSFuaXLtNA1ugeI&from=1"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153725_70778.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>诗美诗格</h1>
								<h2>诗美诗格</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							 					<li>
					<a href="http://www.weimob.com/weisite/home/pid/430/bid/266/wechatid/oONXpjvji9LjmK3OdN_4SGnUtuKw"  class="tbox">
						<dd>
							<div>
								<img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153514_80101.jpg" />
							</div>
						</dd>
						<dt>
							<hgroup>
								<h1>茗草泉</h1>
								<h2>茗草泉</h2>
							</hgroup>
						</dt>
					</a>
				</li>
							</ul>
		</div>
			</section>
</div>        			
<footer style="overflow:visible;">
	<div class="weimob-copyright" style="padding-bottom:50px;">
		<a href="/weisite/home?pid=1071&bid=5&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&wxref=mp.weixin.qq.com">© 微盟技术支持</a>
	</div>
	<span class="weimob-support" style="display:none;">©微盟提供</span>
</footer>
	</body>
</html>