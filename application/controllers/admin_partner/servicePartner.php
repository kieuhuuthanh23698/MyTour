<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class servicePartner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_data');
		$this->load->library('session');
		//$this->load->helper('cart_helper');
	}

	public function index(){
		$id = $this->session->userdata('partner')['id_destination'];
		if($id != NULL)
		{
			$data['service'] = $this->M_data->load_query("select * from serviceextra, serviceextradetail where id_serviceExtra = id_service and status_service_des = 0 and id_dest = ".$id);
			//$data['roomType'] = $this->M_data->load_query("select * FROM roomtype WHERE id_roomType NOT IN (SELECT id_room FROM /roomtypedetail WHERE id_dest = ".$id.")");
	        //$data['room'] = $this->M_data->load_query("select * FROM roomtype, roomtypedetail WHERE roomtype.id_roomType = roomtypedetail.id_room AND roomtypedetail.id_dest = ".$id);
	        $view['body'] = $this->load->view('admin_partner/pages_admin_partner/servicePartner', $data, TRUE);
	        $this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
		}
		else
			redirect(base_url('admin_partner/loginpartner'));
	}

}
