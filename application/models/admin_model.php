<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Admin_model extends CI_Model  
 {  
      function __construct()      
      {           
      // Call the Model constructor           
        parent::__construct();      
      }

      // public function get_student_list()  
      // {  
      //      //SELECT role FROM user WHERE adminNumber = '$username'
      //      $this->db->select('role');
      //      $this->db->from('user');
      //      $this->db->where('adminNumber', $username);
      //      $query = $this->db->get();  
      //      $row = $query->row();
      //      return $row->role;
      // }  

      public function get_cca_list()  
      {  
           //SELECT * FROM CCA
           $this->db->from('cca');
           $query = $this->db->get();
           return $query->result();
      }  

      public function get_specific_cca($ccaID)  
      {  
           //SELECT * FROM cca WHERE adminNumber = '$username'
           $this->db->select('*');
           $this->db->from('cca');
           $this->db->where('ccaID', $ccaID);
           $query = $this->db->get();
           return $query->row();
      }  

      public function update_specific_cca($id, $data)  
      {  
           //UPDATE * FROM cca WHERE ccaID = $id 
           $this->db->where('ccaID', $id);
           $this->db->update('cca', $data);

           //redirect('admin','refresh');
      }  

      public function delete_specific_cca($id)  
      {  
           //Delete from CCA WHERE ccaID = $id
           $this->db->where('ccaID', $id);
           $this->db->delete('cca');
      } 
      public function add_specific_cca($data)  
      {  
           //INSERT * INTO cca
          $this->db->insert('cca', $data);
      }  
 }  