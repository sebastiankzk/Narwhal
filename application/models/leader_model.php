<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class leader_model extends CI_Model  
{  
  function __construct()      
  {           
    // Call the Model constructor           
    parent::__construct();      
  }

  public function get_student_list($userID)  
  {  
    $ccaId = $this->getCCAID($userID)[0]->ccaID;

    $this->db->select('user.name as username'); 
    $this->db->select('cca.name as ccaname');
    $this->db->select('tbl_user_cca.quit as quit');  
    $this->db->select('tbl_user_cca.user_ccaID as user_ccaID');  
    $this->db->from('user');
    $this->db->join('tbl_user_cca', 'tbl_user_cca.userID = user.userID');
    $this->db->join('cca', 'cca.ccaID = tbl_user_cca.ccaID');
    $this->db->where('cca.ccaID', $ccaId);
    
    $query = $this->db->get();
    $result = $query->result();

    //array to store student info
    $userID = array('-SELECT-');
    $username = array('-SELECT-');
    $ccaname = array('-SELECT-');
    $quit = array('-SELECT-');
    for ($i = 0; $i < count($result); $i++)
    {
     array_push($username, $result[$i]->username);
    }
    return $result;
  }   

  public function getCCAID($userID)  
  {  
    $this->db->select('cca.ccaID');
    $this->db->from('cca');
    $this->db->join('tbl_user_cca', 'tbl_user_cca.ccaID = cca.ccaID');
    $this->db->join('user', 'user.userID = tbl_user_cca.userID');
    $this->db->where('user.userID', $userID);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }  

  public function delete_specific_member($user_ccaID)  
  {  
    $this->db->where('user_ccaID', $user_ccaID);
    $this->db->delete('tbl_user_cca');
  } 

  function get_allattendance($ccaid)  
  { 
    $this->db->where('ccaID', $ccaid);
    $this->db->from('attendance');
    $query = $this->db->get();
    return $query->result();
  } 

  public function add_member($data)  
  {  
     $this->db->insert('tbl_user_cca', $data);
  }


  function get_attendance($ccaID)  
  {  
    // $sql = 'select * from attendance';
    // $query = $this->db->query($sql);
    // $result = $query-> result();
    $query = $this->db->get_where('usercca_view',array('ccaID' => $ccaID));
    return $query->result();
  }  

  function get_interest($ccaID)  
  {      
    $this->db->select('*');
    $this->db->where('ccaID', $ccaID);
    $this->db->from('cca_interest_view');
    $query = $this->db->get();
    return $query->result();
  } 

  function get_contact_us()  
  {      
    $this->db->select('*');
    $this->db->from('contact_us');
    $query = $this->db->get();
    return $query->result();
  }    

  function get_ccaID($ccaID)
  {
    $this->db->where('ccaID', $ccaID);
    $this->db->from('attendance');
    $query = $this->db->get();
    return $query->row();
  }

  //not in use
  function search_dt($date,$time)
  {
    $this->db->select('*');
    $this->db->from('attendance_view');
    $this->db->like('date',$date);
    $this->db->like('date',$time);
    $query = $this->db->get();

    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else{
      return $query->result();
    }
  }

  function get_datetime($ccaID)
  {
   $this->db->select('trainingID');
   $this->db->select('datetime');
   $this->db->where('ccaID', $ccaID);
   $this->db->from('training');
   $query = $this->db->get();
   $result = $query->result();
  //array to store training id & date
   $trainingid = array('Select Date Time');
   $datetime = array('Select Date Time');
   for ($i = 0; $i < count($result); $i++)
   {
     array_push($trainingid, $result[$i]->trainingID);
     array_push($datetime, $result[$i]->datetime);
   }
   return $training_result = array_combine($trainingid, $datetime);
  }

  function get_training($ccaID)
  {
   $this->db->select('*');
   $this->db->where('ccaID', $ccaID);
   $this->db->from('training');
   $query = $this->db->get();
   return $query->result();
  }

  //  function search_training($dateime)
  // {
  //   $this->db->select('*');
  //   $this->db->from('training');
  //   $this->db->like('datetime',$dateime);
  //   $query = $this->db->get();

  //   if ($query->num_rows() > 0){
  //     return $query->result();
  //   }else{
  //     return $query->result();
  //   }
  //  }

  function get_interest_base($id)  
  {      
    $this->db->select('*');
    $this->db->where('id', $id);
    $this->db->from('cca_interest');
    $query = $this->db->get();
    return $query->result();
  } 

}
?>