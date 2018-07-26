<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the student model
        $this->load->model('event_model');
    }

    public function index()
    {
            //model function
            $this->load->model('event_model');
            $data['eventlist'] = $this->event_model->get_event_list();

            $this->load->view('event', $data);
    }

    function add_event()
    {
        $this->load->view('add_event');
    }

     function add_specific_event()
    {
        $data = array(
        
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'venue' => $this->input->post('venue'),
        'date' => $this->input->post('date'),
        'time' => $this->input->post('time'));

        //model function
        $this->load->model('event_model');
        $this->event_model->add_specific_event($data);

        $this->session->set_flashdata('msg', 'Event Added!');
        redirect('event','refresh');
    }

    function get_event()
    {
        //model function
        $data = array(
        'eventID' => $this->input->post('eventID'));
        $this->load->model('event_model'); 
        $data['query'] = $this->event_model->get_specific_event($data['eventID']);
        $this->load->view('update_event', $data);
    }

    function view_event()
    {
        //model function
        $data = array(
        'eventID' => $this->input->post('eventID'));
        $this->load->model('event_model'); 
        $data['query'] = $this->event_model->get_specific_event($data['eventID']);
        $this->load->view('view_event', $data);
    }


    function update_event($eventID)
    {
        //store textbox from form into an array
        $data = array(
        'eventID' => $eventID,
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
        'venue' => $this->input->post('venue'),
        'date' => $this->input->post('date'),
        'time' => $this->input->post('time'));

        //model function
        $this->load->model('event_model');
        $this->event_model->update_specific_event($eventID, $data);

        $this->session->set_flashdata('msg', 'Event has been Updated!');
        redirect('event','refresh');
    }

}