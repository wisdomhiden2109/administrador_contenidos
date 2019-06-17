<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StructureModel extends CI_Model
{
   public function getFields()
   {
      $result = $this->db->select("*")
                ->from("tipo_campo")
                ->get()
                ->result();
      
      return $result;
   }
}
