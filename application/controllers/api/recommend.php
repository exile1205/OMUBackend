<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Recommend extends CI_Controller {
	function __construct() {
		parent::__construct();
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		$this->load->model('recommend_model');
	}

	public function getRecommand() {
		$data = $this->recommend_model->getRecommend();
		echo json_encode($data);
	}

}

/* End of file recommand.php */
/* Location: ./application/controllers/api/recommand.php */