<style>
   .image-preview {
      width: 200px;
      height: 100px;
      margin-bottom: 5px;
      background-repeat: no-repeat;
      background-size: cover;
   }
</style>
<div class="row">
   <div class="col-12">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('contenido/' . $section->id_contenido) ?>">Entradas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar entrada - <?= $section->nombre ?></li>
         </ol>
      </nav>
   </div>

   <form class="col-12" action="<?= base_url('actualizar-entrada/') ?>" method="post" enctype="multipart/form-data">
      <div class="col-12">
         <h5>Nombre de la entrada</h5>
         <div class="form-group">
            <input type="text" class="form-control" name="entry" value="<?= $section->nombre ?>" readonly required>
            <small id="field" class="form-text text-muted">Campor requerido, este representa el nombre de la entrada</small>
            <input type="hidden" name="idEntry" value="<?= $activeEntry ?>">
            <input type="hidden" name="idContent" value="<?= $section->id_contenido ?>">
         </div>
      </div>
      <?php foreach ($layoutFields as $field) { ?>
         <div class="col-12">
            <div class="item-form mt-4">
               <h5><?= ucfirst($field->nombre) ?></h5>
               <p class="mb-0"><?= ucfirst($field->descripcion) ?></p>
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
                           <option value="<?= $option ?>" <?= ($value == $option) ? 'selected' : ''; ?>><?= $option ?></option>
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
                  $value = str_replace('"', '', $field->valor);
                  ?>
                  <div class="image-preview" style="background-image:url('<?= base_url('assets/uploads/' . $value) ?>')"></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="validatedCustomFile" name="<?= $field->id_campo ?>">
                     <label class="custom-file-label" for="validatedCustomFile">Cambiar imagen...</label>
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
         <button type="submit" class="btn btn-info"> Actualizar entrada </button>
      </div>
   </form>
</div>