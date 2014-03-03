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
        <script type="text/javascript">
        $(document).ready(function () {
        	$("div.mc-name").css("color", $('#cname_color').val());
        	$("#select_bg").val("");
        	$("div.mc-number").css("color", '');

        	$("h4.mc-title").css("color", $('#bg_bg_color').val());
        	$("pre.mc-content").css("color", $('#bg_bg_color').val());
        	$("div.mc-address").css("color", $('#bg_bg_color').val());
        	$("#select_bg_bg").val("");
        	
            $("#cname").keyup(function () {
                $("div.mc-name").text($(this).val())
            });
            $("#cname_color").change(function () {
                $("div.mc-name").css("color", $(this).val())
            });
            $("#numbercolor").change(function () {
                $("div.mc-number").css("color", $(this).val())
            });
            $("#bg_bg_color").change(function () {
                var v = $(this).val();
                $("h4.mc-title").css("color", v);
            	$("div.mc-address").css("color", v);
                $("div.img-preview-bg").css("color", v)
                $("pre.mc-content").css("color", v)
            });
            $("#select_bg").change(function () {
                var v = $(this).val();
                if (v.length > 0) {
                    $("img.i-img").attr("src", v)
                    $("#card_bg").val(v);
                }
            });
            $("input[name='kh_type']").click(function () {
                $("#zdy_kh").toggle($(this).hasClass("zdy_kh"));
				value = $(this).val();
				if (value == "1") {
					 $("#proving_yz0").attr("selected", true);
					 $("#proving_yz1").attr("disabled", "disabled");
				} else {
					 $("#proving_yz1").attr("disabled", false);
				}
            });
            
            $("#description").keyup(function () {
                $("pre.mc-content").text($(this).val())
            })
            $("#select_bg_bg").change(function () {
                var v = $(this).val();
                if (v.length > 0) {
                    $("img.i-img-bg").attr("src", v)
                    $("#card_bg_bg").val(v);
                }

            });

            //重载初值
            $("pre.mc-content").text('<?php echo ($info["instructions"]); ?>')
        });
    </script>
    <body>
    <div id="main">
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                    <div class="box">
                        <div class="box-title">
                            <div class="span10">
                                <h3><i class="icon-edit"></i>会员卡设置</h3>
                            </div>
                        </div>
                        <div class="box-content">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="javascript:;">卡片设置</a> </li>
                                <li><a href="/npManage/member/memberFields.act">会员资料设置</a></li>
                                <li><a href="/npManage/member/listprivilege.act">会员卡特权</a></li>
                                <li><a href="/npManage/member/setcardlevel.act">等级设置</a></li>
                            </ul>
                            <form action="/npManage/member/addcard.act" method="post" class='form-horizontal form-validate'>
                                    <div class="row-fluid">
                                    <div class="img-preview">
                                        <div class="img-wrapper">
                                            <img class="i-img" src="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg21.png">
                                            <div class="mc-name"></div>
                                            <div class="mc-number"><em>会员卡号</em>88888</div>
                                        </div>
                                    </div>
                                    <div class="span7">
                                        <div class="control-group">
                                            <label class="control-label">会员卡名称</label>
                                            <div class="controls inline">
                                                 <input type="text" name="cname" id="cname" value="<?php echo ($info["cname"]); ?>" class="input-medium">
                                                  <span class="help-block">*不填写则不展示会员卡名称</span>
                                            </div>

                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="cname_color">会员卡名称颜色</label>
                                            <div class="controls inline">
                                                <input type="text" name="cname_color" id="cname_color" value="<?php echo (($info["cname"])?($info["cname"]):"#000"); ?>" class="input-mini color">
                                            </div>

                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="select_bg">会员卡的背景</label>
                                            <div class="controls">
                                                <select name="select_bg" id="select_bg" class="input-large" style="width: 227px">
                                                    <option selected="" value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg21.png">请选择会员卡背景图</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg01.png">01 </option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg02.png">02</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg03.png">03</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg04.png">04</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg05.png">05</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg06.png">06</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg07.png">07</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg08.png">08</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg09.png">09</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg10.png">10</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg11.png">11</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg12.png">12</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg13.png">13</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg14.png">14</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg15.png">15</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg16.png">16</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg17.png">17</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg18.png">18</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg19.png">19</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg20.png">20</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg21.png">21</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg22.png">22</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg23.png">23</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">
                                                自己设计背景
                                            </label>
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input type="text" name="card_bg" readonly id="card_bg" value="<?php echo (($info["card_bg"])?($info["card_bg"]):RES."/img/web_bb/card/cardbg/card_bg21.png"); ?>" class="input-large">
                                                    <button type="button" class="btn insertimage" rel="i-img">选择背景</button>
                                                </div>
                                                <span class="help-block">建议尺寸：560像素 * 330像素</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">
                                                会员卡的图标
                                            </label>
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input type="text" name="card_logo" readonly id="logo" value="<?php echo ($info["card_logo"]); ?>" class="input-large">
                                                    <button type="button" class="btn insertimage" rel="mc">选择背景</button>

                                                </div>
                                                <span class="help-block">建议尺寸：152像素 * 70像素(透明图片)</span>
                                            </div>
                                            <link href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" rel="stylesheet" />
                                                <script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
                                                <script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js"></script>
                                                <script src="<?php echo STATICS;?>/kindeditor/kindeditor.config-upfile.js"></script>
                                                <script type="text/javascript">
                                                    KindEditor.ready(function (K) {
                                                        var editor = K.editor({
                                                            themeType: "simple",
                                                            allowFileManager: true
                                                        });
                                                        $('a.insertimage').add("button.insertimage").click(function (e) {
                                                            editor.loadPlugin('smimage', function () {
                                                                var $input = $(e.target).prev();
                                                                //console.log($input);
                                                                editor.plugin.imageDialog({
                                                                    imageUrl: $input ? $input.val() : "",
                                                                    clickFn: function (url, title, width, height, border, align) {
                                                                        if ($input) {
                                                                            $input.val(url);
                                                                            var rel = $(e.target).attr("rel")

                                                                            $("img." + rel + "").attr("src", url)
                                                                        }
                                                                        editor.hideDialog();
                                                                    }
                                                                });
                                                            });
                                                        })

                                                    });
                                                    
                                                </script>

                                        </div>
                                        <div class="control-group">
		                                    <label class="control-label">是否展示图标</label>
		                                    <div class="controls">
		                                        <label class="radio inline">
		                                            <input type="radio" name="is_show" value="1" <?php if(info.is_show): ?>checked="checked"<?php endif; ?> >展示
		                                        </label>
				                                <label class="radio inline">
				                                       <input type="radio" name="is_show" value="0" <?php if(info.is_show): ?>checked="checked"<?php endif; ?>>不展示
				                                 </label>
		                                    </div>
		                                </div>
                                        <div class="control-group">
                                                <label for="textfield" class="control-label">
                                                    卡号文字颜色
                                                </label>
                                                <div class="controls">
                                                    <input type="text" name="numbercolor" id="numbercolor" value="<?php echo (($info["numbercolor"])?($info["numbercolor"]):"#000"); ?>" class="input-mini color">
                                                </div>
                                        </div>   
                                        <div class="control-group">
                                            <label class="control-label">会员卡号设置</label>
                                            <div class="controls inline">
                                                <label class="radio">
                                                    <input type="radio" name="kh_type" value="0" <?php if(info.kh_type): ?>checked="checked"<?php endif; ?>  >默认卡号
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="kh_type" value="1" <?php if(info.kh_type): ?>checked="checked"<?php endif; ?>>手机号作为卡号  <span class="help-block">*勾选后，用户领取会员卡时则必须验证</span>
                                                </label>
                                                <label class="radio ">
                                                    <input type="radio" name="kh_type" class="zdy_kh" value="2" <?php if(info.kh_type): ?>checked="checked"<?php endif; ?>>自定义会员卡号(只允许字母和整数组合)
                                                </label> 
                                                
                                            </div>

                                            <div class="controls hide" id="zdy_kh">
                                                <input type="text" id="kh_start" name="cardno_prefix" placeholder="例如888" value="<?php echo ($info["cardno_prefix"]); ?>" data-rule-lettersnumbers="true" data-rule-maxlength="6" class="input-mini" /><span class="help-inline">自定义前缀 最多6位</span>
                                                <input type="text" id="cardno_suffix" name="cardno_suffix" placeholder="例如666" value="<?php echo ($info["cardno_suffix"]); ?>" class="input-mini" data-rule-lettersnumbers="true" data-rule-maxlength="3" data-rule-requiredone="#kh_start" /><span class="help-inline">自定义后缀 最多3位</span>
											</div>
                                        </div>
                                        <div class="control-group">
		                                    <label class="control-label">是否短信验证</label>
		                                    <div class="controls">
		                                        <label class="radio inline">
		                                            <input type="radio" id="proving_yz0" name="proving" value="0" <?php if(info.proving): ?>checked="checked"<?php endif; ?>  >验证
		                                        </label>
				                                <label class="radio inline">
				                                 <input type="radio" id="proving_yz1" name="proving" value="1" <?php if(info.proving): ?>checked="checked"<?php endif; ?>>不验证
				                                 </label>
				                                 <span class="help-block">*勾选后，用户领取会员卡时则必须验证</span>
		                                    </div>
		                                </div>
                                        <div class="control-group">
                                                <label class="control-label" for="fanslocal"> 商家确认消费密码</label>
                                                <div class="controls">
                                                    <input type="text" name="password" id="password" data-rule-required="true" value="<?php echo ($info["password"]); ?>"/>
                                                    <span class="help-inline">手机端确认使用优惠券等输入此密码，不超过20个字。</span></span>
                                                </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row-fluid">
                                    <h5>背面设置</h5>
                                    <hr />
                                    <div class="img-preview-bg">
                                        <div class="img-wrapper">
                                            <img class="i-img-bg" src="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg02.png">
                                            <h4 class="mc-title">使用说明</h4>
                                            <pre class="mc-content">
                                            </pre>
                                            <div class="mc-address">地址：</div>
                                        </div>
                                    </div>
                                    <div class="span7">
                                        <div class="control-group">
                                            <label class="control-label" for="select_bg_bg">反面背景</label>
                                            <div class="controls">
                                                <select name="background" id="select_bg_bg" class="input-large" style="width: 227px">
                                                    <option selected="" value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg21.png">请选择会员卡背景图</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg01.png">01 </option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg02.png">02</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg03.png">03</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg04.png">04</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg05.png">05</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg06.png">06</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg07.png">07</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg08.png">08</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg09.png">09</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg10.png">10</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg11.png">11</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg12.png">12</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg13.png">13</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg14.png">14</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg15.png">15</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg16.png">16</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg17.png">17</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg18.png">18</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg19.png">19</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg20.png">20</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg21.png">21</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg22.png">22</option>
                                                    <option value="<?php echo RES;?>/img/web_bb/card/cardbg/card_bg23.png">23</option>
                                                </select>
                                            </div>

                                        </div>                      
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">
                                                自己设计背景
                                            </label>
                                            <div class="controls">
                                                <div class="input-append">
                                                    <input type="text" name="custom_background" id="card_bg_bg" readonly class="input-large" value="<?php echo (($info["custom_background"])?($info["custom_background"]):RES."/img/web_bb/card/cardbg/card_bg21.png"); ?>">
                                                    <button type="button" class="btn insertimage" rel="i-img-bg">选择背景</button>
                                                </div>
                                                <span class="help-block">建议尺寸：560像素 * 330像素</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="bg_bg_color" class="control-label">
                                                文字颜色
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="back_text_color" id="bg_bg_color" value="<?php echo (($info["back_text_color"])?($info["back_text_color"]):"#000"); ?>" class="input-mini color">
                                            </div>
                                 	</div>
                                 	<div class="control-group">
                                            <label for="description" class="control-label">
                                                会员卡使用说明
                                            </label>
                                            <div class="controls">
                                                <textarea id="description" rows="5" name="instructions" class="input-xlarge" data-rule-required="true" data-rule-maxlength="500"><?php echo ($info["instructions"]); ?></textarea>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="form-actions">
                                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
                                        <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
                                        <button type="button" class="btn" onclick="Javascript:window.history.go(-1)">取消</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>

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