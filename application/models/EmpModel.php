<?php 

Class EmpModel extends CI_Model 
{ 
	Public function __construct() { 
		parent::__construct(); 
		$this->load->database();
    }

		public function get_company_type()
		{
			$this->db->select('company_type_id, company_type');
			$this->db->from('company_type');
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function get_location()
		{
			$this->db->select('taluka_id, taluka_name'); 
			$this->db->from('location_taluka');
			$this->db->where('enabled',1);
			$query = $this->db->get()->result_array();
			return $query;
		}
		
		public function insert_company_detail($data)
		{
			$this->db->insert("company", $data);
		}

		public function get_company($user_id)
		{
			$this->db->select('company_id');
			$this->db->from('company');
			$this->db->where('user_id',$user_id);
			$this->db->limit(1);
			return $this->db->get()->result_array();
		}

		public function get_user($user_id){		   
			$this->db->select('user_id,sub_user,username');
			$this->db->from('users');
			$this->db->where('user_id',$user_id);
			$this->db->where('sub_user',0);
			$this->db->where('is_active',1);
			$this->db->limit(1);
			return $this->db->get()->result_array();
			//return $query->result_array();
		}

		public function set_company_detail($data,$company_id)
		{
			$this->db->set($data);
			$this->db->where('company_id',$company_id);
			$this->db->update("company"); 
		}

		public function get_sub_category($id)
		{
			$this->db->select('*');
			$this->db->from('job_sub_category');
			$this->db->where('job_category_id',$id);
			$this->db->where('enabled',1);
			return $this->db->get()->result_array();
		}

		public function cnt_jobPosted($company_id)
		{
			$this->db->select('COUNT(job_id) as total_job_posted');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id');
			$this->db->where('company.company_id',$company_id);
			$this->db->where('job_post.company_id',$company_id);
			return $this->db->get()->result_array();
		}

		public function cnt_appl_submit($company_id)
		{
			$this->db->select('COUNT(apply_id) as total_appl_sbmt');
			$this->db->from('job_applied');
			$this->db->join('job_post','job_post.job_id=job_applied.job_id');
			$this->db->where('job_post.company_id',$company_id);
			return $this->db->get()->result_array();
		}

		public function cnt_call_intrv($company_id)
		{
			$this->db->select('COUNT(apply_id) as total_call_intrv');
			$this->db->from('job_applied');
			$this->db->join('job_post','job_post.job_id=job_applied.job_id');
			$this->db->where('job_post.company_id',$company_id);
			$this->db->where('job_applied.call_for_interview',1);
			return $this->db->get()->result_array();
		}

		public function get_company_details($user_id)
		{
			$this->db->select('company_id, user_id, company_name, company_type.company_type as company_type, company_email, company_phone, location_taluka.taluka_name as company_location, company_about, company_website, company_linkedin, company_twitter, company_fb, logo_path');
			$this->db->from('company');
			$this->db->join('location_taluka','location_taluka.taluka_id=company.company_location_id','inner');
			$this->db->join('company_type','company_type.company_type_id=company.company_type_id','inner');
			$this->db->where('company.user_id',$user_id);
			$this->db->limit(1);
			return $this->db->get()->result_array();
		}

		

		public function get_job_posted($user_id,$limit,$start)
		{
			$this->db->select('job_id, job_title, job_posted_by, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, job_description, no_of_vacancy, expiry_date,date_posted,keywords,validity_in_days, job_post.status, job_post_status.job_post_status');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id','inner');
			$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
			$this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
			$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
			$this->db->join('job_post_status','job_post_status.job_post_status_id=job_post.status','inner');
			$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
			// $this->db->where('job_post.enabled',0);
			$this->db->where('job_post.deleted',0);
			$this->db->where('company.user_id',$user_id);
			$this->db->limit($limit,$start);
			$this->db->order_by('job_post.job_id','DESC');
			
			return $this->db->get()->result_array();
		}

		public function get_job_applied_cnt($job_id)
		{
			$this->db->select('COUNT(apply_id) as apply_cnt');
			$this->db->from('job_applied');
			$this->db->where('job_id',$job_id);
			return $this->db->get()->result_array();
		}
		
		public function get_job_appl_count_all($user_id)
		{
			$this->db->select('COUNT(*) as all_appl_count');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id');
			$this->db->where('company.user_id',$user_id);
			$this->db->join('job_applied','job_applied.job_id=job_post.job_id');
			$this->db->where('job_applied.is_deleted',0);
			$this->db->where('job_post.enabled',1);
			$this->db->where('job_post.deleted',0);
			return $this->db->get()->result_array();
		}

		public function fetch_job_appl($start,$limit,$user_id)
		{
			
			$this->db->select('job_applied.apply_id, job_applied.job_id, job_applied.applied_by_name as applied_by_name, job_applied.status,job_applied.applied_on, job_post.job_title, job_applied.applied_by_email, job_applied.applied_by_cv_link, job_applied.cv_enabled, company.company_email');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id');
			$this->db->where('company.user_id',$user_id);
			$this->db->join('job_applied','job_applied.job_id=job_post.job_id');
			$this->db->where('job_applied.is_deleted',0);
			$this->db->where('job_post.enabled',1);
			$this->db->where('job_post.deleted',0);
			$this->db->order_by('job_applied.job_id','DESC');
			$this->db->limit($limit,$start);
			return $this->db->get()->result_array();

		}

		public function job_posted_cnt($user_id)
		{
			$this->db->select('COUNT(*) as emp_job_cnt');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id');
			$this->db->where('company.user_id',$user_id);
			$this->db->where('job_post.deleted',0);
			return $this->db->get()->result_array();
		}

		public function update_status($job_id,$status)
		{
			if($status == "4")
			{
				$data = array(
					'status' => 6,
					'enabled' => 1
				);
			}
			else
			{
				$data = array(
					'status' => 4,
					'enabled' => 0
				);
			}
			$this->db->set($data);
			$this->db->where('job_id',$job_id);
			$this->db->update("job_post"); 
		}

		public function update_del($job_id)
		{
			$data = array(
				'status'=>5,
				'enabled'=>0,
				'deleted'=>1
			);

			$this->db->set($data);
			$this->db->where('job_id',$job_id);
			$this->db->update("job_post"); 
		}

		public function update_can_del($job_id,$data)
		{
			$this->db->set($data);
			$this->db->where('apply_id',$job_id);
			$this->db->update("job_applied"); 
		}

		public function get_job_appln($apply_id)
		{
			$this->db->select('applied_by_cv_link, applied_by_email, job_id');
			$this->db->from('job_applied');
			$this->db->where('apply_id',$apply_id);
			$this->db->limit(1);
			return $this->db->get()->result_array();
		}

		public function get_jobPost($job_id)
		{
			$this->db->select('job_title, job_posted_by');
			$this->db->from('job_post');
			$this->db->where('job_id',$job_id);
			$this->db->limit(1);
			return $this->db->get()->result_array();
		}

		public function get_company_approved($job_id)
		{
			$this->db->select('*');
			$this->db->from('company');
			$this->db->join('job_post','job_post.company_id=company.company_id','inner');
			$this->db->where('job_post.job_id',$job_id);
			$this->db->limit(1);
			return $this->db->get()->result_array();
		}

		public function get_job_approved($job_id)
		{
			$this->db->select('*');
			$this->db->from('job_post');
			$this->db->where('job_id',$job_id);
			$this->db->limit(1);
			return $this->db->get()->result_array();
		}

		public function get_recent_jobs()
		{
			$this->db->select('job_id, job_title,company.company_id, company.company_name, job_category.name as job_cat, location_taluka.taluka_name as job_loc, job_sub_category_name, job_post_type.job_post_type, date_posted, company.logo_path');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id','inner');
			$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
			$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
			
			$this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
			$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        	//$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
			$this->db->where('job_post.enabled',1);
			$this->db->order_by('job_id','DESC');
			$this->db->limit(5);
			return $this->db->get()->result_array();
		}

		public function get_fetatured_company()
		{
			$this->db->select('company_id, company_name, location_taluka.taluka_name, location_taluka.state_name, logo_path');
			$this->db->from('company');
			$this->db->join('location_taluka','location_taluka.taluka_id=company.company_location_id','inner');
			$this->db->where('company.enabled',1);
			$this->db->limit(10);
			return $this->db->get()->result_array();
		}

		public function get_ft_cmp_count($company_id)
		{
			$this->db->select('COUNT(*) as open');
			$this->db->from('job_post');
			$this->db->join('company','company.company_id=job_post.company_id','inner');
			$this->db->where('job_post.company_id',$company_id);
			$this->db->where('job_post.enabled',1);
			$this->db->where('job_post.status',1);
			$this->db->or_where('job_post.status',6);
			return $this->db->get()->result_array();
		}

		public function get_keywords()
		{
			$this->db->select('id, name');
			$this->db->from('job_keywords');
			$this->db->order_by('name','ASC');
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function get_category()
		{
			$this->db->select('id, name');
			$this->db->from('job_category');
			$this->db->where('enabled',1);
			$this->db->order_by('name','ASC');
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function get_loc_count($id)
		{
			$this->db->select('COUNT(*) as loc_cnt');
			$this->db->from('job_post');
			$this->db->where('job_location',$id);
			$this->db->where('enabled',1);
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function get_cat_count($id)
		{
			$this->db->select('COUNT(*) as cat_cnt');
			$this->db->from('job_post');
			$this->db->where('job_category',$id);
			$this->db->where('enabled',1);
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function get_job_count()
		{
			$this->db->select('COUNT(*) as jobs_cnt');
			$this->db->from('job_post');
			$this->db->where('enabled',1);
			$query = $this->db->get()->result_array();
			return $query;
		}


		public function get_top_5_Performing_jobs($user_id)
		{
			$this->db->select('*');
			$this->db->from('job_post');
			$this->db->join('(SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G','job_post.job_id = G.job_id');
			$this->db->join('company','company.company_id=job_post.company_id');
			$this->db->where('company.user_id',$user_id);
			$this->db->join('job_category','job_category.id=job_post.job_category');
			$this->db->join('job_post_status','job_post_status.job_post_status_id=job_post.status');
			$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type');
			$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location');
			$this->db->order_by("G.applied", "DESC");
			// $this->db->query("SELECT * from job_post INNER JOIN (SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G ON job_post.job_id = G.job_id 
			// ORDER BY G.applied DESC",false);	
			return $this->db->get()->result_array();
		}
	
		public function get_bottom_5_Performing_jobs($user_id)
		{
			$this->db->select('*');
			$this->db->from('job_post');
			$this->db->join('(SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G','job_post.job_id = G.job_id');
			$this->db->join('company','company.company_id=job_post.company_id');
			$this->db->where('company.user_id',$user_id);
			$this->db->join('job_category','job_category.id=job_post.job_category');
			$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location');
	
			$this->db->order_by("G.applied", "asc");
			return $this->db->get()->result_array();
	
			// $this->db->query("SELECT * from job_post INNER JOIN (SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G 	ON job_post.job_id = G.job_id ORDER BY G.applied",false);	
			// return $this->db->result();
		}

		public function set_job_can_appl($id, $status)
		{
			if($status == "On Hold" || $status == "Rejected")
			{
				$call = 0;
			}
			else
			{
				$call = 1;
			}

			$data = array(
				'call_for_interview'=>$call,
				'status'=>$status
			);

			$this->db->set($data);
			$this->db->where('apply_id',$id);
			$this->db->update('job_applied');
		}

		public function get_count_canappld()
		{
			$this->db->select('COUNT(*) as jobs_appld');
			$this->db->from('job_applied');
			$query = $this->db->get()->result_array();
			return $query;
		}

		public function get_count_cmprgd()
		{
			$this->db->select('COUNT(*) as company_reg');
			$this->db->from('company');
			$query = $this->db->get()->result_array();
			return $query;
		}

}