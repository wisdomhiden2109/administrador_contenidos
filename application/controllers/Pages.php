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
         'activeContent' => $idContent,
         'sections' => $this->pages->getSections($idContent)
      );
      $this->load->view('layout/header', $data);
      $this->load->view('pages/list', $data);
      $this->load->view('layout/footer');
   }


   public function newEntry($idContent)
   {
      $data = array(
         'contents' => $this->structure->getContents(),
         'activeContent' => $idContent,
         'layoutFields' => $this->pages->getLayoutFields($idContent)
      );
      $this->load->view('layout/header', $data);
      $this->load->view('pages/newEntry', $data);
      $this->load->view('layout/footer');
   }

   public function createEntry($idContent)
   {
      $fields = array();
      $keys = array_keys($this->input->post());
      $i = 0;
      foreach ($this->input->post() as $field) {
         $fields[] = array(
            'id' => $keys[$i],
            'value' => $field
         );
         $i++;
      }

      $i=0;
      $filesKeys = array_keys($_FILES);
      foreach ($_FILES as $file ) {
         $fields[] = array(
            'id' => $filesKeys[$i],
            'value' => $file['name']
         );
         $i++;
      }
      
      
      $this->pages->createEntry($idContent,$fields);
      print_r($this->input->post());
      print_r($_FILES);

   }

   
}
