<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Structure extends CI_Controller
{

   function __construct(){
      parent::__construct();
      $this->load->model( 'StructureModel','structure');
   }

   public function index()
   {

      $data = array(
         'configuration' => $this->configuration->getConfiguration(),
         'contents' => $this->structure->getContents(),
         'templates' => $this->structure->getTemplates()
      );
      $this->load->view('layout/header',$data);
      $this->load->view('structure/list',$data);
      $this->load->view('layout/footer');
   }

   public function contents()
   {
      $data = array(
         'configuration' => $this->configuration->getConfiguration(),
         'contents' => $this->structure->getContents(),
      );
      $this->load->view('layout/header',$data);
      $this->load->view('structure/contents', $data);
      $this->load->view('layout/footer');
   }


   public function create()
   {
      $data = array(
         'configuration' => $this->configuration->getConfiguration(),
         'contents' => $this->structure->getContents(),
         'typeFields' => $this->structure-> getTypeFields()
      );

      $this->load->view('layout/header',$data);
      $this->load->view('structure/create',$data);
      $this->load->view('layout/footer');
   }

   public function edit()
   {
      $data = array(
         'configuration' => $this->configuration->getConfiguration(),
         'contents' => $this->structure->getContents(),
         'typeFields' => $this->structure->getTypeFields()
      );

      $this->load->view('layout/header',$data);
      $this->load->view('structure/edit',$data);
      $this->load->view('layout/footer');
   }

   public function createField(){
     echo json_encode($this->structure->createField( Axios::getRequest()));
   }

   public function updateField(){
      echo json_encode($this->structure->updateField(Axios::getRequest()));
   }

   public function getFields($template){
      echo json_encode($this->structure-> getFields($template));
   }

   public function getContents(){
      echo json_encode($this->structure->getContents());
   }

   public function createStructure(){
      echo json_encode($this->structure->createStructure(Axios::getRequest()));
   }

   public function createContent(){
      echo json_encode($this->structure->createContent(Axios::getRequest()));
   }

   public function updateContent(){
      echo json_encode($this->structure-> updateContent(Axios::getRequest()));
   }

   /* Info de la plantilla y sus campos */
   public function getDataTemplate($idTemplate){
      echo json_encode($this->structure-> getDataTemplate($idTemplate));
   }
}
