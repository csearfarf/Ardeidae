<?php  
class rfid_model extends CI_Model {  
    function __construct()  
    {  
            parent::__construct();  
            $this->load->database();  
    }  
    
    // login() from company Controller
    public function isExist($data){  
        $query=$this->db->where('code',$data['code']);
        $query = $this->db->get('product_request');
        return $query->result();
    } 

}