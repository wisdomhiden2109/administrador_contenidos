
<?php 

Class Images {

   public static function resize($fullPath){

      $CI = &get_instance();
      $CI->load->library('image_lib');
      $config['image_library'] = 'gd2';
      $config['source_image'] = $fullPath;
      $config['new_image'] = 'assets/uploads/';
      $config['maintain_ratio'] = FALSE;
      $config['create_thumb'] = FALSE;
      $config['width'] = 400;
      $config['height'] = 400;
 
      $CI->image_lib->initialize($config);

      if (!$CI->image_lib->resize()) {
         echo $CI->image_lib->display_errors('', '');
      }

      $CI->image_lib->clear();

      return true;
   }


   public static function crop($fullPath)
   {

      $CI = &get_instance();
      $CI->load->library('image_lib');
      $config['image_library'] = 'gd2';
      $config['source_image'] = $fullPath;
      $config['x_axis'] = '10';
      $config['y_axis'] = '10';
      $config['maintain_ratio'] = FALSE;
      $config['width'] = 500;
      $config['height'] = 500;

      $CI->image_lib->initialize($config);

      if (!$CI->image_lib->crop()) {
         echo $CI->image_lib->display_errors('', '');
      }

      return true;
   }


   public static function upload($fileName)
   {
      $config['upload_path']          = './assets/uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1500;
      $config['max_width']            = 1524;
      $config['max_height']           = 1000;

      $CI = &get_instance();
      $CI->upload->initialize($config);

      if (!$CI->upload->do_upload($fileName)) {
         $error = array('error' => $CI->upload->display_errors());
         print_r($error);
         return null;
      }

      return $CI->upload->data();
   }
}
