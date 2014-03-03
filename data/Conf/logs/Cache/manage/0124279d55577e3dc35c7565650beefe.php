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
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/daterangepicker/daterangepicker.css" media="all" />

    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/jscolor/jscolor.js"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/daterangepicker/moment_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/daterangepicker/daterangepicker.js"></script>
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
        <div id="main">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class="box">

                        <div class="box-title">
                            <div class="span10">
                                <h3><i class="icon-edit"></i>特权管理</h3>
                            </div>
                        </div>
                        <div class="box-content">
                            <ul class="nav nav-tabs">
                                <li><a href="/npManage/member/addcard.act">卡片设置</a> </li>
                                <li><a href="/npManage/member/memberFields.act">会员资料设置</a></li>
                                <li  class="active"><a href="javascript:;">会员卡特权</a></li>
                                <li><a href="/npManage/member/setcardlevel.act">等级设置</a></li>
                            </ul>
                            <input type="hidden" name="aid" id="aid" value="73272"/>
                            <div class="row-fluid">
                                <div class="span12 control-group">
                                    <div class="span2">
                                        <a class="btn" href="/npManage/member/addmemberprivilege.act"><i class="icon-plus"></i>添加特权</a>
                                    </div>
                                    <div class="pull-left datatabletool">
                                        <a class="btn" attr="CareDel" title="删除"><i class="icon-trash"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid dataTables_wrapper">
	
                                <table id="listTable" class="table table-bordered   table-hover  dataTable ajax-checkbox" ajax-url="/newmembercard/Is_show/aid/73272" ajax-length="1">
                                    <thead>
                                        <tr>
                                            <th class='with-checkbox'>
                                                <input type="checkbox" class="check_all" /></th>
                                            <th>特权时间</th>
                                            <th>特权标题</th>
                                            <th>特权内容</th>
                                            <th>展示</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="">
                                        <td class="with-checkbox">
                                            <input type="checkbox" name="check" value="5087"></td>
                                        <td><?php echo (date('Y-m-d H:i',$vo["btime"])); ?><span class="time-sep">至</span>
                                            <?php echo (date('Y-m-d H:i',$vo["etime"])); ?>
                                        </td>
                                        <td><?php echo ($vo["title"]); ?></td>
                                        <td><?php echo ($vo["content"]); ?></td>
                                        <td>
                                            <label class="radio">
                                                <input type="checkbox" name="show" id="is_show" data-id="5087" value="5087">
                                            </label>
                                        </td>
                                        <td>
                                            <span class="label <?php echo ($vo["label"]); ?>"><?php echo ($vo["flag"]); ?></span>
                                        </td>
                                        <td>
                                            <a href="/npManage/member/addmemberprivilege.act?id=<?php echo ($vo["id"]); ?>" class="btn" rel="tooltip" title="编辑"><i class="icon-edit"></i></a>
                                            <a href="javascript:G.ui.tips.confirm('您确定要删除吗?', '//npManage/member/delprivilege.act?id=<?php echo ($vo["id"]); ?>');" class="btn" rel="tooltip" title="删除"><i class="icon-remove"></i></a>

                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_8_paginate">
										
								</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 <script>

$(function(){
	$("[attr='CareDel']").click(function(){
		var check = $("input[name='check']:checked");
		if(check.length<1){
			alert('请选择删除项');
			return false;
		}
		var id = new Array();
		check.each(function(i){
			id[i] = $(this).val();
		});
		$.post('/newmembercard/TqDelCare', {id:id, aid:$('#aid').val()},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				console.log(data.error);
			}


		},'json');

	});
});
$(function(){
	$('#is_show').click(function(){
		var check = $("input[name='show']:checked");
		if(check.length>1){
			alert('展示项最多一项');
			return false;
		}
		$.post('/newmembercard/Is_show', {id:$('#is_show').val(), aid:$('#aid').val(),ck:check.length},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				console.log(data.error);
			}


		},'json');

	});
})
</script>   
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