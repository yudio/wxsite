var len = "0";
//主题置顶模板
//主题置顶模板
var toptmp = "<div id='slider' class='swipe'><div class='swipe-wrap'></div></div>";
var defualtcontexttmp = "<div class='moudule-contextfrm'><div class='subtitle'>{0}</div><div class='subtime'>{1}</div><div class='subcontext'>{2}</div></div>";
var ArticleSectiontmp = "<div class='moudule-radiusfrm'><div class='c-title'>{0}</div><div class='c-content'><div>{1}</div></div><div class='c-divbtn' type='' onclick='ChangeHeight(this)'>更多<img alt='' src='../Image/arrow_unfold.png' /></div></div>";
var ArticleHouseTypetmp = "<div class='moudule-radiusfrm'><div class='a-title'>{0}</div><div class='c-divbtn' type='' count='' onclick='ChangeHeight(this)'>更多<img alt='' src='../Image/arrow_unfold.png' /></div></div>";
var ArticleSubHouseTypetmp = "<a href={0} class='swipebox' title=''><img alt='' src='{0}' alt='image' /></a></div><div class='c-housetype' style='height:10px;'>{1}";
var vidiotmp = "<div class='moudule-radiusfrm'><div class='c-title'>视频播放</div><div class='c-content'><video style='width:100%; margin-bottom:10px;' src='{0}' type='video/mp4' controls='controls'></video></div></div>";
var subject;
var pagetitle = "";

$(function() {
    var strConvenienceServicesGUID = "";

    //分享时入口
    if (getUrlParam("ConvenienceServicesGUID") != null && getUrlParam("ConvenienceServicesGUID") != "") {
        strConvenienceServicesGUID = getUrlParam("ConvenienceServicesGUID");
    }
 
    var parames = { action: "getConvenienceServices", strOpenid: $("#openid").text(), strconvenienceServicesGUID: strConvenienceServicesGUID }; //
    //var data = openAJAX("/Handle/WdsqHandler.ashx", parames);
	var data =openAJAX("project-data.html");
    var oLst = eval("(" + data + ")");
	
    strConvenienceServicesGUID = "";
    
    //如果被分享的选择切分享时便民信息页面没有被选中项目
    if (getUrlParam("ConvenienceServicesGUID") == "") {
        oLst.length = 0;
    }
    
    //如果有数据
    if (oLst.length != 0) {
        strConvenienceServicesGUID = oLst[0].ConvenienceServicesGUID;
    } 
    
    var selector = {
        //选择项目Span ID
        SelectProjectControlID: "ProjInfo",
        //内容页容器ID
        ContentPanelID: "ProjInfoDiv",
        //选择项目控件容器ID
        SelectorPanelID: "selectDIV",
        //用户选择项目ID
        SelectProjectID: strConvenienceServicesGUID,

        onProjSelected: function() {
            getDefualtData(ProjectSelector.funGetSelectProjectID());
        }
    };

    //如果没有数据
    if (oLst.length == 0) {

        ProjectSelector = $.extend(ProjectSelector, selector);
        ProjectSelector.init();

        $("#Bridgeimg_url").val("/Image/houseBigImage.jpg");
        $("#Bridgedesc").val("便民信息");
        $("#BridgeconvenienceServicesGUID").val("");
        $('#ProjInfo').trigger("click");
    }
    else {
        //        $("#ProjInfo").html(oLst[0].Projname);
        //        $("#ProjInfoImage").attr("src", oLst[0].PicUrl); 
        ProjectSelector = $.extend(ProjectSelector, selector);
        ProjectSelector.init();
        getDefualtData(oLst[0].ConvenienceServicesGUID);
    }

    $("#wyjc").click(function(e) {
        $("#ProjInfoDiv").hide();
        $(".wyjc").show();
    });

    $(".wyjc a").click(function() {
        var str = $.trim($("#textarea").val());
        var strOffset = $("#textarea").offset().top + 50;

        if (str != "") {
            if (GetStringLength(str) > 140) {
                toast("不允许超过70个英文字母或汉字!", strOffset);
            }
            else {
                toast("感谢您的反馈，我们会尽快核实并更新!", strOffset);
                $("#textarea").css("height", "80px").val("");
                t = setTimeout(function() {
                    $("#ProjInfoDiv").show();
                    $(".wyjc").hide();
                }, 3000);
            }
        }
        else {
            toast("留下您发现的变更信息", strOffset);
        }
    });
})


//得到详细信息的列表对象
function getDefualtData(ConvenienceServicesGUID) {

    var isowner = 1;
    //目前带参数表示被分享入口，不进行记忆。防止影响业主功能使用
    if (getUrlParam("ConvenienceServicesGUID") != null) {
        isowner = 0;
    }
    
    var paramesConvenienceServicesGUID = { action: "GetConvenienceServicesEntityGuid", convenienceServicesGUID: ConvenienceServicesGUID, isowner: isowner }; //
    var dataparamesConvenienceServicesGUID = openAJAX("/Handle/WdsqHandler.ashx", paramesConvenienceServicesGUID);

    var oLst = eval("(" + dataparamesConvenienceServicesGUID + ")");

    $("#ProjInfo").html(oLst[0].Projname);
    $("#ProjInfoImage").attr("src", oLst[0].PicUrl);

    $("#Bridgeimg_url").val(oLst[0].PicUrl);
    $("#Bridgedesc").val(oLst[0].Projname + "便民信息"); 
    $("#BridgeconvenienceServicesGUID").val(ConvenienceServicesGUID); 
    
    var parames = { action: "ProjectInfoDetail", pid: oLst[0].ConvenienceServicesGUID };
    openAJAX("/Handle/ZyznHandler.ashx", parames, returnDetail);
}

function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return unescape(r[2]); return null; //返回参数值
}

//以下全部代码修改分段信息出错的问题，从项目详细界面的JS COPY
function returnDetail(data) {

    var list = eval("(" + data + ")");
    var top = list.top;
    var dealist = list.plist;
    if (dealist.length > 0) {
        CreateList(dealist, top); //加载模块
    }
    SetNumToPhone($("#detaillist"));
    ImageAddClick();
    $(".swipebox").swipebox({
        useCSS: true, // false will force the use of jQuery for animations
        hideBarsDelay: 3000, // 0 to always show caption and action bar
        videoMaxWidth: 1140, // videos max width
        beforeOpen: function () { }, // called before opening
        afterClose: function () { } // called after closing
    });
}

function CreateList(dealist, top) {
    var divContext = $("#detaillist");
    divContext.html("");
    var html = "";
    var subject = $('#subtitle').html();
    for (var i = 0, j = 0; i < dealist.length; i++) {
        //文字信息块
        if (dealist[i].ShowType == 1) {


            var htmlte = ArticleSectiontmp.format(dealist[i].Title, dealist[i].Content);
            if (dealist[i].ShowMode == '0' || $(dealist[i].Content).length<3) {
                var objhtml = $(htmlte);
                objhtml.find('.c-divbtn').hide();
                htmlte = objhtml[0].outerHTML;
            }

            htmlte += "<div class='pempty'></div>";

            html += htmlte;
        }
        //多段落图块
        if (dealist[i].ShowType == 2) {
            var htmlte = ArticleHouseTypetmp.format(dealist[i].Title);
            var obj = $(htmlte);
            var subhtml = $("<div class='c-divimgcontent'></div>");
            for (var p = 0; p < dealist[i].PicDocumentList.length; p++) {
                htmlsubhousetype = ArticleSubHouseTypetmp.format(dealist[i].PicDocumentList[p].PicUrl, dealist[i].PicDocumentList[p].PicTitle);
                subhtml.append(htmlsubhousetype);
            }
            obj.find('.a-title').after(subhtml);
            if (dealist[i].ShowMode == '0') {
                obj.find('.c-divbtn').hide();
                htmlte = obj[0].outerHTML;
            }
            else {
                if (dealist[i].Title.indexOf('户型') >= 0) {
                    $(obj[0]).find('.c-divbtn').html("展开全部户型(" + dealist[i].PicDocumentList.length + ")<img alt='' src='../Image/arrow_unfold.png' />");
                    obj.attr('type', '展开全部户型');
                    obj.attr('count', dealist[i].PicDocumentList.length);
                }
                else {
                    $(obj[0]).find('.c-divbtn').html("更多图片<img alt='' src='../Image/arrow_unfold.png' />");
                    obj.attr('type', '');
                    obj.attr('count', '');
                }
                if (dealist[i].PicDocumentList.length < 2) {
                    obj.find('.c-divbtn').hide();
                }
                
                htmlte = obj[0].outerHTML;
            }

            htmlte += "<div class='pempty'></div>";

            html += htmlte;
        }
        //视频播放
        if (dealist[i].ShowType == 3) {
            var htmlte = vidiotmp.format(dealist[i].Content);

            htmlte += "<div class='pempty'></div>";

            html += htmlte;
        }
    }
    divContext.append(html);
    setTimeout('SetHight()', 1500);
}

function SetHight() {
    var objhtml = $('#detaillist');
    var morbtn = $('#detaillist').find('.c-divbtn');
    var addheight;

    for (var i = 0; i < morbtn.length; i++) {
        if (!$(morbtn[i]).is(":hidden")) {
            var context;
            var subheight = 0;
            var Articlelength = 0;
            if ($(morbtn[i]).parent().find('.c-divimgcontent').length > 0) {
                subheight = 0;
                Articlelength = 1;
                context = $(morbtn[i]).parent().find('.c-divimgcontent');
                addheight = 10;
            }
            else {
                subheight = 0;
                Articlelength = 2;
                context = $(morbtn[i]).parent().find("div:eq(1)");
                addheight = 0;
            }
            if (context.children().length > 0) {
                for (var j = 0; j < Articlelength; j++) {
                    subheight += $(context.children().children()[j]).height();
                }
                context.height(addheight + subheight);
                if (context.children().children().length <= 2 && !context.hasClass("c-divimgcontent") || context.children().children().length <= 1 && context.hasClass("c-divimgcontent")) {
                    $(morbtn[i]).hide();
                }
            }
            else {
                var subheight = parseInt(context.children().height())
                context.height(30 + subheight);
                if (subheight == $(context).height()) {
                    $(morbtn[i]).hide();
                }
            }
        }
    }
}

function ImageAddClick() {
    var objhtml = $('#detaillist');
    var objcontentlist = objhtml.find('.c-content');
    for (var k = 0; k < objcontentlist.length; k++) {
        var imglist = $(objcontentlist[k]).find('img');
        for (var i = 0; i < imglist.length; i++) {
            $(imglist[i]).click(function () {
                if (!$(".tanchu").is(":hidden")) {
                    return;
                }
                $(document.body).css("overflow", "hidden");
                $('#shadowDiv').attr('background-color', 'black')
                $('#shadowDiv').show();
                center($('.tanchu'));
                $(".tanchu").show();

                var gesturableImg = new ImgTouchCanvas({
                    canvas: document.getElementById('mycanvas'),
                    path: $(this)[0].src
                });
            })
        }
    }
}

function TopImageSwipte() {
    window.mySwipe = new Swipe(document.getElementById('slider'), {
        startSlide: 0,
        speed: 400,
        auto: 3000,
        continuous: true,
        disableScroll: false,
        stopPropagation: false,
        callback: function (index, elem) {
            var li = $(elem).parent().parent().find('li');
            li.each(function (i) {
                var type = $(this).attr('index');

                if (type == index) {
                    $(this).css('background-color', '#FFFFFF');
                    $(this).css('border', '1px solid #FFFFFF');
                }
                else {
                    $(this).css('background-color', '#B8B8B8');
                    $(this).css('border', '1px solid #B8B8B8');
                }
            })
        },
        transitionEnd: function (index, elem) { }
    });
}

function TransfDate(date) {
    var t = date.toString().substring(0, 10);

    t = t.replace(t.substring(4, 5), '年');
    t = t.replace(t.substring(7, 8), '月');
    t += "日";

    return t;
}

function ChangeStr(allstr, start, end, str, changeStr) {
    if (allstr.substring(start - 1, end - 1) == str) {
        return allstr.substring(0, start - 1) + changeStr + allstr.substring(end, allstr.length);
    }
}

function ChangeHeight(o) {
    //alert('展示全部');
    if ($(o)[0].innerText == "更多") {
        var context = $(o).parent().find("div:eq(1)");
        var height = 0;
        context.children().each(function (i) {
            height += parseInt($(this).height());
        })
        context.height(height + 0);
        $(o).html("收起<img alt='' src='../Image/arrow_fold.png'/>");
        $(o).removeClass('.c-divbtn').addClass('c-divbtn-grey');
        return;
    }
    if ($(o)[0].innerText.indexOf('展开全部户型') >= 0 || $(o)[0].innerText.indexOf('更多图片') >= 0) {
        //($(o).parent().find('img')[0]).click();
        //$('.swipebox').find('img').first().click();
        $(o).parent().find('.swipebox').first().click();
    }
    if ($(o)[0].innerText == "收起") {
        var subheight = 0;
        var context = $(o).parent().find("div:eq(1)");
        for (var i = 0; i < 2; i++) {
            subheight += $(context.children().children()[i]).height();
        }
        context.height(subheight + 0);
        $(o).html("更多<img alt='' src='../Image/arrow_unfold.png' />");
        $(o).removeClass('c-divbtn-grey').addClass('.c-divbtn');
    }
}

function center(obj) {
    var screenWidth = $(window).width(), screenHeight = $(window).height();
    var scrolltop = $(document).scrollTop();
    var objLeft = (screenWidth - obj.width()) / 2
    var objTop = (screenHeight - obj.height()) / 2 + scrolltop;
    obj.css({ left: objLeft, top: objTop });

    $("#mycanvas").css("width", document.body.clientWidth).css("height", document.body.clientHeight).css("top", scrolltop - objTop);

    $(window).resize(function () {
        screenWidth = $(window).width();
        screenHeight = $(window).height();
        scrolltop = $(document).scrollTop();
        objLeft = (screenWidth - obj.width()) / 2
        objTop = (screenHeight - obj.height()) / 2 + scrolltop;
        obj.css({ left: objLeft, top: objTop });
        $("#mycanvas").css("width", document.body.clientWidth).css("height", document.body.clientHeight).css("top", scrolltop - objTop);
    });
    $(window).scroll(function () {
        screenWidth = $(window).width();
        screenHeight = $(window).height();
        scrolltop = $(document).scrollTop();
        objLeft = (screenWidth - obj.width()) / 2
        objTop = (screenHeight - obj.height()) / 2 + scrolltop;
        obj.css({ left: objLeft, top: objTop });
        $("#mycanvas").css("width", document.body.clientWidth).css("height", document.body.clientHeight).css("top", scrolltop - objTop);
    });
    $(obj).click(function (evt) {
        $(document.body).css("overflow", "auto");
        $(obj).hide();
        $('#shadowDiv').hide();
    })
}