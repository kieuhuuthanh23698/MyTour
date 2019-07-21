<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signinpartner extends CI_Controller {

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
        $this->load->view('admin_partner/home_admin_partner/signinPartner');
	}

    public function signIn(){
        $data["destinationName"] = $_POST["desName"];
        $data["destinationEmail"] = $_POST["email"];
        $data["destinationPhone"] = $_POST["phone"];
        $data["destinationUser"] = $_POST["userName"];
        $data[" destinationPassWord"] = $_POST["password"];
        
        $id = $this->M_data->insert("destination",$data);
        
        $query = "select * from destination where id_destination = '".$id."'";
		$result = $this->M_data->load_query($query);
        
        $this->session->unset_userdata("partner");
        
        $arr_user["id_destination"] = $result[0]["id_destination"];
        $arr_user['username'] = $result[0]['destinationUser'];
        $arr_user['password'] = $result[0]['destinationPassword'];
        $arr_user['status'] = $result[0]['status'];
	
        $this->session->set_userdata("partner",$arr_user);
        
        echo "<script> alert('Đăng Ký Tài Khoản Thành Công, Vui Lòng Cập Nhật Thông Tin Trong Danh Mục Thông Tin Khách Sạn !');</script>";
        echo "<script> window.location.href = '../homeAdmin';</script>";
    }
}
?>