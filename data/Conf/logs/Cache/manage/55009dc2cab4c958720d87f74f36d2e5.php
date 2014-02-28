<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="Keywords" content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
        <meta name="Description" content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
        <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico?v=2014-02-20-1" />
        <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-20-1" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-20-1" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-20-1" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-20-1" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css?2014-02-20-1" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css?2014-02-20-1" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/colorpicker/colorpicker.css?2014-02-20-1" media="all" />
		<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/colorpicker/bootstrap_colorpicker.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/jscolor/jscolor.js?2014-02-20-1"></script>
		<script type="text/javascript" src="<?php echo STATICS;?>/inside.js?2014-02-20-1"></script>
		<title>微盟（Weimob）—国内最大的微信公众服务平台</title>
        <!--[if IE 7]>
            <link href="<?php echo RES;?>/css/font_awesome_ie7.css?v=2014-02-20-1" rel="stylesheet" />
        <![endif]-->
        <!--[if lte IE 8]>
            <script src="<?php echo RES;?>/js/excanvas_min.js?v=2014-02-20-1"></script>
        <![endif]-->
        <!--[if lte IE 9]>
            <script src="<?php echo RES;?>/js/watermark.js?v=2014-02-20-1"></script>
        <![endif]-->
    </head>
    <style type="text/css">
.plug-menu
{
	width:36px;
	height:36px;
	border-radius:36px;
	-moz-box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
	-webkit-box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
	box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
	position:relative;
}
.plug-menu span
{
	display:block;
	width:28px;
	height:28px;
	background:url({np:RES}/img/plugmenu/plugmenu.png) no-repeat;
	-moz-background-size:28px 28px;
	-o-background-size:28px 28px;
	-webkit-background-size:28px 28px;
	background-size:28px 28px;
	text-indent:-999px;
	position:absolute;
	top:4px;
	left:4px;
	overflow:hidden;
}
.ico-views
{
	font-size:30px;
	color:#fff;
	padding:5px;
}
</style>

<script>
$(document).ready(function(){
			$('#plugmenucolor').css('backgroundColor', '#B70000');
	});
</script>

<body>
    <div id="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="box">
                        <div class="box-title">
                            <div class="span12">
                                <h3><i class="icon-table"></i>快捷与版权 <small>提供一键拨号，一键导航等等快捷功能</small></h3>
								<a class="btn preview pull-right btn-success" href="javascript:;">微官网预览</a>
								<script type="text/javascript">
									$("a.preview").click(function () {
										if ($.browser.msie) {
											alert("不支持在IE浏览器下预览，建议使用谷歌浏览器或者360极速浏览器或者直接在微信上预览。");
											return;
										}
										var left = ($(window.parent.parent).width() - 450) / 2;
																				window.open("/wechat.wx/<?php echo ($token); ?>?wechatid=fromUsername", "我的微官网", "height=650,width=450,top=0,left=" + left + ",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no");
									});
								</script>
                            </div>
                        </div>
                        <div class="box-content">
                            <ul class="nav nav-tabs">
                            	                                <li class="active"><a href="#menu" data-toggle="tab">快捷菜单</a></li>
                                <li class=""><a href="#color" data-toggle="tab">样式和版权</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane in active" id="menu">
                                    <div class="span12 control-group">
                                        <a class="btn" href="/microsite/Plugmenued/aid/72040"><i class="icon-plus"></i>新增快捷菜单</a>
                                    </div>
                                    <table id="listTable" class="table table-bordered table-hover dataTable ajax-checkbox" ajax-url="/microsite/plugmenu_show" ajax-length="0">
                                        <thead>
                                            <tr>
                                                <th>图标</th>
                                                <th>名称</th>
                                                <th>回复类型</th>
                                                <th>显示顺序</th>
                                                <th>是否显示</th>
                                                <th>操作 </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                    </tbody>
                                    </table>
                                </div>
								<div class="tab-pane fade" id="color">
									<form action="/microsite/plugmenu" method="post" class="form-horizontal form-validate">
										<input type="hidden" name="aid" value="72040"/>
										<input type="hidden" name="id" value="20315"/>
										<table>
											<tbody>
												<tr style="height:60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="0"  />样式0
														</label>
													</td>
													<td>
														<div class="plug-menu" id="plugmenucolor" style="background-color:#B70000;"><span></span></div>
													</td>
													<td>
														<strong>请选择快捷菜单的颜色：</strong>
																												<input type="text" name="namecolor" id="themeStyle" value="#B70000" class="color" style="width: 55px; background-image: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" onblur="document.getElementById('plugmenucolor').style.backgroundColor=document.getElementById('themeStyle').value;">
													</td>
												</tr>
												<tr style="height:60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="1"  />样式1
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b_1.jpg?v=SOURCEVERSON" style="width:255px; height:44px;" />
													</td>
												</tr>
												<tr style="height: 60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="2"  />样式2
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b.png?v=SOURCEVERSON" style="width:255px; height:44px;" />
													</td>
												</tr>
												<tr style="height: 60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="3" checked="checked" />样式3
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b3.png?v=SOURCEVERSON" style="width:255px; height:44px;" />
													</td>
												</tr>
												<tr style="height: 60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="4"  />样式4
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b4.png?v=SOURCEVERSON" style="width:255px; height:44px;" />
													</td>
												</tr>
												<tr style="height: 60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="5"  />样式5
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b5.png?v=SOURCEVERSON" style="width:255px; height:44px;" />
													</td>
												</tr>
												<tr style="height: 60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="6"  />样式6
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b6.png?v=SOURCEVERSON" style="width:255px; height:44px;" />
													</td>
												</tr>
												<tr style="height: 60px;">
													<td>
														<label class="radio">
															<input type="radio" name="homemenu" value="7"  />样式7
														</label>
													</td>
													<td colspan="2">
														<img src="img/plugmenu/plugmenu_b7.png?v=SOURCEVERSON" style="width:57px; height:280px;" />
														<span class="help-inline">此导航仅支持模板：微盟推荐</span>
													</td>
												</tr>
												<tr>
													<td align="left"><strong>设置页面版权：</strong></td>
													<td align="left" colspan="2">
														<input type="text" id="copyright" name="copyright" value="乌龟背上看江山6" class="input-xlarge">
														<span class="help-inline"></span>
													</td>
												</tr>
											</tbody>
										</table>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">保存</button>
											<button type="button" class="btn" onclick="window.history.go(-1)">取消</button>
										</div>
									</form>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
	$(function(){
		$("div.tab-pane input[type='radio']").click(function(){
			var $this = $(this), $key = $this.attr("name"), $value = $this.val();
			var _pli = $this.parents("li");
			_pli.siblings().removeClass("active")
			_pli.addClass("active");
			$.post('/microsite/template/aid/72040', { key: $key, value: $value }, function(rs){
				if(200 != rs.code){
					G.ui.tips.err(rs.error);
				}
			}, 'json');
		})
	})
</script>	<script>
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