<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" />
  <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" />
  <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico?v=2014-02-20-1" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-20-1" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-20-1" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-20-1" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-20-1" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css?2014-02-20-1" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css?2014-02-20-1" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/official.css?2014-02-20-1" media="all" />
  <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-20-1"></script>
  <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-20-1"></script>
  <script type="text/javascript" src="<?php echo STATICS;?>/inside.js?2014-02-20-1"></script>
  <title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title><!--[if IE 7]>
            <link href="<?php echo RES;?>/css/font_awesome_ie7.css?v=2014-02-20-1" rel="stylesheet" />
        <![endif]-->
  <!--[if lte IE 8]>
            <script src="<?php echo RES;?>/js/excanvas_min.js?v=2014-02-20-1"></script>
        <![endif]-->
  <!--[if lte IE 9]>
            <script src="<?php echo RES;?>/js/watermark.js?v=2014-02-20-1"></script>
        <![endif]-->
</head>

<body>
  <div id="main">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="box">
            <div class="box-title">
              <div class="span12">
                <h3>模板管理</h3><a class="btn preview pull-right btn-success" href="javascript:;">微官网预览</a>
				<script type="text/javascript">
				$("a.preview").click(function () {
						if ($.browser.msie) {
								alert("不支持在IE浏览器下预览，建议使用谷歌浏览器或者360极速浏览器或者直接在微信上预览。");
								return;
						}
						var left = ($(window.parent.parent).width() - 450) / 2;
						window.open("/wechat.wx/<?php echo ($token); ?>?wechatid=fromUsername", "我的微官网", "height=650,width=450,top=0,left=" + left + ",toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no");
				});
                </script>
              </div>
            </div>

            <div class="box-content">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#column" data-toggle="tab">栏目首页模板风格</a></li>

                <li><a href="#channel" data-toggle="tab">频道模板风格</a></li>

                <li><a href="#list" data-toggle="tab">图文列表模板风格</a></li>

                <li><a href="#detailed" data-toggle="tab">图文详细页模板</a></li>

                <li><a href="#menu" data-toggle="tab">菜单导航模板</a></li>

                <li><a href="#color" data-toggle="tab" style="display:none;">颜色选择</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade active in" id="column">
                  <!--
                                                                                <ul class="nav nav-tabs nav-tabs-google" style="border-bottom:none">
                                                                                                <li class="active">
                                                                                                        <a href="/Microsite/Template?aid=72040&label=0">热门推荐</a>
                                                                                                </li>
                                                                                                                                                                                        <li >
                                                                                                        <a href="/Microsite/Template?aid=72040&label=1">经典大方</a>
                                                                                                </li>
                                                                                                                                                                                        <li >
                                                                                                        <a href="/Microsite/Template?aid=72040&label=2">简约时尚</a>
                                                                                                </li>
                                                                                                                                                                                        <li >
                                                                                                        <a href="/Microsite/Template?aid=72040&label=3">五彩斑斓</a>
                                                                                                </li>
                                                                                                                                                                                        <li >
                                                                                                        <a href="/Microsite/Template?aid=72040&label=4">个性定制</a>
                                                                                                </li>
                                                                                                                                                                                        <li >
                                                                                                        <a href="/Microsite/Template?aid=72040&label=5">VIP尊享</a>
                                                                                                </li>
                                                                                        </ul>
                                                                                        -->

                  <ul class="cateradio unstyled">
                    <li class="active free"><label><img src="<?php echo RES;?>/img/template/home-13.png?v=7" alt="TOP1" title="TOP1" /> <input type="radio" name="home" value="13" checked="checked" /> <span style='font-weight:bold;'>TOP1</span></label></li>

                    <li class="">
                      <div class="mbtip">
                        图标式模板，背景在微官网的首页幻灯片里添加，建议尺寸为960*640或近似等比例图；分类图标请选择系统图标。
                      </div><label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-38.png?v=7" alt="TOP2" title="TOP2" /> <input type="radio" name="home" value="38" disabled="disabled" /> <span style='font-weight:bold;'>TOP2</span></label>

                      <div style="padding:5px 0px 10px;">
                        <label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');">行业热度：</label>
                      </div>
                    </li>

                    <li class="free">
                      <div class="mbtip">
                        左右图文式模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片建议使用450*300或近似等比例图片，请不要使用高度大于或接近于宽度的图片。
                      </div><label><img src="<?php echo RES;?>/img/template/home-3.png?v=7" alt="TOP3" title="TOP3" /> <input type="radio" name="home" value="3" /> <span style='font-weight:bold;'>TOP3</span></label>
                    </li>

                    <li class=""><label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-32.png?v=7" alt="TOP4" title="TOP4" /> <input type="radio" name="home" value="32" disabled="disabled" /> <span style='font-weight:bold;'>TOP4</span></label></li>

                    <li class="free"><label><img src="<?php echo RES;?>/img/template/home-16.png?v=7" alt="TOP5" title="TOP5" /> <input type="radio" name="home" value="16" /> <span style='font-weight:bold;'>TOP5</span></label></li>

                    <li class="">
                      <div class="mbtip">
                        图标式模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片请使用正方形尺寸的图片。
                      </div><label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-28.png?v=7" alt="TOP6" title="TOP6" /> <input type="radio" name="home" value="28" disabled="disabled" /> <span style='font-weight:bold;'>TOP6</span></label>
                    </li>

                    <li class="">
                      <div class="mbtip">
                        图标式模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片请使用正方形尺寸的图片。
                      </div><label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-26.png?v=7" alt="TOP7" title="TOP7" /> <input type="radio" name="home" value="26" disabled="disabled" /> <span style='font-weight:bold;'>TOP7</span></label>
                    </li>

                    <li class="">
                      <label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-39.png?v=7" alt="TOP8" title="TOP8" /> <input type="radio" name="home" value="39" disabled="disabled" /> <span style='font-weight:bold;'>TOP8</span></label>

                      <div style="padding:5px 0px 10px;">
                        <label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');">行业热度：</label>
                      </div>
                    </li>

                    <li class=""><label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-14.png?v=7" alt="TOP9" title="TOP9" /> <input type="radio" name="home" value="14" disabled="disabled" /> <span style='font-weight:bold;'>TOP9</span></label></li>

                    <li class=""><label onclick="G.ui.tips.err('仅限增强版、至尊版和行业版可以使用，&lt;br /&gt;请升级体验。');"><img src="<?php echo RES;?>/img/template/home-17.png?v=7" alt="TOP10" title="TOP10" /> <input type="radio" name="home" value="17" disabled="disabled" /> <span style='font-weight:bold;'>TOP10</span></label></li>
                  </ul>
                </div>

                <div class="tab-pane fade" id="channel">
                  <ul class="cateradio">
                    <li><label><img src="<?php echo RES;?>/img/template/home-65.png?v=7" alt="模板0" title="模板0" /> <input type="radio" name="channel" value="home-65" />频道0</label></li>

                    <li><label><img src="<?php echo RES;?>/img/template/home-64.png?v=7" alt="模板1" title="模板1" /> <input type="radio" name="channel" value="home-64" />频道1</label></li>

                    <li>
                      <div class="mbtip">
                        图标式模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片请使用正方形尺寸的图片。
                      </div><label><img src="<?php echo RES;?>/img/template/home-28.png?v=7" alt="模板2" title="模板2" /> <input type="radio" name="channel" value="home-28" />频道2</label>
                    </li>

                    <li class="active">
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/home-13.png?v=7" alt="模板3" title="模板3" /> <input type="radio" name="channel" value="home-13" checked="checked" />频道3</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/home-14.png?v=7" alt="模板4" title="模板4" /> <input type="radio" name="channel" value="home-14" />频道4</label>
                    </li>

                    <li>
                      <div class="mbtip">
                        左右双栏模版，顶部幻灯片尺寸为640*320或近似等比例图片，如使用正方形图片会使得页面不美观；分类图片建议使用300*200或近似等比例图片，使用宽度小于高度的(如200*300)尺寸图片将使页面惨不忍睹。
                      </div><label><img src="<?php echo RES;?>/img/template/home-0.png?v=3" alt="模板5" title="模板5" /> <input type="radio" name="channel" value="home-0" />频道5</label>
                    </li>

                    <li>
                      <div class="mbtip">
                        左右双栏模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片建议使用300*300或近似等比例图片。
                      </div><label><img src="<?php echo RES;?>/img/template/home-2.png?v=7" alt="模板6" title="模板6" /> <input type="radio" name="channel" value="home-2" />频道6</label>
                    </li>

                    <li>
                      <div class="mbtip">
                        图标式模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片请使用系统提供的图标。
                      </div><label><img src="<?php echo RES;?>/img/template/home-4.png?v=7" alt="模板7" title="模板7" /> <input type="radio" name="channel" value="home-4" />频道7</label>
                    </li>

                    <li>
                      <div class="mbtip">
                        图标式模版，顶部幻灯片建议使用尺寸为640*320或近似等比例图片；分类图片请使用系统提供的图标。
                      </div><label><img src="<?php echo RES;?>/img/template/home-23.png?v=7" alt="模板8" title="模板8" /> <input type="radio" name="channel" value="home-23" />频道8</label>
                    </li>

                    <li><label><img src="<?php echo RES;?>/img/template/home-29.png?v=7" alt="模板9" title="模板9" /> <input type="radio" name="channel" value="home-29" />频道9</label></li>

                    <li><label><img src="<?php echo RES;?>/img/template/home-15.png?v=7" alt="模板10" title="模板10" /> <input type="radio" name="channel" value="home-15" />频道10</label></li>

                    <li><label><img src="<?php echo RES;?>/img/template/home-16.png?v=7" alt="模板11" title="模板11" /> <input type="radio" name="channel" value="home-16" />频道11</label></li>

                    <li><label><img src="<?php echo RES;?>/img/template/home-1.png?v=7" alt="模板12" title="模板12" /> <input type="radio" name="channel" value="home-1" />频道12</label></li>
                  </ul>
                </div>

                <div class="tab-pane fade" id="list">
                  <ul class="cateradio">
                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-12.png?v=7" alt="模板0" title="模板0" /> <input type="radio" name="list" value="12" />列表0</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-11.png?v=7" alt="模板1" title="模板1" /> <input type="radio" name="list" value="11" />列表1</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-10.png?v=7" alt="模板2" title="模板2" /> <input type="radio" name="list" value="10" />列表2</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-9.png?v=7" alt="模板3" title="模板3" /> <input type="radio" name="list" value="9" />列表3</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-8.png?v=7" alt="模板4" title="模板4" /> <input type="radio" name="list" value="8" />列表4</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-2.png?v=7" alt="模板5" title="模板5" /> <input type="radio" name="list" value="2" />列表5</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-1.png?v=7" alt="模板6" title="模板6" /> <input type="radio" name="list" value="1" />列表6</label>
                    </li>

                    <li class="active">
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-0.png?v=7" alt="模板7" title="模板7" /> <input type="radio" name="list" value="0" checked="checked" />列表7</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-3.png?v=7" alt="模板8" title="模板8" /> <input type="radio" name="list" value="3" />列表8</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-4.png?v=7" alt="模板9" title="模板9" /> <input type="radio" name="list" value="4" />列表9</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-5.png?v=7" alt="模板10" title="模板10" /> <input type="radio" name="list" value="5" />列表10</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-6.png?v=7" alt="模板11" title="模板11" /> <input type="radio" name="list" value="6" />列表11</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/list-7.png?v=7" alt="模板12" title="模板12" /> <input type="radio" name="list" value="7" />列表12</label>
                    </li>
                  </ul>
                </div>

                <div class="tab-pane fade" id="detailed">
                  <ul class="cateradio">
                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/detail-5.png?v=7" alt="模板5" title="模板5" /> <input type="radio" name="detail" value="5" />详情5</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/detail-4.png?v=7" alt="模板4" title="模板4" /> <input type="radio" name="detail" value="4" />详情4</label>
                    </li>

                    <li class="active">
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/detail-0.png?v=7" alt="模板0" title="模板0" /> <input type="radio" name="detail" value="0" checked="checked" />详情0</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/detail-1.png?v=7" alt="模板1" title="模板1" /> <input type="radio" name="detail" value="1" />详情1</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/detail-2.png?v=7" alt="模板2" title="模板2" /> <input type="radio" name="detail" value="2" />详情2</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/detail-3.png?v=7" alt="模板3" title="模板3" /> <input type="radio" name="detail" value="3" />详情3</label>
                    </li>
                  </ul>
                </div>

                <div class="tab-pane fade" id="menu">
                  <ul class="cateradio">
                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-7.png?v=7" alt="模板7" title="模板7" /> <input type="radio" name="menu" value="7" />详情0</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-4.png?v=7" alt="模板4" title="模板4" /> <input type="radio" name="menu" value="4" />详情1</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-5.png?v=7" alt="模板5" title="模板5" /> <input type="radio" name="menu" value="5" />详情2</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-6.png?v=7" alt="模板6" title="模板6" /> <input type="radio" name="menu" value="6" />详情3</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-0.png?v=7" alt="模板0" title="模板0" /> <input type="radio" name="menu" value="0" />详情4</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-1.png?v=7" alt="模板1" title="模板1" /> <input type="radio" name="menu" value="1" />详情5</label>
                    </li>

                    <li>
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-2.png?v=7" alt="模板2" title="模板2" /> <input type="radio" name="menu" value="2" />详情6</label>
                    </li>

                    <li class="active">
                      <div class="mbtip" style="display:none;"></div><label><img src="<?php echo RES;?>/img/template/menu-3.png?v=7" alt="模板3" title="模板3" /> <input type="radio" name="menu" value="3" checked="checked" />详情7</label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function () {
        $("div.tab-pane input[type='radio']").click(function () {
            var $this = $(this), $key = $this.attr("name"), $value = $this.val();
            var _pli = $this.parents("li");
            _pli.siblings().removeClass("active")
            _pli.addClass("active");
            $.post('/npManage/microsite/tmpls_update.act', { key: $key, value: $value }, function (rs) {
                if (200 != rs.code) {
                    G.ui.tips.err(rs.error);
                }
            }, 'json');
        })
    })
  </script>
  <script type="text/javascript">
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
</body>
</html>