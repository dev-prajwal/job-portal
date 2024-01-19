<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('FilterModel');
    }
    
	public function index()
	{
	}

	public function getjobs_old($company_id)
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Content-Type:application/json");	
        $response['jobs'] = $this->FilterModel->get_jobs_posted_for_jobwg($company_id);            
        echo json_encode($response);
	}

	public function getjobs()
	{

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Content-Type:application/json");
		//$response['website'] = $this->input->get('company_website');
		$company_website = $this->input->get('company_website');
        $response['jobs'] = $this->FilterModel->get_jobs_posted_for_job_widget($company_website);            
        echo json_encode($response);
	}

}
