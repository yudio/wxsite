(function (window, $) {
    var $page;
    $(function () { 
		var wbp = window.WBPage;
        wbp.PageData = {};
        var lid = wbp.Loader.append();
		WBPage.Loader.remove(lid);
		$(window).trigger('rendercomplete');
        $('html').addClass('RENDERCOMPLETE');

      /*
        //1.获取当前页面类型
        var struc_type = window.WBPage.getWBData('type');
        var noweb = !!(window.WBPage.getWBData('noweb') === 'true');//页面是否使用微网站dom结构
        //如果页面不是用微网站dom结构，则直接加载指定得处理器
        if (noweb) {
            WBPage.Loader.remove(lid);
            //加载对应的类型处理器
            if (struc_type) {
               
                    $(window).trigger('rendercomplete');
                    $('html').addClass('RENDERCOMPLETE');
             
            }
            else {
                $(window).trigger('rendercomplete');
                $('html').addClass('RENDERCOMPLETE');
            }
            return;
        }*/
    });
})(window, jQuery);


