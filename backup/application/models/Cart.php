<?php
class Cart extends CI_Model {
 public function __construct() {
        parent::__construct();
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->database('default');
    }
	function get_cart($id = ""){
	   
	   $data = array();
	   if(!empty($id)){
	   $this->db->where('id',$id);
	   }
       $query = $this->db->get('tblproduct');
       $res   = $query->result();        
       return $res;
		
    }
	
	
}
?>