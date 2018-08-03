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

        $userId = $this->session->userdata('userID');
        //check limit
        $limit = $this->home_model->cca_register_limit($userId);
        $data['limitCheck'] = $limit;

        //check if registered
        $test = $this->home_model->get_cca_interest($userId,$ccaID);
        $data['checkIfRegisted'] = $test;

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
        'userID' => $this->session->userdata('userID'));

        $this->home_model->register_cca_interest($data);
<<<<<<< HEAD
        $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Interest registered!');
=======
<<<<<<< HEAD

        $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Interest registered!');
=======
        $this->session->set_flashdata('msg', 'Interest registered!');
>>>>>>> 4fb81d83230521559126f018eadee13f457e7b82
>>>>>>> 95f557615c1be19724a5183a311b5791f3c7bdac

        $this->load->library('user_agent');
        
        $this->load->model('audition_model');
        $test = $this->audition_model->load($ccaID);

        if($test){
            redirect('audition/'.$ccaID,'refresh');
        }else{
            redirect($this->agent->referrer());
        }
        //redirect('admin','refresh');
	}	

	public function contact_us()
	{	
        //model function
         $this->load->model('home_model');
         //$data['cca_list'] = $this->home_model->ddl_cca_list();
         $data['query'] = $this->home_model->get_user_info($this->session->userdata('userID'));

        $this->load->view('contact_us', $data);
	}  

	public function contact_us_submitted()
	{	
        //model function
         $this->load->model('home_model');
         //$data['cca_list'] = $this->home_model->ddl_cca_list();
         $data['query'] = $this->home_model->get_user_info($this->session->userdata('userID'));

        $data = array(
            'name' => $this->input->post('name'),
            // 'category' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'message' => $this->input->post('message')
        );

        //model function
        $this->load->model('home_model');
        $this->home_model->submit_contact_us($data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Message submitted!');
<<<<<<< HEAD
=======

>>>>>>> 95f557615c1be19724a5183a311b5791f3c7bdac
        redirect('home/contact_us','refresh');
	}

        public function get_user($userid)
    {
        if($this->session->userdata('userID') == $userid)
        {
        //load the Profile_model
        $this->load->model('home_model');
        $data['query'] = $this->home_model->get_user_info($userid);
        $this->load->view('view_profile', $data);
        }
        else
        {
            // redirect('error/cli/error_php.php');
            redirect(base_url() . 'index.php');
            // redirect('error/cli/index.html');
        }
        
    }

    public function update($studid)
    {
            $this->load->library('form_validation');
            $this->load->model('Profile_model');

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
            // $this->form_validation->set_rules('adminno', 'AdminNo', 'required|alpha_numeric|exact_length[7]');
            // $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('dob', 'Dob', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');

            if ($this->form_validation->run() == FALSE)
            {
                //fail validation
                $this->load->view('view_profile', $data);

            }
            else
            {
                //pass validation
            $data = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                // 'adminNumber' => $this->input->post('adminno'),
                // 'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                //'dob' => @date('d-m-Y',@strtotime($this->input->post('dateofbirth'))),
            );

                //update the student record
            $this->db->where('userID',$studid);
            $this->db->update('user',$data);

                //display success message
            $this->session->set_flashdata('msg','<div class="alert alert-success textcenter">Details has been updated successfully.</div>');
            redirect('home/get_user/' . $studid);
            }
    }

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
