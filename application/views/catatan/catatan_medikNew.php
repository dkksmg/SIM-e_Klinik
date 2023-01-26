<div class="container-fluid">
  <div class="row"><!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Isian Catatan Medik</h3>
        </div>
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
        </div>
        <div class="card-body">
          <form method="post">
            <div class="input-group">
              <label class="col-form-label col-md-2">Poli</label>
              <div class="col-md-4">
                <input type="text" name="poli" value="<?=$pasien['poli']?>" class="form-control" readonly>
              </div>
            </div>
            <div class="input-group">
              <label class="col-form-label col-md-2">No CM</label>
              <div class="col-md-4">
                <input type="text" name="noCm" value="<?=$pasien['noCm']?>" class="form-control" readonly>
              </div>
            </div>
            <div class="input-group">
              <label class="col-form-label col-md-2">Tanggal</label>
              <div class="col-md-4">
                <input type="text" name="tanggalKunjungan" value="<?=date("d-m-Y",strtotime($pasien['tanggalKunjungan']))?>" class="form-control" readonly>
              </div>
            </div>
          <table>
            <tr>
              <td>Anamnesa</td>
              <td>:</td>
              <td><textarea class="form-control" name="anamnesa"><?=isset($cm['anamnesa'])?$cm['anamnesa']:"";?></textarea></td>
              <td></td><td></td><td></td>
            </tr>
          </table>
          <table>
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
                  <option>Sadar</option>
                </select>
              </td>
              <td>Suhu</td>
              <td>:</td>
              <td><input type="text" name="suhu" value="<?=isset($cm['suhu'])?$cm['suhu']:'';?>" class="form-control"></td>
            </tr>
            <tr>
              <td>Berat Badan</td>
              <td>:</td>
              <td>
                <div class="input-group">
                  <input type="text" name="beratBadan" value="<?=isset($cm['beratBadan'])?$cm['beratBadan']:'';?>" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">Kg</span>
                  </div> / 
                  <input type="text" name="tinggiBadan" value="<?=isset($cm['tinggiBadan'])?$cm['tinggiBadan']:'';?>" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">Cm</span>
                  </div>
                </div>
              </td>
              <td>IMT </td><td>:</td>
              <td>
                  <input type="text" id="imt" class="form-control" readonly>
                </div>
              </td>
            </tr>

              <td>Lingkar Perut</td>
              <td>:</td>
              <td><input type="text" name="lingkarPerut" value="<?=isset($cm['lingkarPerut'])?$cm['lingkarPerut']:'';?>" class="form-control"></td>
            </tr>
          </table>
          <table>
            <tr>
              <th>Tanda Vital</th><td>:</td>
              <td colspan="1">
                Tekanan Darah
                <div class="input-group">
                  <input type="text" name="sistole" value="<?=isset($cm['sistole'])?$cm['sistole']:'';?>" class="form-control" placeholder="sistole">  /        
                  <input type="text" name="diastole" value="<?=isset($cm['diastole'])?$cm['diastole']:'';?>" class="form-control" placeholder="diastole">
                  <div class="input-group-append">
                    <span class="input-group-text">mmHg</span>
                  </div>
                </div>
              </td>
              <td>
                Respiratory Rate
                <div class="input-group">
                  <input type="text" name="respRate" value="<?=isset($cm['respRate'])?$cm['respRate']:'';?>" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">/menit</span>
                  </div>
                </div>
              </td><td></td>
              <td>
                Heart Rate
                <div class="input-group">
                  <input type="text" name="heartRate" value="<?=isset($cm['heartRate'])?$cm['heartRate']:'';?>" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">bpm</span>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Pemeriksaan Fisik</td>
              <td>:</td>
              <td><textarea class="form-control" name="pemeriksaanFisik"><?=isset($cm['pemeriksaanFisik'])?$cm['pemeriksaanFisik']:"";?></textarea></td>
              <td></td><td></td><td></td>
            </tr>
            <tr>
              <td>Diagnosa</td>
              <td>:</td>
              <td colspan="4">
                <div id="icdRow1">
                  <div class="input-group">
                    <input type="text" id="icdx1" name="diag1" value="<?=isset($cm['diag1'])?$cm['diag1']:'';?>" class="form-control" style="max-width: 16%;text-transform: uppercase;" onchange="diagnosaName(this.value,1)">
                    <input type="text" id="penyakit1" value="" class="form-control" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="diagnosaDaftar(1)">...</button>
                      <button class="btn btn-outline-secondary" type="button" onclick="tambahDiagnosa()" id="btnTambahDiag" data-diagNext="2" >+</button>
                    </div>
                  </div>
                </div>
                <div id="icdRow2" style="display: none;">
                  <div class="input-group">
                    <input type="text" id="icdx2" name="diag2" value="" class="form-control" style="max-width: 16%;text-transform: uppercase;" onchange="diagnosaName(this.value,2)">
                    <input type="text" id="penyakit2" value="" class="form-control" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="diagnosaDaftar(2)">...</button>
                      <button class="btn btn-outline-secondary" type="button" onclick="hideDiagnosa(2)"> - </button>
                    </div>
                  </div>
                </div>
                <div id="icdRow3" style="display: none;">
                  <div class="input-group">
                    <input type="text" id="icdx3" name="diag3" value="" class="form-control" style="max-width: 16%;text-transform: uppercase;"  onchange="diagnosaName(this.value,3)">
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
              <td>Tindakan</td>
              <td>:</td>
              <td colspan="4">
                <div id="row1">
                  <div class="input-group">
                    <input type="text" name="tindakan" value="" class="form-control" style="max-width: 16%">
                    <input type="text" value="" class="form-control" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="tindakanDaftar(1)">...</button>
                      <button class="btn btn-outline-secondary" type="button" onclick="tambahTindakan(1)">+</button>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td>Obat</td>
              <td>:</td>
              <td colspan="4">
                <div id="row1">
                  <div class="input-group">
                    <input type="text" name="obat" value="" class="form-control" style="max-width: 16%">
                    <input type="text" value="" class="form-control" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" onclick="obatDaftar(1)">...</button>
                      <button class="btn btn-outline-secondary" type="button" onclick="tambahObat(1)">+</button>
                    </div>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td>Status Pulang</td>
              <td>:</td>
              <td>
                <select name="statusPulang" class="form-control">
                  <option></option>
                  <?php if(isset($statusPulang)){
                    foreach ($statusPulang as $key => $value) {
                      $selected='';
                      if (isset($cm)&&$cm['statusPulang']==$value['kdStatusPulang']) {
                        $selected = "selected";
                      }
                      echo "<option value='".$value['kdStatusPulang']."' ".$selected.">".$value['nmStatusPulang']."</option>";
                    }
                  } ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Pemeriksa</td>
              <td>:</td>
              <td>
                <select name="pemeriksa" class="form-control">
                  <option></option>
                  <?php if(isset($dokter)){
                    foreach ($dokter as $key => $value) {
                      $selected='';
                      if (isset($cm)&&$cm['pemeriksa']==$value['kdDokter']) {
                        $selected = "selected";
                      }
                      echo "<option value='".$value['kdDokter']."' ".$selected.">".$value['nmDokter']."</option>";
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
