<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/chosen/chosen.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
	<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
	<script type="text/javascript" src="<?php echo RES;?>/src/plugins/chosen/chosen_jquery_min.js"></script>
	<script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
	<title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
	<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
    <!--[if lte IE 9]><script src="<?php echo RES;?>/src/watermark.js"></script><![endif]-->
	<!--[if IE 7]><link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet" /><![endif]-->
</head>
<body>
	 <div id="main">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span7">
                                <h3><i class="icon-table"></i>会员列表</h3>
                            </div>
                            <div class="span5">
                                <form action="/npManage/member/memberlist.act" method="get" class="form-horizontal  pull-right">
                                    <input type="text" id="keyword-input" name="keyword-input" value="" class="input-small-z" placeholder="请输入关键词" data-rule-required="true" />
                                    <select name="integral-grade" class="input-small">
                                        <option value="">全部会员</option>
                                                                                
                                    </select>
                                    <select name="type" class="input-small">
                                    	<option selected="selected"value="cardnumber">会员卡号</option>
                                        <option  value="name">用户名</option>
                                        <option  value="phone">手机号码</option>
                                    </select>
                                    <button class="btn">查询</button>
                                </form>
                            </div>
                        </div>

                        <div class="box-content">
                            <div class="alert">
                                <span class="member-count">会员总数: 1</span> <span>今日新增: 1</span>
                            </div>
                            <div class="row-fluid">
                                <div class="span12 control-group">
                                    <div class="span3">
                                        <a class="btn" href="/newmem/MemberExport?aid=77724" target="_blank"><i class="icon-cloud-download"></i>导出会员</a>
                                        <a class="btn" href="javascript:location.reload()"><i class="icon-refresh"></i>刷新</a>
                                    </div>
                                    <div class="pull-left datatabletool">
                                        <button class="btn" title="批量解冻"><i class="icon-unlock"></i>批量解冻</button>
                                        <button class="btn" title="批量冻结"><i class="icon-lock"></i>批量冻结</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row-fluid dataTables_wrapper">
                                    <table id="listTable" class="table table-bordered table-hover  dataTable">
                                        <thead>
                                            <tr>
                                                <th class='with-checkbox'><input type="checkbox" class="check_all" /></th>
                                                <th>会员卡号</th>
                                                <th>姓名</th>
                                                <th>手机号码</th>
                                                <th>领卡时间</th>
                                                <th>余额</th>
                                                <th>剩余积分</th>
                                                <th>会员等级</th>
                                                <th>状态</th>
                                                <th class="input-xlarge">操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                            <td class="with-checkbox">
                                                <input type="checkbox" name="check" value="1"/>
                                            </td>
                                            <td>1000001</td>
                                            <td><?php echo ($vo["wechaname"]); ?></td>
                                            <td><?php echo ($vo["tel"]); ?></td>
                                            <td><?php echo (date("Y-m-d H:i:s",$vo["getcardtime"])); ?></td>
                                            <td>0.00</td>
                                            <td><?php echo ($vo["total_score"]); ?></td>
                                            <td>普通会员</td>
                                            <td>
                                                <span class="label label-satgreen">正常</span>
                                            </td>
                                            <td>
                                                <a href="javascript:;" class="btn pay" data-codeid="205045"
                                                   title="充值"><i class="icon-yen"></i></a>
                                                <a href="javascript:;" class="btn buy" data-codeid="205045"
                                                   title="消费"><i class="icon-usd"></i></a>
                                                <a href="javascript:;" class="btn bestow" data-codeid="205045"
                                                   title="赠送积分"><i class="icon-money"></i></a>
                                                <!--<a class="btn" href="/newmem/SaleStatics?aid=77724&id=205045" title="使用统计"><i class="icon-bar-chart"></i></a>-->
                                                <a class="btn"
                                                   href="/Newmembertrade/statisticConsumption?aid=77724&member_id=205045"
                                                   title="使用统计"><i class="icon-bar-chart"></i></a>
                                                <a href="/newmem/MemberEdit/aid/77724/id/205045" class="btn" title="编辑"><i
                                                        class="icon-edit"></i></a>

                                                <a href="javascript:G.ui.tips.confirm('您确定要冻结吗?', '/newmem/freeze/id/205045/aid/77724');"
                                                   class="btn" title="冻结"><i class="icon-lock"></i></a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </tbody>
                                    </table>
                                 <div class="dataTables_paginate paging_full_numbers"><span><?php echo ($page); ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="Form1" action="/newmembertrade/recharge" method="post" class="form-horizontal form-validate form-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="icon-check"></i>会员充值</h4>
                    </div>
                    <div class="modal-body">
						<div class="control-group">
	<label class="control-label" for="price">充值金额</label>
	<div class="controls">
		<div class="input-append">
			<input type="text" placeholder="金额" name="price" id="price" class="input-small" data-rule-required="true"  data-rule-ismoney="true" />
			<span class="add-on"><i class="icon-cny"></i></span>
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="price">充值门店</label>
	<div class="controls">
		<select name="spoutlet_id" class="input-medium chosen-select" data-rule-required="true" data-placeholder="选择门店" data-tips="true">
			<option selected="selected" value="0" >商户总部</option>
					</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="price">操作员</label>
	<div class="controls">
		<input class="input-medium" type="text" placeholder="请填写操作员名称" name="nick" />
	</div>
</div>						<input type="hidden" id="aid" name="aid" value="77724"/>
                        <input type="hidden" id="codeid" name="memberid" />
						<input type="hidden" id="urls" name="urls" value="/newmem/MemberList?aid=77724"/>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">提交</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="Form2" action="/newmembertrade/consume" method="post" class="form-horizontal form-validate form-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="icon-check"></i>会员消费</h4>
                    </div>
                    <div class="modal-body">
						<div class="control-group">
	<label class="control-label" for="money">消费金额</label>
	<div class="controls">
		<div class="input-append">
			<input type="text" placeholder="金额" name="money" id="money" class="input-small" data-rule-required="true"  data-rule-ismoney="true" />
			<span class="add-on"><i class="icon-cny"></i></span>
		</div>
	</div>
</div>

<!--<div class="control-group select_coupon hide" >
	<label class="control-label" for="money">请选择我的优惠券</label>
	<div class="controls">
		<select name="ticket_id" id="ticket_id" class="input-medium" data-rule-required="true">
		</select>
	</div>
</div>-->

<div class="control-group select_coupon hide">
	<label class="control-label" for="money">请选择我的优惠</label>
	<div class="controls">
		<select name="ticket_ty" id="ticket_ty" class="input-small" data-rule-required="false">
		</select>
		<select name="ticket_id" id="ticket_id" class="input-medium">
		</select>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="money">支付方式</label>
	<div class="controls">
		<select name="but_ty" class="input-medium" data-rule-required="true" data-rule-number="true">
			<option value="">请选择消费方式</option>
			<option value="2">会员卡余额消费</option>
			<option value="1">现金或POS机消费</option>
		</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="price">消费门店</label>
	<div class="controls">
		<select name="spoutlet_id" class="input-medium chosen-select" data-rule-required="true">
			<option selected="selected" value="0" >商户总部</option>
					</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="price">消费密码</label>
	<div class="controls">
		<input class="input-medium" type="text" placeholder="请输入消费密码" name="password" data-rule-required="true" id="password" />
	</div>
</div>

</div>
<!--<script type="text/javascript">-->
<!---->
<!--	var $$memberid = G.string.Empty;-->
<!--	var options = {-->
<!--		ajax: '/Newmembertrade/getConsumptiontype?aid=--><!--&memberid={0}'.format($$memberid),-->
<!--		auto: true,-->
<!--		default_text:"不使用"-->
<!--	};-->
<!---->
<!--	var sel = new G.util.select(options);-->
<!--	sel.bind('#ticket_ty');-->
<!--	sel.bind('#ticket_id');-->
<!--</script>-->
						<input type="hidden" id="aid" name="aid" value="77724"/>
                        <input type="hidden" id="userid" name="memberid" />
						<input type="hidden" id="urls" name="urls" value="/newmem/MemberList?aid=77724"/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">提交</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>

                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="myModal4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="Form3" action="/newmembertrade/integral" method="post" class="form-horizontal form-validate form-modal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="icon-check"></i>手动修改积分</h4>
                    </div>
                    <div class="modal-body">
						<div class="control-group">
	<label class="control-label" for="price">修改积分(增减)</label>
	<div class="controls">
		<input type="text" placeholder="积分" name="score" id="Text1" class="input-small" data-rule-required="true" data-rule-number="true" /><span class="help-block"> 输入500,则标识增加500;输入-500则表示减少500</span>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="price">修改门店</label>
	<div class="controls">
		<select name="spoutlet_id" class="input-medium chosen-select" data-rule-required="true" data-placeholder="选择门店" data-tips="true">
			<option selected="selected" value="0" >商户总部</option>
					</select>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="price">操作员</label>
	<div class="controls">
		<input class="input-medium" type="text" placeholder="请填写操作员名称" name="nick" />
	</div>
</div>						<input type="hidden" id="aid" name="aid" value="77724"/>
						<input type="hidden" id="urls" name="urls" value="/newmem/MemberList?aid=77724"/>
                        <input type="hidden" id="memberid" name="memberid" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">提交</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">取消</button>

                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript">
        $(function () {

            //消费
            $("tr").delegate(".pay", "click", function () {
                $("#price").val("");
                $("#codeid").val($(this).attr("data-codeid"));
                $("#myModal2").modal("show");

            });
            //消费
            $("tr").delegate(".buy", "click", function () {
                $("#money").add("#password").val("");
                $("#userid").val($(this).attr("data-codeid"));
                $("#myModal3").modal("show");

				$select_coupon=$("div.select_coupon");
				$select_coupon.show();
				var options = {
					ajax: '/Newmembertrade/getConsumptiontype?aid=77724&memberid={0}'.format($(this).attr("data-codeid")),
					auto: true,
					default_text:"不使用"
				};
				var sel = new G.util.select(options);
				sel.bind('#ticket_ty');
				sel.bind('#ticket_id');

            });
            //赠送积分
            $("tr").delegate(".bestow", "click", function () {
                $("#score").val("100");
                $("#memberid").val($(this).attr("data-codeid"));
                $("#myModal4").modal("show");
            });


				
        });
    </script></body>
</html>