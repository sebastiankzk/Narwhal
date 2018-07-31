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

	//when page loaded
	public function index()
	{ 
        if($this->session->userdata('role') == 'Admin')
        {
        //load the Profile_model
		$this->load->model('Profile_model');

        //call the model function to get the User data
		$userresult = $this->Profile_model->get_user();
		$data['user'] = $userresult;
        //load the profile view
		$this->load->view('profile',$data);
		}
		else
        {
            redirect(base_url() . 'index.php');
        }
	}

	function get_user($studid)
	{
		if($this->session->userdata('role') == 'Admin')
        {
		//load the Profile_model
		$this->load->model('Profile_model');
		$data['query'] = $this->Profile_model->get_student_record($studid);
		$this->load->view('update_profile', $data);
		}
		else
        {
            redirect(base_url() . 'index.php');
        }
	}

	function create_user()
	{	
		if($this->session->userdata('role') == 'Admin')
        {
			$this->load->library('form_validation');

			//set validation rules
			$this->form_validation->set_rules('name', 'Name',
				'trim|required|callback_alpha_only_space');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('adminno', 'AdminNo', 'required|alpha_numeric|exact_length[7]|is_unique[user.adminNumber]');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('dob', 'Dob', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
			$this->form_validation->set_rules('role', 'Role', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				//fail validation
				$this->load->view('add_profile');
			}
			else
			{
				//pass validation
				$data = array(
					'name' => $this->input->post('name'),
					'password' => $this->input->post('password'),
					'adminNumber' => $this->input->post('adminno'),
					'gender' => $this->input->post('gender'),
					'dob' => ($this->input->post('dob')),
					// $this->input->post('dob'),
					'address' => $this->input->post('address'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'role' => $this->input->post('role'),
				);

				//insert the form data into database
				$this->db->insert('user', $data);

				//display success message
				$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">New user has been added!</div>');
				redirect('Profile','refresh');
			}
		}
		else
        {
            redirect(base_url() . 'index.php');
        }
	}

	function update($studid)
	{
		if($this->session->userdata('role') == 'Admin')
        {
			// $this->load->model('Profile_model');

			// $data['role'] = $this->Profile_model->get_role();

			$data['studid'] = $studid;

			//fetch data from user table
			$data['user'] = $this->Profile_model->get_user();

			//fetch student record for the given student no.
			$data['query'] = $this->Profile_model->get_student_record($studid);

			//set validation rules
			$this->form_validation->set_rules('name', 'Name',
				'trim|required|callback_alpha_only_space');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('adminno', 'AdminNo', 'required|alpha_numeric|exact_length[7]');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('dob', 'Dob', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
			$this->form_validation->set_rules('role', 'Role', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				//fail validation
				$this->load->view('update_profile', $data);

			}
			else
			{
				//pass validation
			$data = array(
				'name' => $this->input->post('name'),
				'password' => $this->input->post('password'),
				'adminNumber' => $this->input->post('adminno'),
				'gender' => $this->input->post('gender'),
				'dob' => $this->input->post('dob'),
				'address' => $this->input->post('address'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'role' => $this->input->post('role'),
				//'dob' => @date('d-m-Y',@strtotime($this->input->post('dateofbirth'))),
			);

				//update the student record
			$this->db->where('userID',$studid);
			$this->db->update('user',$data);

				//display success message
			$this->session->set_flashdata('msg','<div class="alert alert-success textcenter">Details has been updated successfully.</div>');
			redirect('profile/get_user/' . $studid);
			}
		}
		else
        {
            redirect(base_url() . 'index.php');
        }
	}

	function delete($studid)
	{
        //model function
		// $this->load->model('Profile_model');
		$this->Profile_model->get_user($studid);

		$this->db->where('userID', $studid);
		$this->db->delete('user');

		$this->session->set_flashdata('msg', '<div class="alert alert-danger textcenter">User has been deleted.</div>');
		redirect('Profile','refresh');
	}

	function search_user()
	{
        //model function
		$this->load->model('Profile_model');
		$name = $this->input->post('search');

		// if(isset($name) and !empty($name)){
			$data['user'] = $this->Profile_model->search_user($name);
			$this->load->view('Profile',$data);			
		// } 
		// else {
		// 	redirect('Profile','refresh');
			
		// }
	}

	//custom validation function for dropdown input
	//not in use
	function combo_check($str)
	{
		if ($str == "-SELECT-")
		{
			$this->form_validation->set_message('combo_check', 'Valid %s Name is required');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	//custom validation function to accept only alpha and space input
	function alpha_only_space($str)
	{
		if (!preg_match("/^([-a-z ])+$/i", $str))
		{
			$this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
?>