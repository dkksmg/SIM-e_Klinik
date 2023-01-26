<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Data Penyakit</h3>
        </div>
        <div class="card-body">
          <form method="get">
            <div class="form-group row">
              <label class="col-form-label col-md-2">Tanggal</label>
              <div class="col-md-3">
                <input type="text" name="tgl_awal" class="form-control"
                  value="<?= date('d-m-Y', strtotime('-1 year')); ?>" id="datepicker">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-md-2">Sampai</label>
              <div class="col-md-3">
                <input type="text" name="tgl_sampai" class="form-control" value="<?= date('d-m-Y'); ?>"
                  id="datepicker2">
              </div>
              <div class="offset-sm-2 col-md-4">
                <button type="submit" class="btn btn-success">Cari</button>
              </div>
            </div>
          </form>
        </div>
        <hr>
        <?php if (isset($icd) && $icd) : ?>
        <div class="card-header">
          <h6><strong>Laporan Penyakit dari tanggal <?= $tgl_awal; ?> sampai <?= $tgl_akhir; ?></strong></h6>
          <button type="button" class="btn btn-outline-warning btn-lg mt-3" title="Download Laporan Penyakit"
            onclick="window.location.href='<?= base_url('laporan/excel_penyakit?tgl_awal=' . $tgl_awal . '&tgl_sampai=' . $tgl_akhir . ''); ?>'"><i
              class="fas fa-file-excel"></i></button>
        </div>
        <?php endif ?>
        <div class="card-body">
          <table class="table table-bordered" id="datatable">
            <thead>
              <tr>
                <th class="text-center">Kode ICD</th>
                <th class="text-center">Nama Penyakit</th>
                <th class="text-center">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($icd) && $icd) : ?>
              <?php foreach ($icd as $key => $value) : ?>
              <tr>
                <td class='text-center'><?= $value->kdDiag; ?></td>
                <td class='text-justify'><?= $value->nmDiag; ?></td>
                <td class='text-center'><?= $value->jumlah; ?></td>
              </tr>
              <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->