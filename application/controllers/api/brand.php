<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Brand extends CI_Controller {
	function __construct() {
		parent::__construct();
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		$this->load->model('brand_model');
	}
	public function getBrandNameList() {
		$brandNameList = $this->brand_model->getBrandNameList()->result_array();

		echo json_encode($brandNameList);
	}
	public function getBrandDetail() {
		$inputData = $this->input->get(NULL, true);
		$brandId = $inputData['brandId'];
		$brand = $this->brand_model->getBrand(['id' => $brandId]);
		echo json_encode($brand);
	}
}

/* End of file brand.php */
/* Location: ./application/controllers/api/brand.php */