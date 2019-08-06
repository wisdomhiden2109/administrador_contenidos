<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Configuration extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->model('ConfigurationModel', 'configuration');
   }

  public function updatePassword(){
      $this->configuration->updatePassword();
      redirect(base_url('configuracion'));
  }

   public function updateNotificationsEmail()
   {
      $this->configuration->updateNotificationsEmail();
      redirect(base_url('configuracion'));
   }


   public function updateSocialMedia()
   {
      $this->configuration->updateSocialMedia();
      redirect(base_url('configuracion'));
   }

   public function updateLogo(){
      $this->configuration->updateLogo();
      redirect(base_url('configuracion'));
   }
   
}
