<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
   public function login()
   {
      $data = array(
         'usuario' => $this->input->post('username'), 
         'clave' => $this->input->post('password')
      );

      $result = $this->db->select("*")
         ->from("usuario")
         ->where($data)
         ->limit(1)
         ->get();
      
      if($result->num_rows() == 1){
         $this->session->set_userdata('user',$result->row());
         return true;
      }else{
         $this->session->set_flashdata('error', 'Usuario o clave incorrectos');
         return false;
      }
   }

}
