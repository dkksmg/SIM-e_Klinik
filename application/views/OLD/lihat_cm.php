<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Riwayat Catatan Medik</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Catatan Medik</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
 <!-- DATA PASIEN -->                   
        <form method="post" role="form">
           <div class="card-body">
                   <div class="form-group row">
                    <label class="col-3" for="exampleInputPassword1">No Registrasi</label>
                    <div class="col-9"><span><?=$pasien['no_reg']?></span></div>
                  </div>
                   <div class="form-group row">
                    <label class="col-3" for="exampleInputPassword1">Nama</label>
                    <div class="col-9"><span><?=$pasien['nama']?></span></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-3" for="exampleInputPassword1">Tekanan Darah</label>
                    <div class="col-9"><span><?=$pasiencm['tekanan_darah']?></span></div>
                  </div>
                   <div class="form-group row">
                    <label class="col-3" for="exampleInputPassword1">Penyakit</label>
                    <div class="col-9"><span><?=$pasiencm['penyakit']?></span></div>
                  </div>
                   <div class="form-group row">
                    <label class="col-3" for="exampleInputPassword1">Tindakan</label>
                    <div class="col-9"><span><?=$pasiencm['tindakan']?></span></div>
                  </div>
                   <div class="form-group row">
                    <label class="col-3" for="exampleInputPassword1">Alergi</label>
                    <div class="col-9"><span><?=$pasiencm['alergi']?></span></div>
                  </div>





       </div>
             </form>