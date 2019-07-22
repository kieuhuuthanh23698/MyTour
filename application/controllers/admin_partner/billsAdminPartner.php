<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class billsAdminPartner extends CI_Controller {

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
//        $this->session->unset_userdata("partner");
		$view['body'] = $this->load->view('admin_partner/pages_admin_partner/billsAdminPartner', null, TRUE);
		$this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
	}
    public function listbill(){
        $id_destination = $this->session->userdata("partner")["id_destination"];
        $query = "select * from bills where id_dest = '".$id_destination."'";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
    }
    public function getBillDetail(){
        $id_destination = $this->session->userdata("partner")["id_destination"];
        $idBill = $_POST["idBill"];
        
        $query = "select * from billdetail, roomtypedetail, roomtype where billdetail.id_room = roomtypedetail.id_room and roomtype.id_roomType = roomtypedetail.id_room and id_dest = '".$id_destination."' and id_bill = '".$idBill."' ";
        $data = $this->M_data->load_query($query);
        
        echo json_encode($data);
    }
    
}
