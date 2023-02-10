<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Daftar Pasien</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
            <table class="table table-bordered datatable" id="pasien" style="width: 100%;height:auto;">
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

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->