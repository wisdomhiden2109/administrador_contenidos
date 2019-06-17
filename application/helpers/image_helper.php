
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


   public static function upload()
   {
      $config['upload_path']          = './assets/uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1000;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $CI = &get_instance();
      $CI->upload->initialize($config);

      if (!$CI->upload->do_upload('fileUpload')) {
         //$error = array('error' => $CI->upload->display_errors());
         return null;
      }

      return $CI->upload->data()['full_path'];
   }
}
