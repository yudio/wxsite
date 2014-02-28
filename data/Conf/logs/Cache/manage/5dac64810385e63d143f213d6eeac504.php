<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_min.css?2014-02-20-1" media="all" />
<link rel="stylesheet" type="text/css" href="css/bootstrap_responsive_min.css?2014-02-20-1" media="all" />
<link rel="stylesheet" type="text/css" href="css/style.css?2014-02-20-1" media="all" />
<link rel="stylesheet" type="text/css" href="css/todc_bootstrap.css?2014-02-20-1" media="all" />
<link rel="stylesheet" type="text/css" href="css/themes.css?2014-02-20-1" media="all" />
<link rel="stylesheet" type="text/css" href="css/inside.css?2014-02-20-1" media="all" />
<script type="text/javascript" src="src/jQuery.js?2014-02-20-1"></script>
<script type="text/javascript" src="src/bootstrap_min.js?2014-02-20-1"></script>
<script type="text/javascript" src="src/inside.js?2014-02-20-1"></script>
<title>微盟（Weimob）—国内最大的微信公众服务平台</title>
	<link rel="shortcut icon" href="img/favicon.ico" />
    <!--[if lte IE 9]><script src="src/watermark.js"></script><![endif]-->
	<!--[if IE 7]><link href="css/font_awesome_ie7.css" rel="stylesheet" /><![endif]-->
</head>
<body>
	    <div id="main">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span8">
                                <h3><i class="icon-table"></i>自定义文本回复信息</h3>
                            </div>
                            <div class="span4">
                                <div class="form-horizontal">
                                    <input type="text" id="keyword-input" class="input-small-z" placeholder="请输入关键词">
                                    <select name="type" class="input-small" id="select_type">
                                        <option selected="selected" value="0">全部</option>
                                        <option value="1">完全匹配</option>
                                        <option value="2">包含匹配</option>
                                    </select>
                                    <button class="btn" id="btn_search">查询</button>
									<input type="hidden" name="aid" id ="aid" value="72040">

                                </div>
                            </div>
                        </div>

                        <div class="box-content nozypadding">
                            <div class="row-fluid">
                                <div class="span8 control-group">
                                    <div class="span3">
                                        <a class="btn" href="addtext.html"><i class="icon-plus"></i>添加</a>
                                        <a class="btn" href="javascript:location.reload();"><i class="icon-refresh"></i></a>
                                    </div>

                                    <div class="span9 datatabletool">

                                        <div class="btn-group">
                                            <a class="btn" style="display:none;" title="批量导入文本"><i class="icon-upload-alt"></i></a>
                                            <a class="btn" style="display:none;" title="批量导出本页文本结果"><i class="icon-download-alt"></i></a>
                                            <a class="btn" attr="BatchDel" title="删除"><i class="icon-trash"></i></a>
                                        </div>
                                        <div class="btn-group" style="display:none;">
                                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle" title="移动"><i class="icon-folder-close"></i>移动到<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="#">优惠券</a>
                                                </li>
                                                <li>
                                                    <a href="#">功能说明</a>
                                                </li>
                                                <li>
                                                    <a href="#">刮刮卡</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="row-fluid dataTables_wrapper">
                                    <table id="listTable" class="table table-hover table-nomargin table-bordered usertable dataTable">
                                        <thead>
                                            <tr>
                                                <th class='with-checkbox'>
                                                    <input type="checkbox" class="check_all"></th>
                                                <th>关键词</th>
                                                <th>回答</th>
                                                <th>匹配类型</th>
                                                <th>时间</th>
                                                <th>操作</th>
                                            </tr>

                                        </thead>
                                        <tbody>

																						<tr>
                                                <td class="with-checkbox">
                                                    <input type="checkbox" name="check" value="99929">
                                                </td>
                                                <td>关注啊</td>
                                                <td>adfadf/鄙视</td>
                                                <td><span class="label label-satgreen">模糊</span></td>
                                                <td>2014-02-22</td>
                                                <td class='hidden-480'>
                                                    <a href="#" style="display:none;" class="btn" rel="tooltip" title="View"><i class="icon-search"></i></a>
                                                    <a href="/wechat/addtext/aid/72040/tid/99929" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                                    <a href="javascript:void(0);" class="btn" rel="tooltip" title="Delete" attr="deltext_72040_99929"><i class="icon-remove"></i></a>
                                                </td>
                                            </tr>
											
                                        </tbody>

                                    </table>

		<div class="dataTables_paginate paging_full_numbers"><span>       </span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

	<script>
	$(function(){
		var delText = function(event){
			if(confirm("您确定要删除吗?")) {
				$.post('/wechat/deltext', {aid:event.data.aid, tid:event.data.tid},function(data){
					if (data.errno ==0)
					{
						location.reload();
					} else {
						alert(data.error);
					}


				},'json');

			}
		};

		$("a[attr^='deltext_']").each(function(){
			var tmp = $(this).attr('attr').split('_');
			$(this).bind("click", {aid:tmp[1], tid:tmp[2]}, delText);
		});


		$("[attr='BatchDel']").click(function(){
			var check = $("input:checked");
			if(check.length<1){
				alert('请选择删除项');
				return false;
			}
			var id = new Array();
			check.each(function(i){
				id[i] = $(this).val();
			});

			$.post('/wechat/deltextbatch', {tid:id, aid:$('#aid').val()},function(data){
				if (data.errno ==0)
				{
					location.reload();
				} else {
					alert(data.error);
				}


			},'json');

		});

    $("#btn_search").click(function(){
        var keywords = $.trim($('#keyword-input').val());
        if (keywords.length <= 0) {
            alert('请输入搜索关键字.');
            $('#keyword-input').focus();
            return false;
        }
        window.location.href = '/wechat/replytext/aid/'+$('#aid').val()+'/type/'+$('#select_type').val()+'/keywords/' + keywords;

    });

    $("#keyword-input").keyup(function(e) {
        if (e.keyCode == 13) {
            $("#btn_search").click();
            return false;
        }
    });
	});
	</script></body>
</html>