<?php 
class products_model extends CI_Model { 
    function __construct() { 
        parent::__construct(); 
    } 
    public 
    function get_products() { 
        $result = $this->db->select('id, name')-> get('tblproduct')-> result_array(); 
 
        $product = array(); 
        foreach($result as $r) { 
            $product[$r['id']] = $r['name']; 
        } 
        $product[''] = 'Haga clic para seleccionar'; 
        return $product; 
    } 
    function deleteproduct($name){
    $this->db->where('name', $name);
    $this->db->delete('tblproduct');
    }
}