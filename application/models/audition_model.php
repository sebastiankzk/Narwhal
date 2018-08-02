<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audition_model extends CI_Model {  
	function __construct(){                 
		parent::__construct();      
	}

	function add($data){
		$this->db->insert('audition', $data);
	}

	function load($id){
		$date = new DateTime('now');

		$curr_date = $date->format('Y-m-d');

		$this->db->select('*');
		$this->db->from('audition');
		$this->db->where('cca_id', $id);
		$this->db->where('date >', $curr_date);
		$this->db->order_by("date desc");

		$query = $this->db->get();
		$result = $query->result();

		$auditionList = [];

		for ($i = 0; $i < count($result); $i++)
		{
			array_push($auditionList, array('id'=> $result[$i]->id, 'date' => $result[$i]->date, 'time' => $result[$i]->time, 'status' => $result[$i]->status));
		}

		return $auditionList;
	}

	function load_specific($id){
		$this->db->select('*');
		$this->db->from('audition');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$row = $query->row();
		return $row;
	}

	function update($id,$data){
		$this->db->where('id', $id);
		$this->db->update('audition', $data);
	}

	function addAudition($data){
		$this->db->insert('users_audition', $data);
	}

	function updateAudition($id,$data){
		$this->db->where('id', $id);
		$this->db->update('users_audition', $data);
	}

	function getAudition($id){
		$this->db->select('*');
		$this->db->from('users_audition');
		$this->db->where('auditionId', $id);

		$query = $this->db->get();
		$result = $query->result();

		$auditionList = [];

		$this->load->model('profile_model');

		for ($i = 0; $i < count($result); $i++)
		{
			$name = $this->profile_model->get_student_record($result[$i]->userId);
			array_push($auditionList, array('id'=> $result[$i]->id, 'auditionId' => $result[$i]->auditionId, 'userId' => $result[$i]->userId, 'status' => $result[$i]->status, 'name' => $name->name, 'mobile' => $name->mobile,));
		}

		return $auditionList;
	}

	function passAttendee($id){
		$this->db->where('id', $id);
		$this->db->update('users_audition', ['status' => 'Passed']);
	}

	function failAttendee($id){
		$this->db->where('id', $id);
		$this->db->update('users_audition', ['status' => 'Failed']);
	}
}