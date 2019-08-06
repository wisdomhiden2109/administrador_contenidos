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
         'content' => $this->structure->getDetailContent($idContent),
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
      $entry = $this->input->post("entry");
      $fields = array();
      $keys = array_keys($this->input->post());
      $i = 0;
      foreach ($this->input->post() as $field) {
         if($i > 0){
            $fields[] = array(
               'id' => $keys[$i],
               'value' => $field
            );
            $i++;
         }
         $i++;
      }

      $i=0;
      $filesKeys = array_keys($_FILES);
      foreach ($_FILES as $file ) {
         $file = Images::upload($filesKeys[$i]);
         if (!is_null($file)) {
            $fields[] = array(
               'id' => $filesKeys[$i],
               'value' => $file['file_name']
            );
         }
         $i++;
      }
      
      
      $this->pages->createEntry($idContent,$entry,$fields);
      redirect(base_url('contenido/'. $idContent));
   }

   public function updateEntry()
   {
      
      $idEntry  = $this->input->post("idEntry"); 
      $idContent = $this->input->post("idContent");
      $fields = array();
      $keys = array_keys($this->input->post());
      $i = 0;
      foreach ($this->input->post() as $field) {
         if ($i > 2) {
            $fields[] = array(
               'id' => $keys[$i],
               'value' => $field
            );
         }
         $i++;
      }

      $i = 0;
      $filesKeys = array_keys($_FILES);
      foreach ($_FILES as $file) {
         if(!empty($file['name'])){
            $fileUpload = Images::upload($filesKeys[$i]);
            if (!is_null($fileUpload)) {
               $fields[] = array(
                  'id' => $filesKeys[$i],
                  'value' => $fileUpload['file_name']
               );
            }
            $i++;
         }
      }


      $this->pages->updateEntry($idEntry, $fields);
      redirect(base_url('contenido/' . $idContent));
   }
   
   public function editEntry($idEntry){
      $section = $this->pages->getDetailSection($idEntry);
      $data = array(
         'contents' => $this->structure->getContents(),
         'activeEntry' => $idEntry,
         'section' => $section,
         'layoutFields' => $this->pages->getDetailEntry($idEntry,$section->id_contenido)
      );
      $this->load->view('layout/header', $data);
      $this->load->view('pages/editEntry', $data);
      $this->load->view('layout/footer');
   }

   public function deleteEntry(){
      $request = Axios::getRequest();
      $idEntry = $request->idEntry;
      echo json_encode($this->pages->deleteEntry($idEntry));
   }
}
