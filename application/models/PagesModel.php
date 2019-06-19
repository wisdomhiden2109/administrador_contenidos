<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PagesModel extends CI_Model
{
   public function getSections($idContent)
   {
      $result = $this->db->select("*")
         ->from("seccion")
         ->where("id_contenido",$idContent)
         ->get()
         ->result();

      return $result;
   }

   public function getLayoutFields($idContent){
      $result = $this->db->select("p.nombre as plantilla, c.*, t.tipo as tipo_campo")
               ->from("plantilla p")
               ->join("campo c","c.id_plantilla = p.id_plantilla")
               ->join("tipo_campo t", "t.id_tipo = c.id_tipo")
               ->where("p.id_contenido",$idContent)
               ->get();
      
      if($result->num_rows() > 0){
         return $result->result();
      }else{
         redirect(base_url('contenido/'.$idContent));
      }
   }

}
