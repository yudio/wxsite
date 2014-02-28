<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
    <meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css?2014-02-20-1" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css?2014-02-20-1" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo STATICS;?>/inside.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/validation/jquery_validate_min.js?2014-02-20-1"></script>
    <script type="text/javascript"
            src="<?php echo RES;?>/src/plugins/validation/jquery_validate_methods.js?2014-02-20-1"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/plugins/form/jquery_form_min.js?2014-02-20-1"></script>
    <title>微盟（Weimob）—国内最大的微信公众服务平台</title>
    <link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico"/>
    <!--[if lte IE 9]>
    <script src="<?php echo RES;?>/src/watermark.js"></script><![endif]-->
    <!--[if IE 7]>
    <link href="<?php echo RES;?>/css/font_awesome_ie7.css" rel="stylesheet"/><![endif]-->
</head>
<body>

<div id="main">
<div class="container-fluid">

<div class="row-fluid">
<div class="span12">

<div class="box">
<div class="box-title">
    <div class="span8">
        <h3><i class="icon-table"></i>自定义菜单管理 </h3>
    </div>

</div>

<div class="box-content">
<div class="alert">
    <p>注意：1级菜单最多只能开启3个，2级子菜单最多开启5个!</p>

    <p>只有保存主菜单后才可以添加子菜单</p>

    <p>生成自定义菜单,必须在已经保存的基础上进行,临时勾选启用点击生成是无效的! 第一步必须先修改保存状态！第二步点击生成!</p>

    <p>当您为自定义菜单填写链接地址时请填写以"http://"开头，这样可以保证用户手机浏览的兼容性更好</p>

    <p>撤销自定义菜单：撤销后，您的微信公众帐号上的自定义菜单将不存在；如果您想继续在微信公众帐号上使用自定义菜单，请点击“生成自定义菜单”按钮，将重新启用！</p>
</div>
<div class="row-fluid">

    <div class="span8 control-group">
        <a href="javascript:void(0)" class="btn" id="add_menu"><i class="icon-plus"></i>添加主菜单</a>
    </div>

</div>

<div class="row-fluid dataTables_wrapper">
<form action="/npManage/menu/add.act" method="post" class="form-horizontal form-validate">
    <table id="listTable" class="table table-bordered table-hover dataTable">

        <thead>
        <tr>
            <th>显示顺序</th>
            <th>主菜单名称</th>
            <th>触发关键词或链接地址</th>
            <th>启用</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($wxmenu)): $i = 0; $__LIST__ = $wxmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><tr class="ptr">
            <td>
                <input type="text" class="input-mini" size="3" value="<?php echo ($menu["sort"]); ?>" name="ps[<?php echo ($menu["id"]); ?>][sort]"
                       data-rule-number="true"></td>
            <td>
                <input type="text" class="input-medium" size="15" value="<?php echo ($menu["name"]); ?>" name="ps[<?php echo ($menu["id"]); ?>][name]"
                       data-rule-required="true" data-rule-maxlength="30">
                <i class="icon-plus cursor_p add" title="添加子菜单" rel="<?php echo ($menu["id"]); ?>"></i>
            </td>
            <td>
                <input type="text" class="input-medium type" size="15" value="<?php echo ($menu["key"]); ?>" name="ps[<?php echo ($menu["id"]); ?>][key]"
                       data-rule-required="true" data-rule-maxlength="200">
                <input type="hidden" value="<?php echo ($menu["parent_id"]); ?>" name="ps[<?php echo ($menu["id"]); ?>][parent_id]">
                <input type="hidden" class="key_type" value="<?php echo ($menu["type"]); ?>" name="ps[<?php echo ($menu["id"]); ?>][type]">
            </td>
            <td>
                <input type="checkbox" name="ps[<?php echo ($menu["id"]); ?>][is_show]" value="1" <?php if($menu["is_show"] == 1): ?>checked="checked"<?php endif; ?>></td>
            <td><a href="javascript:G.ui.tips.confirm('您确定要删除此菜单吗?', '/npManage/menu/del.act?id=<?php echo ($menu["id"]); ?>');">删除</a>
            </td>
        </tr>
        <?php if(is_array($menu['submenu'])): $i = 0; $__LIST__ = $menu['submenu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subvo): $mod = ($i % 2 );++$i;?><tr class="ztr">
            <td>
                <input type="text" class="input-mini" size="3" value="11" name="ps[<?php echo ($subvo["id"]); ?>][sort]"
                       data-rule-number="true"></td>
            <td>
                <i class="board"></i>
                <input type="text" class="input-medium" size="15" value="<?php echo ($subvo["name"]); ?>" name="ps[<?php echo ($subvo["id"]); ?>][name]"
                       data-rule-required="true" data-rule-maxlength="30">

            </td>
            <td>
                <input type="text" class="input-medium type" size="15" value="<?php echo ($subvo["key"]); ?>" name="ps[<?php echo ($subvo["id"]); ?>][key]"
                       data-rule-required="true" data-rule-maxlength="200">
                <input type="hidden" value="<?php echo ($subvo["parent_id"]); ?>" name="ps[<?php echo ($subvo["id"]); ?>][parent_id]">
                <input type="hidden" class="key_type" value="<?php echo ($subvo["type"]); ?>" name="ps[<?php echo ($subvo["id"]); ?>][type]">
            </td>
            <td>
                <input type="checkbox" name="ps[<?php echo ($menu["id"]); ?>][is_show]" value="1" <?php if($subvo["is_show"] == 1): ?>checked="checked"<?php endif; ?>></td>
            <td><a href="javascript:G.ui.tips.confirm('您确定要删除此菜单吗?', '/npManage/menu/del.act?id=<?php echo ($subvo["id"]); ?>');">删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>

    </table>
    <div>
        <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-primary">保存</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="create_menu" type="button" class="btn btn-primary">生成自定义菜单</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button id="remove_menu" type="button" class="btn">撤销自定义菜单</button>

    </div>
</form>


<script type="text/javascript">
    $().ready(function () {
        var $add_menu = $("#add_menu");
        var $add_zmenu = $("i.add");
        var $menu_index = 0;


        $add_menu.click(function (e) {
            e.preventDefault();
            $menu_index++;
            var _menuPtrtmp = '<tr>'
                    + ' <td>'
                    + '  <input name="new[' + $menu_index + '][sort]" size="3" type="text" value="0" class="input-mini"ata-rule-number="true" /></td>'
                    + ' <td>'
                    + '<input name="new[' + $menu_index + '][name]" size="15" type="text" class="input-medium" data-rule-required="true" data-rule-maxlength="30" /></td>'
                    + '<td>'
                    + ' <input name="new[' + $menu_index + '][key]" size="15" type="text" class="input-medium type" data-rule-required="true" data-rule-maxlength="500" />'
                    + '   <input type="hidden" name="new[' + $menu_index + '][parent_id]" value="{pid}" />'
                    + '  <input type="hidden" name="new[' + $menu_index + '][type]" class="key_type" value="1" /></td>'
                    + ' <td>'
                    + '  <input type="checkbox" name="new[' + $menu_index + '][is_show]" checked="checked" value="1"/></td>'
                    + ' <td><a href="javascript:void()" class="del">删除</a></td>'
                    + '</tr> ';
            $("#listTable").append(_menuPtrtmp.replace("{pid}", 0));

        })
        $add_zmenu.click(function myfunction() {
            var $pid = $(this).attr("rel");
            var $thistr = $(this).parent().parent();
            var next = $thistr.nextAll("tr");
            $menu_index++;
            var _menuPtrtmp = '<tr>'
                    + ' <td>'
                    + '  <input name="new[' + $menu_index + '][sort]" size="3" type="text" value="0" class="input-mini"ata-rule-number="true" /></td>'
                    + ' <td>{z}'
                    + '<input name="new[' + $menu_index + '][name]" size="15" type="text" class="input-medium" data-rule-required="true" data-rule-maxlength="30" /></td>'
                    + '<td>'
                    + ' <input name="new[' + $menu_index + '][key]" size="15" type="text" class="input-medium type" data-rule-required="true" data-rule-maxlength="500" />'
                    + '  <input type="hidden" name="new[' + $menu_index + '][parent_id]" value="{pid}" />'
                    + '  <input type="hidden" name="new[' + $menu_index + '][type]" class="key_type" value="1" /></td>'
                    + ' <td>'
                    + '  <input type="checkbox" name="new[' + $menu_index + '][is_show]" checked="checked" value="1" /></td>'
                    + ' <td><a href="javascript:void()" class="del">删除</a></td>'
                    + '</tr> ';
            var tp = _menuPtrtmp.replace("{pid}", $pid).replace("{z}", "<i class='board'></i>  ");
            if (next.length > 0) {
                next.first().before(tp);

            } else {
                $("#listTable").append(tp);
            }


        });
        $("#listTable .del").live("click", (function () {
            $(this).parents("tr").remove();
        }));
        $("input.type").live("change", function () {
            var $this = $(this);
            var $val = $this.val();
            var $nex = $this.nextAll("input.key_type");
            var re = /^((http|https|ftp):\/\/)?(\w(\:\w)?@)?([0-9a-z_-]+\.)*?([a-z0-9-]+\.[a-z]{2,6}(\.[a-z]{2})?(\:[0-9]{2,6})?)((\/[^?#<>\/\\*":]*)+(\?[^#]*)?(#.*)?)?$/i;
            if (re.test($val)) {
                $nex.val(2)
            } else {
                $nex.val(1)
            }
            ;
        });
        $("#create_menu").click(function () {
            var $idsCheck = $("#listTable :checkbox");
            var $isnew = false;
            $idsCheck.each(function () {
                var $hidden_name = $(this).parents("tr").find("input[type=hidden]").attr("name");
                if ($hidden_name.indexOf("new") >= 0) $isnew = true;
                return;
            });
            if ($isnew) {
                G.ui.tips.info("当前页面存在有保存菜单 请保存后生成!")
            } else {
                var $p = 0;
                var $z = 0;
                var $ftr = $("#listTable .ptr");
                $ftr.each(function (k, v) {
                    if ($p > 3) return false;
                    if ($z > 5) return false;
                    $z = 0;
                    var $this = $(this);
                    if ($this.find("input[type='checkbox']:checked").length > 0) {
                        $p++;
                        $this.nextUntil(".ptr").each(function () {
                            if ($(this).find("input[type='checkbox']:checked").length > 0) {
                                $z++;
                            }
                        });
                        if ($z == 0 && k == $ftr.length) {
                            $this.nextAll(".ztr").each(function () {
                                if ($(this).find("input[type='checkbox']:checked").length > 0) {
                                    $z++;
                                }
                            });
                        }
                    }

                });
                if ($p > 3) {
                    G.ui.tips.info("1级菜单最多只能开启3个");
                    return false
                }
                ;
                if ($z > 5) {
                    G.ui.tips.info("2级菜单最多只能开启5个");
                    return false
                }
                ;
                $.get('/npManage/menu/send.act', {}, function (data) {
                    alert(data.error);
                }, 'json');


            }


        });

        $("#remove_menu").click(function () {
            G.ui.tips.confirm_flag('确定要撤销您的自定义菜单吗？', function () {
                $.get('/wechat/removemenu/aid/' + $('#aid').val(), {}, function (d) {
                    $.fallr('hide');
                    //G.logic.form.tip(d);
                    alert(d.error);
                }, 'json');
            });


        });

    });
</script>

</div>
</div>
</div>
</div>

</div>
</div>
</div>
</body>
</html>