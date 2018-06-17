<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Login_model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           $this->db->where('adminNumber', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('user');  

           //SELECT * FROM user WHERE adminNumber = '$username' AND password = '$password'
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }  
 }  