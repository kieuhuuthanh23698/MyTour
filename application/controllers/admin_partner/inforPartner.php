<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inforPartner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_data');
        $this->load->library('session');
    }

    public function index()
    {
        $id = $this->session->userdata('partner')[0]['id_destination'];
        $data['partner'] = $this->M_data->load_query("select * from destination where id_destination = ".$id)[0]; 
        $view['body'] = $this->load->view('admin_partner/pages_admin_partner/inforPartner', $data, TRUE);
        $this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
    }

    public function update()
    {
        // $destinationEmail = $this->input->post('use_email');
        // $destinationName = $this->input->post('nameEdit');
        // $destinationPhone = $this->input->post('phoneEdit');
        // $destinationAddress = $this->input->post('addressEdit');
        // $destinationCounty = $this->input->post('cityEdit');
        // $destinationDistrice = $this->input->post('ditrictEdit');
        // $destinationWard = $this->input->post('wardEdit');
        // $star = $this->input->post('starRatings');
        // $destinationUser = $this->input->post('cancelTime');
        // $destinationPassword = $this->input->post('usename');
        // $cancelTime = $this->input->post('password');
        $id = $this->session->userdata('partner')[0]['id_destination'];
        $data['destinationName'] = $this->input->post('nameEdit');
        $data['destinationEmail'] = $this->input->post('use_email');
        $data['destinationPhone'] = $this->input->post('phoneEdit');
        $data['destinationAddress'] = $this->input->post('addressEdit');
        $data['destinationCounty'] = $this->input->post('cityEdit');
        $data['destinationDistrice'] = $this->input->post('ditrictEdit');
        $data['destinationWard'] = $this->input->post('wardEdit');
        $data['star'] = $this->input->post('starRatings');
        $data['destinationUser'] = $this->input->post('usename');
        $data['destinationPassword'] = $this->input->post('password');
        $data['cancelTime'] = $this->input->post('cancelTime');
        $this->M_data->update($id, 'destination',$data);
        redirect(base_url('admin_partner/inforPartner'));
        // var_dump($data);
    }
}