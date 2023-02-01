<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kunjungan Pasien</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <td>No CM</td>
              <td>:</td>
              <td><?= $pasien['noCm'] ?></td>
              <td>NIK</td>
              <td>:</td>
              <td><?= $pasien['nik'] ?></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><?= $pasien['nama'] ?></td>
              <td>KK</td>
              <td>:</td>
              <td><?= $pasien['kk'] ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>:</td>
              <td><?= $pasien['jenisKelamin'] ?></td>
              <td>Tempat, Tanggal Lahir</td>
              <td>:</td>
              <td><?= $pasien['tempatLahir'] . ", " . date("d-m-Y", strtotime($pasien['tglLahir'])) ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td colspan="5">
                <?= $pasien['alamat'] . " KEL. " . kelurahan($pasien['kelurahan']) . " KEC. " . kecamatan($pasien['kecamatan']) . " " . kota($pasien['kota']); ?>
              </td>
            </tr>
          </table>
        </div>
        <hr>
        <div class="card-body">
          <form method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
              value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
            <div class="form-group row">
              <label class="col-form-label col-md-2">Pasien</label>
              <?php if ($terakhir) { ?>
              <div class="col-md-4">
                <input type="text" name="statusKunjungan" class="form-control" readonly value="Lama">
              </div>
              <label class="col-form-label col-md-2"><?php $terakhir['tanggalKunjungan'] ?></label>
              <?php } else { ?>
              <div class="col-md-4">
                <input type="text" name="statusKunjungan" class="form-control" readonly value="Baru">
              </div>
              <?php } ?>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-md-2">No CM</label>
              <div class="col-md-4">
                <input type="text" name="noCm" class="form-control" value="<?= $pasien['noCm'] ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-md-2">Tanggal</label>
              <div class="col-md-4">
                <input type="text" name="tanggalKunjungan" class="form-control" data-inputmask-alias="datetime"
                  data-inputmask-inputformat="dd-mm-yyyy" value="<?= date("d-m-Y") ?>">
              </div>

              <label class="col-form-label col-md-2">Poli Klinik</label>
              <div class="col-md-4">
                <select name="poli" class="form-control">
                  <option>Umum</option>
                  <option>Gigi</option>
                  <option>KIA</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-md-2">Cara Bayar</label>
              <div class="col-md-4">
                <select name="caraBayar" class="form-control">
                  <option>Bayar</option>
                  <option>BPJS</option>
                </select>
              </div>
              <div class="offset-sm-2 col-md-4">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->