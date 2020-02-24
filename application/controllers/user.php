<?php  

/**
 * 
 */
class User extends MY_Controller
{
	Public function index()
	{ 	
		$this->load->view('articles_list');
	} 
}