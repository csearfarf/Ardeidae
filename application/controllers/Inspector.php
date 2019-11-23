<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inspector extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->helper('url');
		$this->load->library ('session'); 
        $this->load->model('inspector_model'); 
        
    }


    private function inspector_logged_in(){

		if(!$this->session->userdata('authenticated')){

			if($this->session->userdata('type') == 3){

				header('location:'.base_url()."inspector".$this->index());  
			}
			
		}
    }
    
    private function check_session($view, $redirect){
		$this->inspector_logged_in();
		$sess_username = $this->session->userdata('username');
		$sess_password = $this->session->userdata('password');

		if(!empty($isLogged) || !empty($sess_username) || !empty($sess_password)){

			$data['username']=htmlspecialchars($sess_username);  
			$data['password']=($sess_password);
			$result=$this->inspector_model->islogin($data);  

			if($result){

				
				$companySess['username']=$sess_username;  
				$companySess['password']=$sess_password;
				//get company username
				$res=$this->inspector_model->adminData($companySess);
				if ($res){
					if (isset($res)){
						$rslt_array = array(
                            'firstname'  => $res->firstname,
                            'lastname'  => $res->lastname,
                            'type'      => $res->type,
                            'userID'    => $res->id
						);
						//set session for company
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
    
    public function logout(){
        $this->session->sess_destroy();  
        header('location:'.base_url()."inspector".$this->index());  
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
                
                $res=$this->inspector_model->islogin($data);  
                if($res){ 

                    $user_session = array(
                        'username'        =>   $data['username'],
                        'password'        =>   $data['password'],
                        'type'			  =>   3,
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

    public function index(){
        
		$this->load->view('inspector/index');
    }

     public function dashboard(){
        
        $view = 'inspector/dashboard';
		$redirect = 'inspector/';
		//checks if users session is valid
		// if !session redirect to login
        // else render dashboard view
        $this->check_session($view, $redirect);
        

        

    }

}
