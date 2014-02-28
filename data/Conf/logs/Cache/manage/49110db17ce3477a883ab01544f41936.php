<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="Keywords" content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销"/>
    <meta name="Description" content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。"/>
    <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico?v=2014-02-20-1"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/resource.css?2014-02-20-1" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js?2014-02-20-1"></script>
    <script type="text/javascript"
            src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/resource.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js?2014-02-20-1"></script>
    <title>微盟（Weimob）—国内最大的微信公众服务平台</title>
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css?v=2014-02-20-1" rel="stylesheet"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="<?php echo RES;?>/js/excanvas_min.js?v=2014-02-20-1"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/js/watermark.js?v=2014-02-20-1"></script>
    <![endif]-->
</head>
<!--
<script src="http://api.map.baidu.com/getscript?v=2.0&ak=T6LUak3ZjSxnl2qVHywtZabi&services=%E5%A5%88%E6%96%AF%E4%BC%99%E4%BC%B4&t=20140221110451" type="text/javascript"></script>-->
<script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js?v=2014-02-20-1"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js?v=2014-02-20-1"></script>
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.config-upfile.js?v=2014-02-20-1"></script>
<link href="<?php echo STATICS;?>/kindeditor/themes/default/default.css?v=2014-02-20-1" rel="stylesheet"/>

<style>
    option {
        padding: 5px;
    }
</style>

<body>
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="box">
<div class="box-title">
    <div class="span12">
        <h3><i class="icon-cog"></i>添加分类</h3>
    </div>
</div>
<form action="/npManage/microsite/classify_update.act" method="post" class="form-horizontal form-validate">
<div class="box-content">
<div class="control-group">
    <label for="classname" class="control-label">分类名称：</label>

    <div class="controls">
        <input type="text" id="classname" name="name" value="<?php echo ($info["name"]); ?>" class="input-medium" data-rule-required="true"/>
        <span class="maroon">*</span><span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label for="description" class="control-label">分类描述：</label>

    <div class="controls">
        <input type="text" id="description" name="desc" value="<?php echo ($info["desc"]); ?>" class="input-medium"/>
        <span class="maroon"></span><span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label for="category_id" class="control-label">所属分类：</label>

    <div class="controls">
        <select id="category_id" name="category_id" class="input-medium valid">
            <option value="0">根分类</option>
        </select>
    </div>
</div>
<div class="control-group">
    <label for="sort" class="control-label">显示顺序：</label>

    <div class="controls">
        <input type="text" id="sort" name="sorts" value="<?php echo ($info["sorts"]); ?>" class="input-mini" data-rule-required="true"
               data-rule-number="true"/>
    </div>
</div>
<div class="control-group">
    <label for="insertimage" class="control-label">分类封面:</label>

    <div class="controls">
        <img type="img" src="<?php echo ($info["img"]); ?>" style="max-height:50px;"/>
        <input type="hidden" name="img" value="<?php echo ($info["img"]); ?>"
               class="input-medium"/>
        <a class="btn insertimage">选择封面</a>
    </div>
</div>
<div class="control-group">
    <label class="control-label">是否官网显示：</label>

    <div class="controls">
        <label class="radio inline"><input type="radio" value="1" name="status" <?php if($info["status"] == '1'): ?>checked="checked"<?php endif; ?>/>显示</label>
        <label class="radio inline"><input type="radio" value="0" name="status" <?php if($info["status"] == '0'): ?>checked="checked"<?php endif; ?>/>隐藏</label>
    </div>
</div>
<div class="control-group">
    <label class="<?php echo ($info["icon"]); ?>">图标：</label>

    <div class="controls">
        <div class="i-cont tile-themed">
            <i class="icon-smile" id="icon_i"></i>
            <input type="hidden" id="icon" name="icon" value="icon-smile"/>
            <a class="sel-icon" href="javascript:void(0);">换一个</a>

            <div class="icons-cont">
                <div class="tab-content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#ico_hot" data-toggle="tab">热门</a></li>
                        <li class=""><a href="#ico_all" data-toggle="tab">全部</a></li>
                    </ul>
                    <div class="tab-pane fade active in" id="ico_hot">
                    </div>
                    <div class="tab-pane fade" id="ico_all">
                    </div>
                </div>
            </div>
        </div>
        <span class="help-inline">该图标用于二级页面右上角的缩略菜单和部分模板的首页主菜单</span>
    </div>
</div>
<div id="res_block">
<div class="control-group">
    <label for="type" class="control-label">回复类型：</label>

    <div class="controls">
        <select id="type" name="type" class="input-medium">
            <option value="article" selected="selected">图文</option>
            <option value="link">链接</option>
            <option value="tel">电话</option>
            <option value="map">导航</option>
            <option value="activity">活动</option>
            <option value="business">业务模块</option>
            <option value="car">微汽车</option>
            <option value="estate">微房产</option>
            <option value="food">微餐饮</option>
            <option value="shop">微商城</option>
            <option value="market">微生活</option>
            <option value="tg">微团购</option>
        </select>
    </div>
</div>
<div id="r_article" class="control-group r-module ">
    <div class="control-group">
        <label class="control-label"></label>

        <div class="controls">
            <span class="maroon">分类添加成功后 请添加图文选择此分类 将会列表显示</span>
        </div>
    </div>
</div>
<div id="r_link" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="link">外链地址</label>

        <div class="controls">
            <input type="url" id="link" name="link" value="" class="input-xlarge" data-rule-required="true"
                   data-rule-url="true"/>
            <span class="maroon">*</span><span class="help-inline">(必填，必须是正确的URL格式)</span>
        </div>
    </div>
</div>
<div id="r_tel" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="tel">电话号码</label>

        <div class="controls">
            <input type="text" id="tel" name="tel" value="" class="input-large" data-rule-required="true"
                   data-rule-phone="true"/>
            <span class="maroon">*</span><span class="help-inline">(必填，必须是正确的号码)</span>
        </div>
    </div>
</div>
<div id="r_market" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="markte_module">微商圈模块</label>

        <div class="controls">
            <select id="markte_module" name="market_type">
                <option value="0" data-list="false">还没有商圈分类</option>
            </select>
        </div>
    </div>
</div>
<div id="r_shop" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="shop_module">微商城模块</label>

        <div class="controls">
            <select id="shop_module" name="shop_type">
                <option value="index" data-list="false">首页</option>
                <option value="profile" data-list="false">会员中心</option>
                <option value="cart" data-list="false">购物车</option>
                <option value="about" data-list="false">品牌介绍</option>
                <option value="list" data-list="false">全部分类</option>
            </select>
        </div>
    </div>
</div>
<div id="r_tg" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="tg_module">微团购模块</label>

        <div class="controls">
            <select id="tg_module" name="tg_type">
                <option value="index" data-list="false">首页</option>
                <option value="tgq" data-list="false">团购券</option>
            </select>
        </div>
    </div>
</div>
<div id="r_food" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="food_module">微餐饮模块</label>

        <div class="controls">
            <select id="food_module" name="food_type">
                <option value="xzmd" data-list="false">选择门店</option>
                <option value="qbcp" data-list="false">全部菜品</option>
                <option value="tcxz" data-list="false">套餐选择</option>
                <option value="wdcd" data-list="false">我的菜单</option>
            </select>
        </div>
    </div>
</div>
<div id="r_estate" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="estate_module">微房产模块</label>

        <div class="controls">
            <select id="estate_module" name="estate_type">
                <option value="jianjie" data-list="false">楼盘简介</option>
                <option value="xiangce" data-list="false">精美相册</option>
                <option value="yinxiang" data-list="false">楼盘印象</option>
                <option value="quanjing" data-list="false">360全景</option>
            </select>
        </div>
    </div>
</div>
<div id="r_car" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="car_box">微汽车模块</label>

        <div class="controls">
            <select id="car_box" name="car_type">
                <option value="zixun" data-list="false">最新资讯</option>
                <option value="chexi" data-list="false">全部车型</option>
                <option value="xiaoshou" data-list="false">联系销售</option>
                <option value="shijia" data-list="false">预约试驾</option>
                <option value="baoyang" data-list="false">预约保养</option>
                <option value="gongju" data-list="false">实用工具</option>
                <option value="guanhuai" data-list="false">车主关怀</option>
            </select>
        </div>
        <div class="margin-top" style="display:none;">
            <label class="control-label">模块业务:</label>

            <div class="controls">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>业务标题</th>
                        <th>触发关键词</th>
                        <th>时间段</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="record hide"><a href="javascript:;" id="more_activity">加载更多模块业务...</a></div>
                <div class="text-center no-record" style="display:none;">没有正在进行中的模块业务</div>
            </div>
        </div>
    </div>
</div>
<div id="r_business" class="control-group r-module hide">
    <label class="control-label">业务类型:</label>

    <div class="controls">
        <select id="business_func" name="business_type" class="input-medium">
            <option value="official" data-list="false">微官网</option>
            <option value="vipcard" data-list="false">会员卡</option>
            <option value="reservation" data-list="true">微预约</option>
            <option value="medical" data-list="false">微医疗</option>
            <option value="hotels" data-list="true">微酒店</option>
            <option value="message" data-list="false">微留言</option>
            <option value="albums" data-list="false">微相册</option>
            <option value="survey" data-list="true">微调研</option>
            <option value="invitation" data-list="true">微喜帖</option>
        </select>
    </div>
    <div class="margin-top" style="display:none;">
        <label class="control-label">业务:</label>

        <div class="controls">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>业务标题</th>
                    <th>触发关键词</th>
                    <th>时间段</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="record hide"><a href="javascript:;" id="more_activity">加载更多业务...</a></div>
            <div class="text-center no-record" style="display:none;">没有正在进行中的业务</div>
        </div>
    </div>
</div>
<div id="r_activity" class="control-group r-module hide">
    <label class="control-label">活动类型:</label>

    <div class="controls">
        <select id="act" name="activity_type" class="input-medium"
                onchange="if (100 == $(this).val()) {$('#activity_select_box').hide(); } else {$('#activity_select_box').show(); };">
            <option value="11">优惠券</option>
            <option value="12">刮刮卡</option>
            <option value="13">大转盘</option>
            <option value="17">微投票</option>
            <option value="15">一战到底</option>
            <option value="20">砸金蛋</option>
            <option value="100">圣诞活动</option>
        </select>
    </div>
    <div class="margin-top" id="activity_select_box">
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
            </table>
            <div class="record hide"><a href="javascript:;" id="more_activity">加载更多活动...</a></div>
            <div class="text-center no-record" style="display:none;">没有正在进行中的活动</div>
        </div>
    </div>
</div>
<div id="r_map" class="control-group r-module hide">
    <div class="control-group">
        <label class="control-label" for="suggestId">经纬度</label>

        <div class="controls">
            <div class="input-append">
                <input type="text" id="suggestId" name="place" value="" class="input-xlarge" data-rule-required="true"/>
                <button class="btn" type="button" id="positioning">搜索</button>
            </div>
            <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>

            <div id="l-map">
                <i class="icon-spinner icon-spin icon-large"></i>地图加载中...
            </div>
            <div id="r-result">
                <input type="text" id="lng" name="lng" value=""/>
                <input type="text" id="lat" name="lat" value=""/>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
    <button type="submit" class="btn btn-primary">保存</button>
    <button type="button" class="btn" onclick="window.history.go(-1);">取消</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
<script>
    $(document).ready(function () {
        var typeval = '<?php echo ($info["type"]); ?>';
        if (typeval){
            $("select[name=type] option[value='"+typeval+"']").attr("selected","selected");
        }
        var resource = Resource.create();
        var ins = Resource.instance['res_block'];
        ins.result = ins.result || {};
        ins.result.wuid = 72040;


        window.ICON();
    });

    KindEditor.ready(function (K) {
        var editor = K.editor({
            themeType: 'simple',
            allowFileManager: true
        });
        $('a.insertimage').live('click', function (e) {
            editor.loadPlugin('smimage', function () {
                editor.plugin.imageDialog({
                    imageUrl: $(e.target).prev().val(),
                    clickFn: function (url, title, width, height, border, align) {
                        $(e.target).prev().val(url);
                        if ('img' == $(e.target).prev().prev().attr('type')) {
                            $(e.target).prev().hide();
                            $(e.target).prev().prev().attr('src', url);
                            $(e.target).prev().prev().show();
                        }
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>
<script>
    window.document.onkeydown = function (e) {
        if ('' == document.activeElement.id) {
            var e = e || event;
　 				var currKey = e.keyCode || e.which || e.charCode;
            if (8 == currKey) {
                return false;
            }
        }
    };
</script>
</html>