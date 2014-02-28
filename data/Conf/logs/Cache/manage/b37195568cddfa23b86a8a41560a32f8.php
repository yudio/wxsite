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
                                <h3><i class="icon-table"></i>自定义图文回复信息</h3>
                            </div>
                            <div class="span4">
                                <div class="form-horizontal">
                                    <input type="text" id="keyword-input" class="input-small-z" value="" placeholder="请输入关键词">
                                    <select name="type" class="input-small" id="select_type">
                                        <option  selected="selected" value="0">全部</option>
                                        <option value="1" >完全匹配</option>
                                        <option value="2"  >包含匹配</option>
                                    </select>
                                    <button class="btn" id="btn_search">查询</button>
									<input type="hidden" name="aid" id ="aid" value="72040">


                                </div>
                            </div>
                        </div>

                        <div class="box-content nozypadding">
                            <div class="row-fluid">
                                <div class="span8 control-group">
                                    <div class="span5">
                                        <a class="btn" href="addnews.html"><i class="icon-plus"></i>添加</a>
                                        <a class="btn" href="javascript:location.reload();"><i class="icon-refresh"></i></a>
                                        <select name="cate" class="input-medium" style="margin:1px 20px 0"  id="cate"><option value="0">根分类</option><option value='209425'  >&nbsp;&nbsp;&nbsp;&nbsp;test1</option><option value='209427'  >&nbsp;&nbsp;&nbsp;&nbsp;test2</option></select>
                                    </div>

                                    <div class="span4 datatabletool">

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
                                <form method="post" action="" id="listForm">
                                    <table id="listTable" class="table table-hover table-nomargin table-bordered usertable dataTable">
                                        <thead>
                                            <tr>
                                                <th class='with-checkbox'>
                                                    <input type="checkbox" class="check_all"></th>
                                                <th>关键词</th>
                                                <th>回答</th>
                                                <th>匹配类型</th>
                                                <th>时间</th>
                                                <th>排序id</th>
                                                <th>操作</th>
                                            </tr>

                                        </thead>
                                        <tbody>
											                                            <tr>
                                                <td class="with-checkbox">
                                                    <input type="checkbox" name="check" value="281474">
                                                </td>
                                                <td>美丽</td>
                                                <td>美丽的澎湖湾</td>
                                                <td><span class="label label-satgreen">完全</span></td>
                                                <td>2014-02-22</td>
                                                <td>10</td>
                                                <td class='hidden-480'>
                                                    <a href="#" class="btn" style="display:none;" rel="tooltip" title="View"><i class="icon-search"></i></a>
                                                    <a href="/wechat/addnews/aid/72040/tid/281474" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                                    <a href="javascript:void(0);" class="btn" rel="tooltip" title="Delete" attr="delnews_72040_281474"><i class="icon-remove"></i></a>
                                                </td>
                                            </tr>
											                                            <tr>
                                                <td class="with-checkbox">
                                                    <input type="checkbox" name="check" value="281487">
                                                </td>
                                                <td>爱的色放</td>
                                                <td>淡淡的</td>
                                                <td><span class="label label-satgreen">完全</span></td>
                                                <td>2014-02-22</td>
                                                <td>0</td>
                                                <td class='hidden-480'>
                                                    <a href="#" class="btn" style="display:none;" rel="tooltip" title="View"><i class="icon-search"></i></a>
                                                    <a href="/wechat/addnews/aid/72040/tid/281487" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                                    <a href="javascript:void(0);" class="btn" rel="tooltip" title="Delete" attr="delnews_72040_281487"><i class="icon-remove"></i></a>
                                                </td>
                                            </tr>
											                                            <tr>
                                                <td class="with-checkbox">
                                                    <input type="checkbox" name="check" value="281479">
                                                </td>
                                                <td>漂亮</td>
                                                <td>漂亮的澎湖湾</td>
                                                <td><span class="label label-satgreen">完全</span></td>
                                                <td>2014-02-22</td>
                                                <td>0</td>
                                                <td class='hidden-480'>
                                                    <a href="#" class="btn" style="display:none;" rel="tooltip" title="View"><i class="icon-search"></i></a>
                                                    <a href="/wechat/addnews/aid/72040/tid/281479" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>
                                                    <a href="javascript:void(0);" class="btn" rel="tooltip" title="Delete" attr="delnews_72040_281479"><i class="icon-remove"></i></a>
                                                </td>
                                            </tr>
											
                                        </tbody>

                                    </table>
                                </form>

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
		var delNews = function(event){
			if(confirm("您确定要删除吗?")) {
				$.post('/wechat/delnews', {aid:event.data.aid, tid:event.data.tid},function(data){
					if (data.errno ==0)
					{
						location.reload();
					} else {
						alert(data.error);
					}


				},'json');

			}
		};

		$("a[attr^='delnews_']").each(function(){
			var tmp = $(this).attr('attr').split('_');
			$(this).bind("click", {aid:tmp[1], tid:tmp[2]}, delNews);
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

			$.post('/wechat/delnewsbatch', {tid:id, aid:$('#aid').val()},function(data){
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
			window.location.href = '/wechat/replynews/aid/'+$('#aid').val()+'/type/'+$('#select_type').val()+'/keywords/' + keywords;

		});

		$("#keyword-input").keyup(function(e) {
			if (e.keyCode == 13) {
				$("#btn_search").click();
				return false;
			}
		});

		$("#cate").change(function() {
            window.location.href = '/wechat/replynews/aid/'+$('#aid').val()+'/cate/'+$('#cate').val();

		});




	});
	</script></body>
</html>