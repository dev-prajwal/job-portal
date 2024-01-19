<?php

class MY_Controller extends CI_Controller {
	public function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			if (!$this->is_user_in_session()){
				return redirect('auth/login');
				//$this->load->view('admin/auth/login');
			}
	}
	
	public function is_logged_in(){
		if($this->session->userdata('auth_username') && $this->session->userdata('auth_password')){
		$username = $this->session->userdata('auth_username');
		$password = $this->session->userdata('auth_password');
		echo $username." ".$password;
		return true;
		}
		return false;
	}

	public function is_user_in_session(){
		if($this->session->userdata('isloggedIn') == true){
			return true;
		}
		else{
			return false;			
		}	
	}	
}
