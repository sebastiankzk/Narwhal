<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leader extends CI_Controller {


    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        //Check if logged in. If not logged in, proceed; Else redirect back to previous page.
        if($this->session->userdata('role') == 'Leader')
        {
            //model function
            $this->load->model('leader_model');
            $userID = $this->session->userdata('userID');
            //$ccaID = $this->leader_model->getCCAID($userID);
            $data['studentlist'] = $this->leader_model->get_student_list($userID);

            $this->load->view('leader', $data);
        }
        else
        {
            redirect(base_url() . 'index.php');
        }
	}

	//delete student record from db
	 function delete_member($user_ccaID)
	 {
	 	//model function
        $this->load->model('leader_model');
        $this->leader_model->delete_specific_member($user_ccaID);

        $this->session->set_flashdata('msg', 'Member has been deleted!');
        redirect('leader','refresh');
     }
}