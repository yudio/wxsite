<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="Keywords" content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
        <meta name="Description" content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
        <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico?v=2014-02-24-1" />
        <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/resource.css" media="all" />
		<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/chosen/chosen_jquery_min.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/wizard/jquery_form_wizard_min.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/plugins/jscolor/jscolor.js"></script>
		<script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
		<script type="text/javascript" src="<?php echo RES;?>/src/map.js"></script>
		<title>微盟（Weimob）—国内最大的微信公众服务平台</title>
        <!--[if IE 7]>
            <link href="<?php echo RES;?>/css/font_awesome_ie7.css?v=2014-02-24-1" rel="stylesheet" />
        <![endif]-->
        <!--[if lte IE 8]>
            <script src="<?php echo RES;?>/js/excanvas_min.js?v=2014-02-24-1"></script>
        <![endif]-->
        <!--[if lte IE 9]>
            <script src="<?php echo RES;?>/js/watermark.js?v=2014-02-24-1"></script>
        <![endif]-->
    </head>
	<script src="http://api.map.baidu.com/getscript?v=2.0&ak=T6LUak3ZjSxnl2qVHywtZabi&services=true" type="text/javascript"></script>
	<link href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" rel="stylesheet" />
	<script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
	<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js"></script>
	<script src="<?php echo STATICS;?>/kindeditor/kindeditor.config-upfile.js"></script>
	<div class="container-fluid" id="content">

        <div id="main">
            <div class="container-fluid">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <div class="span10">
                                    <h3> <i class="icon-cog"></i>
                                        商家设置
                                    </h3>
                                </div>
                                <div class="span2">
                                    <a class="btn" href="Javascript:window.history.go(-1)">返回</a>
                                </div>
                            </div>
                            <div class="box-content">
                                <form action="/npManage/member/setbusiness.act" method="POST" class='form-horizontal form-validate'>
	                                <input type="hidden" name="mckey" value=""/>
	                                	                                
                                    <div class="control-group">
                                        <label class="control-label" for="keyword">商家名称</label>
                                        <div class="controls">
                                            <input type="text" name="shop_name" id="shop_name" value="<?php echo ($info["shop_name"]); ?>" data-rule-required="true" data-rule-maxlength="50" />
                                            <span>*</span>
                                            <span class="help-inline">最多只能输入50个字符。</span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="keyword">触发关键词</label>
                                        <div class="controls">
                                            <input type="text" name="keyword" id="keyword" value="<?php echo ($info["keyword"]); ?>" data-rule-required="true" data-rule-maxlength="20" />
                                            <span>*</span>
                                            <span class="help-inline">用户输入此“关键词”将可以触发会员卡图文，最多只能输入20个字符。</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                    	<label class="control-label" for="logo">图文消息封面</label>
                                    	<div class="controls">
                                        	    <img id="thumb_img" src="<?php echo (($info["logo"])?($info["logo"]):RES."/img/card_cover1.jpg"); ?>" style="max-height:100px;" />
                                            	<input id="thumb" type="hidden" name="logo" value="<?php echo (($info["logo"])?($info["logo"]):RES."/img/card_cover1.jpg"); ?>" class="input-xlarge" readonly="readonly" data-rule-required="true" data-rule-url="true" />
                                        	                                        	<span class="help-inline" style="margin-top:3px;">
                                            	<a class="btn" id="insertimage">选择封面</a>
                                        	</span>
                                    	</div>
                                	</div>
                                	<div class="control-group">
                                        <label for="textfield" class="control-label">
                                                    封面消息
                                        </label>
                                        <div class="controls">
                                            <textarea class="input-large" name="info" id="info" data-rule-required="true" style="width:350px;height:80px;" data-rule-maxlength="140"><?php echo (($info["keyword"])?($info["keyword"]):"微时代会员卡，方便携带收藏，永不挂失"); ?></textarea>
                                        	<span>*</span> <span class="help-inline">最多只能输入140个字符。</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="province">商家所在地区</label>
                                        <div class="controls">
                                            <select name="province" id="province"></select>
                                            <select name="city" id="city"></select>
                                            <select name="town" id="town"></select>
                                            <script src="<?php echo RES;?>/src/region_select.js"></script>
                                            <script type="text/javascript">
                                                new PCAS("province", "city", "town", '<?php echo ($info["province"]); ?>', '<?php echo ($info["city"]); ?>', '<?php echo ($info["town"]); ?>');
                                            </script>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="category_f">商家类别</label>
                                        <div class="controls">
                                            <select name="category_f" id="category_f"></select>
                                            <select name="category_s" id="category_s"></select>
                                        </div>
                                    </div>
                                    <script src="<?php echo RES;?>/src/category.js"></script>
                                    <script type="text/javascript">
                                        new CS("category_f", "category_s", '<?php echo ($info["category_f"]); ?>',  '<?php echo ($info["category_s"]); ?>', '美食-1$本帮江浙菜-11,川菜-12,粤菜-13,湘菜-14,贵州菜-15,东北菜-16,台湾菜-17,新疆/清真菜-18,西北菜-19,素菜-20,火锅-21,自助餐-22,小吃快餐-23,日本-24,韩国料理-25,东南亚菜-26,西餐-27,面包甜点-28,其他-29#休闲娱乐-2$密室-30,咖啡厅-31,酒吧-32,茶馆-33,KTV-34,电影院-35,文化艺术-36,景点/郊游-37,公园-38,足疗按摩-39,洗浴-40,游乐游艺-41,桌球-42,桌面游戏-43,DIY手工坊-44,其他-45#购物-3$综合商场-46,食品茶酒-47,服饰鞋包-48,珠宝饰品-49,化妆品-50,运动户外-51,亲子购物-52,品牌折扣店-53,数码家电-54,家居建材-55,特色集市-56,书店-57,花店-58,眼镜店-59,超市/便利店-60,药店-61,其他-62#丽人-4$美发-63,美容/SPA-64,化妆品-65,瘦身纤体-66,美甲-67,瑜伽-68,舞蹈-69,个性写真-70,整形-71,齿科-72,其他-73#结婚-5$婚纱摄影-74,婚宴-75,婚戒首饰-76,婚纱礼服-77,婚庆公司-78,彩妆造型-79,司仪主持-80,婚礼跟拍-81,婚车租赁-82,婚礼小商品-83,婚房装修-84,其他-85#亲子-6$幼儿教育-86,亲子摄影-87,亲子游乐-88,亲子购物-89,孕产护理-90,其他-91#运动健身-7$游泳馆-92,羽毛球馆-93,健身中心-94,瑜伽-95,舞蹈-96,篮球场-97,网球场-98,足球场-99,高尔夫场-100,保龄球馆-101,桌球馆-102,乒乓球馆-103,武术场馆-104,体育场馆-105,其他-106#酒店-8$五星级酒店-107,四星级酒店-108,三星级酒店-109,经济型酒店-110,公寓式酒店-111,精品酒店-112,青年旅舍-113,度假村-114,其他-115#爱车-9$4S店/汽车销售-116,汽车保险-117,维修保养-118,配件/车饰-119,驾校-120,汽车租赁-121,停车场-122,加油站-123,其他-124#生活服务-10$旅行社-125,培训-126,室内装潢-127,宠物-128,齿科-129,快照/冲印-130,家政-131,银行-132,学校-133,团购网站-134,其他-135#其他-11$其他-136');
                                    </script>

                                    <div class="control-group">
                                        <label class="control-label" for="fanslocal">商家详细地址</label>
                                        <div class="controls">
                                            <input type="text" name="address" value="<?php echo ($info["address"]); ?>"
                                                            id="address" data-rule-required="true" data-rule-maxlength="50" />
                                            <span class="maroon">*</span>
                                            <span class="help-inline">将会显示在会员卡背面，最多只能输入50个字符。</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="fanslocal">联系方式</label>
                                        <div class="controls">
                                            <input type="text" name="phone" id="phone" value="<?php echo ($info["phone"]); ?>"
                                             data-rule-required="true" data-rule-phone="true" />
                                            <span class="maroon">*</span>
                                            <span class="help-inline">将会显示在会员卡背面，如13911111111或者0755-2345678</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="suggestId">经纬度</label>
                                        <div class="controls">
                                            <div class="input-append">
                                                <input type="text" id="suggestId" class="input-xlarge" name="place" value="<?php echo ($info["place"]); ?>" data-rule-required="true" />
                                                <button class="btn" type="button" id="positioning">搜索</button>
                                            </div>

                                            <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注!</span>
                                            <div id="l-map"> <i class="icon-spinner icon-spin icon-large"></i>
                                                地图加载中...
                                            </div>
                                            <div id="r-result">
                                                <input type="text" id="lng" name="lng" value="<?php echo ($info["lng"]); ?>"/>
                                                <input type="text" id="lat" name="lat" value="<?php echo ($info["lat"]); ?>"/>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                                        <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
                                        <button type="button" class="btn" onclick="window.location='picture-text-repaly.html'">取消</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function () {
                var lng = '<?php echo ($info["lng"]); ?>';
                var lat = '<?php echo ($info["lat"]); ?>';
                if (lng&&lat){
                    var data = {'lng':lng,'lat':lat};
                    baidu_map(data);
                }else{
                    baidu_map();
                }
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