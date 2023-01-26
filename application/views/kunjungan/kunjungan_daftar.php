<div class="container-fluid">
  <div class="row"><!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kunjungan Pasien</h3>
          <div class="card-tools">
            <a href="<?=site_url('kunjungan/cari')?>" class='btn btn-primary'>Pasien Berkunjung</a>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered datatable">
            <thead>
            <tr>
              <th>No Antri</th>
              <th>Tanggal</th>
              <th>No CM</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Cara Bayar</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($kunjungan) {
              foreach ($kunjungan as $key => $value) {
                echo "<tr><td>".$value['antrian']."</td><td>".$value['tanggalKunjungan']."</td><td>".$value['noCm']."</td><td>".$value['nama']."</td><td>".$value['statusKunjungan']."</td><td>".$value['caraBayar']."</td><td><button class='btn btn-danger btn-sm' onclick='batal(\"".$value['noCm']."\",\"".$value['tanggalKunjungan']."\",\"".$value['nama']."\")'>Batal</button></td></tr>";
              }
            } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->
