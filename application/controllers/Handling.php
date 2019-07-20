<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {

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
		// set_time_limit(0);
		// $cities = $this->M_data->getAPI('https://thongtindoanhnghiep.co/api/city');
		// $arrCity = array();
		// for ($i = 0; $i < count($cities['LtsItem']); $i++) { 
		// 	array_push($arrCity, array('id' => $cities['LtsItem'][$i]['ID'], 'title' => $cities['LtsItem'][$i]['Title'], 'type' => 'City'));
		// }

		// echo count($arrCity);
		// // echo "Cities <br><br>";
		// // for ($i=0; $i < count($arrCity); $i++) { 
		// // 	echo $arrCity[$i]['id']." ".$arrCity[$i]['title']." ".$arrCity[$i]['type']."<br>";
		// // }



		// $arrDistrict = array();
		// for ($i=0; $i < count($arrCity); $i++) {
		// 	//echo 'https://thongtindoanhnghiep.co/api/city/'.$arrCity[$i]['id'].'/district<br>';
		// 	$district = $this->M_data->getAPI('https://thongtindoanhnghiep.co/api/city/'.$arrCity[$i]['id'].'/district');
		// 	for ($i = 0; $i < count($district); $i++) { 
		// 		array_push($arrDistrict, array('id' => $district[$i]['ID'], 'title' => $district[$i]['Title'], 'type' => 'District'));
		// 	}
		// }

		// echo count($arrDistrict);
		// // echo "District <br><br>";
		// // for ($i=0; $i < count($arrDistrict); $i++) { 
		// // 	echo $arrDistrict[$i]['id']." ".$arrDistrict[$i]['title']." ".$arrDistrict[$i]['type']."<br>";
		// // }

		// $arrWard = array();
		// for ($i=0; $i < count($arrDistrict); $i++) {
		// 	echo 'https://thongtindoanhnghiep.co/api/district/'.$arrDistrict[$i]['id'].'/ward<br>';
		// 	$ward = $this->M_data->getAPI('https://thongtindoanhnghiep.co/api/district/'.$arrDistrict[$i]['id'].'/ward<br>');
		// 	for ($i = 0; $i < count($ward); $i++) { 
		// 		array_push($arrWard, array('id' => $ward[$i]['ID'], 'title' => $ward[$i]['Title'], 'type' => 'District'));
		// 	}
		// }

		// echo count($arrWard);
		// echo "District <br><br>";
		// for ($i=0; $i < count($arrDistrict); $i++) { 
		// 	echo $arrDistrict[$i]['id']." ".$arrDistrict[$i]['title']." ".$arrDistrict[$i]['type']."<br>";
		// }


		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['banner'] = $this->load->view('home/banner', NULL, TRUE);
		$view['search'] = $this->load->view('home/search', NULL, TRUE);
		$view['body'] = $this->load->view('page/bodyTrangchu', NULL, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
	}

	// function fetch()
	// {
	//   $this->load->model('autocomplete_model');
	//   echo $this->autocomplete_model->fetch_data($this->uri->segment(3));
	// }

	public function search()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['search'] = $this->load->view('home/search', NULL, TRUE);
		$view['body'] = $this->load->view('page/bodySearch', NULL, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerSearch', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
	}

	public function search2()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['body'] = $this->load->view('page/bodySearch2', NULL, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
	}

	public function pms()
	{
		$this->load->view('home/loginDoiTac');	
	}

	public function detailHotel()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['body'] = $this->load->view('page/bodyChiTietHotel', NULL, TRUE);
		//$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', NULL, TRUE);
		$this->load->view('home/masterHome', $view);	
	}
}
