/*
 by suolan

 */

//var dataBasePath = 'http://wt.bama555.com';     //本地测试路径
var dataBasePath = '';
var effectPlugBasePath = '/assets/public/js/effect';

$('html').css({'visibility':'hidden'});

//1.WeiBaUI
(function (window, $) {
    window.WBPage = {};

    $(function () {
        /**
         * 添加分享按钮点击支持
         */
        $('body').on('touchend','.weiba-button-share', function () {

            var m = WBPage.MaskLayer.show('black');
            var z = WBPage.MaskLayer.getZIndex();
            var htmls = '<div class="weiba-layer-sharehelper" style="z-index: ' + (z + 1) + '"></div>';
            m.after(htmls);

            $('.weiba-layer-sharehelper').on('touchend', function () {

                WBPage.MaskLayer.close();
                $(this).remove();
            });
        })
    });


    

    $.extend(window.WBPage, {
        'hasRender': function () {
            return ($('html').hasClass('RENDERCOMPLETE'));
        },
        /**
         * 返回
         */
        'goBack': function () {
            var agent = window.navigator.userAgent.toLowerCase();
            if (agent.indexOf('android') > -1) {
                var history = $.parseJSON(window.sessionStorage.getItem('historyUrl')),
                    len = history.length,
                    thisUrl = window.location.href;
                if (len > 1) {
                    if (thisUrl != history[len - 2]) {
                        history.pop();
                        window.sessionStorage.setItem('historyUrl', JSON.stringify(history));
                        window.location.href = history[len - 2];
                    }
                } else {
                    window.location.href = (window.WBPage.Info.home);
                }
            } else {
                if (window.history.length <= 1) {
                    window.location.href = (window.WBPage.Info.home);
                } else {
                    window.history.back();
                }
            }
        },

        'getWBData': function (name) {
            return $('body').getWBData(name);
        },
        'show': function () {
            $('.weiba-page').show();
        },
        'hide': function () {
            $('.weiba-page').hide();
        },

        'info_init': function (info) {
            var status = -1;

            if (info && info['status'] !== undefined) {
                status = info.status;
            }
            $.extend({
                home: '', name: '微信网站'
            }, info);

            if (status == 0) {
                window.WBPage.Info = {
                    'home': info['url'],
                    'name': info['company']
                };
            } else {
                var msg = '';
                switch (status) {
                    case 1 :
                        msg = '微网站已经被禁用，请联系代理商。';
                        break;
                    case 2 :
                        msg = '微网站已经被删除，请联系代理商。';
                        break;
                    case 3 :
                        msg = '微网站已经被过期，请联系代理商。';
                        break;
                    default :
                        msg = '微网站状态不正常，请联系代理商。';
                }
                alert(msg);
                document.write(msg);
            }
            return status;
        },

        /**
         * 初始化插件
         * @param name 插件名称
         */
        'widget_init': function (name) {
            switch (name) {
                case 'banner':
                    $('.weiba-banner').wb_ui_banner();
                    break;
                case 'navbar':
                    $('.weiba-navbar').wb_ui_navbar();
                    break;
                case 'quickpanel':
                    $('.weiba-quickpanel').wb_ui_quickpanel();
                    break;
                case 'easycall':
                    $('.weiba-easycall').wb_ui_easycall();
                    break;
                case 'listscroll':
                    $('.weiba-listscroll').wb_ui_list();
                    break;
                case 'select':
                    $('.weiba-select').wb_ui_select();
                    break;
                case 'datetime':
                    $('.weiba-datetime').wb_ui_datetime();
                    break;
                case 'date':
                    $('.weiba-date').wb_ui_date();
                    break;
                case 'time':
                    $('.weiba-time').wb_ui_time();
                    break;


            }
        },
        /**
         * 渲染模板数据
         */
        'tpl_render': function (data, directive) {
            $.each(directive, function (key, dir) {
                if (dir) {
                    var $t = $(key);
                    if ($t.length > 0) {
                        $(key).render(data, dir);
                    } else {
                        console.log('no target:', key);
                    }
                }
            });
        }
        
    });

    //扩展$对象
    $.fn.getWBData = function (name) {
        var dataname = 'weiba-' + name;
        return this.attr(dataname);
    };
})(window, jQuery);


//自定义插件
(function (window, $, undefined) {
    var $layer_mask, curZIndex = 9999;
    $.getUserInfo = function () {
        /**
         *填充姓名和电话
         */
        var wbp = WBPage.PageData;
        if (wbp) {

            var userinfo = WBPage.PageData['user'];
            if (userinfo) {
                var username = userinfo['name'];
                var usermobile = userinfo['mobile'];
                $('.weiba-user-name').val(username);
                $('.weiba-user-mobile').val(usermobile);
            } else {
                var url = WBPage.PATH_ACCOUNT_PAY
                var data = {
                    'uid': window.localStorage.getItem('MYUID')
                }
                $.getJSON(url, data, function (rs) {
                    if (rs['ret'] == 0) {
                        var username = rs['data']['name'];
                        var usermobile = rs['data']['mobile'];
                        $('.weiba-user-name').val(username);
                        $('.weiba-user-mobile').val(usermobile);
                    }
                })
            }

        }
    };
    $.fn.showDialog = function (arg) {
        $layer_mask = getMaskLayer().fadeIn();
        return this.each(function () {
            var $this = $(this).css({
                'z-index': curZIndex++
            }).css({
                    'bottom': -$(this).height()
                }).show().animate({
                    'bottom': 0
                },function () {
                    $layer_mask.one('click', function () {
                        $this.closeDialog();
                    });
                }).data('isOpened', true);
        });
    };

    $.fn.closeDialog = function () {
        return this.each(function () {
            var $this = $(this);
            if ($this.data('isOpened')) {
                $this.animate({
                    'bottom': -$this.height()
                },function () {
                    if ($layer_mask) {
                        $layer_mask.fadeOut(function () {
                            $layer_mask.remove();
                            $layer_mask = null;
                        });
                    }
                    $this.hide();
                }).data('isOpened', false);
            }
            ;
        });
    }

    $.fn.showHelper = function (arg) {
        $layer_mask = getMaskLayer().fadeIn();
        return this.each(function () {
            var $this = $(this).css({
                'z-index': curZIndex++
            }).fadeIn(function () {
                    $layer_mask.one('click', function () {
                        $this.closeHelper();
                    });
                }).data('isOpened', true);
        });
    }

    $.fn.closeHelper = function () {
        return this.each(function () {
            var $this = $(this);
            if ($this.data('isOpened')) {
                $this.hide(function () {
                    if ($layer_mask) {
                        $layer_mask.fadeOut(function () {
                            $layer_mask.remove();
                            $layer_mask = null;
                        });
                    }
                }).data('isOpened', false);
            }
            ;
        });
    }

    function getMaskLayer() {
        if (!$layer_mask) {
            $layer_mask = $('<div class="weiba-masklayer black"></div>').css({
                'z-index': (curZIndex - 1)
            }).appendTo('body');
        }
        return $layer_mask;
    }

    //显示一个Pop text=内容,$parent=显示在哪个元素旁边,pos=在什么位置
    $.popTip = function (text, $parent, pos, type) {
        var html = '<div class="Tip ' + (type ? type : '') + '"><div class="Text">' + text + '</div><div class="ICON"></div></div>';
        var $pop = $(html).appendTo('body');
        var $icon = $('.ICON', $pop);
        var top, left;
        if ($parent) {
            switch (pos) {
                case 'TopRight':
                    top = $parent.offset().top - $pop.height() - $icon.height();
                    left = $parent.offset().left + $parent.width() - $pop.width();
                    break;
                case 'BottomRight':
                    top = $parent.offset().top + $parent.height() + $icon.height();
                    left = $parent.offset().left + $parent.width() - $pop.width();
                    break;
                case 'BottomLeft':
                    top = $parent.offset().top + $parent.height() + $icon.height();
                    left = $parent.offset().left;
                    break;
                case 'TopLeft':
                    top = $parent.offset().top - $pop.height() - $icon.height();
                    left = $parent.offset().left;
                    break;
                case 'Center':
                default:
                    pos = 'Center';
                    top = $parent.offset().top + ($parent.height() - $pop.height()) / 2;
                    left = $parent.offset().left + ($parent.width() - $pop.width()) / 2;
                    $icon.hide();
                    break;
            }
        }
        else {
            $icon.hide();
            top = '50%';
            left = '50%';
            $pop.css({
                'position': 'fixed',
                'margin-left': -$pop.width() / 2 + 'px',
                'margin-right': -$pop.height() / 2 + 'px'
            });
        }
        $pop.addClass(pos).css({
            'top': top,
            'left': left
        }).fadeIn(function () {
                window.setTimeout(function () {
                    $pop.fadeOut(function () {
                        $pop.remove();
                        $pop = null;
                    });
                }, 800);
            });

    };

    //显示一个警告Pop
    $.popWaningTip = function (text, $parent, pos) {
        $.popTip(text, $parent, pos, 'Warning')
    };

    $Loadings = {};
    //显示一个Loadding($cover = loading要遮挡的区域,默认是body)
    $.showLoading = function ($cover) {
        if (!$cover) {
            $cover = $('body');
        }
        var id = 'LOADING' + Math.round(Math.random() * 8000000 + 1000000);
        $Loadings[id] = $('<div class="System-Loading"><div class="BG"></div><div class="ICON"></div></div>').show().appendTo($cover);
        return id;
    };

    $.hideLoading = function (id) {
        if ($Loadings[id]) {
            $Loadings[id].hide();
            $Loadings[id].remove();
            $Loadings[id] = null;
            delete $Loadings[id];
        }
    };


    /**
     ** author : zhupinglei ;  desc : 侧边滑入式弹框
     ***************************************************
     ** $.OpenPopUp : 打开弹框
     ** tit : 标题
     ** str : popCon显示内容
     ** colors : 主色调
     ** callback : 弹框完全出现后的回调函数
     ***************************************************
     ** $.ClosePopUp : 关闭弹框
     ** $.PopUpCheck : 沟选回调
     ***************************************************
     ** $.OpenPopTips : 弹框内的消息提示框
     ** txt : 消息内容
     ** time : 消息显示的时间 单位为 ms
     ***************************************************
     **/

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
            '#popUp .popTit{height:45px; line-height:45px; overflow:hidden; background:' + colors + '; color:#fff; text-align:center; font-weight:bold; font-size:20px; position:relative;}' +
            '#popUp .popTit i{position:absolute; top:8px; width:29px; height:29px; overflow:hidden;}' +
            '#popUp .popTit i.back{left:10px; background:url(/tpl/static/img/vcard/back.png) no-repeat; background-size:29px 29px;}' +
            '#popUp .popTit i.check{right:10px; background:url(/tpl/static/img/vcard/check.png) no-repeat; background-size:29px 29px;}' +
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

})(window, jQuery, undefined);


//Loader
(function (window, $) {
    var $loader, loader_ids = {};

    window.WBPage.Loader = {
        /**
         * 添加显示一个loader,并返回loaderid
         */
        'append': function () {
            $('html').css({'visibility':'hidden'});
            if (!$loader) {
                var zindex = WBPage.MaskLayer.getZIndex() + 1;
                if (zindex < 999) {
                    zindex = 999999;
                }
                $loader = $('<div class="weiba-loader" style="z-index: ' + zindex + '"></div>').appendTo('body');
            }
            $loader.show();
            return getNewLoaderID();
        },
        /**
         * 完成删除loader
         */
        'remove': function (id) {
            if (loader_ids.hasOwnProperty(id)) {
                delete loader_ids[id];
            }
            if (WBPage.Loader.getAllIds().length == 0) {
                $loader.css('display', 'none');
            }
            $('html').css({'visibility':'visible'});
        },
        /**
         * 删除所有loader
         */
        'removeAll': function () {
            loader_ids = {};
            $loader.hide();
            $('html').css({'visibility':'visible'});
        },
        /**
         * 返回正在执行的所有loaderid
         */
        'getAllIds': function () {
            var ids = [];
            $.each(loader_ids, function (key, value) {
                ids.push(key);
            });
            return ids;
        }
    };


    function getNewLoaderID() {
        var loaderid = 'weiba_loaders_' + Math.round(Math.random() * 8000000 + 1000000);
        if (!loader_ids.hasOwnProperty(loaderid)) {
            loader_ids[loaderid] = true;
            return loaderid;
        }
        else {
            return getNewLoaderID();
        }
    }


})(window, jQuery);


//MaskLayer
(function (window, $) {
    var $masklayer;
    window.WBPage.MaskLayer = {
        'show': function (color) {
            if (!$masklayer) {
                $masklayer = $('<div class="weiba-masklayer"></div>').addClass(color ? color : '');
            }
            return $masklayer.hide().appendTo('body').fadeIn();
        },
        'close': function () {
            if ($masklayer) {
                $masklayer.fadeOut(function () {
                    $masklayer.off();
                    $masklayer.unbind();
                    $masklayer.remove();
                    $masklayer = null;
                });
            }
        },
        'getZIndex': function () {
            if ($masklayer) {
                return $masklayer.css('z-index');
            }
            else {
                return 0;
            }
        }
    };


})(window, jQuery);





