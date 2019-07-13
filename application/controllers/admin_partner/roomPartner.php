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

	public function index()
	{
		$id = $this->session->userdata('partner')[0]['id_destination'];
		$data['conven'] = $this->M_data->load_query("select * from convenience");
		$data['roomType'] = $this->M_data->load_query("select * FROM roomtype WHERE id_roomType NOT IN (SELECT id_room FROM roomtypedetail WHERE id_dest = ".$id.")");
        $data['room'] = $this->M_data->load_query("select * FROM roomtype, roomtypedetail WHERE roomtype.id_roomType = roomtypedetail.id_room AND roomtypedetail.id_dest = ".$id); 
        $view['body'] = $this->load->view('admin_partner/pages_admin_partner/roomPartner', $data, TRUE);
        $this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
	}

	public function addRoom()
	{
		//var_dump($_FILES);
		if($this->input->post('roomType')){
			if (!empty($_FILES['imageRoom']['name'])){
				$config['upload_path'] = './public/images/products/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = $_FILES['imageRoom']['name'];
				$config['overwrite'] = TRUE;  

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('imageRoom'))
				{
					$uploadData = $this->upload->data();
					$data["imageRoom"] = $uploadData['file_name'];
				}
				else
				{
					$datas['errors'] = $this->upload->display_errors();
					$data["imageRoom"] = 'unknow1.png';
				}
			}
			else{
				$datas['errors'] = $this->upload->display_errors();
				$data["imageRoom"] = 'unknow2.png';
			}
			$data['id_dest'] = $this->session->userdata('partner')[0]['id_destination'];
			$data['id_room'] = $this->input->post('roomType');
			$data['area'] = $this->input->post('area');
			$data['view'] = $this->input->post('view');
			$data['bed'] = $this->input->post('bed');
			$data['quantum'] = $this->input->post('quantum');
			$data['price'] = $this->input->post('price');

			$id = $this->M_data->insert('roomtypedetail',$data);
			$room = $this->M_data->load_query("select * FROM roomtype, roomtypedetail WHERE roomtype.id_roomType = roomtypedetail.id_room AND roomtypedetail.id_dest = ".$data['id_dest']." AND roomtypedetail.id_room = ".$data['id_room']);
			echo json_encode($room);
		  	//var_dump($data);
		  	//var_dump($id);
		// 	//var_dump($this->input->post(''));
		// 	//echo "hello";
		// 	//$sp = $this->M_data->load_data('*', 'roomtypedetail', array('id_dest' => $id[0], 'id_room' => $id[1]));
		// 	// $tr = "<tr >
		// 	// <td>".$sp[0]['id_banner']."</td>
		// 	// <td><img src='images/".$sp[0]["image"]."' width = '400px'></img></td>
		// 	// <td><input onclick='check(".$sp[0]['id_banner'].")' type='checkbox' checked></td>
		// 	// <td>".$sp[0]['update_at']."</td>
		// 	// <td><button onclick='xoa(".$sp[0]['id_banner'].")'>XÓA</button></td>
		// 	// </tr>";
		// 	// echo $tr;
	 //    //redirect(base_url('banner'));
		// }
		}
		else
		{
			echo "Không nhận được dữ liêu !";
			//echo $this->input->post('');
		//echo "hello";
		}
	}

	public function delete()
	{
		$id_dest = $this->session->userdata('partner')[0]['id_destination'];
		$id_room = $this->input->post('id');
		$query = "delete from roomtypedetail where id_dest = ".$id_dest." and id_room = ".$id_room;
		$this->db->query($query);
		echo "Delete successful !";
	}
}
