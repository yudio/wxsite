<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="">
<title><?php echo ($Zadan["title"]); ?></title>
<link href="<?php echo RES;?>/css/guajiang/css/activity-style.css" rel="stylesheet" type="text/css">
<style type="text/css">
#txt {
	color: #000000;
}
.footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:99;}
#footReturn a, #footReturn2 a {
display: block;
line-height: 41px;
color: #fff;
text-shadow: 1px 1px #282828;
font-size: 14px;
font-weight: bold;
}
#footReturn, #footReturn2 {
z-index: 89;
display: inline-block;
text-align: center;
text-decoration: none;
vertical-align: middle;
cursor: pointer;
width: 100%;
outline: 0 none;
overflow: visible;
Unknown property name.-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 0;
height: 41px;
opacity: .95;
border-top: 1px solid #181818;
box-shadow: inset 0 1px 2px #b6b6b6;
background-color: #515151;
Invalid property value.background-image: -ms-linear-gradient(top,#838383,#202020);
background-image: -webkit-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -moz-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -o-linear-gradient(top,#838383,#202020);
background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#838383),to(#202020));
Invalid property value.filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
Unknown property name.-ms-filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
}

</style>
<style type="text/css">
.cover{height:240px;margin:20px auto;} 
.eggBox{background:url(<?php echo RES;?>/css/guajiang/images/egg_1.png) no-repeat bottom;width:158px;padding-top:15px;margin-top:50px; height:187px;cursor:pointer;position:relative;margin-left:35px;} 
.curr{background:url(<?php echo RES;?>/css/guajiang/images/egg_2.png) no-repeat bottom;cursor:default;z-index:300;} 
.curr sup{position:absolute;width:232px;height:181px;top:-36px;left:-34px;background:url(<?php echo RES;?>/css/guajiang/images/img-5.png) no-repeat;z-index:800;} 
.curr sup.win{background:url(<?php echo RES;?>/css/guajiang/images/img-4.png) no-repeat;}
.hammer{background:url(<?php echo RES;?>/css/guajiang/images/img-6.png) no-repeat;width:74px;height:87px;position:absolute;  
text-indent:-9999px;z-index:150;left:130px;top:0;} 
</style>
<script type="text/javascript">
if (typeof WeixinJSBridge== 'undefined'){
	//window.location.href='/alert.html';
}else{
	
}
function loading(canvas,options){   
  this.canvas = canvas;   
  if(options){   
    this.radius = options.radius||12;   
    this.circleLineWidth = options.circleLineWidth||4;   
    this.circleColor = options.circleColor||'lightgray';   
    this.moveArcColor = options.moveArcColor||'gray';   
  }else{   
    this.radius = 12;   
    this.circelLineWidth = 4;   
    this.circleColor = 'lightgray';   
    this.moveArcColor = 'gray';   
  }   
}   
loading.prototype = {   
  show:function (){   
    var canvas = this.canvas;   
    if(!canvas.getContext)return;   
    if(canvas.__loading)return;   
    canvas.__loading = this;   
    var ctx = canvas.getContext('2d');   
    var radius = this.radius;   
    var me = this;   
    var rotatorAngle = Math.PI*1.5;   
    var step = Math.PI/6;   
    canvas.loadingInterval = setInterval(function(){   
      ctx.clearRect(0,0,canvas.width,canvas.height);   
      var lineWidth = me.circleLineWidth;   
      var center = {x:canvas.width/2,y:canvas.height/2};  

      ctx.beginPath();   
      ctx.lineWidth = lineWidth;   
      ctx.strokeStyle = me.circleColor;   
      ctx.arc(center.x,center.y+20,radius,0,Math.PI*2);   
      ctx.closePath();   
      ctx.stroke();   
      //在圆圈上面画小圆   
      ctx.beginPath();   
      ctx.strokeStyle = me.moveArcColor;   
      ctx.arc(center.x,center.y+20,radius,rotatorAngle,rotatorAngle+Math.PI*.45);   
      ctx.stroke();   
      rotatorAngle+=step;   
 
    },100);   
  },   
  hide:function(){   
    var canvas = this.canvas;   
    canvas.__loading = false;   
    if(canvas.loadingInterval){   
      window.clearInterval(canvas.loadingInterval);   
    }   
    var ctx = canvas.getContext('2d');   
    if(ctx)ctx.clearRect(0,0,canvas.width,canvas.height);   
  }   
};   
</script></head>




<body data-role="page" class="activity-scratch-card-winning">
  <script type="text/javascript">
var loadingObj = new loading(document.getElementById('loading'),{radius:20,circleLineWidth:8});   
    loadingObj.show();   

</script>
<script   src="<?php echo RES;?>/css/guajiang/js/jquery.js" type="text/javascript"></script>
<script   src="<?php echo RES;?>/css/guajiang/js/wScratchPad.js" type="text/javascript"></script>

<?php if($Zadan['usenums'] == 2): ?><div class="main">
		<div class="content" style="margin-top:-5px">
			<div class="boxcontent boxwhite">
				<div class="box">
					<div class="title-brown">恭喜：</div>
					<div class="Detail">
					
					<p>尊敬的 <font color='red'> <?php echo ($Zadan["uname"]); ?> </font> 您已经中过 <strong><font color='red'><?php echo ($Zadan["winprize"]); ?></font></strong> 奖了,<br />兑奖号： <font color='red'><?php echo ($Zadan["sncode"]); ?></font></p>	
			
					</div>
				</div>
			</div>
		</div>
	</div><?php endif; ?>
<?php if($Zadan['usenums'] == 3): ?><div class="main">
		<div class="banner"><img src="<?php echo RES;?>/css/guajiang/images/activity-scratch-card-end2.jpg"></div>
		<div class="content" style="margin-top:-5px">
			<div class="boxcontent boxwhite">
				<div class="box">
					<div class="title-brown">活动结束说明：</div>
					<div class="Detail">
						<p><?php echo ($Zadan["endinfo"]); ?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="main">
<div class="cover">
	<div id="egg" class="eggBox"> 
        <p class="hammer" id="hammer">锤子</p> 
        <sup></sup>
    </div> 
</div>
<div class="content">
	   
	<div id="zjl" style="display:none" class="boxcontent boxwhite">
		<div class="box">
			<div class="title-red"><span>恭喜你中奖了</span></div>
			<div class="Detail">
				<p>您中了：<span class="red"><?php echo ($Zadan["winprize"]); ?></span></p>
				<p class="red"> <?php echo ($Zadan["sttxt"]); ?> </p>
				<p>
					<input name=""  class="px" id="tel" value="" type="text" placeholder="请输入您的手机号">
					<input name=""  class="px" id="wechaname" value="" type="text" placeholder="请输入您的微信号">
					<input name=""  id="wechaid" value="<?php echo ($Zadan["wecha_id"]); ?>" type="hidden">
					<input name=""  id="lid" value="<?php echo ($Zadan["lid"]); ?>" type="hidden">
				</p><p>
				<p>
					<input class="pxbtn" name="提 交"  id="save-btn" type="button" value="用户提交">
				</p>
			</div>
		</div>
	</div>

	<div class="boxcontent boxwhite">
		<div class="box">
			<div class="title-brown"><span>奖项说明：</span></div>
			<div class="Detail">
			<p class="red">砸不开视为作废</p>
			<p>每人最多有<?php echo ($Zadan["canrqnums"]); ?>次机会</p>
			<p>这是您第 <span class="red" id="usenums"><?php echo ($Zadan["usecout"]); ?></span> 次砸蛋</p>
			 <?php echo $prizeStr;?>
			</div>
		</div>
	</div>
	<div class="boxcontent boxwhite">
		<div class="box">
			<div class="title-brown">活动说明：</div>
			<div class="Detail"><?php echo ($Zadan["info"]); ?>
				<p>活动时间:<?php echo (date("Y-m-d",$Zadan["statdate"])); ?>至<?php echo (date("Y-m-d",$Zadan["enddate"])); ?></p>
				<p><?php echo ($Zadan["txt"]); ?></p>				
							
			</div>
		</div>
	</div>
</div>
<div style="clear:both;"></div>
</div><?php endif; ?>	
<div style="height:60px;"></div>
<script src="<?php echo RES;?>/css/guajiang/js/alert.js" type="text/javascript"></script>
<style type="text/css">
.window {
	width:290px;
	position:absolute;
	display:none;
	bottom:30px;
	left:50%;
	 z-index:9999;
	margin:-50px auto 0 -145px;
	padding:2px;
	border-radius:0.6em;
	-webkit-border-radius:0.6em;
	-moz-border-radius:0.6em;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	font:14px/1.5 Microsoft YaHei,Helvitica,Verdana,Arial,san-serif;
}
.window .title {
	
	background-color: #A3A2A1;
	line-height: 26px;
    padding: 5px 5px 5px 10px;
	color:#ffffff;
	font-size:16px;
	border-radius:0.5em 0.5em 0 0;
	-webkit-border-radius:0.5em 0.5em 0 0;
	-moz-border-radius:0.5em 0.5em 0 0;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #585858 ), to( #565656 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient(#585858, #565656); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient(#585858, #565656); /* FF3.6 */
	background-image:     -ms-linear-gradient(#585858, #565656); /* IE10 */
	background-image:      -o-linear-gradient(#585858, #565656); /* Opera 11.10+ */
	background-image:         linear-gradient(#585858, #565656);
	
}
.window .content {
	/*min-height:100px;*/
	overflow:auto;
	padding:10px;
	background: linear-gradient(#FBFBFB, #EEEEEE) repeat scroll 0 0 #FFF9DF;
    color: #222222;
    text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0 0 0.6em 0.6em;
	-webkit-border-radius: 0 0 0.6em 0.6em;
	-moz-border-radius: 0 0 0.6em 0.6em;
}
.window #txt {
	min-height:30px;font-size:16px; line-height:22px;
}
.window .txtbtn {
	
	background: #f1f1f1;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #DCDCDC ), to( #f1f1f1 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #DCDCDC ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #DCDCDC ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #DCDCDC ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #DCDCDC ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #DCDCDC );
	border: 1px solid #CCCCCC;
	border-bottom: 1px solid #B4B4B4;
	color: #555555;
	font-weight: bold;
	text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0.6em 0.6em 0.6em 0.6em;
	display: block;
	width: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
	text-overflow: ellipsis;
	white-space: nowrap;
	cursor: pointer;
	text-align: windowcenter;
	font-weight: bold;
	font-size: 18px;
	padding:6px;
	margin:10px 0 0 0;
}
.window .txtbtn:visited {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:hover {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:active {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #cccccc ), to( #ffffff )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #cccccc , #ffffff ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #cccccc , #ffffff ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #cccccc , #ffffff ); /* IE10 */
	background-image:      -o-linear-gradient( #cccccc , #ffffff ); /* Opera 11.10+ */
	background-image:         linear-gradient( #cccccc , #ffffff );
	border: 1px solid #C9C9C9;
	border-top: 1px solid #B4B4B4;
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3) inset;
}

.window .title .close {
	float:right;
	background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACTSURBVEhL7dNtCoAgDAZgb60nsGN1tPLVCVNHmg76kQ8E1mwv+GG27cestQ4PvTZ69SFocBGpWa8+zHt/Up+IN+MhgLlUmnIE1CpBQB2COZibfpnXhHFaIZkYph0SOeeK/QJ8o7KOek84fkCWSBtfL+Ny2MPpCkPFMH6PWEhWhKncIyEk69VfiUuVhqJefds+YcwNbEwxGqGIFWYAAAAASUVORK5CYII=");
	width:26px;
	height:26px;
	display:block;	
}
</style>
<div class="window" id="windowcenter">
	<div id="title" class="title">消息提醒<span class="close" id="alertclose"></span></div>
	<div class="content">
	 <div id="txt"></div>
	 <input type="button" value="确定" id="windowclosebutton" name="确定" class="txtbtn">	
	</div>
</div>
 
 

<script type="text/javascript">
/*window.sncode = "<?php echo ($Zadan["sn"]); ?>";*/
window.prize = "<?php echo ($Zadan["winprize"]); ?>";
var winprize  = "<?php echo ($Zadan["winprize"]); ?>";
var zjl = "<?php echo ($Zadan["zjl"]); ?>";	
var goon = true;
$(function(){
	$('#egg').bind("click",function(){
		var _this=$(this);
		if(goon){
			document.getElementById('txt').innerHTML=winprize;
			$(".hammer").animate({
			"top":_this.position().top-25,
			 "left":_this.position().left+125 
			},30,function(){
				_this.addClass("curr");
				_this.find("sup").show(); 
				$(".hammer").hide(); 
				if(zjl!=''||zjl!=0){
					$("#zjl").slideToggle(500);
					_this.find("sup").addClass('win');
				}else{
					$("#windowcenter").slideToggle(500);
				}
				goon=false;     
			}); 
		}
	});
});

$("#save-btn").bind("click",
	function() {
		var btn 	= $(this);
		var tel 	= $("#tel").val();
		var wxname	= $("#wechaname").val();
		var wechaid = $("#wechaid").val();
		var lid 	= $("#lid").val();
		 
		if (tel == '') {
	        alert("请认真输入手机号");
	        return
    	}
		if(wxname == ''){
			alert("请认真输入微信号");
			return;
		}

		var submitData = {
			tid: 440,
			/*code: $("#sncode").text(),*/
			tel 	: tel,
			wxname	: wxname,
			wechaid : wechaid,
			lid 	: lid,
			prize 	: winprize,
			action 	: "add"
		};
		$.post('index.php?g=Wap&m=Zadan&a=add', submitData,
			function(data) {
				if (data.success == true) {
					alert(data.msg);
					$("#zjl").hide("slow");
					return
				} else { 
					//alert('失败'+data);
					return
				}
			},"json")
});

</script>
</body></html>