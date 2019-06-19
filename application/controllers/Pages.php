<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->model('StructureModel', 'structure');
      $this->load->model('PagesModel', 'pages');
   }

   public function index($idContent)
   {

      $data = array(
         'contents' => $this->structure->getContents(),
         'activecontent' => $idContent,
         'sections' => $this->pages->getSections($idContent)
      );
      $this->load->view('layout/header', $data);
      $this->load->view('pages/list', $data);
      $this->load->view('layout/footer');
   }


   public function createSection($idContent)
   {

      $data = array(
         'contents' => $this->structure->getContents(),
         'activecontent' => $idContent,
         'layoutFields' => $this->pages->getLayoutFields($idContent)
      );
      $this->load->view('layout/header', $data);
      $this->load->view('pages/newSection', $data);
      $this->load->view('layout/footer');
   }

   
}
