<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('EmpModel');
    }
    
	public function index()
	{
        //$this->load->view('welcome_message');
        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/index');
        $this->load->view('inc/employer/sidebar');
		$this->load->view('inc/employer/footer');
	}

	public function edit()
	{
        //$this->load->view('welcome_message');
        $data['company_category'] = $this->EmpModel->get_company_type();

        $data['company_location'] = $this->EmpModel->get_location();

        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/edit_profile',$data);
        $this->load->view('inc/employer/sidebar');
		$this->load->view('inc/employer/footer');
	}

    public function manageCandidate()
	{
        //$this->load->view('welcome_message');
        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/candidates');
        $this->load->view('inc/employer/sidebar');
		$this->load->view('inc/employer/footer');
    }
    
    public function manageJobs()
	{
        //$this->load->view('welcome_message');
        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/jobs');
        $this->load->view('inc/employer/sidebar');
		$this->load->view('inc/employer/footer');
	}

    public function updateCompany()
    {
        $company_name = $this->input->post('cname');

        $company_email = $this->input->post('cemail');

        $company_phone = $this->input->post('c_phone');

        $company_website = $this->input->post('c_website');

        $company_address = $this->input->post('c_address');

        $company_category = $this->input->post('cat');

        $company_about = $this->input->post('c_about');

        $company_fb = $this->input->post('cfb');

        $company_twitter = $this->input->post('ctwt');

        $company_linkedin = $this->input->post('clnk');

        $user_id = $this->input->post('user_id');

        $company_address2 = $this->input->post('c_location2');

        if($company_address2 == "Company location")
        {
            $company_address2 = $company_address;
        }
        else
        {
            $company_address = $company_address2;
        }

        $data = array(
            'user_id' => $user_id,
            'company_name' => $company_name,
            'company_type' => $company_category,
            'company_email' => $company_email,
            'company_location' => $company_address,
            'company_about' => $company_about,
            'company_website' => $company_website,
            'company_linkedin' => $company_linkedin,
            'company_twitter' => $company_twitter,
            'company_fb' => $company_fb,
        );

        $check = $this->EmpModel->get_user($user_id);

        if($check['sub_user'][0] == 0)
        {
            $check2 = $this->EmpModel->get_company($user_id);
            if($check2['company_id'][0])
            {
                $company_id = $check2['company_id'][0];
                $this->EmpModel->set_company_detail($data,$company_id);
                echo "0";
                exit;
            }
            else
            {
                $this->EmpModel->insert_company_detail($data);
                echo "0";
                exit;
            }
            
            
        }
        else
        {
            $check2 = $this->EmpModel->get_company($check['sub_user'][0]);

            $data2 = array(
                'user_id' => $check['sub_user'][0],
                'company_name' => $company_name,
                'company_type' => $company_category,
                'company_email' => $company_email,
                'company_location' => $company_address,
                'company_about' => $company_about,
                'company_website' => $company_website,
                'company_linkedin' => $company_linkedin,
                'company_twitter' => $company_twitter,
                'company_fb' => $company_fb,
            );

            if($check2['company_id'][0])
            {
                $company_id = $check2['company_id'][0];
                $this->EmpModel->set_company_detail($data2,$company_id);
                echo "0";
                exit;
            }
            else
            {
                $this->EmpModel->insert_company_detail($data2);
                echo "0";
                exit;
            }
        }
        

        
    }
}
