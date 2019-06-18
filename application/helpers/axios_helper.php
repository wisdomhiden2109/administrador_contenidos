<?php 

Class Axios{

   static function getRequest(){
      return json_decode(file_get_contents("php://input"));
   }


   static function response($code,$error,$data = null)
   {
      return array(
         'code' => $code,
         'message' => $error,
         'data' => $data
      );
   }
}