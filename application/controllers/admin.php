<?php  

/**
 * 
 */
class Admin extends MY_Controller
{
	public function dashboard(){
		$this->load->model('usersmodel','userlist');
		$userslist = $this->userlist->users_list();
		$this->load->view('dashboard' , ['userslist' => $userslist]);

	} 
	

	public function add_customer()
	{	
			$this->form_validation->set_rules('c_name','Name', 'required');
			$this->form_validation->set_rules('mobile','Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[tbl_cust.mobile]',array('required' => 'You must provide a %s.' , 'is_unique' => '%s no is already register.'));
			$this->form_validation->set_rules('c_email','Email', 'required|is_unique[tbl_cust.c_email]',array('required' => 'You must provide a %s.' , 'is_unique' => '%s no is already register.'));

			if ( $this->form_validation->run()) {
						
					$this->load->view('add_customer');
					$customer_data = $this->input->post();
					unset($customer_data['submit']);
					$this->load->model('usersmodel','userlist');
					$res =  $this->userlist->add_customers($customer_data);
					if($res==true)
					{
					$this->session->set_flashdata('success', "Customer added"); 
					}
					else
					{
					$this->session->set_flashdata('error', "Customer is not added");
					
					}	
					 return redirect('admin/dashboard'); 
			}
		else
		{
			$this->load->view('add_customer'); 
		}
		
		
	}

	public function edit_customer($id)
	{
		$this->load->model('usersmodel','edit_list');
		$edit_customer = $this->edit_list->find_customers($id);
		$this->load->view('edit_customer' , ['edit_customer' => $edit_customer]);

		  
	}



	public function update_customer($id)
	{
			$this->form_validation->set_rules('c_name','Name', 'required');
			$this->form_validation->set_rules('mobile','Mobile', 'required');
			$this->form_validation->set_rules('c_email','Mobile', 'required');
			
			if ( $this->form_validation->run()) {		
					$update_data = $this->input->post();
					unset($update_data['submit']);
					$this->load->model('usersmodel','update_user');
					$this->update_user->update_customer($id,$update_data);

					$res = $this->update_user->update_customer($id,$update_data);
					if($res==true)
					{
					$this->session->set_flashdata('success', "Customer updated "); 
					}
					else
					{
					$this->session->set_flashdata('error', "Customer is not updated ");
					
					}	


					return redirect('admin/dashboard');
			}	
			else
			{
				$this->load->view('edit_customer'); 
			}
					
	}

	public function add_remark($id)
	{
		$this->load->model('usersmodel','add_remark');
		$add_remark = $this->add_remark->find_remark($id);
		$this->load->view('add_remark' , ['add_remark' => $add_remark]);
		
	}

	public function update_remark($id)
	{

			$this->form_validation->set_rules('c_rem_date','Reminder Date', 'required');
			$this->form_validation->set_rules('c_remarkes','Remark', 'required');

			
			if ( $this->form_validation->run()) {		
					$update_remark = $this->input->post();
					unset($update_remark['submit']);
					$this->load->model('usersmodel','update_remark');
					$this->update_remark->update_remarks($id,$update_remark);

					$res = $this->update_remark->update_remarks($id,$update_remark);
					if($res==true)
					{
					$this->session->set_flashdata('success', "Remarks and Reminder updated "); 
					}
					else
					{
					$this->session->set_flashdata('error', "Remarks and Reminder is not updated ");
					
					}	
					return redirect('admin/dashboard');
			}	



			else
			{
				$this->load->view('add_remark'); 
			}
					
	}


	

	public function single_sms($id)
	{
		$single_sms = $this->input->post();
		$this->load->model('usersmodel','single_sms');
		$single_sms = $this->single_sms->single_sms($id);
		$this->load->view('single_sms' , ['single_sms' => $single_sms]);

	}

	public function bulk_sms()
	{
		 
		
		$this->load->model('usersmodel','bulk_sms');
		$bulk_sms = $this->bulk_sms->bulk_sms_list();
		$this->load->view('bulk_sms' ,  ['bulk_sms' => $bulk_sms]);
	}

	public function get_mobile()
	{
		$this->load->model('usersmodel','get_mobile');
		$get_mobile = $this->get_mobile->get_mobile_list();
		$this->load->view('get_mobile' , ['get_mobile' => $get_mobile]);

	}

	public function delete_customer($id)
	{
		
		$this->load->model('usersmodel','delete_customer');
		$this->delete_customer->delete_customer($id);
		return redirect('admin/dashboard');

	}



	public function _construct()
	{
		parent::_construct();
		if(! $this->session->userdata('id')) 
			return redirect('login');
	}

} 