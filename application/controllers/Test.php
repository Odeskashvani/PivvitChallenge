<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('po');
	}
	public function index()
	{
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('offering', 'Offering', 'required');
		$this->form_validation->set_rules('customerName', 'Customer Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|numeric');
		if ($this->form_validation->run() == TRUE)
		{
			$data_add['offeringID']		= $this->input->post('offering');
			$data_add['customerName'] 		= $this->input->post('customerName');
			$data_add['quantity']			= $this->input->post('quantity');
			$result = $this->po->insert('purchase', $data_add);
			if(!empty($result) && $result['status'] == 'success')
				$this->session->set_flashdata("successmsg","<font class='success'><i class='fa fa-check'></i> Purchase Successfully created...!!</font>");
			else
				$this->session->set_flashdata("errormsg","<font class='error'><i class='fa fa-times-circle'></i> ".$result['msg']."</font>");
			redirect(base_url('index.php/test'));
		}
		$data['offering'] = $this->po->get_list('offering', array(), 'object');
		$this->load->view('offering', $data);
	}
	public function purchases(){
		$data['purchases'] = $this->po->get_list('purchase',array(),'object');
		$this->load->view('purchases', $data);
	}
}
