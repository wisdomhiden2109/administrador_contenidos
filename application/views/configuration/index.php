<div class="container-fluid configuration" id="configuration">
   <h2>Configuración</h2>
   <hr>
   <p>Administra tu cuenta, configura donde recibiras tus correos electrónicos y gestiona tus redes sociales</p>
   <div class="row">
      <div class="col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Información de tu cuenta</h5>
               <form action="<?= site_url('configuration/updatePassword') ?>" method="post">
                  <div class="form-group">
                     <label for="email">Usuario</label>
                     <input type="email" name="email" class="form-control" id="email" placeholder="Ejemplo@korban.co" value="<?= (isset($user->usuario)) ? $user->usuario : '' ?>" readonly>
                     <small>Correo electrónico generado por el administrador.</small>
                  </div>
                  <div class="form-group">
                     <label for="password">Contraseña</label>
                     <input type="password" name="password" class="form-control" id="password" placeholder="************">
                     <small>No compartiremos tu contraseña con nadie mas.</small>
                  </div>
                  <button type="submit" class="btn btn-generic">Actualizar</button>
               </form>

            </div>
         </div>
         <br>
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Configuración de correos</h5>
               <form action="<?= site_url('configuration/updateNotificationsEmail') ?>" method="post">
                  <div class="form-group">
                     <label for="notifications_email">Correo electrónico donde llegaran los mensajes de tus clientes</label>
                     <input type="notifications_email" name="notifications_email" class="form-control" id="notifications_email" placeholder="Ejemplo@tuweb.com" value="<?= (isset($configuration->correo_notificaciones)) ? $configuration->correo_notificaciones : '' ?>">
                     <small>No compartiremos tu contraseña con nadie mas.</small>
                  </div>
                  <button type="submit" class="btn btn-generic">Actualizar</button>
               </form>
            </div>
         </div>
      </div>
      <div class="col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">Redes sociales</h5>
               <p class="card-text">Gestiona las redes sociales que veran tus clientes potenciales.</p>
               <form action="<?= site_url('configuration/updateSocialMedia') ?>" method="post">
                  <div class="form-row">
                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-facebook-square" style="color:#3b5998; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="facebook" placeholder="http://facebook.com/korban" value="<?= (isset($configuration->facebook))? $configuration->facebook : '' ?>" name="facebook">
                        </div>
                     </div>
                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-instagram" style="color:#125688; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="instagram" placeholder="http://instagram.com/korban" value="<?= (isset($configuration->instagram))? $configuration->instagram : '' ?>" name="instagram">
                        </div>
                     </div>
                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-twitter-square" style="color:#55acee; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="twitter" placeholder="http://twitter.com/korban" value="<?= (isset($configuration->twitter))? $configuration->twitter : '' ?>" name="twitter">
                        </div>
                     </div>

                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-google-plus-square" style="color:#dd4b39; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="google_plus" placeholder="http://google_plus.com/korban" value="<?= (isset($configuration->google_plus))? $configuration->google_plus : '' ?>" name="google_plus">
                        </div>
                     </div>

                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-youtube-square" style="color:#bb0000; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="youtube" placeholder="http://youtube.com/korban" value="<?= (isset($configuration->youtube))? $configuration->youtube : '' ?>" name="youtube">
                        </div>
                     </div>

                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-linkedin" style="color:#007bb5; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="linkedin" placeholder="http://linkedin.com/korban" value="<?= (isset($configuration->linkedin))? $configuration->linkedin : '' ?>" name="linkedin">
                        </div>
                     </div>

                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-whatsapp" style="color:#4dc247; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="whatsapp" placeholder="http://whatsapp.com/korban" value="<?= (isset($configuration->whatsapp))? $configuration->whatsapp : '' ?>" name="whatsapp">
                        </div>
                     </div>

                     <div class="form-group col-md-12 col-lg-6">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text" style="background:none;"><i class="fab fa-pinterest" style="color:#cb2027; font-size:24px;"></i></div>
                           </div>
                           <input type="text" class="form-control" id="pinterest" placeholder="http://pinterest.com/korban" value="<?= (isset($configuration->pinterest))? $configuration->pinterest : '' ?>" name="pinterest">
                        </div>
                     </div>
                  </div>

                  <button type="submit" class="btn btn-generic">Actualizar</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>