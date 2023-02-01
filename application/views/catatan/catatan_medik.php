<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Isian Catatan Medik</h3>
        </div>
        <div class="card-body">
          <table class="table">
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
              <td>Kepala Keluarga</td>
              <td>:</td>
              <td><?= $pasien['kk'] ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td colspan="4">
                <?= $pasien['alamat'] . " Kel." . kelurahan($pasien['kelurahan']) . " Kec." . kecamatan($pasien['kecamatan']) . " " . kota($pasien['kota']) ?>
              </td>
            </tr>
          </table>
        </div>
        <div class="card-body">
          <form method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
              value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
            <?php
            if ($this->uri->segment(2) == 'edit') {
              echo "<input type='hidden' name='edit' value='edit'>";
              echo "<input type='hidden' name='idCm' id='idCm' value='" . $cm['ID'] . "'>";
            }
            ?>
            <table class="table">
              <tr>
                <td>Poli</td>
                <td>:</td>
                <td><input type="text" name="poli" value="<?= $pasien['poli'] ?>" class="form-control" readonly></td>
                <td>No CM</td>
                <td>:</td>
                <td><input type="text" id="noCm" name="noCm" value="<?= $pasien['noCm'] ?>" class="form-control"
                    readonly></td>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="text" name="tanggalKunjungan"
                    value="<?= date("d-m-Y", strtotime($pasien['tanggalKunjungan'])) ?>" class="form-control" readonly>
                </td>
              </tr>
            </table>
            <table>
              <tr>
                <th colspan="2">Anamnesa</th>
                <td>:</td>
                <td colspan="2"><textarea rows="3" class="form-control"
                    name="anamnesa"><?= isset($cm['anamnesa']) ? $cm['anamnesa'] : ""; ?></textarea></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th colspan="3">Pemeriksaan Klinis</th>
              </tr>
              <tr>
                <th rowspan="3" width="30px"></th>
                <td>Kesadaran</td>
                <td>:</td>
                <td>
                  <select name="kesadaran" class="form-control">
                    <option></option>
                    <?php foreach ($kesadaran as $key => $value) {
                      $select = '';
                      if (isset($cm) && $cm['kesadaran'] == $value['kdSadar']) {
                        $select = 'selected';
                      }
                      echo "<option value='" . $value['kdSadar'] . "' " . $select . ">" . $value['nmSadar'] . "</option>";
                    } ?>
                    <option>Sadar</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Berat Badan</td>
                <td>:</td>
                <td>
                  <div class="input-group">
                    <input type="text" id="beratBadan" name="beratBadan"
                      value="<?= isset($cm['beratBadan']) ? $cm['beratBadan'] : ''; ?>" class="form-control"
                      onchange="IMT()">
                    <div class="input-group-append">
                      <span class="input-group-text">Kg</span>
                    </div>
                  </div>
                </td>
                <td>Tinggi Badan</td>
                <td>:</td>
                <td>
                  <div class="input-group">
                    <input type="text" id="tinggiBadan" name="tinggiBadan"
                      value="<?= isset($cm['tinggiBadan']) ? $cm['tinggiBadan'] : ''; ?>" class="form-control"
                      onchange="IMT()">
                    <div class="input-group-append">
                      <span class="input-group-text">Cm</span>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>IMT </td>
                <td>:</td>
                <td>
                  <input type="text" id="imt" class="form-control" readonly>
        </div>
        </td>
        <td>Lingkar Perut</td>
        <td>:</td>
        <td><input type="text" name="lingkarPerut" value="<?= isset($cm['lingkarPerut']) ? $cm['lingkarPerut'] : ''; ?>"
            class="form-control"></td>
        </tr>
        <tr>
          <th colspan="3">Tanda Vital</th>
        </tr>
        <tr>
          <th rowspan="4" width="30px"></th>
          <td>Suhu</td>
          <td>:</td>
          <td>
            <div class="input-group">
              <input type="text" name="suhu" value="<?= isset($cm['suhu']) ? $cm['suhu'] : ''; ?>" class="form-control">
              <div class="input-group-append">
                <span class="input-group-text"><sup>o</sup>C</span>
              </div>
          </td>
        </tr>
        <tr>
          <td>Tekanan Darah</td>
          <td>:</td>
          <td colspan="4" width="">
            <div class="input-group">
              <input type="text" name="sistole" value="<?= isset($cm['sistole']) ? $cm['sistole'] : ''; ?>"
                class="form-control" placeholder="sistole"> /
              <input type="text" name="diastole" value="<?= isset($cm['diastole']) ? $cm['diastole'] : ''; ?>"
                class="form-control" placeholder="diastole">
              <div class="input-group-append">
                <span class="input-group-text">mmHg</span>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            Respiratory Rate</td>
          <td>:</td>
          <td>
            <div class="input-group">
              <input type="text" name="respRate" value="<?= isset($cm['respRate']) ? $cm['respRate'] : ''; ?>"
                class="form-control">
              <div class="input-group-append">
                <span class="input-group-text">/menit</span>
              </div>
            </div>
          </td>

          <td>Heart Rate</td>
          <td>:</td>
          <td>
            <div class="input-group">
              <input type="text" name="heartRate" value="<?= isset($cm['heartRate']) ? $cm['heartRate'] : ''; ?>"
                class="form-control">
              <div class="input-group-append">
                <span class="input-group-text">bpm</span>
              </div>
            </div>
          </td>
        </tr>
        </table>
        <hr>
        <table>
          <tr>
            <th>Pemeriksaan Fisik</th>
            <td>:</td>
            <td><textarea class="form-control"
                name="pemeriksaanFisik"><?= isset($cm['pemeriksaanFisik']) ? $cm['pemeriksaanFisik'] : ""; ?></textarea>
            </td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th>Diagnosa</th>
            <td>:</td>
            <td colspan="4">
              <div id="icdRow1">
                <div class="input-group">
                  <input type="text" id="icdx1" name="diag1" value="<?= isset($cm['diag1']) ? $cm['diag1'] : ''; ?>"
                    class="form-control" style="max-width: 16%;text-transform: uppercase;"
                    onchange="diagnosaName(this.value,1)">
                  <input type="text" id="penyakit1" value="" class="form-control" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="diagnosaDaftar(1)">...</button>
                    <button class="btn btn-outline-secondary" type="button" onclick="tambahDiagnosa()"
                      id="btnTambahDiag" data-diagNext="2">+</button>
                  </div>
                </div>
              </div>
              <div id="icdRow2" <?= isset($cm['diag2']) && $cm['diag2'] != '' ? "" : "style='display: none;'"; ?>>
                <div class="input-group">
                  <input type="text" id="icdx2" name="diag2" value="<?= isset($cm['diag2']) ? $cm['diag2'] : ''; ?>"
                    class="form-control" style="max-width: 16%;text-transform: uppercase;"
                    onchange="diagnosaName(this.value,2)">
                  <input type="text" id="penyakit2" value="" class="form-control" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="diagnosaDaftar(2)">...</button>
                    <button class="btn btn-outline-secondary" type="button" onclick="hideDiagnosa(2)"> - </button>
                  </div>
                </div>
              </div>
              <div id="icdRow3" <?= isset($cm['diag3']) && $cm['diag3'] != '' ? "" : "style='display: none;'"; ?>>
                <div class="input-group">
                  <input type="text" id="icdx3" name="diag3" value="<?= isset($cm['diag3']) ? $cm['diag3'] : ''; ?>"
                    class="form-control" style="max-width: 16%;text-transform: uppercase;"
                    onchange="diagnosaName(this.value,3)">
                  <input type="text" id="penyakit3" value="" class="form-control" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="diagnosaDaftar(3)">...</button>
                    <button class="btn btn-outline-secondary" type="button" onclick="hideDiagnosa(3)"> - </button>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th colspan="6">
              <hr>
            </th>
          </tr>
          <tr>
            <th>Tindakan</th>
            <td>:</td>
            <td colspan="4">
              <div id="RowTindakan">
                <div id="RowTindakan1">
                  <div class="input-group">
                    <input type="text" id="kodeTindakan1" name="tindakan[]" value="" class="form-control"
                      style="max-width: 16%">
                    <input type="text" id="Tindakan1" value="" class="form-control" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="tindakanDaftar(1)">...</button>
                      <button class="btn btn-outline-secondary" id="tambahTindakanId" type="button"
                        onclick="tambahTindakan(2)">+</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th colspan="6">
              <hr>
            </th>
          </tr>
          <tr>
            <th>Obat</th>
            <td>:</td>
            <td colspan="4">
              <div id="RowObat">
                <div id="RowObat1">
                  <div class="input-group">
                    <input type="text" name="obat[]" id="obat1" value="" class="form-control" style="max-width: 16%">
                    <input type="text" value="" id="namaObat1" class="form-control" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="obatDaftar(1)">...</button>
                      <button class="btn btn-outline-secondary" id="tambahObatId" type="button"
                        onclick="tambahObat(2)">+</button>
                    </div>
                  </div>
                  <div class="input-group">
                    Dosis :
                    <input type="text" id="dosis1" name="dosis[]" class="form-control">
                    Jumlah :
                    <input type="text" id="jumlah1" name="jumlah[]" class="form-control">
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th colspan="6">
              <hr>
            </th>
          </tr>
          <tr>
            <th>Status Pulang</th>
            <td>:</td>
            <td>
              <select name="statusPulang" class="form-control">
                <option></option>
                <?php if (isset($statusPulang)) {
                  foreach ($statusPulang as $key => $value) {
                    $selected = '';
                    if (isset($cm) && $cm['statusPulang'] == $value['kdStatusPulang']) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $value['kdStatusPulang'] . "' " . $selected . ">" . $value['nmStatusPulang'] . "</option>";
                  }
                } ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>Pemeriksa</th>
            <td>:</td>
            <td>
              <select name="pemeriksa" class="form-control">
                <option></option>
                <?php if (isset($dokter)) {
                  foreach ($dokter as $key => $value) {
                    $selected = '';
                    if (isset($cm) && $cm['pemeriksa'] == $value['kdDokter']) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $value['kdDokter'] . "' " . $selected . ">" . $value['nmDokter'] . "</option>";
                  }
                } ?>
              </select>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><button type="submit" class="btn btn-success">SIMPAN</button> </td>
        </table>
        </form>
      </div>
    </div>
  </div>
</div> <!-- /.row -->
</div><!-- /.container-fluid -->
<style type="text/css">
td {
  padding-left: 20px;
}
</style>