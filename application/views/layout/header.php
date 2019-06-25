<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">
   <link rel="stylesheet" href="<?= base_url('assets/css/base.css') ?>">

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
   <!-- Vue CDN -->
   <script src="<?= base_url('assets/js/vue.js') ?>"></script>
   <script src="<?= base_url('assets/js/axios.js')  ?>"></script>
   
   <title>CI + VUE</title>
   <script>
      var baseUrl = "<?= base_url(); ?>";
   </script>
</head>

<body>
   <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
         <div class="sidebar-header">
            <h3>Bootstrap Sidebar</h3>
         </div>

         <ul class="list-unstyled components">
            <p>Korban</p>
            <li class="active">
               <a href="#homeContents" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contenidos</a>
               <ul class="collapse list-unstyled" id="homeContents">
                  <?php foreach ($contents as $content) : ?>
                     <li>
                        <a href="<?= base_url('contenido/' . $content->id_contenido) ?>"><?= ucwords($content->nombre) ?></a>
                     </li>
                  <?php endforeach; ?>
               </ul>
            </li>
            <li>
               <a href="<?= site_url('galeria') ?>">Galery</a>
            </li>
            <li>
               <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
               <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                     <a href="#">Page 1</a>
                  </li>
                  <li>
                     <a href="#">Page 2</a>
                  </li>
                  <li>
                     <a href="#">Page 3</a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="#">Portfolio</a>
            </li>
            <li>
               <a href="#">Contact</a>
            </li>
            <?php if($this->session->userdata('user')->rol == 'administrador'): ?>
            <li>
               <a href="#admin" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Administrador</a>
               <ul class="collapse list-unstyled" id="admin">
                  <li>
                     <a href="<?= base_url('contenidos') ?>">Contenidos</a>
                  </li>
                  <li>
                     <a href="<?= base_url('plantilla') ?>">Plantillas</a>
                  </li>
               </ul>
            </li>
            <?php endif; ?>
         </ul>

         <ul class="list-unstyled CTAs">
            <li>
               <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
            </li>
            <li>
               <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
            </li>
         </ul>
      </nav>

      <!-- Page Content  -->
      <div id="content">

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

               <button type="button" id="sidebarCollapse" class="btn btn-info">
                  <i class="fas fa-align-left"></i>
                  <span>Toggle Sidebar</span>
               </button>
               <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-align-justify"></i>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="nav navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Page</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">Salir</a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>