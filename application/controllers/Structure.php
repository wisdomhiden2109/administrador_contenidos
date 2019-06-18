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
         'templates' => $this->structure->getTemplates()
      );
      $this->load->view('layout/header');
      $this->load->view('structure/list',$data);
      $this->load->view('layout/footer');
   }

   public function create()
   {
      $data = array(
         'contents' => $this->structure->getContents(),
         'typeFields' => $this->structure->getTypeFields()
      );

      $this->load->view('layout/header');
      $this->load->view('structure/create',$data);
      $this->load->view('layout/footer');
   }

   public function edit()
   {
      $this->load->view('layout/header');
      $this->load->view('structure/edit');
      $this->load->view('layout/footer');
   }

   public function createField(){
     echo json_encode($this->structure->createField( Axios::getRequest()));
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
}
