<?php 

Class AdminModel extends CI_Model 
{ 
	Public function __construct() { 
		parent::__construct(); 
		$this->load->database();
    }

	public function get_unapproved_jobs(){
		$this->db->select('*');
		$this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id');
		$this->db->join('company_type','company_type.company_type_id=company.company_type_id');
		$this->db->where('job_post.status',3);
		$query = $this->db->get()->result_array();
		return $query; 
	}

	public function get_unapproved_job_count(){
		$this->db->select('count(*) as total');
		$this->db->from('job_post');
		$this->db->where('job_post.status',3);
		return $this->db->get()->row();
	}

	public function get_unapproved_companies(){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->join('company_type','company.company_type_id=company_type.company_type_id');
		$this->db->join('location_taluka','company.company_location_id=location_taluka.taluka_id');
		$this->db->where('company.enabled',0);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function get_unapproved_companies_count(){
		$this->db->select('count(*) as total');
		$this->db->from('company');
		$this->db->where('enabled',0);
		return $this->db->get()->row();
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


	//Blog
	public function add_new_blog($data){
		$this->db->insert("blogs", $data);
		return $this->db->insert_id();
	}

	public function get_all_blogs(){
		$this->db->select('*');
		$this->db->from('blogs');
		//$this->db->join('blog_category', 'blog_category.blog_category_id = blogs.blog_category_id');		
		return $this->db->get()->result_array();
	}

	public function get_published_blogs(){
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('published','1');
		return $this->db->get()->result_array();
	}

	public function get_blog($blog_id){
		$this->db->select('*');
		$this->db->from('blogs');
		$this->db->where('blog_id',$blog_id);
		return $this->db->get()->row();
	}
	
	public function new_blog($data){
		$this->db->insert("blogs", $data);
		return $this->db->insert_id();
	}
	
	public function publish_blog($blog_id,$data){
		$date_array = getdate();
		$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];

		$this->db->set('blog_title',$data['blog_title']);
		$this->db->set('blog_body',$data['blog_body']);
		$this->db->set('blog_body_draft',$data['blog_body_draft']);
		$this->db->set('blog_by',$data['blog_by']);
		$this->db->set('blog_category_id',$data['blog_category_id']);
		$this->db->set('published',1);
		$this->db->set('last_updated',$curr_date);
		$this->db->set('blog_slug',$data['blog_slug']);
		$this->db->where('blog_id',$blog_id);
		$this->db->update("blogs"); 
	}

	public function publish_blog_direct($blog_id){
		$this->db->set('published',1);
		$this->db->where('blog_id',$blog_id);
		$this->db->update("blogs"); 
	}
	
	public function draft_blog($blog_id,$data){
		$date_array = getdate();
		$curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];

		$this->db->set('blog_title',$data['blog_title']);
		$this->db->set('blog_body_draft',$data['blog_body_draft']);
		$this->db->set('blog_by',$data['blog_by']);
		$this->db->set('blog_category_id',$data['blog_category_id']);
		$this->db->set('draft',1);
		$this->db->set('last_updated',$curr_date);	
		$this->db->set('blog_slug',$data['blog_slug']);
		$this->db->where('blog_id',$blog_id);
		$this->db->update("blogs");
	}	
	
	public function delete_blog($blog_id){
		$this->db->where('blog_id', $blog_id);
		$this->db->delete('blogs');
	}
	public function update_featured_img($blog_id,$featured_image){
		$this->db->set('featured_image',$featured_image);
		$this->db->where('blog_id',$blog_id);
		$this->db->update("blogs");
	}	
	public function get_all_companies(){
		$this->db->select('*');
		$this->db->from('company');
		return $this->db->get()->result_array();
	}

	public function get_jobs(){
		$this->db->select('*');
		$this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id');		
		$this->db->join('job_category','job_category.id=job_post.job_category');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type');
		$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location');
		return $this->db->get()->result_array();
	}

	public function get_job_applications(){
		$this->db->select('*');
		$this->db->from('job_applied');
		$this->db->join('job_post','job_post.job_id=job_applied.job_id');	
		$this->db->join('job_category','job_category.id=job_post.job_category');
		$this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location');	
		return $this->db->get()->result_array();
	}

	
	public function get_blog_category()
	{
		$this->db->select('*');
		$this->db->from('blog_category');
		return $this->db->get()->result_array();
	}
	public function add_company_request($data)
	{
		$this->db->insert("company_request", $data);
	}

	public function get_company_request(){
		$this->db->select('*');
		$this->db->from('company_request');
		return $this->db->get()->result_array();
	}

}