<?php 
	class User extends CI_Model
	{
		public function add_user($post)
		{
			$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) 
			VALUES (?, ?, ?, ?, NOW(), NOW())";
			$this->db->query($query, $post);
			return $this->db->insert_id();
		}

		public function find_user($email, $password)
		{
			//by doing the query as such, I can make the controller do less work
			$query = "SELECT * FROM users WHERE email = ? AND password = ?";
			return $this->db->query($query, array($email, $password))->row_array();
		}
	}
 ?>