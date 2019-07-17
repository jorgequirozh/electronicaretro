<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Home extends CI_Controller {

	 
	public function __construct(){
		parent::__construct();
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->model("Cart");
		$this->load->library('cart');
		$this->load->library('session');
	}


	public function index(){	
		$this->load->view('header');
		$cart_data=$this->Cart->get_cart();
		$added_data= $this->cart->contents();		
		$this->load->view('home',array('cart_data'=>$cart_data,'added_data'=>$added_data));
	}
		
	public function addtocart(){
		$id = $_POST['id'];
		$cart_data=$this->Cart->get_cart($id);
		$cart_data = json_decode( json_encode($cart_data), true);
		$data = array(
						'id'      => $id,
						'qty'     => 1,
						'price'   => $cart_data[0]["price"],
						'name'    => $cart_data[0]["name"],
						'title'	  => $cart_data[0]["name"],
						'image'	  => $cart_data[0]["image"],
						'code'	  => $cart_data[0]["code"],
						'description'=> $cart_data[0]["description"],
						
						);
			
		$cart_row = $this->cart->insert($data);	
		$cart = array_values($this->cart->contents($cart_row));

		$data = array(
		'status' => 'Success',
		'count'=>$this->cart->total_items(),
		);
		echo json_encode($data);		
		}
		
		
	public function reducecart(){
		  $row_id= $_POST['row'];
		
		 
	
		  $qty = ($_POST['qty'] - 1);   
		  $array=array('rowid' =>$row_id ,'qty'=>$qty );
		  $this->cart->update($array);
		
		  $data = array(
		  'status' => 'Success',
		  );
		  
		  echo json_encode($data);		
		  }	
		

	public function remove_cart_product(){
	  $row_id= $_POST['row'];
	  $qty=0;
	  $array=array('rowid' =>$row_id ,'qty'=>$qty );
	  $this->cart->update($array);
	   $data = array(
	  'status' => 'Success',
	  );
	  echo json_encode($data);
	  }	
		
	public function clear(){ 
	  $this->cart->destroy();  
	 }
}
?>
