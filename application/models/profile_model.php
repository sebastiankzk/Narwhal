<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model  
{  
  function __construct()      
  {           
      // Call the Model constructor           
    parent::__construct();      
  }
  
  function get_user()  
  {  
    $sql = 'select * from user';
    $query = $this->db->query($sql);
    $result = $query-> result();
    return $result;
  }  

      //fetch student record by student no
  function get_student_record($studno)
  {
    $this->db->where('adminNumber', $studno);
    $this->db->from('user');
    $query = $this->db->get();
    return $query->row();
  }

  function get_school()
  {
   $this->db->select('school_id');
   $this->db->select('school_name');
   $this->db->from('tbl_school');
   $query = $this->db->get();
   $result = $query->result();
 //array to store department id & department name
   $sch_id = array('-SELECT-');
   $sch_name = array('-SELECT-');
   for ($i = 0; $i < count($result); $i++)
   {
     array_push($sch_id, $result[$i]->school_id);
     array_push($sch_name, $result[$i]->school_name);
   }
   return $school_result = array_combine($sch_id, $sch_name);
 }

 

}  