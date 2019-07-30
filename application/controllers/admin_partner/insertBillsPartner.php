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

    public function getListRoom(){
        $id_destination = $this->session->userdata("partner")["id_destination"];
        $now = getdate();
        $dateFrom = $now["year"]."/".$now["mon"]."/".$now["mday"];
        if(isset($_POST["dateFrom"])){
            $dateFrom = $_POST["dateFrom"];
        }
        $dateTo = $now["year"]."/".$now["mon"]."/".$now["mday"];
        if(isset($_POST["dateTo"])){
            $dateTo= $_POST["dateTo"];
        }
        $query = "call roomCanOrder('".$id_destination."','".$dateFrom."','".$dateTo."')";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
    }
    public function getRoomInf(){
        $id_destination = $this->session->userdata("partner")["id_destination"];
        $id_roomType = $_POST["id_roomType"];
        $dateFrom = $_POST["timeCheckIn"];
        $dateTo = $_POST["timeCheckOut"];
        $query = "call getRoomInf('".$id_destination."','".$dateFrom."','".$dateTo."','".$id_roomType."')";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
        
    }
    public function insertBill(){
        $dataBill["id_dest"] = $this->session->userdata("partner")["id_destination"];
        $dataBill["id_customer"] = 0;
        $dataBill["name_cus"] = $_POST["name"];
        $dataBill["phone_cus"] = $_POST["phone"];
        $dataBill["email_cus"] = $_POST["mail"];
        $dataBill["address_cus"] = $_POST["address"];
        $dataBill["totalMoney"] = $_POST["totalMoney"];
        
        $dataBillDetail["id_bill"] = $this->M_data->insert('bills',$dataBill);
        
        $listRoom = json_decode($_POST["listRoom"]);
        for($i = 0; $i< count($listRoom); $i++){
            $arr = (array)$listRoom[$i];
            $dataBillDetail["id_room"]= $arr["idRoom"];
            $dataBillDetail["roomquantum"] = $arr["roomQuantum"];
            $dataBillDetail["dateFrom"] = $arr["dateFrom"];
            $dataBillDetail["dateTo"] = $arr["dateTo"];
            $dataBillDetail["money"] = $arr["money"];
            $this->M_data->insert('billdetail',$dataBillDetail);
        }
        echo "Đặt Phòng Thành Công";
    }

    
}
