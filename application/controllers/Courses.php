<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Course');
	}

	public function index()
	{
		$view_data['courses'] = $this->Course->get_all_courses();
		$this->load->view('courses_index_view', $view_data);
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', $this->input->post('name'), 'required|min_length[5]|trim|is_unique[courses.name]');
		$this->form_validation->set_rules('description', 'course description', 'required|min_length[10]|max_length[255]|trim');
		//run form validation.  If everything is good, this returns TRUE
		if($this->form_validation->run())
		{
			//this is the model part
			$this->Course->create_course($this->input->post(), $this->session->userdata('user_id'));
			$this->session->set_flashdata('success', "Congrats, you added a course!");
			redirect(base_url('/courses/index'));
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());	
			redirect(base_url('/courses/index'));
		}
	}

	public function confirm($id)
	{
		$view_data['course'] = $this->Course->get_course_by_id($id);
		$this->load->view('courses_confirm_view', $view_data);
	}

	public function destroy($id)
	{
		$this->Course->remove_course($id);
		redirect(base_url('/courses/index'));
	}

	public function edit($id)
	{
		$view_data['course'] = $this->Course->get_course_by_id($id);
		$this->load->view('courses_edit_view', $view_data);
	}

	public function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[5]|trim');
		$this->form_validation->set_rules('description', 'course description', 'required|min_length[10]|max_length[255]|trim');
		//run form validation.  If everything is good, this returns TRUE
		if($this->form_validation->run())
		{
			//this is the model part
			$this->Course->update_course($id, $this->input->post());
			$this->session->set_flashdata('success', "Congrats, you edited a course!");
			redirect(base_url('/courses/index'));
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url("/courses/edit/{$id}"));	
		}
	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */