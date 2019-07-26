<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homeAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_data');
		$this->load->library('session');
		//$this->load->helper('cart_helper');
	}

	public function index()
	{
		//$this->session->unset_userdata('partner');
		$id = $this->session->userdata('partner')['id_destination'];
		//echo $id;
		if($id != null){
	        $data['partner'] = $this->M_data->load_query("select * from destination where id_destination = ".$id)[0]; 
	        $view['body'] = $this->load->view('admin_partner/pages_admin_partner/inforPartner', $data, TRUE);
	        $this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
		}
		else
		{
			redirect(base_url('admin_partner/loginpartner'));
		}
	}
}


































