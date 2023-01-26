

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penamaan Obat</h1>
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
              <form method="post" rule="form" class="form-horizontal">
                <div class="card-body">

                  <div class="form-group row">
                    <label class="col-1 control-label">Nama Obat</label>
                     <div class="col-5">
                         <input type="text" name="nama_obat" class="form-control" id="exampleInputEmail1" placeholder="Enter nama">
                    </div > 
                    <label class="col-1 control-label" >Kode Obat</label>
                   <div class="col-5">
                        <input type="text" name="kode_obat" class="form-control" id="exampleInputEmail1" placeholder="Kode Obat">
                    </div >     
                  </div>

                  <div class="form-group row">
                    <label class="col-1 control-label">Harga</label>
                     <div class="col-5">
                         <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga">
                    </div > 
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
  