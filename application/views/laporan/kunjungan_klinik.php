<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Kunjungan</h3>
        </div>
        <div class="card-body">
          <form method="get">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group row">
                  <label class="col-form-label col-md-2">Tahun</label>
                  <div class="col-md-4">
                    <?php
                    $year_start  = 2018;
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
        <?php if (isset($kunjungan) && isset($pasien)) : ?>
        <div class="card-header">
          <h3 class="card-title"><strong>Laporan Keaktifan <?= $nama . ' tahun ' . $tahun; ?></strong></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
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
                <td class="text-center">Kunjungan</td>
                <td class="text-center">
                  <?php echo array_key_exists('january', $kunjungan) ? $kunjungan['january'] : '-'; ?>
                </td>
                <td class="text-center">
                  <?php echo array_key_exists('february', $kunjungan) ? $kunjungan['february'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('march', $kunjungan) ? $kunjungan['march'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('april', $kunjungan) ? $kunjungan['april'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('may', $kunjungan) ? $kunjungan['may'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('june', $kunjungan) ? $kunjungan['june'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('july', $kunjungan) ? $kunjungan['july'] : '-'; ?>
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
                <td class="text-center"><?php echo array_key_exists('march', $pasien) ? $pasien['march'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('april', $pasien) ? $pasien['april'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('may', $pasien) ? $pasien['may'] : '-'; ?></td>
                <td class="text-center"><?php echo array_key_exists('june', $pasien) ? $pasien['june'] : '-'; ?>
                </td>
                <td class="text-center"><?php echo array_key_exists('july', $pasien) ? $pasien['july'] : '-'; ?>
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
        <?php endif ?>

      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->