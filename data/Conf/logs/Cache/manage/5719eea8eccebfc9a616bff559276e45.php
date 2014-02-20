<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
	<meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/src/inside.js"></script>
<title>微盟（Weimob）—国内最大的微信公众服务平台</title>
	<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
    <!--[if lte IE 9]><script src="<?php echo RES;?>/src/watermark.js"></script><![endif]-->
	<!--[if IE 7]><link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet" /><![endif]-->
</head>
<body>
	
    <style type="text/css">
        input[type="radio"], input[type="text"], input[type="checkbox"] {
            margin: 0;
        }

        .s-amount .c2c-oper-default {
            border: 1px solid #8AB6DD;
            color: #8AB6DD;
            cursor: default;
        }

        .s-amount .minus {
            margin-right: 3px;
        }

        .s-amount .plus {
            margin-left: 5px;
        }

        .s-amount .count_control a {
            display: inline-block;
            width: 9px;
            height: 9px;
            line-height: 9px;
            text-align: center;
            background: #fff;
            font-family: arial;
            overflow: hidden;
            margin: 5px 0 0;
        }

        a {
            text-decoration: none;
        }

        .s-amount .text {
            display: inline-block;
            width: 28px;
            padding: 1px 3px;
            text-align: right;
            color: #666;
        }

        .c2c-text-default {
            border: 1px solid #8AB6DD;
        }

        .options-field {
            padding: 10px;
        }

            .options-field span {
                padding-left: 10px;
            }

        .coupon-field {
            padding-bottom: 20px;
            border-bottom: 1px dashed #d1d1d1;
            padding-left: 10px;
        }

        .invoice-field {
            overflow: hidden;
            padding-left: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #d1d1d1;
        }

        .invoice_float {
            float: left;
            margin-right: 10px;
        }

        .purchase .total {
            float: right;
            font-size: 12px;
            margin: 10px 0 20px 0;
            color: #000;
        }

            .purchase .total table {
                border-bottom: 2px solid #c9c9c9;
            }

            .purchase .total th.item {
                padding-left: 40px;
            }

            .purchase .total th {
                height: 25px;
            }

        .total table th {
            color: #333;
        }

        .purchase .total th.price {
            width: 60px;
            padding-right: 10px;
            text-align: right;
        }

        .purchase .payment {
            float: right;
            padding-left: 12px;
            padding-top: 10px;
            font-size: 14px;
            color: #333;
        }

        .purchase span.total-price {
            font-size: 24px;
            font-family: Tahoma,Arial, sans-serif;
            color: #f63;
            display: inline-block;
            font-weight: 800;
        }

        .purchase p.vip_agreement {
            margin-top: 10px;
        }

        .gift_month {
            margin-right: 20px;
            float: right;
            font-size: 12px;
            font-weight: lighter;
        }

        .count_control {
            float: left;
            padding: 10px 0;
        }
    </style>
<body>
    <div id="main">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">

                    <div class="box">
                        <div class="box-title">
                            <div class="span8">
                                <h3><i class="icon-table"></i>增值包 <small>勾选后才会购买</small></h3>
                            </div>

                        </div>

                        <div class="box-content">

                            <form action="/alipay/api" method="post" class="form-horizontal">
								<input type="hidden" name="type" value="2"/>
                                <table id="listTable" class="table table-bordered table-hover dataTable">
                                    <thead>
                                        <tr>
                                            <th class='with-checkbox'></th>
                                            <th class="span4">增值包</th>
                                            <th class="span4">套餐类型</th>
                                            <th class="span4">金额</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class="with-checkbox">
                                            <input type="checkbox" name="service_id" value="100" class="packages_ck" /></td>
                                        <td>短信增值包</td>
                                        <td>
                                            <select name="pay_type" class="packages">
                                                <option value="0">请选择</option>
												                                                <option value="100" data-money="100">A套餐：1000条/100元</option>
												                                                <option value="180" data-money="180">B套餐：2000条/180元</option>
												                                                <option value="250" data-money="250">C套餐：3000条/250元</option>
												                                                <option value="400" data-money="400">D套餐：5000条/400元</option>
												                                            </select></td>
                                        <td><span class="packages_wr">0元</span></td>
                                    </tr>

                                </table>

                                <div class=" purchase">
                                    <div class="total">


                                        <div class="payment">
                                            应付总价: <span class="total-price">0</span>元
                                        </div>
                                        <div style="clear: both"></div>
                 
										<div class="payment">
                                            <img id="pay_btn" class="cursor_p" src="img/pay/btn_buy.jpg" style="max-height: 27px" />
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $("select.packages").change(function () {
                var $this = $(this), $select = $(this).find("option:selected"), money = $select.data("money");
                var _tmp_pr = "{0}元";
                var tr = $this.parents("tr");
                if (money) {
                    tr.find("span.packages_wr").text(_tmp_pr.format(money));
                    if (tr.find("input.packages_ck")[0].checked) {
                        caculateTotalPrice();
                    }
                }
            });
            $("input.packages_ck").on("change", function () {
                caculateTotalPrice();
            });
            function caculateTotalPrice() {
                var $p = 0;
                var $idsCheck = $("#listTable input.packages_ck");
                $idsCheck.each(function (k, v) {
                    if (v.checked) {
                        var $select = $(this).parents("tr").find("select.packages").find("option:selected"), money = $select.data("money");
                        if (money) {
                            $p += money;
                        }
                    }
                });
                $("span.total-price").text($p);
                return $p;
            };
            $("#pay_btn").click(function () {
                var p = caculateTotalPrice();
                if (p <= 0) {
                    G.ui.tips.info("请选择增值包 后勾选");
                    return false;
                } else {
                    var form1 = $("form"), action = form1.attr("action"); 
                    OpenWindowWithPost(action, "buy", form1.serializeArray())
                    $.fallr('show', {
                        buttons: {
                            button1: {
                                text: '支付成功', danger: true, onclick: function () {
                                    window.top.location.reload();
                                }
                            },
                            button2: {
                                text: '重新下单'
                            }
                        },
                        content: '<p>请您在新打开的页面完成支付</p>',
                        icon: 'window',
                        closeOverlay: false,
                        position: "center",
                        useOverlay: true
                    });
                }
            }) 
            function OpenWindowWithPost(url, name, params) {
                var form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", url);
                form.setAttribute("target", name); 
                for (var i in params) { 
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = params[i].name;
                    input.value = params[i].value;
                    form.appendChild(input);
                }
                document.body.appendChild(form); 
                form.submit();
                document.body.removeChild(form);
            }
        })

    </script>
</body>
</body>
</html>