<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class VideoManageController extends AdminbaseController {

    function _initialize() {
        parent::_initialize();
        $this->course_model =D("Common/course");
        $this->course_type_model =D("Common/course_type");
    }
    function videomanage(){
//        echo"视频列表";
        $count=$this->course_model->count();
        $page = $this->page($count, 20);
        $course=$this->course_model->order('courseid desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach($course as $key=>$value){
            $course_type=intval($course[$key]['course_type']);
            $course[$key]['course_typename']=$this->course_type_model->where("type_id = $course_type")->getField('type_name');
        }
//        dump($resource);
        $this->assign("course",$course);
        $this->assign("page", $page->show("Admin"));
        $this->display("courselist");
//        dump($course);
    }
    function change_course(){
        //修改视频资料
        $id=$_GET['id'];
        //获取分类列表
        $course_type=$this->course_type_model->select();
        $this->assign("course_type",$course_type);

        $course_only=$this->course_model->where("courseid = $id")->find();
//        dump($resource_only);
        $this->assign("course",$course_only);
        $this->display("changecourse");
    }
    function changecourse_post(){

    }
    function deletecourse(){
        $id=intval($_GET['id']);
        if ($id) {
            $rst = $this->course_model->where("course=$id")->delete();
            if ($rst) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        } else {
            $this->error('数据传入失败！');
        }
    }
    function addvideo(){

    }

}