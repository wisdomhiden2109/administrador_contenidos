<div class="row">
   
   <?php foreach ($layoutFields as $field) { ?>
      <div class="col-12">
         <h4><?= strtoupper($field->nombre) ?></h4>
         <p><?= ucwords($field->descripcion) ?></p>
         <?php switch ($field->tipo_campo) {
            case 'text':
               ?>
            <div class="form-group">
               <input type="text" class="form-control" aria-describedby="field">
               <small id="field" class="form-text text-muted"><?= ($field->requerido) ? 'Campo requerido *' : 'Este campo no es obligatorio' ?></small>
            </div>
            <?php
            break;

         case 'textarea':
            ?>
            <div class="form-group">
               <textarea class="form-control" rows="5"></textarea>
               <small id="field" class="form-text text-muted"><?= ($field->requerido) ? 'Campo requerido *' : 'Este campo no es obligatorio' ?></small>
            </div>
            <?php
            break;

         case 'dropdown':
            # code...
            break;

         case 'radio':
            # code...
            break;

         case 'checkbox':
            # code...
            break;

         case 'img':
            # code...
            break;

         default:
            # code...
            break;
      } ?>
      </div>
   <?php } ?>

</div>