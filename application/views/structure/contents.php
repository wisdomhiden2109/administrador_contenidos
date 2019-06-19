<div class="row" id="app">
   <div class="col-12">
      <h2>Contenidos</h2>
      <hr>
   </div>
   <div class="col">
      <button class="btn btn-info" data-toggle="modal" data-target="#modal-create-content"> Nuevo contenido </button>
   </div>

   <div class="col-12">
      <br>
      <h6>Listado de contenidos</h6>
      <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Fecha de creación</th>
                  <th scope="col">Ultima actualización</th>
                  <th scope="col">Acciones</th>
               </tr>
            </thead>
            <tbody>
               <tr v-for="content of contents">
                  <th scope="row" v-text="content.id_contenido"></th>
                  <td v-text="content.nombre"></td>
                  <td v-text="content.fecha_creacion"></td>
                  <td v-text="content.fecha_modificacion"></td>
                  <td><a href=""><i class="fas fa-edit"></i></a></td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="modal-create-content" tabindex="-1" role="dialog" aria-labelledby="createContent" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="createContent">Nuevo contenido</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>Nombre del contenido</label>
                  <input class="form-control" placeholder="Ej: Preguntas frecuentes" v-model="nameContent">
               </div>

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
               <button type="button" class="btn btn-info" @click="createContent()">Guardar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- end modal -->

</div>




<script src="<?= base_url('assets/js/contents.js') ?>"></script>