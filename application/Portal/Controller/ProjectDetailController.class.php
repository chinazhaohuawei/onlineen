<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
/**
 * 项目详情
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class ProjectDetailController extends HomeBaseController {
    //项目详情
    public function index() {

        $id=intval($_GET['id']);//项目id
        $userid=sp_get_current_userid();//当前用户id
        $itemModel = M('item');
        $teamModel = M('item_team');
        $memberModel = M('item_team_member');
        $noteModel = M('item_note');
        $attentionModel = M('user_attention');

        $data_item = $itemModel->where("item_id = $id AND item_status = 1")->select();//查询项目信息
        $pic_name = explode(",",$data_item[0]['item_picture']);    //截取项目图片信息
        $data_item=$data_item[0];//缩减数组层数
        $data_item['item_picture']=$pic_name;

        $data_team = $teamModel->where("item_id = $id")->field("team_content,team_logo")->select();
        $data_item['item_team']=$data_team[0];

        $data_member = $memberModel->where("item_id = $id AND member_status = 1")->field("member_name,member_position,member_info,member_experience")->select();
        $data_member_num = count($data_member);
        $data_item["item_team_member_num"]=$data_member_num;
        for($i = 0;$i<$data_member_num;$i++){
            $exper_name = explode(",",$data_member[$i]['member_experience']);//截取经历信息
            $data_member[$i]['member_experience'] = $exper_name;
            $data_item["item_team_member$i"] = $data_member[$i];
        }
        $data_note = $noteModel->where("item_id = $id AND note_status = 1")->order("note_time DESC")->field("note_time,note_content")->select();
        $data_note_num = count($data_note);
        for($i=0;$i<$data_note_num;$i++){
            $data_note[$i]['note_time'] = date('Y-m-d',$data_note[$i]['note_time']);
        }
        $data_item["item_note"]=$data_note;

        //获取当前用户对项目的关注状态
        $data_attention = $attentionModel->where("item_id = $id AND user_id= $userid")->field("attention_status")->select();
        if($data_attention[0]['attention_status']){
            $data_item['attention_status'] = 1;
        }else{
            $data_item['attention_status'] = 0;
        }

        $this->assign("data_item",$data_item);
        $this -> display(':proinfo');
    }

}
