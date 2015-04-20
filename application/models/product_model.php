<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	function __construct()
    {
		parent::__construct();
    }
// create
	public function addProduct($obj){

		// select Brand Series
		//
		$this->db->insert('Product', $obj);
		return $this->db->insert_id();
	}
//select
	public function getAllBrands(){
		$this->db->select('b.name as name,b.id as brandId');
		$brandList = $this->db->get('Brand as b')->result_array();
		$data = [];
		foreach ($brandList as $brand) {
			$tmp = $brand;
			$tmp['collections'] = $this->getBrandSeriseList($brand['brandId']);
			array_push($data,$tmp);
		}
		return $data;
	}

	public function getProducts($brandSeriesId,$limit,$skip){
		$this->db->select(
			'p.name as `name`,
			p.subTitle as `desc`,
			p.imgUrl as `photo`,
			p.externalLink as `link`'
			);
		$this->db->where('p.brandseries_id', $brandSeriesId);
		return $this->db->get('Product as p', $limit,$skip)->result_array();
	}

	public function getBrandSeriseList($brand_id){
		$this->db->select('
			bs.id as brandSeriesId,
			bs.seriesTitle as name
			');
		$this->db->where('bs.brand_id', $brand_id);
		$brandSeriesList = $this->db->get('BrandSeries as bs')->result_array();
		return $brandSeriesList;
	}

	public function getHotProduct(){
		$this->db->select(
			'p.name as `name`,
			p.subTitle as `desc`,
			p.imgUrl as `photo`,
			p.externalLink as `link`'
			);
		$this->db->where('p.hot >',0);
		$this->db->order_by('p.hot', 'desc');
		return $this->db->get('Product as p',5,0)->result_array();
	}

	public function getSaleProduct(){
		$this->db->select(
			'p.name as `name`,
			p.subTitle as `desc`,
			p.imgUrl as `photo`,
			p.externalLink as `link`'
			);
		$this->db->where('p.onSale >',0);
		$this->db->order_by('p.onSale', 'desc');
		return $this->db->get('Product as p',12,0)->result_array();
	}
//update
//delete

}

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */