<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('M_data');
		$this->load->library('session');
		//$this->load->helper('cart_helper');
	}

	public function index()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
		$view['body'] = $this->load->view('page/bodyTrangchu', NULL, TRUE);
		$footerContent['footerContent'] = $this->load->view('page/footer content/footerTrangchu', NULL, TRUE);
		$view['footer'] = $this->load->view('home/footer', $footerContent, TRUE);
		$this->load->view('home/masterHome', $view);
	}

	public function search()
	{
		$view['header'] = $this->load->view('home/header', NULL, TRUE);
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
