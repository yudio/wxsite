<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
    <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
    <link rel="shortcut icon" href="img/favicon.ico<?php echo RES;?>/src/" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/page/wx_vip.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/daterangepicker/daterangepicker.css" media="all" />

    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/jscolor/jscolor.js"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/daterangepicker/moment_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/daterangepicker/daterangepicker.js"></script>
    <title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css<?php echo RES;?>/src/" rel="stylesheet" />
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="<?php echo RES;?>/js/excanvas_min.js<?php echo RES;?>/src/"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/js/watermark.js<?php echo RES;?>/src/"></script>
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
                                <h3><i class="icon-edit"></i>添加特权内容</h3>
                            </div>
                        </div>

                        <div class="box-content">
                            <form action="/npManage/member/addmemberprivilege.act?id=<?php echo ($info["id"]); ?>" method="post" class="form-horizontal form-validate">

                                <div class="control-group">
                                    <label for="keyword" class="control-label">标题：</label>
                                    <div class="controls">
                                        <input type="text" name="title" id="short_title" value="<?php echo ($info["title"]); ?>" class="input-large" data-rule-required="true" data-rule-maxlength="30" />
                                        <span class="help-inline">不超过30个字符</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">适用人群</label>

                                    <div class="controls">

                                        <label class="radio inline">
                                            <input type="checkbox" name="crowd_type[]" value="0"
                                            <?php if($info["crowd_type"] == '0'): ?>checked="checked"<?php endif; ?>
                                            />所有会员

                                        </label>
                                        <label class="radio inline">
                                            <?php if(is_array($levels)): $i = 0; $__LIST__ = $levels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$le): $mod = ($i % 2 );++$i;?><input type="checkbox" name="crowd_type[]" value="<?php echo ($le["id"]); ?>" <?php if(in_array($le.id,explode(',',$info.crowd_type))): endif; ?> /><?php echo ($le["cname"]); endforeach; endif; else: echo "" ;endif; ?>
                                        </label>
                                    </div>
                                </div>
                              
                                <div class="control-group">
                                    <label class="control-label" for="">时间设置</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                            <input type="text" name="time" readonly="" id="time"  class="daterangepick input-xlarge" data-rule-required="true" />
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="content">使用说明</label>
                                    <div class="controls">
                                        <textarea class="input-large" name="content" id="info" data-rule-required="true"  ><?php echo ($info["content"]); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                                    <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
                                    <button type="button" class="btn" onclick="Javascript:window.history.go(-1)">取消</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
     <script type="text/javascript">

         var seting = {
             themeType: "simple",
             resizeType: 1,
             syncType: "",
             allowPreviewEmoticons: false,
             items: [
 'source', 'undo', 'redo', 'plainpaste', 'plainpaste', 'wordpaste', 'clearhtml', 'quickformat', 'selectall', 'fullscreen', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'hr',
 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
 'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'unlink', 'preview'],
             allowFileManager: true,
             width: "70%",
             afterCreate: function () {
                 this.sync();
             },
             afterBlur: function () {
                 this.sync();
             }
         }
         var editor1;
         KindEditor.ready(function (K) {
             editor1 = K.create('#info', seting);

         });


    </script>
	<script>
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