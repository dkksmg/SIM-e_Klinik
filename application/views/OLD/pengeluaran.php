

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengeluaran Obat</h1>
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
               <form method="post" role="form">
                <div class="card-body">

                   <div class="form-group row">
                    <label class="col-1 control-label">Kode Obat</label>
                     <div class="col-5">
                         <input type="text" name="kode_obat" class="form-control" id="exampleInputEmail1" placeholder="Enter nama">
                    </div > 
                    <label class="col-1 control-label" >Tanggal Keluar</label>
                   <div class="col-5">
                       <input type="text" name="tanggal_keluar" class="form-control" id="datepicker" placeholder="tanggal Keluar">
                    </div >     
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">Jumlah</label>
                     <div class="col-5">
                          <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Jumlah">
                    </div > 
                    <label class="col-1 control-label" >No Registrasi</label>
                   <div class="col-5">
                       <input type="text" name="no_registrasi" class="form-control" id="exampleInputEmail1" placeholder="No Registrasi">
                    </div >     
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">Kadal Luarsa Obat</label>
                    <div class="col-5">
                    <input type="text" name="kadal_luarsa_obat" class="form-control" id="exampleInputEmail1" placeholder="Kadal Luarsa Obat">
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
  