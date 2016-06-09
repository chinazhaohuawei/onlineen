<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomeBaseController;

/**
 * 首页
 */
class CourseController extends HomeBaseController {

    //首页
    public function index() {
        $courseid = I('courseid');
        if($courseid){
            $course_model = M('course');
//            $posts= $course_model->where("courseid = $courseid")->limit($page->firstRow . ',' . $page->listRows)->select();

            $course_data = $course_model->where("courseid = $courseid")->select();
            if($course_data){
                $video_model = M('course_video');
                $count = $video_model->where("course_id = $courseid")->count();
                $page = $this->page($count,16);
//                dump($page->show());

                $video_data = $video_model->where("course_id = $courseid")->limit($page->firstRow . ',' . $page->listRows)->select();
                $this->assign('video_data',$video_data);
                $this->assign('course_data',$course_data);
                $this->assign('pagenum',$page->Total_Pages);
                $this->assign('Page',$page->show());
//                $this->assign("posts",$posts);
                $this->display(":courseDetails");
            }else{
                echo"不存在该课程！";
                exit;
            }
        }else{
            echo"不存在该课程！";
            exit;
        }
    }

    public function video() {
        $videoid = I('videoid');
        $courseid = I('courseid');
        if($videoid){
            $video_model = M('course_video');
            $video_data = $video_model->where("video_id = $videoid")->select();
            if($video_data){
                $course_model = M('course');
                $course_data = $course_model->where("courseid = $courseid")->select();
                $this->assign('video_data',$video_data);
                $this->assign('course_data',$course_data);
                //获取该课程总视频数
                $video_count = $video_model->where("course_id = $courseid")->count();
                //获取当前视频在目录中的位置
                $sequence_num=intval($video_data[0]['sequence_num']);
                $next_video_sequence_num = $sequence_num+1;
                $last_video_sequence_num = $sequence_num-1;
                switch($sequence_num){
                    //如果是第一个视频
                    case 1:
                        if($video_count==1){
                            //如果一共就一个视频，什么都不返回
                        }else{
                            //如果一共多个视频，只返回下一个
                            $next_video = $video_model->where("sequence_num = $next_video_sequence_num")->find();
                            $this->assign('next_video_data',$next_video);
                        }
                        break;
                    //如果是最后一个视频
                    case $video_count:
                        if($video_count==1){
                            //如果一共就一个视频，什么都不返回
                        }else{
                            //如果一共多个视频，只返回上一个
                            $last_video = $video_model->where("sequence_num = $last_video_sequence_num")->find();
                            $this->assign('last_video_data',$last_video);
                        }
                        break;
                    default:
                        //如果在视频中间
                        $last_video = $video_model->where("sequence_num = $last_video_sequence_num")->find();
                        $next_video = $video_model->where("sequence_num = $next_video_sequence_num")->find();
                        $this->assign('last_video_data',$last_video);
                        $this->assign('next_video_data',$next_video);
                        break;
                }
                //根据标签获取相关习题+相关资源
                $tag_arr=explode(",",$video_data[0]['video_tag']);
                $resource_arr=array();
                foreach($tag_arr as $key=>$value){
                    $tagid=intval($tag_arr[$key]);
                    $question_arr[$key]=M('question_tag')->where("tag_id = $tagid")->find();
                    $resource_select[$key]=M('resource')->where("FIND_IN_SET($tagid,resource_tag)")->field('resource_id,resource_name')->select();
                    $resource_arr=array_merge($resource_arr,$resource_select[$key]);
                }
                $this->assign('question_arr',$question_arr);
                //去掉数组中的重复项
                if(!empty($resource_arr)){
                    $inside_keyname_Arr = array_keys(end($resource_arr));//存储内层数组的键名
                    //array_keys()返回包含数组中所有键名的一个新数组：
                    //end() 函数将数组内部指针指向最后一个元素，并返回该元素的值（如果成功）
                    //降维,也可以用implode,将一维数组转换为用-连接的字符串
                    foreach ($resource_arr as $v){
                        $v = join("-",$v);
                        $temp[] = $v;
                    }
                    //去掉重复的字符串,也就是重复的一维数组
                    $temp = array_unique($temp);

                    //再将拆开的数组重新组装
                    foreach ($temp as $k => $v)
                    {
                        $tempArr = explode("-",$v);//拆分去重之后的字符串

                        foreach($tempArr as $tempkey => $tempval)
                            $resource_arr_out[$k][$inside_keyname_Arr[$tempkey]] = $tempval;
                    }
                    //如果结果大于7，截取前7个资源
                    if(count($resource_arr_out)>7){
                        $resource_arr_out=array_slice($resource_arr_out,0,7);
                    }
                    $this->assign('resource_arr',$resource_arr_out);
                }

                //根据标签获取相关资源
                $this->display(":courseVideo");
            }else{
                echo"不存在该视频！";
                exit;
            }
        }else{
            echo"不存在该视频！";
            exit;
        }
    }

}
