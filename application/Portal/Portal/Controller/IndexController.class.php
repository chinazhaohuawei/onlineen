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
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
		$type = I('type')?I('type'):1;
		$this->assign('type',$type);
		$course_model = M('course');
		$count=$course_model->where("course_type = $type")->count();
		$page = $this->page($count,5);
		$course_data = $course_model->where("course_type = $type")->select();
		$this->assign('Page',$page->show());
//		dump($page->show());
		$this->assign('course_data',$course_data);
    	$this->display(":index");
    }   

}


