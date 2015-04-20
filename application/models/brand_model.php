<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Brand_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

// create
	public function addBrand($obj) {
		$this->db->insert('Brand', $obj);
		return $this->db->insert_id();
	}
	public function addBrandSeries($obj) {
		$this->db->insert('BrandSeries', $obj);
		return $this->db->insert_id();
	}
//select
	public function getBrandNameList() {
		$this->db->select('id,name');
		$query = $this->db->get('Brand');
		return $query;
	}

	public function getBrand($brandObj) {
		$this->db->select('b.*');
		$this->db->from('Brand as b');
		$this->db->where('b.id', $brandObj['id']);
		$brand = $this->db->get()->result_array();
		$brand[0]['brandSlideImgList'] = $this->getBrandViewImg($brand[0]['viewId']);
		$brand[0]['brandStoryList'] = $this->getBrandStory($brandObj['id']);
		return $brand[0];
		// $brandStory = $this->getBrandStory($brandObj['id']);
	}
	private function getBrandStory($brandId) {
		$this->db->select('storyTitle,storyContent');
		$this->db->where('brand_id', $brandId);
		return $this->db->get('BrandStory')->result_array();
	}
	private function getBrandViewImg($brandViewId) {
		$this->db->select('imgUrl');
		$this->db->where('viewId', $brandViewId);
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

/* End of file brand_model.php */
/* Location: ./application/models/brand_model.php */