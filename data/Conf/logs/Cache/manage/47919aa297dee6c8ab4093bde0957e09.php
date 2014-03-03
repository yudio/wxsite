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
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/tongji/highcharts.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/tongji/wm_charts.js"></script>
<title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
	<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
    <!--[if lte IE 9]><script src="<?php echo RES;?>/src/watermark.js"></script><![endif]-->
	<!--[if IE 7]><link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet" /><![endif]-->
</head>
<body>
	
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/fullcalendar/fullcalendar.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/plugins/fullcalendar/fullcalendar_print.css" media="print" />
<script type="text/javascript" src="<?php echo RES;?>/src/plugins/fullcalendar/fullcalendar_min.js"></script>
<div id="main">
        <div class="row-fluid">
            <div class="span12">
                <div class="box ">
                    <div class="box-title">
                        <h3><i class="icon-user"></i>账户信息  </h3>
                    </div>
                    <div class="box-content">

                        <dl class="dl-horizontal">
                            <dt>
                                <img src="<?php echo ($user["headerpic"]); ?>" style="width: 88px; height: 88px" class="img-rounded"></dt>
                            <dd>
                                <p><strong><?php echo ($user["wxname"]); ?></strong>：<b class="text-warning">体验版</b>  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($user["wxfakeid"]); ?>&site=qq&menu=yes" target="_blank"><i class="icon-arrow-up" title="升级"></i>升级</a>  <a href="/wechat/menuset?aid=72040"><i ></i>订阅号</a></p>



                                <table class="table noborder">
								                                    <tr>
                                        <td>套餐有效期：<?php echo (date("Y-m-d",$viptime)); ?></td>
                                        <td>文本自定义：0/100</td>
                                        <td>图文自定义：<?php echo $_SESSION['diynum'].'/'.$group[$_SESSION['gid']]['did']; ?></td>
                                        <td>语音自定义：0/0</td>
                                    </tr>
                                    <tr>
                                        <td>请求数剩余：
                                            <?php echo (10000-$_SESSION['connectnum']) ?>										</td>
                                        <td>总请求数：<?php echo $_SESSION['connectnum'] ?></td>
                                        <td>本月请求数：<?php echo $group[$_SESSION['gid']]['cid']; ?></td>
                                        <td>每月可请求总数：10000</td>
                                    </tr>
                                </table>
								<p><strong>接口地址：</strong><?php echo C('site_url');?>/wechat/<?php echo ($token); ?>?wechatid=fromUsername&nbsp;&nbsp;&nbsp;&nbsp;
								<strong>TOKEN：</strong><?php echo ($token); ?></p>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span8">
                <div class="box hide">
                    <div class="box-title">
                        <h3><i class="icon-bar-chart"></i>关注统计</h3>
                    </div>
                    <div class="box-content"> 
                        <div id="charts-stream" style="height: 190px;" class="wm_charts">
                            <div class="loading">数据正在加载中...</div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-title">
                        <h3><i class="icon-calendar"></i>活动日历</h3>
                    </div>
                    <div class="box-content nopadding">
                        <div class="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="span4">

                <div class="box">
                    <div class="box-title">
                        <h3>
                            <i class="icon-bell"></i>
                            公告
                        </h3>
                        <div class="actions">
                            <a href="/wechat/Newlist?aid=72040" class="btn btn-mini content-refresh" title="更多"><i class=" icon-external-link"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="bell fade in">
                            <ul class="unstyled">
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=38">微团购七天体验开始啦！</a><span class="pull-right">2014-02-14</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=37">【重要通知】认证服务号需填写授权URL</a><span class="pull-right">2014-02-12</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=34">微团购上线公告</a><span class="pull-right">2014-01-28</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=32">公众帐号智能绑定上线公告</a><span class="pull-right">2014-01-24</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=28">好消息，微盟微拍隆重上线啦！</a><span class="pull-right">2014-01-07</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=27">微信上墙啦！</a><span class="pull-right">2014-01-03</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=26">微盟支持微信群发啦！</a><span class="pull-right">2013-12-31</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=24">微餐饮v2.0上线公告</a><span class="pull-right">2013-12-30</span></li>
                                                                <li><a href="/wechat/Newdetail?aid=72040&noticeid=23">商户中心公众号首页升级</a><span class="pull-right">2013-12-27</span></li>
                                                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-title">
                        <h3><i class="icon-gift"></i>
                            新功能推荐
                        </h3>
                    </div>
                    <div class="box-content">
                        <div class="accordion" id="accordion2">
                                                    <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#div0">微信会员卡V2.0上线啦！                                    </a>
                                </div>
                                <div id="div0" class="accordion-body in collapse">
                                    <div class="accordion-inner">
                                        尊敬的微盟用户：
        新的一年，微盟团队的小伙伴要让大家马上有惊喜，所以不分昼夜加班加点，终于让大家一直期待的微信会员卡V2.0上线啦！功能强大自然不说，界面也全部迭代更新啦，大家先一睹为快吧！

全能的会员管理
        强大的会员信息储存库，包含会员信息快捷录入、修改、查询，会员分等级，并支持线下会员信息导入，让您的老会员一键绑定微信会员卡，协助您打造微信上的CRM系统；

精准的会员营销
        在微盟后台，可任意以充值送、消费送、开卡送、签到分享送积分、优惠券、代金券、礼品券、节日关怀等方式作为营销工具，如积分营销、消费充值赠送、会员关怀等来维护老客户，设置开卡活动来吸引新客户，并通过高效的会员分类及筛选工具为企业达成精准、智能的营销活动，提升企业营业额；

便捷的会员交易
        用户通过手机即可在线充值、付款，商家也可通过管理系统实现消费、充值、修改积分等快捷交易，并且相关交易记录及流水，通过筛选项即可快速查询，交易更便捷，管理更高效；

强大的积分策略
        签到、连续签到、分享、转发、充值、消费等均可发放积分，客户积分可参与兑换及抽奖，增强企业与消费者黏性，为企业增加有效粉丝;

智能的数据分析
        总体会员增长曲线、消费统计、积分发放回收统计、会员营销赠送状况及使用状态等，系统均智能为您做数据分析，会员现状一目了然;
        全新的小清新界面
        是不是都惊呆了？是不是迫不及待想要体验一把了？那就赶紧行动吧！ 【关注微信号“hsweimob”，发送“会员卡”即可体验】
盟妹
2014-01-25                                    </div>
                                </div>
                            </div>
                                                        <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#div1">新版会员卡上线预告                                    </a>
                                </div>
                                <div id="div1" class="accordion-body  collapse">
                                    <div class="accordion-inner">
                                        尊敬的微盟用户：

      您好！
      新版会员卡将于2014年2月20日正式上线啦！
      1、全新的微信会员卡支持微信会员管理、线下会员打通，协助企业建立微信上的CRM系统，并记录所有会员的行为轨迹，轻松管理；
      2、在微盟后台，可任意以充值送、消费送、开卡送、签到分享送积分、优惠券、代金券、礼品券、节日关怀等方式作为营销工具，并通过高效的会员分类及筛选工具为企业达成精准、智能的营销活动，提升企业营业额；
      3、用户可通过手机实现在线充值、支付等快捷交易，并可使用积分兑换券或抽奖等，让积分更加有意义，增强企业与消费者黏性；
      4、新版会员卡还有智能数据分析功能，满足企业对数据管理的需求，并且界面以ios7风格为主导，为新版会员卡设计了全新的高大上界面，让您的用户忍不住都点击领卡啦！

      新版会员卡无论从功能还是界面，都将直击您的眼球，敬请期待吧！

      上线期间，为了能够让老版会员卡的用户也用上全新的微信会员卡，微盟团队将对老数据进行迁移，并且为了保证数据完整性，将暂定于2014年2月20日23:30临时停止服务，在此期间官网将不能访问，微盟所有服务将暂停使用，为此给您带来的不便请谅解。                                    </div>
                                </div>
                            </div>
                                                        <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#div2">微团购上线公告                                    </a>
                                </div>
                                <div id="div2" class="accordion-body  collapse">
                                    <div class="accordion-inner">
                                        微团购商家管理分为后台管理及门店管理两个部分。后台管理分为团购管理、订单管理、团购券管理以及会员管理、退款管理：团购管理包括新建团购、复制团购、上架管理、添加通知等功能；订单管理及团购券管理主要功能为查询与导出；会员管理中可以看到会员消费总数据；退款管理中可以查看用户的退款信息。门店管理分为团购券验证及团购券管理两部分：团购券验证可以验证适用门店已选择当前门店的团购券；团购券管理仅支持已被授权的团购。                                    </div>
                                </div>
                            </div>
                                                        <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#div3">公众帐号智能绑定                                    </a>
                                </div>
                                <div id="div3" class="accordion-body  collapse">
                                    <div class="accordion-inner">
                                        您只需输入微信公众平台帐号及密码，微盟将自动帮您完成微盟平台与微信公众平台的数据对接。微信公众平台帐号及密码我们将仅用于智能绑定，不保存！不泄漏！如果您不放心，依旧可以选择手动绑定。绑定完成，您仅需按照提示使用个人帐号向您的公众帐号发送一条文本消息“验证”，如收到“绑定成功， 盟妹来了”问题提示，则表明您已成功完成智能绑定。
                                    </div>
                                </div>
                            </div>
                                                        <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#div4">微餐饮v2.0升级                                    </a>
                                </div>
                                <div id="div4" class="accordion-body  collapse">
                                    <div class="accordion-inner">
                                        一、新增我喜欢功能，所有顾客仅需点击菜名右侧的“爱心”按钮，便可轻松收藏喜爱的菜肴；二、新增底部全局浮层导航，全面展示智能选餐、点菜、我的订单、我喜欢和已点信息；三、新增在线支付功能，顾客通过在线支付功能将可直接对预定的订单进行在线支付，通过我的订单栏，便可轻松的对订单状态进行查询。微餐饮支付方式设置操作路径：我的微盟 → 支付方式管理栏目。                                    </div>
                                </div>
                            </div>
                                                        <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#div5">微客服系统                                    </a>
                                </div>
                                <div id="div5" class="accordion-body  collapse">
                                    <div class="accordion-inner">
                                        微客服系统包含一对一对话、语音实时消息、消息群发、获取全部用户数据、信息管理、客户关系管理、标签设置、聊天记录、常用语管理、访客识别、客服转接、自动回复、文件传输等等功能，让商家可以沟通6亿用户，创造无限商机！（试用版、黄金版、行业版和至尊版开启，仅限认证服务号可用）                                    </div>
                                </div>
                            </div>
                            
     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">&nbsp</div>
    </div>
    <script type="text/javascript">
        $(function () {
            // G.ui.tips.confirm_tips("/insidepage/system/menu_set.html", "您当前的公众号类型未验证，请先验证后继续使用！谢谢'");
            data = {
      	     	 "aid": "72040",
      	    	 "stime": "2014-02-15 00:00:00",
      	    	 "etime": "2014-02-22 23:59:59",
      	    	 "method": "tuwen_data" 
      	    }

            $.ajax("/Count/Funs", {
                type: "get", dataType: "json",
                data: data
            }).done(function (d) {
                wm_charts.line('charts-stream', d);
            }).fail(function () { G.ui.tips.err("网络异常") });
   			

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            if ($(".calendar").length > 0) {
                $(".calendar").fullCalendar({
                    header: {
                        left: "",
                        center: "prev,title,next",
                        right: ""
                    },
                    editable: false,
					//[{"title":"ad","start":"2014-02-23 11:02:00","stime":"2014-03-01 11:02","end":"2014-02-23 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false},{"title":"ad","start":"2014-02-24 11:02:00","stime":"2014-03-01 11:02","end":"2014-02-24 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false},{"title":"ad","start":"2014-02-25 11:02:00","stime":"2014-03-01 11:02","end":"2014-02-25 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false},{"title":"ad","start":"2014-02-26 11:02:00","stime":"2014-03-01 11:02","end":"2014-02-26 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false},{"title":"ad","start":"2014-02-27 11:02:00","stime":"2014-03-01 11:02","end":"2014-02-27 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false},{"title":"ad","start":"2014-02-28 11:02:00","stime":"2014-03-01 11:02","end":"2014-02-28 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false},{"title":"ad","start":"2014-03-01 11:02:00","stime":"2014-03-01 11:02","end":"2014-03-01 23:59:59","url":null,"backgroundColor":"#99c934","allDay":false}]
                    events: "/Wechat/AjaxActivity?aid=72040",
                    eventMouseover: function (calEvent) {
                        $(this).popover({
                            trigger: 'hover',
                            title: calEvent.title,
                            html:true,
                            content: calEvent.allDay ? "全天" : "开始时间：" + (new Date(calEvent.start)).format('yyyy-MM-dd hh:mm') + "<br/>结束时间：" + calEvent.stime,
                            container: "body"
                        });
                        $(this).popover('show');
                    } 
                    
                });
                $(".fc-button-effect").remove();
                $(".fc-button-next .fc-button-content").html("<i class='icon-chevron-right'></i>");
                $(".fc-button-prev .fc-button-content").html("<i class='icon-chevron-left'></i>");
                $(".fc-button-today").addClass("fc-corner-right");
                $(".fc-button-prev").addClass("fc-corner-left");
            }
        });
    </script>

<div class="hide" id="tisp">    <h5>微信会员卡V2.0上线啦！</h5>    <p>    尊敬的微盟用户：
        新的一年，微盟团队的小伙伴要让大家马上有惊喜，所以不分昼夜加班加点，终于让大家一直期待的微信会员卡V2.0上线啦！功能强大自然不说，界面也全部迭代更新啦，大家先...</pre></div>	<script>
		$(function(){
			if ($("#tisp")) {
				var $tisp=$("#tisp");
				G.ui.tips.up($tisp.html(), 1392978075, '/wechat/Newdetail?aid=72040&noticeid=40');
			}
		});
	</script>
</body>
</html>