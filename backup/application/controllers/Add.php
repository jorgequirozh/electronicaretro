<?php

class Add extends CI_Controller {

function __construct() {
parent::__construct();
$this->load->model('insert_model');
$this->load->helper('form');



}
function index() {
//Including validation library
    $this->load->view('header');
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
}

}

?>