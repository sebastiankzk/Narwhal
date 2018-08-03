<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Login_model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           //SELECT * FROM user WHERE adminNumber = '$username' AND password = '$password'
           $this->db->where('adminNumber', $username);
           //$this->db->where('password', $password);  
           $query = $this->db->get('user');  
           $db_hash_password = $query->row()->password;
           
           if(($query->num_rows() > 0) && (password_verify($password ,$db_hash_password)))
           {
                return true;         
           }  
           else  
           {  
                return false;       
           }  
      }  

      public function check_role($username)  
      {  
           //SELECT role FROM user WHERE adminNumber = '$username'
           $this->db->select('role');
           $this->db->from('user');
           $this->db->where('adminNumber', $username);
           $query = $this->db->get();  
           $row = $query->row();
           return $row->role;
      }  

      public function get_name($username)
      {
           //SELECT name FROM user WHERE adminNumber = '$username'
           $this->db->select('name');
           $this->db->from('user');
           $this->db->where('adminNumber', $username);
           $query = $this->db->get();  
           $row = $query->row();
           return $row->name;
      }

      public function get_userID($username)
      {
           //SELECT userID FROM user WHERE adminNumber = '$username'
           $this->db->select('userID');
           $this->db->from('user');
           $this->db->where('adminNumber', $username);
           $query = $this->db->get();  
           $row = $query->row();
           return $row->userID;
      }

      public function get_ccaID($userid)
      {
           //SELECT userID FROM user WHERE adminNumber = '$username'
           $this->db->select('ccaID');
           $this->db->from('tbl_user_cca');
           $this->db->where('userID', $userid);
           $query = $this->db->get();  
           $row = $query->row();
           return $row->ccaID;
      }
 }  