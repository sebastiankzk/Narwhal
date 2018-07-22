<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('form_validation');
 		//load the student model
		$this->load->model('Profile_model');
	}

	public function index()
	{
        //load the Profile_model
		$this->load->model('Profile_model');
        //call the model function to get the User data
		$userresult = $this->Profile_model->get_user();
		$data['user'] = $userresult;
        //load the profile view
		$this->load->view('profile',$data);
	}

	function get_user($studno)
	{
		$this->load->model('Profile_model');
		$data['query'] = $this->Profile_model->get_student_record($studno);
		$this->load->view('update_profile', $data);
	}

	function update($studno)
	{
		$this->load->model('Profile_model');

		$data['studno'] = $studno;

		//fetch data from user table
		$data['user'] = $this->Profile_model->get_user();

		//fetch student record for the given student no.
		$data['query'] = $this->Profile_model->get_student_record($studno);

		//set validation rules
		$this->form_validation->set_rules('name', 'Name',
			'trim|required|callback_alpha_only_space');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('adminno', 'AdminNo', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('dob', 'Dob', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		//$this->form_validation->set_rules('registeredDate', 'Registered Date', 'required');

		// if ($this->form_validation->run() == FALSE)
		// {
		// 	//fail validation
		// 	$this->load->view('update_profile', $data);

		// }
		// else
		// {
			//pass validation
			$data = array(
				'name' => $this->input->post('name'),
				'password' => $this->input->post('password'),
				'adminNumber' => $this->input->post('adminno'),
				//'dob' => @date('d-m-Y',@strtotime($this->input->post('dateofbirth'))),
			);

			//update the student record
			$this->db->where('adminNumber',$studno);
			$this->db->update('user',$data);

			//display success message
			$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Student
				details added to Database!!!</div>');
			redirect('profile/get_user/' . $studno);
				
	}

	//custom validation function to accept only alpha and space input
	function alpha_only_space($str)
	{
		if (!preg_match("/^([-a-z ])+$/i", $str))
		{
			$this->form_validation->set_message('alpha_only_space', 'The %s field must
				contain only alphabets or spaces');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	    function delete($studno)
    {
        //model function
        $this->load->model('Profile_model');
        $this->admin_model->delete_specific_cca($ccaID);

        $this->session->set_flashdata('msg', 'CCA Deleted!');
        redirect('admin','refresh');
    }
}
?>