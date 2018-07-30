<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indemnity extends CI_Controller {


    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{

        $this->load->model('indemnity_model');
        $userID = $this->session->userdata('userID');
        $data['indemnitylist'] = $this->indemnity_model->get_indemnity_list($userID);
        //$data['CCAID'] = $this->indemnity_model->getCCAID($userID)[0]->ccaID;

        $this->load->view('indemnity', $data);
	}

    function get_indemnity()
    {
        //model function
        $data = array(
        'indemnityID' => $this->input->post('indemnityID'));
        $this->load->model('indemnity_model'); 
        $data['query'] = $this->indemnity_model->get_specific_indemnity($data['indemnityID']);
        $this->load->view('update_indemnity', $data);
    }

    function update_indemnity($indemnityID)
    {
        //store textbox from form into an array
        $data = array(
        'indemnityID' => $indemnityID,
        'status' => $this->input->post('status'));

        //model function
        $this->load->model('indemnity_model');
        $this->indemnity_model->update_specific_indemnity($indemnityID, $data);

        $this->session->set_flashdata('msg', 'Indemnity Form Status has been Updated!');
        redirect('indemnity','refresh');
    }
}