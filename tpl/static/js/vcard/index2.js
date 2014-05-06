$(window).on('rendercomplete', function () {
     $('.m_weixin').parent().on('tap', function () {
		 $.OpenPopUp('微信二维码', htmls, '#282828', function () {
                    $('#popUp').css({'position': 'absolute'});
                    $(window).scrollTop(0);
                    $('.tpl-back').on('tap', function () {
                        $.ClosePopUp();
                    });
                });
	 });

	  $('.tpl-to-mark').on('tap', function () {
		 $.OpenPopUp('微信二维码', htmls, '#282828', function () {
                    $('#popUp').css({'position': 'absolute'});
                    $(window).scrollTop(0);
                    $('.tpl-back').on('tap', function () {
                        $.ClosePopUp();
                    });
                });
	 });


});
