<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	// function __construct() {
 //        parent::__construct();
 //        $this->load->library('form_validation');
 //        $this->load->model('login');
 //    }

	public function index()
	{
        //Check if logged in. If not logged in, proceed; Else redirect back to previous page.
        if(!$this->session->userdata('username'))
        {
            $this->load->view("login");
        }
        else
        {
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
        }
	}

    function login2()
    {
        $data['title'] = 'sucessfully logged in';
        $this->load->view("login", $data);
    }

    function login_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            //true
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //model function
            $this->load->model('login_model');
            if($this->login_model->can_login($username, $password))
            {
                //Check if login user is Admin or Student
                $role = $this->login_model->check_role($this->input->post('username'));
                //Stored Session. Username and role.
                $session_data = array('username' => $username, 'role' => $role);
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'index.php');
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect(base_url() . 'index.php/login');
            }
        }
        else
        {
            //false
            $this->login2();
        }
    }
    function enter()
    {
        if($this->session->userdata('username') != '')
        {
            echo '<h2>Welcome - '.$this->session->userdata('username').'</h2>';
            echo '<a href="'.base_url().'index.php/login/logout">Logout</a>';
        }
        else
        {
            redirect(base_url() . 'index.php/login');
        }
    }
    function logout()
    {
        //unset session data
        $this->session->unset_userdata(array('username', 'role'));
        //redirect(base_url() . 'index.php');
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
}