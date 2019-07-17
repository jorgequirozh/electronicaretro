<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 
	 public function __construct() {
        parent::__construct();
		$this->load->helper('array');
		$this->load->helper('url');
		 $this->load->model('delete_model'); 
		 $this->load->model('insert_model');

    }


	public function index()
	{
		//mostrar barra superior
		    $this->load->view('header');
		//Add
		//Including validation library
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
$this->form_validation->set_rules('Product_name', 'Nombre del producto', 'required|max_length[17]');
$this->form_validation->set_rules('Product_code', 'Codigo', 'required');
$this->form_validation->set_rules('Product_price', 'Precio', 'required');
$this->form_validation->set_rules('Product_description', 'Descripcion', 'required|max_length[30]');

if ($this->form_validation->run() == FALSE) {
$this->load->view('insert_view');
} else {

$config['upload_path'] = './productimg';
$config['allowed_types'] = 'gif|jpg|png|jpeg';
$this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')){
            // If the upload fails
            echo $this->upload->display_errors('<p>', '</p>');
        }else{
            $data_upload_files = $this->upload->data();
/*
            $image = $data_upload_files['full_path'];
*/
            $imgpath='/productimg/';
            $image = $imgpath.$data_upload_files['file_name'];
        }

$data = array(
	'name' => $this->input->post('Product_name'),	
	'code' => $this->input->post('Product_code'),
	'image' => $image,
	'price' => $this->input->post('Product_price'),
	'description' => $this->input->post('Product_description')
);
//Transfering data to Model
$this->insert_model->form_insert($data);
$data['message'] = 'Data Inserted Successfully';
//Loading View
$this->load->view('insert_view', $data);

}
//delete
		$id = $this->uri->segment(3);
        $data['products'] = $this->delete_model->show_products();
        $data['single_product'] = $this->delete_model->show_product_id($id);
        $this->load->view('delete_view', $data);
	}
}
?>
