<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConfigurationModel extends CI_Model
{
   public function getUser()
   {
      $query = $this->db->select("*")
         ->from("usuario")
         ->where("rol","cliente")
         ->limit(1)
         ->get();

      if ($query->num_rows() > 0) {
         return $query->row();
      } else {
         return null;
      }
   }

   public function getConfiguration()
   {
      $query = $this->db->select("*")
         ->from("configuracion")
         ->limit(1)
         ->get();

      if ($query->num_rows() > 0) {
         return $query->row();
      } else {
         return null;
      }
   }

   public function updatePassword(){
      $user = $this->input->post("email");
      $password = $this->input->post("password");

      $this->db->where("usuario", $user);
      $this->db->update("usuario",array("clave" => $password));
   }

   public function updateNotificationsEmail()
   {
      $email = $this->input->post("notifications_email");
      $this->db->update("configuracion", array("correo_notificaciones" => $email));
   }

   public function updateSocialMedia()
   {
      $data = array(
         'facebook' => $this->input->post('facebook'),
         'instagram' => $this->input->post('instagram'),
         'twitter' => $this->input->post('twitter'),
         'google_plus' => $this->input->post('google_plus'),
         'youtube' => $this->input->post('youtube'),
         'linkedin' => $this->input->post('linkedin'),
         'whatsapp' => $this->input->post('whatsapp'),
         'pinterest' => $this->input->post('pinterest')
      );

      $this->db->update("configuracion", $data);
   }

   public function updateLogo(){
      $file = Images::upload('logo');
      if (!is_null($file)) {
         $data = array(
            'logo' => $file['file_name']
         );
         $this->db->update("configuracion", $data);
      }
   }
}
