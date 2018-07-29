<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CCALimit_model extends CI_Model {  
	function __construct(){                 
		parent::__construct();      
	}

	function get_limit(){
		$this->db->select('CCALimit');
		$this->db->from('CCALimit');
		$this->db->where('CCALimit.id', 1);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	function set_limit($value){
		$this->db->where('CCALimit.id', 1);
		$this->db->update('CCALimit', ['CCALimit' => $value]);
	}
}