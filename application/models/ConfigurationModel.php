<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConfigurationModel extends CI_Model
{
   public function getConfiguration()
   {
      $query = $this->db->select("*")
         ->from("configuracion")
         ->get();

      if ($query->num_rows() > 0) {
         return $query->result();
      } else {
         return null;
      }
   }
}
