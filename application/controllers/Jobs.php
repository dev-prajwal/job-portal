<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EmpModel');
		$this->load->model('JobsModel');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('cookie');
		
    }
    
	public function index()
	{
		//$this->load->view('welcome_message');
		$limit = 5; $start = 0;
		
		$data['category'] = $this->JobsModel->get_category();
		$data['location'] = $this->EmpModel->get_location();

		$data['job_type'] = $this->JobsModel->get_job_type();
		$data['experience'] = $this->JobsModel->get_job_experience();
		$data['qualification'] = $this->JobsModel->get_job_qualification();
		$data['salary_range'] = $this->JobsModel->get_salary_range();

		$data['limit'] = $limit;
		$data['start'] = $start;

		$data['filter']  = 'recent';

		if($this->input->post('searchKey'))
		{
			$key = $this->input->post('searchKey');
			$loc = $this->input->post('searchLoc');
			$cat = $this->input->post('searchCat');
			$data['jobs'] = $this->JobsModel->view_jobs_fill_home($limit,$start,$key,$loc,$cat);
			$data['jobs_count'] = $this->JobsModel->view_jobs_fill_home_cnt($key,$loc,$cat);

			$data['key'] = $key; $data['loc'] = $loc; $data['cat'] = $cat;
		}
		elseif($this->input->get('catgory_key') || $this->input->get('location_key') )
		{
			if($this->input->get('catgory_key'))
			{
				$cat = $this->input->get('catgory_key');
				$data['jobs'] = $this->JobsModel->view_jobs_home_cat($limit,$start,$cat);
				$data['jobs_count'] = $this->JobsModel->view_jobs_home_cat_cnt($cat);

				$data['cat'] = $cat;
			}
			else
			{
				$loc = $this->input->get('location_key');
				$data['jobs'] = $this->JobsModel->view_jobs_home_loc($limit,$start,$loc);
				$data['jobs_count'] = $this->JobsModel->view_jobs_home_loc_cnt($loc);

				$data['loc'] = $loc;
			}
		}
		else
		{
			$data['jobs'] = $this->JobsModel->view_jobs($limit,$start);
			$data['jobs_count'] = $this->JobsModel->jobs_count();
		}
		

        $this->load->view('inc/header');
		$this->load->view('jobs/index',$data);
		$this->load->view('inc/footer_menu');
	}

	public function viewJob()
	{
		$job_name = $this->input->get('name');
		$job_id = $this->input->get('id');

		$data_hit = array(
			'job_id'=>$job_id,
			'ip_address'=>$this->input->ip_address()
		);
		$this->JobsModel->insert_job_hit($data_hit);

		

		$data['job'] = $this->JobsModel->get_jobpost($job_id);

		$data['job_recent'] = $this->EmpModel->get_recent_jobs();

		$data['salary_range'] = $this->JobsModel->get_salary_range();

		$data['experience'] = $this->JobsModel->get_job_experience();

		$data['qualification'] = $this->JobsModel->get_job_qualification();

		//$result = $this->JobsModel->get_jobpost($job_id);
		// echo "<pre>";
		// print_r($data['job']);
		// echo "</pre>";
		// exit;

		$data['company'] = $this->JobsModel->get_company_details($data['job'][0]['company_id']);


        $this->load->view('inc/header');
		//$this->load->view('inc/sidebar');
		$this->load->view('jobs/view',$data);
		$this->load->view('inc/footer_menu');
    }
    
    public function postJob()
		{
			$data['company_location'] = $this->EmpModel->get_location();
			$data['job_keywords'] = $this->JobsModel->get_keywords();
			$data['job_category'] = $this->JobsModel->get_category();
			$data['job_type'] = $this->JobsModel->get_job_type();
			$data['job_experience'] = $this->JobsModel->get_job_experience();
			$data['job_qualification'] = $this->JobsModel->get_job_qualification();
			$data['salary_range'] = $this->JobsModel->get_salary_range();

			$this->load->view('inc/header');
			//$this->load->view('inc/sidebar');
			$this->load->view('jobs/post',$data);
			$this->load->view('inc/footer_menu');
		}

		public function insertJob()
		{
			$user_id = $this->session->user_id;

			$sub_user = $this->session->sub_user;

			$user_type = $this->session->user_type;

			$date_array = getdate();
			$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
			
			$exp_date = date('Y-m-d', strtotime($curr_date . ' +30 day'));

			if($user_type == 1 || $user_type == 2)
			{
				echo "<h2>Only Company Admins can post a job</h2><br>";
				echo "<br><h3>To post a job, create a company profile</h3>";
				echo "<br><br><a href='http://britsolapps.in/recruitergoa'>Go back Home</a>";
				exit;
			}

			if($sub_user == 0)
			{
				$user_id2 = $user_id;
			}
			else
			{
				$user_id2 = $sub_user;
			}

			// $keywords = $this->input->post("keywords");
			$keywords = "NA";
			// $key = "";
			// for($i = 1; $i <= count($keywords); $i++)
			// {
			// 	if($i == count($keywords))
			// 	{
			// 		$key .= $keywords[$i - 1];
			// 	}
			// 	else
			// 	{
			// 		$key .= $keywords[$i - 1].",";
			// 	}
			// }
			// echo $key;
			// exit;

			

			
			

			$title = $this->input->post("j_title");
			
			$category = $this->input->post("category");

			$sub_category = $this->input->post("sub_category");

			$job_location = $this->input->post("j_location");

			$job_type = $this->input->post("job_type");

			$job_experience = $this->input->post("job_experience");

			

			$job_qualification = $this->input->post("job_qualification");

			

			$job_description = $this->input->post("noise");

			//$company_location = $this->input->post("j_c_location");

			$vacancy = $this->input->post('no_vacancy');

			$salary_range = $this->input->post('job_salary_range');

			

			if(!$this->JobsModel->check_company($user_id2))
			{
				$cookie = array(
					'name' => 'job_cookie',
					'value' => $title.'*'.$job_location.'*'.$job_type.'*'.$category.'*'.$sub_category.'*'.$job_description.'*'.$vacancy.'*'.$job_qualification.'*'.$job_experience.'*'.$exp_date.'*'.$salary_range.'*'.$key,
					'expire' => '3600'
				);
				$this->input->set_cookie($cookie);

				return redirect('edit-profile?status=11');
			}
			
			if($sub_user == 0)
			{
				
				$company = $this->JobsModel->get_company($user_id);
			}
			else
			{
				$company = $this->JobsModel->get_company($sub_user);
			}

			$data = array(
				'job_title' => $title,
				'job_posted_by' => $company[0]['company_name'],
				'company_id' => $company[0]['company_id'],
				'job_location' => $job_location,
				'job_type' => $job_type,
				'job_category' => $category,
				'job_sub_category_id'=>$sub_category,
				'job_description' => $job_description,
				'no_of_vacancy' => $vacancy,
				'job_qualification' => $job_qualification,
				'job_experience' => $job_experience,
				'keywords' => 'NA',
				'expiry_date'=>$exp_date,
				'salary_range'=>$salary_range
			);

			if($job_ret = $this->JobsModel->insert_job_post($data))
			{
				// $ver_data = array(
				// 	'url'=>'job-approval?key='.$job_ret,
				// 	'url_for'=>'Job Post Approval'
				// );
				// $ver_url = $this->EmpModel->insert_ver_url($ver_data);
				
////////////////////////// To Company//////////////////////////////////////////

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
			$mail2->addAddress($this->session->email_id, $company[0]['company_name']); 
			//$mail2->addCC($email);
			$mail2->addCC('recruitergoa@gmail.com');    // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$img = $this->config->item('base_url').'/assets/images/logo-2.jpg';
			$fb_logo = $this->config->item('base_url').'/assets/images/font/facebook.png';
			$twt_logo = $this->config->item('base_url').'/assets/images/font/twitter.png';
			$lnkdin_logo = $this->config->item('base_url').'/assets/images/font/linkedin.png';
			$mail2->AddEmbeddedImage($img,'logo');
			$mail2->AddEmbeddedImage($fb_logo,'fb_logo');
			$mail2->AddEmbeddedImage($twt_logo,'twt_logo');
			$mail2->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');
			$mail2->isHTML(true);                                  // Set email format to HTML

			$mail2->Subject = 'Your job post '.$title.' has been received sent to admin for approval.';
            $mail2->Body    = '<center> <img src="cid:logo" > </center><br><br>
            Dear '.$company[0]['company_name'].'<br><br><b>Your job listing application On Recruiter Goa has been sent to admin for approval.</b><br><br>
			<center>'.$title.'</center>
			<br><br>Thank you for job posting on Recruiter Goa!<br><br>
			We will review your application and email you within five business days with an update on your job posting.<br><br>
			In the meantime, you can check out what our website will offer you! 
			<br><a href="http://britsolapps.in/recruitergoa/get-job-wisdget">Get Job Widget</a><br><br>
			Thanks again for your interest in our website!<br><br>
			<b>How was it for you?</b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback <a href="http://britsolapps.in/recruitergoa/contact-us">contact us</a>
			<br><br>
			Need help?<br>
			For assistance or help, sign in and click the "<a href="http://britsolapps.in/recruitergoa/contact-us">contact</a>" link.<br><br>

			Happy Hiring!<br>
			Recruiter Goa <br><br>
			<b>Follow us for recent blogs and updates!</b><br><br>
			<a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>
			';
			//$mail2->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail2->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail2->ErrorInfo;
			} else {
				//echo 'Message has been sent';
			}

////////////////////////// To Company End - To admin for approval //////////////////////////////////////////

				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
				$mail->authentication = false;                               // Enable SMTP authentication
				// $mail->Username = 'britsolgoa@gmail.com';                 // SMTP username
				// $mail->Password = 'BraveBritsol@123';                           // SMTP password
				$mail->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 25;                                    // TCP port to connect to

				$mail->setFrom('britsolgoa@britsolapps.in', 'Bright Solution');
				$mail->addAddress('demo@britsolapps.in', 'Recruiter Goa');     // Add a recipient
				$mail->addCC('recruitergoa@gmail.com');
				// $mail->addAddress('ellen@example.com');               // Name is optional
				// $mail->addReplyTo('info@example.com', 'Information');
				// $mail->addCC('cc@example.com');
				// $mail->addBCC('bcc@example.com');

				// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'New job post pending for approval - '.$title;
				$mail->Body    = 'Hello Admin!<br><br>We have recevied a ne job post - '.$title.' pending for approval.<br><br>Job Summary:<br>Title: '.$title.'<br>Description: '.$job_description.'<br>Comapany Name: '.$company[0]['company_name'].'<br><br>Job post url: <a href="http://britsolapps.in/recruitergoa/dream-job?id='.$job_ret[0]['job_id'].'&name='.$title.'">'.$title.'</a><br><br><a href="http://britsolapps.in/recruitergoa/job-approval?key='.$job_ret[0]['job_id'].'&set=1&approval=yes&status=confirmed" style="color: green">Approve</a>     OR     <a href="http://britsolapps.in/recruitergoa/job-approval?key='.$job_ret[0]['job_id'].'&set=0&approval=no&status=declined" style="color: red">Reject</a><br><br>Verify fast!<br>Team Recruiter Goa';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
					//echo 'Message has been sent';
				}

////////////////////////// To Company End - To admin for approval //////////////////////////////////////////

				return redirect('thank-you');
			}
			else
			{
				return redirect($this->agent->referrer());
			}


		}

		public function approval()
		{
			if($this->session->username)
			{
				$company_id = $this->input->get('val');

				$result = $this->JobsModel->get_company_details($company_id);

				//echo $result[0]['user_id'];exit;

				if(($result[0]['user_id']) == ($this->session->user_id))
				{
				
					$data['company_details'] = $this->JobsModel->get_company_details($company_id);

					$data['job_post'] = $this->JobsModel->get_jobid($company_id);

					$this->load->view('inc/header');
					$this->load->view('jobs/approval',$data);
					$this->load->view('inc/footer_menu');
				}
				else
				{
					return redirect('employer');
				}
			}
			else
			{
				return redirect('Auth/login');
			}
		}

	public function checkAbout()
	{
		$user_id = $this->session->user_id;

		$sub_user = $this->session->sub_user;

		if($sub_user == 0)
		{
			$user_id2 = $user_id;
		}
		else
		{
			$user_id2 = $sub_user;
		}

		if($this->JobsModel->check_company($user_id2))
		{
			echo "0";
			exit;
		}
		else
		{
			echo "1";
			exit;
		}
	}

	public function insertAbout()
	{

		$about = $this->input->post('about');

		$website = $this->input->post('site');

		$address = $this->input->post('addr');

		$c_email = $this->input->post('c_email');

		$user_id = $this->session->user_id;
		$sub_user = $this->session->sub_user;

		if($sub_user == 0)
		{
			$user_id2 = $user_id;
		}
		else
		{
			$user_id2 = $sub_user;
		}

		// echo $about." ".$website." ".$address;
		// exit;

		$data = array(
			'user_id'=>$user_id2,
			'company_email'=>$c_email,
			'company_about'=>$about,
			'company_website'=>$website,
			'company_location'=>$address
		);

		$check = $this->JobsModel->get_company($user_id2);
		if($check[0]['user_id'])
		{
			$this->JobsModel->update_about($check[0]['company_id'],$data);

			echo "1";
		}
		else
		{
			$this->JobsModel->insert_about($data);
			echo "0";
		}

		
		exit;
	}

	public function editJobPost()
	{
		if(($this->session->sub_user) == 0)
		{
			$user_id = $this->session->user_id;
		}
		else
		{
			$user_id = $this->session->user_id;
		}
		$job_id = $this->input->get('val');
		if(($this->session->user_id) && ($this->JobsModel->check_valid_job($job_id,$user_id)))
		{
			

			$result = $this->JobsModel->get_jobpost($job_id);

			

			$company_id = $this->JobsModel->get_company($user_id);

			// echo $result[0]['company_id']." + ".$company_id[0]['company_id'];
			// exit;
			

				$data['job_post'] = $this->JobsModel->get_jobpost($job_id);
			
				$data['company_location'] = $this->EmpModel->get_location();
				$data['job_keywords'] = $this->JobsModel->get_keywords();
				$data['job_category'] = $this->JobsModel->get_category();
				$data['job_sub_category'] = $this->JobsModel->get_sub_category($data['job_post'][0]['job_category_id']);
				$data['job_type'] = $this->JobsModel->get_job_type();
				$data['job_experience'] = $this->JobsModel->get_job_experience();
				$data['job_qualification'] = $this->JobsModel->get_job_qualification();

				$this->load->view('inc/header');
				$this->load->view('jobs/edit_job_post',$data);
				$this->load->view('inc/footer_menu');
		}
		else
		{
			return redirect("jobs");
		}

	}

	public function insertJobCookie()
	{
		//$keywords = $this->input->post("keywords");

			// $key = "";
			// for($i = 1; $i <= count($keywords); $i++)
			// {
			// 	if($i == count($keywords))
			// 	{
			// 		$key .= $keywords[$i - 1];
			// 	}
			// 	else
			// 	{
			// 		$key .= $keywords[$i - 1].",";
			// 	}
			// }
			// echo $key;
			// exit;

			
			

			$title = $this->input->post("j_title");
			
			$category = $this->input->post("category");

			$sub_category = $this->input->post("sub_category");

			$job_location = $this->input->post("j_location");

			$job_type = $this->input->post("job_type");

			$job_experience = $this->input->post("job_experience");

			$job_qualification = $this->input->post("job_qualification");


			$job_description = $this->input->post("noise");

			$company_location = $this->input->post("j_c_location");

			$vacancy = $this->input->post('no_vacancy');


			$data = array(
				'job_title' => $title,
				'job_location' => $job_location,
				'job_type' => $job_type,
				'job_category' => $category,
				'job_sub_category_id'=>$sub_category,
				'job_description' => $job_description,
				'no_of_vacancy' => $vacancy,
				'job_qualification' => $job_qualification,
				'job_experience' => $job_experience,
				'company_location' => $company_location,
				'keywords' => 'NA'

			);

			//echo $title." 89"; exit;
			$key='NA';

			$cookie = array(
				'name' => 'job_cookie',
				'value' => $title.'*'.$job_location.'*'.$job_type.'*'.$category.'*'.$sub_category.'*'.$job_description.'*'.$vacancy.'*'.$job_qualification.'*'.$job_experience.'*'.$company_location.'*'.$key,
				'expire' => '3600'
			);
			$this->input->set_cookie($cookie);

			

			redirect('register');
			//redirect('Jobs/cookieDisplay');
	}


	//for testing not to be pushed on live
	public function cookieDisplay()
	{
		echo $this->input->cookie('job_cookie',true)." </br></br>";

		$j_cookie = $this->input->cookie('job_cookie',true);

		$job = explode("*",$j_cookie);

		echo "<pre>";
		print_r($job);
		echo "</pre>";
		delete_cookie('job_cookie');
	}

	public function applyResume()
	{
		//echo "test";
		// echo $_FILES["appl_resume"]["name"];
		// exit;

		if($_POST)
		{

		$j_id = $this->input->post("appl_job_id");

		$appl_name = $this->input->post("appl_name");

		$appl_email = $this->input->post("appl_email");

		$j_name = $this->input->post("job_name");
		// $appl_email = "test";

		$appl_co_no = $this->input->post("appl_co_no");

		$appl_cvr_ltr = $this->input->post("appl_cvr_ltr");

		$appl_resume = $_FILES["appl_resume"]["name"];

		date_default_timezone_get();

		$dt = date('d-m-Y H.i.s');

		$fname = str_replace(':','', $dt);

		$folder = $j_id.'_'.$appl_email;

		//echo $appl_resume." ".$appl_email; exit;

		// if(!is_dir('upload/resume'.$folder))
		// {
		// 	mkdir('./upload/resume'.$folder,0777,TRUE);
		// 	echo "123"; exit;
		// }
		// else
		// {
		// 	echo "0000000000000"; exit;
		// }

		$job_data = $this->JobsModel->get_jobpost($j_id);

		$data = array(
			'job_id' => $j_id,
			'applied_by_name' => $appl_name,
			'applied_by_email' => $appl_email,
			'applied_by_contact' => $appl_co_no,
			'current_position' => 'NA',
			'applied_by_cv_link' => 'upload/resume/'.$folder.'/'.$appl_resume
		);

		//echo "1"; exit;

		

		$res = $this->JobsModel->search_job_appl($j_id,$appl_email);

		//print_r($res); exit;

		if(empty($res))
		{
			
			
			$config['upload_path'] = './upload/resume/'.$folder.'/';
			$config['allowed_types'] = 'doc|docx|pdf';
			$config['max_size'] = 15360;  //file size limit

			$this->load->library('upload',$config);
			if(!is_dir('upload/resume/'.$folder))
			{
				mkdir('./upload/resume/'.$folder,0777,TRUE);

				if( $this->upload->do_upload('appl_resume'))
				{
				//if(move_uploaded_file())
					
					
					$data2 = array('upload_data' => $this->upload->data());

					$this->JobsModel->insertJobAppl($data);

					$cmp = $this->JobsModel->get_company_email($j_id);

					//email
					$mail2 = new PHPMailer;

					//$mail->SMTPDebug = 3;                               // Enable verbose debug output

					$mail2->isSMTP();                                      // Set mailer to use SMTP
					$mail2->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
					$mail2->authentication = false;                               // Enable SMTP authentication
					$mail2->Username = 'britsolgoa@gmail.com';                 // SMTP username
					$mail2->Password = 'BraveBritsol@123';                           // SMTP password
					$mail2->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
					$mail2->Port = 25;                                    // TCP port to connect to

					$mail2->setFrom('britsolgoa@britsolapps.in', 'Recruiter Goa');
					$mail2->addAddress($cmp[0]['company_email'], $cmp[0]['company_name']);     // Add a recipient
					// $mail->addAddress('ellen@example.com');               // Name is optional
					$mail2->addReplyTo($appl_email, $appl_name);
					//$mail2->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');

					$attachment = $this->config->item('base_url').'/upload/resume/'.$folder.'/'.$appl_resume;

					$mail2->addAttachment($attachment);         // Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$img = $this->config->item('base_url').'assets/images/logo-2.jpg';
					$fb_logo = $this->config->item('base_url').'assets/images/font/facebook.png';
					$twt_logo = $this->config->item('base_url').'assets/images/font/twitter.png';
					$lnkdin_logo = $this->config->item('base_url').'assets/images/font/linkedin.png';
					$mail2->AddEmbeddedImage($img,'logo');
					$mail2->AddEmbeddedImage($fb_logo,'fb_logo');
					$mail2->AddEmbeddedImage($twt_logo,'twt_logo');
					$mail2->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');
					$mail2->isHTML(true);                                  // Set email format to HTML

					$mail2->Subject = $appl_name.' has applied for '.$cmp[0]['job_title'].' on Recruiter Goa.';
					$mail2->Body    = '<center> <img src="cid:logo" > </center><br><br>
					Hi '.$cmp[0]['company_name'].'<br><br>Good News!<br><br>
					You have a new applicant for your Job Post <a href="'.$this->config->item('base_url').'/dream-job?id='.$j_id.'&name='.$cmp[0]['job_title'].'">'.$cmp[0]['job_title'].'</a>
					<br><br>
					<b>Candidate details:<b><br><br>
					Name: '.$appl_name.'<br>
					Mob no: '.$appl_co_no.'<br>
					Email: '.$appl_email.'<br>
					Covering letter:<br>'.$appl_cvr_ltr.'<br><br>
					View all your applications for this job role on <a href="http://britsolapps.in/recruitergoa/employer" >Recruiter Goa</a><br>
						Already filled this position? Update the status of this job on <a href="http://britsolapps.in/recruitergoa/employer" >Recruiter Goa</a><br>
					<br><b>Tip:<b> Login in the Recruiter Goa dashboard to get an overview of all your jobs, list of all the status of your applications and overview statistics.  <br><br>
					<b>Please note that the resume on our website will remain saved for only 10 days. </b>
					<br><br>
					<b>How was it for you?</b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback <a href="http://britsolapps.in/recruitergoa/contact-us">contact us</a>
			<br><br>
			Need help?<br>
			For assistance or help, sign in and click the "<a href="http://britsolapps.in/recruitergoa/contact-us">contact</a>" link.<br><br>

			Happy Hiring!<br>
			Recruiter Goa <br><br>
			<b>Follow us for recent blogs and updates!</b><br><br>
			<a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>';
					//$mail2->AltBody = 'This is an automated generated email';

					if(!$mail2->send()) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail2->ErrorInfo;
					} else {
						//echo 'Message has been sent';
					}
					//email

					$mail3 = new PHPMailer;

					//$mail->SMTPDebug = 3;                               // Enable verbose debug output

					$mail3->isSMTP();                                      // Set mailer to use SMTP
					$mail3->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
					$mail3->authentication = false;                               // Enable SMTP authentication
					$mail3->Username = 'britsolgoa@gmail.com';                 // SMTP username
					$mail3->Password = 'BraveBritsol@123';                           // SMTP password
					$mail3->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
					$mail3->Port = 25;                                    // TCP port to connect to

					$mail3->setFrom('britsolgoa@britsolapps.in', 'Recruiter Goa');
					//$mail3->addAddress($cmp[0]['company_email'], $cmp[0]['company_name']);     // Add a recipient
					$mail3->addAddress($appl_email);               // Name is optional
					//$mail3->addReplyTo($appl_email, $appl_name);
					//$mail3->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');

					$attachment = $this->config->item('base_url').'/upload/resume/'.$folder.'/'.$appl_resume;

					$mail3->addAttachment($attachment);         // Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$img = $this->config->item('base_url').'assets/images/logo-2.jpg';
					$fb_logo = $this->config->item('base_url').'assets/images/font/facebook.png';
					$twt_logo = $this->config->item('base_url').'assets/images/font/twitter.png';
					$lnkdin_logo = $this->config->item('base_url').'assets/images/font/linkedin.png';
					$mail3->AddEmbeddedImage($img,'logo');
					$mail3->AddEmbeddedImage($fb_logo,'fb_logo');
					$mail3->AddEmbeddedImage($twt_logo,'twt_logo');
					$mail3->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');
					$mail3->isHTML(true);                                  // Set email format to HTML

					$mail3->Subject = 'Application confirmation '.$cmp[0]['job_title'];
					$mail3->Body    = '<center> <img src="cid:logo" > </center><br><br>
					Hi '.$appl_name.'<br><br>
					Your application for <a href="'.$this->config->item('base_url').'/dream-job?id='.$j_id.'&name='.$cmp[0]['job_title'].'">'.$cmp[0]['job_title'].'</a> has been received and forwarded to the employer.
					<br><br>
					<b>Job details:<b><br><br>
					Job Title: '.$job_data[0]['job_title'].'<br>
					Location: '.$job_data[0]['job_location'].'<br>
					Company: '.$job_data[0]['job_posted_by'].'<br><br>
					For more information regarding this vacancy, including contact details, <a href="'.$this->config->item('base_url').'/dream-job?id='.$j_id.'&name='.$cmp[0]['job_title'].'">click here</a>. <br>
					Our advice center contains articles with helpful tips, how-to guides, CV templates & much more. <a href="'.$this->config->item('base_url').'/blogs" ><b>View our blog<b></a> <br>
					<br><b>All the best! <b> 
					<br><br>
					<b>How was it for you?</b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback <a href="http://britsolapps.in/recruitergoa/contact-us">contact us</a>
			<br><br>
			Need help?<br>
			For assistance or help, sign in and click the "<a href="http://britsolapps.in/recruitergoa/contact-us">contact</a>" link.<br><br>

			Happy Hiring!<br>
			Recruiter Goa <br><br>
			<b>Follow us for recent blogs and updates!</b><br><br>
			<a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>';
					//$mail3->AltBody = 'This is an automated generated email';

					if(!$mail3->send()) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail3->ErrorInfo;
					} else {
						//echo 'Message has been sent';
					}

					echo "0";//inserted successfuly

					mkdir('./upload/resume/'.$folder,0777,TRUE);
					
					return redirect("dream-job?id=".$j_id."&name=".$j_name."&status=0");
					
					/////////////////////
					
				}
				else
				{
					$error = array('error' => $this->upload->display_errors());

					echo "<pre>";
					print_r($error);//errors
					echo "</pre>";
					//exit;
					//echo "Something went wrong! Kindly try again later!";
					return redirect("dream-job?id=".$j_id."&name=".$j_name."&status=2");
				}
				
				
			}
			else
			{
				echo "Something went wrong! Kindly try again later!";
				
				return redirect("dream-job?id=".$j_id."&name=".$j_name."&status=3");
			}

			
			
		}
		else
		{
			echo "1";//already applied

			return redirect("dream-job?id=".$j_id."&name=".$j_name."&status=1");
		}

		return redirect("dream-job?id=".$j_id."&name=".$j_name."&status=2");

		}
		else
		{
			return redirect("Home");
		}
	}

	public function loadMore()
	{
		if($this->input->post('limit'))
		{
			$limit = $this->input->post('limit');
			$start = $this->input->post('start');


			$data['limit'] = $limit+$start;
			$data['start'] = $limit;
		
			if($this->input->post('cat') && $this->input->post('key') && $this->input->post('loc'))
			{
				$key = $this->input->post('key');
				$loc = $this->input->post('loc');
				$cat = $this->input->post('cat');
				$data['jobs'] = $this->JobsModel->view_jobs_fill_home($limit,$start,$key,$loc,$cat);
				$data['jobs_count'] = $this->JobsModel->view_jobs_fill_home_cnt($key,$loc,$cat);

				$data['key'] = $key; $data['loc'] = $loc; $data['cat'] = $cat;
			}
			elseif($this->input->post('cat') || $this->input->post('loc') )
			{
				if($this->input->post('cat'))
				{
					$cat = $this->input->post('cat');
					$data['jobs'] = $this->JobsModel->view_jobs_home_cat($limit,$start,$cat);
					$data['job_cnt'] = $this->JobsModel->view_jobs_home_cat_cnt($key,$loc,$cat);

					$data['cat'] = $cat;
				}
				else
				{
					$loc = $this->input->post('loc');
					$data['jobs'] = $this->JobsModel->view_jobs_home_loc($limit,$start,$loc);
					$data['job_cnt'] = $this->JobsModel->view_jobs_home_loc_cnt($key,$loc,$loc);

					$data['loc'] = $loc;
				}
			}
			else
			{
				$data['jobs'] = $this->JobsModel->view_jobs($limit,$start);
				$data['job_cnt'] = $this->JobsModel->jobs_count();
			}

			$this->load->view('jobs/ajxLoadMore',$data);
		}
		// header('Content-Type: application/json');
		// echo json_encode($result);
	}

	public function pgNumber()
	{
		if($this->input->post('limit'))
		{
			$to = $this->input->post('limit');
			$total = $this->input->post('total');

			$res['to'] = $to;
			$res['total'] = $total;

			$this->load->view('jobs/ajxShowNum',$res);
		}
	}

	public function updateJobPost()
	{
		$user_id = $this->session->user_id;

		$sub_user = $this->session->sub_user;

		if($sub_user == 0)
		{
			$user_id2 = $user_id;
		}
		else
		{
			$user_id2 = $sub_user;
		}

		// $keywords = $this->input->post("keywords");

		// $temp_keywords = $this->input->post("h_keywords");

		// $key = "";

		// if($keywords == "")
		// {
		// 	$contk = 0;
		// }
		// else
		// {
		// 	$contk = count($keywords);
		// }
		// for($i = 1; $i <= $contk; $i++)
		// {
		// 	if($i == $contk)
		// 	{
		// 		$key .= $keywords[$i - 1];
		// 	}
		// 	else
		// 	{
		// 		$key .= $keywords[$i - 1].",";
		// 	}
		// }

		// $key .= $temp_keywords; 
		// echo $key;
		// exit;

		

		
		

		$title = $this->input->post("j_title");
		
		$category = $this->input->post("category");

		$job_location = $this->input->post("j_location");

		$job_type = $this->input->post("job_type");

		$job_experience = $this->input->post("job_experience");

		

		$job_qualification = $this->input->post("job_qualification");

		

		$job_description = $this->input->post("noise");

		$company_location = $this->input->post("j_c_location");

		$vacancy = $this->input->post('no_vacancy');

		$job_id = $this->input->post('job_id');

		$sub_category = $this->input->post('sub_category');

		$data = array(
			'job_title' => $title,
			'job_location' => $job_location,
			'job_type' => $job_type,
			'job_category' => $category,
			'job_sub_category_id'=>$sub_category,
			'job_description' => $job_description,
			'no_of_vacancy' => $vacancy,
			'job_qualification' => $job_qualification,
			'job_experience' => $job_experience,
			'company_location' => $company_location,
			'keywords' => 'NA'

		);

		if($this->JobsModel->update_job($job_id,$data))
		{
			return redirect("dream-job?id=".$job_id."&name=".$title);
		}

		return redirect("dream-job?id=".$job_id."&name=".$title);
	}

	public function ajxIndex()
	{
		$limit = $this->input->post('limit');
		$start = $this->input->post('start');

		//get post values
		$job_type = $this->input->post('job_type');
		$experience = $this->input->post('experience');
		$salary = $this->input->post('salary');
		$date_posted = $this->input->post('date_posted');
		$qualification = $this->input->post('qualification');
		$category = $this->input->post('category');
		$location = $this->input->post('location');
		//get post value
		//echo $job_type." + ".$salary;exit;

		if($this->input->post('setFilter'))
		{
			$filter_data = array();
			$data_condition = array();
			if(!empty($job_type))
			{
				array_push($filter_data, $job_type);
				array_push($data_condition, "job-type");
				//echo "yes"; exit;
			}
			elseif(!empty($experience))
			{
				array_push($filter_data, $experience);
				array_push($data_condition, "experience");
			}
			elseif(!empty($salary))
			{
				array_push($filter_data, $salary);
				array_push($data_condition, "salary");
			}
			elseif(!empty($date_posted))
			{
				array_push($filter_data, $date_posted);
				array_push($data_condition, "date-posted");
			}
			elseif(!empty($qualification))
			{
				array_push($filter_data, $qualification);
				array_push($data_condition, "qualification");
			}
			elseif(!empty($category))
			{
				array_push($filter_data, $category);
				array_push($data_condition, "category");
			}
			elseif(!empty($location))
			{
				array_push($filter_data, $location);
				array_push($data_condition, "location");
			}
		}

		// echo "<pre>";
		// print_r($filter_data);
		// echo "</pre>";
		// exit;
		
		if($this->input->post('filter') == "popular")
		{
			$data['filter']  = 'popular';
			if($this->input->post('setFilter'))
			{
				$data['jobs'] = $this->JobsModel->view_jobs_popular_filter($limit,$start,$filter_data,$data_condition);
				$data['jobs_count'] = $this->JobsModel->jobs_count_filter($filter_data,$data_condition);
			}
			else
			{
				
				$data['jobs'] = $this->JobsModel->view_jobs_popular($limit,$start);
				$data['jobs_count'] = $this->JobsModel->jobs_count();
			}
		}
		elseif($this->input->post('filter') == "recent")
		{
			$data['filter']  = 'recent';
			if($this->input->post('setFilter'))
			{
				$data['jobs'] = $this->JobsModel->view_jobs_filter($limit,$start,$filter_data,$data_condition);
				$data['jobs_count'] = $this->JobsModel->jobs_count_filter($filter_data,$data_condition);
			}
			else
			{
				
				$data['jobs'] = $this->JobsModel->view_jobs($limit,$start);
				$data['jobs_count'] = $this->JobsModel->jobs_count();
			}
		}
		

		$data['limit'] = $limit;
		$data['start'] = $start;

		

        
		$this->load->view('jobs/ajxJobContainer',$data);
		
	}

	public function ajxIndexPgNum()
	{
		$limit = $this->input->post('limit');
		$start = $this->input->post('start');

		//get post values
		$job_type = $this->input->post('job_type');
		$experience = $this->input->post('experience');
		$salary = $this->input->post('salary');
		$date_posted = $this->input->post('date_posted');
		$qualification = $this->input->post('qualification');
		$category = $this->input->post('category');
		$location = $this->input->post('location');
		//get post value
		//echo $job_type." + ".$salary;exit;

		if($this->input->post('setFilter'))
		{
			$filter_data = array();
			$data_condition = array();
			if(!empty($job_type))
			{
				array_push($filter_data, $job_type);
				array_push($data_condition, "job-type");
				//echo "yes"; exit;
			}
			elseif(!empty($experience))
			{
				array_push($filter_data, $experience);
				array_push($data_condition, "experience");
			}
			elseif(!empty($salary))
			{
				array_push($filter_data, $salary);
				array_push($data_condition, "salary");
			}
			elseif(!empty($date_posted))
			{
				array_push($filter_data, $date_posted);
				array_push($data_condition, "date-posted");
			}
			elseif(!empty($qualification))
			{
				array_push($filter_data, $qualification);
				array_push($data_condition, "qualification");
			}
			elseif(!empty($category))
			{
				array_push($filter_data, $category);
				array_push($data_condition, "category");
			}
			elseif(!empty($location))
			{
				array_push($filter_data, $location);
				array_push($data_condition, "location");
			}
		}

		// echo "<pre>";
		// print_r($filter_data);
		// echo "</pre>";
		// exit;
		
		if($this->input->post('filter') == "popular")
		{
			$data['filter']  = 'popular';
			if($this->input->post('setFilter'))
			{
				
				$data['jobs_count'] = $this->JobsModel->jobs_count_filter($filter_data,$data_condition);
			}
			else
			{
				
				
				$data['jobs_count'] = $this->JobsModel->jobs_count();
			}
		}
		elseif($this->input->post('filter') == "recent")
		{
			$data['filter']  = 'recent';
			if($this->input->post('setFilter'))
			{
				
				$data['jobs_count'] = $this->JobsModel->jobs_count_filter($filter_data,$data_condition);
			}
			else
			{
				
				
				$data['jobs_count'] = $this->JobsModel->jobs_count();
			}
		}
		

		$data['limit'] = $limit;
		$data['start'] = $start;

		

        
		$this->load->view('jobs/ajxJobContainerPgNum',$data);
	}

	public function searchIndex()
	{
		$search = $this->input->post('search');

		if($this->input->post('limit'))
		{
			$limit = $this->input->post('limit');
			$start = $this->input->post('start');
		}
		else
		{
			$limit = 5; $start = 0;
		}

		$data['limit'] = $limit; $data['start'] = $start; $data['search'] = $search;

		$data['jobs_count'] = $this->JobsModel->count_search_jobs($search);

		$data['jobs'] = $this->JobsModel->view_search_jobs($limit,$start,$search);

		//print_r($data['jobs_count']); exit;

		$this->load->view('jobs/ajxSearchJobs',$data);
	}

	public function pgSearchNum()
	{
		if($this->input->post('limit'))
		{
			$limit = $this->input->post('limit');
		}
		else
		{
			$limit = 5;
		} 
		
		$search = $this->input->post('search');

		$data['jobs_count'] = $this->JobsModel->count_search_jobs($search);
		$data['limit'] = $limit;

		//print_r($data);exit;

		$this->load->view('jobs/ajxJobContainerPgNum',$data);
	}

	public function getSubCat()
	{
		if($this->input->post('category'))
		{
			$category = $this->input->post('category');

			header('Access-Control-Allow-Origin: *');
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			header("Content-Type:application/json");	
			$response['sub_cat'] = $this->JobsModel->get_sub_category($category);            
			echo json_encode($response);
		}
	}

}
