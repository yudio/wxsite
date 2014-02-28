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
     <small><a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank"><img  src="<?php echo RES;?>/img/zs.jpg" alt="微盟助手"/></a></small></h3>

                            </div>
                            <div class="span2"><a class="btn" onclick="javascript:window.history.go(-1);">返回</a></div>
                        </div>

                        <div class="box-content">
                            <div id="validateErrorContainer" class="validateErrorContainer ">
                                <ul></ul>
                            </div>

                            <form action="/npManage/account/addwxuser.act" method="POST" class="form-horizontal form-validate">
                                <div class="control-group">
                                    <label for="plc_name" class="control-label">公众号名称：</label>
                                    <div class="controls">
                                        <input type="text" name="wxname" id="plc_name" class="input-medium" data-rule-required="true" value="<?php echo ($info["wxname"]); ?>"><span class="maroon">*</span>
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label for="wxid" class="control-label">公众号原始id：</label>
                                    <div class="controls">
                                        <input type="text" name="wxid" id="plc_sourceid" class="input-medium" data-rule-required="true" value="<?php echo ($info["wxid"]); ?>" readonly><span class="maroon">*</span><span class="help-inline">
												请认真填写，错了不能修改。比如：gh_423dwjkeww3      <a href="/npManage/account/help.act"  ><i class="icon-question-sign"></i> 不懂问我</a> <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank"  ><i class="icon-smile"></i> 联系客服</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="wechat_id" class="control-label">微信号：</label>
                                    <div class="controls">
                                        <input type="text" name="weixin" id="wechat_id" class="input-medium" data-rule-required="true" value="<?php echo ($info["weixin"]); ?>"><span class="maroon">*</span>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">头像地址（url）:</label>
                                    <div class="controls">
										    <img id="thumb_img" src="<?php echo ($info["headerpic"]); ?>" style="max-height:100px;" />
                                            <input id="thumb" type="hidden" name="headerpic" value="<?php echo ($info["headerpic"]); ?>" class="input-xlarge" readonly data-rule-required="true" data-rule-url="true" />
                                        
                                        <span class="help-inline"><a class="btn" id="insertimage">选择封面</a></span>
                                        <link href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" rel="stylesheet" />
                                        <script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
                                        <script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js"></script>
                                        <script src="<?php echo STATICS;?>/kindeditor/kindeditor.config-upfile.js"></script>
                                    </div>
                                </div>
								    <div class="control-group">
                                    <label for="api_key" class="control-label">接口地址：</label>
                                    <div class="controls">
										<span class="help-inline"><?php echo C('SITE_URL');?>/wechat/<?php echo ($info["token"]); ?></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="token" class="control-label">TOKEN：</label>
                                    <div class="controls">
                                      <span class="help-inline"><?php echo ($info["token"]); ?></span>
                                    </div>
                                </div>
								    <div class="control-group">
                                    <label class="control-label">地区：</label>

                                    <div class="controls">
                                     <select name="province" id="province" ></select>
                                        <select name="city" id="city" ></select>
                                        <select name="town" id="town" ></select>
                                        <script type="text/javascript">
                                            new PCAS('province', 'city', 'town', '<?php echo ($info["province"]); ?>', '<?php echo ($info["city"]); ?>', '<?php echo ($info["town"]); ?>');
                                        </script>
                                    </div>

                                </div>
                                <div class="control-group">
                                    <label for="email" class="control-label">公众号邮箱：</label>
                                    <div class="controls">
                                        <input type="text" name="wxaccount" value="<?php echo ($info["wxaccount"]); ?>" id="email" class="input-medium" data-rule-email="true">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="funs" class="control-label">粉丝数：</label>
                                    <div class="controls">
                                        <input type="text" name="wxfans" value="<?php echo ($info["wxfans"]); ?>" id="funs" class="input-medium">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="type" class="control-label">类型：</label>
                                    <div class="controls">
                                    <select id="type" name="type" class="input-medium" data-nosearch="true">
                                            <option value="0">选择类型</option>
											<option value="1,情感" >情感</option>
											<option value="2,数码" >数码</option>
											<option value="3,娱乐" >娱乐</option>
											<option value="4,IT" >IT</option>
											<option value="5,购物" >购物</option>
											<option value="6,生活" >生活</option>
											<option value="7,服务" >服务</option>
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
									<input type="hidden" name="id" id="id" value="<?php echo ($info["id"]); ?>">
                                    <input type="hidden" name="token" id="token" value="<?php echo ($info["token"]); ?>">
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
        var typeval = '<?php echo ($info["type"]); ?>';
        switch (typeval){
            case "1":typeval = "1,情感";break;
            case "2":typeval = "2,数码";break;
            case "3":typeval = "3,娱乐";break;
            case "4":typeval = "4,IT";break;
            case "5":typeval = "5,购物";break;
            case "6":typeval = "6,生活";break;
            case "7":typeval = "7,服务";break;
            default: typeval = 0;
        }
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