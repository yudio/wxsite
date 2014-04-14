
(function() {
    function onBridgeReady() {
        var getParam = {
            GetBridgeimg_url: function() {
                // return "http://weixin.mysoft.net.cn/Resources/vank_later201401_1.jpg";
                var imgurl = "";
                try {

                    if (location.href.toLowerCase().match("projectinfo.html") != null || $("#Bridgeimg_url").val() == undefined || $("#Bridgeimg_url").val() == "") {

                        //../Image/arrow_unfold.png  ../Image/arrow_fold.png
                        imgurl = $("img:first").attr("src");
                        //如果获取不到图则取默认图片，或者为收起的小图片
                        if (imgurl == null || imgurl == "" || imgurl.toLowerCase().match("arrow_unfold.png") != null || imgurl.toLowerCase().match("arrow_fold.png") != null) {
                            imgurl = "/Image/DefaultHD.jpg";
                        }

                        if (location.href.toLowerCase().match("firstpage.aspx") != null) {
                            imgurl = "/Image/welcome.png";
                        }

                    } else {
                        imgurl = $("#Bridgeimg_url").val();
                    }


                    if (imgurl.match("http\\:") != null) {
                        imgurl = imgurl;
                    }
                    else if (imgurl.match("\\.\\.") != null) {
                        imgurl = encodeURIComponent(imgurl).replace("..", location.origin + "/");
                    }
                    else {
                        imgurl = location.origin + "/" + encodeURIComponent(imgurl);
                    }
                    return imgurl;

                } catch (e) {
                    alert(e.message);
                }
            },
            GetBridgelink: function(type) {
                //  return "http://weixin.mysoft.net.cn?oid=0C915577-A719-4DDE-0009-000000000000&type=4&istop=4&fromopenid=ocp8guO30HJCa4u3yrHMEPvstlOU";
                var host = location.href;
                var url = "";
                try {
                    if (host.toLowerCase().match("openid") != null || host.toLowerCase().match("projectinfo.html") != null || host.toLowerCase().match("projectinfodetail.aspx") != null || host.toLowerCase().match("firstpage.aspx") != null) {

                        url = host;
                    }
                    else {
                        if (host.match("\\?") != null) {
                            url = host + "&openid=" + getParam.GetLiveOpenid();
                        }
                        else {
                            url = host + "?openid=" + getParam.GetLiveOpenid();
                        }
                    }

                    if (url.toLowerCase().match("convenienceservices.aspx") != null) {

                        if (url.toLowerCase().match("convenienceservicesguid") != null) {
                            var reg = new RegExp("(&)convenienceservicesguid=([^&]*)(&|$)", "i");
                            url = url.toLowerCase().replace(reg, "");
                            var ConvenienceServicesGUID = "&ConvenienceServicesGUID=" + $("#BridgeconvenienceServicesGUID").val();
                            url = url + ConvenienceServicesGUID;
                        }
                        else {
                            url = url + "&ConvenienceServicesGUID=" + $("#BridgeconvenienceServicesGUID").val();
                        }

                    }
                  
                    //添加分享来源标示
                    if (host.toLowerCase().match("sharesource") == null) {


                        if (url.match("\\?") != null) {
                            //因为listview.aspx最后会在页面上的参数加#,在页面上处理比较麻烦，改在分享时将分享type插入中间

                            if (host.toLowerCase().match("listview.aspx") != null) {

                                url = url.replace(getParam.GetLiveOpenid(), getParam.GetLiveOpenid() + "&sharesource=" + type);
                            
                            } else {

                               url = host + "&sharesource=" + type;
                            }

                        }
                        else {
                            url = host + "?sharesource=" + type;
                        }
                    }

                  
                } catch (e) {
                    alert(e.message);
                }
                return url;
            },
            GetBridgetitle: function() {
                // return "万科家书";

                var url = location.href;
                if (url.toLowerCase().match("projectinfodetail.aspx") != null) {
                    return "在售项目";
                }
                if (url.toLowerCase().match("vankeLattermenu.aspx") != null || url.toLowerCase().match("vankelatterconstructionschedule.aspx") != null) {
                    return "万科家书";
                }

                if (url.toLowerCase().match("catalogue.aspx") != null || url.toLowerCase().match("listview.aspx") != null) {
                    return "广州万科万客会";
                }

                if (url.toLowerCase().match("customeractivity.aspx") != null) {
                    return "客户活动";
                }
                return getParam.GetEnumtype();
            },
            GetBridgedesc: function() {
                // return "万科家书";
                var url = location.href;
                if (url.toLowerCase().match("listview.aspx") != null || url.toLowerCase().match("catalogue.aspx") != null) {
                    return getParam.GetEnumtype();
                }
                if (url.toLowerCase().match("firstpage.aspx") != null) {
                    return "万客会操作指引"
                }

                return $("#Bridgedesc").val();

            },
            GetLiveOpenid: function() {
            if ($("#openid").text().trim() == "") {
                    return getQueryString("openid");
                }
                return $("#openid").text().trim();
            },
            GetEnumtype: function() {
                //
                var type = getQueryString("type");

                if (type != null) {
                    switch (type) {
                        case "1": return "在售项目";
                        case "2": return "优惠活动";
                        case "3": return "购房指引";
                        case "4": return "万科家书";
                        case "5": return "房屋保养";
                        case "6": return "会员信息";
                        case "7": return "产证查询";
                        case "8": return "房屋报修";
                        case "9": return "客户活动";
                        default:
                            return "广州万科万客会";
                    }
                } else {
                    type = getQueryString("pagecode");
                    switch (type) {
                        case "Valmont": return "优惠活动";
                        case "HouseKnowledge": return "购房指引";
                        case "HousingMaintain": return "房屋保养";
                        case "CustomerActivity": return "客户活动";
                        default:
                            return "广州万科万客会";
                    }

                }
            }

        };
        var appId = "";
        var fakeid = "";

        // 发送给好友;
        WeixinJSBridge.on('menu:share:appmessage', function(argv) {

            WeixinJSBridge.invoke('sendAppMessage', {
                "appid": appId,
                "img_url": getParam.GetBridgeimg_url(),
                "img_width": "640",
                "img_height": "640",
                "link": getParam.GetBridgelink("appmessage"),
                "desc": getParam.GetBridgedesc(),
                "title": getParam.GetBridgetitle()
            }, function(res) {
            });
        });

        // 分享到朋友圈;
        WeixinJSBridge.on('menu:share:timeline', function(argv) {
            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": getParam.GetBridgeimg_url(),
                "img_width": "640",
                "img_height": "640",
                "link": getParam.GetBridgelink("timeline"),
                "desc": getParam.GetBridgedesc(),
                "title": getParam.GetBridgetitle()
            }, function(res) {
            });

        });

        // 分享到微博;
        var weiboContent = '';
        WeixinJSBridge.on('menu:share:weibo', function(argv) {

            WeixinJSBridge.invoke('shareWeibo', {
                "content": getParam.GetBridgedesc(),
                "url": getParam.GetBridgelink("weibo")
            }, function(res) {

            });
        });

        // 分享到Facebook
        WeixinJSBridge.on('menu:share:facebook', function(argv) {
            report(link, fakeid, 4);
            WeixinJSBridge.invoke('shareFB', {
                "img_url": getParam.GetBridgeimg_url(),
                "img_width": "640",
                "img_height": "640",
                "link": getParam.GetBridgelink("facebook"),
                "desc": getParam.GetBridgedesc(),
                "title": getParam.GetBridgetitle()
            }, function(res) { });
        });

        // 新的接口
        WeixinJSBridge.on('menu:general:share', function(argv) {
            var scene = 0;
            switch (argv.shareTo) {
                case 'friend': scene = 1; break;
                case 'timeline': scene = 2; break;
                case 'weibo': scene = 3; break;
            }
            argv.generalShare({
                "appid": "",
                "img_url": getParam.GetBridgeimg_url(),
                "img_width": "640",
                "img_height": "640",
                "link": getParam.GetBridgelink("share"),
                "desc": getParam.GetBridgedesc(),
                "title": getParam.GetBridgetitle()
            }, function(res) {

            });
        });

        // get network type
        var nettype_map = {
            "network_type:fail": "fail",
            "network_type:edge": "2g",
            "network_type:wwan": "3g",
            "network_type:wifi": "wifi"
        };
        if (typeof WeixinJSBridge != "undefined" && WeixinJSBridge.invoke) {
            WeixinJSBridge.invoke('getNetworkType', {}, function(res) {
                networkType = nettype_map[res.err_msg];
                initpicReport();
            });
        }
    }

    //    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
    //        // 通过下面这个API显示右上角按钮
    //        WeixinJSBridge.call('showOptionMenu');
    //    });

    if (typeof WeixinJSBridge == "undefined") {
        if (document.addEventListener) {
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        } else if (document.attachEvent) {
            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
        }
    } else {
        onBridgeReady();
    }
})();

                                   
 
   