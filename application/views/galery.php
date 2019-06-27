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
               <?php for ($i = 1; $i <= 6; $i++) {
                  $image = base_url('assets/uploads/' . 'libro' . $i . '.jpg');
                  ?>
                  <div class="col-md-4 mt-3">
                     <div class="image-recent" style="background-image:url('<?= $image ?>')"></div>
                  </div>
               <?php } ?>
            </div>
            <br>
            <div class="text-right">
               <button class="btn btn-generic">Ver todas mis fotos</button>
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
                  <div class="image-recent" style="background-image:url('http://localhost/vue+ci/administrador_contenidos/assets/uploads/libro1.jpg')"></div>
               </div>
            </div>
            <br>
            <ul class="image-properties">
               <li class="dimentions mt-2"> <b> Fecha de carga: </b> 20-04-2019 </li>
               <li class="dimentions mt-2"> <b> Dimensiones: </b> 300 x 450 px </li>
               <li class="dimentions mt-2"> <b> Tamaño: </b> 202 KB </li>
               <li class="dimentions mt-2"> <b> Formato: </b> PNG </li>
            </ul>
         </div>
      </div>
   </div>
</div>


<script src="<?= base_url('assets/js/galery.js') ?>"></script>