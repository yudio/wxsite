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
    <meta name="Keywords" content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销"/>
    <meta name="Description" content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。"/>
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
<li>
    <a href="/weisite/detail?pid=1071&bid=5&did=1587&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&from=list&wxref=mp.weixin.qq.com"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/2e/cd/2b/image/20130823/20130823212705_98469.jpg"/>
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
    <a href="/wesite/<?php echo ($wxname); ?>/detail?id=0&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011152730_11927.jpg"/>
            </div>
        </dd>
        <dt>
            <hgroup>
                <h1>测试单页</h1>

                <h2>详细内容</h2>
            </hgroup>
        </dt>
    </a>
</li>
<li>
    <a href="http://www.weimob.com/weisite/home?pid=3427&bid=5231&wechatid=o5JGbjuf9xfGBB41DySka4SVOGs0&from=1"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011152625_29396.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=616&bid=1488&wechatid=ouHGIjnUJMdDdjbEhIJ0SDdgV8r8&from=1"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153315_83089.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=2806&bid=6169&wechatid=o5h_HjrwBuUMU8DrJay4e_AREn5s&from=1"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011160824_48377.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home/pid/278/bid/645/wechatid/oKvTnjgldiUWdYZ5K8LQ5ZKdxdHQ" class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011153042_34574.jpg"/>
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
    <a href="http://www.4213945.com/mobile/main.aspx" class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011152849_71360.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=5236&bid=10726&wechatid=ospGBjhDYhG9USredsDnVhSthjec" class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011165225_93190.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=5848&bid=11891&wechatid=o18Qqt_M8flDbZkZgh3DVSYA0pWk&from=1&from=timeline&isappinstalled=0"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011164955_93334.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=5881&bid=11930&wechatid=okMwqt6cBpHo4B43yCR9-G1MAmAc&from=1&from=timeline&isappinstalled=0&from=timeline&isappinstalled=0"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011164834_48106.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=1729&bid=3960&wechatid=ohda9jtgYGw4F0WavLqeGSU39_QI&from=1"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011162323_70965.jpg"/>
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
    <a href="http://www.weimob.com/weisite/home?pid=2546&bid=5629&wechatid=oLQmljrkqP7ljcdfo5GJMgWAXwSI&from=1"
       class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011162112_61496.jpg"/>
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
    <a href="http://novitawap.brandsh.cn/" class="tbox">
        <dd>
            <div>
                <img src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20131011/20131011161949_79073.jpg"/>
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