<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <base target="mainFrame" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/index.css?2014-02-17-2" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-17-2" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-17-2" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-17-2" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-17-2" media="all" />
	<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-17-2"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/application.js?2014-02-17-2"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-17-2"></script>
	<title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
    <!--[if IE 7]>
       <link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet" />
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo RES;?>/src/excanvas_min.js"></script><![endif]-->

</head>

<body>
    <div id="navigation">
        <div class="container-fluid">
            <div>
                <a href="/wechat/main" target="_self" id="brand"></a>
                <a href="/wechat/main" target="_self" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
            </div>
            <ul class='main-nav'>
                <li class='active'>
                    <a href="/wechat/main" target="_self">
                        <span>管理平台</span>
                    </a>
                </li>

                <li style="display:none;"><a href="/webabout/packageintr">套餐介绍</a></li>
                <li><a href="/webabout/features">功能介绍</a> </li>
                <li><a href="/webabout/userguide">使用指南</a></li>

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

                        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank">在线客服</a></li>
                        
                        <li><a href="/webabout/about">关于我们</a></li>
                        <li><a href="/webabout/help">常见问题</a></li>
                        

                    </ul>

                </li>



            </ul>

            <div class="user">
                <ul class="icon-nav">
					<li>
						<a href="http://nicepa.cn" target="_blank" title="打开首页"><i class="icon-home"></i></a>
					</li>
					<li class='dropdown'>
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="消息" style="display:none;"><i class="icon-envelope"></i><span class="label label-lightred">4</span></a>
                    </li>
                    <li class="dropdown sett" style="display:none;">
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="系统设置"><i class="icon-cog"></i></a>
                    </li>
                    <li class='dropdown colo'>
                        <a href="#" class='dropdown-toggle' data-toggle="dropdown" title="选择颜色"><i class="icon-tint"></i></a>
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
                     <li>
                        <a href="/npManage/account/logout.act"  target="_self"  title="退出"><i class="icon-signout"></i> 退出</a>
                    </li>

                </ul>


            </div>
        </div>
    </div>
    <div class="container-fluid" id="content">
        <div id="left">
            <div class="subnav">
                <div class="subnav-title ">
                    <a href="javascript:void(0)" class='toggle-subnav'><i class="icon-angle-right"></i><span>我的微盟</span></a>
                </div>
                <ul class="subnav-menu" style="display: block">
                    <li >
                        <a href="<?php echo U('Manage/account/user');?>">商户信息</a>
                    </li>
					<li >
						<a href="<?php echo U('Manage/account/payment');?>">支付方式管理</a>
					</li>
                    <li>
                        <a href="<?php echo U('Manage/account/chgpwd');?>">修改密码</a>
                    </li>
                    <li class="active">
                        <a href="<?php echo U('Manage/account/index');?>">公众帐号管理</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Manage/account/service');?>">增值服务</a>
                    </li>
                </ul>
            </div>



        </div>
        <div class="right">
            <div class="main">

                <iframe frameborder="0" id="mainFrame" name="mainFrame" src="<?php echo U('Manage/Account/index');?>" style="background: url('http://stc.weimob.com/img/loading.gif') center no-repeat"></iframe>

            </div>
        </div>

    </div>
	<script type="text/javascript">  P.skn();  </script>
</div>
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
							<p class="bbottom">欢迎您访问微盟官方网站！您对微盟有任何意见和建议，或在使用过程中遇到问题，请在本页面反馈。我们会实时关注您的反馈不断优化，您的建议将帮助我们改进，为您提供更好的服务！</p>
							<p><b>请留下您的宝贵意见和建议！（请填写）</b></p>

							<textarea name="info" class="input-block-level" placeholder="输入文本..." rows="4" id="feedback-text" ></textarea>
							<p>您常用的电子邮箱是？（请填写）</p>
							<p>*请尽量填写，以便我们尽快回复您！</p>
							<input type="text" placeholder="如：...@163.com"  name="email" class="input-block-level" id="feedback-input" />

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" onclick="feedbackSubmit(); return false;" id="submit_but">提交</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true" id="close_but">取消 </button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="feedback_btn">
	<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=4006305400&amp;site=qq&amp;menu=yes" target="_blank" class="tile-themed" title="联系客服">
		<i class="icon-comments-alt"></i>
	</a>
	<a href="#feedback" data-toggle="modal" title="反馈建议" class="tile-themed">
		<i class="icon-pencil"></i>
	</a>
</div>


<script>
	var submitting = false;
	function feedbackSubmit(){
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
		$.post('/site/feedback', $data, function(rs){
			$("#feedback").modal('hide');
			if (200 == rs.code)
			{
				alert(rs.error);
				$('#feedback-text').val('');
				$('#feedback-input').val('');
			}
			else
			{
				alert(rs.error);
			}
			$('#submit_but').text('提交');
			$('#submit_but').addClass('btn-primary');
		}, 'json');
	}
</script>
<script type="text/javascript">
	$(function () {
		var $p = window.top.document;
		var $left_a = $("#left a", $p);
		var keyArray = new Array;
		$left_a.each(function () {
			keyArray.push($(this).attr("href"))
		})
		 $(".subnav-menu a").click(function (e) {
			e.preventDefault();
			var $this = $(this);
			var $h = $(this).attr("href");
			var $eq = $.inArray($h, keyArray);
			if ($eq) {
				window.parent.lfet_select_menu($eq);
				if ($this.attr("rel")) {
					window.top.location = $h;
				} else {
					if ($h != "没有权限") {
						$("#mainFrame", $p).attr("src", $h);
					} else {
						alert('没有权限');
					}

				}
			} else {
				alert('没有权限');
			}

		});

	});

</script>