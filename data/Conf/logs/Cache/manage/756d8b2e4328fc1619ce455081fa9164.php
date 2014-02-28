<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/inside.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
<title>微盟（Weimob）—国内最大的微信公众服务平台</title>
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
                                <h3><i class="icon-edit"></i>授权设置</h3>
                            </div>
                            <div class="span2"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
                        </div>

                        <div class="box-content">
                            <div class="alert" style="display:none;">
                                1. 要在微信公众平台<strong>“开发模式”</strong>下使用自定义菜单，首先要在公众平台<strong>申请</strong>自定义菜单使用的<strong>AppId和AppSecret</strong>，然后填入下边表单。<br>
                                2. 提交完id和密钥后，可以在【菜单设置】中设置各个菜单项，然后进行发布，您的微信公众号便支持自定义菜单了。<br>
                                3. 公众平台规定，<strong>菜单发布<span class="red bold">24小时后生效</span></strong>。如果为新增粉丝，则可马上看到菜单。
                            </div>
                            <form action="/npManage/account/typeset.act" method="post" class="form-horizontal form-validate">


                                <div class="control-group">
                                    <label class="control-label">公众帐号类型：</label>
                                    <div class="controls">

                                            <label class="radio inline"><input type="radio" <?php if($user["type"] == 1): ?>checked="checked"<?php endif; ?> name="type" value="1">订阅号</label>
                                            <label class="radio inline"><input type="radio" <?php if($user["type"] == 2): ?>checked="checked"<?php endif; ?> class="auth"  name="type" value="2">认证订阅号</label>
                                            <label class="radio inline"><input type="radio" <?php if($user["type"] == 3): ?>checked="checked"<?php endif; ?> class="auth"  name="type" value="3">服务号</label>
                                            <label class="radio inline"><input type="radio" <?php if($user["type"] == 4): ?>checked="checked"<?php endif; ?> class="auth"  name="type" value="4">认证服务号</label>
                                     </div>
                                </div>

<div id="server_id" class="hide">

                                <div class="control-group">
                                    <label class="control-label" for="appid">应用id:</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="appid" name="appid" value="<?php echo ($user["appid"]); ?>" data-rule-required="true">

                                        <span>公众平台申请到的AppId</span><span class="maroon">*</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="appsecret">应用密钥:</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="appsecret" name="appsecret" value="<?php echo ($user["appsecret"]); ?>" data-rule-required="true">

                                        <span>公众平台申请到的AppSecret</span><span class="maroon">*</span>
                                    </div>
                                </div>

</div>

                                <div class="form-actions">
									<input type="hidden" name="id" id="aid" value="<?php echo ($user["id"]); ?>">
                                    <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



	<script type="text/javascript">
	$(function(){
        //alert($("input[type='radio'][checked]").val());
        if($("input[type='radio'][checked]").val()>1)
        {
            $("#server_id").show();
        }
        $("#bsubmit").click(function(){
           if(!$("input[name='type']:checked").length>0){
            G.ui.tips.info("请选择公众帐号类型");
            return false;
           }
        });

        $("input[name='type']").click(function(){
              $("#server_id").toggle(($(this).hasClass("auth")));

        })
	});
</script></body>
</html>