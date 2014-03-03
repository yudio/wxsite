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
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/emotion.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/chosen/chosen.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/resource.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/emotion.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/chosen/chosen_jquery_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/app/resource.js"></script>
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
                            <div class="span10">
                                <h3><i class="icon-edit"></i>
编辑图文自定义内容</h3>
                            </div>
                            <div class="span2"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
                        </div>

                        <div class="box-content">
					<form action="/npManage/reply/addnews.act" method="post" class="form-horizontal form-validate">
								                                <div class="control-group">
                                    <label for="keyword" class="control-label">关键词：</label>
                                    <div class="controls">
                                        <input type="text" name="keyword" id="keyword" value="<?php echo ($info["keyword"]); ?>" data-rule-required="true" data-rule-maxlength="30" class="input-xlarge" title="多个关键词请用空格格开：例如: 美丽 漂亮 好看"><br>多个关键词请用空格格开：例如: 美丽 漂亮 好看
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">关键词类型：</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="match_type"value="1"  <?php if($info["match_type"] == 1): ?>checked="checked"<?php endif; ?> >
                                            完全匹配，用户输入的和此关键词一样才会触发!
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="match_type" value="2"  <?php if($info["match_type"] == 2): ?>checked="checked"<?php endif; ?> >
                                            包含匹配 (只要用户输入的文字包含本关键词就触发！
                                        </label>
                                    </div>
                                </div>
							                                <div class="control-group">
                                    <label for="title" class="control-label">标题：</label>
                                    <div class="controls">
                                        <input type="text" name="title" id="title" value="<?php echo ($info["title"]); ?>" data-rule-required="true" data-rule-maxlength="100" class="input-xlarge">
                                        <span class="maroon">*</span>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="picurl" class="control-label">排序id：</label>
                                    <div class="controls">
                                       <input type="text" ata-rule-number="true" class="input-mini" value="<?php echo (($info["sort"])?($info["sort"]):"0"); ?>" size="3" name="sort_id"><span style="color:red;" class="help-inline">(id越大，在所属官网分类文章列表中显示越靠前)</span>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="picurl" class="control-label">图文封面：</label>
                                    <div class="controls">
											<img id="thumb_img" src="<?php echo ($info["pic"]); ?>" style="max-height:100px;" />
                                            <input id="thumb" type="text" name="pic" value="<?php echo ($info["pic"]); ?>" class="input-xlarge" readonly="readonly" data-rule-required="true" data-rule-url="true" />
                                                                                <span class="help-inline"><a class="btn" id="insertimage">选择图文封面</a></span>  建议大小(宽720高400)
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="introduction" class="control-label">简介：</label>
                                    <div class="controls">
                                        <textarea id="introduction" name="info" data-rule-required="true" data-rule-maxlength="200" style="width: 580px; height: 100px"><?php echo ($info["info"]); ?></textarea><span class="maroon">*</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="article_class" class="control-label">所属类别：</label>
                                    <div class="controls">
                                        <select name="article_class" class="chosen-select input-medium" data-nosearch="true" id="article_class">
                                           <option value="0" <?php if($vo["classid"] == 0): ?>selected="selected"<?php endif; ?>>根分类</option>
                                           <?php if(is_array($classinfo)): $i = 0; $__LIST__ = $classinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>,<?php echo ($val["name"]); ?>" <?php if($val["id"] == $vo.classid): ?>selected="selected"<?php endif; ?>><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="showpic" class="control-label">详细页显示图文封面：</label>
                                    <div class="controls">
                                        <label class="radio inline">
                                            <input type="radio" name="showpic"  value="1" <?php if($info["showpic"] == 1): ?>checked="checked"<?php endif; ?> >
                                            是
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="showpic" value="0" <?php if($info["showpic"] == 0): ?>checked="checked"<?php endif; ?> >
                                            否
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="picurl" class="control-label">图文详细页内容：</label>
                                    <div class="controls">
                                        <textarea name="reply_content" id="content" style="width: 700px; height: 300px; visibility: hidden;"><?php echo ($info["info"]); ?></textarea>
                                    </div>
									<script>var editor1;</script>
                                    <script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
                                    <script src="<?php echo STATICS;?>/kindeditor/kindeditor.config.js"></script>
                                    <script src="<?php echo STATICS;?>/kindeditor/kindeditor.config-upfile.js"></script>
                                </div>

								<div class="control-group">
                                    <label for="picurl" class="control-label">多图文：</label>
                                    <div class="controls">
                                        <table class="dataTable-mini" id="more_graphics_table">
                                            <tbody>
                                            <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="more_graphics_tabletr<?php echo ($vo["id"]); ?>"><td>
                                                <input type="hidden" value="<?php echo ($vo["id"]); ?>" name="votetouser[0][]"><?php echo ($vo["title"]); ?></td>
                                                <td>
                                                    <a class="btn btn-mini del" href="javascript:void(0)"><i class="icon-remove"></i>
                                                    </a>
                                                </td>
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                        <button type="button" rel="more_graphics_table" class="btn add-on">添加</button><span style="color:red;" class="help-inline">最多添加9个</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="picurl" class="control-label">推荐阅读：</label>
                                    <div class="controls">
                                        <table class="dataTable-mini" id="more_recommended_table">
										                                        </table>
                                        <button type="button" rel="more_recommended_table" class="btn add-on">添加</button><span style="color:red;" class="help-inline">最多添加9个</span>

                                    </div>
                                </div>

                                <script src="http://api.map.baidu.com/api?key=24ffad3855e675265336a4cfb46d32b4&v=1.1&services=true" type="text/javascript" type="text/javascript"></script>

                               <div id="res_block">
                                    <div class="control-group">
                                        <label class="control-label">图文外链类型:</label>
                                        <div class="controls">
                                            <select id="type" name="type" class="input-medium">
                                             <option value="0">请选择</option>
                                                <option value="link" >链接</option>
                                                <option value="map" >导航</option>
                                                <option value="activity" >活动</option>
                                                <option value="business" >业务模块</option>
                                                <option value="car" >微汽车</option>
                                                <option value="estate" >微房产</option>
                                                <option value="food" >微餐饮</option>
                                                <option value="vshop" >微商城</option>
                                                <option value="vlife" >微生活</option>
                                                <option value="vtg" >微团购</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="r_article" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                                <span class="maroon">分类添加成功后 请添加图文选择此分类 将会列表显示</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="r_link" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label" for="source_url">页面URL</label>
                                            <div class="controls">
                                                <input type="text" id="source_url" value="" class="input-xlarge" name="source_url" data-rule-required="true" data-rule-url="true" />
                                                <span class="maroon">*</span><span class="help-inline">(必填,必须是正确的URL格式)</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="r_tel" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label" for="tel">电话号码</label>
                                            <div class="controls">
                                                <input type="text" id="tel" value="" class="input-large" name="tel" data-rule-required="true" data-rule-phone="true" />
                                                <span class="maroon">*</span><span class="help-inline">(必填,必须是正确的号码)</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="r_business" class="control-group r-module hide">
                                        <label class="control-label">业务类型:</label>
                                        <div class="controls">
                                            <select id="business_func" name="business_func">
                                                <option value="14" data-list="" >会员卡</option>
                                                <option value="16" data-list="" >微官网</option>
                                                <option value="17" data-list="" >微医疗</option>
                                                <option value="18" data-list="1" >微预约</option>
                                                <option value="20" data-list="1" >微调研</option>
                                                <option value="21" data-list="1" >微酒店</option>
                                                <option value="101" data-list="" >微留言</option>
                                                <option value="102" data-list="" >微相册</option>
                                                <option value="103" data-list="1" >微喜贴</option>
                                                <option value="5001" data-list="" >领取彩票</option>

                                            </select>
                                        </div>

                                        <div class="margin-top hide">
                                            <label class="control-label">业务选择:</label>
                                            <div class="controls">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>业务标题</th>
                                                            <th>触发关键词</th>
                                                            <th style="display:none;">业务时间</th>
                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                    </tbody>





                                                </table>
                                                <div class="text-center no-record" style="display:block">没有正在进行中的业务</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="r_activity" class="control-group r-module hide">
                                        <label class="control-label">活动类型:</label>
                                        <div class="controls">
                                            <select id="act" name="act">
                                                <option value="11" data-list="1"  >刮刮卡</option>
                                                <option value="12" data-list="1"  >优惠券</option>
                                                <option value="13" data-list="1"  >大转盘</option>
                                                <option value="15" data-list="1"  >微投票</option>
                                                <option value="19" data-list="1"  >一战到底</option>
                                                <option value="27" data-list="1"  >砸金蛋</option>
                                                <option value="5002" data-list=""  >圣诞活动</option>
                                            </select>
                                        </div>

                                        <div class="margin-top ">
                                            <label class="control-label">活动选择:</label>
                                            <div class="controls">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>活动标题</th>
                                                            <th>触发关键词</th>
                                                            <th>活动时间</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    </tbody>

                                                </table>
                                                <div class="record hide"><a href="javascript:;" id="more_activity">加载更多活动...</a></div>
                                                <div class="text-center no-record" style="display:block">没有正在进行中的活动</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="r_map" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label" for="suggestId">经纬度</label>
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input type="text" id="suggestId" class="input-xlarge" value="" name="place" data-rule-required="true" />
                                                    <button class="btn" type="button" id="positioning">搜索</button>
                                                </div>

                                                <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>
                                                <div id="l-map">
                                                    <i class="icon-spinner icon-spin icon-large"></i>地图加载中...
                                                </div>
                                                <div id="r-result">
                                                    <input type="hidden" id="lng" name="lng" value="" /><input type="hidden" id="lat" name="lat" value=""/>
                                                </div>

                                            </div>

                                        </div>
                                    </div>




                                    <div id="r_car" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label" for="suggestId">功能模块</label>
                                            <div class="controls">
                                               <select id="car_func"  name="r_car_function">

                                                <option value="2001" data-list="" >最新资讯</option>
                                                <option value="2002" data-list="" >全部车型</option>
                                                <option value="2003" data-list="" >联系销售</option>
                                                <option value="2004" data-list="" >预约试驾</option>
                                                <option value="2005" data-list="" >预约保养</option>
                                                <option value="2006" data-list="" >实用工具</option>
                                                <option value="2007" data-list="" >车主关怀</option>

                                            </select>
                                            </div>
                                            <div class="margin-top hide">
                                            <label class="control-label">业务选择:</label>
                                            <div class="controls">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>预约标题</th>
                                                            <th>触发关键词</th>
                                                            <th>预约时间</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    </tbody>





                                                </table>
                                                <div class="text-center no-record" style="display:block">没有正在进行中的预约</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>


                                    <div id="r_estate" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label" for="suggestId">功能模块</label>
                                            <div class="controls">
                                               <select id="estate_func" name="r_estate_function">

                                                <option value="1001" data-list="" >楼盘简介</option>
                                                <option value="1002" data-list="" >精美相册</option>
                                                <option value="1003" data-list="" >楼盘印象</option>
                                                <option value="1004" data-list="" >360全景</option>

                                            </select>
                                            </div>

                                        </div>
                                    </div>




                                    <div id="r_food" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label class="control-label" for="suggestId">功能模块</label>
                                            <div class="controls">
                                               <select id="food_func" name="r_food_function">

                                                <option value="3001" data-list="" >选择门店</option>
                                                <option value="3002" data-list="" >全部菜品</option>
                                                <option value="3003" data-list="" >套餐选择</option>
                                                <option value="3004" data-list="" >我的菜单</option>
                                                <option value="3005" data-list="" >我的订单</option>

                                            </select>
                                            </div>

                                        </div>
                                    </div>




                                    <div id="r_vshop" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label for="suggestId" class="control-label">功能模块</label>
                                            <div class="controls">
                                                <select name="r_vshop_function" id="vshop_func">
                                                <option value="4001" data-list="" >首页</option>
                                                <option value="4002" data-list="" >会员中心</option>
                                                <option value="4003" data-list="" >购物车</option>
                                                <option value="4004" data-list="" >品牌介绍</option>
                                                <option value="4005" data-list="" >全部分类</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>



                                    <div id="r_vtg" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label for="suggestId" class="control-label">功能模块</label>
                                            <div class="controls">
                                                <select name="r_vtg_function" id="vtg_func">
                                                <option value="6001" data-list="" >首页</option>
                                                <option value="6002" data-list="" >团购券</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>



                                    <div id="r_vlife" class="control-group r-module hide">
                                        <div class="control-group">
                                            <label for="suggestId" class="control-label">功能模块</label>
                                            <div class="controls">
                                                <select name="r_vlife_function" id="vlife_func">

                                                </select>
                                            </div>

                                        </div>
                                    </div>




                                <div class="form-actions">
									<input type="hidden" name="id" id="tid" value="<?php echo ($info["id"]); ?>">
                                    <button type="submit" class="btn btn-primary" id="bsubmit">保存</button>
									<a class="btn" href="Javascript:window.history.go(-1)">取消</a>
									
                                </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="icon-table"></i>选择图文集</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row-fluid">
                            图文标题：<input name="key" id="key" type="text" class="input-medium" placeholder="输入标题进行查找" />

                            <select name="classid" id="classid" class="input-medium">
                                <option value="0" selected="selected">根分类</option>
                            </select>
                            <button type="button" class="btn" id="_soso"><strong>查找</strong></button>
                        </div>
                        <p></p>

                        <div class="row-fluid">
                            <input type="checkbox" id="chkall" name="chkall" />
                            全选　共有 <span class="red" id="count_num">0</span> 条符合条件
                            <button type="button" class="btn btn-mini" id="p_page"><strong>上一页</strong></button>
                            <span id="p_page_str">第1页/共1页</span>
                            <button type="button" class="btn btn-mini" id="n_page"><strong>下一页</strong></button>
                            <ul class="unstyled list-li-border" id="data-list"></ul>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
                    </div>

<script type="text/javascript">

                    $(document).ready(function () {


                        var resource = Resource.create();
                        var ins = Resource.instance['res_block'];
                        ins.result = ins.result || {};
                        ins.result.aid = 72040;

 



                        var _pdata_table_id;
                        var _isoso = false;
                        $("#chkall").click(function () {
                            var $idsCheck = $("#data-list input[name='check']")
                            var $this = $(this);
                            if ($this.attr("checked")) {
                                $idsCheck.attr("checked", true);
                            } else {
                                $idsCheck.attr("checked", false);
                            }
                            $idsCheck.each(function () {
                                _tr($(this));
                            });

                        });
                        $("#_soso").click(function () { _isoso = true; $("#_soso").attr("disabled", ""); _page(1) });
                        $("#classid").change(function () { _this_page = 1; _page(1) });
                        $("#data-list input[name='check']").live("click", function () { _tr($(this)); });
                        var _tr = function (_t) {
                            var $this = _t;
                            var $title = $this.attr("t");
                            var $id = $this.val();
                            var $selecttr = $("#" + _pdata_table_id + "tr" + $id + "");
                            if ($this.attr("checked")) {
                                if ($selecttr.length == 0 && $("#" + _pdata_table_id + " tr").length < 9) {
                                    var t = (_pdata_table_id == "more_graphics_table") ? "votetouser[0][]" : "votetouser[1][]";
                                    var _trtmp = "<tr id='" + _pdata_table_id + "tr" + $id + "'><td><input type='hidden' name='" + t + "'  value='" + $id + "' />" + $title + "</td><td><a href='javascript:void(0)' class='btn btn-mini del'><i class='icon-remove'></i></a></td></tr>";
                                    $("#" + _pdata_table_id + "").append(_trtmp);
                                }

                            } else {
                                $selecttr.remove();
                            }
                        }
                        //删除
                        $("table.dataTable-mini .del").live("click", function () {
                            $(this).parent().parent().remove();
                        });
                        $("button.add-on").click(function (e) {
                            e.preventDefault();
                            _pdata_table_id = $(this).attr("rel");
                            $('#myModal').modal('show');
                            $("#chkall").attr("checked", false);
                            _page(1);
                        });
                        $("#p_page").click(function () {
                            if (_this_page - 1 > 0) {
                                _this_page--;
                                _page(_this_page);
                            }
                        });
                        $("#n_page").click(function () {
                            if (_this_page + 1 <= _this_page_count) {
                                _this_page++;
                                _page(_this_page);
                            }
                        });
                        var _this_page = 1;//当前页
                        var _this_page_count = 0;//总页数
                        var _page = function (_index) {
                            var key;
                            if (_isoso) {
                                key = $("#key").val();
                            }
                            var classid = $("#classid").val();
                            $.get("/npManage/reply/getjsonnews.act", {"key": key, "classid": classid, "page": _index, "aid":$('#aid').val(), "tid":$('#tid').val() }, function (data, textStatus) {
                                $("#data-list").html("");
                                //console.log(data.list);
                                $.each(data.list, function (index, item) {
                                    //console.log(index);
                                    var _li_tmp = '<li> <label> <input type="checkbox" name="check" t="' + item.title + '" value="' + item.id + '" />  ' + item.title + '</label></li>';
                                    $("#data-list").append(_li_tmp);

                                });
                                _this_page_count = data.count;
                                $("#count_num").text(_this_page_count * 9);
                                $("#p_page_str").text("第" + _this_page + "页/共" + _this_page_count + "页");
                                $("#_soso").removeAttr("disabled")
                            }, "json");
                        }

                    })

                </script>
				</form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div></body>
</html>