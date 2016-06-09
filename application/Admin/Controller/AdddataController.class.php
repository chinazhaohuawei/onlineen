<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class AdddataController extends AdminbaseController {

    function _initialize() {
        parent::_initialize();
        $this->resource_model =D("Common/resource");
        $this->resource_type_model =D("Common/resource_type");
    }
    public function index(){
    }
    public function resourcelist(){
//        echo"资源列表";
        $count=$this->resource_model->count();
        $page = $this->page($count, 20);
        $resource=$this->resource_model->order('resource_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($resource as $key=>$value){
            $resource_type=intval($resource[$key]['resource_type']);
            $resource[$key]['resource_typename']=$this->resource_type_model->where("type_id = $resource_type")->getField('type_name');
        }
//        dump($resource);
        $this->assign("resource",$resource);
        $this->assign("page", $page->show("Admin"));
        $this->display("resourcelist");
    }
    public function change(){
        $id=$_GET['id'];
        //获取分类列表
        $resource_type=$this->resource_type_model->select();
        $this->assign("resource_type",$resource_type);

        $resource_only=$this->resource_model->where("resource_id = $id")->find();
//        dump($resource_only);
        $this->assign("resource",$resource_only);
        $this->display("changeresource");
    }
    public function delete_re(){
        $id=intval($_GET['id']);
        if ($id) {
            $rst = $this->resource_model->where("resource_id=$id")->delete();
            if ($rst) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        } else {
            $this->error('数据传入失败！');
        }
    }
    function recommend(){
        $resource['resource_id']=intval($_GET['id']);
        if($resource['resource_id']){
            $resource['recommend']=1;
            $res=$this->resource_model->save($resource);
            if ($res) {
                $this->success("推荐成功！", U("resourcelist"));
            } else {
                $this->error('推荐失败！');
            }
        }else{
            $this->error('数据传入失败！');
        }
    }
    function recommend_cancel(){
        $resource['resource_id']=intval($_GET['id']);
        if($resource['resource_id']){
            $resource['recommend']=0;
            $res=$this->resource_model->save($resource);
            if ($res) {
                $this->success("取消成功！", U("resourcelist"));
            } else {
                $this->error('取消失败！');
            }
        }else{
            $this->error('数据传入失败！');
        }
    }
    public function addresource(){
//        echo"添加资源";
        //获取分类列表
        $resource_type=$this->resource_type_model->select();
        if(empty($resource_type)){
            $resource_type[0]['type_id']=0;
            $resource_type[0]['type_name']="未分类";
            $this->assign("resource_type",$resource_type);
        }else{
            $this->assign("resource_type",$resource_type);
        }
//        dump($resource_type);
        $this->display("index");
    }
    public function addresource_post(){
        if(IS_POST){
            $resource['resource_name']=$_POST['resource_name'];
            $resource['resource_type']=$_POST['resource_type'];
            $resource['resource_size']=$_POST['resource_size'];
            $resource['resource_pic']=$_POST['resource_pic'];
            $resource['resource_info']=$_POST['resource_info'];
            $resource['resource_url']=$_POST['resource_url'];
            $resource['recommend']=$_POST['recommend'];
            if(empty($resource['resource_name'])||empty($resource['resource_type'])||empty($resource['resource_size'])||empty($resource['resource_pic'])||empty($resource['resource_info'])||empty($resource['resource_url'])){
                $this->error('请将数据输入完整！');
            }
            $resource['resource_time']=time();
            $res=$this->resource_model->add($resource);
            if($res){
                $this->success('保存成功！');
            }else{
                $this->error('保存失败！');
            }

        }else{
            $this->error('数据获取错误！');
        }

    }
    function changeresource_post(){
        if(IS_POST){
            $resource['resource_id']=$_POST['resource_id'];
            $resource['resource_name']=$_POST['resource_name'];
            $resource['resource_type']=$_POST['resource_type'];
            $resource['resource_size']=$_POST['resource_size'];
            $resource['resource_pic']=$_POST['resource_pic'];
            $resource['resource_info']=$_POST['resource_info'];
            $resource['resource_url']=$_POST['resource_url'];
            $resource['recommend']=$_POST['recommend'];
            if(empty($resource['resource_name'])||empty($resource['resource_type'])||empty($resource['resource_size'])||empty($resource['resource_pic'])||empty($resource['resource_info'])||empty($resource['resource_url'])){
                $this->error('请将数据输入完整！');
            }
            $resource['resource_time']=time();
            $res=$this->resource_model->save($resource);
            if($res){
                $this->success('修改成功！');
            }else{
                $this->error('修改失败！');
            }

        }else{
            $this->error('数据获取错误！');
        }
    }
    function cover_upload(){
        //        上传图片
        //上传处理类
        $config=array(
            'FILE_UPLOAD_TYPE' => sp_is_sae()?"Sae":'Local',//TODO 其它存储类型暂不考虑
            'rootPath' => './data/',
            'savePath' => './upload/resource/',
            'maxSize' => 1024000,//1m
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'png', 'jpeg'),
            'autoSub'    =>    false,
        );
        $upload = new \Think\Upload($config);//
        $info=$upload->upload();
        //开始上传
        if ($info) {
            //上传成功
            //写入附件数据库信息
            $first=array_shift($info);
            $file=$first['savename'];
            $_SESSION['avatar']=$file;
            $this->ajaxReturn(sp_ajax_return(array("file"=>$file),"上传成功！",1),"AJAX_UPLOAD");
        } else {
            //上传失败，返回错误
            $this->ajaxReturn(sp_ajax_return(array(),$upload->getError(),0),"AJAX_UPLOAD");
        }
    }
    function cover_date(){

        if(!empty($_SESSION['avatar'])){

            $targ_w = intval($_POST['w']);
            $targ_h = intval($_POST['h']);
            $x = $_POST['x'];
            $y = $_POST['y'];
            $jpeg_quality = 90;

            $avatar=$_SESSION['avatar'];
            $avatar_dir=C("ROOT")."data/upload/resource/";
//            $src = $avatar_dir.$avatar;
//            $src="__ROOT__/data/upload/resource/$avatar";
            if(sp_is_sae()){//TODO 其它存储类型暂不考虑
                $src=C("TMPL_PARSE_STRING.__root__")."data/upload/resource/$avatar";
            }else{
                $src = $avatar_dir.$avatar;
            }
            //获取原图尺寸，然后转换比例裁图
            $primary_size=getimagesize($src);
            $primary_width=intval($primary_size[0]);
            $primary_new_ratio=$primary_width/260;

            $targ_w=$targ_w*$primary_new_ratio;
            $targ_h=$targ_h*$primary_new_ratio;
            $x=$x*$primary_new_ratio;
            $y=$y*$primary_new_ratio;
            //end
            $avatar_path=$avatar_dir.$avatar;

            if(sp_is_sae()){//TODO 其它存储类型暂不考虑

                $img_data = sp_file_read($avatar_path);
                $img = new \SaeImage();
                $size=$img->getImageAttr();
                $lx=$x/$size[0];
                $rx=$x/$size[0]+$targ_w/$size[0];
                $ty=$y/$size[1];
                $by=$y/$size[1]+$targ_h/$size[1];

                $img->crop($lx, $rx,$ty,$by);
                $img_content=$img->exec('png');
                sp_file_write($avatar_path, $img_content);
                $this->success($_SESSION['avatar']);
            }else{

                $image = new \Think\Image();
                $image->open($src);
                $image->crop($targ_w, $targ_h,$x,$y);
                $image->save($src);
                $this->success($_SESSION['avatar']);
            }


        }
    }

}