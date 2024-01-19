<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('AuthModel');
		$this->load->model('EmpModel');
		$this->load->model('JobsModel');
	}

	public function login(){

		$this->load->view('admin/auth/login');
	}		

	public function login_process(){
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run()) { //Validation Success
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			if ($this->AuthModel->is_valid_user($email,$password))
			{
				$result =  $this->AuthModel->get_user_data($email)[0];

				//Set Session
				$this->session->set_userdata(
					array(
						'user_id'=>$result['user_id'],
						'sub_user'=>$result['sub_user'],
						'username'=>$result['username'],
						'email_id'=>$result['email'],
						'token'=>$result['token'],
						'user_type'=>$result['user_type'],
						'isloggedIn'=>true
						)
					);


				if($result['user_type'] > 2)
				{
					$j_cookie = $this->input->cookie('job_cookie',true);
					if(isset($j_cookie))
					{
						$job = explode("*",$j_cookie);

						$res2 = $this->JobsModel->get_company_id($result['user_id']);

						$data3 = array(
							'job_title' => $job[0],
							'job_posted_by' => $result['username'],
							'company_id' => $res2[0]['company_id'],
							'job_location' => $job[1],
							'job_type' => $job[2],
							'job_category' => $job[3],
							'job_sub_category_id'=>$job[4],
							'job_description' => $job[5],
							'no_of_vacancy' => $job[6],
							'job_qualification' => $job[7],
							'job_experience' => $job[8],
							'salary_range' => $job[10],
							'keywords' => $job[11],
							'expiry_date'=>$job[9]

						);


						$job_ret = $this->JobsModel->insert_job_post($data3);
						//delete_cookie('job_cookie');

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
						$mail2->addAddress($email, $result['username']); 
						$mail2->addCC('recruitergoa@gmail.com');    // Add a recipient
						// $mail->addAddress('ellen@example.com');               // Name is optional
						// $mail->addReplyTo('info@example.com', 'Information');
						// $mail->addCC('cc@example.com');
						// $mail->addBCC('bcc@example.com');

						// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
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

						$mail2->Subject = 'Your job post <b>'.$job[0].'</b> has been received sent to admin for approval.';
						$mail2->Body    = '<center> <img src="cid:logo" > </center><br><br>
						Dear '.$result['username'].'<br><br><b>Your job listing application On Recruiter Goa has been sent to admin for approval.</b><br><br>
						<center>'.$job[0].'</center>
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
				$mail->AddEmbeddedImage($img,'logo');
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'New job post pending for approval - '.$job[0];
				$mail->Body    = '<center> <img src="cid:logo" > </center><br><br>
				Hello Admin!<br><br>We have recevied a ne job post - '.$job[0].' pending for approval.<br><br>Job Summary:<br>Title: '.$job[0].'<br>Description: '.$job[4].'<br>Comapany Name: '.$result['username'].'<br><br>Job post url: <a href="http://britsolapps.in/recruitergoa/dream-job?id='.$job_ret.'&name='.$job[0].'">'.$job[0].'</a><br><br><a href="http://britsolapps.in/job-approval?key='.$job_ret.'&set=1&approval=yes&status=confirmed" style="color: green">Approve</a>     OR     <a href="http://britsolapps.in/job-approval?key='.$job_ret.'&set=0&approval=no&status=declined" style="color: red">Reject</a><br><br>Verify fast!<br>Team Recruiter Goa';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
					//echo 'Message has been sent';
				}

////////////////////////// To Company End - To admin for approval //////////////////////////////////////////
					}
					delete_cookie('job_cookie');
					
					return redirect('employer');
				}
				else
				{
					return redirect('admin');
				}
				

				//$data['token'] = $values['token'];
				
				//$this->load->view('admin/auth/login');
				//$this->load->view('admin/dashboard/pages/dashboard',$data);
				//return redirect('admin');			
			}
			else{	
				$this->load->view('admin/auth/login');
			}
	}}

	public function register(){
		$data = array(
			'username'=>'pramitsawant',
			'password'=>sha1('root'),
			'belongs_to_company'=>'0',
			'email'=>'pramitsawant@gmail.com',
			'user_type'=>1,
			'token'=> $this->generateRandomKey(),
			);
		$this->AuthModel->register($data);
	}	
	
	public function is_user_in_session(){
		if($this->session->userdata('isloggedIn') == true){
			return true;
		}
		else{
			return false;			
		}	
	}	
	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('admin/auth/login');
	}	
	function generateRandomKey($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	//prajwal
	public function signin()
	{
		if($this->input->post('username'))
		{
			$email = $this->input->post('username');
			$password = sha1($this->input->post('password'));
			if ($this->AuthModel->is_valid_user($email,$password))
			{
				$result =  $this->AuthModel->get_user_data($email)[0];

				//Set Session
				$this->session->set_userdata(
					array(
						'user_id'=>$result['user_id'],
						'sub_user'=>$result['sub_user'],
						'username'=>$result['username'],
						'email_id'=>$result['email'],
						'user_type'=>$result['user_type'],
						'token'=>$values['token'],
						'isloggedIn'=>true
						)
					);

				if($result['user_type'] > 2)
				{
					$j_cookie = $this->input->cookie('job_cookie',true);
					if(isset($j_cookie))
					{
						$job = explode("*",$j_cookie);

						$res2 = $this->input->get_company_id($result['user_id']);

						$data3 = array(
							'job_title' => $job[0],
							'job_posted_by' => $result['username'],
							'company_id' => $res2[0]['company_id'],
							'job_location' => $job[1],
							'job_type' => $job[2],
							'job_category' => $job[3],
							'job_sub_category_id'=>$job[4],
							'job_description' => $job[5],
							'no_of_vacancy' => $job[6],
							'job_qualification' => $job[7],
							'job_experience' => $job[8],
							'company_location' => $job[9],
							'salary_range' => $job[12],
							'keywords' => $job[14]

						);


						$this->JobsModel->insert_job_post($data3);
						

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
						$mail2->addAddress($email, $result['username']); 
						$mail2->addCC('recruitergoa@gmail.com');    // Add a recipient
						// $mail->addAddress('ellen@example.com');               // Name is optional
						// $mail->addReplyTo('info@example.com', 'Information');
						// $mail->addCC('cc@example.com');
						// $mail->addBCC('bcc@example.com');

						// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
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

						$mail2->Subject = 'Your job post <b>'.$job[0].'</b> has been received sent to admin for approval.';
						$mail2->Body    = '<center> <img src="cid:logo" > </center><br><br>
						Dear '.$result['username'].'<br><br><b>Your job listing application On Recruiter Goa has been sent to admin for approval.</b><br><br>
						<center>'.$job[0].'</center>
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

						if(!$mail2->send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail2->ErrorInfo;
						} else {
							//echo 'Message has been sent';
						}
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
						$mail->AddEmbeddedImage($img,'logo');
						$mail->isHTML(true);                                  // Set email format to HTML

						$mail->Subject = '<center> <img src="cid:logo" > </center><br><br>
						New job post pending for approval - '.$job[0];
						$mail->Body    = 'Hello Admin!<br><br>We have recevied a ne job post - '.$job[0].' pending for approval.<br><br>Job Summary:<br>Title: '.$job[0].'<br>Description: '.$job[4].'<br>Comapany Name: '.$result['username'].'<br><br>Job post url: <a href="http://britsolapps.in/recruitergoa/dream-job?id='.$job_ret.'&name='.$job[0].'">'.$job[0].'</a><br><br><a href="http://britsolapps.in/job-approval?key='.$job_ret.'&set=1&approval=yes&status=confirmed" style="color: green">Approve</a>     OR     <a href="http://britsolapps.in/job-approval?key='.$job_ret.'&set=0&approval=no&status=declined" style="color: red">Reject</a><br><br>Verify fast!<br>Team Recruiter Goa';
						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						if(!$mail->send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
						} else {
							//echo 'Message has been sent';
						}
						delete_cookie('job_cookie');
					}
					
					return redirect('employer');
				}
				else
				{
					return redirect('admin');
				}
				

				//$data['token'] = $values['token'];
				
				//$this->load->view('admin/auth/login');
				//$this->load->view('admin/dashboard/pages/dashboard',$data);
							
			}
			else{	
				//$this->load->view('admin/auth/login');
				return redirect('error-404?msg=inc-cred');
			}
		}
	}

	public function signup()
	{
		$username = $this->input->post('company_name');
		$email = $this->input->post('username');
		$password = sha1($this->input->post('password'));
		$data = array(
			'username'=>$username,
			'password'=>sha1($password),
			'belongs_to_company'=>'1',
			'email'=>$email,
			'user_type'=>3,
			'token'=> $this->generateRandomKey(),
			'is_active' =>0,
			);
		$this->AuthModel->register($data);

		$result = $this->AuthModel->get_user_id($email)[0];

		$base_url = $this->config->item('base_url');

		$data2 = array(
			'url' => $base_url.'/verify-user?token='.$result['token'].'&id='.$result['user_id'],
			'url_for' => 'verify company',
			'status' => 1,
		);

		$url = $base_url.'/verify-user?token='.$result['token'].'&id='.$result['user_id'];

		$this->AuthModel->verify_user($data2);

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
			$mail->addAddress($email, 'Account Verification email');     // Add a recipient
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
			$mail->AddEmbeddedImage($img,'logo');
			$mail->AddEmbeddedImage($fb_logo,'fb_logo');
			$mail->AddEmbeddedImage($twt_logo,'twt_logo');
			$mail->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Verify your Recruiter Goa account';
			$mail->Body    = '<center> <img src="cid:logo" > </center><br><br>
			<center><h3>Just one more step...</h3></center><br><br>
			Hi '.$username.'<br><br>
			Thanks for registering us with us! <br>
			Before you get started, you will need to activate your account. You can do this by clicking on the link below:<br><br>
			<b>Activation link: <a href="'.$url.'" >click here</a></b><br><br>
			Or you can copy and paste the below link in your browser.<br>
			URL :'.$url.'<br>
			Once you have activated your account, you will be able to log in and get started.<br><br>
			<b>How was it for you?</b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback - <a href="http://britsolapps.in/recruitergoa/contact-us">Click here</a><br><br>

			Need help?<br>
			For assistance or help, sign in and click the <a href="http://britsolapps.in/recruitergoa/contact-us">"contact"<a> link.<br><br>

			Happy Hiring!<br>
			Recruiter Goa <br><br>
			<b>Follow us for recent blogs and updates!</b><br><br>
			<a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>

			';
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				//echo 'Message has been sent';
			}

		//sessions to be added
		return redirect('thank-you');
	}

	public function signout()
	{
		$this->session->sess_destroy();
		return redirect('home');
	}

	public function verify()
	{
		$token = $this->input->get('token');
		$user_id = $this->input->get('id');

		$base_url = $this->config->item('base_url');
		$url = $base_url.'/verify-user?token='.$token.'&id='.$user_id;

		if($this->AuthModel->is_valid_url($url))
		{
			if($this->AuthModel->is_valid_user_verify($token,$user_id))
			{
				$result =  $this->AuthModel->get_user_data($email)[0];

					//Set Session
					$this->session->set_userdata(
						array(
							'user_id'=>$user_id,
							'sub_user'=>$result['sub_user'],
							'username'=>$result['username'],
							'email_id'=>$result['email'],
							'user_type'=>$result['user_type'],
							'token'=>$token,
							'isloggedIn'=>true
							)
						);

						

						$this->AuthModel->set_verify_user($url);

						$this->AuthModel->set_user($user_id);

						return redirect('employer');
			}
			else
			{
				return redirect('page-expired');
			}
		}
		else{
			return redirect('page-expired');
		}
	}

	public function checkEmail()
	{
		$email = $this->input->post('email');

		if($this->AuthModel->check_email($email))
		{
			echo "0";//success
			exit;
		}
		else
		{
			echo "1";//email does not exist
			exit;
		}
	}

	public function regVerify()
	{
		// $company_address = $this->input->post('selLocation');

		// $company_category = $this->input->post('selCat');

		// $company_website = $this->input->post('website');

		// 	echo $company_address." ".$company_category." ".$company_website; exit;
		
		$username = $this->input->post('companyname');
		$email = $this->input->post('email_reg');
		$password = sha1($this->input->post('password_reg2'));
		$data = array(
			'username'=>$username,
			'password'=>sha1($password),
			'belongs_to_company'=>'1',
			'email'=>$email,
			'user_type'=>3,
			'token'=> $this->generateRandomKey(),
			'is_active' =>0,
			);
		$this->AuthModel->register($data);

		$result = $this->AuthModel->get_user_id($email)[0];

		$base_url = $this->config->item('base_url');

		$data2 = array(
			'url' => $base_url.'/verify-user?token='.$result['token'].'&id='.$result['user_id'],
			'url_for' => 'verify company',
			'status' => 1,
		);

		$url = $base_url.'/verify-user?token='.$result['token'].'&id='.$result['user_id'];

		$this->AuthModel->verify_user($data2);

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
			$mail->addAddress($email, 'Account Verification email');     // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$img = $this->config->item('base_url').'assets/images/logo-2.jpg';
			$fb_logo = $this->config->item('base_url').'assets/images/font/facebook.png';
			$twt_logo = $this->config->item('base_url').'assets/images/font/twitter.png';
			$lnkdin_logo = $this->config->item('base_url').'assets/images/font/linkedin.png';
			$mail->AddEmbeddedImage($img,'logo');
			$mail->AddEmbeddedImage($fb_logo,'fb_logo');
			$mail->AddEmbeddedImage($twt_logo,'twt_logo');
			$mail->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Verify your account';
			$mail->Body    = '<center> <img src="cid:logo" > </center><br><br>
			<center>Just one more step...</center><br><br>
			Hi '.$username.'<br><br>
			Thanks for registering us with us! <br>
			Before you get started, you will need to activate your account. You can do this by clicking on the link below:<br><br>
			<b>Activation link: <a href="'.$url.'" >click here</a></b><br><br>
			Or you can copy and paste the below link in your browser.<br>
			URL :'.$url.'<br>
			Once you have activated your account, you will be able to log in and get started.<br><br>
			<b>How was it for you?</b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback - <a href="http://britsolapps.in/recruitergoa/contact-us">Click here</a><br><br>

			Need help?<br>
			For assistance or help, sign in and click the <a href="http://britsolapps.in/recruitergoa/contact-us">"contact"<a> link.<br><br>

			Happy Hiring!<br>
			Recruiter Goa <br><br>
			<b>Follow us for recent blogs and updates!</b><br><br>
			<a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>
			';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				//echo 'Message has been sent';
			}

			//insert company details

			$company_name = $this->input->post('companyname');

			$company_email = $this->input->post('c_email');

			$company_website = $this->input->post('website');

			$company_address = $this->input->post('selLocation');

			// echo $company_address; exit;

			$company_category = $this->input->post('selCat');

			$company_about = $this->input->post('noise');

			

			$user_id = $result['user_id'];

			$company_address2 = $this->input->post('c_loc2');

			if($company_address == "others")
			{
				
				$company_address = $company_address2;
			}
			else
			{
				$company_address2 = $company_address;
			}

			$data2 = array(
				'user_id' => $user_id,
				'company_name' => $company_name,
				'company_type_id' => $company_category,
				'company_email' => $company_email,
				'company_location_id' => $company_address,
				'company_about' => $company_about,
				'company_website' => $company_website,
			);

			$this->EmpModel->insert_company_detail($data2);

			if(!$this->input->cookie('job_cookie',true))
			{
				return redirect('thank-you?no');
			}
			
			//insert job

			$res2 = $this->JobsModel->get_company_id($user_id);

			$j_cookie = $this->input->cookie('job_cookie',true);

			$job = explode("*",$j_cookie);


			$data3 = array(
				'job_title' => $job[0],
				'job_posted_by' => $username,
				'company_id' => $res2[0]['company_id'],
				'job_location' => $job[1],
				'job_type' => $job[2],
				'job_category' => $job[3],
				'job_sub_category_id'=>$job[4],
				'job_description' => $job[5],
				'no_of_vacancy' => $job[6],
				'job_qualification' => $job[7],
				'job_experience' => $job[8],
				'company_location' => $job[9],
				'salary_range' => $job[12],
				'keywords' => $job[14]

			);


			$job_ret = $this->JobsModel->insert_job_post($data3);
			

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
			$mail2->addAddress($company_email, $company_name); 
			$mail2->addCC($email);
			$mail2->addCC('recruitergoa@gmail.com');    // Add a recipient
			// $mail->addAddress('ellen@example.com');               // Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
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

			$mail2->Subject = 'Your job post <b>'.$job[0].'</b> has been received sent to admin for approval.';
			$mail2->Body    = '<center> <img src="cid:logo" > </center><br><br>
			Dear '.$company_name.'<br><br><b>Your job listing application On Recruiter Goa has been sent to admin for approval.</b><br><br>
			<center>'.$job[0].'</center>
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
			$mail->AddEmbeddedImage($img,'logo');
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'New job post pending for approval - '.$job[0];
			$mail->Body    = '<center> <img src="cid:logo" > </center><br><br>
			Hello Admin!<br><br>We have recevied a ne job post - '.$job[0].' pending for approval.<br><br>Job Summary:<br>Title: '.$job[0].'<br>Description: '.$job[4].'<br>Comapany Name: '.$username.'<br><br>Job post url: <a href="http://britsolapps.in/recruitergoa/dream-job?id='.$job_ret.'&name='.$job[0].'">'.$job[0].'</a><br><br><a href="http://britsolapps.in/job-approval?key='.$job_ret.'&set=1&approval=yes&status=confirmed" style="color: green">Approve</a>     OR     <a href="http://britsolapps.in/job-approval?key='.$job_ret.'&set=0&approval=no&status=declined" style="color: red">Reject</a><br><br>Verify fast!<br>Team Recruiter Goa';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				//echo 'Message has been sent';
			}

			delete_cookie('job_cookie');

////////////////////////// To Company End - To admin for approval //////////////////////////////////////////

		//sessions to be added
		return redirect('thank-you');
	}
}
