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
    <title><?php echo ($video_data[0][video_title]); ?>在线观看_免费下载_英语在线_www.onlineen.cn</title>
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
<div class="c_details_favorite_box">
    <div class="links">
        <a><div class="add_favorite"><label></label><span>添加收藏</span></div></a>
        <div class="add_favorite_yet"><label></label><span>已收藏</span></div>

    </div>
</div>
<div class="c_details_bar_box">
    <div class="c_details">
        &nbsp;
        <h1><?php echo ($course_data[0][course_title]); ?></h1>
        <p><?php echo ($course_data[0][course_info]); ?></p>
    </div>
</div>
<div class="c_details_main_box">
    <div class="c_details_main">
        <div class="c_details_main_first">
            <div class="top"></div>
            <h3><?php echo ($video_data[0][video_title]); ?></h3>
            <div class="bottom">VIDEO ON DEMAND</div>
        </div>
        <div class="coure_video">
            <!--<video controls="controls" preload="auto" autobuffer>-->
                <!--<source src="/data/video/<?php echo ($video_data[0][video_url]); ?>.mp4" type="video/mp4">-->
                <!--您的浏览器不支持该视频插件-->
            <!--</video>-->
            <embed src="<?php echo ($video_data[0][video_url]); ?>" allowScriptAccess="sameDomain" allownetworking="internal"  allowFullScreen="true" quality="high"allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
            <div class="videoright">广告区域</div>
        </div>
        <div class="video_down">【高清版全套视频+配套讲义】下载：&nbsp;
            <a href="<?php echo U('Down/index/videodown',array('id'=>$course_data[0][courseid]));?>" style="color: #fff" target="_blank">
                <label class="glyphicon glyphicon-download-alt" style="margin-right: 30px"></label>
            </a>
        </div>
        <div class="video_guide">
            <?php if($last_video_data): ?><div class="video_last_next">
                <a href="<?php echo U('Portal/Course/video',array('courseid'=>$last_video_data['course_id'],'videoid'=>$last_video_data['video_id']));?>" target="_blank">
                    <img style='background: url("/data/video/<?php echo ($last_video_data["video_pic"]); ?>"); background-size: 124px 85px;' src="/tpl/onlineenweb//Public/images/playwidth.png" title="<?php echo ($last_video_data["video_info"]); ?>">
                </a>
                <div class="right">
                    <h3>
                        <b>上一集：</b>
                        <?php echo msubstr($last_video_data['video_title'],0,13,'utf-8'); ?>
                        <!--<?php echo (msubstr($vo["video_title"],0,36,'utf-8',false)); ?>-->
                    </h3>
                    <p><?php echo ($last_video_data["video_info"]); ?></p>
                </div>
            </div><?php endif; ?>
            <?php if($next_video_data): ?><div class="video_last_next">
                    <a href="<?php echo U('Portal/Course/video',array('courseid'=>$next_video_data['course_id'],'videoid'=>$next_video_data['video_id']));?>" target="_blank">
                        <img style='background: url("/data/video/<?php echo ($next_video_data["video_pic"]); ?>"); background-size: 124px 85px;' src="/tpl/onlineenweb//Public/images/playwidth.png" title="<?php echo ($next_video_data["video_info"]); ?>">
                    </a>
                    <div class="right">
                        <h3>
                            <b>下一集：</b>
                            <?php echo msubstr($next_video_data['video_title'],0,13,'utf-8'); ?>
                            <!--<?php echo (msubstr($vo["video_title"],0,36,'utf-8',false)); ?>-->
                        </h3>
                        <p><?php echo ($next_video_data["video_info"]); ?></p>
                    </div>
                </div><?php endif; ?>
        </div>
        <div style="clear: both"></div>
        <div class="correlation">
            <p>&nbsp;&nbsp;相关练习题>></p>
        </div>
        <div class="video_exercises">
            <ul>
                <?php if(is_array($question_arr)): foreach($question_arr as $key=>$vo): ?><li><a href=""><?php echo ($vo["tag_name"]); ?>专项训练 >></a></li><?php endforeach; endif; ?>
                <li style="float: right"><a href="">更多在线练习题...</a></li>
            </ul>
        </div>
        <div style="clear: both"></div>
        <div class="correlation">
            <p>&nbsp;&nbsp;相关资料>></p>
        </div>
        <div class="video_exercises">
            <ul>
                <?php if(is_array($resource_arr)): foreach($resource_arr as $key=>$vo): ?><li><a href="<?php echo U('Down/Index/resourcedetail',array('id'=>$vo['resource_id']));?>"><?php echo ($vo["resource_name"]); ?></a></li><?php endforeach; endif; ?>
                <li style="float: right"><a href="">更多相关资料免费下载...</a></li>
            </ul>
        </div>
        <div style="clear: both"></div>
        <div class="video_footer_space"></div>
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
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259255067'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259255067' type='text/javascript'%3E%3C/script%3E"));</script>
            </p>

        </div>
    </div>
</footer>

</body>
</html>