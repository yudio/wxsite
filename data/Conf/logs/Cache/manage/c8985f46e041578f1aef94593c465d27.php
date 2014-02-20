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
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/fileupload/bootstrap_fileupload_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/region_select.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/inside.js"></script>
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
                                <h3><i class="icon-edit"></i>手动绑定公众帐号
     <small><a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank"><img  src="img/zs.jpg" alt="微盟助手"/></a></small></h3>

                            </div>
                            <div class="span2"><a class="btn" onclick="javascript:window.history.go(-1);">返回</a></div>
                        </div>

                        <div class="box-content">
                            <div id="validateErrorContainer" class="validateErrorContainer ">
                                <ul></ul>
                            </div>

                            <form action="/wechat/addaccount" method="POST" class="form-horizontal form-validate">
                                <div class="control-group">
                                    <label for="plc_name" class="control-label">公众号名称：</label>
                                    <div class="controls">
                                        <input type="text" name="plc_name" id="plc_name" class="input-medium" data-rule-required="true" value="乌龟背上看江山"><span class="maroon">*</span>
                                    </div>
                                </div>


<!--

                                <div class="control-group">
                                    <label class="control-label">公众帐号类型：</label>
                                    <div class="controls">
                                            <label class="radio inline"><input type="radio" checked="checked" name="account_type" value="1">订阅号</label>
                                            <label class="radio inline"><input type="radio"  name="account_type" value="2">服务号</label>
                                     </div>
                                </div>
<div id="server_id" class="hide">
<!--                                 <div class="control-group">
                                    <label for="account_is_auth" class="control-label">公众帐号已认证：</label>
                                    <div class="controls">
                                            <input type="checkbox" value="1"  name="account_is_auth">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="appid" class="control-label">AppId：</label>
                                    <div class="controls">
                                    <input type="text"  name="appid" id="appid" class="span4" value="" data-rule-required="true">
                                    <span>公众平台申请到的AppId</span><span class="maroon">*</span></div>
                                </div>
                                <div class="control-group">
                                    <label for="appid" class="control-label">AppSecret：</label>
                                    <div class="controls">
                                    <input type="text"  name="appsecret" id="appsecret" class="span4" value="" data-rule-required="true">
                                    <span>公众平台申请到的AppSecret</span><span class="maroon">*</span></div>
                                </div>

</div>



-->



                                <div class="control-group">
                                    <label for="wxid" class="control-label">公众号原始id：</label>
                                    <div class="controls">
                                        <input type="text" name="plc_sourceid" id="plc_sourceid" class="input-medium" data-rule-required="true" value="gh_c7ed8132cdbf" readonly><span class="maroon">*</span><span class="help-inline">
												请认真填写，错了不能修改。比如：gh_423dwjkeww3      <a href="/wechat/wxdirections"  ><i class="icon-question-sign"></i> 不懂问我</a> <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank"  ><i class="icon-smile"></i> 联系客服</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="wechat_id" class="control-label">微信号：</label>
                                    <div class="controls">
                                        <input type="text" name="wechat_id" id="wechat_id" class="input-medium" data-rule-required="true" value="wuguidejiangshan"><span class="maroon">*</span>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">头像地址（url）:</label>
                                    <div class="controls">
										                                            <img id="thumb_img" src="http://annchen.oss.aliyuncs.com/weixinface/d5/c7/7c/d5c77c6af693226fbe56d4d5ef442cf7.jpg" style="max-height:100px;" />
                                            <input id="thumb" type="hidden" name="avatar_url" value="http://annchen.oss.aliyuncs.com/weixinface/d5/c7/7c/d5c77c6af693226fbe56d4d5ef442cf7.jpg" class="input-xlarge" readonly data-rule-required="true" data-rule-url="true" />
                                        
                                        <span class="help-inline"><a class="btn" id="insertimage">选择封面</a></span>
                                        <link href="templates/kindeditor/themes/default/default.css" rel="stylesheet" />
                                        <script src="templates/kindeditor/kindeditor-min.js"></script>
                                        <script src="templates/kindeditor/lang/zh_CN.js"></script>
                                        <script src="templates/kindeditor/kindeditor.config-upfile.js"></script>
                                    </div>
                                </div>
								                                <div class="control-group">
                                    <label for="api_key" class="control-label">接口地址：</label>
                                    <div class="controls">
										<span class="help-inline">http://www.weimob.com/api?t=264a864802eb3291d068ef5df011599c==I</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="token" class="control-label">TOKEN：</label>
                                    <div class="controls">
                                      <span class="help-inline">280154_r</span>
                                    </div>
                                </div>
								                                <div class="control-group">
                                    <label class="control-label">地区：</label>

                                    <div class="controls">
                                     <select name="location_p" id="location_p" ></select>
                                        <select name="location_c" id="location_c" ></select>
                                        <select name="location_a" id="location_a" ></select>
                                        <script type="text/javascript">
                                            new PCAS('location_p', 'location_c', 'location_a', '', '', '');
                                        </script>
                                    </div>

                                </div>
                                <div class="control-group">
                                    <label for="email" class="control-label">公众号邮箱：</label>
                                    <div class="controls">
                                        <input type="text" name="email" value="" id="email" class="input-medium" data-rule-email="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="funs" class="control-label">粉丝数：</label>
                                    <div class="controls">
                                        <input type="text" name="funs" value="9" id="funs" class="input-medium">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="type" class="control-label">类型：</label>
                                    <div class="controls">
                                    <select id="type" name="type" class="input-medium" data-nosearch="true">
                                            <option value="0">选择类型</option>
											<option value="1" >情感</option>
											<option value="2" >数码</option>
											<option value="3" >娱乐</option>
											<option value="4" >IT</option>
											<option value="5" >购物</option>
											<option value="6" >生活</option>
											<option value="7" >服务</option>
									</select>
                                    </div>
                                </div>
                                <div class="control-group hide">
                                    <label for="tongji" class="control-label">图文页统计代码：</label>
                                    <div class="controls">
                                        <input type="text" name="code_stat"  value="" id ="code_stat" style="width: 600px; height: 40px;" maxlength="300">
                                    </div>
                                </div>
                                <div class="form-actions">
									<input type="hidden" name="aid" id="aid" value="69535">
                                    <button type="submit" class="btn btn-primary" id="bsubmit">保存</button>
                                    <button  type="button" class="btn" onclick="Javascript:window.history.go(-1)">取消</a>

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
		$('#plc_name').focus();
        /*
        $("#bsubmit").click(function(){
           if(!$("input[name='account_type']:checked").length>0){
            G.ui.tips.info("请选择公众帐号类型");
            return false;
           }
        });
        $("input[name='account_type']").click(function(){

              $("#server_id").toggle(($(this).val()==2));

        })
        */
	});
</script></body>
</html>