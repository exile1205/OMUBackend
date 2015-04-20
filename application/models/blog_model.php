<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {
	function __construct()
    {
		parent::__construct();
    }
// create
	public function addBlog($obj){
		$this->db->insert('Blog', $obj);
		return $this->db->insert_id();
	}
//select
	public function getAllBlogs($limit,$skip){
		$this->db->select('id,title,articleType,SUBSTRING(content,1,50) as content,time', FALSE);
		return $this->db->get('Blog', $limit, $skip)->result_array();
	}
	public function getBlogTypeList(){
		$this->db->distinct();
		$this->db->select('articleType');

		$query = $this->db->get('Blog');
	    $list_array = array();

	    foreach($query->result_array() as $row)
	    {
	         $list_array[] = $row['articleType']; // add each user id to the array
	    }

	    $this->db->select('id,title');
	    //$t

	    $outputList = array();
	    foreach ($list_array as $type) {
	    	$this->db->select('id,title');
	    	$this->db->where('articleType',$type);
	    	$typeQ = $this->db->get('Blog')->result_array();
	    	#$type = array($type=>$typeQ)
	    	$outputList[$type] = $typeQ;
	    }
		return $outputList;
	}
	public function getBlog($id){
		$this->db->where('id', $id['id']);
		return $this->db->get('Blog')->result_array();
	}
//update
//delete

}

/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */