<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class insertBillsPartner extends CI_Controller {

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
		$view['body'] = $this->load->view('admin_partner/pages_admin_partner/insertBillsPartner', null, TRUE);
		$this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
	}

    
}
