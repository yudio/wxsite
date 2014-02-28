<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="微盟、微信营销、微信代运营、微信定制开发、微信托管、微网站、微商城、微营销" name="Keywords">
    <meta content="微盟，国内最大的微信公众智能服务平台，微盟八大微体系：微菜单、微官网、微会员、微活动、微商城、微推送、微服务、微统计，企业微营销必备。" name="Description">
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/bootstrap_responsive_min.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/todc_bootstrap.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/themes.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/inside.css" media="all"/>
    <script type="text/javascript" src="<?php echo RES;?>/src/jQuery.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/bootstrap_min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/src/inside.js"></script>
    <title>微盟（Weimob）—国内最大的微信公众服务平台</title>
    <link rel="shortcut icon" href="http://stc.weimob.com/img/favicon.ico"/>
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
                        <div class="span6">
                            <h3><i class="icon-table"></i>管理微信公众帐号</h3>
                        </div>

                    </div>

                    <div class="box-content nozypadding">
                        <div class="row-fluid">
                            <div class="span8 control-group">

                                <a class="btn" href="<?php if($gwxnum > $uwxnum): ?>npManage/account/autobind.act<?php else: ?>javascript:alert('配额不足，请升级！');<?php endif; ?>"><i class="icon-plus"></i>添加公众帐号</a>
                                <a href="http://wpa.qq.com/msgrd?v=3&uin=4006305400&site=qq&menu=yes" target="_blank"
                                   class="btn btn-warning" style="cursor:pointer">微助手</a>
                            </div>


                        </div>

                        <div class="row-fluid dataTables_wrapper">
                            <div class="alert">
                                <strong>温馨提示</strong>：您还有<?php echo ($gwxnum - $uwxnum);?>个微信公众号配额，请珍惜使用名额！ <span
                                    class="line hide">微盟交流QQ③群（245257246）</span>
                            </div>
                            <form method="post" action="" id="listForm">
                                <table id="listTable"
                                       class="table table-hover table-nomargin table-bordered usertable dataTable">
                                    <thead>
                                    <tr>

                                        <th>公众号名称</th>
                                        <th>会员套餐</th>
                                        <th>创建时间/到期时间</th>
                                        <th>已定义/上限</th>
                                        <th>请求数</th>
                                        <th>剩余请求数</th>
                                        <th>增值服务</th>
                                        <th>操作</th>
                                    </tr>

                                    </thead>
                                    <tbody>

                                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                        <td style="text-align:center;">
                                            <p>
                                                <a href="javascript:void(0)"
                                                   onclick="parent.location.href='/npManage/microsite/main.act'"
                                                   title="点击进入功能管理">
                                                    <img src="<?php echo ($vo["headerpic"]); ?>"
                                                         style="width:88px;height:88px;"></a>
                                            </p>

                                            <p><?php echo ($vo["wxname"]); ?></p>
                                        </td>
                                        <td align="center">
                                            <p><?php if($_SESSION['gid']>1){echo $_SESSION['gid']-1;}else{echo 0;} ?>
                                                <a   href="<?php echo U('Alipay/index');?>" id="smemberss" class="green"><em>升降级</em></a></p>

                                        </td>
                                        <td>
                                            <p>创建时间:<?php echo (date("Y-m-d",$vo["createtime"])); ?></p>

                                            <p>到期时间:<?php echo (date("Y-m-d",$viptime)); ?></p>
                                        </td>
                                        <td>

                                            <p>图文：<?php echo $_SESSION['diynum'].'/'.$group[$_SESSION['gid']]['did']; ?></p>
                                        </td>
                                        <td>
                                            <p>总请求数:<?php echo $_SESSION['connectnum'] ?></p>

                                            <p>本月请求数:<?php echo $group[$_SESSION['gid']]['cid']; ?></p>
                                        </td>
                                        <td>
                                            <p>请求数剩余：9999</p>
                                        </td>
                                        <td>
                                            <p>短信：0/条</p>
                                        </td>
                                        <td>

                                            <a href="npManage/account/detail.act?id=<?php echo ($vo['id']); ?>&token=<?php echo ($vo['token']); ?>" class="btn" rel="tooltip" title="编辑"><i
                                                    class="icon-edit"></i></a>
                                            <a href="javascript:G.ui.tips.confirm('您确定要删除此公众帐号吗?', '<?php echo U('User/Index/del',array('id'=>$vo['id']));?>');"
                                               class="btn" rel="tooltip" title="删除"><i class="icon-remove"></i></a>
                                            <a href="javascript:void(0)"
                                               onclick="parent.location.href='/npManage/microsite/main.act'" class="btn"
                                               rel="tooltip" title="管理"><i class="icon-cog"></i></a>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>


                                </table>
                                <div class="dataTables_paginate paging_full_numbers"><span>       </span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>