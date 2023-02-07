<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Laporan Keaktifan</h3>
        </div>
        <div class="card-body">
          <form method="get">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group row">
                  <label class="col-form-label col-md-2">Klinik</label>
                  <div class="col-md-4">
                    <select name="kode" id="kodeKlinik" class="form-control" required autofocus>
                      <option value="">-Pilih-</option>
                      <?php if ($klinik) : ?>
                        <option value="all">Semua</option>
                        <?php foreach ($klinik as $kl) : ?>
                          <option value='<?= $kl['klinik'] ?>' <?= $kl['klinik'] == set_value('kode') ? 'selected' : '' ?>>
                            <?= $kl['nama'] ?></option>
                        <?php endforeach ?>
                      <?php endif ?>
                    </select>

                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-md-2">Tahun</label>
                  <div class="col-md-4">
                    <?php
                    $year_start  = 2020;
                    $year_end = date('Y') + 1; // current Year
                    $user_selected_year = date('Y');

                    echo '<select id="year" required class="form-control" name="tahun">' . "\n";
                    for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                      $selected = ($user_selected_year == $i_year ? ' selected' : set_value('tahun'));
                      echo '<option value="' . $i_year . '"' . $selected . '>' . $i_year . '</option>' . "\n";
                    }
                    echo '</select>' . "\n";
                    ?>
                  </div>
                </div>
                <div class="offset-sm-2 col-md-4">
                  <button type="submit" class="btn btn-success">Cari</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <hr>
        <?php if ($kode == 'all') : ?>
          <div class="card-header">
            <h3 class="card-title"><strong>Laporan Keaktifan Semua Klinik <?= ' tahun ' . $tahun; ?></strong></h3>
            <br>
            <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('admin/klinik/excel?kode=' . $this->input->get('kode') . '&tahun=' . $this->input->get('tahun')) ?>'">EXPORT</button>
          </div>
          <div class="card-body">
            <div id="html-content-holder">
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th class="text-center">Klinik</th>
                    <th class="text-center" style="width:280px">Alamat</th>
                    <th class="text-center" style="width:150px">PJ</th>
                    <th class="text-center">No Telp</th>
                    <th class="text-center">Kode Klinik</th>
                    <th class="text-center">Jenis Laporan</th>
                    <th class="text-center">Januari</th>
                    <th class="text-center">Februari</th>
                    <th class="text-center">Maret</th>
                    <th class="text-center">April</th>
                    <th class="text-center">Mei</th>
                    <th class="text-center">Juni</th>
                    <th class="text-center">Juli</th>
                    <th class="text-center">Agustus</th>
                    <th class="text-center">September</th>
                    <th class="text-center">Oktober</th>
                    <th class="text-center">November</th>
                    <th class="text-center">Desember</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($all as $klinik) : ?>
                    <tr>
                      <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                        <?= $klinik['nama']; ?></td>
                      <td rowspan="2" class="text-justify" style="vertical-align : middle;">
                        <?= $klinik['alamat']; ?></td>
                      <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                        <?= $klinik['pj']; ?></td>
                      <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                        <?= $klinik['telp']; ?></td>
                      <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                        <?= $klinik['klinik']; ?></td>
                      <td class="text-center">Kunjungan</td>
                      <td class="text-center">
                        <?php echo array_key_exists('january', $klinik['kunjungan']) ? $klinik['kunjungan']['january'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('february', $klinik['kunjungan']) ? $klinik['kunjungan']['february'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('march', $klinik['kunjungan']) ? $klinik['kunjungan']['march'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('april', $klinik['kunjungan']) ? $klinik['kunjungan']['april'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('may', $klinik['kunjungan']) ? $klinik['kunjungan']['may'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('june', $klinik['kunjungan']) ? $klinik['kunjungan']['june'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('july', $klinik['kunjungan']) ? $klinik['kunjungan']['july'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('august', $klinik['kunjungan']) ? $klinik['kunjungan']['august'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('september', $klinik['kunjungan']) ? $klinik['kunjungan']['september'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('october', $klinik['kunjungan']) ? $klinik['kunjungan']['october'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('november', $klinik['kunjungan']) ? $klinik['kunjungan']['november'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('december', $klinik['kunjungan']) ? $klinik['kunjungan']['december'] : '-'; ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">Pasien</td>
                      <td class="text-center">
                        <?php echo array_key_exists('january', $klinik['pasien']) ? $klinik['pasien']['january'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('february', $klinik['pasien']) ? $klinik['pasien']['february'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('march', $klinik['pasien']) ? $klinik['pasien']['march'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('april', $klinik['pasien']) ? $klinik['pasien']['april'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('may', $klinik['pasien']) ? $klinik['pasien']['may'] : '-'; ?></td>
                      <td class="text-center">
                        <?php echo array_key_exists('june', $klinik['pasien']) ? $klinik['pasien']['june'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('july', $klinik['pasien']) ? $klinik['pasien']['july'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('august', $klinik['pasien']) ? $klinik['pasien']['august'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('september', $klinik['pasien']) ? $klinik['pasien']['september'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('october', $klinik['pasien']) ? $klinik['pasien']['october'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('november', $klinik['pasien']) ? $klinik['pasien']['november'] : '-'; ?>
                      </td>
                      <td class="text-center">
                        <?php echo array_key_exists('december', $klinik['pasien']) ? $klinik['pasien']['december'] : '-'; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php else : ?>
          <div class="card-header">
            <h3 class="card-title"><strong>Laporan Keaktifan <?= $nama . ' tahun ' . $tahun; ?></strong></h3>
          </div>
          <div class="card-body">
            <div id="html-content-holder">
              <table class="table table-bordered" id="table">
                <thead>
                  <tr>
                    <th class="text-center">Klinik</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">PJ</th>
                    <th class="text-center">No Telp</th>
                    <th class="text-center">Kode Klinik</th>
                    <th class="text-center">Jenis Laporan</th>
                    <th class="text-center">Januari</th>
                    <th class="text-center">Februari</th>
                    <th class="text-center">Maret</th>
                    <th class="text-center">April</th>
                    <th class="text-center">Mei</th>
                    <th class="text-center">Juni</th>
                    <th class="text-center">Juli</th>
                    <th class="text-center">Agustus</th>
                    <th class="text-center">September</th>
                    <th class="text-center">Oktober</th>
                    <th class="text-center">November</th>
                    <th class="text-center">Desember</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                      <?= $klinik_dt['nama']; ?></td>
                    <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                      <?= $klinik_dt['alamat']; ?></td>
                    <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                      <?= $klinik_dt['pj']; ?></td>
                    <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                      <?= $klinik_dt['telp']; ?></td>
                    <td rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">
                      <?= $klinik_dt['klinik']; ?></td>
                    <td class="text-center">Kunjungan</td>
                    <td class="text-center">
                      <?php echo array_key_exists('january', $kunjungan) ? $kunjungan['january'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('february', $kunjungan) ? $kunjungan['february'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('march', $kunjungan) ? $kunjungan['march'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('april', $kunjungan) ? $kunjungan['april'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('may', $kunjungan) ? $kunjungan['may'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('june', $kunjungan) ? $kunjungan['june'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('july', $kunjungan) ? $kunjungan['july'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('august', $kunjungan) ? $kunjungan['august'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('september', $kunjungan) ? $kunjungan['september'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('october', $kunjungan) ? $kunjungan['october'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('november', $kunjungan) ? $kunjungan['november'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('december', $kunjungan) ? $kunjungan['december'] : '-'; ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">Pasien</td>
                    <td class="text-center">
                      <?php echo array_key_exists('january', $pasien) ? $pasien['january'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('february', $pasien) ? $pasien['february'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('march', $pasien) ? $pasien['march'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('april', $pasien) ? $pasien['april'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('may', $pasien) ? $pasien['may'] : '-'; ?></td>
                    <td class="text-center">
                      <?php echo array_key_exists('june', $pasien) ? $pasien['june'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('july', $pasien) ? $pasien['july'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('august', $pasien) ? $pasien['august'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('september', $pasien) ? $pasien['september'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('october', $pasien) ? $pasien['october'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('november', $pasien) ? $pasien['november'] : '-'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo array_key_exists('december', $pasien) ? $pasien['december'] : '-'; ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->