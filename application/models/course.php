<?php 
	class Course extends CI_Model
	{
		public function get_all_courses()
		{
			$query = "SELECT  courses.*, CONCAT(users.first_name,' ',users.last_name) AS instructor
					  FROM courses
					  LEFT JOIN users ON users.id = courses.user_id";
			//result array works like fetch_all and gives an array full of arrays!
			return $this->db->query($query)->result_array();
		}

		public function create_course($data, $id)
		{
			$query = "INSERT INTO courses (name, description, created_at, updated_at, user_id)
					  VALUES (?, ?, NOW(), NOW(), {$id})";
			$this->db->query($query, $data);
		}

		public function get_course_by_id($id)
		{
			$query = "SELECT * FROM courses WHERE id = ?";
			return $this->db->query($query, array($id))->row_array();
		}

		public function remove_course($id)
		{
			$query = "DELETE FROM courses WHERE id = ?";
			$this->db->query($query, array($id));
		}

		public function update_course($id, $data)
		{
			$query = "UPDATE courses
					  SET name = ?, description = ?, updated_at = NOW()
					  WHERE id = ?";
			$array = array($data['name'], $data['description'], $id);
			$this->db->query($query, $array);
		}





	}
 ?>