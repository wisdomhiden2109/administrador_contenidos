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
               ->order_by("c.orden", 'ASC')
               ->get();
      
      if($result->num_rows() > 0){
         foreach ($result->result() as $field) {
            if($field->contenido_asociado != 0){
               $optionsField = array();
               $options = $this->db->select("s.nombre")
                        ->from("contenido c")
                        ->join("seccion s","s.id_contenido = c.id_contenido")
                        ->where("c.id_contenido",$field->contenido_asociado)
                        ->get();

               foreach ($options->result() as $option ) {
                  $optionsField[] = $option->nombre;
               }
               $field->opciones = json_encode($optionsField);
            }
         }
         return $result->result();
      }else{
         redirect(base_url('contenido/'.$idContent));
      }
   }

   public function createEntry($idContent,$entry,$fields){

      $data = array(
         'nombre' => $entry,
         'id_contenido' => $idContent
      );

      
      $this->db->insert('seccion', $data);
      $id = $this->db->insert_id();

 
      if ($this->db->affected_rows() > 0) {

         foreach ($fields as $field) {
            $dataField[] = array(
               'id_seccion' => $id,
               'id_campo' => $field['id'],
               'valor' => json_encode($field['value'], JSON_UNESCAPED_UNICODE)
            );
         }
   
         $this->db->insert_batch('detalle_seccion', $dataField);
         
         if( $this->db->affected_rows() > 0){
            return true;
         }else{
            return false;
         }
      }
   }


   public function updateEntry($idEntry, $fields)
   {

      foreach ($fields as $field) {
         $dataField[] = array(
            'id_campo' => $field['id'],
            'valor' => json_encode($field['value'], JSON_UNESCAPED_UNICODE)
         );
      }

      $this->db->where("id_seccion",$idEntry);
      $this->db->update_batch('detalle_seccion', $dataField, 'id_campo');

      if ($this->db->affected_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function getDetailSection($idEntry){
      $result = $this->db->select("*")
         ->from("seccion s")
         ->where("s.id_seccion", $idEntry)
         ->get();
      if ($result->num_rows() > 0) {
         return $result->row();
      } else {
         redirect(base_url(''));
      }
   }

   public function getDetailEntry( $idEntry){
      $result = $this->db->select("ds.valor, c.*, t.tipo as tipo_campo")
         ->from("campo c")
         ->join("detalle_seccion ds", "c.id_campo = ds.id_campo","left")
         ->join("tipo_campo t", "t.id_tipo = c.id_tipo")
         ->where("ds.id_seccion", $idEntry)
         ->order_by("c.orden", 'ASC')
         ->get();
      if ($result->num_rows() > 0) {
         foreach ($result->result() as $field) {
            if ($field->contenido_asociado != 0) {
               $optionsField = array();
               $options = $this->db->select("s.nombre")
                  ->from("contenido c")
                  ->join("seccion s", "s.id_contenido = c.id_contenido")
                  ->where("c.id_contenido", $field->contenido_asociado)
                  ->get();

               foreach ($options->result() as $option) {
                  $optionsField[] = $option->nombre;
               }
               $field->opciones = json_encode($optionsField);
            }
         }
         return $result->result();
      } else {
         redirect(base_url(''));
      }
   }
}
