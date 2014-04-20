//自定义插件
//(function (window, $, undefined) {
(function (window, $) { 
	$.ClosePopUp = function () {
        if ($('#popUp').size()) {
            $('#popUp').css({'webkitTransform': 'translateX(' + parseInt($(window).width() + 2) + 'px)'});
            setTimeout(function () {
                $('#popUpCss').size() ? $('#popUpCss').remove() : '';
                $('#popUp').size() ? $('#popUp').remove() : '';
            }, 400);
        }
    }
    $.PopUpCheck = function(callback){
        if ($('#popUp').size()) {
            $('#popUp i.check').on('tap',function(){
                callback();
            })
        }
    }
    $.OpenPopTips = function (txt, time) {
        if ($('#popUp').size()) {
            $('#popUp .error').html(txt).show();
            setTimeout(function () {
                $('#popUp .error').hide().html('');
            }, time);
        }
    }
    $.OpenPopUp = function (tit, str, colors, callback) {
        $('#popUpCss').size() ? $('#popUpCss').remove() : '';
        $('#popUp').size() ? $('#popUp').remove() : '';
        var str = '<style id="popUpCss">' +
            '#popUp{position:fixed; left:0; top:0; z-index:999999; width:100%; height:100%; background:#eaebee; box-shadow:0px -1px 2px #333; -webkit-transform: translateX(' + parseInt($(window).width() + 2) + 'px);-webkit-transition: -webkit-transform 400ms ease;}' +
            '#popUp .popTit{height:45px; line-height:45px; overflow:hidden; background:#282828; color:#fff; text-align:center; font-weight:bold; font-size:20px; position:relative;}' +
            '#popUp .popTit i{position:absolute; top:8px; width:29px; height:29px; overflow:hidden;}' +
            '#popUp .popTit i.back{left:10px; background:url(../../img/vcard/back.png) no-repeat; background-size:29px 29px;}' +
            '#popUp .popTit i.check{right:10px; background:url(../../img/vcard/check.png) no-repeat; background-size:29px 29px;}' +
            '#popUp .popCon{border:1px solid #dbdbdb; background:#fff; margin:10px; overflow:hidden;}' +
            '#popUp input{border-radius:0;}' +
            '#popUp input[type=text],#popUp input[type=password]{display:block;width:88%;border:none;border-bottom:1px solid #ccc;height:15px;line-height: 15px;overflow: hidden;padding:12px 10% 12px 2%;font-size:15px;margin:0;}' +
            '#popUp .error{margin:0; background:#8c040e; color:#fff; opacity:0.7; width:90%; padding:5px 5%; position:absolute; top:45px; left:0; display:none;}' +
            '</style>' +
            '<div id="popUp">' +
            '<div class="popTit">' +
            '<i class="back"></i><span>' + tit + '</span><i class="check"></i>' +
            '</div>' +
            '<div class="popCon">' + str + '</div>' +
            '<p class="error"></p>' +
            '</div>';
        $('body').append(str);
        setTimeout(function () {
            $('#popUp').css({'webkitTransform': 'translateX(0px)'});
        }, 0);
        setTimeout(function () {
            $('#popUp .popTit i.back').on('touchend', function () {
                setTimeout(function () {
                    $.ClosePopUp();
                }, 400);
            });
            if (typeof callback === 'function') {
                callback();
            }
        }, 400);
    }
})(window, jQuery);
//})(jQuery);
//})(window, jQuery, undefined);