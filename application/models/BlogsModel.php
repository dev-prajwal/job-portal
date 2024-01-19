<?php 

Class BlogsModel extends CI_Model 
{
    Public function __construct() 
    { 
		parent::__construct(); 
		$this->load->database();
    }

    public function get_blogs_count($sort)
    {
      if($sort == 'featured_can')
      {
        $this->db->select('COUNT(*) as blogs_can_count');
        $this->db->from('blogs');
        $this->db->where('blog_category_id',2);
        $this->db->where('published',1);
        $query = $this->db->get()->result_array();
        return $query;
      }
      else
      {
        $this->db->select('COUNT(*) as blogs_count');
        $this->db->from('blogs');
        $this->db->where('published',1);
        $query = $this->db->get()->result_array();
        return $query;
      }
      
    }

    public function get_blogs($sort)
    {
      $this->db->select('blog_id, blog_title, blog_category.blog_category_name, blog_body, blog_by, featured_image, date_posted');
      $this->db->from('blogs');
      $this->db->join('blog_category','blog_category.blog_category_id=blogs.blog_category_id','inner');
      $this->db->where('published',1);

      if($sort=='Job Seekers')
      {
        $this->db->order_by('blog_category.blog_category_name','ASC');
      }
      elseif($sort == 'Recruiters')
      {
        $this->db->order_by('blog_category.blog_category_name','DESC');
      }
      $this->db->order_by('blog_id','DESC');
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function view_blog($id)
    {
      $this->db->select('blog_id, blog_title, blog_category.blog_category_name, blog_body, blog_by, featured_image, date_posted');
      $this->db->from('blogs');
      $this->db->join('blog_category','blog_category.blog_category_id=blogs.blog_category_id','inner');
      $this->db->where('published',1);
      $this->db->where('blog_id',$id);
      
      $query = $this->db->get()->result_array();
      return $query;
    }

    public function get_company_detail_vw($company_id)
		{
			$this->db->select('company_id, user_id, company_name, company_type.company_type as company_type, company_phone, company_email, company_phone, location_taluka.taluka_name as company_location, company_about, company_website, company_linkedin, company_twitter, company_fb, logo_path, company.enabled');
			$this->db->from('company');
			$this->db->join('location_taluka','location_taluka.taluka_id=company.company_location_id','inner');
			$this->db->join('company_type','company_type.company_type_id=company.company_type_id','inner');
			$this->db->where('company.company_id',$company_id);
			$this->db->limit(1);
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
    
    public function view_company_jobs($limit,$start,$company_id)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->where('company.company_id',$company_id);
        $this->db->where('company.enabled',1);
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		    $this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_fetatured_candiate_blogs()
    {
      $this->db->select('blog_id, blog_title, blog_category.blog_category_name, blog_body, blog_by, featured_image, date_posted');
      $this->db->from('blogs');
      $this->db->join('blog_category','blog_category.blog_category_id=blogs.blog_category_id','inner');
      $this->db->where('published',1);
      
      $this->db->order_by('blog_id','DESC');
      $this->db->limit(3);
      $query = $this->db->get()->result_array();
      return $query;
    }

}