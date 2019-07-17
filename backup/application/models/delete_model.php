<?php

class delete_model extends CI_Model{

//function to select all from table name products
function show_products(){
$query = $this->db->get('tblproduct');
$query_result = $query->result();
return $query_result;
}

//function to select particular record from table name products 
function show_product_id($data){
        $this->db->select('*');
        $this->db->from('tblproduct');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;  
    }

//function to Delete selected record from table name products 	
function delete_product_id($id){
        $this->db->where('id', $id);
        $this->db->delete('tblproduct');   
    }
 
}

?>

