<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginAdmin extends CI_Controller {

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
//		if($this->session->has_userdata('admin'))
// 			redirect(base_url('admin/reviewList'));
// 		else
	 		$this->load->view('admin/pages_admin/loginAdmin');
	}

	public function login()
	{
		$username = $this->input->post('use_login');
 		$password = $this->input->post('password');
 		$query = "select * from admin where adUser = '".$username."' and adPassword = '".$password."'";
		$result = $this->M_data->load_query($query);
		if(count($result) > 0)
		{
            $arr_user["user"] = $result[0]["adUser"];
            $arr_user['password'] = $result[0]['adPassword'];
	
			$this->session->set_userdata("admin",$arr_user);
 			redirect(base_url('admin/reviewList'));
 		}
 		else
 		{
 			echo "<script> alert('Sai mật khẩu !');</script>";
			echo "<script> window.location.href = '../loginAdmin';</script>";
 		}
 	}
}
