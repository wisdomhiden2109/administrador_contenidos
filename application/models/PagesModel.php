<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PagesModel extends CI_Model
{
   /** obtenemos las secciones o entradas de un contenido */
   public function getSections($idContent)
   {
      $result = $this->db->select("*")
         ->from("seccion")
         ->where("id_contenido",$idContent)
         ->get()
         ->result();

      return $result;
   }

   /** Obetenemos los campos de una plantilla */
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

   /* creamos una entrada */
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

   /* actualizamos una entrada */
   public function updateEntry($idEntry, $fields)
   {
      foreach ($fields as $field) {
         $dataField[] = array(
            'id_campo' => $field['id'],
            'valor' => $field['value']
         );

         $existField = $this->db->select("*")
                     ->from("detalle_seccion")
                     ->where("id_seccion",$idEntry)
                     ->where("id_campo", $field['id'])
                     ->limit(1)
                     ->get();
         if($existField->num_rows() == 0){
            $insertField = array(
               'id_seccion' => $idEntry,
               'id_campo' => $field['id'],
               'valor' => $field['value']
            );
            $this->db->insert("detalle_seccion", $insertField);   
         }
      }

      $this->db->where("id_seccion",$idEntry);
      $this->db->update_batch('detalle_seccion', $dataField, 'id_campo');

      if ($this->db->affected_rows() > 0) {
         return true;
      } else {
         return false;
      }
   }

   public function deleteEntry($idEntry){
      $this->db->delete('detalle_seccion', array('id_seccion' => $idEntry));
      if($this->db->affected_rows() > 0){
         $this->db->delete('seccion', array('id_seccion' => $idEntry));
         if ($this->db->affected_rows() > 0) {
            return Axios::response(200, "Entrada eliminada con exito");
         }
      }else{
         return Axios::response(201, "Error al intentar eliminar la entrada");
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

   //Obtenemos el detalle para editar una entrada
   public function getDetailEntry($idEntry, $idContent){

      //obtenemos todos los campos de la plantilla
      $fields =  $this->db->select("c.*,t.tipo as tipo_campo")
               ->from("campo c")
               ->join("tipo_campo t", "t.id_tipo = c.id_tipo")
               ->join("plantilla p","p.id_plantilla = c.id_plantilla")
               ->where("p.id_contenido",$idContent)
               ->order_by("c.orden")
               ->get();

      if ($fields->num_rows() > 0) {
         foreach ($fields->result() as $field) {
            //obtenemos el valor del campo
            $value = $this->db->select("ds.valor")
               ->from("detalle_seccion ds")
               ->where("ds.id_seccion", $idEntry)
               ->where("ds.id_campo", $field->id_campo)
               ->limit(1)
               ->get();

            $field->valor = ($value->num_rows() == 1)? $value->row()->valor : '';

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
         return $fields->result();
      } else {
         redirect(base_url(''));
      }
   }
}
