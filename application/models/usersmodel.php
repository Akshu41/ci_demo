<?php 

/**
 *  
 */
class Usersmodel extends CI_Model
{
	 
	
	public function users_list()
	{
		$query = $this->db->get('tbl_cust');
						  
		
		return $query->result();
		

	}


	
	public function add_customers($customer_data)
	{		
		$this->db->insert('tbl_cust' , $customer_data );
		$insert_id = $this->db->insert_id();
	 
		return  $insert_id;
	}

	
	public function find_customers($id)
	{		

		$q = $this->db->select()->where('c_user_id' , $id )->get('tbl_cust');
		return $q->row();
	}
	
	
	public function update_customer($id, Array $update_data)
	{		

			return $this->db->where('c_user_id' , $id )->update('tbl_cust' , $update_data);

	}

	

	
	public function find_remark($id)
	{		

		$q = $this->db->select()->where('c_user_id' , $id )->get('tbl_cust');
		return $q->row();
	}
	
	public function update_remarks($id, Array $update_remark)
	{				
		$this->increment_visits_count($id);
		return $this->db->where('c_user_id' , $id )->update('tbl_cust' , $update_remark);
	}

	public function add_remark(Array $data)
	{
		return $this->db->insert('visit_update' , $data);
	}

	public function increment_visits_count($cust_id) {
		$this->db->where('c_user_id', $cust_id);
		$this->db->set('c_visit', 'c_visit+1', FALSE);
		$this->db->update('tbl_cust');
	}
	
	public function delete_customer($id)
		{		

				$q = $this->db->where('c_user_id', $id);
					 $this->db->delete('tbl_cust');

		}
	public function single_sms($id)
	
	{		

		$q = $this->db->select('mobile , c_user_id , c_rem_date' )->where('c_user_id' , $id )->get('tbl_cust');
		return $q->row();

	}


	public function storeSingle_sms($id , array $data)
		{
			return $this->db->insert('messages' , $data );
		}	



	public function bulk_sms_list()
	{
		$query = $this->db->get('tbl_cust');
						  
		
		return $query->result();
		

	}

	public function get_mobile_today()
	{
		      $date = new DateTime(null, new DateTimezone("Asia/Kolkata"));
			$current_date = $date->format('Y-m-d');


		$q = $this->db->select(['mobile'])->where('c_rem_date',$current_date)->get('tbl_cust');
		return $q->result();
	}

	public function get_mobile_befor_three()
	{
		      $date = new DateTime(null, new DateTimezone("Asia/Kolkata"));
			$befor_3 = date('Y-m-d', strtotime('3 days'));


		$q = $this->db->select(['mobile'])->where('c_rem_date',$befor_3)->get('tbl_cust');
		return $q->result();
	}

	public function get_mobile_befor_seven()
	{
		      $date = new DateTime(null, new DateTimezone("Asia/Kolkata"));
			$befor_7 = date('Y-m-d', strtotime('7 days'));


		$q = $this->db->select(['mobile'])->where('c_rem_date',$befor_7)->get('tbl_cust');
		return $q->result();
	}



	public function get_user_info($id)
	{
		$q = $this->db->select()->where('c_user_id' , $id )->get('tbl_cust');
		return $q->row();
	}

	public function get_user_sms($id)
	{ 
		$q = $this->db->select()->where('cust_id' , $id )->get('messages');
		return $q->result();
	}

	public function get_user_remark($id)
	{
		$q = $this->db->select()->where('c_user_id' , $id )->get('visit_update');
		return $q->result();
	}

	public function due_date()
	{
			 $date = date('Y-m-d');

		$q = $this->db->select('c_user_id , c_name , mobile, c_rem_date, c_visit, c_remarkes' )->where('c_rem_date <=' , $date )->get('tbl_cust');
		return $q->result();
	}

	public function getReg()
	{
		$q = $this->db->get('tbl_cust');  
	return $q->result();
	}

	public function fetchReg_id($religion_id)
	 {
	  $this->db->where('religion_id', $religion_id);
	  //$this->db->order_by('festival_name , festival_sms');
	  $query = $this->db->get('festival');
	  
	  return $query->result();
	 }	

	 public function fetchReg_no($religion_id)
	 {
	  $this->db->where('c_religion', $religion_id);
	  //$this->db->order_by('festival_name , festival_sms');
	  $query = $this->db->get('tbl_cust');
	  
	  return $query->result();
	 }


	
}