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
<div class="wrap jj">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo U('resourcelist');?>">资源管理</a></li>
        <li class="active"><a href="">修改资源</a></li>
    </ul>
    <div class="common-form">
        <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('changeresource_post');?>">
            <fieldset>
                <div class="control-group">
                    <label class="control-label">资源名称:</label>
                    <div class="controls">
                        <input type="text" class="control-myinput" name="resource_id" value="<?php echo ($resource['resource_id']); ?>" readonly>
                        <label class="control-label-right">* 不可修改</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">资源名称:</label>
                    <div class="controls">
                        <input type="text" class="control-myinput" name="resource_name" value="<?php echo ($resource['resource_name']); ?>">
                        <label class="control-label-right">* 建议15字以内</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">所属分类:</label>
                    <div class="controls">
                        <select class="control-myinput" name="resource_type">
                            <?php if(is_array($resource_type)): foreach($resource_type as $key=>$vo): if($vo['type_id'] == $resource['resource_type']): ?><option value="<?php echo ($vo["type_id"]); ?>" selected><?php echo ($vo["type_name"]); ?></option>
                                    <?php else: ?><option value="<?php echo ($vo["type_id"]); ?>"><?php echo ($vo["type_name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                        <label class="control-label-right">* 请正确选择分类</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">资源大小:</label>
                    <div class="controls">
                        <input type="text" class="control-myinput" name="resource_size"  value="<?php echo ($resource['resource_size']); ?>">
                        <label class="control-label-right">* 格式："数字+单位"，例如：500k</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">资源地址:</label>
                    <div class="controls">
                        <input type="text" class="control-myinput" name="resource_url" value="<?php echo ($resource['resource_url']); ?>">
                        <label class="control-label-right">* 格式：https://yunpan.cn/cqwuAfrXcwJp2  访问密码 be32</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">资源封面:</label>
                    <div class="controls">
                        <?php if($resource['resource_pic']): $resource_pic_string=$resource['resource_pic']; ?>
                            <div class="control-myinput-file" name="control-myinput-file"  id="modal-863110" href="#modal-container-863110" role="button" data-toggle="modal" style='background: url("/onlineen0328/data/upload/resource/<?php echo ($resource_pic_string); ?>");background-size: 80px 80px;'></div>
                            <input type="hidden" name="resource_pic" id="resource_pic" value="<?php echo ($resource_pic_string); ?>">
                            <?php else: ?>
                            <div class="control-myinput-file" name="control-myinput-file"  id="modal-863110" href="#modal-container-863110" role="button" data-toggle="modal"></div>
                            <input type="hidden" name="resource_pic" id="resource_pic" value=""><?php endif; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">资源简介:</label>
                    <div class="controls">
                        <textarea type="text" class="control-mytextarea" name="resource_info"><?php echo ($resource['resource_info']); ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">是否推荐:</label>
                    <div class="controls">
                        <?php if($resource['recommend'] == 0): ?><input type="radio" name="recommend" value="0" checked />否
                            <input type="radio" name="recommend" value="1" />是
                            <?php else: ?>
                            <input type="radio" name="recommend" value="0" />否
                            <input type="radio" name="recommend" value="1"  checked />是<?php endif; ?>

                    </div>
                </div>
            </fieldset>
            <div class="form-actions">
                <!--<input type="hidden" name="id" value="<?php echo ($id); ?>" />-->
                <!--<button type="submit">更新</button>-->
                <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">更新</button>
                <a class="btn" href="/onlineen0328/index.php/Admin/Adddata/resourcelist">返回</a>
                <!--<a class="btn" href="/onlineen0328/index.php/Admin/Adddata/schoollist">清除</a>-->
            </div>
        </form>
    </div>
</div>
<script src="/onlineen0328/statics/js/common.js"></script>
<!--弹出上传窗口-->
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div id="modal-container-863110" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">
                        封面上传
                    </h3>
                </div>
                <div class="modal-body">
                    <p>
                        <input type="file" onchange="avatar_upload(this)" id="avatar_uploder"  name="file"/>
                    </p>
                </div>
                <div class="uploaded_avatar_area" style="width:260px; margin: auto;border: 1px rgb(204, 204, 204) dashed">
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" onclick="reloadPage(window)" aria-hidden="true">取消</button> <button class="btn btn-primary"  data-dismiss="modal" onclick="update_avatar()">保存设置</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function update_avatar(){
        var area=$(".uploaded_avatar_area img").data("area");
        $.ajax({
            type : 'post',
            url : "<?php echo U('cover_date');?>",
            data :area,
            success :function (data){
                if(data.status){
                    var resource_pic = document.getElementById("resource_pic");
                    resource_pic.value=data["info"];
                    var updiv = document.getElementById("modal-863110");
                    updiv.style.background='url(/onlineen0328/data/upload/resource/'+data['info']+') no-repeat center';
                    updiv.style.backgroundSize="80px 80px";
                }else{
                    alert("上传失败！请重试！");
                }

            }
        });
    }
    function avatar_upload(obj){
        var $fileinput=$(obj);
        /* $(obj)
         .show()
         .ajaxComplete(function(){
         $(this).hide();
         }); */
        Wind.css("jcrop");
        Wind.use("ajaxfileupload","jcrop","noty",function(){
            $.ajaxFileUpload({
                url:"<?php echo U('cover_upload');?>",
                secureuri:false,
                fileElementId:"avatar_uploder",
                dataType: 'json',
                data:{},
                success: function (data, status){
                    if(data.status==1){
                        $("#avatar_uploder").hide();
                        var $uploaded_area=$(".uploaded_avatar_area");
//                        $uploaded_area.find("img").remove();
                        var $img=$("<img/>").attr("src","/onlineen0328/data/upload/resource/"+data.data.file);

                        $img.prependTo($uploaded_area);

                        $(".uploaded_avatar_btns").show();
                        $img.Jcrop({
                            aspectRatio:125/175,
                            setSelect: [ 0, 0, 125, 175 ],
                            onSelect: function(c){
                                $img.data("area",c);
                            }
                        });

                    }else{
                        noty({text: data.info,
                            type:'error',
                            layout:'center'
                        });
                    }

                },
                error: function (data, status, e){}
            });
        });



        return false;
    }
</script>
</body>
</html>