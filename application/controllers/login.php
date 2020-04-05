<?php 

/**
 * 
 */
class Login extends MY_Controller
{
	
	public function index()
	{
		if ($error = $this->session->set_flashdata('login_failed'));
		$this->load->view('admin_login');
	}

	public function admin_login()
	{
		$this->form_validation->set_rules('username','User name', 'required');
		$this->form_validation->set_rules('password','Password','required');

		if ( $this->form_validation->run()) {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('loginmodel');
			$login_id = $this->loginmodel->login_valid($username,$password);
			if ($login_id) {
				$this->session->set_userdata('id',$login_id);
				 return redirect('admin/dashboard');
				}
			else
				{
					$this->session->set_flashdata('login_failed','Invalid Username/Password');
					return redirect('login');
				}
			}

		else
		{
			$this->load->view('admin_login'); 
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		  return redirect('login');
	}
}


