<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->library('form_validation');
		$this->load->model('AuthModel');
		$this->load->model('EmpModel');
		$this->load->model('BlogsModel');
		$this->load->helper(array('form', 'url'));
		
    }
    
	public function index()
	{
		$data['job_recent'] = $this->EmpModel->get_recent_jobs();

		// echo "<pre>";
		// print_r($data['job_recent']);
		// echo "</pre>"; exit;

		$data['company_featured'] = $this->EmpModel->get_fetatured_company();

		$data['job_location'] = $this->EmpModel->get_location();

		$data['job_keywords'] = $this->EmpModel->get_keywords();

		$data['job_category'] = $this->EmpModel->get_category();

		$data['total_jobs'] = $this->EmpModel->get_job_count();

		$data['can_blogs'] = $this->BlogsModel->get_fetatured_candiate_blogs();

		$data['can_blogs_cnt'] = $this->BlogsModel->get_blogs_count('featured_can');

		$temp_cnt = array(); $loc_cnt = array(); $cat_cnt = array();

		for($i=0;$i<count($data['job_location']);$i++)
		{
			$ret_loc = $this->EmpModel->get_loc_count($data['job_location'][$i]['taluka_id']);
			array_push($loc_cnt,$ret_loc);
		}

		for($i=0;$i<count($data['job_category']);$i++)
		{
			$ret_cat = $this->EmpModel->get_cat_count($data['job_category'][$i]['id']);
			array_push($cat_cnt,$ret_cat);
		}

		for($i=0;$i<count($data['company_featured']);$i++)
		{
			$ret_cnt = $this->EmpModel->get_ft_cmp_count($data['company_featured'][$i]['company_id']);
			array_push($temp_cnt,$ret_cnt);
		}

		// echo "<pre>";
		// print_r($loc_cnt);
		// echo "</pre>";
		// exit;

		$data['cnt_cmp_featured'] = $temp_cnt;

		$data['cnt_cmp_loc'] = $loc_cnt; $data['cnt_cmp_cat'] = $cat_cnt;
		
		
        $this->load->view('inc/header');
		$this->load->view('home/index',$data);
		$this->load->view('inc/footer_menu');
	}

	public function about()
	{
        $data['cnt_live_jobs']=$this->EmpModel->get_job_count();
		$data['cnt_can_apld']=$this->EmpModel->get_count_canappld();
		$data['cnt_cmpreg']=$this->EmpModel->get_count_cmprgd();

        $this->load->view('inc/header');
		//$this->load->view('inc/sidebar');
		$this->load->view('home/about',$data);
		$this->load->view('inc/footer_menu');
	}

	public function contact()
	{
        //$this->load->view('welcome_message');
        $this->load->view('inc/header');
		//$this->load->view('inc/sidebar');
		$this->load->view('home/contact');
		$this->load->view('inc/footer_menu');
	}

	public function tnc()
	{
        //$this->load->view('welcome_message');
        $this->load->view('inc/header');
		//$this->load->view('inc/sidebar');
		$this->load->view('home/tnc');
		$this->load->view('inc/footer_menu');
	}

	public function faq()
	{
        //$this->load->view('welcome_message');
        $this->load->view('inc/header');
		//$this->load->view('inc/sidebar');
		$this->load->view('home/faq');
		$this->load->view('inc/footer_menu');
	}

	public function thankyou()
	{
		$this->load->view('inc/header');
		$this->load->view('home/thank-you');
		$this->load->view('inc/footer_menu');
	}

	public function pageExpired()
	{
		$this->load->view('inc/header');
		$this->load->view('home/page-expire');
		$this->load->view('inc/footer_menu');
	}

	public function register()
	{
		// $j_cookie = $this->input->cookie('job_cookie',true);
		// if(isset($j_cookie))
		// {
			$data['company_category'] = $this->EmpModel->get_company_type();

			$data['company_location'] = $this->EmpModel->get_location();
			
			$this->load->view('inc/header-reg');
			$this->load->view('home/register',$data);
			$this->load->view('inc/footer_menu');
		// }
		// else
		// {
		// 	$this->load->view('admin/auth/login');
		// }
	}

	public function verifyJobsAdmin()
	{
		if($this->input->get('key'))
		{
			$job_id = $this->input->get('key');

			$enable = $this->input->get('set');

			if($enable == "1")
			{
				$status = 1;
			}
			else
			{
				$status = 2;
			}
			
			$data = array(
				'enabled'=>$enable,
				'status'=>$status,
				'deleted'=>0
			);

			$this->AuthModel->set_job_post_arroval($data,$job_id);

			$company = $this->EmpModel->get_company_approved($job_id);

			$job = $this->EmpModel->get_job_approved($job_id);

			if($enable == "1")
			{
				$mail2 = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail2->isSMTP();                                      // Set mailer to use SMTP
				$mail2->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
				$mail2->authentication = false;                               // Enable SMTP authentication
				// $mail2->Username = 'britsolgoa@gmail.com';                 // SMTP username
				// $mail2->Password = 'BraveBritsol@123';                           // SMTP password
				$mail2->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
				$mail2->Port = 25;                                    // TCP port to connect to

				$mail2->setFrom('britsolgoa@gmail.com', 'Bright Solution');
				$mail2->addAddress($company[0]['company_email']);     // Add a recipient
				// $mail->addAddress('ellen@example.com');               // Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');
				$img = $this->config->item('base_url').'assets/images/logo-2.jpg';
				$fb_logo = $this->config->item('base_url').'assets/images/font/facebook.png';
				$twt_logo = $this->config->item('base_url').'assets/images/font/twitter.png';
				$lnkdin_logo = $this->config->item('base_url').'assets/images/font/linkedin.png';
				$mail2->AddEmbeddedImage($img,'logo');
				$mail2->AddEmbeddedImage($fb_logo,'fb_logo');
				$mail2->AddEmbeddedImage($twt_logo,'twt_logo');
				$mail2->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');

				// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				$mail2->isHTML(true);                                  // Set email format to HTML

				$mail2->Subject = "Your ".$job[0]['job_title']." job posting on Recruiter Goa is now LIVE";
				$mail2->Body    = "<center> <img src='cid:logo' > </center><br><br>
				Hello ".$company[0]['company_name'].", <br><br><b>
				Your job listing application on Recruiter Goa is approved and is now LIVE.<b><br><br>
				Check it out!<br><br>
				<center><a href='http://britsolapps.in/recruitergoa/dream-job?id=".$job[0]['job_id']."&name=".$job[0]['job_title']." > ".$job[0]['job_title']." </a></center><br><br>
				Login to <a href='http://britsolapps.in/recruitergoa/employer' >Recruiter Goa</a> to get real-time statistics on your job post. Check out here on to get more application!<br><br>
				Your job post listing will be LIVE for 30 days. You will be allowed to extend it for another 15 days.<br><br> 
				Share it on Social Media<br><br>
				Thanks again for your interest in our website!<br><br>
				<b>How was it for you?<.b><br>
					We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
					Send us your feedback <a href='http://britsolapps.in/recruitergoa/contact-us'>contact us</a>
					<br><br>
					Need help?<br>
					For assistance or help, sign in and click the '<a href='http://britsolapps.in/recruitergoa/contact-us'>contact</a>' link.<br><br>
		
					Happy Hiring!<br>
					Recruiter Goa<br><br>
					<b>Follow us for recent blogs and updates!</b><br><br>
					<a href='https://linkedin.com/company/recruitergoa'><img src='cid:lnkdin_logo' height='30px' width='30px' ></a> <a href='https://facebook.com/recruitergoa'><img src='cid:fb_logo' height='30px' width='30px' ></a> <a href='https://twitter.com/recruitergoa'><img src='cid:twt_logo' height='30px' width='30px' ></a>";
				//$mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail2->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail2->ErrorInfo;
				} else {
					//echo 'Message has been sent';
				}

				echo "<h2>Job Post Approved</h2><br><br><a href='http://britolapps.in/recruitergoa'>Return Home</a>";
			}
			else
			{
				$mail2 = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail2->isSMTP();                                      // Set mailer to use SMTP
				$mail2->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
				$mail2->authentication = false;                               // Enable SMTP authentication
				// $mail2->Username = 'britsolgoa@gmail.com';                 // SMTP username
				// $mail2->Password = 'BraveBritsol@123';                           // SMTP password
				$mail2->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
				$mail2->Port = 25;                                    // TCP port to connect to

				$mail2->setFrom('britsolgoa@britsolapps.in', 'Bright Solution');
				$mail2->addAddress($company[0]['company_email']);     // Add a recipient
				// $mail->addAddress('ellen@example.com');               // Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				$mail2->isHTML(true);                                  // Set email format to HTML

				$mail2->Subject = 'Your  Job Post '.$job[0]['job_title'].' has been Rejected by Recruiter Goa Admin';
				$mail2->Body    = 'Dear '.$company[0]['company_name'].'<br><br>Your job post is live on <a href="http://britsolapps.in/recruitergoa">recruitergoa.in</a>';
				$mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail2->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail2->ErrorInfo;
				} else {
					//echo 'Message has been sent';
				}

				echo "<h2>Job Post Rejected</h2><br><br><a href='http://britolapps.in/recruitergoa'>Return Home</a>";
			}
			exit;
		}
		else
		{
			return redirect("Home");
		}
	}

	public function testEmail()
	{
		$mail2 = new PHPMailer;

		$mail2->SMTPDebug = 3;                               // Enable verbose debug output

		$mail2->isSMTP();                                      // Set mailer to use SMTP
		$mail2->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
		$mail2->authentication = false;                               // Enable SMTP authentication
		// $mail2->Username = '';                 // SMTP username
		// $mail2->Password = '';                           // SMTP password
		$mail2->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
		$mail2->Port = 25;                                    // TCP port to connect to

		$mail2->setFrom('britsolgoa@britsolapps.in', 'Bright Solution');
		$mail2->addAddress('demo@britsolapps.in');     // Add a recipient
		// $mail->addAddress('ellen@example.com');               // Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail2->isHTML(true);                                  // Set email format to HTML

		$mail2->Subject = 'TEST SUBJECT';
		$mail2->Body    = 'test body!!!!!!!!!!!';
		$mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail2->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail2->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
		exit;
	}

	public function error404()
	{
		$this->load->view('inc/header');
		$this->load->view('home/error-404');
		$this->load->view('inc/footer_menu');
	}

	public function getJobwidgt()
	{
		$data['cnt_live_jobs']=$this->EmpModel->get_job_count();
		$data['cnt_can_apld']=$this->EmpModel->get_count_canappld();
		$data['cnt_cmpreg']=$this->EmpModel->get_count_cmprgd();

		$this->load->view('inc/header');
		$this->load->view('home/job-widget',$data);

		$this->load->view('inc/footer_menu');
	}

}
