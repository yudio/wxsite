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
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/page/binding.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/flot/jquery_flot.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/flot/jquery_easy_pie_chart.js"></script>
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
                            <div class="span12">
                                <h3><i class="icon-cog"></i>公众帐号智能绑定</h3>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="bboxl step1">
                                <div class="pd">
                                    <div class="f14 mb30">
                                        请输入微信公众平台帐号信息，非微盟帐号。无帐号点击<a href="https://mp.weixin.qq.com" target="_blank">申请</a>
                                    </div>

                                    <form action="/wechat/autobind" method="post" class="form-horizontal form-validate2">
                                        <div class="control-group">
                                            <label class="control-label" for="username">微信公众平台帐号:</label>
                                            <div class="controls">
                                                <input type="text" name="username" id="username" class="input-large" data-rule-required="true" data-rule-maxlength="60" />
                                                <span for="username" class="help-block error valid"></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="password">密码:</label>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="input-large" data-rule-required="true" data-rule-maxlength="60" />
                                                <span for="password" class="help-block error valid"></span>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button id="bsubmit" type="submit" data-loading-text="绑定中..." class="btn btn-primary">智能绑定</button>
                                        </div>
                                    </form>
                                    <div class="f14 gray">
                                        帐号及密码仅限智能绑定使用，不保存！不泄漏！不放心？点此 <a href="/wechat/addaccount">手动绑定</a>
                                    </div>
                                </div>

                            </div>
                            <div class="bboxl step2 hide">
                                <div class="carousel">
                                    <img src="img/binding/b1.jpg" />
                                </div>
                            </div>
                            <div class="bboxl step3 hide">
                                <div class="pd">
                                    <div class="end">
                                        <div class="p1 margin-bm10">智能绑定完成，请验证绑定结果</div>
                                        <div class="f14 mb30">
                                            使用个人帐号向您的公众帐号发送一条文本消息“验证”，如收到“绑定成功， 盟妹来了”，表明您已成功完成智能绑定。
                                        </div>
                                        <div class="mb30">
                                            <a class="btn btn-primary btn-large btn-zdy" id="gotomyaccount" href="/wechat/account" target="_top">进入“微”世界</a>
                                        </div>
                                        <div class="f14 margin-bm10">
                                            未收到消息，点此<a href="javascript:location.reload()">重新绑定</a>
                                        </div>
                                        <div class="f14 gray">
                                            友情提示：
                                            <div id = 'suc_tip'>您当前微信公众平台帐号类型为订阅号/认证订阅号/服务号， 会存在因帐号类型权限造成功能无法使用的问题。</div>
                                        </div>
                                    </div>
                                    <div class="mm">
                                        <img src="img/binding/mm.jpg" />
                                        <div class="f14 gray">盟妹来了~  </div>
                                        <div class="f14 gray">关注盟妹，惊喜每一天！</div>
                                    </div>
                                </div>
                            </div>
                            <div class="bboxr selid1 ">
                                <div class="t1">
                                    欢迎使用微盟公众帐号智能绑定功能，您只需输入微信公众帐号及密码，微盟将自动完成微盟平台与微信公众平台的数据对接，请耐心等耐。
                                </div>
                                <div class="t2">微盟</div>
                                <div class="t3">
                                    将带你走进商机无限的“微”世界
与你共创“微”未来
                                </div>
                            </div>
                            <div class="bboxr selid2 hide">
                                <div class="t2">微盟</div>
                                <div class="t3">
                                    将带你走进商机无限的“微”世界
与你共创“微”未来
                                </div>
                                <div class="t4">
                                    <div class="inline">
                                        <div class="title">授权验证</div>
                                        <div class="easypiechart" data-step="1">
                                            <span class="h2 step"></span>%
                                        </div>
                                    </div>
                                    <div class="inline">
                                        <div class="title">平台对接</div>
                                        <div class="easypiechart" data-step="2">
                                            <span class="h2 step"></span>%

                                        </div>
                                    </div>
                                    <div class="inline">
                                        <div class="title">数据同步</div>
                                        <div class="easypiechart" data-step="3">
                                            <span class="h2 step"></span>%
                                        </div>
                                    </div>
                                    <div class="inline">
                                        <div class="title">功能开通</div>
                                        <div class="easypiechart" data-step="-1">
                                            <span class="h2 step"></span>%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bbbp f14 tile-themed">
                                我们提供更便捷、更贴心、更高效的微信公众智能服务。微盟的使命帮助100万家企业从微信营销中获得成功。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {


        var $from = $("form.form-validate2"),
                $step1 = $("div.step1"),
                  $step2 = $("div.step2"),
                    $step3 = $("div.step3"),
                      $selid1 = $("div.selid1"),
                        $selid2 = $("div.selid2"),
                          $ep1 = $('.easypiechart:eq(0)');
        var ischrome = window.navigator.userAgent.indexOf("Chrome") !== -1;
        console.log(window.navigator.userAgent);
            $from.validate({
                errorElement: "span",
                errorClass: "help-block error",
                errorPlacement: function (e, t) {
                    var p = t.parents(".controls");
                    if (p.length > 0) {
                        p.append(e);
                    }
                    else {
                        t.addClass("error")
                    }
                },
                highlight: function (e) {
                    $(e).closest(".control-group").removeClass("error success").addClass("error")
                },
                success: function (e) {
                    e.addClass("valid").closest(".control-group").removeClass("error success");
                },

                submitHandler: function (form) {
                    var btn = $("button[type='submit']", form);
                    btn.button('loading')
                    $(form).ajaxSubmit({
                        dataType: 'json',
                        success: function (d) {
                            btn.button('reset');
							//{"errno":0,"error":"\u60a8\u5f53\u524d\u5fae\u4fe1\u516c\u4f17\u5e73\u53f0\u5e10\u53f7\u7c7b\u578b\u4e3a\u8ba2\u9605\u53f7,\u4f1a\u5b58\u5728\u56e0\u5e10\u53f7\u7c7b\u578b\u6743\u9650\u9020\u6210\u529f\u80fd\u65e0\u6cd5\u4f7f\u7528\u7684\u95ee\u9898\u3002","pid":69535}
                            if (d.errno == 0) {
								// 修改跳转链接
								var url = '/wechat/index/aid/' + d.pid;
								$('#gotomyaccount').attr('href', url);

								$('#suc_tip').html(d.error);
                                $step1.animate({ opacity: 0 }, 1000, function () {
                                    $(this).addClass("hide");
                                });
                                $selid1.animate({ opacity: 0 }, 1000, function () {
                                    $(this).addClass("hide");
                                    $step2.fadeIn('slow');
                                    $selid2.fadeIn('slow', function () {
                                        $ep1.data('easyPieChart').update(100);
                                    });
                                });
                            } else { G.logic.form.tip(d); }

                        },
                        error: function (d) {
                            btn.button('reset');
                            G.ui.tips.info(d.responseText);
                        }
                    });
                }
            });

            var $op = {
                barColor: "#afcf6f",
                animate: 5000,
                lineCap: "butt",
                lineWidth: 10,
                scaleColor: "#fff",
                size: 88,
                trackColor: "#eee"
            }
            $('.easypiechart').each(function () {
                var $this = $(this),
                    $data = $this.data(),
                    $step = $this.find('.step'),
                    $value = 0;
                $op.onStep = function (value) {
                    $value = value;
                    $step.text(parseInt(value));
                    $op.target && $($op.target).text(parseInt(value) + $target_value);
                }
                $op.onStop = function (v) {
                    var $$this = (this),
                        $el = $($$this.el),
                        $step = $el.data("step")
                    if ($step > 0 && v > 0) {
                        $('.easypiechart:eq(' + $step + ')').data('easyPieChart').update(100);
                        $(".carousel img").fadeOut('fast', function () {
                            $(".carousel img").attr("src", ("img/binding/b{0}.jpg".format($step + 1)));
                        });
                        $(".carousel img").fadeIn('slow');
                    }
                    if ($step == "-1" && v > 0) {
                        $step2.animate({ opacity: 0 }, 300, function () {
                            $(this).hide().addClass("hide");
                        });
                        $step3.fadeIn('slow');
                    }

                }
                $(this).easyPieChart($op);

            });

        })
    </script>
	</body>
</html>