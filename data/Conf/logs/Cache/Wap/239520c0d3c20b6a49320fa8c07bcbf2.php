<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="http://stc.weimob.com/css/web_bb/card.css" media="all" />
  <link rel="stylesheet" type="text/css" href="http://stc.weimob.com/css/web_bb/mobiscroll/mobiscroll_animation.css" media="all" />
  <link rel="stylesheet" type="text/css" href="http://stc.weimob.com/css/web_bb/mobiscroll/mobiscroll_core.css" media="all" />
  <link rel="stylesheet" type="text/css" href="http://stc.weimob.com/css/web_bb/mobiscroll/mobiscroll_ios.css" media="all" />
  <script type="text/javascript" src="http://stc.weimob.com/src/web_bb/zepto.js"></script>
  <script type="text/javascript" src="http://stc.weimob.com/src/web_bb/card_share.js"></script>
  <script type="text/javascript" src="http://stc.weimob.com/src/jQuery.js"></script>
  <script type="text/javascript" src="http://stc.weimob.com/src/web_bb/mobiscroll/mobiscroll_core.js"></script>
  <script type="text/javascript" src="http://stc.weimob.com/src/web_bb/mobiscroll/mobiscroll_datetime.js"></script>

  <title>会员卡</title>
  <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="format-detection" content="telephone=no" />
  <style type="text/css">
    .masklayer{        display:none;        position:fixed;        top:0;        left:0;        z-index:2000;        width:100%;        height:100%;        background-color:rgba(0,0,0,0.5);        text-align:right;    }    .masklayer.on{        display:block;    }    .masklayer img{        margin-top:10px;        margin-right:30px;        width:160px;    }
  </style>
</head>

<body id="card" ondragstart="return false;" onselectstart="return false;">
  <div id="overlay" style="position:fixed;z-index:100;"></div>

  <div class="cardcenter">
    <div class="msk">
      <p class="explain2"><a id="showcard" class="receive" href="javascript:void(0)" name="showcard">领取您的新会员卡</a> <span>微时代会员卡，方便携带收藏，永不挂失…</span></p>
    </div>

    <div class="card">
      <img class="cardbg" src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20130930/20130930113025_20484.jpg" /> <img id="cardlogo" class="logo" src="http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20130930/20130930123609_89067.png" />

      <h1 style="color: #FBFFFA">微盟会员卡</h1><strong class="pdo verify" style="color: #F8EBFF"><span id="cdnb" style="text-align: right;margin-top: 15px;"><em>普通会员</em></span></strong>
    </div><!--<div id="masklayer" class="masklayer off" ontouchmove="return true;" onclick="$(this).toggleClass('on');">            <img src="http://stc.weimob.com/img/web_bb/card/themes/1/instruction.png" />        </div>-->

    <div id="masklayer" class="masklayer off" ontouchmove="return true;" onclick="$(this).toggleClass('on');">
      <script type="text/javascript">
//<![CDATA[
                var isAndroid = navigator.userAgent.toLowerCase().indexOf("android");                document.write(isAndroid>-1?"<img src='http://stc.weimob.com/img/instruction_android.png' alt='' />":"<img src='http://stc.weimob.com/img/instruction_iphone.png' alt='' />");            
      //]]>
      </script>
    </div>

    <p class="explain"><span>使用时向服务员出示此卡</span></p>
  </div>

  <div class="cardexplain">
    <!--会员积分信息-->

    <div class="jifen-box">
      <ul class="zongjifen">
        <li>
          <a href="/userinfo/Cardshopping?memberid=&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&id=162&pid=1071&bid=5"></a>

          <div class="fengexian">
            <p>消费总额</p><span>0元</span>
          </div>
        </li>

        <li>
          <a href="/webcard/signhistory?id=162&bid=5&pid=1071&memberid=&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ"></a>

          <div class="fengexian">
            <p>剩余积分</p><span>0分</span>
          </div>
        </li>

        <li>
          <a href="/userinfo/Cardshopping?memberid=&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&id=162&pid=1071&bid=5"></a>

          <p>剩余金额</p><span>0元</span>
        </li>
      </ul>

      <div class="clr"></div>
    </div><!--==================--><!--==================-->

    <ul class="round" id="powerandgift" style="display:none">
      <li><a href="javascript:;"><span>签到赚积分<em class="error">今日未签到</em></span></a></li>

      <li><a href="carduser.html"><span>个人资料</span></a></li>
    </ul>

    <ul class="round">
      <li><a href="http://1071.vshop.weimob.com?wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&v=1aee7f68b447728045a8bd97ff93f000&wxref=mp.weixin.qq.com"><span>进入商城</span></a></li>

      <li><a href="http://www.weimob.com/activity/Coupons?id=126&bid=5&wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&v=71d4f4169f1deab10b5336ebc6b77b6c"><span>参加活动</span></a></li>

      <li><a href="/Webmessage/Comment?wechatid=osXr8jseQvrR20652rDRTnw-JjjQ&wxid=f156221f78685b7f7be1be1e4ad0d9f0&wxref=mp.weixin.qq.com"><span>留言吧！</span></a></li>
    </ul>

    <ul class="round">
      <li><a href="/userinfo/CardInfo?id=162&pid=1071&bid=5"><span>会员卡说明</span></a></li>

      <li><a href="/userinfo/Store?id=162&pid=1071&bid=5&wxref=mp.weixin.qq.com"><span>适用门店电话及地址</span></a></li>
    </ul>

    <ul class="round">
      <li class="addr"><a href="http://api.map.baidu.com/marker?location=31.308558,121.525015&title=上海市杨浦区政益路8号&name=上海市杨浦区政益路8号&content=上海市杨浦区政益路28号1106-1109室&output=html&src=weiba|weiweb"><span>地址: 上海市杨浦区政益路28号1106-1109室</span></a></li>

      <li class="tel"><a href="tel:4006305400"><span>电话: 4006305400</span></a></li>
    </ul>
  </div>

  <div class="plugback">
    <a href="javascript:history.back(-1)"></a>

    <div class="plugbg themeStyle"></div>
  </div><!--输入框-->

  <div class="window" id="windowcenter" style="height:auto!important;max-height:1000px!important;bottom:inherit!important;">
    <div id="title" class="wtitle">
      领卡信息<span class="close" id="alertclose"></span>
    </div><input type="hidden" id="id" name="id" value="162" /> <input type="hidden" id="bid" name="bid" value="5" /> <input type="hidden" id="pid" name="pid" value="1071" /> <input type="hidden" id="wechatid" name="wechatid" value="osXr8jseQvrR20652rDRTnw-JjjQ" />

    <div class="content">
      <div id="txt">
        填写真实的姓名以及电话号码，即可获得会员卡，享受会员特权。
      </div>
	  <script type="text/javascript">

            var navg = navigator.userAgent.toLowerCase(), html = ''; 
			if(navg.match(/(ipad)|(iphone)/i))
			{
				html = '<p><input name="truename" value="" class="px" id="truename" type="text" placeholder="请输入您的姓名" ontouchstart="event.preventDefault();this.focus();this.select();" /></p><p><input name="tel" class="px" id="tel" value="" type="tel" placeholder="请输入您的手机号码" ontouchstart="event.preventDefault();this.focus();this.select();" /></p>';
			}
			else
			{
				html = '<p><input name="truename" value="" class="px" id="truename" type="text" placeholder="请输入您的姓名" /><\p><p><input name="tel" class="px" id="tel" value="" type="tel" placeholder="请输入您的手机号码" /></p>';
			} 
			document.write(html);
                        //var curr = new Date().getFullYear();var opt = {'date': {dateFormat: 'yy-mm-dd',preset: 'date',startYear: curr-100,endYear: curr,dateOrder: 'yymmdd'//'d Dmmyy'//,//invalid: { daysOfWeek: [0, 6], daysOfMonth: ['5/1', '12/24', '12/25'] }},'datetime': {preset: 'datetime',minDate: new Date(2014, 3, 10, 9, 22),maxDate: new Date(2014, 7, 30, 15, 44),stepMinute: 5},'time': {preset: 'time'},'credit': {preset: 'date',dateOrder: 'mmyy',dateFormat: 'mm/yy',startYear: curr,endYear: curr + 10,width: 100},'select': {preset: 'select'},'select-opt': {preset: 'select',group: true,width: 50}}var demo = 'date';$('#birthday').scroller('destroy').scroller($.extend(opt[demo], {theme: 'ios',mode: 'scroller',lang: 'zh',display: 'bottom'}));        
      </script> 
	  <input type="button" value="确 定" name="确 定" class="txtbtn" id="windowclosebutton" />
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function (){
		$("#windowclosebutton").bind("click",function() {
			var btn = $(this);
			var birthday = $("#birthday").val();
			var tel = $("#tel").val();
			var bid = $('#bid').val();
			var truename = $("#truename").val();
			var pid = $('#pid').val();
			var id = $('#id').val();
			var wechatid = $('#wechatid').val();
			if (truename == '' || "请输入名字!" == truename) {
				$("#truename").val("请输入名字!");
				return;
			}
			if (tel == '' || "手机号不对或为空!" == tel) { 
				$("#tel").val("手机号码有误或为空!");
				return;
			}
			if((new Date(birthday).getTime() ) > (new Date().getTime()) ){
				$("#birthday").val("请输入正确的日期！!");
				return;
			}
			var submitData = {
				bid:bid,
				pid:pid,
				id:id,
				wechatid:wechatid,
				truename:truename,
				birthday:birthday,
				tel: tel,
				txt1: $("#txt1").val(),
				txt2: $("#txt2").val(),
				txt3: $("#txt3").val(),
				txt4: $("#txt4").val(),
				txt5: $("#txt5").val(),
				value1: $("#value1").val(),
				value2: $("#value2").val(),
				value3: $("#value3").val(),
				value4: $("#value4").val(),
				value5: $("#value5").val(),
				select1: $("#select1").val(),
				select2: $("#select2").val(),
				select3: $("#select3").val(),
				select4: $("#select4").val(), 
				select5: $("#select5").val(), 
				svalue1: $("#svalue1").val(), 
				svalue2: $("#svalue2").val(), 
				svalue3: $("#svalue3").val(), 
				svalue4: $("#svalue4").val(), 
				svalue5: $("#svalue5").val(), 
				action: "setTel" 
			};
			$.post('/Userinfo/Registerinfo/', submitData,function(data) {
				if(data.errno == 200) 
				{ 
					$("#windowcenter").slideUp(500);
					$("#overlay").css("display","none");
					$("#cdnb").html(data.msg);
					$("#notice").css("display","");
					$("#powerandgift").css("display","");
					window.location.href=data.url;
				}
				else
				{
					$("#txt").html('<span style="color:red;">'+data.error+'<\/span>');                        }                    },                    "json"); 
				}
			);
			$("#showcard").click(function () { 
				alert("填写真实的姓名以及电话号码，即可获得会员卡，享受会员特权。");
				$("#overlay").css("display","block");
				});
			});
			$("#alertclose").click(function () {
				$("#windowcenter").slideUp(500);
				$("#overlay").css("display","none");
			});
			function alert(title){
				$("#windowcenter").slideToggle("slow"); 
				$("#txt").html(title);
			}
  </script>
  <script type="text/javascript">
			document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() 
			{
				window.shareData = {
					"imgUrl": "http://www.weimob.com/templates/kindeditor/attached/1c/38/3c/image/20130828/20130828125505_22850.jpg",
					"timeLineLink": "http://www.weimob.com/userinfo/index?id=162&pid=1071&bid=5&wechatid=fromUsername&wxref=mp.weixin.qq.com",            "sendFriendLink": "http://www.weimob.com/userinfo/index?id=162&pid=1071&bid=5&wechatid=fromUsername&wxref=mp.weixin.qq.com",
					"weiboLink": "http://www.weimob.com/userinfo/index?id=162&pid=1071&bid=5&wechatid=fromUsername&wxref=mp.weixin.qq.com",
					"tTitle": "关注可获得「微盟」微生活会员卡",            
					"tContent": "会员卡", 
					"fTitle": "会员卡",
					"fContent": "关注可获得「商家」微生活会员卡",
					"wContent": "#微信扫描二维码#我刚在某某商户扫描二维码，轻松获得微生活会员卡，酷炫又好玩！" 
			};       
			// 发送给好友
			WeixinJSBridge.on('menu:share:appmessage', function (argv) {
				WeixinJSBridge.invoke('sendAppMessage',
				{                
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640", 
					"link": window.shareData.sendFriendLink,
					"desc": window.shareData.fContent,
					"title": window.shareData.fTitle 
				}, function (res)
				{
					_report('send_msg', res.err_msg);
				})
			});        
			// 分享到朋友圈
			WeixinJSBridge.on('menu:share:timeline', function (argv) {
				WeixinJSBridge.invoke('shareTimeline', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.timeLineLink,
					"desc": window.shareData.tContent,
					"title": window.shareData.tTitle 
				}, function (res) {
					_report('timeline', res.err_msg);
				});
			});
			// 分享到微博
			WeixinJSBridge.on('menu:share:weibo', function (argv) {
				WeixinJSBridge.invoke('shareWeibo', {
					"content": window.shareData.wContent,
					"url": window.shareData.weiboLink, 
					}, function (res) {
						_report('weibo', res.err_msg);
						});
			       });
	     }, false);
  </script>
</body>
</html>