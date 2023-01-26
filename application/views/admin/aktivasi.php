<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> SIM KLINIK </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('asset/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('asset/dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=site_url('admin/aktivasi') ?>"><b>Admin</b>Klinik</a>
  </div><!-- /.login-logo -->
  <?php if (!isset($klinik)) { ?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Aktivasi SIM-Klinik</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="klinik" id="kodeKlinik" placeholder="Kode Klinik">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-hospital"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username">
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
            <button type="submit" name="ambil" value="1" class="btn btn-primary btn-block">Masuk</button>
          </div><!-- /.col -->
        </div>
      </form>
    </div> <!-- /.login-card-body -->
  <?php }else{?>
    <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Aktivasi SIM-Klinik</p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="klinik" id="klinik" value="<?=$klinik['klinik']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-hospital"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="kodeKlinik" id="kodeKlinik" value="<?=$klinik['kodeKlinik']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-hospital"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="pj" id="pj" value="<?=$klinik['pj']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="sip" id="sip" value="<?=$klinik['sip']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <textarea class="form-control" name="alamat" id="alamat" ><?=$klinik['alamat']?></textarea>
          <input type="hidden" class="form-control" name="kelurahan" id="kelurahan" value="<?=$klinik['kelurahan']?>">
          <input type="hidden" class="form-control" name="kecamatan" id="kecamatan" value="<?=$klinik['kecamatan']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="telp" id="telp" value="<?=$klinik['telp']?>">
          <input type="hidden" class="form-control" name="logo" id="logo" value="<?=$klinik['logo']?>">
          <input type="hidden" class="form-control" name="status" id="status" value="<?=$klinik['status']?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="simpan" value="1" class="btn btn-primary btn-block">Simpan</button>
          </div><!-- /.col -->
        </div>
      </form>
    </div> <!-- /.login-card-body -->
  <?php } ?>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('asset/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('asset/dist/js/adminlte.min.js')?>"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->

<!-- Sweetalert2 -->
<link rel="stylesheet" type="text/css" href="<?=base_url('asset/plugins/sweetalert2/sweetalert2.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('asset/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css')?>">
<script src="<?=base_url('asset/plugins/sweetalert2/sweetalert2.min.js')?>"></script>

<script>
$('#cekKlinik').click(function() {
  var klinik = $("#kodeKlinik").val();
  if (klinik=='') {Swal.fire({type: 'warning',title: 'Kode Klinik tidak boleh kosong',showConfirmButton: false})
  }else{
    $.get('<?=base_url('login/cekKlinik')?>',{klinik:klinik},
      function(data) {
        console.log(data.data);
        if (data.status){
          $("#klinikNama").html(data.data.klinik);
          $("#klinikKode").val(data.data.kodeKlinik);
          $("#step1").slideUp("slow",function() {
            $("#step2").slideDown('fast');
          });          
        }else{
          Swal.fire({type: 'warning',title: 'Kode Klinik tidak terdaftar',showConfirmButton: false,timer: 1500})
        }
      })
  }
})
<?php 
  $alert = $this->session->flashdata('alert');
  if ($alert!='') {
    $alert = json_decode($alert);
    echo "Swal.fire({icon: '".$alert[0]."',title: '".$alert[1]."',showConfirmButton: false,timer: 1500})";
  }
?>
</script>
</body>
</html>