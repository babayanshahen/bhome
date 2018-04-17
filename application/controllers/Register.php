<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function index()
	{
		$this->load->template("register");

	}

	public function tryLogin(){
		$email = $this->input->post('_email');
		$password = $this->input->post('_password');
		$token = $this->input->post('_token');
		$this->load->model("users_model");
		$res  = $this->users_model->getUser($email);

		if(!is_null($res))
		{
			if(isset($password) && !empty($password))
			{
				if( $res->password === md5($password) )
				{
					$this->session->set_userdata('user',$res);
					$res->result = true;
					echo json_encode($res);
					die();
					return false;
				}
			}
		}
			echo json_encode(array('result' => false));
			die();
			return false;
	}

	public function account(){
     
    }
    
	/*
     * User registration 
     */
    public function do_registration(){
		$this->load->model("users_model");
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[2]|max_length[50]|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
            $this->form_validation->set_rules('conf_password', 'Confirm password', 'required|matches[password]');
            $this->form_validation->set_rules('full_name', 'Full name', 'required|min_length[6]|max_length[30]');

            $userData = (object) array(
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'full_name' => strip_tags($this->input->post('full_name'))
            );

	        if($this->form_validation->run() == true){
	            $insert = $this->users_model->insert($userData);
	            if($insert){
	            	$userData->id = $insert;
	                $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
	                $this->session->set_userdata('user', $userData);
	                redirect('dashboard');
	            }else{
	                $data['error_msg'] = 'Some problems occured, please try again.';
	            	die('Some problems occured, please try again.');
	            }
	        }
        }

        $data['user'] = $userData;

        $this->load->template('register', $data);

    }

    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login/');
    }

    public function email_check($str){
		$this->load->model("users_model");
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        // out($con);
        $checkEmail = $this->users_model->getRows($con);

        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
