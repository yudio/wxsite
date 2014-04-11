<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <base target="mainFrame"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/index.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/application.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
    <title><?php echo C('site_name');?>—<?php echo C('site_title');?></title>
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet"/>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo STATICS;?>/img/favicon.ico"/>
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="<?php echo RES;?>/src/excanvas_min.js"></script><![endif]-->
</head>

<body>
<div id="navigation">
    <div class="container-fluid">
        <div>
            <a href="<?php echo C('site_url');?>" target="_self" id="brand"></a>
            <a href="javascript:void(0);" class="toggle-nav" rel="tooltip" data-placement="bottom" id="menu-handle"
               title="隐藏菜单"><i class="icon-reorder"></i></a>
        </div>
        <ul class='main-nav'>
            <li class='active'>
                <a href="/npManage/microsite/main.act?id=<?php echo ($info["id"]); ?>&token=<?php echo ($token); ?>" target="_self">
                    <span>管理平台</span>
                </a>
            </li>
            <li><a href="/npManage/Account/main.act" target="_self">公众帐号管理</a></li>
            <li style="display:none;"><a href="/webabout/packageintr">套餐介绍</a></li>
            <li><a href="/npManage/Account/features.act">功能介绍</a></li>
            <li><a href="/npManage/Account/userguide.act">使用指南</a></li>

            <li style="display:none;">
                <a href="javascript:void(0)" data-toggle="dropdown" class='dropdown-toggle' data-hover="dropdown">
                    <span>个性化服务</span>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="/webabout/trusteeship">运营托管</a></li>
                    <li><a href="/webabout/customdev">定制开发</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0)" data-toggle="dropdown" class='dropdown-toggle' data-hover="dropdown">
                <span>帮助中心</span>
                <span class="caret"></span>
            </a>
                <ul class="dropdown-menu">

                    <li><a href="http://wpa.qq.com/msgrd?v=3&uin=24757856&site=qq&menu=yes" target="_blank">在线客服</a>
                    </li>
                    <li><a href="/npManage/Account/about.act">关于我们</a></li>
                    <li><a href="/npManage/Account/qa.act">常见问题</a></li>
                </ul>

            </li>
        </ul>
        <div class="user">
            <ul class="icon-nav">
                <li>
                    <a href="<?php echo C('site_url');?>" target="_blank" title="打开奈斯伙伴首页"><i class="icon-home"></i></a>
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="消息" style="display:none;"><i
                            class="icon-envelope"></i><span class="label label-lightred">4</span></a>
                </li>
                <li class="dropdown sett" style="display:none;">
                    <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="系统设置"><i class="icon-cog"></i></a>
                </li>
                <li class='dropdown colo'>
                    <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="选择颜色"><i
                            class="icon-tint"></i></a>
                    <ul class="dropdown-menu pull-right theme-colors">
                        <li class="subtitle">Predefined colors
                        </li>
                        <li>
                            <span class='red'></span>
                            <span class='orange'></span>
                            <span class='green'></span>
                            <span class="brown"></span>
                            <span class="blue"></span>
                            <span class='lime'></span>
                            <span class="teal"></span>
                            <span class="purple"></span>
                            <span class="pink"></span>
                            <span class="magenta"></span>
                            <span class="grey"></span>
                            <span class="darkblue"></span>
                            <span class="lightred"></span>
                            <span class="lightgrey"></span>
                            <span class="satblue"></span>
                            <span class="satgreen"></span>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" class='dropdown-toggle' data-toggle="dropdown" style="width:127px;">
                    <nobr><?php echo ($info["wxname"]); ?><img
                            src="<?php echo ($info["headerpic"]); ?>"
                            style="width: 27px; height: 27px" alt=""><span class="caret"></span></nobr>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="/npManage/account/main.act" target="_self">管理帐号</a>
                    </li>
                    <li>
                        <a href="/npManage/account/logout.act" target="_self">退出</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>


<div class="container-fluid" id="content">
    <div id="left">
        <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="subnav">
                <div class="subnav-title">
                    <a href="<?php if($vo["display"] == 1): ?>javascript:void(0);<?php else: echo ($vo["url"]); endif; ?>" class='toggle-subnav'><i
                            class="icon-angle-right"></i><span><?php echo ($vo["title"]); ?></span></a>
                </div>
                <ul class="subnav-menu" <?php if($i==1): ?>style="display:block;"<?php endif; ?>>
                    <?php if(is_array($vo['submenu'])): $i = 0; $__LIST__ = $vo['submenu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subvo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php if($subvo["display"] == 1): ?>javascript:void(0);<?php else: echo ($subvo["url"]); endif; ?>"><?php echo ($subvo["title"]); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="subnav bottom">
            <div class="subnav-title">
                <a href="javascript:void(0);" class='toggle-subnav'><i class="icon-angle-right"></i><span></span></a>
            </div>
            <ul class="subnav-menu">
            </ul>
        </div>
    </div>
    <div class="right">
        <div class="main">
            <iframe frameborder="0" id="mainFrame" name="mainFrame" src="/npManage/account/home.act"
                    style="background:url('<?php echo RES;?>/img/loading.gif') center no-repeat;"></iframe>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // 绑定菜单提示语切换
        $('#menu-handle').click(function () {
            switchMenu(this);
        });

        // 设置皮肤色
        P.skn();
    });

    // 切换菜单提示语
    function switchMenu(obj) {
        if ('隐藏菜单' == $(obj).attr('title')) {
            $(obj).attr('title', '显示菜单');
        } else {
            $(obj).attr('title', '隐藏菜单');
        }
    }
</script>
</body>
</html>
<!-- 用户反馈 -->
<div id="feedback" class="modal hide fade" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class=" icon-comment-alt"></i>反馈建议 </h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body" style="overflow: visible">
                    <div class="row-fluid">
                        <div id="pp">
                            <p>亲爱的用户</p>

                            <p class="bbottom">
                                欢迎您访问奈斯伙伴官方网站！您对奈斯伙伴有任何意见和建议，或在使用过程中遇到问题，请在本页面反馈。我们会实时关注您的反馈不断优化，您的建议将帮助我们改进，为您提供更好的服务！</p>

                            <p><b>请留下您的宝贵意见和建议！（请填写）</b></p>

                            <textarea name="info" class="input-block-level" placeholder="输入文本..." rows="4"
                                      id="feedback-text"></textarea>

                            <p>您常用的电子邮箱是？（请填写）</p>

                            <p>*请尽量填写，以便我们尽快回复您！</p>
                            <input type="text" placeholder="如：...@163.com" name="email" class="input-block-level"
                                   id="feedback-input"/>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="feedbackSubmit(); return false;"
                            id="submit_but">提交
                    </button>
                    <button class="btn" data-dismiss="modal" aria-hidden="true" id="close_but">取消</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="feedback_btn">
    <a href="#" target="_blank" class="tile-themed" title="联系客服">
        <i class="icon-comments-alt"></i>
    </a>
    <a href="#feedback" data-toggle="modal" title="反馈建议" class="tile-themed">
        <i class="icon-pencil"></i>
    </a>
</div>


<script>
    var submitting = false;
    function feedbackSubmit() {
        if (submitting) {
            //return false;
        }
        submitting = true;
        var $data = {
            feedback: $('#feedback-text').val(),
            email: $('#feedback-input').val(),
            url: parent.document.getElementById("mainFrame").contentWindow.location.href,
            from: 'server'
        };
        $('#submit_but').text('提交中...');
        $('#submit_but').removeClass('btn-primary');
        $.post('/site/feedback', $data, function (rs) {
            $("#feedback").modal('hide');
            if (200 == rs.code) {
                alert(rs.error);
                $('#feedback-text').val('');
                $('#feedback-input').val('');
            }
            else {
                alert(rs.error);
            }
            $('#submit_but').text('提交');
            $('#submit_but').addClass('btn-primary');
        }, 'json');
    }
</script>