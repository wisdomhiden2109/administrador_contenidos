<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StructureModel extends CI_Model
{
   public function getTypeFields()
   {
      $result = $this->db->select("*")
                ->from("tipo_campo")
                ->get()
                ->result();
      
      return $result;
   }

   public function getContents()
   {
      $result = $this->db->select("*")
         ->from("contenido")
         ->get()
         ->result();

      return $result;
   }

   public function getTemplates()
   {
      $result = $this->db->select("p.*,c.nombre as pagina")
         ->from("plantilla p")
         ->join("contenido c","c.id_contenido = p.id_contenido","left")
         ->get()
         ->result();

      return $result;
   }

   public function createField($request){
 
      if($request->template == 0){
         $data = array(
            'nombre' => 'Sin nombre',
            'fecha_creacion' => date('Y-m-d')
         );
         $this->db->insert('plantilla',$data);
         $request->template = $this->db->insert_id();
      }


      $data = array(
         'nombre' => $request->nameField,
         'descripcion' => $request->descriptionField,
         'requerido' => ($request->requiredField) ? 1 : 0,
         'orden' => $request->orderField,
         'ancho' => $request->width,
         'alto' => $request->height,
         'opciones' => json_encode($request->optionsCreate),
         'id_plantilla' => $request->template,
         'id_tipo' => $request->typeField,
      );
      $this->db->insert('campo', $data);

      if($this->db->affected_rows() > 0){
         return Axios::response(200, "Campo agregado satisfactoriamente", $request->template);
      }else{
         return Axios::response(400,"Error al crear el campo");
      }
   }
   
   public function getFields($template){
      $result = $this->db->select("c.*,t.nombre as tipo")
         ->from("campo c")
         ->join("tipo_campo t", "t.id_tipo = c.id_tipo")
         ->where("c.id_plantilla", $template)
         ->order_by("c.orden","asc")
         ->get()
         ->result();

      return $result;
   }

   public function createStructure($request){
      if ($request->template == 0) {
         $data = array(
            'nombre' => 'Sin nombre',
            'fecha_creacion' => date('Y-m-d')
         );
         $this->db->insert('plantilla', $data);
         $request->template = $this->db->insert_id();
      }

      $data = array(
         'nombre' => $request->structureName,
         'fecha_modificacion' => date('Y-m-d'),
         'id_contenido' => $request->content,
      );

      $this->db->where('id_plantilla',$request->template);
      $this->db->update('plantilla',$data);

      if ($this->db->affected_rows() > 0) {
         return Axios::response(200, "Creado o actualizado satisfactoriamente", $request->template);
      } else {
         return Axios::response(400, "Error al crear la estructura");
      }
   }


   public function createContent($request)
   {
      $data = array(
         'nombre' => $request->nameContent,
         'url' => '/',
         'fecha_creacion' => date('Y-m-d')
      );
      $this->db->insert('contenido', $data);
      $content = $this->db->insert_id();

      $data = array(
         'nombre' => 'Sección principal',
         'id_contenido' => $content
      );
      $this->db->insert('seccion', $data);

      if ($this->db->affected_rows() > 0) {
         return Axios::response(200, "Se ha Creado el contenido con su sección principal satisfactoriamente");
      } else {
         return Axios::response(400, "Error al crear el contenido");
      }
   }

}
