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
					unset($customer_data['message']);
					$data = array(
							'mobile' => $this->input->post('mobile'),
							'message' => $this->input->post('message')
						);

					$msg12 = json_encode($data['message']);
					$mobile_no = json_encode($data['mobile']);
    				
					if(isset($_POST['submit'])){
					$curl = curl_init();

				      curl_setopt_array($curl, array(
				        CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
				        CURLOPT_RETURNTRANSFER => true,
				        CURLOPT_ENCODING => "",
				        CURLOPT_MAXREDIRS => 10,
				        CURLOPT_TIMEOUT => 30,
				        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				        CURLOPT_CUSTOMREQUEST => "POST",
				        CURLOPT_POSTFIELDS => "{ \"sender\": \"SOCKET\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": ". $msg12 .", \"to\": [".$mobile_no."] } ] }",
				        CURLOPT_SSL_VERIFYHOST => 0,
				        CURLOPT_SSL_VERIFYPEER => 0,
				        CURLOPT_HTTPHEADER => array(
				          "authkey: 317629AFIKHndv85e415d4bP1",
				          "content-type: application/json"
				        ),
				      ));

				    $response = curl_exec($curl);
				    $err = curl_error($curl);
				    curl_close($curl);


				if ($err) {
				echo "cURL Error #:" . $err;
				} else {
				echo $response;
				}
					}

					
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

			$data = array(
							'remark_date' => $this->input->post('c_last_fill_date'),
							'remark' => $this->input->post('c_remarkes'),
							'c_user_id' => $this->input->post('c_user_id')
						);

				print_r($data);


			if ( $this->form_validation->run()) {		
					$update_remark = $this->input->post();
					unset($update_remark['submit']);
					$this->load->model('usersmodel','update_remark');

					$this->update_remark->add_remark($data);

					$res = $this->update_remark->update_remarks($id,$update_remark);
					if($res==true)
					{
					$this->session->set_flashdata('success', "Remarks and Reminder updated" ); 
					}
					else
					{
					$this->session->set_flashdata('error', "Remarks and Reminder is not updated ");
					
					}	
					//return redirect('admin/dashboard');
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

	public function promo_sms()
	{
		$this->load->view('promo_sms');
	}

	public function Send_single($id)
	{
		$mobile = $this->input->post('mobile');
		$message = $this->input->post('single_msg');
		$submit = $this->input->post('submit');
		unset($submit);
		$data = array(
			'mobile' => $this->input->post('mobile'),
			'message' => $this->input->post('single_msg'),
			'cust_id' => $this->input->post('cust_id'),
			'reminder_date' => $this->input->post('c_rem_date')
		);
		
		$msg1 = json_encode($message);
		$mobile_no = json_encode($mobile);



		if(isset($_POST['submit'])){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{ \"sender\": \"SOCKET\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": ".$msg1.", \"to\": [".$mobile."] } ] }",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => array(
          "authkey: 317629AFIKHndv85e415d4bP1",
          "content-type: application/json"
        ),
      ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $json = json_decode($response, true);

    if($json['code'] = '106')
    {
    	$json['message'];
    }
    elseif ($json['type'] = 'success') {
    	$json['message'];
    }
    else{
    	$json = " not send";
    }

            


      if ($err) {
            echo "cURL Error #:" . $err;
          } else {

          	$this->load->model('usersmodel','single_sms1');
			
			$res1 = $this->single_sms1->storeSingle_sms($id , $data);
					if($res1==true)
					{
					$this->session->set_flashdata('success_send', $json['message']); 
					}
					else
					{
					$this->session->set_flashdata('error_send', $response);
					
					}	
			return redirect('admin/dashboard');
           
          }

  }
      


		

		
	}


	public function _construct()
	{
		parent::_construct();
		if(! $this->session->userdata('id')) 
			return redirect('login');
	}

} 