<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('usersview');
	}

	public function results()
	{
		if(!$this->session->userdata('count'))  //this means the button has been clicked for the first time
		{
			echo "if case";
			$this->session->set_userdata('count', 1);
		}
		else  //this means that session->userdata('count') already exists
		{
			echo "else case";
			$temp_count = $this->session->userdata('count');
			$temp_count ++;
			$this->session->set_userdata('count', $temp_count);
		}
		$this->load->view('results-view');
		$this->session->all_userdata();
	}

	public function reset()
	{
		$this->session->unset_userdata('count');
		redirect('/users');
	}
}

