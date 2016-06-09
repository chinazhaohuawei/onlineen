<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Resumes\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 简历
 */
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
		$this->display(':resume');
    }   

}


