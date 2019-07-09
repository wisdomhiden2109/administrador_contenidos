      </div>
      </div>

      <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
      <script type="text/javascript">
         $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
               $('#sidebar').toggleClass('active');
            });

            $(".popover-generic").popover({
               trigger: "hover"
            });
         });
      </script>
      </body>

      </html>