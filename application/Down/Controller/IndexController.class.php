<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Down\Controller;
use Common\Controller\HomeBaseController;
/**
 * 下载页面
 */
class IndexController extends HomeBaseController {

    //下载页面
    function _initialize() {
        parent::_initialize();
        $this->resource_model =D("Common/resource");
        $this->resource_type_model =D("Common/resource_type");
    }
    public function index() {
/*首先确定有十大类目
 *用for分别获取各类目按时间排序的前八个资源信息
 * 复制给resourceinfo数组
 * 在for中同时获取对应的类目名称，赋值给resourceinfo['$i']['typename'];
 * $this->assign("resource",resourceinfo['$i']);
 *
*/
        //获取资源类目信息-导航栏
        $resource_type_arr=$this->resource_type_model->where('type_type = 1 AND type_id != 2')->select();
        $this->assign('typeinfo_nav',$resource_type_arr);
        //获取热门推荐
        $recommend=$this->resource_model
            ->where("recommend = 1")
            ->order("resource_time desc")
            ->limit(7)
            ->select();
        foreach($recommend as $key=>$value){
            $recommend_typeid=$recommend[$key]['resource_type'];
            $recommend[$key]['typename']=$this->resource_type_model->where("type_id=$recommend_typeid")->getfield("type_name");
        }
        $this->assign("recommend",$recommend);
        //获取热门推荐end
        for($i=1;$i<11;$i++){
            $resource_info[$i]=$this->resource_model
                ->where("resource_type = $i")
                ->order("resource_time desc")
                ->limit(6)
                ->select();
            foreach($resource_info[$i] as $key=>$value){
                $resource_info[$i][$key]['typeid']=$i;
                $resource_info[$i][$key]['typename']=$this->resource_type_model->where("type_id=$i")->getfield("type_name");
            }
            $this->assign("resource"."$i",$resource_info[$i]);
//            dump($resource_info[$i]);
        }
        $this->display(':index');
    }
    public function typelist() {
        //获取资源类目信息-导航栏
        $resource_type_arr=$this->resource_type_model->where('type_type = 1 AND type_id != 2')->select();
        $this->assign('typeinfo_nav',$resource_type_arr);
        /*获取分类的id
         * 查询分类对应的资源信息
         * 返回资源图片，资源名称，资源时间
         * */
        $typeid=$_GET['id'];
        $count=$this->resource_model->where("resource_type = $typeid")->count();
        $page = $this->page($count, 1);
        $resourcelist = $this->resource_model
            ->where("resource_type = $typeid")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();
        $typename=$this->resource_type_model->where("type_id=$typeid")->getField('type_name');
        $this->assign("typename",$typename);
        $this->assign("resource",$resourcelist);
        $this->assign("Page", $page->show("Admin"));
        $this->display(':typelist');
    }
    public function resourcedetail() {
        //获取资源类目信息-导航栏
        $resource_type_arr=$this->resource_type_model->where('type_type = 1 AND type_id != 2')->select();
        $this->assign('typeinfo_nav',$resource_type_arr);
        /*
         * 获取资源id
         * 返回资源信息
         * foreach对资源的类型名称进行赋值
         * */
        $resourceid=$_GET['id'];
        $resourceinfo = $this->resource_model->where("resource_id = $resourceid")->find();
        $type_id = intval($resourceinfo['resource_type']);
        $resourceinfo['typename']=$this->resource_type_model->where("type_id = $type_id")->getfield("type_name");
        $this->assign("resource",$resourceinfo);
//        dump($resourceinfo);
        $this->display(':resource_detail');
    }
    public function downdetail() {
        /*获取资源的id
         * 返回资源的下载地址
         * 对地址进行裁剪前31位赋值给“地址”
         * 从滴33位开始获取后17位赋值给“密码”
         * */
        $resourceid=$_GET['id'];
        $resource_urlinfo=$this->resource_model->where("resource_id = $resourceid")->field("resource_name,resource_url")->find();
        $resource_url=substr($resource_urlinfo['resource_url'],0,31);
        $resource_pass=substr($resource_urlinfo['resource_url'],33);
        $this->assign("title",$resource_urlinfo['resource_name']);
        $this->assign("url",$resource_url);
        $this->assign("pass",$resource_pass);
        $this->display(':downdetail');
    }
    public function videodown() {
        /*视频资源下载详情***特殊
         * 返回资源的下载地址
         * 对地址进行裁剪前31位赋值给“地址”
         * 从滴33位开始获取后17位赋值给“密码”
         * */
        $courseid=$_GET['id'];
        $course_info=M('course')->where("courseid = $courseid")->field("course_title,course_down")->find();
//        dump($course_info);
        $course_url=substr($course_info['course_down'],0,31);
        $course_pass=substr($course_info['course_down'],33);
        $this->assign("title",$course_info['course_title']);
        $this->assign("url",$course_url);
        $this->assign("pass",$course_pass);
        $this->display(':downdetail');
    }
}


