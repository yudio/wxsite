<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="Keywords" content="奈斯、奈斯伙伴、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销"/>
    <meta name="Description" content="奈斯伙伴，福建最大的微信公众智能服务平台，八大微信利器：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。"/>
    <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico?v=2014-02-20-1"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css?2014-02-20-1" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/inside.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js?2014-02-20-1"></script>
    <script type="text/javascript"
            src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js?2014-02-20-1"></script>
    <title>奈斯伙伴（Weimob）—国内最大的微信公众服务平台</title>
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css?v=2014-02-20-1" rel="stylesheet"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="<?php echo RES;?>/js/excanvas_min.js?v=2014-02-20-1"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/js/watermark.js?v=2014-02-20-1"></script>
    <![endif]-->
</head>

<style>
    .i-cont {
        color: #FFF;
        position: relative;
        width: 30px;
        padding: 5px;
    }

    .i-cont .sel-icon {
        color: #FFF;
    }

    .i-cont i {
        font-size: 30px;
    }
</style>

<body>
<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-title">
                        <div class="span12">
                            <h3>
                                <i class="icon-table"></i>分类管理
                                <small>设置好分类，新建图文回复，编辑的时候就可以选择分类，系统会自动生成一个3G网站。</small>
                            </h3>
                            <a class="btn preview pull-right btn-success" href="javascript:void(0);">微官网预览</a>
                            <script type="text/javascript">
                                $("a.preview").click(function () {
                                    if ($.browser.msie) {
                                        alert("不支持在IE浏览器下预览，建议使用谷歌浏览器或者360极速浏览器或者直接在微信上预览。");
                                        return;
                                    }

                                    var left = ($(window.parent.parent).width() - 450) / 2;
                                    window.open("http://yudio.xicp.net/wechat.wx/<?php echo ($token); ?>?wechatid=fromUsername", "我的微官网", "height=650,width=450,top=0,left=" + left + ",toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no");
                                });
                            </script>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="row-fluid">
                            <div class="span8 control-group">
                                <a href="/npManage/microsite/addclassify.act" class="btn"><i class="icon-plus"></i>添加分类</a>
                            </div>
                        </div>
                        <div class="row-fluid dataTables_wrapper">
                            <table id="listTable" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th class="span3">分类名称</th>
                                    <th class="span2">首页展示效果</th>
                                    <th class="span1">首页可见性</th>
                                    <th class="span1">显示顺序</th>
                                    <th class="span1">事件类型</th>
                                    <th class="span2">事件行为</th>
                                    <th class="span2">操作</th>
                                </tr>
                                </thead>
                                <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($vo["name"]); ?></td>
                                    <td><i class="<?php echo ($vo["icon"]); ?>"></i></td>
                                    <td><?php if($vo["status"] == '1'): ?><span class="label label-satgreen">显示</span><?php else: ?>隐藏<?php endif; ?></td>
                                    <td><?php echo ($vo["sorts"]); ?></td>
                                    <td><?php echo ($vo["type"]); ?></td>
                                    <td><?php echo ($vo["info"]); ?></td>
                                    <td><a href="/npManage/microsite/editclassify.act?id=<?php echo ($vo["id"]); ?>" class="btn">编辑</a><a
                                            href="javascript:G.ui.tips.confirm('确定要删除吗？', '/npManage/microsite/classify_del.act?id=<?php echo ($vo["id"]); ?>');"
                                            class="btn">删除</a></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    window.document.onkeydown = function (e) {
        if ('' == document.activeElement.id) {
            var e = e || event;
　 				var currKey = e.keyCode || e.which || e.charCode;
            if (8 == currKey) {
                return false;
            }
        }
    };
</script>
</html>