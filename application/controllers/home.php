<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{		
        //model function
        $this->load->model('home_model');
        $data['query'] = $this->home_model->get_featured_cca_list();

        $this->load->view('Home', $data);
	}

	public function cca($ccaID)
	{		
        //model function
        $this->load->model('home_model');
        $data['query'] = $this->home_model->get_specific_cca($ccaID);

        $this->load->view('cca', $data);
	}

	public function cca_list()
	{		
        //model function
        $this->load->model('home_model');
        $data['query'] = $this->home_model->get_cca_list();

        $this->load->view('cca_list', $data);
	}

	// public function check_registered($ccaID)
	// {		
 //        //model function
 //        $this->load->model('home_model');
 //        $userID = $this->home_model->get_user_id($this->session->userdata('username'));
        
 //        $this->home_model->check_registered($userID, $ccaID);
 //        //$data['query'] = $this->home_model->get_cca_list();
	// }

	public function cca_register_interest($ccaID)
	{
		 //model function
        $this->load->model('home_model');
        
		$data = array(        
        'ccaID' => $ccaID,
        'userID' => $this->home_model->get_user_id($this->session->userdata('username')));

        $this->home_model->register_cca_interest($data);

        $this->session->set_flashdata('msg', 'Interest registered!');

        $this->load->library('user_agent');
        redirect($this->agent->referrer());
        //redirect('admin','refresh');
	}	   
}
