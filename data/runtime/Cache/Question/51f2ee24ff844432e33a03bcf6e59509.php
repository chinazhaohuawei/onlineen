<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<link rel="icon" href="/onlineen0328/tpl/onlineenweb/Public/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/onlineen0328/tpl/onlineenweb/Public/images/favicon.ico" type="image/x-icon">


<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<meta name="Description" content="英语在线 专注提供免费优质的英语口语 英语听力 英语语法 英语词汇 英语写作 英语阅读 英语翻译 等资料素材" />

<!-- Bootstrap -->
<link href="/onlineen0328/tpl/onlineenweb/Public/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/onlineen0328/tpl/onlineenweb/Public/css/style.css" type="text/css">
<link href="/onlineen0328/tpl/onlineenweb/Public/css/bootstrap.min.css" rel="stylesheet">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="/onlineen0328/tpl/onlineenweb/Public/js/bootstrap.min.js"></script>
<link href="/onlineen0328/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
<!--<link href="/onlineen0328/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">-->
<!--<link href="/onlineen0328/statics/js/artDialog/skins/default.css" rel="stylesheet" />-->
<!--<link href="/onlineen0328/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">-->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <title>在线做题-英语语法-商务英语-英语在线-专注英语资料免费分享-www.onlineen.cn</title>
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
<div class="question_box">
    <div class="separate"></div>
    <style>
    /*习题广告图  高度90  宽度1000px*/
    .horizontal-advert-place{
        width: 1050px;
        margin:0 auto;
    }
    .horizontal-advert-place img{
        width: 1050px;
        height: 90px;
    }
</style>
<div class="horizontal-advert-place">
    <img src="/onlineen0328/tpl/onlineenweb/Public/images/question_banner.png">
</div>
    <div class="separate"></div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span3">
                        <img class="img-thumbnail" src="/onlineen0328/tpl/onlineenweb/Public/images/practice_test.png">
                    </div>
                    <div class="span9">
                        <h1>综合模拟考试</h1>
                        <ul contenteditable="false">
                            <li>选择相应的试卷进行在线测试。</li>
                            <li>该功能需登陆后使用。</li>
                            <li>祝愿你取得好成绩！</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="page-header">
        <h3 align="center">请选择题目类型</h3>
    </div>


    <ul id="myTab" class="nav nav-tabs">
        <li class="dropdown active">
            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">
                听力
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <li class="active"><a href="#1" tabindex="-1" data-toggle="tab">1</a></li>
                <li><a href="#2" tabindex="-1" data-toggle="tab">2</a></li>
            </ul>
        </li>
        <?php if(is_array($typeinfo)): foreach($typeinfo as $key=>$vo): ?><li class="dropdown">
                <a href="#" id="myTabDrop<?php echo ($vo["type_id"]); ?>" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo ($vo["type_name"]); ?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop">
                    <?php if(is_array($tagarr[$vo['type_id']])): foreach($tagarr[$vo['type_id']] as $key=>$tag): ?><li><a href="#<?php echo ($tag["tag_id"]); ?>" tabindex="-1" data-toggle="tab"><?php echo ($tag["tag_name"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
            </li><?php endforeach; endif; ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="1">
            <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
        </div>
        <div class="tab-pane fade" id="2">
            <p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE 上。
            </p>
        </div>
        <div class="tab-pane fade" id="3">
            <p>3</p>
        </div>
        <div class="tab-pane fade" id="4">
            <p>E4
            </p>
        </div>
    </div>
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
            </p>
        </div>
    </div>
</footer>

<script src="/onlineen0328/tpl/onlineenweb/Public/js/slide.js"></script>

</body>

</html>