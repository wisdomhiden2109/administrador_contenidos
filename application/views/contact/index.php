<div class="container-fluid contacts" id="contacts">
   <h2>Contactos</h2>
   <hr>
   <p>Contactos recibidos por la página web</p>

   <!-- table contacts -->
   <table id="table-contacts" class="table table-bordered" style="width:100%">
      <thead>
         <tr>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Fecha contacto</th>
         </tr>
      </thead>
      <tbody>
         <?php if ($contacts != null) : foreach ($contacts as $contact) : ?>
               <tr>
                  <td><?= $contact->nombre ?></td>
                  <td><?= $contact->correo ?></td>
                  <td><?= $contact->asunto ?></td>
                  <td><?= $contact->mensaje ?></td>
                  <td><?= $contact->fecha ?></td>
               </tr>
            <?php endforeach;
         endif; ?>
      </tbody>
   </table>
</div>

<link rel="stylesheet" href="<?= base_url('assets/css/datatable.min.css') ?>">
<script src="<?= base_url('assets/js/datatable.min.js') ?>"></script>
<script src="<?= base_url('assets/js/datatable-bootstrap4.min.js') ?>"></script>

<script>
   $(document).ready(function() {
      $('#table-contacts').DataTable({
         "language": {
            lengthMenu: "Mostrando _MENU_ contactos",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoFiltered: " - filtro entre _MAX_ contactos",
            zeroRecords: "No se encontro ningun contacto web",
            search: "Buscar contactos",
            searchPlaceholder: "nombre - email",
            loadingRecords: "Por favor espere - cargando...",
            paginate: {
               previous: "Anterior",
               next: "Siguiente"
            }
         }
      });
   });
</script>