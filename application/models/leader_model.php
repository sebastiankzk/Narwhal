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
          $this->db->select('user.name as username'); 
          $this->db->select('cca.name as ccaname');
          $this->db->select('tbl_user_cca.quit as quit');  
          $this->db->select('tbl_user_cca.user_ccaID as user_ccaID');  
          $this->db->from('user');
          $this->db->join('tbl_user_cca', 'tbl_user_cca.userID = user.userID');
          $this->db->join('cca', 'cca.ccaID = tbl_user_cca.ccaID');
          $this->db->where('cca.ccaID', $userID);
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

      function get_attendance($ccaID)  
      {  
        // $sql = 'select * from attendance';
        // $query = $this->db->query($sql);
        // $result = $query-> result();
        $query = $this->db->get_where('attendance',array('ccaID' => $ccaID));
        return $query->result();
      }  

      function get_ccaID($ccaID)
      {
        $this->db->where('ccaID', $ccaID);
        $this->db->from('attendance');
        $query = $this->db->get();
        return $query->row();
      }

      function get_date()
      {
       $this->db->distinct();
       $this->db->select('date');
       $this->db->from('attendance');
       $query = $this->db->get();
       $result = $query->result();

      //array to store userID id & role
       $date = array('-SELECT-');
       for ($i = 0; $i < count($result); $i++)
       {
         array_push($date, $result[$i]->date);
       }
       return $date;
      }

 }  
 ?>