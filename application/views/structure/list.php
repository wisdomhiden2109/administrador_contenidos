<div class="row">
   <div class="col-12">
      <h2>Plantillas</h2>
      <hr>
   </div>
   <div class="col">
      <a class="btn btn-info" href="<?= site_url('structure/create') ?>"> Nueva </a>
   </div>

   <div class="col-12">
      <br>
      <h6>Listado de plantillas</h6>
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Fecha de creación</th>
                  <th scope="col">Ultima actualización</th>
                  <th scope="col">Página asociada</th>
                  <th scope="col">Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($templates as $template) : ?>
                  <tr>
                     <th scope="row"><?= $template->id_plantilla ?></th>
                     <td><?= $template->nombre ?></td>
                     <td><?= $template->fecha_creacion ?></td>
                     <td><?= $template->fecha_modificacion ?></td>
                     <td><?= ($template->pagina == '') ? 'Ninguna' : $template->pagina; ?></td>
                     <td><a href="<?= site_url('structure/edit') ?>"><i class="fas fa-edit"></i></a></td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>