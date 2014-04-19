$(window).on('rendercomplete', function () {
     $('.m_weixin').parent().on('tap', function () {
		 alert('on');
		 $.OpenPopUp('微信二维码', htmls, '#282828', function () {
                    $('#popUp').css({'position': 'absolute'});
                    $(window).scrollTop(0);
                    $('.tpl-back').on('tap', function () {
						alert('1');
                        $.ClosePopUp();
                    });
                });
	 });

	  $('.tpl-to-mark').on('tap', function () {
		  alert('on');
		 $.OpenPopUp('微信二维码', htmls, '#282828', function () {
                    $('#popUp').css({'position': 'absolute'});
                    $(window).scrollTop(0);
                    $('.tpl-back').on('tap', function () {
						alert('2');
                        $.ClosePopUp();
                    });
                });
	 });


});
