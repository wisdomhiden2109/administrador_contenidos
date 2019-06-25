<style lang="">
   .sections ul li label {
      padding-top: 7px;
   }

   .sections ul li a {
      cursor: pointer;
      color: #fff !important;
   }

   .sections ul li a:hover {
      opacity: 0.8;
   }
</style>
<div class="row">
   <div class="col-12">
      <h2>Secciones</h2>
      <hr>
   </div>
   <div class="col">
      <a class="btn btn-info" href="<?= base_url('nueva-entrada/' . $activeContent) ?>"> Nueva entrada </a>
   </div>

   <div class="col-12 sections">
      <div class="card mt-4">
         <div class="card-header">
            Secciones creadas
         </div>
         <ul class="list-group list-group-flush">
            <?php foreach ($sections as $section) : ?>
               <li class="list-group-item">
                  <label><?= $section->nombre ?></label>
                  <div class="actions float-right">
                     <a class="btn btn-info" href="<?= base_url('editar-entrada/' . $section->id_seccion) ?>"><i class="fas fa-edit"></i> Ver detalle</a>
                     <a class="btn btn-info"><i class="fas fa-edit"></i> Eliminar</a>
                  </div>

               </li>
            <?php endforeach; ?>
         </ul>
      </div>
   </div>
</div>