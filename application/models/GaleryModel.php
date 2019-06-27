<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleryModel extends CI_Model
{
   public function uploadImage($data)
   {

      $file = Images::upload('file'); 
      if(!is_null( $file)){
         $data = array(
            "nombre" => $file['file_name'],
            "formato" => $file['file_type'],
            "peso" => $file['file_size'],
            "dimensiones" => $file['image_width'].' X '. $file[ 'image_height'],
            "fecha_carga" => date('y-m-d')
         );
         $this->db->insert("galeria",$data);
         if( $this->db->affected_rows() > 0){
            return Axios::response(200, "Imagen cargada correctamente", $file['file_name']);
         }else{
            return Axios::response(202, "Error al guardar imagen", $file['file_name']);
         }
         //Images::resize($fullPath);
         //Images::crop($fullPath);
      }
      return Axios::response(201, "Error al intentar cargar la imagen");
   }

   public function getLastFiles(){
      $this->db->select("*");
      $this->db->from("galeria");
      $this->db->order_by("id_archivo","DESC");
      $this->db->limit(6);
      $result = $this->db->get();

      if( $result->num_rows() > 0){
         return Axios::response(200, "OK", $result->result());
      }else{
         return Axios::response(201, "0 records");
      }
   }
}
