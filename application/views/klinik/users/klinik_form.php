<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= ucwords($this->uri->segment(2) . ' ' . $this->uri->segment(3)) ?></h3>
        </div>
        <?= form_open('', array('class' => 'form-horizontal', 'role' => 'form')); ?>

        <div class="card-body">
          <table class="table">
            <tr>
              <th>Kode Klinik</th>
              <td>:</td>
              <td>
                <input type="text" class="form-control" id="kodeKlinik" placeholder="Kode Klinik dari Siklinik"
                  name="kode" value="<?= isset($klinik['klinik']) ? $klinik['klinik'] : set_value('kode') ?>" autofocus
                  required>
                <input type="hidden" name="kodeHide"
                  value="<?= isset($klinik['klinik']) ? $klinik['klinik'] : set_value('kode') ?>">
                <input type="hidden" name="passwordHide"
                  value="<?= isset($klinik['password']) ? $klinik['password'] : set_value('password') ?>">
              </td>
              <th>Nama Klinik</th>
              <td>:</td>
              <td>
                <input type="text" class="form-control" id="nama" placeholder="Nama Klinik" name="nama"
                  value="<?= isset($klinik) ? $klinik['nama'] : set_value('nama') ?>" readonly>
              </td>
            </tr>
            <tr>
              <th>Username</th>
              <td>:</td>
              <td>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                  value="<?= isset($klinik) ? $klinik['username'] : set_value('username') ?>">
              </td>
              <th>Email</th>
              <td>:</td>
              <td>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                  value="<?= isset($klinik) ? $klinik['email'] : set_value('email') ?>" readonly>
              </td>
            </tr>
            <tr>
              <th>Role</th>
              <td>:</td>
              <td>
                <select name="role" class="form-control">
                  <option value="">- Pilih -</option>
                  <option value="user"
                    <?= isset($klinik['role']) && $klinik['role'] == 'user' ? 'selected' : set_value('role'); ?>>
                    Klinik
                  </option>
                  <option value="user"
                    <?= isset($klinik['role']) && $klinik['role'] == 'admin' ? 'selected' : set_value('role'); ?>>
                    Admin
                  </option>
                </select>
              </td>
              <th>Password</th>
              <td>:</td>
              <td>
                <input class="form-control" id="password" placeholder="Password" name="password" type="password"
                  value="">
              </td>

            </tr>
            <tr>
              <th>Status</th>
              <td>:</td>
              <td>
                <select name="status" class="form-control">
                  <option value="1"
                    <?= isset($klinik['status']) && $klinik['status'] == '1' ? 'selected' : set_value('status'); ?>>
                    Aktif
                  </option>
                  <option value="0"
                    <?= isset($klinik['status']) && $klinik['status'] == '0' ? 'selected' : set_value('status'); ?>>
                    Tidak Aktif
                  </option>
                </select>
              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-success">Simpan</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
</div> <!-- /.row -->
</div><!-- /.container-fluid -->