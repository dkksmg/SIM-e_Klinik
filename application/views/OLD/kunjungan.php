

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kunjungan Pasien</h1>
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
                <h3 class="card-title">Isi Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
 <!-- DATA PASIEN -->
             <!--
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Kunjungan</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="id_kunjungan">
                  </div>
                -->
                <form method="post" rule="form"> 
                    <div class="card-body">

                    <div class="form-group row">
                    <label class="col-1 control-label">No Registrasi</label>
                     <div class="col-5">
                       <input type="text" name="no_reg" class="form-control" id="datepicker" placeholder="no_reg" value="<?=$pasien['no_reg']?>">
                    </div > 
                    <label class="col-1 control-label">Nama</label>
                   <div class="col-5">
                       <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama" value="<?=$pasien['nama']?>">
                    </div >     
                  </div>

                    <div class="form-group row">
                    <label class="col-1 control-label">tanggal kunjungan</label>
                     <div class="col-2">
                        <input type="text" name="tanggal_kunjungan" class="form-control" id="datepicker" placeholder="tanggal_kunjungan" value="<?=date('Y-m-d');?>">
                    </div > 
                       
                  </div>

            
                  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Cara Bayar</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="cara_bayar" value="Tunai" checked="">
                          <label class="form-check-label">Tunai</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="cara_bayar" value="BPJS" checked>
                          <label class="form-check-label">BPJS</label>
                        </div>
                         <div class="form-check">
                          <input class="form-check-input" type="radio" name="cara_bayar" value="OVO" checked>
                          <label class="form-check-label">OVO</label>
                        </div>
                      </div>
                  


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
         






          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  