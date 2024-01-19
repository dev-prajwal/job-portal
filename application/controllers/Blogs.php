<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BlogsModel');
		$this->load->model('EmpModel');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		
    }
    
	public function index()
	{
		
		$data['sort'] = $this->input->get('sort');
		$data['blogs'] = $this->BlogsModel->get_blogs($data['sort']);
		$data['blogs_count'] = $this->BlogsModel->get_blogs_count($data['sort']);

		// echo "<pre>";
		// print_r($data['blogs_count']);
		// echo "</pre>";
		// exit;

        $this->load->view('inc/header');
		$this->load->view('blogs/index',$data);
		$this->load->view('inc/footer_menu');
	}

	public function blogView()
	{
		$blog_id = $this->input->get('key');
		$data['blog'] = $this->BlogsModel->view_blog($blog_id);
		
        $this->load->view('inc/header');
		$this->load->view('blogs/blogs-details',$data);
		$this->load->view('inc/footer_menu');
	}

	//view company
	public function viewCompany()
	{
		if($this->input->get('key') || $this->input->get('user')  )
		{
			if($this->input->get('key') )
			{
				$company_id = $this->input->get('key');
			}else{
				$company_temp = $this->EmpModel->get_company($this->input->get('user'));
				$company_id = $company_temp[0]['company_id'];
			}
			

			$data['get_company'] = $this->BlogsModel->get_company_detail_vw($company_id);

			$data['company_job_cnt'] = $this->BlogsModel->get_ft_cmp_count($company_id);

			$data['company_job'] = $this->BlogsModel->view_company_jobs(10,0,$company_id);

			$this->load->view('inc/header');
			$this->load->view('blogs/company',$data);
			$this->load->view('inc/footer_menu');
		}
		else
		{
			return redirect("Home");
		}
		
	}

	public function loadJobs()
	{
		if($this->input->post('company_id'))
		{
			$company_id = $this->input->post('company_id');
			$limit = $this->input->post('limit');
			$start = $this->input->post('start');

			$result['pg2'] = ($start/10); $result['pg1'] = (($start/10)-1);
			$result['limit'] = $limit; $result['start'] = $start;

			$result['company_job'] = $this->BlogsModel->view_company_jobs($limit,$start,$company_id);

			$this->load->view('blogs/ajax/Jobs',$result);
		}
		else
		{
			exit;
		}
	}

}
