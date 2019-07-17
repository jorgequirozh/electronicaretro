<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	 
	 public function __construct() {
        parent::__construct();
		$this->load->helper('array');
		$this->load->helper('url');
    }


	public function index()
	{
		$this->load->view('header');
		$cart_data=$this->cart->contents();
		$this->load->view('cart',array('cart_data' => $cart_data));
	}
}
?>
