<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Material_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
// create
	public function addMaterial($obj) {
		$this->db->insert('RawMaterial', $obj);
		return $this->db->insert_id();
	}
//select
	public function getMaterialDetail($id) {
		$this->db->where('id', $id);
		$data = $this->db->get('RawMaterial')->result_array()[0];
		$this->db->where('rawMaterialId', $id);
		$this->db->order_by('displaySequence', 'asc');
		$data['desc'] = $this->db->get('RawMaterialDescription')->result_array();
		return $data;
	}

	public function getMaterialSeries() {
		$this->db->select('materialSeries as series');
		$this->db->group_by('materialSeries');
		$data = $this->db->get('RawMaterial')->result_array();
		$return = [];
		foreach ($data as $series) {
			$tmp = $series;
			$tmp['productItem'] = $this->getMaterialProduct($series['series']);
			array_push($return, $tmp);
		}

		return ['productSeries' => $return];
	}

	private function getMaterialProduct($series) {
		$this->db->select('
				id as material_id,
				name as material_name
			');
		$this->db->where('materialSeries', $series);
		return $this->db->get('RawMaterial')->result_array();
	}
//update
	//delete

}

/* End of file material_model.php */
/* Location: ./application/models/material_model.php */