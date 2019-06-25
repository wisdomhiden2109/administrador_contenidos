<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->model('AuthModel', 'auth');
   }

   public function showLogin(){
      if($this->session->userdata('user')){
         redirect('korban');
      }else{
         $this->load->view('admin/login');
      }
   }

   public function login()
   {
      if($this->auth->login()){
         redirect(base_url('korban'));
      }else{
         redirect(base_url());
      }
   }

   public function logout(){
      $this->session->sess_destroy();
      redirect(base_url());
   }
}
