<?php 
 
class inspector_model extends CI_Model {  
    function __construct()  
    {  
            parent::__construct();  
            $this->load->database();  
    }  
    
    // login() from admin Controller
    public function islogin($data){  
        $query=$this->db->where('username',$data['username']);  
        $query=$this->db->where('password',$data['password']);  
        $query=$this->db->where('active',1);  
        $query=$this->db->where('type',2);  
        $query=$this->db->get('users');
        return $query->num_rows();  
    } 

    //get admin row
    public function adminData($adminSess){

        $query=$this->db->where('username',$adminSess['username']);  
        $query=$this->db->where('password',$adminSess['password']);  
        $query=$this->db->where('active',1);  
        $query=$this->db->where('type',2); 
        $query=$this->db->get('users');
        return $query->row();
    }

}