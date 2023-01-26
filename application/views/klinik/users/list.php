<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <div class="row mb-2">
            <div class="col-md-6">
              <h3 class="card-title">Data User Klinik</h3>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <a class="card-title btn btn-xs btn-success ms-2 text-decoration-none"
                href="<?= site_url('admin/klinik/tambah') ?>">Tambah Data Klinik</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
              value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
            <table class="table table-bordered datatable" id="klinik" style="width: 100%;height:auto;">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Kode Klinik</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Aksi</th>
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