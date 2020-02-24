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

		return $this->db->insert('tbl_cust' , $customer_data );

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

			return $this->db->where('c_user_id' , $id )->update('tbl_cust' , $update_remark);

	}


	
	public function delete_customer($id)
		{		

				$q = $this->db->where('c_user_id', $id);
					 $this->db->delete('tbl_cust');

		}
	public function single_sms($id)
	
	{		

			$q = $this->db->select('mobile')->where('c_user_id' , $id )->get('tbl_cust');
		return $q->row();

	}

	public function bulk_sms_list()
	{
		$query = $this->db->get('tbl_cust');
						  
		
		return $query->result();
		

	}

	public function get_mobile_list()
	{
		    $date = new DateTime(null, new DateTimezone("Asia/Kolkata"));
			$current_date = $date->format('Y-m-d');


		$q = $this->db->select(['mobile'])->where('c_rem_date',$current_date)->get('tbl_cust');
		return $q->result();
	}


	
}