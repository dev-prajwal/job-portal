<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Export extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('AdminModel');
        $this->load->model('FilterModel');
        //$this->load->library('excel');
        
		if($this->session->user_type >= 3)
        {
            return redirect("employer");
        }
	}
	public function index(){
        
		echo "index";
    }
    public function test(){
        $data['jobs'] = $this->AdminModel->get_jobs();		
        $this->load->view('admin/export/test',$data);	
    }

    public function company_list(){
        $data['jobs'] = $this->AdminModel->get_jobs();		
        $this->load->view('admin/export/company_list',$data);	
    }

    public function job_posted_list(){
        $data['jobs'] = $this->AdminModel->get_jobs();		
        $this->load->view('admin/export/job_post_list',$data);	
    }
}
