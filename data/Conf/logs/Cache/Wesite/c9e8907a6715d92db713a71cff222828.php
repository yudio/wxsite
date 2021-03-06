<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/common.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/reset.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/list-10.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/home-menu-4.css" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/template/zepto.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/template/swipe.js"></script>
    <title>成功案例</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
          name="viewport">
    <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销"/>
    <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。"/>
    <!-- Mobile Devices Support @begin -->
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!-- apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <!-- Mobile Devices Support @end -->
    <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico"/>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<link rel="stylesheet" type="text/css" href="wm-xin-a/font-awesome.css?v=2014021911" media="all"/>
<div class="body">
<article id="shareCover" class="toshare" onclick="$('#shareCover').toggleClass('on')">
    <table>
        <tr>
            <td colspan="2" style="text-align:right;">
                <img src="<?php echo RES;?>/img/share_1.png" style="width:120px!important;"/>
                <img src="<?php echo RES;?>/img/share_2.png" style="width:30px!important;"/>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <img src="<?php echo RES;?>/img/share_4.png"/>

                <div>发送给朋友</div>
            </td>
            <td>
                <img src="<?php echo RES;?>/img/share_3.png"/>

                <div>分享到朋友圈</div>
            </td>
        </tr>
    </table>
</article>
<script>
    window.addEventListener("DOMContentLoaded", function () {
        var nav = document.querySelectorAll(".nav_8")[0];

        var evts = {
            handleEvent: function (evt) {
                if ("A" == evt.target.nodeName) {
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
                    <a href="/">
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
            "imgUrl": "<?php echo RES;?>/img/template/lib/home-300200.jpg?v=2013-08-17?=2013-08-17",
            "timeLineLink": "/weisite/list?pid=1071&bid=5&wechatid=fromUsername&ltid=860&wxref=mp.weixin.qq.com",
            "sendFriendLink": "/weisite/list?pid=1071&bid=5&wechatid=fromUsername&ltid=860&wxref=mp.weixin.qq.com",
            "weiboLink": "/weisite/list?pid=1071&bid=5&wechatid=fromUsername&ltid=860&wxref=mp.weixin.qq.com",
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

<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
    <a href="<?php echo ($vo["url"]); ?>"
       class="tbox">
        <dd>
            <div>
                <img src="<?php echo ($vo["pic"]); ?>"/>
            </div>
        </dd>
        <dt>
            <hgroup>
                <h1><?php echo ($vo["info"]); ?></h1>

                <h2><?php echo ($vo["text"]); ?></h2>
            </hgroup>
        </dt>
    </a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

</ul>
</div>
</section>
</div>
<footer style="overflow:visible;">
    <div class="weimob-copyright" style="padding-bottom:50px;">
        <a href="/">© NicePa技术支持</a>
    </div>
    <span class="weimob-support" style="display:none;">©NicePa提供</span>
</footer>
</body>
</html>