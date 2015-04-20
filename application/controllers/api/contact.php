<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Contact extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function addInfo() {
		$inputData = $this->input->post(NULL, true);
		if (
			empty($inputData['name']) ||
			empty($inputData['phone']) ||
			empty($inputData['email']) ||
			empty($inputData['willingContactWay']) ||
			empty($inputData['conveinentTime']) ||
			empty($inputData['questionType']) ||
			empty($inputData['questionTopic']) ||
			empty($inputData['questionContent'])
		) {
			echo json_encode(['fieldError' => 'Not enough infomation provided.']);
		} else {

		}
	}
	private function sendMail() {

	}
}

/* End of file contact.php */
/* Location: ./application/controllers/api/contact.php */