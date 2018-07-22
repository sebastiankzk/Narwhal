<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class event_model extends CI_Model  
 {  
      function __construct()      
      {             
      // Call the Model constructor           
        parent::__construct();      
      }

      public function get_event_list()  
      {  
         $this->db->select('name');
         $this->db->select('date');
         $this->db->select('eventID');
         $this->db->from('event');
         $this->db->order_by("date asc");

         $query = $this->db->get();
         $result = $query->result();

         //array to store event
         $name = array('-SELECT-');
         $date = array('-SELECT-');
         for ($i = 0; $i < count($result); $i++)
         {
            array_push($name, $result[$i]->name);
         }
         //return $event_result = $name;
         return $result;
      }  

      public function add_specific_event($data)  
      {  
           //INSERT * INTO event
          $this->db->insert('event', $data);
      }  

      public function get_specific_event($eventID)  
      {  
           //SELECT * FROM event WHERE eventID = $eventID

           $this->db->select('*');
           $this->db->from('event');
           $this->db->where('eventID', $eventID);
           $query = $this->db->get();
           $row = $query->row();
           return $row;
      }  

      public function update_specific_event($id, $data)  
      {  
           //UPDATE * FROM event WHERE eventID = $id 
           $this->db->where('eventID', $id);
           $this->db->update('event', $data);
      }  
 }  
 ?>