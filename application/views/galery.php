<style>
   .galery .content-image {
      max-width: 100%;
      height: 200px;
      cursor: pointer;
   }

   .galery .content-image .image-upload>input {
      display: none;
   }

   .galery .content-image .image-upload img {
      width: 100%;
      cursor: pointer;
   }

   .galery-images,
   .galery-description {
      height: 480px;
      -webkit-box-shadow: 0px 0px 5px -2px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 0px 0px 5px -2px rgba(0, 0, 0, 0.75);
      box-shadow: 0px 0px 5px -2px rgba(0, 0, 0, 0.75);
   }

   .galery-images .image-recent,
   .galery-description .image-recent {
      width: 100%;
      height: 130px;
      background-position: center;
      background-size: cover;
      border: solid 1px lightgray;
      border-radius: 5px;
      cursor: pointer;
   }

   .image-properties {
      list-style: none;
   }

   .loading {
      position: absolute;
      width: 95%;
      height: 100%;
      top: 0;
      background: #fff;
      opacity: 0.9;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      visibility: hidden;
   }

   /*Modal galery*/
   .content-image-modal-galery .image-galery {
      width: 100%;
      height: 130px;
      background-position: center;
      background-size: cover;
      border: solid 1px lightgray;
      border-radius: 5px;
      cursor: pointer;
   }
</style>


<div class="container-fluid galery" id="galery">
   <h2>Galeria</h2>
   <hr>
   <div class="row justify-content-sm-center content-image">
      <div class="col-sm-6 col-md-5 col-lg-3">
         <div class="image-upload">
            <label for="file-input">
               <img :src="'<?= base_url() ?>'+backgroundUpload" alt="Click aquí para subir un archivo" title="Click aquí para subir un archivo">
            </label>
            <input id="file-input" type="file" @change="onFileChanged(this)" />
            <div v-bind:class="[{ show: uploadFile }, classLoading]">
               <h4>Subiendo imagen</h4>
               <div class="spinners">
                  <div class="spinner-grow text-info" role="status">
                     <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-info" role="status">
                     <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-info" role="status">
                     <span class="sr-only">Loading...</span>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   <br>
   <div class="row mt-4">
      <div class="col-sm-6 ">
         <div class="col galery-images">
            <h3 class="text-center pt-4">Fotos recientes</h3>
            <hr class="border-generic">
            <div class="row">
               <div class="col-md-4 mt-3" v-for="file in lastFiles.data">
                  <div class="image-recent" v-bind:style="{ 'background-image': 'url(' + backgroundImage(file) + ')' }" @click="loadProperties(file)"></div>
               </div>
            </div>
            <br>
            <div class=" text-right">
               <button class="btn btn-generic" data-toggle="modal" data-target="#modal-galery" @click="openGalery()">Ver todas mis fotos</button>
            </div>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="col galery-description">
            <h3 class="text-center pt-4">Información</h3>
            <hr class="border-generic">
            <br>
            <div class="row justify-content-center">
               <div class="col-4">
                  <div class="image-recent" v-bind:style="{ 'background-image': 'url(' + backgroundImage(previewImage) + ')' }"></div>
               </div>
            </div>
            <br>
            <ul class="image-properties">
               <li class="dimentions mt-2"> <b> Fecha de carga: </b> {{ previewImage.fecha_carga }} </li>
               <li class="dimentions mt-2"> <b> Dimensiones: </b> {{ previewImage.dimensiones }} </li>
               <li class="dimentions mt-2"> <b> Tamaño: </b> {{ previewImage.peso }} </li>
               <li class="dimentions mt-2"> <b> Formato: </b> {{ previewImage.formato }} </li>
            </ul>
         </div>
      </div>
   </div>

   <!-- modal galery -->
   <div class="modal fade" id="modal-galery" tabindex="-1" role="dialog" aria-labelledby="modal-galery-title" aria-hidden="true" :class="{showModal: activeModalGalery}">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modal-galery-title">Galeria</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="activeModalGalery = false;">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-3 mt-3 content-image-modal-galery" v-for="file in files.data">
                     <div class="image-galery" v-bind:style="{ 'background-image': 'url(' + backgroundImage(file) + ')' }" @click="loadProperties(file)"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="activeModalGalery = false;">Cerrar galeria</button>
            </div>
         </div>
      </div>
   </div>
   <!-- end modal galery -->
</div>


<script src="<?= base_url('assets/js/galery.js') ?>"></script>