<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/snower.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/common.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/reset.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/font-awesome.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/home-52.css" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/template/maivl.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/template/zepto.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/template/swipe.js"></script>
    <title>奈斯伙伴</title>
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
    <link rel="shortcut icon" href="http://stc.weimob.com/img/favicon.ico"/>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<script>
    $().ready(function () {
        $("#list_ul a").on("mousedown touchstart",function () {
            this.className = "active";
        }).on("mouseup touchend", function () {
                    this.className = "";
                });
    });
</script>
<div class="body">
<header>
    <div class="snower">
        <script type="text/javascript">var urls = new Array();
        urls.push('<?php echo RES;?>/img/template/lib/v57_snow1.png');
        urls.push('<?php echo RES;?>/img/template/lib/v57_snow2.png');
        urls.push('<?php echo RES;?>/img/template/lib/v57_snow3.png');
        urls.push('<?php echo RES;?>/img/template/lib/v57_snow4.png');
        </script>
        <script type="text/javascript" src="<?php echo RES;?>/src/template/snower2.js"></script>
    </div>
</header>
<div id="body2" class="body2 relative">
<aside class="aside_61">
    <nav>
        <a href="javascript:document.getElementById('body2').classList.toggle('on');" class="a_aside"></a>
    </nav>
    <ul>
        <li>
            <a href="tel:059187570191">
                <span class="icon-phone"></span>
            </a>
        </li>
        <li>
            <a href="http://j.map.baidu.com/uL4XT">
                <span class="icon-location-arrow"></span>
            </a>
        </li>
        <li>
            <a href="/npWap/Card/get_card.act?token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>">
                <span class="icon-credit-card"></span>
            </a>
        </li>
        <li>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=24757856&site=qq&menu=yes">
                <span class="icon-group"></span>
            </a>
        </li>
    </ul>
</aside>
<section>
    <div class="header2 relative">
        <a onclick="return false;">
            <img src="http://img.weimob.com/static/1c/38/3c/image/20131104/20131104174551_39978.jpg" alt="微盟展望"
                 style="width:100%;"/>
        </a>
        <a href="tel:400-6305-400" class="tel"><span class="icon-phone"></span>电话：0591-87570191</a>
    </div>
    <ul id="list_ul" class="list_ul">
        <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <a href="<?php if($vo['url'] == ''): ?>/wesite/<?php echo ($wxname); ?>/lists?classid=<?php echo ($vo['id']); else: echo ($vo["url"]); endif; ?>">
                <dl class="tbox">
                    <dd>
                        <span class="icon-trophy"><img src="<?php echo ($vo["img"]); ?>" /></span>
                    </dd>
                    <dd>
                        <label><?php echo ($vo["name"]); ?></label>
                    </dd>
                </dl>
            </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</section>
</div>
</div>
<inclue file="NicePa:footer"/>