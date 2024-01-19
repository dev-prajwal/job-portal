<?php 

Class JobsModel extends CI_Model 
{
    Public function __construct() 
    { 
		parent::__construct(); 
		$this->load->database();
    }

    public function get_keywords()
    {
        $this->db->select('id, name');
        $this->db->from('job_keywords');
        $this->db->order_by('name','ASC');
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_company($user_id)
    {
        $this->db->select('company_id,company_name, company_type_id,user_id');
        $this->db->from('company');
        $this->db->where('user_id',$user_id);
        $this->db->where('enabled',1);
        $this->db->limit(1);
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_company_id($user_id)
    {
        $this->db->select('company_id,company_name, company_type_id');
        $this->db->from('company');
        $this->db->where('user_id',$user_id);
        $this->db->where('enabled',1);
        $this->db->where('deleted',0);
        $this->db->limit(1);
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_jobid($company_id)
    {
        $this->db->select('job_id, job_title, job_posted_by, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, job_description, no_of_vacancy, job_qualification, job_experience, salary_range, expiry_date,date_posted,keywords,validity_in_days');
        $this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        $this->db->where('company.company_id',$company_id);
        $this->db->where('job_post.status',3);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id', 'DESC');
        $this->db->limit(1);
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_jobpost($id)
    {
        $this->db->select('job_id, job_title,job_post.company_id as company_id, job_posted_by, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_category_id, job_post.job_sub_category_id, job_sub_category_name, job_description, no_of_vacancy, job_qualification, job_experience, salary_range, expiry_date,date_posted,keywords,validity_in_days, company.logo_path');
        $this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
        $this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        $this->db->where('job_id',$id);
        $this->db->where('job_post.enabled',1);
        $this->db->limit(1);
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_company_details($company_id)
    {
        $this->db->select('company_id, user_id, company_name, company_type.company_type as company_type, company_email, company_phone, location_taluka.taluka_name as company_location, company_about, company_website, company_linkedin, company_twitter, company_fb, logo_path');
        $this->db->from('company');
		$this->db->join('location_taluka','location_taluka.taluka_id=company.company_location_id','inner');
		$this->db->join('company_type','company_type.company_type_id=company.company_type_id','inner');
        $this->db->where('company_id',$company_id);
        $this->db->limit(1);
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

    public function get_sub_category($id)
    {
        $this->db->select('job_sub_category_id, job_sub_category_name');
        $this->db->from('job_sub_category');
        $this->db->where('job_category_id',$id);
        $this->db->where('enabled',1);
        $this->db->order_by('job_sub_category_name','ASC');
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_job_experience()
    {
        $this->db->select('id, name');
        $this->db->from('job_experience');
        $this->db->where('enabled',1);
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_job_qualification()
    {
        $this->db->select('id, name');
        $this->db->from('job_qualification');
        $this->db->where('enabled',1);
		$query = $this->db->get()->result_array();
		return $query;
    }

    public function get_job_type()
    {
        $this->db->select('job_post_type_id, job_post_type');
        $this->db->from('job_post_type');
        $this->db->where('enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert_job_post($data)
    {
        $this->db->insert("job_post", $data);
        return $this->db->insert_id();
    }

    public function insert_job_hit($data)
    {
        $this->db->insert("job_post_hits",$data);
    }

    public function update_job_hit($data,$id)
    {
        $this->db->set($data);
        $this->db->where('job_id',$id);
        $this->db->update('job_post_hits');
    }

    public function get_job_post_hit($job_id)
    {
        $this->db->select('COUNT(*) as hit_count');
        $this->db->from('job_post_hits');
        $this->db->where('job_id',$job_id);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function update_about($id,$data)
    {
        $this->db->set($data);
        $this->db->where('company_id',$id);
        $this->db->update('company');
    }

    public function insert_about($data)
    {
        $this->db->insert("company", $data);
    }

    public function check_company($user_id)
    {
        $this->db->select('company_id, company_name');
        $this->db->from('company');
        $this->db->join('users','company.user_id=users.user_id');
        $this->db->where('company.user_id',$user_id);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs($limit,$start)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_search_jobs($limit,$start,$search)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        $this->db->or_where('job_post.job_title LIKE','%'.$search.'%');
        $this->db->or_where('job_post_type.job_post_type  LIKE','%'.$search.'%');
        $this->db->or_where('location_taluka.taluka_name LIKE','%'.$search.'%');
        $this->db->or_where('job_category.name LIKE','%'.$search.'%');
        $this->db->or_where('company.company_name LIKE','%'.$search.'%');
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function count_search_jobs($search)
    {
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_category','job_category.id=job_post.job_category','inner');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        $this->db->or_where('job_post.job_title LIKE','%'.$search.'%');
        $this->db->or_where('job_post_type.job_post_type  LIKE','%'.$search.'%');
        $this->db->or_where('location_taluka.taluka_name LIKE','%'.$search.'%');
        $this->db->or_where('job_category.name LIKE','%'.$search.'%');
        $this->db->or_where('company.company_name LIKE','%'.$search.'%');
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_popular($limit,$start)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id');
        $this->db->where('company.enabled',1);
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        $this->db->join('job_post_hits','job_post_hits.job_id=job_post.job_id');
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_post_hits.hit_count','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function search_job_appl($j_id,$appl_email)
    {
        $this->db->select('apply_id, job_id');
        $this->db->from('job_applied');
        $this->db->where('job_id',$j_id);
        $this->db->where('applied_by_email',$appl_email);
        $this->db->limit(1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insertJobAppl($data)
    {
        $this->db->insert("job_applied", $data);
        
    }

    public function get_company_email($j_id)
    {
        $this->db->select('cmp.company_name, cmp.company_email, job_post.job_title');
        $this->db->from('job_post');
        $this->db->join('company cmp','cmp.company_id=job_post.company_id');
        $this->db->where('job_post.job_id',$j_id);
        $this->db->limit(1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function get_salary_range()
    {
        $this->db->select('id, salary_range');
        $this->db->from('job_post_salary_range');
        $this->db->where('enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function jobs_count()
    {
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->where('enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function update_job($job_id,$data)
    {
        $this->db->set($data);
        $this->db->where('job_id',$job_id);
        $this->db->update("job_post"); 
    }

    //filter job list
    public function view_jobs_filter($limit,$start,$filter_data,$data_condition)
    {
        $con_type = ""; $con_exp = ""; $con_sal = ""; $con_dt = ""; $con_edu = ""; $con_cat = ""; $con_loc = "";
        for($i=0;$i<count($data_condition);$i++)
        {
            if($data_condition[$i] == "job-type")
            {
                $con_type .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "experience")
            {
                $con_exp .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "salary")
            {
                $con_sal .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "date-posted")
            {
                //$con_dt .= $filter_data[$i];
                $date_array = getdate();
                $curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
                
                $last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
                $last1day = date('Y-m-d', strtotime($curr_date . ' -1 day'));
                $lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
                $last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));

                if($filter_data[$i] == "24 hour")
                {
                    $con_dt .= $last1day; 
                }
                elseif($filter_data[$i] == "7 days")
                {
                    $con_dt .= $last7days;
                }
                elseif($filter_data[$i] == "30 days")
                {
                    $con_dt .= $lastmonth;
                }
                elseif($filter_data[$i] == "90 days")
                {
                    $con_dt .= $last3months;
                }
            }
            elseif($data_condition[$i] == "qualification")
            {
                $con_edu .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "category")
            {
                $con_cat .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "location")
            {
                $con_loc .= $filter_data[$i];
            }
        }
        $this->db->select('job_id, job_title, job_posted_by, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, job_description, no_of_vacancy,  job_qualification, job_experience, salary_range, expiry_date,date_posted,keywords,validity_in_days');
        $this->db->from('job_post');
		$this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        if(!$con_cat == "")
        {
            $this->db->where('job_category.name',$con_cat);
        }
        elseif(!$con_dt == "")
        {
            $this->db->where('job_post.date_posted >=',$con_dt);
        }
        elseif(!$con_edu == "")
        {
		    $this->db->join('job_qualification','job_qualification.id=job_post.job_qualification','inner');
            $this->db->where('job_qualification.name',$con_edu);
        }
        elseif(!$con_exp == "")
        {
            $this->db->join('job_experience','job_experience.id=job_post.job_experience','inner');
            $this->db->where('job_experience.name',$con_exp);
        }
        elseif(!$con_loc == "")
        {
            $this->db->where('location_taluka.taluka_name',$con_loc);
        }
        elseif(!$con_sal == "")
        {
            $this->db->join('job_post_salary_range','job_post_salary_range.id=job_post.salary_range','inner');
            $this->db->where('job_post_salary_range.salary_range',$con_sal);
        }
        elseif(!$con_type == "")
        {
            $this->db->where('job_post_type.job_post_type',$con_type);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function jobs_count_filter($filter_data,$data_condition)
    {
        $con_type = ""; $con_exp = ""; $con_sal = ""; $con_dt = ""; $con_edu = ""; $con_cat = ""; $con_loc = "";
        for($i=0;$i<count($data_condition);$i++)
        {
            if($data_condition[$i] == "job-type")
            {
                $con_type .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "experience")
            {
                $con_exp .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "salary")
            {
                $con_sal .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "date-posted")
            {
                //$con_dt .= $filter_data[$i];

                $date_array = getdate();
                $curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
                
                $last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
                $last1day = date('Y-m-d', strtotime($curr_date . ' -1 day'));
                $lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
                $last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));

                if($filter_data[$i] == "24 hour")
                {
                    $con_dt .= $last1day; 
                }
                elseif($filter_data[$i] == "7 days")
                {
                    $con_dt .= $last7days;
                }
                elseif($filter_data[$i] == "30 days")
                {
                    $con_dt .= $lastmonth;
                }
                elseif($filter_data[$i] == "90 days")
                {
                    $con_dt .= $last3months;
                }
            }
            elseif($data_condition[$i] == "qualification")
            {
                $con_edu .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "category")
            {
                $con_cat .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "location")
            {
                $con_loc .= $filter_data[$i];
            }
        }
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_category','job_category.id=job_post.job_category','inner');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        if(!$con_cat == "")
        {
            $this->db->where('job_category.name',$con_cat);
        }
        elseif(!$con_dt == "")
        {
            $this->db->where('job_post.date_posted >=',$con_dt);
        }
        elseif(!$con_edu == "")
        {
		    $this->db->join('job_qualification','job_qualification.id=job_post.job_qualification','inner');
            $this->db->where('job_qualification.name',$con_edu);
        }
        elseif(!$con_exp == "")
        {
            $this->db->join('job_experience','job_experience.id=job_post.job_experience','inner');
            $this->db->where('job_experience.name',$con_exp);
        }
        elseif(!$con_loc == "")
        {
            $this->db->where('location_taluka.taluka_name',$con_loc);
        }
        elseif(!$con_sal == "")
        {
            $this->db->join('job_post_salary_range','job_post_salary_range.id=job_post.salary_range','inner');
            $this->db->where('job_post_salary_range.salary_range',$con_sal);
        }
        elseif(!$con_type == "")
        {
            $this->db->where('job_post_type.job_post_type',$con_type);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
       
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_popular_filter($limit,$start,$filter_data,$data_condition)
    {
        $con_type = ""; $con_exp = ""; $con_sal = ""; $con_dt = ""; $con_edu = ""; $con_cat = ""; $con_loc = "";
        for($i=0;$i<count($data_condition);$i++)
        {
            if($data_condition[$i] == "job-type")
            {
                $con_type .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "experience")
            {
                $con_exp .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "salary")
            {
                $con_sal .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "date-posted")
            {
                //$con_dt .= $filter_data[$i];
                $date_array = getdate();
                $curr_date = $date_array['year'].'-'.$date_array['mon'].'-'.$date_array['mday'];
                
                $last7days = date('Y-m-d', strtotime($curr_date . ' -7 day'));
                $last1day = date('Y-m-d', strtotime($curr_date . ' -1 day'));
                $lastmonth = date('Y-m-d', strtotime($curr_date . ' -30 day'));
                $last3months = date('Y-m-d', strtotime($curr_date . ' -92 day'));

                if($filter_data[$i] == "24 hour")
                {
                    $con_dt .= $last1day; 
                }
                elseif($filter_data[$i] == "7 days")
                {
                    $con_dt .= $last7days;
                }
                elseif($filter_data[$i] == "30 days")
                {
                    $con_dt .= $lastmonth;
                }
                elseif($filter_data[$i] == "90 days")
                {
                    $con_dt .= $last3months;
                }
            }
            elseif($data_condition[$i] == "qualification")
            {
                $con_edu .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "category")
            {
                $con_cat .= $filter_data[$i];
            }
            elseif($data_condition[$i] == "location")
            {
                $con_loc .= $filter_data[$i];
            }
        }
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_category','job_category.id=job_post.job_category','inner');
		$this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
		
        if(!$con_cat == "")
        {
            $this->db->where('job_category.name',$con_cat);
        }
        elseif(!$con_dt == "")
        {
            $this->db->where('job_post.date_posted >=',$con_dt);
        }
        elseif(!$con_edu == "")
        {
		    $this->db->join('job_qualification','job_qualification.id=job_post.job_qualification','inner');
            $this->db->where('job_qualification.name',$con_edu);
        }
        elseif(!$con_exp == "")
        {
            $this->db->join('job_experience','job_experience.id=job_post.job_experience','inner');
            $this->db->where('job_experience.name',$con_exp);
        }
        elseif(!$con_loc == "")
        {
            $this->db->where('location_taluka.taluka_name',$con_loc);
        }
        elseif(!$con_sal == "")
        {
            $this->db->join('job_post_salary_range','job_post_salary_range.id=job_post.salary_range','inner');
            $this->db->where('job_post_salary_range.salary_range',$con_sal);
        }
        elseif(!$con_type == "")
        {
            $this->db->where('job_post_type.job_post_type',$con_type);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->join('job_post_hits','job_post_hits.job_id=job_post.job_id');
        
        $this->db->order_by('job_post_hits.hit_count','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }
    //filter job list

    public function check_valid_job($job_id,$user_id)
    {
        $this->db->select('job_id');
        $this->db->from('job_post');
        $this->db->where('job_id',$job_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('deleted',0);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_fill_home($limit,$start,$key,$loc,$cat)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        if($key != '%'){
            $this->db->where('job_post.keywords LIKE','%'.$key.'%');
        }
        if($loc != '%'){
            $this->db->where('job_post.job_location',$loc);
        }
        if($cat != '%'){
            $this->db->where('job_post.job_category',$cat);
        }
        
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_fill_home_cnt($key,$loc,$cat)
    {
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_category','job_category.id=job_post.job_category','inner');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        if($key != '%'){
            $this->db->where('job_post.keywords LIKE','%'.$key.'%');
        }
        if($loc != '%'){
            $this->db->where('job_post.job_location',$loc);
        }
        if($cat != '%'){
            $this->db->where('job_post.job_category',$cat);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }


    public function view_jobs_home_cat($limit,$start,$cat)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        
        if($cat != '%'){
            $this->db->where('job_post.job_category',$cat);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_home_cat_cnt($cat)
    {
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_category','job_category.id=job_post.job_category','inner');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        
        if($cat != '%'){
            $this->db->where('job_post.job_category',$cat);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_home_loc($limit,$start,$loc)
    {
        $this->db->select('job_id, job_title, location_taluka.taluka_name as job_location, job_post_type.job_post_type as job_type, job_category.name as job_category, job_sub_category_name, date_posted,company.company_id,company.company_name,company.company_email,company.logo_path');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_sub_category','job_post.job_sub_category_id=job_sub_category.job_sub_category_id','inner');
		$this->db->join('job_category','job_category.id=job_sub_category.job_category_id','inner');
        //$this->db->where('job_post.job_sub_category_id','job_sub_category.job_sub_category_id');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        
        if($loc != '%'){
            $this->db->where('job_post.job_location',$loc);
        }
        
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $this->db->order_by('job_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function view_jobs_home_loc_cnt($loc)
    {
        $this->db->select('COUNT(*) as jobs_total');
        $this->db->from('job_post');
        $this->db->join('company','company.company_id=job_post.company_id','inner');
        $this->db->join('location_taluka','location_taluka.taluka_id=job_post.job_location','inner');
        $this->db->join('job_category','job_category.id=job_post.job_category','inner');
        $this->db->join('job_post_type','job_post_type.job_post_type_id=job_post.job_type','inner');
        
        if($loc != '%'){
            $this->db->where('job_post.job_location',$loc);
        }
        $this->db->where('company.enabled',1);
        $this->db->where('job_post.enabled',1);
        $query = $this->db->get()->result_array();
        return $query;
    }
}