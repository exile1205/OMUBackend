<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Blog extends CI_Controller {
	function __construct() {
		parent::__construct();
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		$this->load->model('blog_model');
	}
	public function getBlogList() {
		$inputData = $this->input->get(NULL, true);

		empty($inputData['limit'])?($limit = 9):($limit = $inputData['limit']);
    	empty($inputData['skip'])?($skip = 0):($skip = $inputData['skip']);

		$result = $this->blog_model->getAllBlogs($limit,$skip);

    	echo json_encode(['blogList'=>$result]);
	}
	public function getBlogSide(){

		#$blogTypeList = $this->blog_model->getBlogTypeList()->result_array();
		$blogTypeList = $this->blog_model->getBlogTypeList();
		#var_dump($blogTypeList);
		echo json_encode($blogTypeList);
	}
	public function getBlog(){
		$inputData = $this->input->get(NULL, true);
		$blogId = $inputData['blogId'];
		$blog = $this->blog_model->getBlog(['id' => $blogId]);
		echo json_encode($blog);
	}
}