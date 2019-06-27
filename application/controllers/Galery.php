<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->model('GaleryModel', 'galery');
   }

   public function uploadFile()
   {
      echo json_encode($this->galery->uploadImage($_FILES));
   }

   public function getLastFiles()
   {
      echo json_encode($this->galery->getLastFiles());
   }
}
