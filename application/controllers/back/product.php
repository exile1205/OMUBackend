<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin:*');
		$this->load->model('product_model');
    }

    function setProducts(){

    	$inputData = $this->input->get(NULL,true);

    	if(empty($inputData['brandSeriesId'])){
    		return json_encode(["status"=>"Error Input brandSeriesId"]);
    	}
    	$brandSeriesId = $inputData['brandSeriesId'];
    	empty($inputData['limit'])?($limit = 12):($limit = $inputData['limit']);
    	empty($inputData['skip'])?($skip = 0):($limit = $inputData['skip']);

    	$result = $this->product_model->getProducts($brandSeriesId,$limit,$skip);
    	echo json_encode(['productList'=>$result]);
    }
    function getProductsSpecial(){

    	$hot = $this->product_model->getHotProduct();
    	$sale = $this->product_model->getSaleProduct();
    	$data = ['hot'=>$hot,'sale'=>$sale];
    	echo json_encode($data);

    }
}

/* End of file product.php */
/* Location: ./application/controllers/api/product.php */