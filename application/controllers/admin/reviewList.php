<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reviewList extends CI_Controller {

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
		$view['body'] = $this->load->view('admin/pages_admin/reviewList', null, TRUE);
		$this->load->view('admin/home_admin/masterAdmin', $view);
	}
    public function listDes(){
        $query = "select * from destination where status = 1 ";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
    }
    public function confirmDes(){
        $id= $_POST["id"];
        $data["status"] = 0;
        $this->M_data->update($id, 'destination', $data);
        echo "Khách Sạn Đã Được Xác Nhận";
        
    }
    
}
