<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIM-e Klinik - <?= strtoupper($this->uri->segment(1)); ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="<?= $this->security->get_csrf_token_name(); ?>" content="<?= $this->security->get_csrf_hash(); ?>" />
  <!-- <link rel="shortcut icon" href="http://119.2.50.170:9093/penilaian_klinik/assets/img/favicon.png"
    type="image/x-icon" /> -->
  <link rel="icon" href="https://semarangkota.go.id/assets/img/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="https://semarangkota.go.id/assets/img/favicon.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('asset/dist/css/style.css') ?>">
</head>

<body class="hold-transition skin-blue sidebar-mini text-sm">
  <div class="wrapper">
    <?= $_header; ?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-light-info">
      <?= $_sidebar; ?>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= strtoupper($this->uri->segment(1)); ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <?php foreach ($this->uri->segments as $segment) : ?>
                <?php
                    $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                    $is_active =  $url == $this->uri->uri_string;
                    ?>
                <li class="breadcrumb-item <?php echo $is_active ? 'active' : '' ?>">
                  <?php if ($is_active) : ?>
                  <?php echo ucfirst($segment) ?>
                  <?php else : ?>
                  <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                  <?php endif; ?>
                </li>
                <?php endforeach; ?>

              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <?= $_content; ?>
      </section>
    </div>
    <?= $_footer; ?>
  </div>
  <!-- jQuery -->
  <!-- <script src="<?= base_url('asset/plugins/jquery/jquery.min.js') ?>"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('asset/dist/js/adminlte.js') ?>"></script>
  <!-- Sweetalert2 -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/plugins/sweetalert2/sweetalert2.min.css') ?>">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css') ?>">
  <script src="<?= base_url('asset/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
  <script type="text/javascript"
    src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
  <script>
  // $(document).ready(function() {
  //   $.ajaxSetup({
  //     data: {
  //       '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
  //     }
  //   });
  // });
  </script>
  <?php
  if (isset($_cssplugins)) {
    foreach ($_cssplugins as $key => $value) {
      echo "<link rel='stylesheet' type='text/css' href='" . base_url('asset/plugins/' . $value) . "'>";
    }
  }
  if (isset($_jsplugins)) {
    foreach ($_jsplugins as $key => $value) {
      echo "<script src='" . base_url('asset/plugins/' . $value) . "'></script>";
    }
  }
  if (isset($_js)) {
    foreach ($_js as $key => $value) {
      echo "<script>";
      echo "var base_url ='" . base_url() . "';";
      echo "var csfrData ={};";
      echo "csfrData['" . $this->security->get_csrf_token_name() . "'] = '" . $this->security->get_csrf_hash() . "';";
      echo "var csrfName = '" . $this->security->get_csrf_token_name() . "';";
      echo "var csrfHash = '" . $this->security->get_csrf_hash() . "';";
      require "asset/page/" . $value;
      echo "</script>";
    }
  } ?>

  <?php
  $alert = $this->session->flashdata('alert');
  if ($alert != '') {
    $alert = json_decode($alert);
    echo "<script> Swal.fire({type: '" . $alert[0] . "',title: '" . $alert[1] . "',showConfirmButton: false,timer: 8000})</script>";
  }
  $toast = $this->session->flashdata('toast');
  if ($toast != '') {
    $toast = json_decode($toast);
    echo "<script> 
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      footer: '<a href></a>',
      timer: 3000
    });
    ";
    for ($i = 1; $i < count($toast); $i++) {
      echo "Toast.fire({type: '" . $toast[0] . "',title:'Peringatan', text: '" . $toast[$i] . "'});
      ";
    }
    echo "</script>";
  }
  ?>
  <script>
  $('#datepicker').datepicker({
    format: 'dd-mm-yyyy',
    uiLibrary: 'bootstrap4',
    showRightIcon: false
  });
  $('#datepicker2').datepicker({
    format: 'dd-mm-yyyy',
    uiLibrary: 'bootstrap4',
    showRightIcon: false
  });
  $(document).ready(function() {
    $('#datatable').DataTable();
  });
  </script>

  <div id="Popup"></div>
</body>

</html>