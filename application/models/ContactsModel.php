<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactsModel extends CI_Model
{
   public function getContacts()
   {
      $query = $this->db->select("*")
                  ->from("contactos")
                  ->get();  
      
      if($query->num_rows() > 0){
         return $query->result();  
      }else{
         return null;
      }
   }
}
