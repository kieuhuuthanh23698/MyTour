<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class roomPartner extends CI_Controller {

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
		$data['conven'] = $this->M_data->load_query("select * from convenience");
		$data['roomType'] = $this->M_data->load_query("select * FROM roomtype WHERE id_roomType NOT IN (SELECT id_room FROM roomtypedetail WHERE id_dest = ".$id.")");
        $data['room'] = $this->M_data->load_query("select * FROM roomtype, roomtypedetail WHERE roomtype.id_roomType = roomtypedetail.id_room AND roomtypedetail.id_dest = ".$id); 
        $view['body'] = $this->load->view('admin_partner/pages_admin_partner/roomPartner', $data, TRUE);
        $this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
	}

	public function addRoom(){
		if($this->input->post('roomType')){
			if (!empty($_FILES['imageRoom']['name'])){
				$config['upload_path'] = './public/images/dedicate/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['imageRoom']['name'];
				$config['overwrite'] = TRUE;  

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('imageRoom'))
				{
					$uploadData = $this->upload->data();
					$roomtypedetail["imageRoom"] = $uploadData['file_name'];
				}
				else
				{
					$datas['errors'] = $this->upload->display_errors();
					$roomtypedetail["imageRoom"] = 'unknow1.png';
				}
			}
			else{
				$datas['errors'] = $this->upload->display_errors();
				$roomtypedetail["imageRoom"] = 'unknow2.png';
			}
			$roomtypedetail['id_dest'] = $this->session->userdata('partner')['id_destination'];
			$roomtypedetail['id_room'] = $this->input->post('roomType');
			$roomtypedetail['area'] = $this->input->post('area');
			$roomtypedetail['view'] = $this->input->post('view');
			$roomtypedetail['bed'] = $this->input->post('bed');
			$roomtypedetail['quantum'] = $this->input->post('quantum');
			$roomtypedetail['price'] = $this->input->post('price');
			// var_dump($roomtypedetail);
			// echo '<br/>';
			// echo '<br/>';
			$id = $this->M_data->insert('roomtypedetail',$roomtypedetail);
			$room = $this->M_data->load_query("select * FROM roomtype, roomtypedetail WHERE roomtype.id_roomType = roomtypedetail.id_room AND roomtypedetail.id_dest = ".$roomtypedetail['id_dest']." AND roomtypedetail.id_room = ".$roomtypedetail['id_room']);

			$service = json_decode($this->input->post('service'));
			// var_dump($service);
			// echo '<br/>';
			// echo '<br/>';
			$conveniencedetail['id_desc'] = $this->session->userdata('partner')['id_destination'];
			$conveniencedetail['id_room'] = $this->input->post('roomType');
			for ($i=0; $i < count($service); $i++) { 
				$conveniencedetail['id_conve'] = $service[$i];
				$id = $this->M_data->insert('conveniencedetail',$conveniencedetail);
				// var_dump($conveniencedetail);
				// echo '<br/>';
				// echo '<br/>';
			}

			$phuThu = json_decode($this->input->post('phuThu'));
			$chinhsachphuthu['id_dest'] = $this->session->userdata('partner')['id_destination'];
			$chinhsachphuthu['id_room'] = $this->input->post('roomType');
			for ($i=0; $i < count($phuThu); $i++) { 
				$chinhsachphuthu['dieukien'] = $phuThu[$i][0];
				$chinhsachphuthu['mucphi'] = $phuThu[$i][1];
				$id = $this->M_data->insert('chinhsachphuthu',$chinhsachphuthu);
				// var_dump($chinhsachphuthu);
				// echo '<br/>';
				// echo '<br/>';
			}

			$luuY['id_dest'] = $this->session->userdata('partner')['id_destination'];
			$luuY['id_room'] = $this->input->post('roomType');
			$luuY['noi_dung'] = $this->input->post('luuY');
			$id = $this->M_data->insert('luu_y',$luuY);
			// var_dump($luuY);
			// 	echo '<br/>';
			// 	echo '<br/>';

			$chinhSachHuy['id_dest'] = $this->session->userdata('partner')['id_destination'];
			$chinhSachHuy['id_room'] = $this->input->post('roomType');
			$chinhSachHuy['noi_dung'] = $this->input->post('chinhSachHuy');
			$id = $this->M_data->insert('chinhsachhuy',$chinhSachHuy);
			// var_dump($chinhSachHuy);
			// 	echo '<br/>';
			echo json_encode($room);
		}
		else
		{
			echo "Không nhận được dữ liêu !";
		}
	}

	public function delete(){
		$id_dest = $this->session->userdata('partner')['id_destination'];
		$id_room = $this->input->post('id');
		$query = "delete from roomtypedetail where id_dest = ".$id_dest." and id_room = ".$id_room;
		$this->db->query($query);
		$query = "delete from luu_y where id_dest = ".$id_dest." and id_room = ".$id_room;
		$this->db->query($query);
		$query = "delete from conveniencedetail where id_desc = ".$id_dest." and id_room = ".$id_room;
		$this->db->query($query);
		$query = "delete from chinhsachphuthu where id_dest = ".$id_dest." and id_room = ".$id_room;
		$this->db->query($query);
		$query = "delete from chinhsachhuy where id_dest = ".$id_dest." and id_room = ".$id_room;
		$this->db->query($query);
		echo json_encode($this->M_data->load_query("select * FROM roomtype WHERE id_roomType NOT IN (SELECT id_room FROM roomtypedetail WHERE id_dest = ".$id_dest.")"));
	}

	public function getRoom(){
		$id_room = $this->input->post('id_room');
		$id_dest = $this->session->userdata('partner')['id_destination'];

		$query = 'select * from roomtype where id_roomType = '.$id_room;
		$result['roomtype'] =  $this->M_data->load_query($query);

		$query = 'select * from roomtypedetail where id_dest = '.$id_dest.' and id_room = '.$id_room;
		$result['roomtypedetail'] =  $this->M_data->load_query($query);

		$query = 'select * from conveniencedetail where id_desc = '.$id_dest.' and id_room = '.$id_room;
		$result['conveniencedetail'] = $this->M_data->load_query($query);

		
		$query = 'select * from chinhsachphuthu where id_dest = '.$id_dest.' and id_room = '.$id_room;
		$result['chinhsachphuthu'] = $this->M_data->load_query($query);
		
		$query = 'select * from luu_y where id_dest = '.$id_dest.' and id_room = '.$id_room;
		$result['luu_y'] = $this->M_data->load_query($query);
		
		$query = 'select * from chinhsachhuy where id_dest = '.$id_dest.' and id_room = '.$id_room;
		$result['chinhsachhuy'] = $this->M_data->load_query($query);

		echo json_encode($result);
	}

	public function getRoomType(){
		$id = $this->session->userdata('partner')['id_destination'];
		$result = $this->M_data->load_query("select * FROM roomtype WHERE id_roomType NOT IN (SELECT id_room FROM roomtypedetail WHERE id_dest = ".$id.")");
		echo json_encode($result);
	}

	public function update(){
		echo json_encode(array('res' => 'Update'));
	}

}
