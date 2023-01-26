
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stok Obat</h1>
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
             
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>no</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Harga Obat</th>
                    <th>Penerimaan</th>
                    <th>Pengeluaran</th>
                    <th>Total</th>
                     <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($obat as $value) { 
                    ?>
                  <tr>
                    <td><?=$no++;?></td>
                    <td><?=$value['kode_obat_utama']?></td>
                    <td><?=$value['nama_obat_utama']?></td>
                    <td>Rp <?=number_format($value['harga_obat'],2,',','.');?></td>
                    <td><?=$value['harga_obat']?></td>
                    <td><?=$value['harga_obat']?></td>
                    <td><?=$value['harga_obat']?></td>
                    <td><a href="<?=site_url('simklinik/catatanmedik?id_obat='.$value['id_obat'].'&kode_obat='.$value['kode_obat'].'')?>" class="btn btn-sm btn-primary">Periksa</a></td>

                  </tr>
                    <?php
                  }
                    ?>




                  </tbody>
                </table>
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
  
