<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

   public function uploadFile()
   {
      $fullPath = Images::upload($_FILES['fileUpload']); 
      if(!is_null($fullPath)){
         //Images::resize($fullPath);
         Images::crop($fullPath);
      }
   }
}
