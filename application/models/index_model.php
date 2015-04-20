<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_model extends CI_Model {

	function __construct()
    {
		parent::__construct();
    }
// create
	public function addIndex($obj){
		$this->db->insert('Index', $obj);
		return $this->db->insert_id();
	}
//select
	public function getIndex($limit,$skip){
		return $this->db->get('Index', $limit, $skip);
	}
//update
//delete

}

/* End of file index_model.php */
/* Location: ./application/models/index_model.php */