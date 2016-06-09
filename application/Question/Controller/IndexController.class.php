<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Question\Controller;
use Common\Controller\HomeBaseController;
/**
 * 刷题首页
 */
class IndexController extends HomeBaseController {

    function _initialize() {
        parent::_initialize();
        $this->question_tag_model =D("Common/question_tag");
        $this->resource_type_model =D("Common/resource_type");
        $this->question_model =D("Common/question");
    }
    //首页
    public function index() {
        $this->display(':index');
    }
    public function alone_train(){
        //单项训练
        //获取大类 类目信息-导航栏
        $type_arr=$this->resource_type_model->where('type_type = 1')->select();
        //获取小类
        foreach($type_arr as $key=>$value){
            $typeid=intval($type_arr[$key]['type_id']);
            $tagarr[$typeid]=$this->question_tag_model->where("father_type = $typeid")->select();
        }
        $this->assign('tagarr',$tagarr);
        $this->assign('typeinfo',$type_arr);
        //获取所有标签
        $alltag=$this->question_tag_model->select();
        $this->assign('tag_arr',$alltag);
//        dump($alltag);

        $this->display(":alone_train");
    }
    public function alone_question_random(){
        //单项训练   题目详情  随机生成题目顺序 random
//        获取题目标签
        $tagid=intval($_GET['id']);
//        dump($tagid);
        $question_arr=$this->question_model->where("find_in_set($tagid,question_log)")->select();
        shuffle($question_arr);
//        dump($question_arr);
        $question_arr = array_slice($question_arr,0,5);
        $this->assign('question_arr',$question_arr);
        $this->display(":alone_question");
    }
    public function practice_test(){
        //综合模拟考试
        $this->display(":practice_test");
    }

}
