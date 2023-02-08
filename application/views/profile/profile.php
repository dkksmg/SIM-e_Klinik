<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Profile <?= $this->session->userdata('nama_klinik'); ?></h3>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-center">

            <div class="container">
              <div class="row  justify-content-center">
                <div class="col-md-4">

                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                          src="<?= base_url('asset/dist/img/AdminLTELogo.png') ?>" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center"><?= $user['nama']  ?></h3>
                      <p class="text-muted text-center"><?= strtoupper($user['role']) ?></p>
                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Username</b> <a class="float-right"><?= $user['username']  ?></a>
                        </li>
                        <li class="list-group-item">
                          <b>Status</b> <a class="float-right"><?= $user['status'] == 1 ? 'Active' : 'Inactive' ?></a>
                        </li>
                        <li class="list-group-item">
                          <b>Terakhir Diperbarui</b> <a
                            class="float-right"><?= date('d F Y H:i:s', strtotime($user['update_at']))  ?></a>
                        </li>
                      </ul>
                      <a href="#" class="btn btn-primary btn-block" data-toggle="modal"
                        data-target="#profileAdminModal"><b>Ubah Data</b></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /.row -->
  </div><!-- /.container-fluid -->
  <div class="modal fade" id="profileAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
          value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
        <?= isset($user['klinik']) ?  form_hidden('klinik', encrypt_url($user['klinik'])) : '' ?>

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data <?= $user['nama']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Name input -->
            <!-- <div class="form-group">
              <label class="form-label" for="form4Example1">Foto Profile</label>
              <input type="file" id="form4Example1" class="form-control " name="image" accept="image/png, image/jpeg" />
            </div> -->
            <div class="form-group">
              <label class="form-label" for="form4Example1">Nama</label>
              <input type="text" id="form4Example1" class="form-control " name="nama"
                value="<?= isset($user['nama']) ? $user['nama'] : ''; ?>" />
            </div>
            <div class="form-group">
              <label class="form-label" for="form4Example2">Username</label>
              <input type="text" id="form4Example2" class="form-control " name="username"
                value="<?= isset($user['username']) ? $user['username'] : ''; ?>" />
            </div>
            <!-- Message input -->
            <div class="form-group">
              <label class="form-label" for="form4Example3">Password</label>
              <input type="password" id="form4Example3" class="form-control" name="password"
                placeholder="Kosongkan jika tidak ingin mengubah" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>