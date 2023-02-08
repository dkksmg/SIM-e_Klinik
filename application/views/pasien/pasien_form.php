<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= ucwords($this->uri->segment(2)) ?> Pasien</h3>
        </div>
        <div class="card-body">
          <form method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
            <table class="table">
              <tr>
                <th>No CM</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="noCm" placeholder="Nomor CM" name="noCm" value="<?= isset($pasien) ? $pasien['noCm'] : "" ?>">
                </td>
                <th>NIK</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="<?= isset($pasien) ? $pasien['nik'] : '' ?>">
                </td>
              </tr>
              <tr>
                <th>Asuransi</th>
                <td>:</td>
                <td>
                  <select name="asuransi" class="form-control">
                    <option value="">Tidak Ada</option>
                    <option value="BPJS" <?= isset($pasien['asuransi']) && $pasien['asuransi'] == 'BPJS' ? 'selected' : ''; ?>>
                      BPJS</option>
                    <?php if (isset($asuransi)) {
                      foreach ($asuransi as $key => $value) {
                        $selected = '';
                        if (isset($pasien['asuransi']) && $pasien['asuransi'] == $value['kode']) {
                          $selected = 'selected';
                        }
                        echo "<option value='" . $value['kode'] . "' " . $selected . ">" . $value['nama'] . "</option>";
                      }
                    } ?>
                  </select>
                </td>
                <th>No Asuransi</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="noAsuransi" placeholder="Nomor Asuransi" name="noAsuransi" value="<?= isset($pasien) ? $pasien['noAsuransi'] : '' ?>">
                </td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?= isset($pasien) ? $pasien['nama'] : '' ?>">
                </td>
                <th>Kepala Keluarga</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="kk" placeholder="Nama KK" name="kk" value="<?= isset($pasien) ? $pasien['kk'] : '' ?>">
                </td>
              </tr>
              <tr>
                <th>Telephone</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="hp" placeholder="No Telp" name="hp" value="<?= isset($pasien) ? $pasien['hp'] : '' ?>">
                </td>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td>
                  <select name="jenisKelamin" class="form-control">
                    <option>--Jenis Kelamin--</option>
                    <option value="L" <?= isset($pasien) && $pasien['jenisKelamin'] == 'L' ? 'selected' : '' ?>>
                      Laki-laki
                    </option>
                    <option value="P" <?= isset($pasien) && $pasien['jenisKelamin'] == 'P' ? 'selected' : '' ?>>
                      Perempuan
                    </option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Tempat Lahir</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir" name="tempatLahir" value="<?= isset($pasien) ? $pasien['tempatLahir'] : '' ?>">
                </td>
                <th>Tanggal Lahir</th>
                <td>:</td>
                <td>
                  <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" id="tglLahir" name="tglLahir" value="<?= isset($pasien) && $pasien['tglLahir'] != '' ? date("d-m-Y", strtotime($pasien['tglLahir'])) : '' ?>">
                </td>
              </tr>
              <tr>
                <th>Provinsi</th>
                <td>:</td>
                <td>
                  <select name="provinsi" class="form-control" id="provinsi" onchange="updateWilayah('kota','provinsi',this.value)">
                    <option value="" disabled>--Pilih Provinsi--</option>
                    <?php if (isset($provinsi)) {
                      foreach ($provinsi as $key => $value) {
                        $selected = '';
                        if (isset($pasien['provinsi'])) {
                          if ($pasien['provinsi'] == $value['ID']) {
                            $selected = 'selected';
                          }
                        } elseif ($value['ID'] == '33') {
                          $selected = 'selected';
                        }
                        echo "<option value='" . $value['ID'] . "' " . $selected . ">" . $value['provinsi'] . "</option>";
                      }
                    } ?>
                  </select>
                </td>
                <th>Kota</th>
                <td>:</td>
                <td>
                  <select name="kota" class="form-control" id="kota" onchange="updateWilayah('kecamatan','kota',this.value)">
                    <option value="" disabled>--Pilih Kota--</option>
                    <?php if (isset($pasien)) {
                      echo "<option value='" . $pasien['kota'] . "' selected>" . kota($pasien['kota']) . "</option>";
                    } else if (isset($kota)) {
                      foreach ($kota as $key => $value) {
                        $selected = '';
                        if (isset($pasien['kota'])) {
                          if ($pasien['kota'] == $value['ID']) {
                            $selected = 'selected';
                          }
                        } elseif ($value['ID'] == '3374') {
                          $selected = 'selected';
                        }
                        echo "<option value='" . $value['ID'] . "' " . $selected . ">" . $value['kota'] . "</option>";
                      }
                    } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Kecamatan</th>
                <td>:</td>
                <td>
                  <select name="kecamatan" class="form-control" id="kecamatan" onchange="updateWilayah('kelurahan','kecamatan',this.value)">
                    <option value="" disabled>--Pilih Kecamatan--</option>
                    <?php if (isset($pasien)) {
                      echo "<option value='" . $pasien['kecamatan'] . "' selected>" . kecamatan($pasien['kecamatan']) . "</option>";
                    } ?>
                  </select>
                </td>
                <th>Kelurahan</th>
                <td>:</td>
                <td>
                  <select name="kelurahan" class="form-control" id="kelurahan">
                    <option value="" disabled>--Pilih Kelurahan--</option>
                    <?php if (isset($pasien)) {
                      echo "<option value='" . $pasien['kelurahan'] . "' selected>" . kelurahan($pasien['kelurahan']) . "</option>";
                    } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>
                  <textarea class="form-control" name="alamat" placeholder="Alamat"><?= isset($pasien) ? $pasien['alamat'] : '' ?></textarea>
                </td>
                <th></th>
                <td></td>
                <td>
                  <input type="submit" value="Simpan" class="btn btn-success">
                  <button type="button" class="btn btn-warning" onclick="window.location.href='<?= base_url('pasien') ?>'">Kembali</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->