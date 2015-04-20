<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('product_model');
		$this->load->model('blog_model');
		$this->load->model('index_model');
	}
	public function getIndex() {

	}
}

/* End of file home.php */
/* Location: ./application/controllers/api/home.php */