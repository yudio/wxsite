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
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
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
                                <h3><i class="icon-edit"></i>默认设置自动回复选项</h3>
                            </div>
                        </div>

                        <div class="box-content">
						<form action="/npManage/reply/autoupdate.act" method="post" class="form-horizontal form-validate">
	                            <div class="control-group">
                                    <label class="control-label">默认关注回复：</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" name="is_news" value="0" <?php if($info["is_show"] == 0): ?>checked="checked"<?php endif; ?> >
                                            文字模式，用户关注时会以文字模式向用户回复一条信息!
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="is_news" value="1" <?php if($info["is_show"] == 1): ?>checked="checked"<?php endif; ?> >
                                            图文模式, 用户关注时会以图文模式向用户回复一条信息!
                                        </label>
                                    </div>
									<div class="control-group">
                                    <label class="control-label">默认无匹配回复：</label>
                                    <div class="controls">
										<input type="text" name="keyword" id="default_reply" value="<?php echo ($info["default_reply"]); ?>"><span  class="help-inline red">此处填写您已定义的关键词</span>
                                        <span  class="help-block">
                                        <label class="checkbox">
                                         <input type="checkbox"  name="default_reply_flag" value="1" <?php if($info["default_reply_flag"] == 1): ?>checked="checked"<?php endif; ?>  />
                                         开启默认无匹配回复
                                        </label>
                                        </span>

                                        <span  class="help-block">当用户触发的关键词无匹配时自动回复内容!</span>

                                    </div>

                                </div>

									<div class="control-group">
                                    <label class="control-label">默认LBS查询范围：</label>
                                    <div class="controls">
										<input type="text" name="lbs_dis" data-rule-number="true" id="lbs_distance" maxlength="5" class="input-mini" value="<?php echo (($info["lbs_dis"])?($info["lbs_dis"]):"1000"); ?>">单位（米）<br><span style="color:red;" class="help-inline">当用户用发送地图定位时在此范围内的商家可被推送给用户!</span>
                                    </div>

                                </div>

                                <div class="form-actions">
									<input type="hidden" name="aid" id="aid" value="72040">
                                    <button type="submit" class="btn btn-primary"  id ="reg-btn">保存</button>
                                </div>

								 </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div></body>
</html>