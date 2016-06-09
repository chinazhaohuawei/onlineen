<?php

/**
 * 赞助
 */
namespace User\Controller;
use Common\Controller\HomeBaseController;
class SponsorController extends HomeBaseController {
    //登录
    public function index() {
        $this->display(":sponsor");
    }

}
