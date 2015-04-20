<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Recommend_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
// create
	public function addRecommend($obj) {
		$this->db->insert('Recommender', $obj);
		return $this->db->insert_id();
	}
//select
	public function getRecommend() {
		$data['recommenderList'] = $this->db->get('Recommender')->result_array();
		$data['bannerImgList'] = $this->getRecommandViewImg(3);
		// print_r($data['bannerImgList']);
		return $data;
	}
	private function getRecommandViewImg($recommandViewId) {
		$this->db->select('imgUrl');
		$this->db->where('viewId', $recommandViewId);
		$result = $this->db->get('ViewImg')->result_array();
		$data = [];
		foreach ($result as $link) {
			array_push($data, $link['imgUrl']);
		}
		return $data;
	}
//update
	//delete

}

/* End of file recommand_model.php */
/* Location: ./application/models/recommand_model.php */