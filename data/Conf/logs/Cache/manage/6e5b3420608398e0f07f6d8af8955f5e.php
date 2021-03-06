<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
        <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
        <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
		<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
		<script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
		<title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
        <!--[if IE 7]>
            <link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet" />
        <![endif]-->
        <!--[if lte IE 8]>
            <script src="js/excanvas_min.js"></script>
        <![endif]-->
        <!--[if lte IE 9]>
            <script src="js/watermark.js"></script>
        <![endif]-->
    </head>
      <script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
    <div id="main">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span10">
                                <h3><i class="icon-edit"></i>等级设置 </h3>
                            </div>
                        </div>

                        <div class="box-content">
                            <ul class="nav nav-tabs">
                                <li><a href="/npManage/member/addcard.act">卡片设置</a> </li>
                                <li><a href="/npManage/member/memberFields.act">会员资料设置</a></li>
                                <li><a href="/npManage/member/listmemberprivilege.act">会员卡特权</a></li>
                                <li><a href="/npManage/member/listprogram.act">业务关联</a></li>
                                <li class="active"><a href="javascript:;">等级设置</a></li>
                            </ul> 
                            <form action="/npManage/member/setCardLevel.act" method="post" class="form-horizontal form-validate">
                            
                                    
                            
                            	<div class="control-group">
                                    <label class="control-label">等级设置规则：</label>
                                    <div class="controls"> 
                                        <label class="radio inline">
                                            <input type="radio" name="basis" value="0" checked="checked" data-href="normal" />总积分
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="basis" value="1"  data-href="marketing" />总消费
                                        </label>
                                    </div>
                                </div>
                                <table id="rank_table" class="table table-bordered table-hover  dataTable">
                                    <thead>
                                        <tr>
                                            <th>会员等级</th>
                                            <th>额度设置(必须为整数)</th>
                                              <th>折扣率(输入100则代表无折扣 [1-100] 必须正整数)</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody id="grade_list">
                                    	                                        

                                    </tbody>
                                    
                                    <tfoot>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                        <td>
                                            <input type="text" name="ps[<?php echo ($vo["id"]); ?>][cname]" id="ps[<?php echo ($vo["id"]); ?>][cname]" value="<?php echo ($vo["cname"]); ?>" class="input-medium " data-rule-required="true"></td>
                                        <td>
                                            <input type="text" name="ps[<?php echo ($vo["id"]); ?>][bscore]" id="ps[<?php echo ($vo["id"]); ?>][bscore]" class="input-mini star" value="<?php echo ($vo["bscore"]); ?>" data-rule-required="true" data-rule-number="true">
                                            -
                                            <input type="text" name="ps[<?php echo ($vo["id"]); ?>][escore]" id="ps[<?php echo ($vo["id"]); ?>][escore]" value="<?php echo ($vo["escore"]); ?>" class="input-mini end" data-rule-required="true" data-rule-number="true"></td>
                                        <td>
                                            <input type="text" name="ps[<?php echo ($vo["id"]); ?>][zk]" id="ps[<?php echo ($vo["id"]); ?>][zk]" class="input-mini" data-rule-required="true" data-rule-integer="true" data-rule-range="[1,100]" value="<?php echo ($vo["zk"]); ?>"><span class="help-inline">%</span>
                                        </td>
                                        <td><a href="javascript:G.ui.tips.confirm('确定删除？','/npManage/member/delLevel.act?id=<?php echo ($vo["escore"]); ?>');">删除</a></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <tr>

                                        <td>
                                            <input type="text" name="sxname" id="sxname" value="<?php echo ($info["cname"]); ?>" class="input-medium "
                                                   data-rule-required="true"/></td>
                                        <td>
                                            <input type="text" name="sxstarjf" id="sxstarjf" value="<?php echo ($info["bscore"]); ?>"
                                                   class="input-mini endstar" data-rule-required="true"
                                                   data-rule-integer="true"/>
                                            -不限
                                        </td>
                                        <td>
                                            <input type="text" name="sxzk" id="sxzk" value="<?php echo ($info["zk"]); ?>" class="input-mini"
                                                   data-rule-required="true" data-rule-integer="true"
                                                   data-rule-range="[1,100]"/><span class="help-inline">%</span>
                                            <input type="hidden" name="zid" id="zid" value="<?php echo ($info["id"]); ?>">
                                        </td>
                                        <td></td>
                                    </tr>
                                    </tfoot>

                                </table>
                                <div>
                                	<input type="hidden" name="score_id" id="score_id" value="">
                                	<input type="hidden" name="aid" id="aid" value="73272">
                                    <button type="button" class="btn disabled"  id="addrank">添加</button>
                                    <button type="button" class="btn"  id="changegrade">更新等级</button>
                                    *如等级设置规则或额度设置有变动，请修改完先更新会员等级再保存
                                    <br/>
									<br/>
                                    <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="loading hide"  style="position: absolute;top: 40%;left: 40%;z-index:1041">会员等级更新中...</div>
    <div class="modal-backdrop fade in hide"></div>
    <script type="text/javascript">
  $(function () {
            var $grade_index = 0; 
            $("#addrank").click(function () {
                $grade_index++;
                var tmp = '<tr> <td> <input type="text" name="add[' + $grade_index + '][name]" id="add[' + $grade_index + '][name]"  class="input-medium " data-rule-required="true" /></td>'
                  + '  <td> <input type="text" name="add[' + $grade_index + '][startjf]" id="add[' + $grade_index + '][startjf]" class="input-mini star"  data-rule-required="true" data-rule-integer="true" />'
                  + '  - <input type="text" name="add[' + $grade_index + '][endjf]"  id="add[' + $grade_index + '][endjf]" class="input-mini end" data-rule-required="true" data-rule-integer="true" /></td>'
                  + '<td><input type="text" name="add[' + $grade_index + '][zk]" id="add[' + $grade_index + '][zk]" class="input-mini" data-rule-required="true" data-rule-integer="true" data-rule-range="[1,100]" value="100" /><span class="help-inline">%</span></td>'
                   + '<td><a href="javascript:;" class="del">删除</a></td> </tr>';
                var trlength = $("#rank_table tr").length;
                if (trlength < 11) {
                    $("#grade_list").append(tmp);
                } else {
                    G.ui.tips.info("最多添加10个等级");
                }

            });
            $("#rank_table .del").live("click", function () {
                $(this).parents("tr").remove();
            });
            var $bsubmit = $("#bsubmit");
            $("input.star").live("blur", function () {
                var s=$(this);
                var e=$(this).next();
                verification_jf(s,e);
            })
            $("input.end").live("blur", function () {
                var s = $(this).prev();
                var e = $(this);
                verification_jf(s, e);
            });
            $("input.endstar").live("blur", function () {
                var $this = $(this);
             
                var $this_val = parseInt($this.val());
                var $end_jf = parseInt($('#rank_table tbody tr:last').find(".end").val()); 
                if ($this_val <= $end_jf) {
                    $bsubmit.addClass("disabled").attr("disabled", "disabled");
                    $this.addClass("error");
                    G.ui.tips.err("开始积分必须大于 上个等级的结束积分");
                } else {
                    $bsubmit.removeClass("disabled").removeAttr("disabled", "disabled");
                }
            });
            function verification_jf($star, $end) { 
                var $p_end_val = parseInt($star.parents("tr").prev().find(".end").val()); 
                var $star_val = parseInt($star.val());
                if ($p_end_val) { 
                    if ($star_val <= $p_end_val) { 
                        $bsubmit.addClass("disabled").attr("disabled", "disabled");
                        $star.addClass("error");
                        G.ui.tips.err("开始积分必须大于 上个等级的结束积分");
                    }
                }
                var $end_val = parseInt($end.val()); 
                if ($star_val >= $end_val) {
                    $bsubmit.addClass("disabled").attr("disabled", "disabled");
                    $star.addClass("error");
                    G.ui.tips.err("开始积分必须小于结束积分");
                } else {
                    $bsubmit.removeClass("disabled").removeAttr("disabled", "disabled");
                }
            }

            $bsubmit.on("click", function () {
                var $ee = $("input.error");
                if ($ee.length>0) {
                    $("input.error:eq(0)").focus();
                    return false;
                } 
            });


            $("#changegrade").on("click", function () {
               //显示
                $(".loading").show();
                $(".modal-backdrop").show();

                $.ajax({ 
                    type: "post", 
                    url: "/npManage/member/setcardlevel.act",
                    dataType: "json", 
                    success: function (html) {
                    	$(".loading").hide();
                        $(".modal-backdrop").hide();
                        alert("等级更新成功！") 
                    }, 
                    error: function (XMLHttpRequest, textStatus, errorThrown) { 
                    	$(".loading").hide();
                        $(".modal-backdrop").hide();
                        alert("系统繁忙！，请稍后再试")
                    } 
            	});
            }); 
            
             
        }) 
    </script>
</html>