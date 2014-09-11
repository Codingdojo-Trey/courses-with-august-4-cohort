<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
		//faux database data
		$data['facts'] = array(
			array('name' => 'Jay', 'food' => 'mac and cheese', 'id' => 1), 
			array('name' => 'alvaro', 'food' => 'paella', 'id' => 2), 
			array('name' => 'patrick', 'food' => 'bacon', 'id' => 3));

		$this->load->view('ajax_index_view', $data);
	}

	public function process()
	{
		// now that Ajax is working, we can pretty much do any db operation we want back here and the page still won't
		// refresh
		//BEFORE WE ECHO THE STUFF, MAKE SURE TO ADD NEW DATA TO THE DATABASE
		echo json_encode($this->input->post());
	}

	public function delete($id)
	{
		echo "we will eventually delete here";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */