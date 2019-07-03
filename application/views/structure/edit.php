<style lang="">
   .hidden {
      display: none;
   }

   .active {
      display: block;
   }

   .tag {
      background-color: teal;
      color: #fff;
      padding: 2px 11px;
      border-radius: 3px;
   }

   .close-tag {
      background: #fff;
      color: teal;
      width: 11px;
      height: 17px;
      font-size: 12px;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
      margin-left: 3px;
   }

   .options {
      float: left;
      margin: 5px;
   }
</style>

<div class="row" id="app">
   <div class="col-12">
      <h2><a href="<?= site_url('structure') ?>">Plantillas</a> - Editar</h2>
      <hr>
   </div>
   <div class="col">
      <button class="btn btn-info" data-toggle="modal" data-target="#modal-create"> Agregar campo </button>
   </div>

   <div class="col-12">
      <br>
      <h6>Campos asociados</h6>
      <hr>
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">Orden</th>
               <th scope="col">Nombre</th>
               <th scope="col">Descripción</th>
               <th scope="col">Tipo</th>
               <th scope="col">Obligatorio</th>
               <th scope="col">Acciones</th>
            </tr>
         </thead>
         <tbody>
            <tr v-for="field in fields">
               <th scope="row" v-text="field.orden"></th>
               <td v-text="field.nombre">Cargando</td>
               <td v-text="field.descripcion">Cargando</td>
               <td v-text="field.tipo">Cargando</td>
               <td v-if="field.requerido == 1">Si</td>
               <td v-else>No</td>
               <td><a @click="editField(field)"><i class="fas fa-edit"></i></a></td>
            </tr>
         </tbody>
      </table>

      <br>
      <h6>Configuración general</h6>
      <hr>

      <div class="form-group">
         <label>Nombre de la estructura</label>
         <input class="form-control" placeholder="Ej: Quienes somos" v-model="structureName">
      </div>

      <div class="form-group">
         <label for="content">Pagina asociada</label>
         <select class="form-control">
            <option :value="contentId" selected>{{ content  }}</option>
         </select>
      </div>

      <div class="form-group">
         <button class="btn btn-info" @click="createStructure()"> Guardar </button>
      </div>

      <!-- Modal create -->
      <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="createLabel">Nuevo campo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">

                  <div class="form-group">
                     <label>Nombre del campo</label>
                     <input class="form-control" placeholder="Ej: Título de la página" v-model="nameField">
                  </div>

                  <div class="form-group">
                     <label for="typeField">Tipo de campo</label>
                     <select class="form-control" id="typeField" v-model="typeField" @change="enableOptions()">
                        <?php foreach ($typeFields as $type) : ?>
                           <option value="<?= $type->id_tipo ?>"> <?= ucwords($type->nombre) ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>

                  <div class="form-group hidden" :class="{ active: activateOptions}">
                     <label>Escriba la opción y presiona <b>ENTER</b></label>
                     <input class="form-control" placeholder="Ej: gato" v-model="option" @keyup.enter='addOption()'>
                     <div class="row pt-2">
                        <div class="col-12">
                           <div class="options  mb-3" v-for="(option,index) in optionsCreate">
                              <span class="tag">{{ option }} <label class="close-tag" @click="removeOption(index)">x</label></span>
                           </div>
                        </div>
                     </div>
                  </div>



                  <div class="form-group hidden" :class="{ active: activateOptionsImage}">
                     <label>Escriba las dimensiones de la imagen (Ancho x Alto) PX</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input class="form-control" placeholder="100" v-model="width">
                        </div>

                        <div class="col-md-6">
                           <input class="form-control" placeholder="100" v-model="height">
                        </div>
                     </div>
                  </div>

                  <div class="mb-3">
                     <label for="fieldDescription">Textarea</label>
                     <textarea class="form-control" placeholder="Descripción que le aparecerá al cliente" id="fieldDescription" v-model="descriptionField"></textarea>
                  </div>

                  <div class="form-group">
                     <label>Orden del campo</label>
                     <input class="form-control" type="number" min="0" v-model="orderField">
                  </div>

                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="fieldRequired" v-model="requiredField">
                     <label class="form-check-label" for="fieldRequired">
                        Campo requerido?
                     </label>
                  </div>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-info" @click="createField()">Guardar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end modal -->


      <!--Modal edit -->
      <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true" :class="{showModal: activeEditModal}">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="editLabel">Nuevo campo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="activeEditModal = false; resetFormField()">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">

                  <div class="form-group">
                     <label>Nombre del campo</label>
                     <input class="form-control" placeholder="Ej: Título de la página" v-model="nameField">
                  </div>

                  <div class="form-group">
                     <label for="typeField">Tipo de campo</label>
                     <select class="form-control" id="typeField" v-model="typeField" @change="enableOptions()">
                        <?php foreach ($typeFields as $type) : ?>
                           <option value="<?= $type->id_tipo ?>"> <?= ucwords($type->nombre) ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>

                  <div class="form-group hidden" :class="{ active: activateOptions}">
                     <label>Escriba la opción y presiona <b>ENTER</b></label>
                     <input class="form-control" placeholder="Ej: gato" v-model="option" @keyup.enter='addOption()'>
                     <div class="row pt-2">
                        <div class="col-12">
                           <div class="options  mb-3" v-for="(option,index) in optionsCreate">
                              <span class="tag">{{ option }} <label class="close-tag" @click="removeOption(index)">x</label></span>
                           </div>
                        </div>
                     </div>
                  </div>



                  <div class="form-group hidden" :class="{ active: activateOptionsImage}">
                     <label>Escriba las dimensiones de la imagen (Ancho x Alto) PX</label>
                     <div class="row">
                        <div class="col-md-6">
                           <input class="form-control" placeholder="100" v-model="width">
                        </div>

                        <div class="col-md-6">
                           <input class="form-control" placeholder="100" v-model="height">
                        </div>
                     </div>
                  </div>

                  <div class="mb-3">
                     <label for="fieldDescription">Textarea</label>
                     <textarea class="form-control" placeholder="Descripción que le aparecerá al cliente" id="fieldDescription" v-model="descriptionField"></textarea>
                  </div>

                  <div class="form-group">
                     <label>Orden del campo</label>
                     <input class="form-control" type="number" min="0" v-model="orderField">
                  </div>

                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="fieldRequired" v-model="requiredField">
                     <label class="form-check-label" for="fieldRequired">
                        Campo requerido?
                     </label>
                  </div>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="activeEditModal = false; resetFormField()">Cancelar</button>
                  <button type="button" class="btn btn-info" @click="updateField()">Guardar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- End modal -->
   </div>
</div>

<script src="<?= base_url('assets/js/fields/edit.js') ?>"></script>