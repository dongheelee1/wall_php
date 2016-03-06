<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logins extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('login');
	}

	public function start()
	{
		$this->load->view('welcome');
	}

	public function display_signin()
	{
		$this->load->view('signin');
	}

	public function display_registration()
	{
		$this->load->view('registration');
	}

	public function display_dashboard()
	{

		$loggedin_userinfo = $this->session->userdata['loggedin_userinfo'];
		$users_infos = $this->login->getUsers();
		if($loggedin_userinfo['user_level'] == 1)
		{
			$this->load->view('admin_dashboard', array('loggedin_userinfo' => $loggedin_userinfo, 'users_infos' => $users_infos)); //admin_dashboard
		}
		else
		{
			$this->load->view('user_dashboard', array('loggedin_userinfo' => $loggedin_userinfo, 'users_infos' => $users_infos)); //user_dashboard			
		}		
	}

	public function register()
	{

		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email_address", "Email Address", "is_unique[users.email_address]|trim|required|valid_email|min_length[5]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[5]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|matches[password]");

		if($this->form_validation->run() === TRUE)
		{
			//if there are no registration validation errors
			$reg_info = $this->input->post();
			$this->login->register($reg_info);
			$this->session->set_flashdata('success', 'Successfully Registered');

		}
		else
		{
			//if there are validation errors
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect('logins/display_registration');

	}

	public function signin()
	{
		$this->form_validation->set_rules("email_address", "Email Address", "required");
		$this->form_validation->set_rules("password", "Password", "required");

		if($this->form_validation->run() == TRUE)
		{
			$login_info = $this->input->post(); //retreive loggedin user information
			$loggedin_userinfo = $this->login->signin($login_info);
	
			if($loggedin_userinfo > 0)
			{
				// save userinfo into session
				$this->session->set_userdata('loggedin_userinfo', $loggedin_userinfo);
				redirect('logins/display_dashboard'); //if there are no errors in signing in, redirect
			}
			else
			{
				$this->session->set_flashdata('errors', 'Could not find user information');
				redirect('logins/display_signin');
			}
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('logins/display_signin');
		}
	}

}
