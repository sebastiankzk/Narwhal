<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Login_model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           //SELECT * FROM user WHERE adminNumber = '$username' AND password = '$password'
           $this->db->where('adminNumber', $username);
           $this->db->where('password', $password);  
           $query = $this->db->get('user');  

           if($query->num_rows() > 0)  
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
 }  