<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($replyInfo["title"]); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="/tpl/Wap/default/common/css/yl/news.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/tpl/Wap/default/common/css/flash/css/plugmenu.css">
</head>

<body id="listhome1">
<div class="Listpage">
    <div id="todayList">
<ul  class="todayList">
   <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li>
<if condition="$so['url']">
<a href="<?php echo U('Panorama/item',array('id'=>$so['id'],'token'=>$so['token']));?>">
<div class="img"><img src="<?php echo ($so["frontpic"]); ?>"></div>
<h2><?php echo ($so["name"]); ?></h2>
<p class="onlyheight"><?php echo ($so["intro"]); ?></p>
<div class="commentNum"></div>
</a>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

</ul>
</div>
</body>
</html>