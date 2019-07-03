<style>
   .showModal {}
</style>
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
                  <th scope="col">Menu principal</th>
                  <th scope="col">Fecha de creación</th>
                  <th scope="col">Ultima actualización</th>
                  <th scope="col">Acciones</th>
               </tr>
            </thead>
            <tbody>
               <tr v-for="content of contents">
                  <th scope="row" v-text="content.id_contenido"></th>
                  <td v-text="content.nombre"></td>
                  <td v-if="content.menu_principal == 1">Si</td>
                  <td v-else="content.menu_principal">No</td>
                  <td v-text="content.fecha_creacion"></td>
                  <td v-text="content.fecha_modificacion"></td>
                  <td><button @click="editContent(content)"><i class="fas fa-edit"></i></button></td>
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
               <div class="form-group">
                  <label for="main_menu">Es menu principal?</label>
                  <select id="main_menu" class="form-control" v-model="mainMenu">
                     <option value="0">No</option>
                     <option value="1">Si</option>
                  </select>
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




   <!-- Modal edit -->
   <div class="modal fade" id="modal-edit-content" tabindex="-1" role="dialog" aria-labelledby="editContent" aria-hidden="true" :class="{showModal: activeEditModal}">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="editContent">Editar contenido</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="activeEditModal = 0">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>Nombre del contenido</label>
                  <input class="form-control" placeholder="Ej: Preguntas frecuentes" v-model="nameContentEdit">
               </div>
               <div class="form-group">
                  <label for="main_menu">Es menu principal?</label>
                  <select id="main_menu" class="form-control" v-model="mainMenuEdit">
                     <option value="0">No</option>
                     <option value="1">Si</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="activeEditModal = 0">Cancelar</button>
               <button type="button" class="btn btn-info" @click="updateContent()">Guardar</button>
            </div>
         </div>
      </div>
   </div>
   <!-- end modal -->

</div>




<script src="<?= base_url('assets/js/contents.js') ?>"></script>