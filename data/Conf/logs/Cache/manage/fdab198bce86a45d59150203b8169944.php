<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
    <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
    <link rel="shortcut icon" href="img/favicon.ico<?php echo RES;?>/src/" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/page/wx_vip.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/jscolor/jscolor.js"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
    <title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css<?php echo RES;?>/src/" rel="stylesheet" />
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="<?php echo RES;?>/js/excanvas_min.js<?php echo RES;?>/src/"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/js/watermark.js<?php echo RES;?>/src/"></script>
    <![endif]-->
</head>
    <link href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" rel="stylesheet" />
	<script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
	<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js"></script>
    <div id="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span8">
                                <h3><i class="icon-table"></i>业务关联 </h3>
                            </div>

                        </div>

                        <div class="box-content">
                             <ul class="nav nav-tabs">
                                 <li><a href="/npManage/member/addcard.act">卡片设置</a> </li>
                                 <li><a href="/npManage/member/memberFields.act">会员资料设置</a></li>
                                <li><a href="/npManage/member/listprivilege.act">会员卡特权</a></li>
                                <li   class="active"><a href="javascript:;">业务关联</a></li>
                                <li><a href="/npManage/member/setcardlevel.act">等级设置</a></li>
                            </ul>
                            <div class="alert">
								您最多可以创建3个业务!
							</div>
                            <div class="row-fluid">
                                <div class="span8 control-group">
                                	<a href="member-editprogram.html" class="btn" id="add_menu"><i class="icon-plus"></i>添加业务</a>
                                </div>

                            </div>
                            <div class="row-fluid dataTables_wrapper">
                                    <table id="listTable" class="table table-bordered table-hover dataTable">

                                        <thead>
                                            <tr>
                                                <th>业务名称</th>
												<th>显示顺序</th>
												<th>事件类型</th>
												<th>事件行为</th>
												<th>操作</th>
                                            </tr>
                                        </thead>
                                        
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

	<script>
		window.document.onkeydown = function(e) {
			if ('' == document.activeElement.id) {
				var e=e || event;
　 				var currKey=e.keyCode || e.which || e.charCode;
				if (8 == currKey) {
					return false;
				}
			}
		};
	</script>
</html>