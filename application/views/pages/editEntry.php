<?php
?>
<div class="row">
   <div class="col-12">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar entrada</li>
         </ol>
      </nav>
   </div>

   <form class="col-12" action="<?= base_url('actualizar-entrada/' . $activeEntry) ?>" method="post" enctype="multipart/form-data">
      <?php foreach ($layoutFields as $field) { ?>
         <div class="col-12">
            <div class="item-form mt-4">
               <h5><?= strtoupper($field->nombre) ?></h5>
               <p class="mb-0"><?= ucwords($field->descripcion) ?></p>
               <?php switch ($field->tipo_campo) {
                  case 'text':
                     $value = str_replace('"', '', $field->valor);
                     ?>
                  <div class="form-group">
                     <input type="text" class="form-control" aria-describedby="field" <?= ($field->requerido) ? 'required' : '' ?> name="<?= $field->id_campo ?>" value='<?= $value ?>'>
                     <small id="field" class="form-text text-muted"><?= ($field->requerido) ? 'Campo requerido *' : 'Este campo no es obligatorio' ?></small>
                  </div>
                  <?php
                  break;

               case 'textarea':
                  $value = str_replace('"', '', $field->valor);
                  ?>
                  <div class="form-group">
                     <textarea class="form-control" rows="5" <?= ($field->requerido) ? 'required' : '' ?> name="<?= $field->id_campo ?>"><?= $value ?></textarea>
                     <small id="field" class="form-text text-muted"><?= ($field->requerido) ? 'Campo requerido *' : 'Este campo no es obligatorio' ?></small>
                  </div>
                  <?php
                  break;

               case 'dropdown':
                  $value = str_replace('"', '', $field->valor);
                  $options = json_decode($field->opciones);
                  ?>
                  <div class="form-group">
                     <select class="form-control" id="exampleFormControlSelect1" <?= ($field->requerido) ? 'required' : '' ?> name="<?= $field->id_campo ?>">
                        <?php foreach (json_decode($field->opciones) as $option) { ?>
                           <option value="<?= $option ?>" <?= ($value == $option)? 'selected' : ''; ?> ><?= $option ?></option>
                        <?php } ?>
                     </select>
                     <small id="field" class="form-text text-muted"><?= ($field->requerido) ? 'Campo requerido *' : 'Este campo no es obligatorio' ?></small>
                  </div>
                  <?php
                  break;

               case 'radio':
                  ?>
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" <?= ($field->requerido) ? 'required' : '' ?> name="<?= $field->id_campo ?>">
                     <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                     </label>
                  </div>
                  <?php
                  break;

               case 'checkbox':
                  $options = json_decode($field->valor);
                  $i = 0;
                  foreach (json_decode($field->opciones) as $option) {
                     $checked = false;
                     foreach ($options as $value) {
                        if ($option == $value) $checked = true;
                     }
                     ?>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox<?= $option ?>" value="<?= $option ?>" name="<?= $field->id_campo ?>[]" <?= ($checked) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineCheckbox<?= $option ?>"><?= $option ?></label>
                     </div>
                     <?php $i++;
                  }
                  break;

               case 'img':
                  ?>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="validatedCustomFile" name="<?= $field->id_campo ?>">
                     <label class="custom-file-label" for="validatedCustomFile">Buscar imagen...</label>
                     <small id="field" class="form-text text-muted"><?= ($field->requerido) ? 'Campo requerido *' : 'Este campo no es obligatorio' ?></small>
                  </div>
                  <?php
                  break;

               default:
                  # code...
                  break;
            } ?>
            </div>
         </div>
      <?php } ?>
      <div class="col-12 mt-4">
         <button type="submit" class="btn btn-info"> Crear entrada </button>
      </div>
   </form>
</div>