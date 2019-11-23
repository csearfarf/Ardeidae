<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rfid extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->helper('url');
		$this->load->library ('session'); 
        $this->load->model('rfid_model'); 
        
    }

    public function index(){

        $this->load->view("scan");
    }
    public function checkValue(){

         $data['code']=htmlspecialchars($this->input->post('rfid'));

         $res=$this->rfid_model->isExist($data);
         $prodid="";
         $result=false;
         if(count($res)>0){
         	foreach ($res as $row) {
         	# code...
         		$prodid=$row->prod_id;
         		$result=true;
         }

         }
         
         $response = array('prod_id' => $prodid,'success'=>$result);
         echo json_encode($response);


    }
}
