<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        //Check if logged in. If not logged in, proceed; Else redirect back to previous page.
        if($this->session->userdata('role') == 'Admin')
        {
            //model function
            $this->load->model('admin_model');
            $data['query'] = $this->admin_model->get_cca_list();

            $this->load->view('Admin', $data);
        }
        else
        {
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
        }
	}

    function get_cca($ccaID)
    {
        //model function
        $this->load->model('admin_model');
        $data['query'] = $this->admin_model->get_specific_cca($ccaID);
        $this->load->view('update_cca', $data);
    }

    function update_cca($ccaID)
    {
        //store textbox from form into an array
        $data = array(
        'ccaID' => $ccaID,
        'name' => $this->input->post('name'),
        'category' => $this->input->post('category'),
        'information' => $this->input->post('information'),
        'venue' => $this->input->post('venue'),
        'trgDate' => $this->input->post('trgDate'),
        'trgTime' => $this->input->post('trgTime'),
        'image' => $this->input->post('image'));

        //model function
        $this->load->model('admin_model');
        $this->admin_model->update_specific_cca($ccaID, $data);

        $this->session->set_flashdata('msg', 'CCA Updated!');
        redirect('admin','refresh');
    }

    function delete_cca($ccaID)
    {
        //model function
        $this->load->model('admin_model');
        $this->admin_model->delete_specific_cca($ccaID);

        $this->session->set_flashdata('msg', 'CCA Deleted!');
        redirect('admin','refresh');
    }

    function add_cca()
    {
        $this->load->view('add_cca');
    }

    function add_specific_cca()
    {
        $data = array(
        
        'name' => $this->input->post('name'),
        'category' => $this->input->post('category'),
        'information' => $this->input->post('information'),
        'venue' => $this->input->post('venue'),
        'trgDate' => $this->input->post('trgDate'),
        'trgTime' => $this->input->post('trgTime'),
        'image' => $this->input->post('image'));

        //model function
        $this->load->model('admin_model');
        $this->admin_model->add_specific_cca($data);

        $this->session->set_flashdata('msg', 'CCA Added!');
        redirect('admin','refresh');
    }
}