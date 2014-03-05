<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销"/>
    <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。"/>
    <link rel="shortcut icon" href="<?php echo STATICS;?>/img/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/datepicker/datepicker.css?2014-02-20-1"
          media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/daterangepicker/daterangepicker.css?2014-02-20-1"
          media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js?2014-02-20-1"></script>
    <script type="text/javascript"
            src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js?2014-02-20-1"></script>
    <script type="text/javascript"
            src="<?php echo RES;?>/src/plugins/mini_audio_player/jquery_jplayer_min.js?2014-02-20-1"></script>
    <script type="text/javascript"
            src="<?php echo RES;?>/src/plugins/mini_audio_player/jquery_mb_miniPlayer.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/zeroclipboard/zeroclipboard_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js?2014-02-20-1"></script>
    <title><?php echo C('site_title');?> <?php echo C('site_name');?></title>
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="<?php echo RES;?>/js/excanvas_min.js"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/js/watermark.js"></script>
    <![endif]-->
</head>
<link href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" rel="stylesheet"/>
<script src="<?php echo STATICS;?>/kindeditor/kindeditor-min.js"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/wm-xin-a/mini_audio_player/miniplayer.css"
      media="all"/>
<body>
<div id="main">
<div class="container-fluid">
<div class="row-fluid">
<div class="span12">
<div class="box">
<div class="box-title">
    <div class="span12">
        <h3><i class="icon-cog"></i>微官网设置</h3>
        <a class="btn preview pull-right btn-success" href="javascript:;">微官网预览</a>
        <script type="text/javascript">
            $("a.preview").click(function () {
                if ($.browser.msie) {
                    alert("不支持在IE浏览器下预览，建议使用谷歌浏览器或者360极速浏览器或者直接在微信上预览。");
                    return;
                }
                var left = ($(window.parent.parent).width() - 450) / 2;
                window.open("<?php echo C('site_url');?>/wechat/<?php echo ($token); ?>?wechatid=fromUsername", "我的微官网", "height=650,width=450,top=0,left=" + left + ",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no");
            });
        </script>
    </div>
</div>
<div class="box-content">
<form action="/npManage/MicroSite/set.act?id=<?php echo ($home['id']); ?>" method="post" class="form-horizontal form-validate">
<div class="control-group">
    <label class="control-label" for="title">官网标题：</label>

    <div class="controls">
        <input type="text" name="title" id="title" value="<?php echo ($home['title']); ?>" class="input-xlarge"
               data-rule-required="true"/>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="wxkey">触发官网关键词:</label>

    <div class="controls">
        <input type="text" name="wxkey" id="wxkey" value="<?php echo ($home['wxkey']); ?>" class="input-xlarge" data-rule-required="true"
               data-rule-maxlength="60"/>
        <span class="help-inline">多个关键字请用空格分开</span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">匹配模式：</label>

    <div class="controls">
        <label class="radio">
            <input type="radio" name="matchtype" value="0" <?php if($home["matchtype"] == 0): ?>checked="checked"<?php endif; ?>/>完全匹配（用户输入的和此关键词一样才会触发!）
        </label>
        <label class="radio ">
            <input type="radio" name="matchtype" value="1" <?php if($home["matchtype"] == 1): ?>checked="checked"<?php endif; ?>/>包含匹配 (只要用户输入的文字包含本关键词就触发！)
        </label>
    </div>
</div>
<div class="control-group" style="display:none;">
    <label class="control-label" for="caption">图文消息标题：</label>

    <div class="controls">
        <input type="text" name="caption" id="caption" value="<?php echo ($home['caption']); ?>" class="input-xlarge" data-rule-required="true"/>
        <span class="help-inline">发送关键词后返回的图文消息标题</span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="cover">图文消息封面</label>

    <div class="controls">
        <img class="thumb_img" src="<?php echo (($home['picurl'])?($home['picurl']):RES."/img/default/official.jpg"); ?>" style="max-height:100px;"/>
        <input id="thumb" type="text" name="picurl" class="hide"
               value="<?php echo (($home['picurl'])?($home['picurl']):RES."/img/default/official.jpg"); ?>"/>
										<span class="help-inline">
                                            <button class="btn select_img" type="button">选择封面</button>
											<span class="help-inline">建议尺寸：宽720像素，高400像素</span>
                                        </span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="brief">图文消息简介</label>

    <div class="controls">
        <textarea id="brief" name="info" class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default"
                  style="resize:none; width:274px; height:120px;" data-rule-required="true"><?php echo ($home['info']); ?></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="cover">官网logo</label>

    <div class="controls">
        <img class="thumb_img" src="<?php echo (($home['mslogo'])?($home['mslogo']):RES."/img/default/official.jpg"); ?>" style="max-height:100px;"/>
        <input type="text" name="mslogo" class="hide" value="<?php echo (($home['mslogo'])?($home['mslogo']):RES."/img/default/official.jpg"); ?>"/>
										<span class="help-inline">
                                            <button class="btn select_img" type="button">选择logo</button>
											<span class="help-inline">建议尺寸：宽420像素，高60像素的png图片</span>
                                        </span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="bg_img">官网背景</label>

    <div class="controls">
        <img class="gwbg thumb_img" src="<?php echo (($home['bg_img'])?($home['bg_img']):RES."/img/template/lib/home-default10.jpg"); ?>"
             style="max-height: 100px;"/>
        <input class="input-xlarge" type="text" name="bg_img" id="bg_img"
               value="<?php echo (($home['bg_img'])?($home['bg_img']):RES."/img/template/lib/home-default10.jpg"); ?>" style="display: none;"/>
                                        <span class="help-inline">
                                            <button class="btn select_img" type="button">自定义</button>
                                            建议大小(宽640高960)
                                        </span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="select_bg">选择已有的官网背景</label>

    <div class="controls">
        <select name="select_bg_img" id="select_bg" class="input-medium">
            <option value="">选择官网背景图片</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default9.jpg">01</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default10.jpg">02</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default11.jpg">03</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default12.jpg">04</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default13.jpg">05</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default14.jpg">06</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default15.jpg">07</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default1.jpg">08</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default2.jpg">09</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default3.jpg">10</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default4.jpg">11</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default5.jpg">12</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default6.jpg">13</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default7.jpg">14</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default8.jpg">15</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default16.jpg">16</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default17.jpg">17</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default18.jpg">18</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default19.jpg">19</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default20.jpg">20</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default21.jpg">21</option>
            <option value="<?php echo RES;?>/img/template/lib/home-default22.jpg">22</option>
        </select>
        <span class="help-inline">以预览背景图为标准</span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="mp3url">背景音乐</label>

    <div class="controls">
        <div class="inline mp3">
            <a id="m1" class="audio " href="<?php echo RES;?>/img/template/lib/default.mp3" style="display: none;">default.mp3</a>
        </div>
        <input type="hidden" name="bg_audio" id="mp3url" value="<?php echo RES;?>/img/template/lib/default.mp3"/>
                                        <span class="help-inline">
											<button class="btn addmp3" type="button">选择音乐</button>
                                        </span>
        <span class="help-inline">(保证浏览网页的加载速度,上传音乐最大为<span class="red">3MB</span>)</span>
    </div>
    <script type="text/javascript">
        KindEditor.ready(function (K) {
            var editor = K.editor({
                themeType: "simple",
                allowFileManager: true

            });
            var _mp3_i = 0;
            K('button.select_img').click(function (e) {
                editor.loadPlugin('smimage', function () {
                    editor.plugin.imageDialog({
                        imageUrl: $(e.target).parent().prevAll("input[type=text]").val(),
                        clickFn: function (url, title, width, height, border, align) {
                            var $input = $(e.target).parent().prevAll("input[type=text]")
                            $input.val(url)
                            $input.hide();
                            var t_img = $(e.target).parent().prevAll(".thumb_img:first");
                            if (t_img.length == 0) {
                                var tmp = '<img class="thumb_img" src="{0}" style="max-height: 100px;">';
                                $input.before(tmp.format(url))
                            } else {
                                t_img.attr("src", url);
                            }

                            editor.hideDialog();
                        }
                    });
                });
            });
            K('button.addmp3').click(function (e) {
                editor.loadPlugin('mp3', function () {
                    editor.plugin.imageDialog({
                        mp3Url: $(e.target).parent().prevAll("input[type=text]").val(),
                        clickFn: function (url, title, width, height, border, align) {
                            _mp3_i++;
                            var $input = $(e.target).parent().prevAll("input[type=hidden]")
                            var $mp3 = $(e.target).parent().prevAll("div.mp3");
                            var $flag = $mp3.find("a.audio");
                            var $filename = url.match(/[^\/]*$/)[0];
                            if ($filename.lastIndexOf('.') > -1) {
                                $filename = $filename.substring(0, $filename.lastIndexOf('.'))
                            }
                            $input.val(url)
                            if ($flag.length > 0) {
                                $flag.mb_miniPlayer_changeFile({ mp3: url }, $filename);
                                $flag.mb_miniPlayer_play();
                            }
                            else {
                                while ($("#m" + _mp3_i).length > 0) {
                                    _mp3_i++;
                                }
                                var _tmp = '<a id="m{1}" class="audio {skin:\'blue\'}" href="{0}">{2}</a> ';
                                $mp3.html(_tmp.format(url, _mp3_i, $filename));
                                $mp3.find("a.audio").mb_miniPlayer();
                                var $id = $mp3.find("a.audio").attr("id");
                                setTimeout(function () {
                                    $("#" + $id).mb_miniPlayer_play();
                                }, 1000);
                            }
                            editor.hideDialog();
                            $(e.target).text("重新选择");
                        }
                    });
                });
            });
            $("#select_bg").change(function () {
                var v = $(this).val();
                if (v.length > 0) {
                    $("img.gwbg").attr("src", v)
                    $("#bg_img").val(v);
                }
            })
        });

    </script>
</div>
<div class="control-group">
    <label class="control-label" for="select_animation">功能选择</label>

    <div class="controls ">
        <label class="checkbox inline">
            <input type="checkbox" name="comment" value="1" <?php if($home["comment"] == 1): ?>checked="checked"<?php endif; ?>/>
            开启素材图文评论
        </label>
        <label class="checkbox inline">
            <input type="checkbox" name="play_img" value="1" <?php if($home["play_img"] == 1): ?>checked="checked"<?php endif; ?>/>
            开启背景图片
        </label>
        <label class="checkbox inline">
            <input type="checkbox" name="play_audio" value="1" <?php if($home["play_audio"] == 1): ?>checked="checked"<?php endif; ?>/>
            开启背景音乐
        </label>
        <span class="help-inline">(只有开启背景音乐或图片前台页面才会显示或播放)</span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="select_animation">开场动画</label>

    <div class="controls">
        <select name="animation" id="select_animation" class="input-medium">
            <option value="0">关闭开场动画</option>
            <option value="6" <?php if($home["animation"] == 6): ?>selected="selected"<?php endif; ?>>宝马动画</option>
            <option value="4" <?php if($home["animation"] == 4): ?>selected="selected"<?php endif; ?>>左右展开</option>
            <option value="5" <?php if($home["animation"] == 5): ?>selected="selected"<?php endif; ?>>上下展开</option>
            <option value="3" <?php if($home["animation"] == 3): ?>selected="selected"<?php endif; ?>>黄色2秒</option>
            <option value="2" <?php if($home["animation"] == 2): ?>selected="selected"<?php endif; ?>>红色2秒</option>
            <option value="1" <?php if($home["animation"] == 1): ?>selected="selected"<?php endif; ?>>绿色2秒</option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="bg_animation">背景动画</label>

    <div class="controls">
        <select name="bg_animation" id="bg_animation" class="input-medium">
            <option value="0" <?php if($home["bg_animation"] == 0): ?>selected="selected"<?php endif; ?>>关闭背景动画</option>
            <option value="15" <?php if($home["bg_animation"] == 15): ?>selected="selected"<?php endif; ?>>雪花</option>
            <option value="13" <?php if($home["bg_animation"] == 13): ?>selected="selected"<?php endif; ?>>玫瑰</option>
            <option value="7" <?php if($home["bg_animation"] == 7): ?>selected="selected"<?php endif; ?>>秋天落叶</option>
            <option value="8" <?php if($home["bg_animation"] == 8): ?>selected="selected"<?php endif; ?>>红枫叶</option>
            <option value="9" <?php if($home["bg_animation"] == 9): ?>selected="selected"<?php endif; ?>>绿色花朵</option>
            <option value="10" <?php if($home["bg_animation"] == 10): ?>selected="selected"<?php endif; ?>>红色花朵</option>
            <option value="11" <?php if($home["bg_animation"] == 11): ?>selected="selected"<?php endif; ?>>橙色花朵</option>
            <option value="12" <?php if($home["bg_animation"] == 12): ?>selected="selected"<?php endif; ?>>蓝色花朵</option>
            <option value="1" <?php if($home["bg_animation"] == 1): ?>selected="selected"<?php endif; ?>>白色霓虹点</option>
            <option value="2" <?php if($home["bg_animation"] == 2): ?>selected="selected"<?php endif; ?>>橙色霓虹点</option>
            <option value="3" <?php if($home["bg_animation"] == 3): ?>selected="selected"<?php endif; ?>>粉色霓虹点</option>
            <option value="4" <?php if($home["bg_animation"] == 4): ?>selected="selected"<?php endif; ?>>黄色霓虹点</option>
            <option value="5" <?php if($home["bg_animation"] == 5): ?>selected="selected"<?php endif; ?>>蓝色霓虹点</option>
            <option value="6" <?php if($home["bg_animation"] == 6): ?>selected="selected"<?php endif; ?>>紫色霓虹点</option>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="tj_code">统计代码 </label>

    <div class="controls">
        <textarea id="tj_code" name="stat_code" class="input-xxlarge" rows="4"><?php echo ($home['stat_code']); ?></textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="sites">首页地址：</label>

    <div class="controls" style="padding-top:4px;">
        <span class="copy_text"><?php echo C('site_url');?>/wesite/<?php echo ($wxuser["id"]); ?>/index</span>
        <input type="hidden" name="homeurl" id="sites" value="<?php echo C('site_url');?>/wesite/<?php echo ($wxuser["id"]); ?>/index"
               class="input-xlarge"/>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="sites">智能分流：</label>

    <div class="controls">
        <lable>请将此段代码复制到您<strong class="red">PC网站</strong>&lt;/head&gt;&lt;body&gt;之间,这样手机访问PC网站的用户就会自动跳转到微官网</lable>
        <br>
        <textarea id="smart_branch" name="smart_branch" class="input-xxlarge copy_text" rows="5" readonly="readonly">
            <script>
                var pc_style = ""
                var browser = {
                    versions: function () {
                        var u = navigator.userAgent, app = navigator.appVersion;
                        return {
                            trident: u.indexOf('Trident') &gt; -1,
                            presto: u.indexOf('Presto') &gt; -1,
                            webKit: u.indexOf('AppleWebKit') &gt; -1,
                            gecko: u.indexOf('Gecko') &gt; -1 &amp;&amp; u.indexOf('KHTML') == -1,
                            mobile: !!u.match(/AppleWebKit.*Mobile.*/) || !!u.match(/AppleWebKit/) &amp;&amp; u.indexOf('QIHU') &amp;&amp; u.indexOf('Chrome') &lt; 0,
                            ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/),
                            android: u.indexOf('Android') &gt; -1 || u.indexOf('Linux') &gt; -1,
                            iPhone: u.indexOf('iPhone') &gt; -1 || u.indexOf('Mac') &gt; -1,
                            iPad: u.indexOf('iPad') &gt; -1,
                            webApp: u.indexOf('Safari') == -1,
                            ua: u
                        };
                    }(),
                    language: (navigator.browserLanguage || navigator.language).toLowerCase()
                }

                if (browser.versions.mobile &amp;&amp; !browser.versions.iPad) {
                    this.location = "<?php echo C('site_url');?>/wesite/<?php echo ($wxuser["id"]); ?>/index";
                }
            </script>
        </textarea>
    </div>
</div>
<input type="hidden" name="id" value="<?php echo ($home['id']); ?>">

<div class="form-actions">
    <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
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