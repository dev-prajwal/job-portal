<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Admin extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$this->load->model('FilterModel');
		if($this->session->user_type >= 3)
        {
            return redirect("employer");
        }
	}
	public function index(){
		$data['ip_address'] = $this->input->ip_address();
		$data['total_job_posted'] = $this->FilterModel->get_total_jobs_posted()->total;
		$data['total_job_applied'] = $this->FilterModel->get_total_jobs_applied()->total;
		$data['total_companies'] = $this->FilterModel->get_total_companies()->total;
		$data['total_visitors'] = $this->FilterModel->get_total_visitors()->total;
		$data['top_5_jobs'] = $this->FilterModel->get_top_5_Performing_jobs();
		$data['bottom_5_jobs'] = $this->FilterModel->get_bottom_5_Performing_jobs();
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		

		$date_array = getdate();
		$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
		$last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
		$last15days = date('Y-m-d', strtotime($curr_date . ' -15 day'));
		$lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
		$last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));
		$last6months = date('Y-m-d', strtotime($curr_date . ' -185 day'));
		$last9months = date('Y-m-d', strtotime($curr_date . ' -276 day'));
		$last1year = date('Y-m-d', strtotime($curr_date . ' -365 day'));

		$data['number_of_visitors'] = array(
			"365" => $this->FilterModel->get_visitors($last1year)->total,
			"276" => $this->FilterModel->get_visitors($last9months)->total,
			"185" => $this->FilterModel->get_visitors($last6months)->total,
			"92" => $this->FilterModel->get_visitors($last3months)->total,
			"30" => $this->FilterModel->get_visitors($lastmonth)->total,
			"15" => $this->FilterModel->get_visitors($last15days)->total,
			"7" => $this->FilterModel->get_visitors($last7days)->total
		);

		$data['number_of_companies'] = array(
			"365" => $this->FilterModel->get_companies_registerd_by_date($last1year)->total,
			"276" => $this->FilterModel->get_companies_registerd_by_date($last9months)->total,
			"185" => $this->FilterModel->get_companies_registerd_by_date($last6months)->total,
			"92" => $this->FilterModel->get_companies_registerd_by_date($last3months)->total,
			"30" => $this->FilterModel->get_companies_registerd_by_date($lastmonth)->total,
			"15" => $this->FilterModel->get_companies_registerd_by_date($last15days)->total,
			"7" => $this->FilterModel->get_companies_registerd_by_date($last7days)->total
		);

		$data['number_of_jobs_posted'] = array(
			"365" => $this->FilterModel->get_job_posted_by_date($last1year)->total,
			"276" => $this->FilterModel->get_job_posted_by_date($last9months)->total,
			"185" => $this->FilterModel->get_job_posted_by_date($last6months)->total,
			"92" => $this->FilterModel->get_job_posted_by_date($last3months)->total,
			"30" => $this->FilterModel->get_job_posted_by_date($lastmonth)->total,
			"15" => $this->FilterModel->get_job_posted_by_date($last15days)->total,
			"7" => $this->FilterModel->get_job_posted_by_date($last7days)->total
		);

		$data['number_of_jobs_applied'] = array(
			"365" => $this->FilterModel->get_job_applied_by_date($last1year)->total,
			"276" => $this->FilterModel->get_job_applied_by_date($last9months)->total,
			"185" => $this->FilterModel->get_job_applied_by_date($last6months)->total,
			"92" => $this->FilterModel->get_job_applied_by_date($last3months)->total,
			"30" => $this->FilterModel->get_job_applied_by_date($lastmonth)->total,
			"15" => $this->FilterModel->get_job_applied_by_date($last15days)->total,
			"7" => $this->FilterModel->get_job_applied_by_date($last7days)->total
		);
		$this->load->view('admin/dashboard/pages/dashboard',$data);
	}
	
	// Statistics Section
	public function job_views(){
		$data['section'] = "Statistics";
		$data['page_name'] = "Job Views";
		//data 
		$data['company_types'] =  $this->FilterModel->get_company_type();
		$data['job_categories'] = $this->FilterModel->get_job_category();
		$data['location_talukas'] = $this->FilterModel->get_location_taluka();
		$data['job_types'] = $this->FilterModel->get_job_type();
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		


		$date_array = getdate();
		$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
		$expiry_date = date('Y-m-d', strtotime($curr_date . ' -4 day'));

		$last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
		$last15days = date('Y-m-d', strtotime($curr_date . ' -15 day'));
		$lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
		$last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));
		$last6months = date('Y-m-d', strtotime($curr_date . ' -60 day'));
		$last9months = date('Y-m-d', strtotime($curr_date . ' -276 day'));
		$last1year = date('Y-m-d', strtotime($curr_date . ' -365 day'));

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$result = array("job_post.enabled" => "1");
			if($this->input->post('company_type') != "-1"){
				$a = array("company.company_type_id" => $this->input->post('company_type'));
				$result = array_merge($a, $result);}
			if($this->input->post('job_category') != "-1"){
				$a = array("job_post.job_category" => $this->input->post('job_category'));
				$result = array_merge($a, $result);}
			if($this->input->post('taluka_id') != "-1"){
				$a = array("job_post.job_location" => $this->input->post('taluka_id'));
				$result = array_merge($a, $result);}
			if($this->input->post('job_post_type') != "-1"){
				$a = array("job_post.job_type" => $this->input->post('job_post_type'));
				$result = array_merge($a, $result);}
					
			$data['last_year'] = $this->FilterModel->filter($result,$last1year)->total;
			$data['last_9_months'] = $this->FilterModel->filter($result,$last9months)->total;
			$data['last_6_months'] = $this->FilterModel->filter($result,$last6months)->total;
			$data['last_3_months'] = $this->FilterModel->filter($result,$last3months)->total;
			$data['last_month'] = $this->FilterModel->filter($result,$lastmonth)->total;
			$data['last_15_days'] = $this->FilterModel->filter($result,$last15days)->total;
			$data['last_week'] = $this->FilterModel->filter($result,$last7days)->total;
	
			$this->load->view('admin/dashboard/pages/job_views',$data);
		}
		else if ($this->input->server('REQUEST_METHOD') == 'GET'){
		$data['last_year'] = $this->FilterModel->filter(null,$last1year)->total;
		$data['last_9_months'] = $this->FilterModel->filter(null,$last9months)->total;
		$data['last_6_months'] = $this->FilterModel->filter(null,$last6months)->total;
		$data['last_3_months'] = $this->FilterModel->filter(null,$last3months)->total;
		$data['last_month'] = $this->FilterModel->filter(null,$lastmonth)->total;
		$data['last_15_days'] = $this->FilterModel->filter(null,$last15days)->total;
		$data['last_week'] = $this->FilterModel->filter(null,$last7days)->total;
		$this->load->view('admin/dashboard/pages/job_views',$data);
		}
	}
	public function job_applications_stats(){
		$data['section'] = "Statistics";
		$data['page_name'] = "Job Application Stats";		
		$data['total_job_posted'] = $this->FilterModel->get_total_jobs_posted()->total;
		$data['total_job_applied'] = $this->FilterModel->get_total_jobs_applied()->total;

		$data['total_job_views'] = 12456;		
		$data['top_5_jobs'] = $this->FilterModel->get_top_5_Performing_jobs();
		$data['bottom_5_jobs'] = $this->FilterModel->get_bottom_5_Performing_jobs();					
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		

		$this->load->view('admin/dashboard/pages/job_applications_stats',$data);
	}
	public function company_stats(){
		$data['section'] = "Statistics";
		$data['page_name'] = "Comapany Stats";		
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		

		$date_array = getdate();
		$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
		$last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
		$last15days = date('Y-m-d', strtotime($curr_date . ' -15 day'));
		$lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
		$last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));
		$last6months = date('Y-m-d', strtotime($curr_date . ' -185 day'));
		$last9months = date('Y-m-d', strtotime($curr_date . ' -276 day'));
		$last1year = date('Y-m-d', strtotime($curr_date . ' -365 day'));


		$data['number_of_companies'] = array(
			"365" => $this->FilterModel->get_companies_registerd_by_date($last1year)->total,
			"276" => $this->FilterModel->get_companies_registerd_by_date($last9months)->total,
			"185" => $this->FilterModel->get_companies_registerd_by_date($last6months)->total,
			"92" => $this->FilterModel->get_companies_registerd_by_date($last3months)->total,
			"30" => $this->FilterModel->get_companies_registerd_by_date($lastmonth)->total,
			"15" => $this->FilterModel->get_companies_registerd_by_date($last15days)->total,
			"7" => $this->FilterModel->get_companies_registerd_by_date($last7days)->total
		);		
		$data['company_categories'] = $this->FilterModel->get_categories_with_count();
		$data['company_locations'] = $this->FilterModel->get_companies_with_count();
		$this->load->view('admin/dashboard/pages/company_stats',$data);
	}
	public function candidate_stats(){
		$data['section'] = "Statistics";
		$data['page_name'] = "Candidate Stats";
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;
		
		$date_array = getdate();
		$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
		$last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
		$last15days = date('Y-m-d', strtotime($curr_date . ' -15 day'));
		$lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
		$last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));
		$last6months = date('Y-m-d', strtotime($curr_date . ' -185 day'));
		$last9months = date('Y-m-d', strtotime($curr_date . ' -276 day'));
		$last1year = date('Y-m-d', strtotime($curr_date . ' -365 day'));

		$data['number_of_jobs_posted'] = array(
			"1 Year" => $this->FilterModel->get_job_posted_by_date($last1year)->total,
			"9 Months" => $this->FilterModel->get_job_posted_by_date($last9months)->total,
			"6 Months" => $this->FilterModel->get_job_posted_by_date($last6months)->total,
			"3 Months" => $this->FilterModel->get_job_posted_by_date($last3months)->total,
			"1 Month" => $this->FilterModel->get_job_posted_by_date($lastmonth)->total,
			"15 days" => $this->FilterModel->get_job_posted_by_date($last15days)->total,
			"1 Week" => $this->FilterModel->get_job_posted_by_date($last7days)->total
		);

		$data['number_of_jobs_applied'] = array(
			"1 Year" => $this->FilterModel->get_job_applied_by_date($last1year)->total,
			"9 Months" => $this->FilterModel->get_job_applied_by_date($last9months)->total,
			"6 Months" => $this->FilterModel->get_job_applied_by_date($last6months)->total,
			"3 Months" => $this->FilterModel->get_job_applied_by_date($last3months)->total,
			"1 Month" => $this->FilterModel->get_job_applied_by_date($lastmonth)->total,
			"15 days" => $this->FilterModel->get_job_applied_by_date($last15days)->total,
			"1 Week" => $this->FilterModel->get_job_applied_by_date($last7days)->total
		);		
		
		$interview_calls = array();
		$number_of_companies = $this->FilterModel->get_candidates_call_for_interview_count();
		foreach($number_of_companies as $key => $value ){ 
			if($key === 1){
				$interview_calls['called'] = $value['total'];
			}
			if($key === 0){
				$interview_calls['not_called'] = $value['total'];
			}
		}
		$data['interview_calls'] = $interview_calls;
		$this->load->view('admin/dashboard/pages/candidate_stats',$data);
	}	
	public function ttt(){
		// $data['interview_calls'] = array(
		// 	"called" => $this->FilterModel->get_job_posted_by_date($last1year)->total,
		// 	"not called" => $this->FilterModel->get_job_posted_by_date($last9months)->total
		// );
		// $interview_calls = array();
		// $number_of_companies = $this->FilterModel->get_candidates_call_for_interview_count();
		// foreach($number_of_companies as $key => $value ){ 
		// 	if($key === 1){
		// 		$interview_calls['called'] = $value['total'];
		// 	}
		// 	if($key === 0){
		// 		$interview_calls['not_called'] = $value['total'];
		// 	}
		// }
		// print_r($interview_calls);
	}

	public function blog_stats(){
		$data['section'] = "Statistics";
	    $data['page_name'] = "Blog Stats";
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		

		$this->load->view('admin/dashboard/pages/blog_stats',$data);
	}

	// Approval Section
	public function job_post_approvals(){
		$data['section'] = "Approvals";
		$data['page_name'] = "Job Post Approvals";
		$data['jobs_posts'] = $this->AdminModel->get_unapproved_jobs();
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$this->load->view('admin/dashboard/pages/job_post_approvals',$data);
	}
	public function job_post_approve($job_id){
		$this->AdminModel->approve_job($job_id);
		$job = $this->AdminModel->get_job($job_id);

		$body = "<center> <img src='cid:logo' > </center><br><br>
		<b>Hello ".$job->company_name.", <br><br></b>
		Your job listing application on Recruiter Goa is approved and is now LIVE.<b><br><br>
		Check it out!<br><br>
		<center><a href='http://britsolapps.in/recruitergoa/dream-job?id=".$job->job_id."&name=".$job->job_title." > ".$job->job_title." </a></center><br><br>
		Login to <a href='http://britsolapps.in/recruitergoa/employer' >Recruiter Goa</a> to get real-time statistics on your job post. Check out here on to get more application!<br><br>
		Your job post listing will be LIVE for 30 days. You will be allowed to extend it for another 15 days.<br><br> 
		Share it on Social Media<br><br>
		Thanks again for your interest in our website!<br><br>
		<b>How was it for you?<b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback <a href='http://britsolapps.in/recruitergoa/contact-us'>contact us</a>
			<br><br>
			Need help?<br>
			For assistance or help, sign in and click the '<a href='http://britsolapps.in/recruitergoa/contact-us'>contact</a>' link.<br><br>

			Happy Hiring!<br>
			Recruiter Goa <br><br>
			<b>Follow us for recent blogs and updates!</b><br><br>
			<a href='https://linkedin.com/company/recruitergoa'><img src='cid:lnkdin_logo' height='30px' width='30px' ></a> <a href='https://facebook.com/recruitergoa'><img src='cid:fb_logo' height='30px' width='30px' ></a> <a href='https://twitter.com/recruitergoa'><img src='cid:twt_logo' height='30px' width='30px' ></a>";


		$this->sendMail("from",$job->company_email,"Your ".$job->job_title." job posting on Recruiter Goa is now LIVE",$body);
		return redirect('admin/job_post_approvals');
	}	
	public function company_approvals(){
		$data['section'] = "Approvals";
		$data['page_name'] = "Company Approvals";
		$data['companies'] = $this->AdminModel->get_unapproved_companies();
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$this->load->view('admin/dashboard/pages/company_approvals',$data);
	}

	public function test(){
		$emails = "pramitsawant11@gmail.com,pramit_sawant@yahoo.com";
		$emails = explode(",",$emails);
		print_r($emails);

		// $result = array_merge($a, $b);
		// $result = array_merge($result, $c);		
		// print_r($result);
		exit;
		//$this->load->view('admin/dashboard/pages/dashboard',$data);
	}


	public function company_approve($company_id){
		$this->AdminModel->approve_company($company_id);
		$company = $this->AdminModel->get_company($company_id);

		$body = $company->company_name.", Your accont is approved.";
		
		$this->sendMail("from",$company->company_email,"Recruiter Goa | Company Approval",$body);
		return redirect('admin/company_approvals');
	}	
	// Company Section
	public function company_list(){
		$data['section'] = "Company";
		$data['page_name'] = "Company List";
		$data['companies'] = $this->FilterModel->get_companies();		
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$data['total_companies'] = $this->FilterModel->get_total_companies()->total;
		$this->load->view('admin/dashboard/pages/companies',$data);
	}
	public function company_category_list(){
		$data['section'] = "Company";
		$data['page_name'] = "Company Category";
		$data['categories'] = $this->FilterModel->get_categories();		
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$this->load->view('admin/dashboard/pages/categories',$data);
	}
	public function company_request(){
		if ($this->input->server('REQUEST_METHOD') == 'GET'){
			$data['section'] = "Company";
			$data['page_name'] = "Company Request";
			$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
			$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;
			$data['company_requested'] = $this->AdminModel->get_company_request();			
			$this->load->view('admin/dashboard/pages/company_request',$data);
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$emails = $this->input->post('emails');
			$emails = explode(",",$emails);
			$body = $this->input->post('body');
			$from = "info@britsol.in";
			$subject = "Request to Signin to Recruiter goa ";

			foreach ($emails as $to) {
				//echo "<h1>".$body."|".$to."</h1>";
				//$this->sendMail($from,$to,$subject,$body);
				$data = array(
					'company_email'=>$to
				);
				$this->AdminModel->add_company_request($data);
			}

			$data['section'] = "Company";
			$data['page_name'] = "Company Request";
			$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
			$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;	
			$data['company_requested'] = $this->AdminModel->get_company_request();			
			$this->load->view('admin/dashboard/pages/company_request',$data);
		}

	}	
	// Jobs Section
	public function job_posts(){
		$data['section'] = "Jobs";
		$data['page_name'] = "Job Posts";
		$data['jobs'] = $this->AdminModel->get_jobs();		
		// print_r($data);
		// exit;
		$data['total_job_posted'] = $this->FilterModel->get_total_jobs_posted()->total;
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;				
		$this->load->view('admin/dashboard/pages/job_posts',$data);
	}
	public function job_applications(){
		$data['section'] = "Jobs";
		$data['page_name'] = "Job Applications";
		$data['job_applications'] = $this->AdminModel->get_job_applications();		

		$data['total_job_applied'] = $this->FilterModel->get_total_jobs_applied()->total;
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;				
		$this->load->view('admin/dashboard/pages/job_applications',$data);
	}
	// Jobs Section
	public function blog_posts(){
		$data['section'] = "Blog";
		$data['page_name'] = "Blog Posts";
		$data['blogs'] = $this->AdminModel->get_all_blogs();		
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$this->load->view('admin/dashboard/pages/blog_posts',$data);
	}
	public function blog_new(){
		$data['section'] = "Blog";
		$data['page_name'] = "Blog New";
		$data['blog_category'] = $this->AdminModel->get_blog_category();
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$this->load->view('admin/dashboard/pages/blog_new',$data);
	}		

	public function blog_edit($blog_id){
		$data['section'] = "Blog";
		$data['page_name'] = "Blog Edit";
		$data['blog_category'] = $this->AdminModel->get_blog_category();
		$data['blog'] = $this->AdminModel->get_blog($blog_id);
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		
		$this->load->view('admin/dashboard/pages/blog_new',$data);
	}		

	public function save_blog(){
		$data['section'] = "Blog";
		$data['page_name'] = "Blog New";
		$data['unapproved_companies_count'] = $this->AdminModel->get_unapproved_companies_count()->total;		
		$data['unapproved_job_count'] = $this->AdminModel->get_unapproved_job_count()->total;		

		if ($this->input->server('REQUEST_METHOD') == 'POST'){	
			//$blog_id = $this->input->post('blog_id');
			$data = array(
				'blog_title'=>$this->input->post('blog_title'),
				'blog_by'=>$this->input->post('blog_by'),
				'blog_category_id'=>$this->input->post('blog_category'),
				'blog_body'=>addslashes($this->input->post('blog_body_draft')),
				'blog_body_draft'=>addslashes($this->input->post('blog_body_draft')),
				'blog_slug'=>$this->clean($this->input->post('blog_title')),
			);
			if($this->input->post('btn') == 'draft'){
				$blog_id = $this->input->post('blog_id');
				if ($blog_id == "" || $blog_id == null){
					$blog_id =  $this->AdminModel->new_blog($data);
					redirect('admin/blog_edit/'.$blog_id);					
				}
				else{
					$blog_id = $this->input->post('blog_id');
					$this->AdminModel->draft_blog($blog_id,$data);	
					redirect('admin/blog_edit/'.$blog_id);
				}
			}
			if($this->input->post('btn') == 'publish'){
				$blog_id = $this->input->post('blog_id');
				if ($blog_id == "" || $blog_id == null){
					$blog_id =  $this->AdminModel->new_blog($data);
					//redirect('admin/blog_edit/'.$blog_id);					
				}

				//$blog_id = $this->input->post('blog_id');
				$this->AdminModel->publish_blog($blog_id,$data);
				redirect('admin/blog_edit/'.$blog_id);			
			}
			if($this->input->post('btn') == 'delete'){
				$blog_id = $this->input->post('blog_id');
				$this->AdminModel->delete_blog($blog_id);				
			}
			return 0;
		}
	}
	public function blog_delete($blog_id){
		$data['blog'] = $this->AdminModel->delete_blog($blog_id);
		redirect('admin/blog_posts/');
	}	

	public function blog_publish($blog_id){
		$data['blog'] = $this->AdminModel->publish_blog_direct($blog_id);
		redirect('admin/blog_posts/');
	}	

	public function save_featured_image(){
		$data['section'] = "Blog";
		$data['page_name'] = "Blog New";
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$config['upload_path'] = './upload/featured_images/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
			$this->load->library('upload',$config);						
			if ( ! $this->upload->do_upload('featured_image')){
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					exit;
					$this->load->view('upload_form', $error);
			}
			else{
					$data = array('upload_data' => $this->upload->data());
					$file_name = $data['upload_data']['file_name'];
					$blog_id = $this->input->post('blog_id');

					$this->AdminModel->update_featured_img($blog_id,$file_name);				
					//$this->load->view('upload_success', $data);
					redirect('admin/blog_edit/'.$blog_id);			

			}
	}
}

	private function clean($string) {
		$string = str_replace(' ', '-', $string); 
		return preg_replace('/[^A-Za-z0-9-]/', '', $string); 
	}

	public function sendMail($from,$to,$subject,$body){
		$mail2 = new PHPMailer;
		$mail2->isSMTP();                                      // Set mailer to use SMTP
		$mail2->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
		$mail2->authentication = false;                               // Enable SMTP authentication
		// $mail2->Username = 'britsolgoa@gmail.com';                 // SMTP username
		// $mail2->Password = 'BraveBritsol@123';                           // SMTP password
		$mail2->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
		$mail2->Port = 25;                                    // TCP port to connect to

		$mail2->setFrom('britsolgoa@britsolapps.in', 'Bright Solution');
		$mail2->addAddress($to);     // Add a recipient
		$mail2->addCC('recruitergoa@gmail.com');
		$img = $this->config->item('base_url').'assets/images/logo-2.jpg';
		$fb_logo = $this->config->item('base_url').'assets/images/font/facebook.png';
		$twt_logo = $this->config->item('base_url').'assets/images/font/twitter.png';
		$lnkdin_logo = $this->config->item('base_url').'assets/images/font/linkedin.png';
		$mail2->AddEmbeddedImage($img,'logo');
		$mail2->AddEmbeddedImage($fb_logo,'fb_logo');
		$mail2->AddEmbeddedImage($twt_logo,'twt_logo');
		$mail2->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');
		$mail2->isHTML(true);                                  // Set email format to HTML
		$mail2->Subject = $subject;
		$mail2->Body    = $body;
		$mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail2->send()) {
			echo 'Message could not be sent.';
			return 'Mailer Error: ' . $mail2->ErrorInfo;

		} else {
			//echo 'Message has been sent';
		}

	}



}
