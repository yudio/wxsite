//返回url的函数
//参数说明：
//url : 网址
//UrlParams: 网址参数，如{title:, mode:,oid: }
//返回:url字符串
function getUrl(strUrl, objUrlParams) {
    if (strUrl == undefined) {
        return "";
    }
    var strTmp = "&";
    if (strUrl.indexOf("?") == -1) strTmp = "?";
    for (var objUrlParamItem in objUrlParams) {
        strTmp += objUrlParamItem.toString() + "=" + encodeURIComponent(objUrlParams[objUrlParamItem]) + "&";
    }
    var rdNum = Math.random();
    return strUrl + strTmp + "rdnum=" + rdNum;
}

//xmlhttp处理函数
//函数参数：
//  UrlParams
//     网址信息，如{ url:,action:,mode:,oid: }
//  AsynEvent 
//     如果传递该方法，则异步处理，处理完成后，执行该方法。
//  PostData 
//     Post到后端的数据
function openAJAX(strUrl, objUrlParams, AsynEvent, PostData) {
    strUrl = getUrl(strUrl, objUrlParams);
    if (strUrl === "") return;
    //是否异步处理
    var isAsyn = false;
    if (AsynEvent !== undefined && AsynEvent !== "") {
        isAsyn = true;
    }
    var strType = "get";
    if (PostData !== undefined && PostData !== "") {
        strType = "Post";
    }
    //异步处理
    if (isAsyn) {
        $.ajax({
            url: strUrl,
            type: strType,
            data: PostData,
            async: true,
            complete: function(oHTTP) {
                var bSuccess = oHTTP.status;
                if (bSuccess == 200) {
                    AsynEvent(oHTTP.responseText);
                }
                else {
                    alert("操作失败，请重试！");
                    return "-1";
                    //return oHTTP.responseText
                }
            }
        })
    }
    else {//同步
        var strReturn = $.ajax({
            url: strUrl,
            type: strType,
            data: PostData,
            async: false
        }).responseText;
        return strReturn;
    }
}

///	<summary>
///		获取Url后跟的参数值，相当于服务端的Request.QueryString()方法
///	</summary>
///	<returns type="String" />
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}



var StringBuilder = function() {
    this._sArray = new Array();
}
StringBuilder.prototype.append = function(str) {
    this._sArray.push(str);
}
StringBuilder.prototype.toString = function() {
    return this._sArray.join('');
}
Array.prototype.sort2 = function() {
    if (this.length > 0) {
        var temp;
        temp = this[0];
        for (var i = 0; i < this.length - 1; i++) {
            temp = this[i];
            for (var j = i + 1; j < this.length; j++) {
                if (temp > this[j]) {
                    this[i] = this[j];
                    this[j] = temp;
                    temp = this[i];
                }
            }
        }
    }
}



//Jquery Mobile Toast提示
//参数：    msg:提示信息
var toast = function(msg, top, time) {
    if (top == undefined) {
        top = ($(window).height() - 200) / 2;
    }
    if (time == undefined) {
        time = 3000;
    }
    $("<div data-theme='a' class='ui-loader ui-body-a' style='color:white;background:#000000';padding:10px 0px 10px 0px;border:0px><p>" + msg + "</p></div>").css({
        display: "block",
        opacity: 0.70,
        position: "fixed",
        padding: "7px",
        "text-align": "center",
        width: "200px",
        "font-size": "14px",
        "border-radius": "10px",
        "border": "0px",
        left: ($(window).width() - 215) / 2,
        top: top
    })
	.appendTo($.mobile.pageContainer).delay(time)
	.fadeOut(400, function() {
	    $(this).remove();
	});
}


//带确认按钮的Jquery Mobile Toast提示
var confirmToast = function(msg, url) {
    if (url == undefined) {
        url = "";
    }

    $(document).delegate("#closemydialog", "tap", function() {
        if (url == "") {
            $(document).trigger('simpledialog', { 'method': 'close' });
        } else {
            location.href = url;
        }
    });

    //录入快递信息窗体
    $('<div>').simpledialog2({
        mode: 'blank',
        blankContent: true,
        dialogAllow: false,
        dialogForce: false,
        blankContentAdopt: true,
        headerClose: false,
        blankContent: "<div  style='background-color:#FFFFFF;border:solid 1px #CCCCCC;text-align:center;'><h3>" + msg + "</h3></br><div id='closemydialog' style='width:90%;height:50px;line-height:50px;background-color:#0D88C6;color:#FFFFFF;font-size:18px;font-weight:bolder;margin-left:auto;margin-right:auto;margin-bottom:4px;'>确定</div></div>"
    })
}

var PlaceHolder = {
    init: function() {
        var inputs = document.getElementsByTagName("textarea");
        PlaceHolder.create(inputs);
    },

    create: function(inputs) {
        var input;
        if (!inputs.length) {
            inputs = [inputs];
        }
        for (var i = 0, length = inputs.length; i < length; i++) {
            input = inputs[i];
            if (input.attributes && input.attributes.placeholder2) {
                PlaceHolder._setValue(input);
                input.addEventListener("focus", function(e) {
                    if (this.value === this.attributes.placeholder2.nodeValue) {
                        this.value = "";
                        this.style.color = "";
                    }
                }, false);
                input.addEventListener("blur", function(e) {
                    if (this.value === "") {
                        PlaceHolder._setValue(this);
                    }
                }, false);
            }
        }
    },

    _setValue: function(input) {
        if (input.value != "" && input.value != input.attributes.placeholder2.nodeValue) return;
        input.value = input.attributes.placeholder2.nodeValue;
        input.style.color = "#cccccc";
    }
};

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

//获取openid
function getOpenId() {
    var openid = getParameterByName("openid");
    if (openid != "" && openid != undefined) {
        localStorage.openid = openid;
        return openid;
    }
    openid = localStorage.openid;
    if (openid != "" && openid != undefined) {
        return openid;
    }
    return "";

}
//微信隐藏底部导航
function hideToolbar() {
    if (typeof (WeixinJSBridge) == 'undefined') {
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    }
    else {
        WeixinJSBridge.call('hideToolbar');
    }
}

//列表查询无结果，则调用此函数，显示无数据
function showNodata(contentid) {
    var nodata;
    if (contentid == undefined) {
        nodata = $("#nodata");
    }
    else {
        nodata = $("#nodata" + contentid);
    }

    if (nodata.length > 0) {
        nodata.show();
    }
    else {
        createNodata(contentid);
    }
}
//在页面创建无数据的html
function createNodata(contentid) {
    var content;
    if (contentid == undefined) {
        content = $("div:jqmData(role='content')");
    }
    else {
        content = $("#" + contentid);
    }
    var nodata = new StringBuilder();
    nodata.append(" <div id='nodata'  style='text-align:center'>");
    nodata.append(" <img src='/Image/nodata.png'  style='margin-top:35px;width:68px'/>");
    nodata.append(" <div style='color:#808080;font-size:24px; margin-top:20px;'>暂无数据</div>");
    nodata.append(" </div>  ");
    content.append(nodata.toString());
}

//设置数字为电话号码
function SetNumToPhone(control) {

    var divContext = control;
    var htmlstr = divContext[0].innerText || "";
    var difference = "";
    var reg = "http+://[^\s]*.html";
    htmlstr = htmlstr.replace(reg, "");
    var all = /\d{3,4}-\d{5,8}|\d{4}-\{7,8}|((\(\d{3}\))|(\d{3}\-))?13[456789]\d{8}|15[89]\d{8}|\d{8,10}|110|120|119|10000|969368|95598|96956|96833|96968|10050|12530/g;
    if (htmlstr.match(all) != null) {
        var tel = Init(htmlstr.match(all));
        for (var i = 0; i < tel.length; i++) {
            var m = new RegExp(tel[i], "g")
            divContext[0].innerHTML = divContext[0].innerHTML.replace(m, "<a href='tel:" + tel[i] + "'>" + tel[i] + "</a>");
        }
    }
}
//去除数组相同项目
function Init(tel) {
    var res = [], hash = {}, same = [];
    for (var i = 0, elem; (elem = tel[i]) != null; i++) {
        if (!hash[elem]) {
            res.push(elem);
            hash[elem] = true;
        }
    }
    return res;
}

//only have one video address ; return the HTML include  video template
function RetrunHasVideoHtml(control, flashtemplate, mpftemplate, mpfurl) {
    var html = control[0].innerText;
    var mobileType = isMobile;
    var CheckInstallActive = flashChecker();
    var addressreg = "http+://[^\s]*.html";
    var returnhtml = "";
    if (html.match(addressreg) != null) {
        var video = Init(html.match(addressreg));
        if (video.length >= 1) {
            var m = new RegExp(video[0], "g");
            var inputurl = video[0];
            var lastline = inputurl.lastIndexOf("/") + 1;
            var lastdot = inputurl.lastIndexOf(".");
            var vid = inputurl.substring(lastline, lastdot);
            if (isMobile.iOS() == true) {
                returnhtml = control[0].innerHTML.replace(m, ReturnMpfTemplate(mpftemplate, mpfurl));
            } else {
                if (!CheckInstallActive.f) {
                    returnhtml = control[0].innerHTML.replace(m, ReturnMpfTemplate(mpftemplate, mpfurl));
                } else {
                    returnhtml = control[0].innerHTML.replace(m, ReturnFlashtemplate(flashtemplate, vid));
                }
            }
        }
    }
    if (returnhtml == null) {
        returnhtml = html;
    }
    return returnhtml;
}
//return  flash template
function ReturnFlashtemplate(flashtemplate, vid) {

    return flashtemplate.format(vid);
}
//return  mp4 template
function ReturnMpfTemplate(mpftemplate, vid) {
    return mpftemplate.format(vid);
}
//以下为判断是否安装flash
function flashChecker() {
    var hasFlash = 0; //是否安装了flash  
    var flashVersion = 0; //flash版本  

    if (document.all) {
        var swf = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
        if (swf) {
            hasFlash = 1;
            VSwf = swf.GetVariable("$version");
            flashVersion = parseInt(VSwf.split(" ")[1].split(",")[0]);
        }
    } else {
        if (navigator.plugins && navigator.plugins.length > 0) {
            var swf = navigator.plugins["Shockwave Flash"];
            if (swf) {
                hasFlash = 1;
                var words = swf.description.split(" ");
                for (var i = 0; i < words.length; ++i) {
                    if (isNaN(parseInt(words[i]))) continue;
                    flashVersion = parseInt(words[i]);
                }
            }
        }
    }
    return { f: hasFlash, v: flashVersion };
}

//判断设备系统
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i) ? true : false;
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i) ? true : false;
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i) ? true : false;
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
    }
}

//隐藏无数据的html
function hideNodata(contentid) {

    var nodata;
    if (contentid == undefined) {
        nodata = $("#nodata");
    }
    else {
        nodata = $("#nodata" + contentid);
    }
    var nodata = $("#nodata");
    if (nodata.length > 0) {
        nodata.hide();
    }
}
//格式化

// 对Date的扩展，将 Date 转化为指定格式的String
// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
// 例子： 
// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
Date.prototype.Format = function(fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}

//String扩展方法,类似C# string.format
String.prototype.format = function() {
    var args = arguments;
    return this.replace(/\{(\d+)\}/g,
                function(m, i) {
                    return args[i];
                });
}
function BindingHouse() {
    $.mobile.showPageLoadingMsg("e");
    window.location.href = "../wdsq/BindingHouse.aspx";
    $.mobile.hidePageLoadingMsg("e");
}


function Authenticate() {
    $.mobile.showPageLoadingMsg("e");
    window.location.href = "../wdsq/MemberAuthenticate.aspx";
    $.mobile.hidePageLoadingMsg("e");
}

var ListTemplate = "<div class='list'>" +
                        "<div class='list-div-title'>{0}</div>" +
                        "<div class='list-div-text'>{1}</div>"
"</div>"

//获取字符串的长度，中文字符两个字节，英文一个字节。
function GetStringLength(s) {
    var l = 0;
    var a = s.split("");
    for (var i = 0; i < a.length; i++) {
        if (a[i].charCodeAt(0) < 299) {
            l++;
        } else {
            l += 2;
        }
    }
    return l;
}

//去掉左边的空白  
function trimLeft(s) {
    if (s == null) {
        return "";
    }
    var whitespace = new String(" \t\n\r");
    var str = new String(s);
    if (whitespace.indexOf(str.charAt(0)) != -1) {
        var j = 0, i = str.length;
        while (j < i && whitespace.indexOf(str.charAt(j)) != -1) {
            j++;
        }
        str = str.substring(j, i);
    }
    return str;
}
//去掉右边的空白 www.2cto.com   
function trimRight(s) {
    if (s == null) return "";
    var whitespace = new String(" \t\n\r");
    var str = new String(s);
    if (whitespace.indexOf(str.charAt(str.length - 1)) != -1) {
        var i = str.length - 1;
        while (i >= 0 && whitespace.indexOf(str.charAt(i)) != -1) {
            i--;
        }
        str = str.substring(0, i + 1);
    }
    return str;
}

//添加分享白名单

var strhosturl = new Array(
"ProjectInfo.html",
"ProjectInfoDetail.aspx",
"Catalogue.aspx",
"ListView.aspx",
"PubDetailPage.aspx",
"ConvenienceServices.aspx",
"VankeLatterIssues.aspx",
"VankeLatterMenu.aspx",
"VankeLatterConstructionSchedule.aspx",
"FirstPage.aspx",
"CustomerActivity.aspx"
); 

var url = window.location.href;
var isAllowShare = false;
$(strhosturl).each(function() { 
    if (url.toLowerCase().match(this.toLowerCase()) != null) {
        isAllowShare = true;
    }
});

if (!isAllowShare) {

    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        // 通过下面这个API隐藏右上角按钮
        WeixinJSBridge.call('hideOptionMenu');
    });

}

