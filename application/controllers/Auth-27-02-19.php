<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('AuthModel');
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
						'username'=>$result['username'],
						'email_id'=>$result['email'],
						'token'=>$values['token'],
						'user_type'=>$result['user_type'],
						'isloggedIn'=>true
						)
					);


				if($result['user_type'] > 2)
				{
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
						'username'=>$result['username'],
						'email_id'=>$result['email'],
						'user_type'=>$result['user_type'],
						'token'=>$values['token'],
						'isloggedIn'=>true
						)
					);

				if($result['user_type'] > 2)
				{
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
				echo "Incorrect credentials";
				exit;
			}
		}
	}

	public function signup()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email2');
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
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Verify your account';
			$mail->Body    = 'Dear user<br>verify your account '.$url;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

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
}
