<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Home_model extends CI_Model  
 {  
      function __construct()      
      {           
      // Call the Model constructor           
        parent::__construct();      
      }
      
      public function get_featured_cca_list()  
      {  
           //SELECT * FROM CCA WHERE featured ='1'
           $this->db->from('cca');
           $this->db->where('featured','1');
           $query = $this->db->get();
           return $query->result();
      }  

      public function get_specific_cca($ccaID)  
      {  
           //SELECT * FROM cca WHERE ccaID = $ccaID
           $this->db->select('*');
           $this->db->from('cca');
           $this->db->where('ccaID', $ccaID);
           $query = $this->db->get();
           return $query->row();
      } 

      public function get_cca_list()  
      {  
           //SELECT * FROM CCA
           $this->db->from('cca');
           $query = $this->db->get();
           return $query->result();
      } 

      public function get_user_info($userID)  
      {  
          //Select userID FROM user WHERE adminNumber = $data->userID
          $this->db->select('*');
          $this->db->from('user');
          $this->db->where('userID', $userID);
          $query = $this->db->get();
          return $query->row();
      } 

      // public function ddl_cca_list()  
      // {  
      //      //SELECT * FROM CCA
      //      $this->db->select('ccaID, name');
      //      $this->db->from('cca');
      //      $query = $this->db->get();
      //      return $query->result_array();
      // } 

      public function get_user_id($username)  
      {  
          //Select userID FROM user WHERE adminNumber = $data->userID
          $this->db->select('userID');
          $this->db->from('user');
          $this->db->where('adminNumber', $username);
          return $this->db->get()->row()->userID;
      } 

      // public function check_registered($userID, $ccaID)  
      // {  
      //      //SELECT * FROM cca_interest where userID = $userId AND ccaID = $ccaID
      //     $this->db->select('*');
      //     $this->db->from('cca_interest');
      //     $this->db->where('userID', $userID);
      //     $this->db->where('ccaID', $ccaID);
      //     return $query->result();
      // } 

      public function register_cca_interest($data)  
      {  
          //INSERT * INTO cca_interest
          $this->db->insert('cca_interest', $data);
      }

      public function get_cca_interest($id,$ccaID)  
      {  
          $this->db->select('*');
          $this->db->from('cca_interest');
          $this->db->where('userID',$id);
          $this->db->where('ccaID',$ccaID);

          $query = $this->db->get();
          $result = $query->result();

          if($result){
            return true;
          }else{
            return false;
          }
      }    

      public function cca_register_limit($id){
          $this->db->select('*');
          $this->db->from('cca_interest');
          $this->db->where('userID',$id);

          $query = $this->db->get();
          $result = $query->result();

          $this->load->model('CCALimit_model');
          $check = $this->CCALimit_model->get_limit();

          if(count($result) < $check[0]->CCALimit){
            return true;
          }else{
            return false;
          }
      }

      public function submit_contact_us($data)
      {
          //INSERT * INTO contact_us
          $this->db->insert('contact_us', $data);
      }
 }  