

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pasien</h1>
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
               

          <?php if (isset($nama)) { ?>
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No Reg</th>
                    <th>Nama</th>
                    <th>Alamat(s)</th>
                    <th>Tanggal Lahir</th>
                    <th>No_ HP</th>
                    <th width="150px">aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($nama as $value) {?>
                  <tr>
                    <td><?=$value['no_reg']?></td>
                    <td><?=$value['nama']?></td>
                    <td><?=$value['alamat']?></td>
                    <td><?=$value['tgl_lahir']?></td>
                    <td><?=$value['no_hp']?></td>
                    <td>
                      <a href="<?=site_url('simklinik/pendaftaran?id_pasien='.$value['pasien_id'].'&no_reg='.$value['no_reg'].'')?>" class="btn btn-sm btn-primary">Edit</a>
                      <a href="<?=site_url('simklinik/pendaftaran?id_pasien='.$value['pasien_id'].'&no_reg='.$value['no_reg'].'')?>" class="btn btn-sm btn-primary">hapus</a>
                    </td>
                     
                  </tr>
                    <?php
                  }
                    ?>




                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          <?php } ?>
            </div>
          </div>
         






          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 