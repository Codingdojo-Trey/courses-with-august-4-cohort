<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index()
	{
		$this->load->view('users_index_view');
	}

	public function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'first name', 'required|alpha|min_length[2]|trim');
		$this->form_validation->set_rules('last_name', 'last name', 'required|alpha|min_length[2]|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|trim');
		$this->form_validation->set_rules('password', 'password', 'required|matches[confirm_password]|min_length[6]|trim');
		$this->form_validation->set_rules('confirm_password', 'password confirmation', 'required|trim');

		if($this->form_validation->run())
		{
			//do model stuff
			$this->load->model('user');
			$id = $this->user->add_user($this->input->post());
			$array = array( 'email' => $this->input->post('email'),
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'id' => $id);
			
			$this->log_user_in($array);
		}

		else
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('/users/index'));
		}

	}

	public function login()
	{
		$this->load->model('user');
		$user = $this->user->find_user($this->input->post('email'), $this->input->post('password'));
		if($user)
		{
			$this->log_user_in($user);
			// take a look at this if you are confused by the codeigniter session stuff...it can be a toughie
			// var_dump($this->session->all_userdata());
		}
		else
		{
			echo "death by failed login!";
		}
	}

	private function log_user_in($user)
	{
		//this is just a way to make my life easier and recycle code!
		$array = array('name' => $user['first_name'].' '.$user['last_name'], 
								'email' => $user['email'], 
								'user_id' => $user['id'], 
								'logged_in' => true);
		$this->session->set_userdata($array);
		redirect(base_url('/courses/index'));
	}

}

