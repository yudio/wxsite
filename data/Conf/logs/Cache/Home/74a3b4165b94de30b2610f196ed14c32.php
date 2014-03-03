<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="uyan_auth" content="04a3f6938d" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="奈斯、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="奈斯，国内最大的微信公众智能服务平台，奈斯八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="uyan_auth" content="04a3f6938d" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="奈斯、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
    <meta content="奈斯，国内最大的微信公众智能服务平台，奈斯八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
<script src="<?php echo RES;?>/src/html5.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/www/index1/index.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/project.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/carouFredSel.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/www/index1/weimob-index.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/region_select.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/omvalidate.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap.js"></script>
<title>奈斯（Weimob）—国内最大的微信公众服务平台</title>
<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
</head>
<body>
<!--[if lte IE 8]>  <script language="javascript">$(function (){$.browser.msie&&$("#ie9-tips").show().find("#stopSuggestA").click(function(){$("#ie9-tips").hide()})})</script><![endif]-->
<div class="nav clearfix">
    <div class="nav-content">
        <h1 class="left"><a href="/">奈斯·微信营销，如此简单！</a></h1>
        <div class="left city">
        </div>
        <div class="right line-li">
            <ul>
                <li>
                    <a href="/" class="hover">首页</a>
                </li>
                <li>
                    <a href="/npHome/Index/case.act" >经典案例</a>
                </li>
                <li>
                    <a href="/npHome/Index/proxy.act" >渠道代理</a>
                </li>
                <li>
                    <a href="/npHome/Index/fc.act" >功能介绍</a>
                </li>
                <li>
                    <a href="javascript:;" class="hover navtwo" onclick="loginBox.toggle(this, event);">登录</a>
                </li>
                <li>
                    <a href="/npHome/Index/reg.act" class="navtwo" target="_black">注册</a>
                </li>
                <li>
                    <a href="javascript:;"  class="navtwo" target="_black">帮助</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="loginBox">
    <div class="login-panel">
        <h3>登录</h3>
        <div class="login-mod">
            <div class="login-err-panel dn" id="err_area">
                <span class="icon-wrapper"><i class="icon24-login err" style="margin-top:-.2em;*margin-top:0;"></i></span>
                <span id="err_tips"></span>
            </div>
            <form class="login-form" id="login-form">
                <div class="login-un">
                    <span class="icon-wrapper"><i class="icon24-login un"></i></span>
                    <input type="text" id="username" placeholder="奈斯号">
                </div>
                <div class="login-pwd">
                    <span class="icon-wrapper"><i class="icon24-login pwd"></i></span>
                    <input type="password" id="password" placeholder="密码">
                </div>
            </form>
            <div class="login-help-panel">
                <a id="rememberPwd" class="login-remember-pwd" href="javascript:;">
                    <input type="checkbox" id="rememberPwdIcon">记住帐号
                </a>
                <a class="login-forget-pwd" href="/site/reg1">我是新用户!<strong>申请入驻</strong></a>
            </div>
            <div class="login-btn-panel">
                <a class="login-btn" title="点击登录" href="javascript:;" id="login_button" onclick="login();">登录</a>
                {__TOKEN__}
            </div>
        </div>
    </div>
    <div class="login-cover" onclick="loginBox.toggle(this, event);"></div>
</div>
<div id="ie9-tips" class="clearfix">
    <div id="tipsPanel">
        <div id="tipsDesc">系统检测到您所使用的浏览器版本较低，推荐使用<a href="http://www.firefox.com.cn/download/" target="_blank">Firefox</a>或<a href="http://www.google.cn/intl/zh-CN/chrome/browser/index.html" target="_blank">Chrome</a>浏览器打开，否则将无法体验完整产品功能。</div>
        <a id="stopSuggestA" href="javascript:;">×</a>
    </div>
</div>

<script>
    var $do_submit = false;

    // 绑定回车键
    $('#loginBox').keydown(function(e){
        if(13 == event.keyCode){
            login();
        }
    });

    function login()
    {
        if (true == $do_submit)
        {
            return false;
        }

        var $pre_submit = '登录', $done_submit = '登录中...';
        var $username = $('#username').val(), $password = $('#password').val(), $keepalive = $('#rememberPwdIcon').val();
        $('#login_button').text($done_submit);
        $do_submit = true;

        // check
        if ('' == $username || '' == $password)
        {
            $('#err_tips').text('您输入的奈斯号或密码错误，请重新输入！');
            $('#err_area').show();
            $('#login_button').text($pre_submit);
            $do_submit = false;
            return false;
        }

        var $login_data = {
            username:$username,
            password:$password,
            __hash__:$("input[name='__hash__']").val()
        };
        $.post('/npHome/Users/checklogin.act', $login_data, function(rs){
            if(rs.errno == 200)
            {
                $('#err_tips').text(rs.error);
                $('#err_area').show();
                location.href = rs.url_route;
            }
            else
            {
                $('#err_tips').text(rs.error);
                $('#err_area').show();
                $('#login_button').text($pre_submit);
            }
            $do_submit = true;
        }, 'json');
    }
</script>
<script>
    if(top!=self) if(self!=top) top.location=self.location;
</script>
<!-- banner -->
<div class="header clearfix">
	<div class="hd-c">
		<div class="banner">
			<ul>
					<li class="pic-intro" >
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic" onclick="location.href='/site/weipai'" style="cursor:pointer;">
							<img src="<?php echo RES;?>/img/www/index1/banner-l.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
							<div class="pic" onclick="location.href='/site/wallcame'" style="cursor:pointer;">
							<img src="<?php echo RES;?>/img/www/index1/banner-j.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
							<div class="pic" onclick="location.href='/site/datacube'" style="cursor:pointer;">
							<img src="<?php echo RES;?>/img/www/index1/banner-h.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic" onclick="location.href='/site/kefu'" style="cursor:pointer;">
							<img src="<?php echo RES;?>/img/www/index1/banner-g.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic" onclick="location.href='/site/vshop'" style="cursor:pointer;">
							<img src="<?php echo RES;?>/img/www/index1/banner-i.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/img/www/index1/banner-a.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/img/www/index1/banner-b.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/img/www/index1/banner-c.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic">
							<img src="<?php echo RES;?>/img/www/index1/banner-d.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
					<li class="pic-intro" style="display: none;">
						<div class="text">
							<h4>
								已有<font>144,392</font>商家入驻奈斯，微信营销 如此简单
							</h4>
							<a id="start_btn" class="start" href="/site/reg1" title="入驻奈斯"></a>
						</div>
						<div class="pic">
						<img src="<?php echo RES;?>/img/www/index1/banner-e.png?v=2014-01-24-6" class="png-24" alt="banner" />
						</div>
					</li>
				</ul>
			<div class="frame">
				<span class="changing-over">
						<a href="#" class="now"></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" ></a>
						<a href="#" class="last"></a>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="notice_customers">
			<div id="notice-panel">
			<div style="width:600px; margin:0 auto; position:relative; z-index:20;">
				<h1><div class="notice_icon"></div>公告：</h1>
				<div class="notice">
					<label>
						<a href="javascript:;" onclick="javascript:$('#notice_mask').hide(), $('#notice_message').show();" title="">公众帐号智能绑定上线公告</a>
						<span class="date">2014-01-24</span>
					</label>
				</div>
			</div>
		</div>
		<section class="customers">
		<h2>他们都在使用奈斯Weimob</h2>
		<nav>
			<ul>
				<li><a href="#previous" class="arrow _previous"><b>上一个</b></a></li>
				<li><a href="#next" class="arrow _next"><b>下一个</b></a></li>
			</ul>
		</nav>
		<div class='clients-display'>
			<ul>
				<li><a href="http://www.weimob.com/site/case1" class="clients_15 first"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_12 first"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_5 first"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_3 first"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_9 first"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_6"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_7"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_8"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_1"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_10"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_11"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_4"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_13"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_14"></a></li>
				<li><a href="http://www.weimob.com/site/case1" class="clients_2"></a></li>

			</ul>
		</div>
	</section>
	<script type="text/javascript">
		$(function(){

			/*rolling the logos*/

			function repeat(str, num) {
				return new Array( num + 1 ).join( str );
			}

			!function () {
				var $wrapper = $('.clients-display').css('overflow', 'hidden'),

					$slider = $wrapper.find('> ul'),
					$items = $slider.find('> li'),
					$single = $items.filter(':first'),

					singleWidth = $single.outerWidth(),
					visible = Math.ceil($wrapper.innerWidth() / singleWidth),
					currentPage = 1,
					pages = Math.ceil($items.length / visible);

				if (($items.length % visible) != 0) {
					$slider.append(repeat('<li class="empty" />', visible - ($items.length % visible)));
					$items = $slider.find('> li');
				}

				$items.filter(':first').before($items.slice(- visible).clone().addClass('cloned'));
				$items.filter(':last').after($items.slice(0, visible).clone().addClass('cloned'));
				$items = $slider.find('> li'); // reselect

				$wrapper.scrollLeft(singleWidth * visible);

				function gotoPage(page) {
					var dir = page < currentPage ? -1 : 1,
						n = Math.abs(currentPage - page),
						left = singleWidth * dir * visible * n;

					$wrapper.filter(':not(:animated)').animate({
						scrollLeft : '+=' + left
					}, 700, function () {
						if (page == 0) {
							$wrapper.scrollLeft(singleWidth * visible * pages);
							page = pages;
						} else if (page > pages) {
							$wrapper.scrollLeft(singleWidth * visible);
							// reset back to start position
							page = 1;
						}

						currentPage = page;
					});

					return false;
				}

				$('.arrow._previous').click(function () {
					return gotoPage(currentPage - 1);
				});

				$('.arrow._next').click(function () {
					return gotoPage(currentPage + 1);
				});

				$(this).bind('goto', function (event, page) {
					gotoPage(page);
				});
			}()});
	</script>
</div>

<!-- trade -->
<div class="content clearfix">

	<div class="feature-content">
		<script>
			$(document).ready(function(){
				$(".feature-content dd").hover(
					function(){
						$(this).addClass("active");
					},
					function(){
						$(this).removeClass("active");
					}
				);
			});
		</script>

		<dl class="clearfix">
			<dd class="vborder">
				<a href="/site/guide1#site">
					<div class="fimg icon website"></div>
					<h3>微官网</h3>
				</a>
				<p>5分钟轻松建站<br>打造酷炫微官网</p>
			</dd>
			<dd class="vborder">
				<a href="/site/guide1#member">
					<div class="fimg icon member"></div>
					<h3>微信会员卡</h3>
				</a>
				<p>方便携带&nbsp;永不挂失<br>消费积分&nbsp;一卡配备</p>
			</dd>

			<dd class="vborder">
				<a href="/site/vshop">
					<div class="fimg icon vshop"></div>
					<h3>微商城</h3>
				</a>
				<p>小微信也有大商城<br>电商轻松就能走入微信</p>
			</dd>
			<dd  class="vborder">
				<a href="/site/guide1#cate">
					<div class="fimg icon cate"></div>
					<h3>微餐饮</h3>
				</a>
				<p>扫一扫<br>微信也能够实时点餐</p>
			</dd>

			<dd>
				<a href="/site/guide1#estate">
					<div class="fimg icon mstate"></div>
					<h3>微房产</h3>
				</a>
				<p>全景看房 楼盘印象 预约看房<br>有效助力微信营销</p>
			</dd>
			
			
		</dl>
		<div class="line"></div>
		<dl class="clearfix">
			<dd class="vborder">
				<a href="/site/weipai">
					<div class="fimg icon weipai"></div>
					<h3>微拍</h3>
				</a>
				<p>时尚美照 微信增粉<br>在体验中感受企业魅力</p>
			</dd>
			<dd class="vborder">
				<a href="/site/wallcame">
					<div class="fimg icon wallcame"></div>
					<h3>微信墙</h3>
				</a>
				<p>活跃现场气氛<br>让粉丝涨起来</p>
			</dd>

			<dd class="vborder">
				<a href="/site/guide1#addup">
					<div class="fimg icon mtatistics"></div>
					<h3>数据魔方</h3>
				</a>
				<p>精准分析用户行为<br>轻松了解买家</p>
			</dd>

			<dd>
				<a href='/site/kefu'>
					<div class="fimg icon kefu"></div>
					<h3>微客服</h3>
				</a>
				<p>沟通6亿用户<br>创造无限商机</p>
			</dd>
			<dd>
				<a>
					<div class="fimg icon crm"></div>
					<h3>微信CRM</h3>
				</a>
				<p>高效管理微信粉丝<br>轻松实现精准营销</p>
			</dd>
		

		</dl>
        <div class="line"></div>
         <dl class="clearfix">
			<dd  class="vborder">
				<a href="/site/guide1#car">
					<div class="fimg icon car"></div>
					<h3>微汽车</h3>
				</a>
				<p>预约试驾或保养 车主关怀<br>360度看车应有尽有</p>
			</dd>
			<dd class="vborder">
				<a href="/site/guide1#wedd">
					<div class="fimg icon card"></div>
					<h3>微喜帖</h3>
				</a>
				<p>电子喜帖&nbsp;微信来袭<br>提供用户特别服务</p>
			</dd>
            
            <dd class="vborder">
				<a href="/site/guide1#hotels">
					<div class="fimg icon hotel"></div>
					<h3>微酒店</h3>
				</a>
				<p>在线订房融入微信<br>酒店营销多一条有力途径</p>
			</dd>
            <dd class="vborder">
				<a href="/site/guide1#activities">
					<div class="fimg icon activities"></div>
					<h3>微活动</h3>
				</a>
				<p>吸引用户参与<br>增强用户沉淀</p>
			</dd>
            
            	<dd>
				<a>
					<div class="fimg icon weiqd"></div>
					<h3>微渠道</h3>
				</a>
				<p>二维码轻松一扫<br>有效统计粉丝来源</p>
			</dd>
		
			
		</dl>

        <div class="line"></div>
		<dl class="clearfix">
              <dd  class="vborder">
				<a href="/site/guide1#reser">
					<div class="fimg icon reserve"></div>
					<h3>微预约</h3>
				</a>
				<p>各种预约 一键即可<br>短信邮件会立即通知商户</p>
			</dd>
            
            <dd class="vborder">
				<a href="/site/guide1#photo">
					<div class="fimg icon albums"></div>
					<h3>微相册</h3>
				</a>
				<p>各行各业<br>照片展现轻松搞定</p>
			</dd>
            
              <dd  class="vborder">
				<a href="/site/guide1#message">
					<div class="fimg icon message"></div>
					<h3>微留言</h3>
				</a>
				<p>意见？需求？疑问？<br>一键留言&nbsp;&nbsp;一键回复</p>
			</dd>
		
            	<dd class="vborder">
				<a href="/site/guide1#research">
					<div class="fimg icon research"></div>
					<h3>微调研</h3>
				</a>
				<p>无需人力&nbsp;电子调研<br>为市场调研加一份有力数据</p>
			</dd>
            <dd>
				<a href="/site/guide1#push">
					<div class="fimg icon Push"></div>
					<h3>微推送</h3>
				</a>
				<p>无线周边推广<br>提高品牌知名度</p>
			</dd>
            
          
		</dl>
		<div class="line"></div>
		<dl class="clearfix">	
				<dd class="vborder">
				<a href="/site/guide1#medical">
					<div class="fimg icon medical"></div>
					<h3>微医疗</h3>
				</a>
				<p>在线挂号或咨询<br>了解病情 微信都可以</p>
			</dd>
            <dd class="vborder">
				<a>
					<div class="fimg icon life"></div>
					<h3>微生活</h3>
				</a>
				<p>微信公众号建立商圈<br>吃喝玩乐应有尽有</p>
			</dd>
            
            <dd class="vborder">
				<a>
					<div class="fimg icon lbs"></div>
					<h3>LBS回复</h3>
				</a>
				<p>LBS范围内精准定位<br>一键导航商家地理位置</p>
			</dd>
			<dd class="vborder">
				<a href="/site/guide1#services">
					<div class="fimg icon service"></div>
					<h3>微服务</h3>
				</a>
				<p>提供生活服务<br>增加用户粘性</p>
			</dd>
			<dd >
				<a href="/site/guide1#menu">
					<div class="fimg icon menu"></div>
					<h3>自定义菜单</h3>
				</a>
				<p>无需定制 完全自定义<br>无需触发 完全可视化</p>
			</dd>
		 
		</dl>
		
	</div>
</div>
<!-- case -->
<div>
	<div class="list_carousel">
		<ul id="foo2">
				<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case1.jpg?v=2014-01-24-6" alt="case1.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case2.jpg?v=2014-01-24-6" alt="case2.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case3.jpg?v=2014-01-24-6" alt="case3.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case4.jpg?v=2014-01-24-6" alt="case4.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case5.jpg?v=2014-01-24-6" alt="case5.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case6.jpg?v=2014-01-24-6" alt="case6.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case7.jpg?v=2014-01-24-6" alt="case7.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case8.jpg?v=2014-01-24-6" alt="case8.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case9.jpg?v=2014-01-24-6" alt="case9.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case10.jpg?v=2014-01-24-6" alt="case10.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case11.jpg?v=2014-01-24-6" alt="case11.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case12.jpg?v=2014-01-24-6" alt="case12.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case13.jpg?v=2014-01-24-6" alt="case13.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case14.jpg?v=2014-01-24-6" alt="case14.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case15.jpg?v=2014-01-24-6" alt="case15.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case16.jpg?v=2014-01-24-6" alt="case16.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case17.jpg?v=2014-01-24-6" alt="case17.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case18.jpg?v=2014-01-24-6" alt="case18.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case19.jpg?v=2014-01-24-6" alt="case19.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case20.jpg?v=2014-01-24-6" alt="case20.jpg" />
					</a>
				</li>
							<li>
					<a href="javascript:void(0);">
						<img src="<?php echo RES;?>/img/www/index1/case21.jpg?v=2014-01-24-6" alt="case21.jpg" />
					</a>
				</li>
					</ul>
		<div class="clearfix"></div>
		<a id="prev2" class="prev" href="#"></a>
		<a id="next2" class="next" href="#"></a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#foo2').carouFredSel({
					//auto: true,
					prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
					mousewheel: true,
					swipe: {
						onMouse: true,
						onTouch: true
					}
				});
			});
		</script>
	</div>
</div>
<div class="erwei" title="微信扫一扫">
    <span class="hudongzhushou">官方微信</span>
    <div class="erwei_big" style="display:none;">
        <p>扫一扫，关注奈斯官方微信，体验奈斯智能服务</p>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var erwei_time = null;
        $(".erwei").hover(function(){
            $(".erwei_big").show();
        }).mouseleave(function(){
                    erwei_time = setTimeout(function(){
                        $(".erwei_big").hide();
                    },1000);
                });
        $(".erwei_big").mouseenter(function(){
            if(erwei_time){
                clearTimeout(erwei_time);
            }
        }).mouseleave(function(){
                    erwei_time = setTimeout(function(){
                        $(".erwei_big").hide();
                    },1000);
                });
    });
</script>
<!-- 意见反馈 -->
<div class="feedback" id="feedback">
    <p class="feedsize"><b>亲爱的用户</b><a class="close" href="javascript:;" onclick= "$('#feedback, #feedback_cover').toggleClass('on');">×</a></p>
    <p class="bbottom">欢迎您访问奈斯官方网站！您对奈斯有任何意见和建议，或在使用过程中遇到问题，请在本页面反馈。我们会实时关注您的反馈不断优化，您的建议将帮助我们改进，为您提供更好的服务！</p>
    <p class="feedsize"><b>请留下您的宝贵意见和建议！（请填写）</b></p>
    <form>
        <textarea  id="feedback-text" name="" id="feedback-text" placeholder="输入文本..."></textarea>
        <p class="feedsize"><b>您常用的电子邮箱是？（请填写）</b></p>
        <p style="color:#666; text-indent:1em;"><b class="blue">★</b>请尽量填写，以便我们尽快回复您！</p>
        <input type="text" placeholder="如：@163.com" id="feedback-input" />
        <p class="feedsize"><b>验证码</b></p>
        <input type="text" name="captcha" id="feedback-Captcha" maxlength="4" onclick="">
        <span name="feedback_captcha" id="feedback_captcha">
				<img title="看不清？点击更换" style="cursor: pointer;" src="<?php echo RES;?>/img/www/index1/captcha.png" id="yanzhen" width="60" height="20" border="1">
	    </span>
        <br />
        <input type="button"  class="feed-btn" value="" onclick="feedbackSubmit(); return false;" />
    </form>
</div>
<div class="footer">
    <div class="footer-content clearfix">
        <div class="foot-menu">
            <p>
                <a href="<?php echo C('site_url');?>" target="_blank">奈斯首页</a>&nbsp;|&nbsp;
                <a href="/site/reg1" target="_blank">申请入驻</a>&nbsp;|&nbsp;
                <a href="/site/proxy1" target="_blank">渠道代理</a>&nbsp;|&nbsp;
                <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank">接口定制</a>&nbsp;|&nbsp;
                <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank">微信托管</a>&nbsp;|&nbsp;
                <a href="/site/about1" target="_blank">关于奈斯</a>
            </p>
            <p>免费热线：4006305400&nbsp;&nbsp;&nbsp;QQ：4006305400&nbsp;&nbsp;&nbsp;邮箱：feedback@hsmob.com</p>
            <p>地址：
                上海市杨浦区政益路28号1106-1109室</p>
        </div>
        <div class="copyright">
            Copyright © 2011-2014 www.weimob.com. All Rights Reserved 上海晖硕信息科技有限公司版权所有 沪ICP备13021836号-1
        </div>
    </div>
</div>
<a class="feedbackbot" href="javascript:;" onclick= "$('#feedback, #feedback_cover').toggleClass('on');"></a>
<script>
    $(document).ready(function(){
        $("#yanzhen").click(function(){
            var img_src= '/site/captcha?f=feedback&v=';
            $(this).attr({"src":img_src + Math.random()*100000});
        });
    });
    function feedbackSubmit(){
        var $data = {
            feedback: $('#feedback-text').val(),
            email: $('#feedback-input').val(),
            captcha: $('#feedback-Captcha').val(),
            url: self.location.href
        };
        $.post('/site/feedback', $data, function(rs){
            alert(rs.error);
            if (200 == rs.code)
            {
                $('#feedback, #feedback_cover').toggleClass('on');
            }
        }, 'json');
    }
</script>
<!--公告信息-->
<div id="notice_mask"></div>
<div id="notice_message" style="position: absolute; left: 373.5px; top: 20%;">
    <div class="title">公 告<a onclick="javascript:jQuery('#notice_mask').show(),jQuery('#notice_message').hide();">×</a></div>
    <div class="content">
			<pre style="white-space:pre-wrap;"><p class="MsoNormal">
                尊敬的奈斯用户：
            </p>
<p class="MsoNormal" style="text-indent:21pt;">
    您还在为绑定公众帐号时在微信公众帐号后台与奈斯帐号后台切换而烦恼么？还在为公众号原始ID是什么而无从下手么？又或者担心微信公众后台添加服务器配置出现错误？或者不知道将应用ID及密钥填写在何处？
</p>
<p class="MsoNormal">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 现在，奈斯告诉您，这些都不会再困扰您啦！微信公众帐号智能绑定，将帮您解决上面所有问题。您只需输入微信公众平台帐号及密码，奈斯将自动帮您完成奈斯平台与微信公众平台的数据对接。微信公众平台帐号及密码我们将仅用于智能绑定，不保存！不泄漏！如果您不放心，依旧可以选择手动绑定。
</p>
<p class="MsoNormal">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 绑定完成，您仅需按照提示使用个人帐号向您的公众帐号发送一条文本消息“验证”，如收到“绑定成功， 盟妹来了”问题提示，则表明您已成功完成智能绑定。
</p>
<p class="MsoNormal">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公众帐号智能绑定，奈斯将带您走进商机无限的“微”世界，与您共创“微”未来！
</p>
<p class="MsoNormal">
    <img src="http://img.weimob.com/static/7f/6f/fa/image/20140124/20140124164904_75320.png" width="749" height="300" alt="" />
</p>
<p class="MsoNormal">
    <br />
</p>
<p class="MsoNormal">
    <br />
</p>
<p class="MsoNormal">
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;盟妹
</p>
<p>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 2014-1-24
</p>
<p>
    <br />
</p>
<p>
    关注盟妹，惊喜每一天！
</p>
<p>
    盟妹作为奈斯官方个人微信号（微信号：weimob001），她将主要为所有伙伴实时播报奈斯最新上线产品、产品的使用方法及常见问题（包括问题的在线解答）以及各类行业资讯信息。赶快关注盟妹妹吧，惊喜天天等着你！
</p>
<p>
    &nbsp;<img src="http://img.weimob.com/static/7f/6f/fa/image/20140124/20140124170121_48249.jpg" width="250" height="348" alt="" />
</p>
<p>
    <img class="     mail_scale_image" id="mail_scale_image_4294982212_0" src="file://C:/Users/yjsong/AppData/Roaming/Foxmail7/Temp-5848/Catch5D42(01-24-17-00-28).jpg" />
</p>
<div>
    <br />
</div></pre>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#notice_mask').click(function(){
            $('#notice_mask').hide();
            $('#notice_qrcode').hide();
            $('#notice_message').hide();
        });

        $(window).resize(function(){
            $('#notice_qrcode').css({
                position:'absolute',
                left: ($(window).width() - $('#notice_qrcode').outerWidth())/2,
                top: ($(window).height() - $('#notice_qrcode').outerHeight())/2
            });

            $('#notice_message').css({
                position:'absolute',
                left: ($(window).width() - $('#notice_message').outerWidth())/2,
                top: ($(window).height() - $('#notice_message').outerHeight())/2
            });
        });
    });
</script>
</body>
</html>