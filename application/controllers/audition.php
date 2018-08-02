<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audition extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function index(){
		$id = $this->uri->segment(2);

		$this->load->model('admin_model');

		$data = [];

		$data['cca'] = $this->admin_model->get_specific_cca($id);

		$this->load->model('audition_model');
        $data['list'] = $this->audition_model->load($id);
        $data['CCAID'] = $id;

		$this->load->view('template/header');
		$this->load->view('audition/viewAudition',$data);
		$this->load->view('template/footer');
	}

	public function add(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$this->load->view('template/header');
		$this->load->view('audition/addAudition',$data);
		$this->load->view('template/footer');
	}

	public function add_audition(){
		$ccaid = $this->input->post('ccaid');
		$trgDate = $this->input->post('trgDate');
		$trgTime = $this->input->post('trgTime');

		$data = [
			'date' => $trgDate,
			'time' => $trgTime,
			'status' => 'active',
			'cca_id' => $ccaid,
		];

		$this->load->model('audition_model');
        $this->audition_model->add($data);

        redirect('/audition/'.$ccaid,'refresh');
	}

	public function edit(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$this->load->model('audition_model');
        $data['list'] = $this->audition_model->load_specific($id);

		$this->load->view('template/header');
		$this->load->view('audition/editAudition',$data);
		$this->load->view('template/footer');
	}

	public function update(){
		$auditionid = $this->input->post('auditionid');
		$trgDate = $this->input->post('trgDate');
		$trgTime = $this->input->post('trgTime');

		$data = [
			'date' => $trgDate,
			'time' => $trgTime,
		];

		$this->load->model('audition_model');
        $this->audition_model->update($auditionid, $data);
        $audition = $this->audition_model->load_specific($auditionid);

        redirect('/audition/'.$audition->cca_id,'refresh');
	}

	public function addAudition($auditionId){
		$userId = $this->session->userdata('userID');
		$data = [
			'auditionId' => $auditionId,
			'userId' => $userId,
			'status' => 'Not taken',
		];

		$this->load->model('audition_model');
        $this->audition_model->addAudition($data);
        $audition = $this->audition_model->load_specific($auditionId);

        $this->session->set_flashdata('msg', 'Interest registered!');
        redirect('/home/cca/'.$audition->cca_id,'refresh');
	}

	public function auditionAttendees($auditionId){
		$this->load->model('audition_model');
        $data['list'] = $this->audition_model->getAudition($auditionId);

        $data['details'] = $this->audition_model->load_specific($auditionId);
       	
       	$this->load->view('template/header');
		$this->load->view('audition/viewAuditionAttendees',$data);
		$this->load->view('template/footer');
	}

	function passAttendee($id){
		$this->load->library('user_agent');
		$this->load->model('audition_model');
		$this->audition_model->passAttendee($id);

		redirect($this->agent->referrer(),'refresh');
	}

	function failAttendee($id){
		$this->load->library('user_agent');
		$this->load->model('audition_model');
		$this->audition_model->failAttendee($id);

		redirect($this->agent->referrer(),'refresh');
	}
}
?>