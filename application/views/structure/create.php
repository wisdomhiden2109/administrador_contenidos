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
      <h2><a href="<?= site_url('structure') ?>">Estructuras</a> - Crear</h2>
      <hr>
   </div>
   <div class="col">
      <button class="btn btn-info" data-toggle="modal" data-target="#create"> Agregar campo </button>
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
               <th scope="col">Tipo</th>
               <th scope="col">Acciones</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row">1</th>
               <td>Mark</td>
               <td>Otto</td>
               <td><a href="#"><i class="fas fa-edit"></i></a></td>
            </tr>
            <tr>
               <th scope="row">2</th>
               <td>Jacob</td>
               <td>Thornton</td>
               <td><a href="#"><i class="fas fa-edit"></i></a></td>
            </tr>
            <tr>
               <th scope="row">3</th>
               <td>Larry</td>
               <td>the Bird</td>
               <td><a href="#"><i class="fas fa-edit"></i></a></td>
            </tr>
         </tbody>
      </table>

      <br>
      <h6>Configuración general</h6>
      <hr>
      <ul class="list-group">
         <li class="list-group-item">Cras justo odio</li>
         <li class="list-group-item">Dapibus ac facilisis in</li>
         <li class="list-group-item">Morbi leo risus</li>
         <li class="list-group-item">Porta ac consectetur ac</li>
         <li class="list-group-item">Vestibulum at eros</li>
      </ul>

      <!-- Modal -->
      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
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
                     <label for="tipo_campo">Tipo de campo</label>
                     <select class="form-control" id="tipo_campo" v-model="typeField" @change="enableOptions()">
                        <?php foreach ($typeFields as $type) : ?>
                           <option value="<?= $type->id_tipo ?>"> <?= ucwords($type->nombre) ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>

                  <div class="form-group hidden" :class="{ active: activateOptions}">
                     <label for="tipo_campo">Escriba la opción y presiona <b>ENTER</b></label>
                     <input class="form-control" placeholder="Ej: gato" v-model="option" @keyup.enter='addOption()'>
                  </div>

                  <div class="row">
                     <div class="col-12">
                        <div class="options  mb-3" v-for="(option,index) in optionsCreate">
                           <span class="tag">{{ option }} <label class="close-tag" @click="removeOption(index)">x</label></span>
                        </div>
                     </div>
                  </div>


                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                     <label class="form-check-label" for="defaultCheck1">
                        Campo requerido?
                     </label>
                  </div>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Guardar</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end modal -->
   </div>
</div>