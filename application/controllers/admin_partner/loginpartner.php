<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginpartner extends CI_Controller {

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
		if($this->session->has_userdata('partner'))
 			redirect(base_url('admin_partner/homeAdmin'));
 		else
	 		$this->load->view('admin_partner/home_admin_partner/loginPartner');
	}

	public function login()
	{
		$username = $this->input->post('use_login');
 		$password = $this->input->post('password');
 		//$password = md5($password);
 		$query = "select * from destination where destinationUser = '".$username."' and destinationPassword = '".$password."'";
		$result = $this->M_data->load_query($query);
		if(count($result) > 0)
		{
 			$this->session->set_userdata('partner', $result);
 			$this->session->set_userdata('', $result);
 			redirect(base_url('admin_partner/homeAdmin'));
 		}
 		else
 		{
 			echo "<script> alert('Sai mật khẩu !');</script>";
			echo "<script> window.location.href = '../admin_partner/loginpartner';</script>";
 		}
 	}
}
