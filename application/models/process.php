<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Model {

//adding a new user-----------------------------------------------------
	public function create_user($post)
	{ 
		$query = "INSERT INTO users (first_name, last_name, email_address, password, user_level, updated_at, created_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($post['first_name'], $post['last_name'], $post['email_address'], $post['password'], 0);
		$this->db->query($query, $values);
	}
//getting profile user's information on the edit page---------------------------
	public function getUser($profile_id)
	{
		$query = "SELECT * from users where users.id = ?";
		$values = $profile_id;
		return $this->db->query($query, $values)->row_array();
	}
//updating profile user's information from the edit page---------------------------
	public function update_profileinfo($profile_id, $update_profileinfo)
	{
		$query = "UPDATE users SET users.first_name = ?, users.last_name = ?, users.email_address = ?, users.user_level = ? WHERE users.id =?";
		$values = array($update_profileinfo['first_name'], $update_profileinfo['last_name'], $update_profileinfo['email_address'], $update_profileinfo['user_level'], $profile_id);
		$this->db->query($query, $values);
	}
//updating profile user's password from the edit page-----------------------------------------
	public function update_password($profile_id, $update_password)
	{
		$query = "UPDATE users SET users.password = ? WHERE users.id =?";
		$values = array($update_password, $profile_id);
		$this->db->query($query, $values);
	}
	public function get_description($id)
	{
		$query = "SELECT users.description from users where users.id = ?";
		$values = $id;
		return $this->db->query($query, $values)->row_array();
	}

	public function insert_description($id, $post)
	{
		$query = "INSERT INTO users (description, updated_at, created_at) VALUES (?, NOW(), NOW()) where users.id = ?";
		$values = $post['description'];
		return $this->db->query($query, $values);
	}

	public function update_description($id, $post)
	{
		$query = "UPDATE users SET users.description = ? WHERE users.id = ?";
		$values = array($post['description'], $id);
		$this->db->query($query, $values);
	}

	public function add_message($profile_id, $loggedin_id, $message)
	{
		$query = "INSERT INTO messages (message, updated_at, created_at, profile_id, author_id) VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($message['message'], $profile_id, $loggedin_id);
		return $this->db->query($query, $values);
	}
	public function add_comment($loggedin_id, $comment, $message_id)
	{
		$query = "INSERT INTO comments (comment, updated_at, created_at, author_id, message_id) VALUES (?, NOW(), NOW(), ?, ?)";
		$values = array($comment['comment'], $loggedin_id, $message_id);
		return $this->db->query($query, $values);
	}

	public function grabProfileInfo($profile_id)
	{
		$query = "SELECT * from users where users.id = ?";
		$values = $profile_id;
		return $this->db->query($query, $values)->row_array();
	}

	public function getUsers_Messages($profile_id)
	{
		$query = "SELECT messages.id, authors.first_name, authors.last_name, messages.created_at, messages.message from messages JOIN users as authors on messages.author_id = authors.id WHERE messages.profile_id=?";
		$values = $profile_id;
		return $this->db->query($query, $values)->result_array();
	}

	public function getComments()
	{
		$query = "SELECT comments.comment, users.first_name, users.last_name, comments.created_at, comments.message_id from comments JOIN users ON comments.author_id = users.id";
		return $this->db->query($query)->result_array();
	}

	//removes user on the admin dashboard-------------------------------------------------------------------------------
	public function remove_user($profile_id)
	{
		$query = "DELETE FROM comments WHERE comments.profile_id = ?";
		$this->db->query($query, $profile_id);
		$query = "DELETE FROM messages WHERE messages.profile_id =?";
		$this->db->query($query, $profile_id);
		$query = "DELETE FROM users where users.id =?";
		$this->db->query($query, $profile_id);
	}

	public function edit_profileImg($data)
	{
		$query = 'UPDATE users SET img_url = ? WHERE id = ?';
		$values = array($data['img_url'], $data['profile_id']);
		$this->db->query($query, $values);
	
	}



}