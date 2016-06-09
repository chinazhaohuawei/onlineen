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
 * ��ҳ
 */
class CourseController extends HomeBaseController {

    //��ҳ
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
                echo"�����ڸÿγ̣�";
                exit;
            }
        }else{
            echo"�����ڸÿγ̣�";
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
                //��ȡ�ÿγ�����Ƶ��
                $video_count = $video_model->where("course_id = $courseid")->count();
                //��ȡ��ǰ��Ƶ��Ŀ¼�е�λ��
                $sequence_num=intval($video_data[0]['sequence_num']);
                $next_video_sequence_num = $sequence_num+1;
                $last_video_sequence_num = $sequence_num-1;
                switch($sequence_num){
                    //����ǵ�һ����Ƶ
                    case 1:
                        if($video_count==1){
                            //���һ����һ����Ƶ��ʲô��������
                        }else{
                            //���һ�������Ƶ��ֻ������һ��
                            $next_video = $video_model->where("sequence_num = $next_video_sequence_num")->find();
                            $this->assign('next_video_data',$next_video);
                        }
                        break;
                    //��������һ����Ƶ
                    case $video_count:
                        if($video_count==1){
                            //���һ����һ����Ƶ��ʲô��������
                        }else{
                            //���һ�������Ƶ��ֻ������һ��
                            $last_video = $video_model->where("sequence_num = $last_video_sequence_num")->find();
                            $this->assign('last_video_data',$last_video);
                        }
                        break;
                    default:
                        //�������Ƶ�м�
                        $last_video = $video_model->where("sequence_num = $last_video_sequence_num")->find();
                        $next_video = $video_model->where("sequence_num = $next_video_sequence_num")->find();
                        $this->assign('last_video_data',$last_video);
                        $this->assign('next_video_data',$next_video);
                        break;
                }
                //���ݱ�ǩ��ȡ���ϰ��+�����Դ
                $tag_arr=explode(",",$video_data[0]['video_tag']);
                $resource_arr=array();
                foreach($tag_arr as $key=>$value){
                    $tagid=intval($tag_arr[$key]);
                    $question_arr[$key]=M('question_tag')->where("tag_id = $tagid")->find();
                    $resource_select[$key]=M('resource')->where("FIND_IN_SET($tagid,resource_tag)")->field('resource_id,resource_name')->select();
                    $resource_arr=array_merge($resource_arr,$resource_select[$key]);
                }
                $this->assign('question_arr',$question_arr);
                //ȥ�������е��ظ���
                if(!empty($resource_arr)){
                    $inside_keyname_Arr = array_keys(end($resource_arr));//�洢�ڲ�����ļ���
                    //array_keys()���ذ������������м�����һ�������飺
                    //end() �����������ڲ�ָ��ָ�����һ��Ԫ�أ������ظ�Ԫ�ص�ֵ������ɹ���
                    //��ά,Ҳ������implode,��һά����ת��Ϊ��-���ӵ��ַ���
                    foreach ($resource_arr as $v){
                        $v = join("-",$v);
                        $temp[] = $v;
                    }
                    //ȥ���ظ����ַ���,Ҳ�����ظ���һά����
                    $temp = array_unique($temp);

                    //�ٽ��𿪵�����������װ
                    foreach ($temp as $k => $v)
                    {
                        $tempArr = explode("-",$v);//���ȥ��֮����ַ���

                        foreach($tempArr as $tempkey => $tempval)
                            $resource_arr_out[$k][$inside_keyname_Arr[$tempkey]] = $tempval;
                    }
                    //����������7����ȡǰ7����Դ
                    if(count($resource_arr_out)>7){
                        $resource_arr_out=array_slice($resource_arr_out,0,7);
                    }
                    $this->assign('resource_arr',$resource_arr_out);
                }

                //���ݱ�ǩ��ȡ�����Դ
                $this->display(":courseVideo");
            }else{
                echo"�����ڸ���Ƶ��";
                exit;
            }
        }else{
            echo"�����ڸ���Ƶ��";
            exit;
        }
    }

}
