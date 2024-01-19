<?php 

Class FilterModel extends CI_Model 
{ 
	Public function __construct() { 
		parent::__construct(); 
		$this->load->database();
	}
	
	public function get_visitors($filter_date){
		$this->db->select('count(*) as total');
		$this->db->from('company');
		$this->db->where('date_registered >=', $filter_date);
		return $this->db->get()->row();
	}
	public function get_companies_registerd_by_date($filter_date){
		$this->db->select('count(*) as total');
		$this->db->from('company');
		$this->db->where('date_registered >=', $filter_date);
		return $this->db->get()->row();
	}
	public function get_job_posted_by_date($filter_date){
		$this->db->select('count(*) as total');
		$this->db->from('job_post');
		$this->db->where('date_posted >=', $filter_date);
		return $this->db->get()->row();
	}

	public function get_job_applied_by_date($filter_date){
		$this->db->select('count(*) as total');
		$this->db->from('job_applied');
		$this->db->where('applied_on >=', $filter_date);
		return $this->db->get()->row();
	}

	public function get_company_type(){
		$this->db->select('*');
		$this->db->from('company_type');
		return $this->db->get()->result_array();
	}

	public function get_job_category(){
		$this->db->select('*');
		$this->db->from('job_category');
		return $this->db->get()->result_array();
	}

	public function get_location_taluka(){
		$this->db->select('*');
		$this->db->from('location_taluka');
		return $this->db->get()->result_array();
	}

	public function get_job_type(){
		$this->db->select('*');
		$this->db->from('job_post_type');
		return $this->db->get()->result_array();
	}

	public function approve_job($job_id){
		$this->db->set('status', 1);
		$this->db->where('job_id',$job_id);
		$this->db->update("job_post"); 
	}

	public function approve_company($company_id){
		$this->db->set('enabled', 1);
		$this->db->where('company_id',$company_id);
		$this->db->update("company"); 
	}

	public function get_company($company_id){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->where('company_id',$company_id);
		return $this->db->get()->row(); 
	}

	public function get_job($job_id){
		$this->db->select('*');
		$this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id');

		$this->db->where('job_post.job_id',$job_id);
		return $this->db->get()->row();
	}
	public function filter($filters=null,$filter_date){
		$this->db->select('count(*) as total');
		$this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id');
		if($filters != null){
			foreach ( $filters as $key => $val ){
				$this->db->where($key,$val);
			}			
		}
		else{
			$this->db->where('job_post.enabled', 1);
		}
		$this->db->where('job_post.date_posted >=', $filter_date);
		return $this->db->get()->row();
	}

	public function get_total_jobs_posted(){
		$this->db->select('count(*) as total');
		$this->db->from('job_post');
		return $this->db->get()->row();
	}

	public function get_total_jobs_applied(){
		$this->db->select('count(*) as total');
		$this->db->from('job_applied');
		return $this->db->get()->row();
	}

	public function get_total_companies(){
		$this->db->select('count(*) as total');
		$this->db->from('company');
		return $this->db->get()->row();
	}

	public function get_total_visitors(){
		$this->db->select('count(*) as total');
		$this->db->from('job_post_hits');
		return $this->db->get()->row();
	}


	public function get_top_5_Performing_jobs(){
		$this->db->select('*');
		$this->db->from('job_post');
		$this->db->join('(SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G','job_post.job_id = G.job_id');
		$this->db->join('company','company.company_id=job_post.company_id');
		$this->db->join('job_category','job_category.id=job_post.job_category');
		$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location');
		$this->db->order_by("G.applied", "DESC");
		// $this->db->query("SELECT * from job_post INNER JOIN (SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G ON job_post.job_id = G.job_id 
		// ORDER BY G.applied DESC",false);	
		return $this->db->get()->result_array();
	}

	public function get_bottom_5_Performing_jobs(){
		$this->db->select('*');
		$this->db->from('job_post');
		$this->db->join('(SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G','job_post.job_id = G.job_id');
		$this->db->join('company','company.company_id=job_post.company_id');
		$this->db->join('job_category','job_category.id=job_post.job_category');
		$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location');

		$this->db->order_by("G.applied", "asc");
		return $this->db->get()->result_array();

		// $this->db->query("SELECT * from job_post INNER JOIN (SELECT job_id,count(job_id) as applied from job_applied GROUP by job_id) AS G 	ON job_post.job_id = G.job_id ORDER BY G.applied",false);	
		// return $this->db->result();
	}

	// public function get_companies(){
	// 	$this->db->select('*');
	// 	$this->db->from('company');
	// 	$this->db->join('company_type','company.company_type_id=company_type.company_type_id');
	// 	$this->db->join('location_taluka','company.company_loaction_id=location_taluka.taluka_id');
	// 	return $this->db->get()->result_array();
	// }

	public function get_companies(){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->join('(SELECT company_id,count(company_id) as jobs_posted from job_post GROUP by company_id) AS G','company.company_id = G.company_id');
		$this->db->join('company_type','company.company_type_id=company_type.company_type_id');
		$this->db->join('location_taluka','company.company_location_id=location_taluka.taluka_id');
		return $this->db->get()->result_array();
	}

	public function get_categories(){
		$this->db->select(' company_type.company_type,count(company.company_type_id) as total ');
		$this->db->from('company');
		$this->db->join('company_type','company.company_type_id=company_type.company_type_id');		
		$this->db->group_by("company.company_type_id");
		return $this->db->get()->result_array();
	}	

	public function get_categories_with_count(){
		$this->db->select(' company_type.company_type,count(company_type.company_type_id) as total ');
		$this->db->from('company');
		$this->db->join('company_type','company.company_type_id=company_type.company_type_id');		
		$this->db->group_by("company.company_type_id");
		return $this->db->get()->result_array();
	}		

	public function get_companies_with_count(){
		$this->db->select('location_taluka.taluka_name,count(location_taluka.taluka_id) as total ');
		$this->db->from('company');
		$this->db->join('location_taluka','company.company_location_id=location_taluka.taluka_id');
		$this->db->group_by("location_taluka.taluka_id");
		return $this->db->get()->result_array();
	}

	public function get_candidates_call_for_interview_count(){
		$this->db->select('call_for_interview,count(call_for_interview) as total ');
		$this->db->from('job_applied');
		$this->db->group_by("call_for_interview");
		return $this->db->get()->result_array();
	}	
	
	public function get_jobs_posted_by_companies($comapny_id){
		$this->db->select('*');
		$this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id');
		$this->db->where('company.company_id',$comapny_id);
		return $this->db->get()->result_array();
	}

	public function get_jobs_posted_for_jobwg($comapny_id){
		$this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id','inner');
		$this->db->where('company.company_id',$comapny_id);
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
		return $this->db->get()->result_array();
	}

	public function get_jobs_posted_for_job_widget($company_website){
		$this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, DATE_FORMAT(date_posted,"%M %d %Y") as date_posted,company.company_id,company.company_name,company.company_email,company.logo_path,
		job_post_salary_range.salary_range as salary_range');
        $this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id','inner');
		$this->db->like('company_website', $company_website,'both');
		
		$this->db->join('job_post_salary_range','job_post_salary_range.id=job_post.salary_range','left');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
		return $this->db->get()->result_array();

	}

}