<div class="row">
   <div class="col-12">
      <h2>Estructuras</h2>
      <hr>
   </div>
   <div class="col">
      <a class="btn btn-info" href="<?= site_url('structure/create') ?>"> Nueva </a>
   </div>

   <div class="col-12">
      <br>
      <h6>Listado de estructuras</h6>
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                  <th scope="col">Acciones</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td><a href="<?= site_url('structure/edit') ?>"><i class="fas fa-edit"></i></a></td>
               </tr>
               <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                  <td><a href="<?= site_url('structure/edit') ?>"><i class="fas fa-edit"></i></a></td>
               </tr>
               <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                  <td><a href="<?= site_url('structure/edit') ?>"><i class="fas fa-edit"></i></a></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>