<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function register($post)
	{
		$query = "SELECT * from users where users.id = 1";
		$result_of_first = $this->db->query($query)->row_array();
		$user_level = 0;
		if(!($result_of_first))
		{
			$user_level = 1;
		}
		$query = "INSERT INTO users (first_name, last_name, email_address, password, user_level, updated_at, created_at) values (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($post['first_name'], $post['last_name'], $post['email_address'], $post['password'], $user_level);
		$this->db->query($query, $values);
	}

	public function signin($post)
	{
		$query = "SELECT * from users WHERE users.email_address = ? and users.password = ?";
		$values = array($post['email_address'], $post['password']);
		return $this->db->query($query, $values)->row_array();
	}

	public function getUsers()
	{
		$query = "SELECT * from users";
		return $this->db->query($query)->result_array();
	}
}

//if id = 1