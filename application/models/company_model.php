<?php  
class company_model extends CI_Model {  
    function __construct()  
    {  
            parent::__construct();  
            $this->load->database();  
    }  
    
    // login() from company Controller
    public function islogin($data){  
        $query=$this->db->where('username',$data['username']);  
        $query=$this->db->where('password',$data['password']);  
        $query=$this->db->where('active',1);  
        $query = $this->db->get('company');
        return $query->num_rows();  
    } 

    //get company row
    public function companyData($companySess){

        $query=$this->db->where('username',$companySess['username']);  
        $query=$this->db->where('password',$companySess['password']);  
        $query=$this->db->where('active',1);  
        $query = $this->db->get('company');
        return $query->row();
    }

}