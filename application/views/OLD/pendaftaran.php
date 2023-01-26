
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pendaftaran Baru</h1>
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
              <form method="post" rule="form">
                <div class="card-body">


                <div class="form-group row">
                    <label class="col-1 control-label">No Rekam medis</label>
                     <div class="col-5">
                      <input type="text"name="no_reg" class="form-control"  placeholder="No Rekam Medis">
                    </div > 
                    <label class="col-1 control-label">Nama Lengkap</label>
                   <div class="col-5">
                         <input type="text" name="nama" class="form-control"  placeholder="nama Lengkap">
                    </div >     
                  </div>

                  <div class="form-group row">
                    <label class="col-1 control-label">Nama Ibu Kandung</label>
                     <div class="col-5">
                      <input type="text" name="nama" class="form-control"  placeholder= "nama ibu kandung">
                    </div > 
                    <label class="col-1 control-label">NIK</label>
                   <div class="col-5">
                         <input type="text"name="nik" class="form-control"  placeholder="NIK">
                    </div >     
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">Alamat</label>
                     <div class="col-5">
                     <input type="text" name="alamat" class="form-control"  placeholder="alamat">
                    </div > 
                    <label class="col-1 control-label">No_Hp</label>
                   <div class="col-5">
                         <input type="text" name="no_hp" class="form-control"  placeholder="No_Hp">
                    </div >     
                  </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">Tanggal Lahir</label>
                     <div class="col-5">
                     <input type="text" name="tanggal_lahir" class="form-control" id="datepicker" placeholder="tanggal lahir">
                    </div > 
                </div>
                
                    <div class="form-group">
                      <label >Jenis Kelamin</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki">
                          <label class="form-check-label">Laki-Laki</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" checked>
                          <label class="form-check-label">Perempuan</label>
                        </div>
                      
                      <div class="form-group">
                      <label >Status</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="Menikah">
                          <label class="form-check-label">Menikah</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="Belum Menikah" checked>
                          <label class="form-check-label">Belum Menikah</label>
                        </div>
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
  
