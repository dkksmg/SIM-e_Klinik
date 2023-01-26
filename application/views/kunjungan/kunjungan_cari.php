<div class="container-fluid">
  <div class="row"><!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Cari Pasien</h3>
        </div>
        <div class="card-body">
          <form method="get">
            <div class="form-group row">
              <label class="col-form-label col-md-2">No CM</label>
              <div class="col-md-4">
                <input type="text" name="noCm" class="form-control" value="<?=$this->input->get('noCm')?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-md-2">Nama</label>
              <div class="col-md-4">
                <input type="text" name="nama" class="form-control" value="<?=$this->input->get('nama')?>">
              </div>

              <div class="offset-sm-2 col-md-4">
                <button type="submit" class="btn btn-success">Cari</button>
              </div>
            </div>
          </form>
        </div>
        <hr>        
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th>No CM</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Asuransi</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php if (isset($pasien)&&$pasien) {
              foreach ($pasien as $key => $value) {
                echo "<tr><td>".$value['noCm']."</td><td>".$value['nik']."</td><td>".$value['nama']."</td><td>".$value['tempatLahir'].", ".date("d-m-Y",strtotime($value['tglLahir']))."</td><td>".$value['alamat']." Kel.".kelurahan($value['kelurahan'])." Kec.".kecamatan($value['kecamatan'])." ".kota($value['kota'])."</td><td>".$value['asuransi']."</td><td><a href='".site_url('kunjungan/catat?noCm='.$value['noCm'])."' class='btn btn-primary'>Catat</a></td></tr>";
              }
            } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->
