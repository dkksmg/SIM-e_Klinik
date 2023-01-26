<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SIM-e KLINIK </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="https://semarangkota.go.id/assets/img/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="https://semarangkota.go.id/assets/img/favicon.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Sweetalert2 -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('asset/plugins/sweetalert2/sweetalert2.min.css') ?>">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url('asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css') ?>">

  <style type="text/css">
  .login-page {
    justify-content: flex-end;
  }

  .login-bg {
    height: 100%;
    width: 100%;
    position: absolute;
    background-image: url('<?= base_url('asset/img/bg-tugumuda2.jpg') ?>');
    opacity: 0.6;
    background-repeat: no-repeat;
    background-size: 100%;
  }

  .login-box {
    background-color: white;
    position: relative;
    right: 130px;
    width: 30%;
    opacity: 1;
  }

  .login-logo {
    padding-top: 30px;
  }
  </style>
</head>

<body class="hold-transition login-page" style="height: 100vh !important;">
  <div class="login-bg"></div>
  <div class="login-box">
    <div class="login-logo">
      <img src="<?= base_url('asset/img/pemkot.png') ?>">
      <br>
      <a href="<?= base_url() ?>"><b>Sistem Informasi Elektronik </b>Klinik</a>
    </div><!-- /.login-logo -->
    <div class="card" id="step1" style="margin-bottom: 0px;">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masukan Kode Klinik</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="klinik" id="kodeKlinik" placeholder="Kode Klinik">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-hospital"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <a href="javascript:void(0);" class="btn btn-primary btn-block" id="cekKlinik">Masuk</a>
          </div><!-- /.col -->
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
    <div class="card" id="step2" style="display: none; margin-bottom: 0px;">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk</p>
        <h3 id="klinikNama"></h3>
        <form action="" method="post">
          <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
            value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <input type="hidden" name="klinik" value="" id="klinikKode">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div><!-- /.col -->
            <div class="col-4">
              <a href="<?= base_url('login') ?>" class="btn btn-outline-warning ">Reset</a>
            </div><!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    <div class="d-flex justify-content-center mt-3 mb-3">
      <a href="http://119.2.50.170:9095/sim-klinik/asset/pdf/EULA%20SIM-e%20KLINIK%20FIX.pdf"
        class="text-decoration-none">
        <h6>Syarat & Ketentuan Penggunaan</h6>
      </a>
    </div>
    <!-- <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div> -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('asset/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('asset/dist/js/adminlte.min.js') ?>"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->

  <script src="<?= base_url('asset/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>

  <script>
  $('#cekKlinik').click(function() {
    var klinik = $("#kodeKlinik").val();
    var csfrData = {};
    csfrData['<?= $this->security->get_csrf_token_name() ?>'] = '<?= $this->security->get_csrf_hash() ?>';
    $.ajaxSetup({
      data: csfrData,
    });
    if (klinik == '') {
      Swal.fire({
        type: 'warning',
        title: 'Kode Klinik tidak boleh kosong',
        showConfirmButton: false
      })
    } else {
      $.get('<?= base_url('login/cekKlinik') ?>', {
          klinik: klinik
        },
        function(data) {
          console.log(data.data);
          if (data.status) {
            $("#klinikNama").html('Klinik ' + data.data.klinik);
            $("#klinikKode").val(data.data.kodeKlinik);
            $("#step1").slideUp("slow", function() {
              $("#step2").slideDown('fast');
            });
          } else {
            Swal.fire({
              type: 'warning',
              title: 'Kode Klinik tidak terdaftar',
              showConfirmButton: false,
              timer: 8000
            })
          }
        })
    }
  })
  <?php
    $alert = $this->session->flashdata('alert');
    if ($alert != '') {
      $alert = json_decode($alert);
      echo "Swal.fire({icon: '" . $alert[0] . "',title: '" . $alert[1] . "',showConfirmButton: false,timer: 8000})";
    }
    ?>
  </script>
</body>

</html>