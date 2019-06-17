<style>
   .galery .content-image {
      max-width: 100%;
      height: 200px;
      cursor: pointer;
   }
</style>

<div class="row galery" id="galery">
   <div class="col-md-9">
      <div class="row">
         <div class="col-md-3 p-2 content-image">
            <form action="<?= base_url('galery/uploadFile') ?>" enctype="multipart/form-data" method="post"> 
               <input type="file" name="fileUpload">
               <button type="submit">Subir archivo</button>
            </form>
         </div>

         <?php for ($i = 0; $i < 10; $i++) { ?>
            <div class="col-md-3 p-2 content-image">
               <div class="image" style="width:100%; height:100%; background-image: url('http://postulaciones.premiosonline.co/assets/imgUser/83d6d629efa26d8b845b784e3fa5774d.jpeg');background-size: cover;background-position: center;background-repeat: no-repeat;">
                  <div class="delete-image">

                  </div>
               </div>
               <!--<img src="http://postulaciones.premiosonline.co/assets/imgUser/83d6d629efa26d8b845b784e3fa5774d.jpeg" alt="Imagen">-->
            </div>
         <?php } ?>
      </div>
   </div>
   <div class="col-md-3">
      <h4>Propiedades</h4>
      <hr />

   </div>
</div>