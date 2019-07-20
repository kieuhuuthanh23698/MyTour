<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function load_query($string)
    {
        $result = $this->db->query($string);
        return $result->result_array();
    }
    public function insert($table,$data){
        $id = $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    public function update($id, $table, $data){
        $this->db->where('id_destination',$id);
        $this->db->update($table, $data);
    }
    public function delete($id,$table){
        $this->db->where('id_destination', $id);
        $this->db->delete($table); 
    }

    public function getAPI($URL){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $URL,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array("cache-control: no-cache"),
        ));
        $response = curl_exec($curl);//RESPONE LÀ 1 string dạng JSON
        curl_close($curl);
        return json_decode($response, true);
    }
}
?>