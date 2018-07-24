<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model  
{  
  function __construct()      
  {           
      // Call the Model constructor           
    parent::__construct();      
  }
  
  //fetch all student record
  function get_user()  
  {  
    $sql = 'select * from user';
    $query = $this->db->query($sql);
    $result = $query-> result();
    return $result;
  }  

  //fetch student record by student no
  function get_student_record($studid)
  {
    $this->db->where('userID', $studid);
    $this->db->from('user');
    $query = $this->db->get();
    return $query->row();
  }

  //fetch student roles and ID
  //not in use  
  function get_role()
  {
   $this->db->select('userID');
   $this->db->select('role');
   $this->db->from('user');
   $query = $this->db->get();
   $result = $query->result();

  //array to store userID id & role
   $userid = array('-SELECT-');
   $role = array('-SELECT-');
   for ($i = 0; $i < count($result); $i++)
   {
     array_push($userid, $result[$i]->userID);
     array_push($role, $result[$i]->role);
   }
   return $userid_result = array_combine($userid, $role);
 }

}  