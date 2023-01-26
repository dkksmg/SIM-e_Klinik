<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pasien Berkunjung</h3>
                </div>
                <div class="card-body">
                    <form method="get" class="">
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Tanggal</label>
                            <div class="col-md-3">
                                <input type="text" name="tanggal" class="form-control datepicker"
                                    value="<?= date('d-m-Y', strtotime($this->input->get('tanggal'))) ?>">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <h4>Antrian Pasien</h4>
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
                            <?php if ($antrian) {
                foreach ($antrian as $key => $value) {
                  $aksi = "<a href='" . site_url('catatanMedik/isi?noCm=' . $value['noCm'] . '&tanggal=' . $value['tanggalKunjungan']) . "' class='btn btn-primary'> Isi Cm</a>";
                  echo "<tr><td>" . $value['antrian'] . "</td><td>" . $value['tanggalKunjungan'] . "</td><td>" . $value['noCm'] . "</td><td>" . $value['nama'] . "</td><td>" . $value['statusKunjungan'] . "</td><td>" . $value['caraBayar'] . "</td><td>" . $aksi . "</td></tr>";
                }
              } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="card-body">
                    <h4> Pasien Selesai Dilayani</h4>
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
                            <?php if ($dilayani) {
                foreach ($dilayani as $key => $value) {
                  $aksi = "<a href='" . site_url('catatanMedik/edit?noCm=' . $value['noCm'] . '&tanggalKunjungan=' . date('d-m-Y', strtotime($value['tanggalKunjungan']))) . "' class='btn btn-warning'> Edit Cm</a>";
                  echo "<tr><td>" . $value['antrian'] . "</td><td>" . $value['tanggalKunjungan'] . "</td><td>" . $value['noCm'] . "</td><td>" . $value['nama'] . "</td><td>" . $value['statusKunjungan'] . "</td><td>" . $value['caraBayar'] . "</td><td>" . $aksi . "</td></tr>";
                }
              } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- /.row -->
</div><!-- /.container-fluid -->