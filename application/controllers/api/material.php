<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Material extends CI_Controller {

	function __construct() {
		parent::__construct();
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		$this->load->model('material_model');
	}

	function getMaterialSeries() {
		echo json_encode($this->material_model->getMaterialSeries());
	}
	function getMaterialDetail() {
		$inputData = $this->input->get(NULL, true);
		$rawMaterialId = $inputData['rawMaterialId'];
		echo json_encode($this->material_model->getMaterialDetail($rawMaterialId));
	}
}

/* End of file material.php */
/* Location: ./application/controllers/api/material.php */