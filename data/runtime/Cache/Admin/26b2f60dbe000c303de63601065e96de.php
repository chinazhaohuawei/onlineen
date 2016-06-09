<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/onlineen0328/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/onlineen0328/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/onlineen0328/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/onlineen0328/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <link href="/onlineen0328/tpl_admin/simpleboot/assets/css/myadmin_style.css" rel="stylesheet" />
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/onlineen0328/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">

    <![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/onlineen0328/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/onlineen0328/statics/js/jquery.js"></script>
    <script src="/onlineen0328/statics/js/wind.js"></script>
    <script src="/onlineen0328/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="">课程管理</a></li>
    </ul>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th width="50">课程ID</th>
            <th>课程名称</th>
            <th>课程类型</th>
            <th>课程简介</th>
            <th>课程地址</th>
            <th>创建时间</th>
            <th width="120">管理操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($course)): foreach($course as $key=>$vo): ?><tr>
                <td><?php echo ($vo["courseid"]); ?></td>
                <td><?php echo ($vo["course_title"]); ?></td>
                <td><?php echo ((isset($vo["course_typename"]) && ($vo["course_typename"] !== ""))?($vo["course_typename"]):"未分类"); ?></td>
                <td><?php echo (substr($vo["course_info"],0,60)); ?></td>
                <td><?php echo ($vo["course_down"]); ?></td>
                <td><?php echo (date('Y-m-d',$vo["course_time"])); ?></td>
                <td>
                    <a href='<?php echo U("change_course",array("id"=>$vo["courseid"]));?>'>修改</a> |
                    <a href="<?php echo U('delete_course',array('id'=>$vo['courseid']));?>" class="J_ajax_dialog_btn"
                       data-msg="您确定要删除此视频吗？">删除</a> |
                    <a href="<?php echo U('videomanage',array('id'=>$vo['courseid']));?>">视频管理</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
    <div class="pagination"><?php echo ($page); ?></div>
</div>
<script src="/onlineen0328/statics/js/common.js"></script>
</body>
</html>