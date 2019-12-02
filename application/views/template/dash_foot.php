  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Arsyilla Co.</a></strong> All rights reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/components/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- Select2 -->
  <script src="<?php echo base_url('assets/components/select2/dist/js/select2.full.min.js') ?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url('assets/components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
  <!-- InputMask -->
  <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
  <!-- iCheck 1.0.1 -->
  <script src=<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/components/fastclick/lib/fastclick.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>

<!-- CK Editor -->
<script src="<?php echo base_url('assets/components/ckeditor/ckeditor.js') ?>"></script>

  <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

  </body>

  </html>