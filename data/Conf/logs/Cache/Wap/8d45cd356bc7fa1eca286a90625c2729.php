<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>在线预订</title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<link href="<?php echo RES;?>/css/style/css/hotels.css" rel="stylesheet" type="text/css">
<script src="<?php echo RES;?>/css/style/js/jquery.min.js" type="text/javascript"></script>
</head>
<body id="hotelsmore" >
<div class="qiandaobanner"> <img src="<?php echo RES;?>/css/style/images/RTqs2yHIc9.jpg" > </div>
<div class="cardexplain">

<ul class="round">
<li class="title"><span class="none">商家详情</span></li>
<li>
<div class="text">
<?php echo ($set['info']); ?>
</div>
</li>
</ul>
<!--连锁店-->
<ul class="round">
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="index.php?g=Wap&m=Host&a=index&token=<?php echo ($vo["token"]); ?>&hid=<?php echo ($vo["id"]); ?>&wecha_id=<?php echo ($_GET['wecha_id']); ?>"><span><?php echo ($vo["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
     </div>
<script>
function dourl(url){
location.href= url;
}
</script>
</body>
</html>