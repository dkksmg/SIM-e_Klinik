

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ANTRIAN</h1>
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
                <h3 class="card-title">ANTRIAN PASIEN</h3>
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
               

          
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Reg</th>
                    <th>Nama</th>
                    <th>Cara Bayar</th>
                    
                    <th width="150px">aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                      if ($antrian_blm!='')
                        {foreach ($antrian_blm as $value){
                      ?>
                  <tr>
                    <td><?=$value['no_antrian']?></td>
                    <td><?=$value['no_reg']?></td>
                    <td><?=$value['nama']?></td>
                    <td><?=$value['cara_bayar']?></td>
                    <td>
                      <a href="<?=site_url('simklinik/catatanmedik?kunjungan_id='.$value['kunjungan_id'].'&no_reg='.$value['no_reg'].'')?>" class="btn btn-sm btn-primary">periksa</a>
                    </td>
                     
                  </tr>
                    <?php
                  }}
                    ?>




                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          
            </div>


              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ANTRIAN PASIEN</h3>
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
               

          
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sudah Di Panggil</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Reg</th>
                    <th>Nama</th>
                    <th>Cara Bayar</th>
                    
                    <th width="150px">aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                      if ($antrian_sdh!='')
                        {foreach ($antrian_sdh as $value){
                      ?>
                  <tr>
                    <td><?=$value['no_antrian']?></td>
                    <td><?=$value['no_reg']?></td>
                    <td><?=$value['nama']?></td>
                    <td><?=$value['cara_bayar']?></td>
                    <td>
                      <a href="<?=site_url('simklinik/lihat_cm?kunjungan_id='.$value['kunjungan_id'].'&no_reg='.$value['no_reg'].'')?>" class="btn btn-sm btn-primary">Lihat</a>
                    </td>
                     
                  </tr>
                    <?php
                  }}
                    ?>




                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          
            </div>



          </div>
         






          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 