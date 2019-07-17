<?php 

if (!defined('BASEPATH')) 
    exit('No direct script access allowed'); 
 
class Delete extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
        //load model 
        $this->load->helper('form');
       $this->load->model('delete_model'); 
    } 
    public 
    function index() { 
        $this->load->view('header');
        $id = $this->uri->segment(3);
        $data['products'] = $this->delete_model->show_products();
        $data['single_product'] = $this->delete_model->show_product_id($id);
        $this->load->view('delete_view', $data);
        
         }
function show_product_id() {
        $id = $this->uri->segment(3);
        $data['products'] = $this->delete_model->show_products();
        $data['single_product'] = $this->delete_model->show_product_id($id);
        $this->load->view('delete_view', $data);
       
    }
    
//function to Delete selected record from database
function delete_product_id() {
        $id = $this->uri->segment(3);
        $this->delete_model->delete_product_id($id);
         $this->show_product_id();
    }

    
    }
    