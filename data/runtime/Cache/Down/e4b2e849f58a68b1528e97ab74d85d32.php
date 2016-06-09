<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<link rel="icon" href="/tpl/onlineenweb/Public/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/tpl/onlineenweb/Public/images/favicon.ico" type="image/x-icon">


<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="Description" content="英语在线 专注提供免费优质的英语口语 英语听力 英语语法 英语词汇 英语写作 英语阅读 英语翻译 等资料素材" />

<!-- Bootstrap -->
<link href="/tpl/onlineenweb/Public/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/tpl/onlineenweb/Public/css/style.css" type="text/css">
<link href="/tpl/onlineenweb/Public/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="/tpl/onlineenweb/Public/js/bootstrap.min.js"></script>
<link href="/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
<!--<link href="/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">-->
<!--<link href="/statics/js/artDialog/skins/default.css" rel="stylesheet" />-->
<!--<link href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <title><?php echo ($title); ?>免费下载-英语在线-www.onlineen.cn</title>
</head>
<body>
<nav class="navbar_box">
    <div class="mynavbar">
        <div class="logo_box">
            <div class="logo_under"></div>
            <a href="<?php echo U('Portal/Index/index');?>"><div class="logo"></div></a>
        </div>
        <div class="label_box_left"></div>
        <a href="<?php echo U('Portal/Index/index');?>"><div class="label_box">课程</div></a>
        <a href="<?php echo U('Down/Index/index');?>"><div class="label_box">下载</div></a>
        <a href="<?php echo U('Question/Index/index');?>"><div class="label_box">刷题</div></a>
        <a href="<?php echo U('User/Sponsor/index');?>"><div class="label_box">赞助</div></a>
        <a>
            <div class="label_box_login">
                <label><span class="glyphicon glyphicon-user"></span></label>
                <span>登陆</span>
            </div>
            <div class="label_box_login_center">|</div>
            <div class="label_box_login">
                <label><span class="glyphicon glyphicon-plus"></span></label>
                <span>注册</span>
            </div>
        </a>
    </div>
</nav>

<div class="downdetail">
    <div class="downinfo">
        <div class="title"><span>下载：</span><< <?php echo ($title); ?> >></div>
        <div class="address">
            <a href="<?php echo ($url); ?>" target="_blank">
                <button>立即下载</button>
            </a>
            <?php echo ($pass); ?></div>
        <div class="contact">如需帮助 请联系企业QQ：937768649 企业电话：1234567890</div>
    </div>


    <div class="downpic"></div>
    <div class="downbottem"></div>
</div>

<footer class="footer_box">
    <div class="footer_box_top_box">
        <div class="footer_box_top">
            <span class="spantitle">友情链接：</span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>
            <span><a href="index.html">英语在线</a></span>

        </div>
    </div>
    <div class="footer_box_bottem_box">
        <div class="footer_box_bottem">
            联系信箱：&nbsp;<a href="Mailto:chinacion@163.com">chinacion@163.com</a>&nbsp;&nbsp;Copyright©2016&nbsp;&nbsp;<a href="http://www.onlineen.cn">www.onlineen.cn.</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;鲁ICP备16007319号-1
            <p class="footer_box_copyright">
                免责声明:本网站内容均收集于互联网，如有发现侵犯您的权益，请告诉我们，我们会在核实无误后删除相关内容！谢谢合作！
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259255067'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259255067' type='text/javascript'%3E%3C/script%3E"));</script>
            </p>

        </div>
    </div>
</footer>


<script src="/tpl/onlineenweb/Public/js/slide.js"></script>

</body>

</html>