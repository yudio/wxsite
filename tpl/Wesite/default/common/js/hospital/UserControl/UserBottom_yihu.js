$(function () {
    if (weixintoolbar == "0") {
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
    }

    if (IsMenuTopList == "1") {
        $("#menuTopListNew").show();
    }
    if (IsBackUrlButton == "1") {
        $("#backUrlButtonNew span").attr("class", "backtb");
        $("#backUrlButtonNew").bind("click", function () {
            if (preurl != "" && preurl != "test.aspx") {
                window.location.href = GetUrlByAddParam(AdditionalParam, preurl);
            }
        });
    }
});

function ToDefault() {
    if (defaulturl != "") {
        if (SourceId == "1023999") {
            window.location.href = "http://specialhospital.yihu.com/hospital/default.aspx?hospitalid=1023999&platformType=0&sourceType=1&sourceId=1023999";
        }
        else {
            window.location.href = GetUrlByAddParam(AdditionalParam, defaulturl);
        }
    }
}