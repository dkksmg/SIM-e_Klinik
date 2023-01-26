<div class="container-fluid">
  <div class="row"><!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Riwayat Catatan Medik</h3>
        </div>
        <?php if (!isset($pasien)) { ?>
        <div class="card-body">
          <form method="get" class="">
            <div class="form-group row">
              <label class="col-form-label col-md-2">No CM</label>
              <div class="col-md-3">
                <input type="text" name="noCm" class="form-control datepicker" value="<?=$this->input->get('noCm')?>" >
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </div>
          </form>
          <hr>
          <?php if ($this->input->get('noCm')!='') {
            echo "<h3>Data yang ada cari tidak tersedia</h3>";
          } ?>
        </div>
        <?php }else{ ?>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>No CM</td><td>:</td><td><?=$pasien['noCm']?></td>
              <td>NIK</td><td>:</td><td><?=$pasien['nik']?></td>
            </tr>
            <tr>
              <td>Nama</td><td>:</td><td><?=$pasien['nama']?></td>
              <td>Kepala Keluarga</td><td>:</td><td><?=$pasien['kk']?></td>
            </tr>
            <tr>
              <td>Alamat</td><td>:</td><td colspan="4"><?=$pasien['alamat']." Kel.".kelurahan($pasien['kelurahan'])." Kec.".kecamatan($pasien['kecamatan'])." ".kota($pasien['kota'])?></td>
            </tr>
          </table>
          <table class="table table-bordered">
            <tr>
              <th>Tanggal kunjungan</th>
              <th>Subjective</th>
              <th>Objective</th>
              <th>Assesment</th>
              <th>Plan</th>
              <th>Pemeriksa</th>
            </tr>
            <?php if ($riwayat) {
            foreach ($riwayat as $key => $value) {
              $sub = "Kesadaran : ".$value['kesadaran']."<br>
                      Tekanan darah : ".$value['sistole']."/".$value['diastole']."<br>
                      Suhu : ".$value['suhu']."<br>
                      TB/BB : ".$value['tinggiBadan']."cm / ".$value['beratBadan']."kg <br>
                      Lingkar Perut : ".$value['lingkarPerut']."<br>
                      Respiratory Rate : ".$value['respRate']."<br>
                      Heart Rate : ".$value['heartRate']."<br>
                      Pemeriksaan Fisik : ".$value['pemeriksaanFisik']."<br>";
              echo "<tr><td>".$value['tanggalKunjungan']."<br>".$value['poli']."</td><td>".$value['anamnesa']."</td><td>".$sub."</td><td>".$value['diag1']." (".diagnosa($value['diag1']).")<br>".$value['diag2']."<br>".$value['diag3']."</td><td>"."</td><td>".pemeriksa($value['pemeriksa'])."</td></tr>";
            } } ?>
          </table>
        </div>
        <?php } ?>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->
<style type="text/css">
td{
  padding-left: 20px;
}
</style>