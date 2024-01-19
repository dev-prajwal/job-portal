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

}