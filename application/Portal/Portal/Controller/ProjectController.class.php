<?php 
namespace Portal\Controller;
use Common\Controller\HomeBaseController;

/**
* 项目详情页控制器
*/
class ProjectController extends HomeBaseController
{
	//项目创意阶段
	public function index() {
		$item_info_model = M('item_info');
		$item_label_model = M('item_label');
		$item_label_relation_model = M('item_label_relation');
		$data_item_info = $item_info_model->where('item_status = 1')->order('item_id DESC')->select();
		$info_num = count($data_item_info);
		for($i=0;$i<$info_num;$i++){
			$data_item_label_relation = $item_label_relation_model->where("item_id = {$data_item_info[$i]['item_id']} AND relation_status = 1")->field('label_id')->select();
			$relation_num = count($data_item_label_relation);
			$label_num = 0;
			for($j=0;$j<$relation_num;$j++){
				$data_item_label = $item_label_model ->where("label_id = {$data_item_label_relation[$j]['label_id']}")->field('label_name')->select();
				$item_label_list[$label_num++] = $data_item_label[0]['label_name'];
			}
			$data_item_info[$i]['item_label']=$item_label_list;
		}
		$this->assign("data_item_info",$data_item_info);
		$this -> display(':project');
	}
	//项目启动阶段
	public function start() {
		$item_info_model = M('item_info');
		$item_label_model = M('item_label');
		$item_label_relation_model = M('item_label_relation');
		$data_item_info = $item_info_model->where('item_status = 2')->order('item_id DESC')->select();
		$info_num = count($data_item_info);
		for($i=0;$i<$info_num;$i++){
			$data_item_label_relation = $item_label_relation_model->where("item_id = {$data_item_info[$i]['item_id']} AND relation_status = 1")->field('label_id')->select();
			$relation_num = count($data_item_label_relation);
			$label_num = 0;
			for($j=0;$j<$relation_num;$j++){
				$data_item_label = $item_label_model ->where("label_id = {$data_item_label_relation[$j]['label_id']}")->field('label_name')->select();
				$item_label_list[$label_num++] = $data_item_label[0]['label_name'];
			}
			$data_item_info[$i]['item_label']=$item_label_list;
		}
		$this->assign("data_item_info",$data_item_info);
		$this -> display(':project');
	}
	//项目已经上线
	public function online() {
		$item_info_model = M('item_info');
		$item_label_model = M('item_label');
		$item_label_relation_model = M('item_label_relation');
		$data_item_info = $item_info_model->where('item_status = 3')->order('item_id DESC')->select();
		$info_num = count($data_item_info);
		for($i=0;$i<$info_num;$i++){
			$data_item_label_relation = $item_label_relation_model->where("item_id = {$data_item_info[$i]['item_id']} AND relation_status = 1")->field('label_id')->select();
			$relation_num = count($data_item_label_relation);
			$label_num = 0;
			for($j=0;$j<$relation_num;$j++){
				$data_item_label = $item_label_model ->where("label_id = {$data_item_label_relation[$j]['label_id']}")->field('label_name')->select();
				$item_label_list[$label_num++] = $data_item_label[0]['label_name'];
			}
			$data_item_info[$i]['item_label']=$item_label_list;
		}
		$this->assign("data_item_info",$data_item_info);
		$this -> display(':project');
	}
	//项目已经融资
	public function financing() {
		$item_info_model = M('item_info');
		$item_label_model = M('item_label');
		$item_label_relation_model = M('item_label_relation');
		$data_item_info = $item_info_model->where('item_status = 4')->order('item_id DESC')->select();
		$info_num = count($data_item_info);
		for($i=0;$i<$info_num;$i++){
			$data_item_label_relation = $item_label_relation_model->where("item_id = {$data_item_info[$i]['item_id']} AND relation_status = 1")->field('label_id')->select();
			$relation_num = count($data_item_label_relation);
			$label_num = 0;
			for($j=0;$j<$relation_num;$j++){
				$data_item_label = $item_label_model ->where("label_id = {$data_item_label_relation[$j]['label_id']}")->field('label_name')->select();
				$item_label_list[$label_num++] = $data_item_label[0]['label_name'];
			}
			$data_item_info[$i]['item_label']=$item_label_list;
		}
		$this->assign("data_item_info",$data_item_info);
		$this -> display(':project');
	}
}


 ?>