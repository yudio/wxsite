$(window).on('rendercomplete', function () {
    new businesscard();
});

function businesscard() {
    this.init();
}

businesscard.prototype = {
    init: function () {
        this.change_top_height();
        this.custom_list();
        this.show_mark();
    },
    change_top_height: function () {

        setTimeout(function () {

            var w = $('.card-top').width();
            $('.card-top').height(w / 2);

        }, 1);

    },
    custom_list: function () {
        var wbp = window.WBPage;
        if (wbp) {
            var rs = wbp.PageData['businesscard'];
            var footer=wbp.PageData['footer'];
            var info=wbp.PageData['info'];
            if (rs) {
                $('title').html(rs['name'] + '的名片');
                $('.top-company-text').html(rs['company_name']);
                $('.top-company-href').attr('href','/');
                $('.jishuzhichi').html(footer['support']['title']);
                $('.jishuzhichi').attr('href',footer['support']['href']);
                $('.weiba-name').html(info['web_name']);

                var rc = rs['config'];

                for (var i  in rs['config']) {
                    var rc = rs['config'][i];
                    switch (rc['name']) {
                        case 'm_department':
                            $('.tpl-bc-depart').html(rc['value']);
                            break;
                        case 'm_port':
                            $('.tpl-bc-post').html(rc['value']);
                            break;
                        case 'm_port':
                            $('.tpl-bc-post').html(rc['value']);
                            break;
                        case 'm_sign':
                            $('.tpl-bc-sign').html(rc['value']);
                            break;
                        default:
                            var rss = {};
                            rss['text'] = rc['text'] + ':';
                            rss['val'] = rc['value'];
                            rss['name'] = rc['name'];
                            this.custom_view(rss);
                            break;

                    }

                }
                ;

            }
        }
    },
    custom_view: function (rs) {
        var wbp = window.WBPage;
        var $this = this;
        var mark = 'http://api.map.baidu.com/marker';
        var htmls = '';
        htmls += '<li class="card-content-item ">';
        htmls += '<span class="card-content-item-tips ' + rs['name'] + '"></span>';
        if (rs['name'].indexOf('m_custom') > -1) {
            htmls += ' <div class="card-content-item-wz">' + rs['text'];
        }


        switch (rs['name']) {
            case 'm_mobile':
                htmls += ' <a href="tel:' + rs['val'] + '" class="blud-font">' + rs['val'] + '</a>';
                htmls += '<span class="card-content-item-left-arrow"></span>';
                break;
            case 'm_tele':
                htmls += ' <a href="tel:' + rs['val'] + '" class="blud-font">' + rs['val'] + '</a>';
                htmls += '<span class="card-content-item-left-arrow"></span>';
                break;
            case 'm_email':
                htmls += ' <a href="mailto:' + rs['val'] + '" class="blud-font">' + rs['val'] + '</a>';
                htmls += '<span class="card-content-item-left-arrow"></span>';
                break;
            case 'm_weixin':
                htmls += ' <a class="blud-font">' + rs['val'] + '</a>';
                htmls += '<span class="card-content-item-left-arrow"></span>';
                break;
            case 'm_weibo':
                htmls += ' <a href="' + rs['val'] + '" class="blud-font">' + rs['val'] + '</a>';
                htmls += '<span class="card-content-item-left-arrow"></span>';
                break;
            case 'm_address':
                if (wbp) {
                    var rss = wbp.PageData;
                    var lat = rss['businesscard']['company_lat'],
                        lng = rss['businesscard']['company_lng'],
                        name = rss['businesscard']['company_name'],
                        address = rss['businesscard']['company_name'];
                    if (lat && lng) {
                        var url = mark;
                        url += '?location=' + lat + ',' + lng + '&title=' + name + '&name=' + name + '&content=' + address + '&output=html&src=weiba|weiweb'
                        htmls += ' <a href="' + url + '" class="blud-font">' + rs['val'] + '</a></div>';
                    } else {
                        htmls += rs['val'] + '</div>';
                    }
                    htmls += '<span class="card-content-item-left-arrow"></span>';
                }
                break;
            default :
                htmls += rs['val'];
                if (rs['name'].indexOf('m_custom') > -1) {
                    htmls += '</div>';
                }
                break;
        }


        htmls += '</li>';
        $('.page-bc-con-view').append(htmls);
        if (rs['name'] == 'm_weixin') {
            $this.show_weixin(rs['val']);
        }
        setTimeout(function(){
            $('.card-content-item ').each(function(){
                var now_h=parseInt($(this).height());
                if(now_h>42)
                {
                    $(this).attr('class','card-content-item-over');

                }

            })

        },1);

    },
    show_mark: function () {
        $('.tpl-to-mark').on('tap', function () {
            var wbp = window.WBPage;
            if (wbp) {
                var footer=wbp.PageData['footer'];
                var info=wbp.PageData['info'];
                var htmls = '';
                htmls += '<div class="bc-mark-page">';
                htmls += '<div class="bc-mark">';
                //htmls += '<div class="bc-mark-img"><img src="' + wbp.PageData['businesscard']['qrcode'] + '" class=""></div>';
				htmls += '<div class="bc-mark-img"><img src="http://c.bama555.com/images/516b5da18fb56034/000/00/0087/bcard_87.png" class=""></div>';
                htmls += '<div class="bc-mark-tips">用微信“扫一扫”上面的二维码图案，直接将名片信息保存至您的手机通讯录。</div>';
                htmls += '</div>';
                htmls += '<div class="weiba-frame-share">';
                htmls += '<a  class="but first-but tpl-back">';
                htmls += '<span class="card-btn-tip bc_index"></span>';
                htmls += '<span class="card-btn-font">';
                htmls += '查看微名片';
                htmls += '</span>';
                htmls += '</a>';
                htmls += '<a href="/" class="but">';
                htmls += '<span class="card-btn-tip card-btn-index"></span>';
                htmls += '<span class="card-btn-font">';
                htmls += ' 企业微网站';
                htmls += '</span>';
                htmls += '</a>';
                htmls += ' </div>';
                htmls += '<div class="bottom-box">';
                htmls += '<div class="bottom-top">微名片-微信时代您的新名片</div>';
                htmls += '<div class="bottom-bottom">';
                htmls += '&copy2013 <a class="weiba-name">'+info['web_name']+'</a>';
                htmls += '</div>';
                htmls += '<div class="bottom-bottom">技术支持 <a class="blud-font"  href="'+footer['support']['href']+'">'+footer['support']['title']+'</a></div>';
                htmls += '</div>';
                htmls += '</div>';
                $.OpenPopUp('名片二维码', htmls, '#282828', function () {
                    $('#popUp').css({'position': 'absolute'});
                    $(window).scrollTop(0);
                    $('.tpl-back').on('tap', function () {
                        $.ClosePopUp();
                    })

                })

            }


        })
    },
    show_weixin: function (username) {

        $('.m_weixin').parent().on('tap', function () {
            var wbp = window.WBPage;
            if (wbp) {
                var footer=wbp.PageData['footer'];
                var info=wbp.PageData['info'];
                var code = 'http://open.weixin.qq.com/qr/code/?username=' + username;
                var htmls = '';
                htmls += '<div class="bc-mark-page">';
                htmls += '<div class="bc-mark">';
                htmls += '<div class="bc-mark-img"><img src="' + code + '" class=""></div>';
                htmls += '<div class="bc-mark-tips">用微信“扫一扫”上面的二维码图案，添加为微信好友。</div>';
                htmls += '</div>';
                htmls += '<div class="weiba-frame-share">';
                htmls += '<a  class="but first-but tpl-back">';
                htmls += '<span class="card-btn-tip bc_index"></span>';
                htmls += '<span class="card-btn-font">';
                htmls += '查看微名片';
                htmls += '</span>';
                htmls += '</a>';
                htmls += '<a href="/" class="but">';
                htmls += '<span class="card-btn-tip card-btn-index"></span>';
                htmls += '<span class="card-btn-font">';
                htmls += ' 企业微网站';
                htmls += '</span>';
                htmls += '</a>';
                htmls += ' </div>';
                htmls += '<div class="bottom-box">';
                htmls += '<div class="bottom-top">微名片-微信时代您的新名片</div>';
                htmls += '<div class="bottom-bottom">';
                htmls += '&copy2013 <a class="weiba-name">'+info['web_name']+'</a>';
                htmls += '</div>';
                htmls += '<div class="bottom-bottom">技术支持 <a class="blud-font" href="'+footer['support']['href']+'">'+footer['support']['title']+'</a></div>';
                htmls += '</div>';
                htmls += '</div>';
                $.OpenPopUp('微信二维码', htmls, '#282828', function () {
                    $('#popUp').css({'position': 'absolute'});
                    $(window).scrollTop(0);
                    $('.tpl-back').on('tap', function () {
                        $.ClosePopUp();
                    })

                })

            }


        })
    }

}