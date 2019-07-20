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
        $id = $this->session->userdata('partner')['id_destination'];
        $data['partner'] = $this->M_data->load_query("select * from destination where id_destination = ".$id)[0]; 
        $view['body'] = $this->load->view('admin_partner/pages_admin_partner/inforPartner', $data, TRUE);
        $this->load->view('admin_partner/home_admin_partner/masterAdminPartner', $view);
    }

    public function update()
    {
        $id = $this->session->userdata('partner')['id_destination'];
        $data['destinationName'] = $this->input->post('nameEdit');
        $data['destinationEmail'] = $this->input->post('use_email');
        $data['destinationPhone'] = $this->input->post('phoneEdit');
        $data['destinationAddress'] = $this->input->post('addressEdit');
        $data['destinationCounty'] = $this->input->post('cityEdit');
        $data['destinationDistrice'] = $this->input->post('ditrictEdit');
        $data['destinationWard'] = $this->input->post('wardEdit');
        $data['star'] = $this->input->post('starRatings');
        //$data['destinationUser'] = $this->input->post('usename');
        if(($this->input->post('password') == $this->input->post('repassword')) && $this->input->post('password') != NULL)
            $data['destinationPassword'] = $this->input->post('password');
        $data['cancelTime'] = $this->input->post('cancelTime');
        //var_dump($data);
        $this->M_data->update($id, 'destination',$data);
        redirect(base_url('admin_partner/inforPartner'));
    }

    public function getAPI(){
        $URL = $this->input->get('url');
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $URL,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        $response = curl_exec($curl);
        echo $response;
        //var_dump($response);
        //$err = curl_error($curl);
        //var_dump($err);
        curl_close($curl);
    }
}