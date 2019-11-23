<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->helper('url');
		$this->load->library ('session'); 
        $this->load->model('admin_model'); 
        
    }

    private function admin_logged_in(){

		if(!$this->session->userdata('authenticated')){

			if($this->session->userdata('type') != 1){

				header('location:'.base_url()."admin".$this->index());  
			}
			
		}
    }
    
    private function check_session($view, $redirect){
		$this->admin_logged_in();
		$sess_username = $this->session->userdata('username');
		$sess_password = $this->session->userdata('password');

		if(!empty($isLogged) || !empty($sess_username) || !empty($sess_password)){

			$data['username']=htmlspecialchars($sess_username);  
			$data['password']=($sess_password);
			$result=$this->admin_model->islogin($data);  

			if($result){
				
				$adminSess['username']=$sess_username;  
				$adminSess['password']=$sess_password;
				//get admin username
				$res=$this->admin_model->adminData($adminSess);
				if ($res){
					if (isset($res)){
						$rslt_array = array(
                            'firstname'  => $res->firstname,
                            'lastname'  => $res->lastname,
                            'type'      => $res->type,
                            'userID'    => $res->id
						);
						//set session for admin
						$this->session->set_userdata($rslt_array);  

						//loads the view 
						$this->load->view($view); 
						
					}


				}
				
			}   
			else{
				redirect($redirect, 'refresh');
			}

		}   
		else{
			redirect($redirect, 'refresh');
		}

    }
    
    public function login(){

        // print_r($_POST);
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => SECRETE_KEY,//constant
            'response' => $this->input->post('token'),
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        $options = array(
            'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        

        $res = json_decode($response, true);
        if($res['success'] == true) {
            //human trace captcha
            if ($res['score'] >= 0.5){
                 
                
                $data['username']=htmlspecialchars($this->input->post('username'));
                $data['password']=md5(htmlspecialchars($_POST['password']));  
                
                $res=$this->admin_model->islogin($data);  
                if($res){ 

                    $user_session = array(
                        'username'        =>   $data['username'],
                        'password'        =>   $data['password'],
                        'type'			  =>   1,
                        'authenticated'   =>   TRUE
                    );
                    
                    $this->session->set_userdata($user_session);   
                    $login_response = array('status'=>true, 'data'=>"correct");
                }  
                else{  
                
                    $login_response = array('status'=>false, 'data'=>"incorrect");
                }
            }
            
            //bot or spammer captcha result
            else {
                $login_response = array('status'=>false, 'data'=>"bot");
            }
        } 
        else if($res['success'] == false){
            
            $login_response = array('status'=>false, 'data'=>"Please Try Again");
        }

        echo json_encode($login_response);

    }


	public function index()
	{   
        //loads login view
		$this->load->view('admin/index');
    }
    
    public function dashboard(){
        
        $view = 'admin/dashboard';
		$redirect = 'admin/';
		//checks if users session is valid
		// if !session redirect to login
		// else render dashboard view
        $this->check_session($view, $redirect);
        

    }

    public function inspector(){
        
        $view = 'admin/inspector';
		$redirect = 'admin/';
		//checks if users session is valid
		// if !session redirect to login
		// else render dashboard view
        $this->check_session($view, $redirect);

    }

    
    public function company(){
        
        $view = 'admin/company';
		$redirect = 'admin/';
		//checks if users session is valid
		// if !session redirect to login
		// else render dashboard view
        $this->check_session($view, $redirect);

    }

    public function products(){
        
        $view = 'admin/products';
		$redirect = 'admin/';
		//checks if users session is valid
		// if !session redirect to login
		// else render dashboard view
        $this->check_session($view, $redirect);

    }
}
