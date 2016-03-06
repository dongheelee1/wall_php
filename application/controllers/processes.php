<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processes extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('process');
	}

	//adding a user on the admin_dashboard page------------------------------------------------------------------------
	public function display_add_user() //display add page
	{
		$this->load->view('add_user');
	}

	public function create_user() //create a new user + do validation checks on input fields
	{
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email_address", "Email Address", "is_unique[users.email_address]|trim|required|valid_email|min_length[5]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[5]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|matches[password]");

		if($this->form_validation->run() === TRUE)
		{
			//if there are no registration validation errors, insert into database and set a success message
			$create_userinfo = $this->input->post();
			$this->process->create_user($create_userinfo);
			$this->session->set_flashdata('success', 'Successfully added new user information');

		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect('processes/display_add_user'); //in either case, redirect to add_user page
	}

	//displaying selected user's information on the edit page-------------------------------------------------------------
	public function display_edit($profile_id)
	{
		$profile_userinfo=$this->process->getUser($profile_id);
		//if user_level of logged-in user = 1, load up admin_edit page
		if($this->session->userdata['loggedin_userinfo']['user_level'] == 1)
		{
			$this->load->view("admin_edit", array('profile_userinfo' => $profile_userinfo));
		}
		//if user_level of loggined-in user = 0, load up user_edit page
		if($this->session->userdata['loggedin_userinfo']['user_level'] == 0)
		{

			$this->load->view("user_edit", array('profile_userinfo' => $profile_userinfo));
		}
	}

	//updating selected user's information from the edit page----------------------------------------------------------------
	public function update_profileinfo($profile_id)
	{
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("email_address", "Email Address", "is_unique[users.email_address]|trim|required|valid_email|min_length[5]");
		$this->form_validation->set_rules("user_level", "User Level", "required");

		if($this->form_validation->run() === TRUE)
		{
			$update_profileinfo = $this->input->post();
			$this->process->update_profileinfo($profile_id, $update_profileinfo);
			$this->session->set_flashdata('success', 'Successfully updated user information');
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect('processes/display_edit/'.$profile_id);
	}

	//updating selected user's password information from the edit page--------------------------------------------------------
	public function update_password($profile_id)
	{
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[5]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|matches[password]");

		if($this->form_validation->run() === TRUE)
		{
			$update_password = $this->input->post('password');
			$this->process->update_password($profile_id, $update_password);
			$this->session->set_flashdata('success', "Successfully updated user's password");
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect('processes/display_edit/'.$profile_id);
	}

	//
	public function update_description($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("description", "Description", "trim|required");

		if($this->form_validation->run() === TRUE)
		{
			$update_info = $this->input->post();
			$this->load->model('process');
			$description = $this->process->get_description($id);

			if($description = null)
			{ //there is no description in the database, then insert description
				$this->load->model('process');
			    $this->process->insert_description($id);
			}
			else
			{ //there is description in the database, then update description
				$this->load->model('process');
				$this->process->update_description($id, $update_info);
				$this->session->set_flashdata('success', "Successfully update user's desciption");
			}

		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect('logins/display_dashboard');
	}

	public function display_wall($profile_id)
	{
		$loggedin_userinfo=$this->session->userdata['loggedin_userinfo'];
		$Users_Messages=$this->process->getUsers_Messages($profile_id);
		$Comments=$this->process->getComments();
		$profile_userinfo=$this->process->grabProfileInfo($profile_id);

		$this->load->view('wall', array('Users_Messages' => $Users_Messages, 'Comments' => $Comments, 'profile_userinfo' => $profile_userinfo, 'loggedin_userinfo' =>$loggedin_userinfo ));
	}

	public function add_message($profile_id)
	{
		$message = $this->input->post();
		$loggedin_userid = $this->session->userdata['loggedin_userinfo']['id'];
		$this->process->add_message($profile_id, $loggedin_userid, $message);
		redirect('processes/display_wall/'.$profile_id);
	}

	public function add_comment($message_id, $profile_id)
	{
		$comment = $this->input->post();
		$loggedin_userid = $this->session->userdata['loggedin_userinfo']['id'];
		$this->process->add_comment($loggedin_userid, $comment, $message_id);
		redirect('processes/display_wall/'.$profile_id);
	}

	//edit profile image
	public function edit_profileImg($id) 
	{
		$this->load->view('profileImg', array('profile_id'=>$id));
	}

	//remove user on the admin page------------------------------------------------------
	public function remove_user($profile_id)
	{
		$this->process->remove_user($profile_id);
		redirect('logins/display_dashboard');
	}
	//upload profile pic---------------
	public function do_upload()
	{
		$profile_id = $this->input->post('profile_id');
		
		$path='./assets/profile_imgs/'. $profile_id ."/";
		if(!is_dir($path)){
			mkdir($path, 0755, TRUE);
		}
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = 'profile_picture';
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()){
			//errors 
		} else {
			$path = substr($path, 1);
			$path .=$this->upload->data()['file_name'];
			$data = array('profile_id' => $profile_id, 'img_url' => $path);
			$this->process->edit_profileImg($data);
			redirect('/processes/display_wall/'.$profile_id);
		}

	}

}