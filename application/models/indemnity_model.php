<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class indemnity_model extends CI_Model  
 {  
      function __construct()      
      {             
      // Call the Model constructor           
        parent::__construct();      
      }

      public function get_indemnity_list()  
      {  
         //$ccaId = $this->getCCAID($userID)[0]->ccaID;

        $this->db->select('user.name as username'); 
        $this->db->select('cca.name as ccaname');
        $this->db->select('indemnity.status as status');  
        $this->db->select('indemnity.ccaID as indemnity_ccaID');  
        $this->db->select('indemnity.indemnityID as indemnityID'); 
        $this->db->from('user');
        $this->db->join('indemnity', 'indemnity.userID = user.userID');
        $this->db->join('cca', 'cca.ccaID = indemnity.ccaID');
        //$this->db->where('cca.ccaID', $ccaId);
    
        $query = $this->db->get();
        $result = $query->result();

        //array to store student info
        //$userID = array('-SELECT-');
        $username = array('-SELECT-');
        $ccaname = array('-SELECT-');
        $status = array('-SELECT-');
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($username, $result[$i]->username);
        }
        return $result;
      }  


      public function get_specific_indemnity($indemnityID)  
      {  
           $this->db->select('user.name as username'); 
        $this->db->select('cca.name as ccaname');
        $this->db->select('indemnity.status as status');  
        $this->db->select('indemnity.nameOfParent as nameOfParent');  
        $this->db->select('indemnity.emergencyContact as emergencyContact');  
        $this->db->select('indemnity.medicalRecord as medicalRecord');  
        $this->db->select('indemnity.ccaID as indemnity_ccaID');  
        $this->db->select('indemnity.indemnityID as indemnityID'); 
        $this->db->from('user');
        $this->db->join('indemnity', 'indemnity.userID = user.userID');
        $this->db->join('cca', 'cca.ccaID = indemnity.ccaID');
           $this->db->where('indemnity.indemnityID', $indemnityID);
           $query = $this->db->get();
           $row = $query->row();
           return $row;
      }  


      public function update_specific_indemnity($id, $data)  
      {  
           $this->db->where('indemnityID', $id);
           $this->db->update('indemnity', $data);
      }  

} 
?>