<?php 
Class AuthModel extends CI_Model { 
	Public function __construct() { 
		parent::__construct(); 
		$this->load->database();
	} 
	
	public function check_subscription(){		   
		$this->db->select('subcription_startdt, subcription_enddt, subscription_category');
		$this->db->from('subscription');
		$this->db->where('is_deleted',0);
		$this->db->where('is_active',1);
		$query = $this->db->get()->result_array();
		return $query;
	}

	public function is_valid_user($email,$password)
	{		   
		$this->db->select('username,token');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function is_valid_user_verify($token,$user_id)
	{		   
		$this->db->select('username,email,user_type');
		$this->db->from('users');
		$this->db->where('token',$token);
		$this->db->where('user_id',$user_id);
		$this->db->where('is_active',0);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	public function get_user_data($email){		   
		$this->db->select('user_id,sub_user,username,email,user_type,token');
		$this->db->from('users');
		$this->db->where('email',$email);
		return $this->db->get()->result_array();
		//return $query->result_array();
	}

	public function get_user_id($email)
	{		   
		$this->db->select('user_id,token');
		$this->db->from('users');
		$this->db->where('email',$email);
		return $this->db->get()->result_array();
		//return $query->result_array();
	}
	
	public function register($data)
	{
		$this->db->insert("users", $data);
	}	

	public function verify_user($data)
	{
		$this->db->insert("verification_urls", $data);
	}

	public function set_verify_user($url)
	{
		$this->db->set("status", 0);
		$this->db->where('url',$url);
		$this->db->update("verification_urls"); 
	}

	public function set_user($id)
	{
		$this->db->set("is_active", 1);
		$this->db->where('user_id',$id);
		$this->db->update("users"); 
	}

	public function is_valid_url($url)
	{		   
		$this->db->select('url_id,url_for');
		$this->db->from('verification_urls');
		$this->db->where('url',$url);
		$this->db->where('status',1);
		$this->db->limit(1);
		return $this->db->get()->result_array();
		//return $query->result_array();
	}

	public function check_email($email)
	{		   
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->limit(1);
		return $this->db->get()->result_array();
		//return $query->result_array();
	}

	public function set_job_post_arroval($data,$job_id)
	{
		$this->db->set($data);
        $this->db->where('job_id',$job_id);
        $this->db->update('job_post');
	}
} 
?>