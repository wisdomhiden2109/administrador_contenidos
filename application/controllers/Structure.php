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
      $this->load->view('layout/header');
      $this->load->view('structure/list');
      $this->load->view('layout/footer');
   }

   public function create()
   {
      $data = array(
         'typeFields' => $this->structure->getFields() 
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
}
