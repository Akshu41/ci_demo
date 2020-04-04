<?php  
 
/**
 *   
 */
class Admin extends MY_Controller
{

	function __construct()
	{
		parent::__construct();		
		if(! $this->session->userdata('id')) { 
			return redirect('login');
		}
	}

	public function dashboard() {		
		$this->load->model('usersmodel','userlist');
		$userslist = $this->userlist->users_list();
		$this->load->view('dashboard' , ['userslist' => $userslist]);
		
	} 

	public function add_customer()
	{
		// $this->form_validation->set_rules('c_name','Name', 'required');
		$this->form_validation->set_rules('mobile','Mobile', 'required|regex_match[/^[0-9]{10}$/]|is_unique[tbl_cust.mobile]',array('required' => 'You must provide a %s.' , 'is_unique' => '%s already exists!'));
		// $this->form_validation->set_rules('c_email','Email', 'required|is_unique[tbl_cust.c_email]',array('required' => 'You must provide a %s.' , 'is_unique' => '%s no is already register.'));
		
		if ( $this->form_validation->run()) {					
			// $this->load->view('add_customer');
			$customer_data = $this->input->post();
			unset($customer_data['submit']);
			// unset($customer_data['message']);
			
			$data = array (
				'mobile' => $this->input->post('mobile'),
				// 'message' => $this->input->post('message')
			);
			$welcome_msg = 'Thank you for registering and filling with us! We hope for a long term association with you.';
			$msg12 = json_encode($welcome_msg);
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
						"authkey: 323134AzdHLwxwWVZ5e6c5429P1",
						"content-type: application/json"
					),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					die("cURL Error #:" . $err);
				}
			}

			$customer_data['c_reg_date'] = $customer_data['c_last_fill_date'] = date('Y-m-d'); 
			$customer_data['c_rem_date'] = date('Y-m-d', strtotime("+3 months", strtotime($customer_data['c_last_fill_date'])));
			
			$this->load->model('usersmodel','userlist');
			$cust_id =  $this->userlist->add_customers($customer_data);
			if($cust_id) {
				$rem_data = array(
					'remark_date' => $customer_data['c_last_fill_date'],
					'remark' => $welcome_msg,
					'c_user_id' => $cust_id
				);
				$this->userlist->add_remark($rem_data);

				$this->session->set_flashdata('success', "Customer added successfully."); 
			} else {
				$this->session->set_flashdata('error', "Customer addition falied. Please try again.");			
			}	
			return redirect('admin/dashboard'); 
		} else {
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
				$this->load->model('usersmodel','edit_list');
				$edit_customer = $this->edit_list->find_customers($id);
				$this->load->view('edit_customer' , ['edit_customer' => $edit_customer]);
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

			// $this->form_validation->set_rules('c_rem_date','Reminder Date', 'required');
			$this->form_validation->set_rules('c_remarkes','Remark', 'required');

			$customer_data['c_last_fill_date'] = date('Y-m-d'); 
			$customer_data['c_rem_date'] = date('Y-m-d', strtotime("+3 months", strtotime($customer_data['c_last_fill_date'])));

			$data = array(
				'remark_date' => $customer_data['c_last_fill_date'],
				'remark' => $this->input->post('c_remarkes'),
				'c_user_id' => $this->input->post('c_user_id')
			);

			if ( $this->form_validation->run()) {												
					$update_remark['c_last_fill_date'] = $customer_data['c_last_fill_date'];
					$update_remark['c_rem_date'] = $customer_data['c_rem_date'];
					$update_remark['c_remarkes'] = $this->input->post('c_remarkes');					
					
					$this->load->model('usersmodel','update_remark');

					$this->update_remark->add_remark($data);

					$res = $this->update_remark->update_remarks($id, $update_remark);
					if($res==true)
					{
						$cust_details = $this->update_remark->find_customers($id);						
						$this->send_sms($this->input->post('c_remarkes'), $cust_details->mobile);
						// Start from here
					$this->session->set_flashdata('success', "Visit added successfully." ); 
					}
					else
					{
					$this->session->set_flashdata('error', "An error occured. Please try again.");
					
					}	
					return redirect('admin/dashboard');
			}	



			else
			{   $this->load->model('usersmodel','add_remark');		
				$add_remark = $this->add_remark->find_remark($id);
				$this->load->view('add_remark' , ['add_remark' => $add_remark]);
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
		$mobile_today = $this->get_mobile->get_mobile_today();
		$mobile_three = $this->get_mobile->get_mobile_befor_three();
		$mobile_seven = $this->get_mobile->get_mobile_befor_seven();


		$this->load->view('get_mobile' , ['mobile_today' => $mobile_today , 'mobile_three' => $mobile_three ,'mobile_seven' => $mobile_seven]);

$selected_no = array();
foreach ($mobile_today as $key => $val) {   
 @$a_arr[] =  $val->mobile;
  $selected_no['today'][] = $val->mobile;
}


foreach ($mobile_three as $key => $val) {
 @$a_arr1[] =  $val->mobile;
  $selected_no['three_day'][] = $val->mobile;
}

foreach ($mobile_seven as $key => $val) {
 @$a_arr1[] =  $val->mobile;
  $selected_no['mobile_seven'][] = $val->mobile;
}

if(@$a_arr){
  $no_obj = json_encode(@$a_arr);
}
elseif (@$a_arr1) {
 $no_obj = json_encode(@$a_arr1);
}

@$msg = $_POST['message'];
$msg1 = json_encode($msg);


if(isset($_POST['task']) && $_POST['task']=="sendMsg"){
  //$selected_no['three_day']
  //$selected_no['today']
 
  $no_obj = (isset($selected_no[$_POST['action']]))?$selected_no[$_POST['action']]:array();
  $no_obj = json_encode($no_obj);

  $aks  = $this->input->post();
  print_r($aks);
  die('Fix Me');

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{ \"sender\": \"SOCKET\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": ".$msg1.", \"to\": ".$no_obj." } ] }",
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTPHEADER => array(
      "authkey: 323134AzdHLwxwWVZ5e6c5429",
      "content-type: application/json"
    ),
  ));

  $response = curl_exec($curl);  
  $err = curl_error($curl);
  curl_close($curl);
  print_r($err); die;
 if($response['code'] === '106')
    {
    	$response['message'];
    }
    elseif ($response['type'] === 'success') {
    	$response['message'];
    }
    else{
    	$response = " not send";
    }


 if ($err) {
            echo "cURL Error #:" . $err;
          } else {

          	
			
			$res1 = $response;
					if($res1==true)
					{
					$this->session->set_flashdata('success_send', $response['message']); 
					}
					else
					{
					$this->session->set_flashdata('error_send', $response);
					
					}	
			// return redirect('admin/dashboard');
           
          }
	
}

					
					






	}

	public function delete_customer($id)
	{
		
		$this->load->model('usersmodel','delete_customer');
		$this->delete_customer->delete_customer($id);
		return redirect('admin/dashboard');

	}

	public function promo_sms()
	{
		$this->load->model('usersmodel','getReg');
		$reg = $this->getReg->getReg();
		$this->load->view('promo_sms' , ['reg' => $reg]);

	}

	public function getReg_id()
	 {

	  $this->load->model('usersmodel','fetchReg_id');
	  if($this->input->post('religion_id'))
	  {
	  	$output = $this->fetchReg_id->fetchReg_id($this->input->post('religion_id'));
	   echo json_encode($output);
	  }
 }

	public function getReg_no()
	{
	
		$this->load->model('usersmodel','fetchReg_no');
		if($this->input->post('religion_id'))
		{
		$output = $this->fetchReg_no->fetchReg_no($this->input->post('religion_id'));
		echo json_encode($output);
		}
	}

	public function getReg()
	{
		$message = trim($this->input->post('message')) ?? null;
		$mobile_nos = array();
		
		$this->load->model('usersmodel');
		$customers = $this->usersmodel->fetchReg_no($this->input->post('religion'));
		if(count($customers) > 0) {
			foreach($customers as $cust) {
				$mobile_nos[] = $cust->mobile;
			}
		} 
		
		if(!empty($message) && count($mobile_nos) > 0) {
			$mobile_no_string = implode(',', $mobile_nos);
			$sent = $this->send_sms($message, $mobile_no_string);			
			if($sent) {
				$this->session->set_flashdata('success', 'SMS sent successfully.');
			} else {
				$this->session->set_flashdata('error', 'SMS Gateway error. Please try again!');	
			}
		} else {
			$this->session->set_flashdata('error', 'Message/Mobile no. cannot be empty.');

		}
		return redirect('admin/promo_sms');
	}

	public function user_info($id)
	{
		$this->load->model('usersmodel','users_info');
		$user_info = $this->users_info->get_user_info($id);
		$user_sms = $this->users_info->get_user_sms($id);
		$user_remark = $this->users_info->get_user_remark($id);
		$data = array(
               'user_info' => $user_info,
               'user_sms' => $user_sms,
               'user_remark' => $user_remark,
          );


		$this->load->view('user_info' , ['user_info' => $user_info , 'user_sms' => $user_sms , 'user_remark' => $user_remark ]);
		
	}

	public function due_date()
	{
		
		$this->load->model('usersmodel','due_date');
		$due_date = $this->due_date->due_date();
		$this->load->view('due_date' , ['due_date' => $due_date]);
		
		
	}

	private function send_sms($message, $mobile) {

		$msg1 = json_encode($message);
		$mobile_no = json_encode($mobile);

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
			"authkey: 323134AzdHLwxwWVZ5e6c5429P1",
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

	  return $json;
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
			'reminder_date' => $this->input->post('c_rem_date'),
			'c_reg_date' => $this->input->post('c_reg_date')
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
			"authkey: 323134AzdHLwxwWVZ5e6c5429P1",
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
					// $this->session->set_flashdata('success_send', $json['message']); 
						$this->session->set_flashdata('success_send', 'One2One SMS sent successfully.'); 
					}
					else
					{
					$this->session->set_flashdata('error_send', $response);
					
					}	
			return redirect('admin/dashboard');
           
          }

  		}      				
	}	
} 