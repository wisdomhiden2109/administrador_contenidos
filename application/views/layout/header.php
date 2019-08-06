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
               <a href="#homeContents" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <i class="fas fa-file-contract icon-menu"></i>
                  Contenidos
               </a>
               <ul class="collapse list-unstyled" id="homeContents">
                  <?php foreach ($contents as $content) : ?>
                     <li>
                        <a href="<?= base_url('contenido/' . $content->id_contenido) ?>"><?= ucwords($content->nombre) ?></a>
                     </li>
                  <?php endforeach; ?>
               </ul>
            </li>
            <li>
               <a href="<?= base_url('galeria') ?>">
                  <i class="fas fa-photo-video icon-menu"></i>
                  Galeria
               </a>
            </li>
            <li>
               <a href="<?= base_url('contactos') ?>">
                  <i class="fas fa-envelope-open icon-menu"></i>
                  Contactos web
               </a>
            </li>
            <li>
               <a href="<?= base_url('configuracion') ?>">
                  <i class="fas fa-cogs icon-menu"></i>
                  Configuración
               </a>
            </li>

            <li>
               <a href="<?= base_url('auth/logout') ?>">
                  <i class="fas fa-power-off icon-menu"></i>
                  Cerrar sesión
               </a>
            </li>



            <?php if ($this->session->userdata('user')->rol == 'administrador') : ?>
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
      </nav>

      <!-- Page Content  -->
      <div id="content">

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

               <button type="button" id="sidebarCollapse" class="btn btn-generic">
                  <i class="fas fa-align-left"></i>
               </button>
               <div class="welcome">Bienvenido, fulanito</div>
               <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-align-justify"></i>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="nav navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link popover-generic" href="<?= site_url('contactos') ?>" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Revisa los mensajes que has recibido por parte de tus clientes.">
                           <i class="fas fa-envelope-open icon-generic tooltip-generic"></i>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link popover-generic" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Notificaciones en tiempo real, actualización y ajustes generales de KORBAN.">
                           <i class="fas fa-bell icon-generic"></i>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link popover-generic" href="#" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Configuración general.">
                           <i class="fas fa-cog icon-generic"></i>
                        </a>
                     </li>
                     <li class="nav-item border-left">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">salir <i class="fas fa-sign-out-alt icon-generic"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>