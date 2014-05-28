jQuery(document).ready(function () {
    if (microWebId == "" || microWebId == undefined || microWebId == "0" || microWebId == "null") {
        //$("#defaultMenu").show();
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            isweixin = 1;
            WeixinJSBridge.call('hideToolbar');
            initHeight();
        });
        window.setTimeout(function () { if (isweixin == 0) { initHeight(); } }, 500);
    }
    else {
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            isweixin = 1;
            WeixinJSBridge.call('hideToolbar');
            //GetHosMenuList();
        });
        window.setTimeout(function () { if (isweixin == 0) { GetHosMenuList(); } }, 500);
    }
});

function initHeight() {
    var isminuse = 0;
    $(".hosp_notb .bd").find("li").css("height", "auto");
    var pmH = document.documentElement.clientHeight;
    var leaveH = 0;
    if ($("#pageDiv").length > 0) {
        if ($("#menuTopListNew").css("display") == "none") {
            leaveH = pmH - 170 - 37;
        } else {
            leaveH = pmH - 170 - 46 - 37;
        }
    } else {
        if ($("#menuTopListNew").css("display") == "none") {
            leaveH = pmH - 170;
        } else {
            leaveH = pmH - 170 - 46;
        }
    }
    var padT = leaveH / 3 - 63;
    var liL = $("#menuList").find("li").length;
    if (leaveH > 240) {
        if (liL >= 5) {
            $(".hosp_notb .bd").find("li").css("padding-top", padT / 2);
            $(".hosp_notb .bd").find("li").css("padding-bottom", padT / 2);
        } else {
            $(".hosp_notb .bd").find("li").css("height", "70px");
        }
    } else {
        $(".hosp_notb .bd").find("li").css("height", "70px");
    }
}

//获取医院菜单列表
function GetHosMenuList() {
    //microWebId
    var num = 0;
    if (microWebId != null && microWebId.length > 0) {
        //            if (isweixin == 1) {
        jQuery.ajax({
            type: 'POST',
            url: '/action/hospital/GetHosMenulist.ashx',
            data: { "d": new Date().getTime(), "microWebId": microWebId, "parentMenuId": parentMenuId },
            dataType: 'text',
            beforeSend: function () {
                alertLoad('加载中...');
            },
            timeout: 10000,
            error: function () {
                alertNew('连接超时，请刷新后重试!');
            },
            success: function (htmlstr) {
                alertClose();

                var json = jQuery.parseJSON(htmlstr);
                if (json.Code == 10000) {
                    html = "<ul>";
                    for (var i = 0; i < json.Result.length; i++) {
                        num = i + 1;
                        if (i % 6 == 0 && i != 0) {
                            html += "</ul><ul>";
                            $("#pageDiv").show();
                        }
                        else {

                        }
                        var menuId = json.Result[i].menuId;
                        var menuName = json.Result[i].menuName;
                        var isFather = json.Result[i].isFather;
                        var menuType = json.Result[i].menuType;
                        var menuTypeValue = json.Result[i].menuTypeValue; //1: 医院介绍2.科室医生3.预约挂号4,停诊通知5.来院路线6.就诊指南
                        var menuPictValue = json.Result[i].menuPictValue;
                        switch (menuTypeValue) {
                            case "1":
                                html += "<li><a href=\"/hospital/hosintroduce.aspx?hospitalid=" + hosid + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                break;
                            case "2":
                                html += "<li><a href=\"/hospital/hosdeptlist.aspx?hospitalid=" + hosid + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                break;
                            case "3":
                                if (hosid == "20724") {
                                    //html += "<li><a href=\"javascript:void(0);\" onclick=\"javascript:alertNew('该功能暂未开通！',3);\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                } else {
                                    html += "<li><a href=\"" + hrefStateUrl + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                }
                                break;
                            case "4":
                                html += "<li><a href=\"/hospital/hosstopclinic.aspx?hospitalid=" + hosid + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                break;
                            case "5":
                                html += "<li><a href=\"/hospital/hosmap.aspx?hospitalid=" + hosid + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                break;
                            case "6":
                                html += "<li><a href=\"/hospital/visitpoint.aspx?hospitalid=" + hosid + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                break;
                            default:
                                if (isFather == "1") {
                                    html += "<li><a href=\"/hospital/hosmenulist.aspx?" + "microWebId=" + microWebId + "&menuid=" + menuId + "&isFather=" + isFather + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                }
                                else {
                                    html += "<li><a href=\"/hospital/hosarticlelist.aspx?" + "microWebId=" + microWebId + "&menuid=" + menuId + "&isFather=" + isFather + "&" + AdditionalParam + "\"><p><span class=\"nhos_tb" + menuPictValue + "\"></span></p><p>" + menuName + "</p></a></li>";
                                }
                                break;
                        }
                    }
                    //                    html = html + "</ul>";
                    if (num % 6 == 0) {
                        var lshtml = "<li><a href=\"/hospital/hosarticlelist.aspx?" + "microWebId=6002&menuid=5017&isFather=2&" + AdditionalParam + "\"><p><span class=\"nhos_tb3\"></span></p><p>健康报资讯</p></a></li>";

                        html += "</ul><ul>" + lshtml + "</ul>";
                    } else {
                        var lshtml = "<li><a href=\"/hospital/hosarticlelist.aspx?" + "microWebId=6002&menuid=5017&isFather=2&" + AdditionalParam + "\"><p><span class=\"nhos_tb3\"></span></p><p>健康报资讯</p></a></li>";

                        html += lshtml + "</ul>";
                    }
                    if (json.Result.length == 0) {
                        $("#defaultMenu").show();
                    }
                    else {
                        $("#menuList").html(html);
                        if (num > 5) {
                            var appendHtml = "<div class=\"hd\" id = \"pageDiv\" ><span class=\"prev\"></span> <ul></ul> <span class=\"next\"></span> </div>";
                            $("#scrollBox").append(appendHtml);
                            TouchSlide({
                                slideCell: "#scrollBox",
                                titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                                effect: "leftLoop",
                                autoPage: true, //自动分页
                                switchLoad: "_src" //切换加载，真实图片路径为"_src" 
                            });
                        }
                    }
                }
                else {
                    $("#defaultMenu").show();
                }
                initHeight();
            }
        });
    }
    else {
        alertNew("参数错误！");
    }
}