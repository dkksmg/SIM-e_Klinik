
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penerimaan Obat</h1>
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
                <form method="post" class="form-horizontal" role="form">
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-1 control-label">Kode Obat</label>
                     <div class="col-5">
                      <input type="text" name="kode_obat" class="form-control" id="exampleInputEmail1" placeholder="Enter nama">
                    </div > 
                    <label class="col-1 control-label" >Tanggal Terima</label>
                   <div class="col-5">
                      <input type="text" name="tanggal_terima" class="form-control" id="datepicker" placeholder="tanggal Masuk">
                    </div >     
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">Jumlah</label>
                     <div class="col-5">
                        <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Jumlah">
                    </div > 
                    <label class="col-1 control-label" >Sumber</label>
                   <div class="col-5">
                      <input type="text" name="sumber" class="form-control" id="exampleInputEmail1" placeholder="Sumber">
                    </div >     
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
 