<?php 

Class Axios{

   static function getRequest(){
      return json_decode(file_get_contents("php://input"));
   }


   static function response($code,$message,$data = null)
   {
      return array(
         'code' => $code,
         'message' => $message,
         'data' => $data
      );
   }
}