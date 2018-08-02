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
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        //Check if logged in. If not logged in, proceed; Else redirect back to previous page.
        if($this->session->userdata('role') == 'Admin')
        {
            //model function
            $this->load->model('admin_model');
            $data['query'] = $this->admin_model->get_cca_list();
            $data['count'] = $this->admin_model->count_all_cca();

            $this->load->model('CCALimit_model');

            $data['limit'] = $this->CCALimit_model->get_limit();

            $this->load->view('Admin', $data);
        }
        else
        {
            // $this->load->library('user_agent');
            // redirect($this->agent->referrer());
            redirect(base_url() . 'index.php');
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
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        $data = '';

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if($data != ''){
            $data = array(
                'ccaID' => $ccaID,
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'information' => $this->input->post('information'),
                'venue' => $this->input->post('venue'),
                'trgDate' => $this->input->post('trgDate'),
                'startTime' => $this->input->post('trgTime'),
                'image' => $data['upload_data']['file_name']
            );
        }else{
            $data = array(
                'ccaID' => $ccaID,
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'information' => $this->input->post('information'),
                'venue' => $this->input->post('venue'),
                'trgDate' => $this->input->post('trgDate'),
                'startTime' => $this->input->post('trgTime'),
            );
        }
        
        //model function
        $this->load->model('admin_model');
        $this->admin_model->update_specific_cca($ccaID, $data);

        $this->session->set_flashdata('msg', 'CCA Updated!');

        if($this->session->userdata('role') == 'Leader'){
            redirect('leader','refresh');
        }else{
            redirect('admin','refresh');
        }
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
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());

            $data = array(
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'information' => $this->input->post('information'),
                'venue' => $this->input->post('venue'),
                'trgDate' => $this->input->post('trgDate'),
                'trgTime' => $this->input->post('trgTime'),
            );
        } else {
            $data = array('upload_data' => $this->upload->data());

            $data = array(
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'information' => $this->input->post('information'),
                'venue' => $this->input->post('venue'),
                'trgDate' => $this->input->post('trgDate'),
                'trgTime' => $this->input->post('trgTime'),
                'image' => $data['upload_data']['file_name']
            );
        }

        //model function
        $this->load->model('admin_model');
        $this->admin_model->add_specific_cca($data);

        $this->session->set_flashdata('msg', 'CCA Added!');
        redirect('admin','refresh');
    }

    function count_cca()
    {
        //model function
        $this->load->model('admin_model');
        $this->admin_model->count_all_cca();
    }

    function updateCCACount()
    {
        $count = $this->input->post('count');
        $this->load->model('CCALimit_model');
        $this->CCALimit_model->set_limit($count);

        redirect('admin','refresh');
    }
}