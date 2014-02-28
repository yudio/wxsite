<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/emotion.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/emotion.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
<title>微盟（Weimob）—国内最大的微信公众服务平台</title>
	<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
    <!--[if lte IE 9]><script src="<?php echo RES;?>/src/watermark.js"></script><![endif]-->
	<!--[if IE 7]><link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet" /><![endif]-->
</head>
<body>
	    <div id="main">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                    <div class="box">
                        <div class="box-title">
                            <div class="span10">
                                <h3><i class="icon-edit"></i>关注时自动回复内容</h3>
                            </div>
                        </div>

                        <div class="box-content">
						<form action="/npManage/reply/subsupdate.act" method="post" class="form-horizontal form-validate">
                            <div class="alert" style="display:none">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                自动回复内容不能为空!
                            </div>

                                <div class="control-group" id="textreply">
                                    <label class="control-label" for="reply">自动回复内容:</label>
                                    <div class="controls">
                                        <div class="txtArea">
                                            <div class="functionBar">
                                                <div class="opt">
                                                    <a class="icon18C iconEmotion block" href="javascript:;">表情</a>
                                                </div>
                                                <div class="tip"></div>
                                                <div class="emotions">
                                                    <table cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem" style="background-position: 0px 0;"
                                                                        data-title="微笑"
                                                                        data-gifurl="<?php echo RES;?>/img/face/0.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -24px 0;"
                                                                        data-title="撇嘴"
                                                                        data-gifurl="<?php echo RES;?>/img/face/1.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -48px 0;"
                                                                        data-title="色"
                                                                        data-gifurl="<?php echo RES;?>/img/face/2.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -72px 0;"
                                                                        data-title="发呆"
                                                                        data-gifurl="<?php echo RES;?>/img/face/3.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -96px 0;"
                                                                        data-title="得意"
                                                                        data-gifurl="<?php echo RES;?>/img/face/4.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -120px 0;"
                                                                        data-title="流泪"
                                                                        data-gifurl="<?php echo RES;?>/img/face/5.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -144px 0;"
                                                                        data-title="害羞"
                                                                        data-gifurl="<?php echo RES;?>/img/face/6.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -168px 0;"
                                                                        data-title="闭嘴"
                                                                        data-gifurl="<?php echo RES;?>/img/face/7.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -192px 0;"
                                                                        data-title="睡"
                                                                        data-gifurl="<?php echo RES;?>/img/face/8.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -216px 0;"
                                                                        data-title="大哭"
                                                                        data-gifurl="<?php echo RES;?>/img/face/9.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -240px 0;"
                                                                        data-title="尴尬"
                                                                        data-gifurl="<?php echo RES;?>/img/face/10.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -264px 0;"
                                                                        data-title="发怒"
                                                                        data-gifurl="<?php echo RES;?>/img/face/11.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -288px 0;"
                                                                        data-title="调皮"
                                                                        data-gifurl="<?php echo RES;?>/img/face/12.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -312px 0;"
                                                                        data-title="呲牙"
                                                                        data-gifurl="<?php echo RES;?>/img/face/13.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -336px 0;"
                                                                        data-title="惊讶"
                                                                        data-gifurl="<?php echo RES;?>/img/face/14.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -360px 0;"
                                                                        data-title="难过"
                                                                        data-gifurl="<?php echo RES;?>/img/face/15.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -384px 0;"
                                                                        data-title="酷"
                                                                        data-gifurl="<?php echo RES;?>/img/face/16.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -408px 0;"
                                                                        data-title="冷汗"
                                                                        data-gifurl="<?php echo RES;?>/img/face/17.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -432px 0;"
                                                                        data-title="抓狂"
                                                                        data-gifurl="<?php echo RES;?>/img/face/18.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -456px 0;"
                                                                        data-title="吐"
                                                                        data-gifurl="<?php echo RES;?>/img/face/19.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -480px 0;"
                                                                        data-title="偷笑"
                                                                        data-gifurl="<?php echo RES;?>/img/face/20.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -504px 0;"
                                                                        data-title="可爱"
                                                                        data-gifurl="<?php echo RES;?>/img/face/21.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -528px 0;"
                                                                        data-title="白眼"
                                                                        data-gifurl="<?php echo RES;?>/img/face/22.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -552px 0;"
                                                                        data-title="傲慢"
                                                                        data-gifurl="<?php echo RES;?>/img/face/23.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -576px 0;"
                                                                        data-title="饥饿"
                                                                        data-gifurl="<?php echo RES;?>/img/face/24.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -600px 0;"
                                                                        data-title="困"
                                                                        data-gifurl="<?php echo RES;?>/img/face/25.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -624px 0;"
                                                                        data-title="惊恐"
                                                                        data-gifurl="<?php echo RES;?>/img/face/26.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -648px 0;"
                                                                        data-title="流汗"
                                                                        data-gifurl="<?php echo RES;?>/img/face/27.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -672px 0;"
                                                                        data-title="憨笑"
                                                                        data-gifurl="<?php echo RES;?>/img/face/28.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -696px 0;"
                                                                        data-title="大兵"
                                                                        data-gifurl="<?php echo RES;?>/img/face/29.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -720px 0;"
                                                                        data-title="奋斗"
                                                                        data-gifurl="<?php echo RES;?>/img/face/30.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -744px 0;"
                                                                        data-title="咒骂"
                                                                        data-gifurl="<?php echo RES;?>/img/face/31.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -768px 0;"
                                                                        data-title="疑问"
                                                                        data-gifurl="<?php echo RES;?>/img/face/32.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -792px 0;"
                                                                        data-title="嘘"
                                                                        data-gifurl="<?php echo RES;?>/img/face/33.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -816px 0;"
                                                                        data-title="晕"
                                                                        data-gifurl="<?php echo RES;?>/img/face/34.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -840px 0;"
                                                                        data-title="折磨"
                                                                        data-gifurl="<?php echo RES;?>/img/face/35.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -864px 0;"
                                                                        data-title="衰"
                                                                        data-gifurl="<?php echo RES;?>/img/face/36.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -888px 0;"
                                                                        data-title="骷髅"
                                                                        data-gifurl="<?php echo RES;?>/img/face/37.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -912px 0;"
                                                                        data-title="敲打"
                                                                        data-gifurl="<?php echo RES;?>/img/face/38.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -936px 0;"
                                                                        data-title="再见"
                                                                        data-gifurl="<?php echo RES;?>/img/face/39.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -960px 0;"
                                                                        data-title="擦汗"
                                                                        data-gifurl="<?php echo RES;?>/img/face/40.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem" style="background-position: -984px 0;"
                                                                        data-title="抠鼻"
                                                                        data-gifurl="<?php echo RES;?>/img/face/41.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1008px 0;" data-title="鼓掌"
                                                                        data-gifurl="<?php echo RES;?>/img/face/42.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1032px 0;" data-title="糗大了"
                                                                        data-gifurl="<?php echo RES;?>/img/face/43.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1056px 0;" data-title="坏笑"
                                                                        data-gifurl="<?php echo RES;?>/img/face/44.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1080px 0;" data-title="左哼哼"
                                                                        data-gifurl="<?php echo RES;?>/img/face/45.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1104px 0;" data-title="右哼哼"
                                                                        data-gifurl="<?php echo RES;?>/img/face/46.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1128px 0;" data-title="哈欠"
                                                                        data-gifurl="<?php echo RES;?>/img/face/47.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1152px 0;" data-title="鄙视"
                                                                        data-gifurl="<?php echo RES;?>/img/face/48.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1176px 0;" data-title="委屈"
                                                                        data-gifurl="<?php echo RES;?>/img/face/49.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1200px 0;" data-title="快哭了"
                                                                        data-gifurl="<?php echo RES;?>/img/face/50.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1224px 0;" data-title="阴险"
                                                                        data-gifurl="<?php echo RES;?>/img/face/51.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1248px 0;" data-title="亲亲"
                                                                        data-gifurl="<?php echo RES;?>/img/face/52.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1272px 0;" data-title="吓"
                                                                        data-gifurl="<?php echo RES;?>/img/face/53.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1296px 0;" data-title="可怜"
                                                                        data-gifurl="<?php echo RES;?>/img/face/54.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1320px 0;" data-title="菜刀"
                                                                        data-gifurl="<?php echo RES;?>/img/face/55.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1344px 0;" data-title="西瓜"
                                                                        data-gifurl="<?php echo RES;?>/img/face/56.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1368px 0;" data-title="啤酒"
                                                                        data-gifurl="<?php echo RES;?>/img/face/57.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1392px 0;" data-title="篮球"
                                                                        data-gifurl="<?php echo RES;?>/img/face/58.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1416px 0;" data-title="乒乓"
                                                                        data-gifurl="<?php echo RES;?>/img/face/59.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1440px 0;" data-title="咖啡"
                                                                        data-gifurl="<?php echo RES;?>/img/face/60.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1464px 0;" data-title="饭"
                                                                        data-gifurl="<?php echo RES;?>/img/face/61.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1488px 0;" data-title="猪头"
                                                                        data-gifurl="<?php echo RES;?>/img/face/62.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1512px 0;" data-title="玫瑰"
                                                                        data-gifurl="<?php echo RES;?>/img/face/63.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1536px 0;" data-title="凋谢"
                                                                        data-gifurl="<?php echo RES;?>/img/face/64.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1560px 0;" data-title="示爱"
                                                                        data-gifurl="<?php echo RES;?>/img/face/65.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1584px 0;" data-title="爱心"
                                                                        data-gifurl="<?php echo RES;?>/img/face/66.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1608px 0;" data-title="心碎"
                                                                        data-gifurl="<?php echo RES;?>/img/face/67.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1632px 0;" data-title="蛋糕"
                                                                        data-gifurl="<?php echo RES;?>/img/face/68.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1656px 0;" data-title="闪电"
                                                                        data-gifurl="<?php echo RES;?>/img/face/69.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1680px 0;" data-title="炸弹"
                                                                        data-gifurl="<?php echo RES;?>/img/face/70.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1704px 0;" data-title="刀"
                                                                        data-gifurl="<?php echo RES;?>/img/face/71.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1728px 0;" data-title="足球"
                                                                        data-gifurl="<?php echo RES;?>/img/face/72.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1752px 0;" data-title="瓢虫"
                                                                        data-gifurl="<?php echo RES;?>/img/face/73.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1776px 0;" data-title="便便"
                                                                        data-gifurl="<?php echo RES;?>/img/face/74.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1800px 0;" data-title="月亮"
                                                                        data-gifurl="<?php echo RES;?>/img/face/75.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1824px 0;" data-title="太阳"
                                                                        data-gifurl="<?php echo RES;?>/img/face/76.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1848px 0;" data-title="礼物"
                                                                        data-gifurl="<?php echo RES;?>/img/face/77.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1872px 0;" data-title="拥抱"
                                                                        data-gifurl="<?php echo RES;?>/img/face/78.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1896px 0;" data-title="强"
                                                                        data-gifurl="<?php echo RES;?>/img/face/79.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1920px 0;" data-title="弱"
                                                                        data-gifurl="<?php echo RES;?>/img/face/80.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1944px 0;" data-title="握手"
                                                                        data-gifurl="<?php echo RES;?>/img/face/81.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1968px 0;" data-title="胜利"
                                                                        data-gifurl="<?php echo RES;?>/img/face/82.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -1992px 0;" data-title="抱拳"
                                                                        data-gifurl="<?php echo RES;?>/img/face/83.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2016px 0;" data-title="勾引"
                                                                        data-gifurl="<?php echo RES;?>/img/face/84.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2040px 0;" data-title="拳头"
                                                                        data-gifurl="<?php echo RES;?>/img/face/85.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2064px 0;" data-title="差劲"
                                                                        data-gifurl="<?php echo RES;?>/img/face/86.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2088px 0;" data-title="爱你"
                                                                        data-gifurl="<?php echo RES;?>/img/face/87.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2112px 0;" data-title="NO"
                                                                        data-gifurl="<?php echo RES;?>/img/face/88.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2136px 0;" data-title="OK"
                                                                        data-gifurl="<?php echo RES;?>/img/face/89.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2160px 0;" data-title="爱情"
                                                                        data-gifurl="<?php echo RES;?>/img/face/90.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2184px 0;" data-title="飞吻"
                                                                        data-gifurl="<?php echo RES;?>/img/face/91.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2208px 0;" data-title="跳跳"
                                                                        data-gifurl="<?php echo RES;?>/img/face/92.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2232px 0;" data-title="发抖"
                                                                        data-gifurl="<?php echo RES;?>/img/face/93.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2256px 0;" data-title="怄火"
                                                                        data-gifurl="<?php echo RES;?>/img/face/94.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2280px 0;" data-title="转圈"
                                                                        data-gifurl="<?php echo RES;?>/img/face/95.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2304px 0;" data-title="磕头"
                                                                        data-gifurl="<?php echo RES;?>/img/face/96.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2328px 0;" data-title="回头"
                                                                        data-gifurl="<?php echo RES;?>/img/face/97.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2352px 0;" data-title="跳绳"
                                                                        data-gifurl="<?php echo RES;?>/img/face/98.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2376px 0;" data-title="挥手"
                                                                        data-gifurl="<?php echo RES;?>/img/face/99.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2400px 0;" data-title="激动"
                                                                        data-gifurl="<?php echo RES;?>/img/face/100.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2424px 0;" data-title="街舞"
                                                                        data-gifurl="<?php echo RES;?>/img/face/101.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2448px 0;" data-title="献吻"
                                                                        data-gifurl="<?php echo RES;?>/img/face/102.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2472px 0;" data-title="右太极"
                                                                        data-gifurl="<?php echo RES;?>/img/face/103.gif">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="eItem"
                                                                        style="background-position: -2496px 0;" data-title="左太极"
                                                                        data-gifurl="<?php echo RES;?>/img/face/104.gif">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="emotionsGif"></div>
                                                </div>
                                                <div class="clr"></div>
                                            </div>


                                            <div class="editArea">
                                                <textarea name="content" id="content" style="display: none;" title="first tooltip"><?php echo ($info["content"]); ?></textarea>
                                                <div contenteditable="true" style="overflow-y: auto; overflow-x: hidden;"><?php echo ($info["content"]); ?></div>
                                            </div>
                                        </div>

                                        <span class="maroon">*</span><span class="help-inline">必填, 用户添加您的时候自动回复语</span>
                                    </div>
                                </div>

                                <div class="form-actions">
									<input type="hidden" name="id" id="aid" value="<?php echo ($info["id"]); ?>">
                                    <button type="submit" class="btn btn-primary"  id ="bsubmit">保存</button>
                                    <button type="button" class="btn" onclick="window.location='/npManage/reply/subscribenews.act'"> 切换到图文模式 </button>
                                </div>

								 </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

	<script type="text/javascript">

	$(function(){
		var $textarea = $(".editArea textarea");
		var $contentDiv = $(".editArea div");
		$(".functionBar .iconEmotion").click(function () {
			//Emotion.saveRange();
			$(".emotions").show();
		});
		$(".emotions").hover(function () {

		}, function () {
			$(".emotions").fadeOut();
		});
		$(".emotions .eItem").mouseenter(function () {
			$(".emotionsGif").html('<img src="' + $(this).attr("data-gifurl") + '">');
		}).click(function () {
			Emotion.insertHTML('<img src="' + $(this).attr("data-gifurl") + '"' + 'alt="mo-' + $(this).attr("data-title") + '"' + "/>");
			$(".emotions").fadeOut();
			$textarea.trigger("contentValueChange");
		});
		$contentDiv.bind("keyup", function () {
			$textarea.trigger("contentValueChange");
			Emotion.saveRange();
		}).bind("keydown", function (e) {
			switch (e.keyCode) {
				case 8:
					var t = Emotion.getSelection();
					t.type && t.type.toLowerCase() === "control" && (e.preventDefault(), t.clear());
					break;
				case 13:
					e.preventDefault(),
					Emotion.insertHTML("<br/>");
					Emotion.saveRange();
			}
		}).bind("mouseup", function (e) {
			Emotion.saveRange();
			if ($.browser.msie && />$/.test($contentDiv.html())) {
				var n = Emotion.getSelection();
				n.extend && (n.extend(cursorNode, cursorNode.length), n.collapseToEnd()),
				Emotion.saveRange();
				Emotion.insertHTML(" ");
			}
		});
		$textarea.bind("contentValueChange", function () {
			$(this).val(Emotion.replaceInput($contentDiv.html()));
		});
		$contentDiv.html(Emotion.replaceEmoji($contentDiv.html()));


		var data_content = $("#content").val();
		if (data_content.length > 0) {
			$("textarea[name='content']").val(data_content);
			$contentDiv.html(Emotion.replaceEmoji(data_content));

		}

		$("#bsubmit").click(function () {
			if ($.trim($("#content").val()).length == 0) {
				G.ui.tips.info("回复内容不能为空");
				return false;
			}
		});



	});
</script></body>
</html>