<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GaleryModel extends CI_Model
{
   public function uploadImage($data)
   {

      $fullPath = Images::upload('file'); 
      if(!is_null($fullPath)){
         return Axios::response(200, "Imagen cargada correctamente",$fullPath);
         //Images::resize($fullPath);
         //Images::crop($fullPath);
      }
      return Axios::response(201, "Error al intentar cargar la imagen");
   }
}
