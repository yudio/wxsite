<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
    <meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/index.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_switch.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_switch.js"></script>
    <title>微盟（Weimob）—国内最大的微信公众服务平台</title>
    <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico"/>
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/src/watermark.js"></script><![endif]-->
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet"/><![endif]-->
</head>
<body>

<div id="main">
<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-title">
                    <div class="span10">
                        <h3><i class="icon-book"></i>微服务接入服务</h3>
                    </div>
                    <div class="span2"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
                </div>

                <div class="box-content">
                    <div class="bs-docs-example">
                        <div class="span6">
                            <table class=" table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>开通服务</th>
                                    <th>回复关键词</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($fun[0])): $i = 0; $__LIST__ = $fun[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <td><span class="sn music"><?php echo ($list["name"]); ?></span></td>
                                        <td><?php echo ($list["info"]); ?></td>
                                        <td>
                                            <div class="switch switch-small">
                                                <input type="checkbox" <?php if(in_array($list['funname'],$check)): ?>checked="checked"<?php endif; ?> <?php if($list['gid'] > session('gid')): ?>disabled="disabled"<?php endif; ?> name="checkapp1" value="<?php echo ($list["id"]); ?>"/>
                                            </div>

                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="span6">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>开通服务</th>
                                    <th>回复关键词</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($fun[1])): $i = 0; $__LIST__ = $fun[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <td><span class="sn music"><?php echo ($list["name"]); ?></span></td>
                                        <td><?php echo ($list["info"]); ?></td>
                                        <td>
                                            <div class="switch switch-small">
                                                <input type="checkbox" <?php if(in_array($list['funname'],$check)): ?>checked="checked"<?php endif; ?> <?php if($list['gid'] > session('gid')): ?>disabled="disabled"<?php endif; ?> name="checkapp1" value="<?php echo ($list["id"]); ?>"/>
                                            </div>

                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                                </tbody>
                            </table>
                        </div>



                    </div>

                </div>

                <div class="box-content">
                    <div class="bs-docs-example">
                        <div class="span6">
                            <table class=" table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>开通服务</th>
                                    <th>回复关键词</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($fun[2])): $i = 0; $__LIST__ = $fun[2];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <td><span class="sn music"><?php echo ($list["name"]); ?></span></td>
                                        <td><?php echo ($list["info"]); ?></td>
                                        <td>
                                            <div class="switch switch-small">
                                                <input type="checkbox" <?php if(in_array($list['funname'],$check)): ?>checked="checked"<?php endif; ?> <?php if($list['gid'] > session('gid')): ?>disabled="disabled"<?php endif; ?> name="checkapp1" value="<?php echo ($list["id"]); ?>"/>
                                            </div>

                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="span6">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>开通服务</th>
                                    <th>回复关键词</th>
                                    <th>状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($fun[3])): $i = 0; $__LIST__ = $fun[3];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <td><span class="sn music"><?php echo ($list["name"]); ?></span></td>
                                        <td><?php echo ($list["info"]); ?></td>
                                        <td>
                                            <div class="switch switch-small">
                                                <input type="checkbox" <?php if(in_array($list['funname'],$check)): ?>checked="checked"<?php endif; ?> <?php if($list['gid'] > session('gid')): ?>disabled="disabled"<?php endif; ?> name="checkapp1" value="<?php echo ($list["id"]); ?>"/>
                                            </div>

                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>



                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<script>
    $(function () {
        $('div.switch').on('switch-change', function (e, data) {
            var $el = $(data.el), value = data.value, key = $el.attr('value');
            $.post('/npManage/func/appset.act', { 'appid': key, 'chk': value}, function (data) {
                console.log(data);
            });
        });

    });
</script>
</body>
</html>