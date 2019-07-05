<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$giaodien['header'] = $this->load->view('home/header',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
		$giaodien['body'] = $this->load->view('page/trangchu',NULL,TRUE);
		$giaodien['footer2'] = $this->load->view('page/footer2',NULL,TRUE);
		$this->load->view('home/masterHome',$giaodien);
	}

	public function search()
	{
		$giaodien['header'] = $this->load->view('home/header',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
		$giaodien['body'] = $this->load->view('page/search',NULL,TRUE);
		$giaodien['footer2'] = $this->load->view('page/footer2',NULL,TRUE);
		$this->load->view('home/masterHome',$giaodien);
	}
}
