<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'phpmailer/PHPMailerAutoload.php';

class Employer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('cookie');
		$this->load->library('form_validation');
        $this->load->model('EmpModel');
        $this->load->model('JobsModel');

        if($this->session->user_type <= 2)
        {
            return redirect("admin");
        }
    }
    
	public function index()
	{
        //$this->load->view('welcome_message');
        if($this->session->sub_user == "0")
        {
            $user_id = $this->session->user_id;
        }
        else
        {
            $user_id = $this->session->sub_user;
        }

        $result = $this->EmpModel->get_company($user_id);

        $data['jobs_5'] = $this->EmpModel->get_top_5_Performing_jobs($user_id);

        $cnt_view = array();

        for($i=0;$i<count($data['jobs_5']);$i++)
        {
            $view = $this->JobsModel->get_job_post_hit($data['jobs_5'][$i]['job_id']);

            array_push($cnt_view,$view[0]['hit_count']);
        }

        $temp = array();

        for($i = 0; $i < count($data['jobs_5']); $i++)
        {
            $app_cnt = $this->EmpModel->get_job_applied_cnt($data['jobs_5'][$i]['job_id']);
            array_push($temp, $app_cnt);
        }

        $data['applied_count'] = $temp;

        $data['job_view_cnt'] = $cnt_view;

        $data['total_job_posted'] = $this->EmpModel->cnt_jobPosted($result[0]['company_id']);

        $data['total_appl_submit'] = $this->EmpModel->cnt_appl_submit($result[0]['company_id']);

        $data['total_call_intrv'] = $this->EmpModel->cnt_call_intrv($result[0]['company_id']);

        $side['slctd'] = "Dashboard";   

        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/index',$data);
        $this->load->view('inc/employer/sidebar',$side);
		$this->load->view('inc/employer/footer');
	}

	public function edit()
	{
        //$this->load->view('welcome_message');
        $data['company_category'] = $this->EmpModel->get_company_type();

        $data['company_location'] = $this->EmpModel->get_location();

        $user_id = $this->session->user_id;

        $sub_user = $this->session->sub_user;

        // echo $sub_user." ";
        // echo $user_id;
        // exit;

        if($sub_user == 0)
        {
            $data['company_details'] = $this->EmpModel->get_company_details($user_id);
        }
        else
        {
            $data['company_details'] = $this->EmpModel->get_company_details($sub_user);
        }

        $side['slctd'] = "Edit";         

        

        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/edit_profile',$data);
        $this->load->view('inc/employer/sidebar',$side);
		$this->load->view('inc/footer_menu');
	}

    public function manageCandidate()
	{
        //$this->load->view('welcome_message');
        if(($this->session->sub_user) == 0)
        {
            $user_id = $this->session->user_id;
        }
        else
        {
            $user_id = $this->session->user_id;
        }

        $appl_cnt  = $this->EmpModel->get_job_appl_count_all($user_id);

        //print_r($appl_cnt); exit;

        $cnt = ceil($appl_cnt[0]['all_appl_count']/10);

        $start = 0; $limit = 10;

        $data['appl_cnt'] = $cnt;
        $data['pg'] = ($limit/10);

        $data['limit'] = $limit; $data['start'] = $start;

        $data['applicant'] = $this->EmpModel->fetch_job_appl($start,$limit,$user_id);

        $data['comp_email'] = $data['applicant'][0]['company_email'];

        // print_r($data['applicant']);
        // exit;
        $side['slctd'] = "Can"; 

        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/candidates',$data);
        $this->load->view('inc/employer/sidebar',$side);
		$this->load->view('inc/footer_menu');
    }
    
    public function manageJobs()
	{
        //$this->load->view('welcome_message');

        if(($this->session->sub_user) == 0)
        {
            $user_id = $this->session->user_id;
        }
        else
        {
            $user_id = $this->session->user_id;
        }

        $limit = 5; $start = 0;

        $data['limit'] = $limit;

        $data['start'] = $start;

        $data['job_posted'] = $this->EmpModel->get_job_posted($user_id,$limit,$start);

        $data['job_posted_cnt'] = $this->EmpModel->job_posted_cnt($user_id);


        $temp = array();

        for($i = 0; $i < count($data['job_posted']); $i++)
        {
            $app_cnt = $this->EmpModel->get_job_applied_cnt($data['job_posted'][$i]['job_id']);
            array_push($temp, $app_cnt);
        }

        $data['applied_count'] = $temp;

        // echo "<pre>";
        // print_r($temp);
        // echo "</pre>";

        // exit;
        $side['slctd'] = "Job"; 

        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/jobs',$data);
        $this->load->view('inc/employer/sidebar',$side);
		$this->load->view('inc/footer_menu');
	}

    public function updateCompany()
    {
        $company_name = $this->input->post('cname');

        $company_logo = $_FILES["company_logo"]["name"];

        $company_email = $this->input->post('cemail');

        $company_phone = $this->input->post('cphone');

        $company_website = $this->input->post('cwebsite');

        $company_address = $this->input->post('exampleFormControlSelect19');

        $company_category = $this->input->post('exampleFormControlSelect11');

        $company_about = $this->input->post('noise');

        $company_fb = $this->input->post('cfb');

        $company_twitter = $this->input->post('ctwt');

        $company_linkedin = $this->input->post('clnk');

        $user_id = $this->input->post('user_id');

        $company_address2 = $this->input->post('c_location2');

        if($company_address == "others")
        {
            
            $company_address = $company_address2;
        }
        else
        {
            $company_address2 = $company_address;
        }

        $status = 0;

        if($company_logo)
        {
            $config['upload_path'] = './upload/company_logo/'.$user_id.'/';
			$config['allowed_types'] = 'png';
            $config['max_size'] = 1024;
            
            $this->load->library('upload',$config);
            if(!is_dir('upload/company_logo/'.$user_id))
            {
                mkdir('upload/company_logo/'.$user_id,0777,TRUE);

                if( $this->upload->do_upload('company_logo'))
                {
                    $data2 = array('upload_data' => $this->upload->data());

                    $status = 1; //success
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());

                    $status = 2;//image not error
                }
            }
            else
            {
                if( $this->upload->do_upload('company_logo'))
                {
                    $data2 = array('upload_data' => $this->upload->data());

                    $status = 1; //success
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());

                    $status = 2;//image error
                }
            }
        }
        else
        {
            $status = 3; //image not uploaded
        }

        if($status == 0)
        {
            $logo_path = '';
        }
        elseif($status == 1)
        {
            $logo_path = 'upload/company_logo/'.$user_id.'/'.$company_logo;
        }
        else
        {
            $logo_path = '';
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
            'logo_path' => $logo_path 
        );

        $sub_user = $this->session->sub_user;

        if($sub_user == 0)
        {
            $check2 = $this->EmpModel->get_company($user_id);
            if($check2[0]['company_id'])
            {
                $company_id = $check2[0]['company_id'];
                $this->EmpModel->set_company_detail($data,$company_id);
                echo "0";
                
                
            }
            else
            {
                $this->EmpModel->insert_company_detail($data);
                echo "0";
               
                
            }
            
            
        }
        else
        {
            $check2 = $this->EmpModel->get_company($check['sub_user'][0]);

            $data2 = array(
                'user_id' => $sub_user,
                'company_name' => $company_name,
                'company_type' => $company_category,
                'company_email' => $company_email,
                'company_location' => $company_address,
                'company_about' => $company_about,
                'company_website' => $company_website,
                'company_linkedin' => $company_linkedin,
                'company_twitter' => $company_twitter,
                'company_fb' => $company_fb,
                'logo_path' => $logo_path 
            );

            if($check2[0]['company_id'])
            {
                $company_id = $check2[0]['company_id'];
                $this->EmpModel->set_company_detail($data2,$company_id);
                echo "0";
                //exit;
            }
            else
            {
                $this->EmpModel->insert_company_detail($data2);
                echo "0";
               // exit;
            }
        }

        //insert job
        $j_cookie = $this->input->cookie('job_cookie',true);
        if(isset($j_cookie))
        {
            $job = explode("*",$j_cookie);

            $user_id = $this->session->user_id;
            $username = $this->session->username;

            $res2 = $this->input->get_company_id($user_id,$username);

            $data3 = array(
                'job_title' => $job[0],
                'job_posted_by' => $company_name,
                'company_id' => $res2[0]['company_id'],
                'job_location' => $job[1],
                'job_type' => $job[2],
                'job_category' => $job[3],
                'job_description' => $job[4],
                'no_of_vacancy' => $job[5],
                'job_qualification' => $job[6],
                'job_experience' => $job[7],
                'company_location' => $job[8],
                'application_last_date' => $job[9],
                'gender' => $job[10],
                'salary_range_min' => $job[11],
                'salary_range_max' => $job[12],
                'keywords' => $job[13]

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
			$mail2->addAddress($company_email, $company_name); 
			$mail2->addCC($email);
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

			$mail2->Subject = 'Your job post '.$job[0].' has been received sent to admin for approval.';
            $mail2->Body    = '<center> <img src="cid:logo" > </center><br><br>
            Dear '.$company_name.',
            <br><br>
            <b>Your job listing application On Recruiter Goa has been sent to admin for approval.</b>
            <br><br>
			<center>'.$job[0].'</center>
			<br><br>Thank you for job posting on Recruiter Goa!<br><br>
			We will review your application and email you within five business days with an update on your job posting.<br><br>
			In the meantime, you can check out what our website will offer you! 
			<br><a href="http://britsolapps.in/recruitergoa/about">About Us</a><br><br>
			Thanks again for your interest in our website!<br><br>
			<b>How was it for you?</b><br>
			We would love to hear about your experience. Please let us know what we are doing well or what we can do better:<br>
			Send us your feedback <a href="http://britsolapps.in/recruitergoa/contact-us">contact us</a>
			<br><br>
			Need help?<br>
			For assistance or help, sign in and click the "<a href="http://britsolapps.in/recruitergoa/contact-us">contact</a>" link.<br><br>

			Happy Hiring!<br>
            Recruiter Goa <br><br>
            <b><a href="http://britsolapps.in/recruitergoa/blogs">Follow us for recent blogs and updates!</b><br><br>
			<a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> 
            <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> 
            <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>
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
            $mail->Body    = '<center> <img src="cid:logo" > </center>
            <br><br>
            Hello Admin!<br>
            <br>We have recevied a ne job post - '.$job[0].' pending for approval
            .<br><br>
            Job Summary:<br>Title: '.$job[0].'<br>Description: '.$job[4].'<br>
            Comapany Name: '.$username.'<br><br>
            Job post url: <a href="http://britsolapps.in/recruitergoa/dream-job?id='.$job_ret.'&name='.$job[0].'">'.$job[0].'</a><br><br>
            <a href="http://britsolapps.in/job-approval?key='.$job_ret[0].'&set=1&approval=yes&status=confirmed" style="color: green">Approve</a>     OR     <a href="http://britsolapps.in/job-approval?key='.$job_ret[0].'&set=0&approval=no&status=declined" style="color: red">Reject</a><br><br>Verify fast!<br>Team Recruiter Goa';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				//echo 'Message has been sent';
			}

            delete_cookie('job_cookie');
        }
        //insert job end
        
        return redirect("employer-edit-profle?status=".$status);
        
    }

    public function loadEmpJobs()
    {
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');

        $result['limit'] = $limit;
        $result['start'] = $start;

        if(($this->session->sub_user) == 0)
        {
            $user_id = $this->session->user_id;
        }
        else
        {
            $user_id = $this->session->user_id;
        }
        
        $result['job_posted'] = $this->EmpModel->get_job_posted($user_id,$limit,$start);

        $temp = array();

        for($i = 0; $i < count($result['job_posted']); $i++)
        {
            $app_cnt = $this->EmpModel->get_job_applied_cnt($result['job_posted'][$i]['job_id']);
            array_push($temp, $app_cnt);
        }

        $result['applied_count'] = $temp;

        $this->load->view('employer/ajx/ajxJobs',$result);

        // header('Content-Type: application/json');

        // echo json_encode($result);
    }

    public function loadJobsBtn()
    {
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');
        $job_total = $this->input->post('job_total');

        $res['limit'] = $limit;
        $res['start'] = $start;
        $res['job_total'] = $job_total;

        $this->load->view('employer/ajx/ajxJobsBtn',$res);
    }

    public function loadCanBtn()
    {
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');
        $total = $this->input->post('total');

        $res['limit'] = $limit;
        $res['start'] = $start;
        $res['total'] = $total;

        $this->load->view('employer/ajx/ajxCanBtn',$res);
    }

    public function loadCandidates()
    {
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');

        $result['limit'] = $limit;
        $result['start'] = $start;

        if(($this->session->sub_user) == 0)
        {
            $user_id = $this->session->user_id;
        }
        else
        {
            $user_id = $this->session->user_id;
        }

        $result['applicant'] = $this->EmpModel->fetch_job_appl($start,$limit,$user_id);

        $this->load->view('employer/ajx/ajxCan',$result);
    }

    public function JobPause()
    {
        if($_POST)
        {
            

            $check_del = $this->input->post('del');
            if($check_del == "1")
            {
                $status = $this->input->post('j_r_status');
                $job_id = $this->input->post('j_r_id');
            }
            else
            {
                $status = $this->input->post('j_status');
                $job_id = $this->input->post('j_s_id');

                //echo $status; exit;
            }

           
                $this->EmpModel->update_status($job_id,$status);
           

            return redirect("employer-manage-jobs?status=1");
        }
    }

    public function jobDel()
    {
        if($_POST)
        {
            $job_id = $this->input->post('j_d_id');

            $this->EmpModel->update_del($job_id);

            return redirect("employer-manage-jobs?del=1");
        } 
    }

    public function canDel()
    {
        if($_POST)
        {
            $job_id = $this->input->post('j_d_id');//apply_id

            $res = $this->EmpModel->get_job_appln($job_id);

            $path_dir = explode("/",$res[0]['applied_by_cv_link']);

            $t_dir = $path_dir[0]."/".$path_dir[1]."/".$path_dir[2];

            unlink($res[0]['applied_by_cv_link']);

            rmdir($t_dir);
            
            //$path = "".$this->config->item('base_url')."/".$res[0]["applied_by_cv_link"];

            //$this->load->helper("file");
            //delete_files($path, true, false, 1);
            $data = array(
				'applied_by_cv_link'=>'Deleted',
				'cv_enabled'=>0,
				'status'=>'Deleted',
				'is_deleted'=>1
			);

            $this->EmpModel->update_can_del($job_id,$data);

            return redirect("employer-manage-candidate?del=1");
        }
    }

    public function test()
    {
        $path = "upload/resume/5_prajwaldessai@gmail.com/prajwaldessaiProfile.pdf";

        $path_dir = explode("/",$path);

        $t_dir = $path_dir[0]."/".$path_dir[1]."/".$path_dir[2];

            $this->load->helper("file");
            unlink($path);

            rmdir($t_dir);

            echo $path."<br>".$t_dir;
    }

    public function canEmail()
    {
        if($_POST)
        {
            $r_email = $this->input->post('s_email');

            $r_email_cc = $this->input->post('s_email_cc');

            $r_email_bcc = $this->input->post('s_email_bcc');

            $r_email_body = $this->input->post('s_email_body');

            $appl_id = $this->input->post('c_appl_id');

            $res = $this->EmpModel->get_job_appln($apply_id);

            $data = array(
                'call_for_interview'=>1,
                'status'=>'Shortlisted'
            );

            $this->EmpModel->update_can_del($appl_id,$data);

            $res2 = $this->EmpModel->get_jobPost($res[0]['job_id']);

            //email
            $mail2 = new PHPMailer;

            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail2->isSMTP();                                      // Set mailer to use SMTP
            $mail2->Host = 'sg2plcpnl0212.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
            $mail2->authentication = false;                               // Enable SMTP authentication
            // $mail2->Username = 'britsolgoa@gmail.com';                 // SMTP username
            // $mail2->Password = 'BraveBritsol@123';                           // SMTP password
            $mail2->ssl = false;                            // Enable TLS encryption, `ssl` also accepted
            $mail2->Port = 25;                                    // TCP port to connect to

            $mail2->setFrom('recruitergoa@britsolapps.in', 'Recruiter Goa');
            $mail2->addAddress($res[0]['applied_by_email']);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            $mail2->addReplyTo($r_email,$res2[0]['job_posted_by']);
            $mail2->addReplyTo('recruitergoa@gmail.com', 'Recruiter Goa');
            $mail2->addCC('recruitergoa@gmail.com', 'Recruiter Goa');

            if($r_email_cc)
            {
                $mail2->addCC($r_email_cc);
            }

            if($r_email_bcc)
            {
                $mail2->addBCC($r_email_bcc);
            }
            //$mail2->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // $attachment = "";
            $img = $this->config->item('base_url').'assets/images/logo-2.jpg';
			$fb_logo = $this->config->item('base_url').'assets/images/font/facebook.png';
			$twt_logo = $this->config->item('base_url').'assets/images/font/twitter.png';
			$lnkdin_logo = $this->config->item('base_url').'assets/images/font/linkedin.png';
			$mail2->AddEmbeddedImage($img,'logo');
			$mail2->AddEmbeddedImage($fb_logo,'fb_logo');
			$mail2->AddEmbeddedImage($twt_logo,'twt_logo');
			$mail2->AddEmbeddedImage($lnkdin_logo,'lnkdin_logo');


            // $mail2->addAttachment($attachment);         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail2->isHTML(true);                                  // Set email format to HTML

            $mail2->Subject = $res2[0]['job_posted_by'].' - Shortlisted for interview '.$res2[0]['job_title'];
            $mail2->Body    = '<center> <img src="cid:logo"> </center><br><br>'.$r_email_body;
            $mail2->AltBody = '<br><br>
            <b>Follow us for recent blogs and updates!</b><br><br>
            <a href="https://linkedin.com/company/recruitergoa"><img src="cid:lnkdin_logo" height="30px" width="30px" ></a> <a href="https://facebook.com/recruitergoa"><img src="cid:fb_logo" height="30px" width="30px" ></a> <a href="https://twitter.com/recruitergoa"><img src="cid:twt_logo" height="30px" width="30px" ></a>
            <br><br>
            This is mail has been sent via <b><a href="http://britsolapps.in/recruitergoa">Recruiter Goa<a></b> Job Portal<br>Powered by: <b><a hhref="http://britsol.in">BritSol</a><b>
            ';

            if(!$mail2->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail2->ErrorInfo;
            } else {
                //echo 'Message has been sent';
            }
            //email

            return redirect("employer-manage-candidate?send=1");

        }
    }

    public function accountSettings()
    {
        $side['slctd'] = "Settings"; 

        $this->load->view('inc/employer/header');
		
        $this->load->view('employer/dashboard/settings');
        $this->load->view('inc/employer/sidebar',$side);
		$this->load->view('inc/footer_menu');
    }

    public function canStatus()
    {
        if($this->input->post('ap_status'))
        {
            $apply_id = $this->input->post('ap_status');

            $status = $this->input->post('chStatus');

            if($this->EmpModel->set_job_can_appl($apply_id, $status))
            {
                return redirect('employer-manage-candidate?updation=1');
            }
            else
            {
                return redirect('employer-manage-candidate?updation=0');
            }
        }
    }
}
