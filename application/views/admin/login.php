<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">

   <title>CI + VUE</title>
</head>

<body>

   <div class="container">
      <div class="d-flex justify-content-center h-100">
         <div class="card">
            <div class="card-header">
               <h3>Sign In</h3>
               <div class="d-flex justify-content-end social_icon">
                  <span><i class="fab fa-facebook-square"></i></span>
                  <span><i class="fab fa-google-plus-square"></i></span>
                  <span><i class="fab fa-twitter-square"></i></span>
               </div>
            </div>
            <div class="card-body">
               <form>
                  <div class="input-group form-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                     </div>
                     <input type="text" class="form-control" placeholder="username">

                  </div>
                  <div class="input-group form-group">
                     <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                     </div>
                     <input type="password" class="form-control" placeholder="password">
                  </div>
                  <div class="row align-items-center remember">
                     <input type="checkbox">Remember Me
                  </div>
                  <div class="form-group">
                     <input type="submit" value="Login" class="btn float-right login_btn">
                  </div>
               </form>
            </div>
            <div class="card-footer">
               <div class="d-flex justify-content-center links">
                  Don't have an account?<a href="#">Sign Up</a>
               </div>
               <div class="d-flex justify-content-center">
                  <a href="#">Forgot your password?</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
   <!-- Vue CDN -->
   <script src="<?= base_url('assets/js/vue.js') ?>"></script>

</body>

</html>