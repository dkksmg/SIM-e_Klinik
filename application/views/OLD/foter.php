<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://adminlte.io">Gregah Sim_klinik</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('asset/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url('asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url('asset/plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('asset/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('asset/dist/js/demo.js')?>"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});


</script>
<script type="text/javascript">
   //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>
</body>
</html>