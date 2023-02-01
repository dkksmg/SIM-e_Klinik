<!-- Brand Logo -->
<a href="<?= site_url('dashboard'); ?>" class="brand-link navbar-info">
  <span class="badge badge-info">
    <h5><strong>SIM-e Klinik</strong></h5>
  </span>
</a>
<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= base_url('asset/dist/img/AdminLTELogo.png') ?>" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?= $this->session->userdata('nama_klinik'); ?></a>
    </div>
  </div>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="<?= site_url('dashboard') ?>"
          class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
          <i class="fas fa-tachometer-alt nav-icon"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'pasien' ? 'menu-open' : ''; ?>"">
          <a href=" #" class="nav-link <?= $this->uri->segment(1) == 'pasien' ? 'active' : ''; ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>Pasien
          <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('pasien/tambah') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pendaftaran Baru</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('pasien') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Daftar Pasien</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'kunjungan' ? 'menu-open' : ''; ?>">
        <a href="#" class="nav-link <?= $this->uri->segment(1) == 'kunjungan' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-heartbeat"></i>
          <p>Kunjungan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('kunjungan/cari') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pendaftaran Kunjungan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('kunjungan/daftar') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pasien Berkunjung</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'catatanMedik' ? 'menu-open' : ''; ?>"">
          <a href=" #" class="nav-link <?= $this->uri->segment(1) == 'catatanMedik' ? 'active' : ''; ?>">
        <i class="nav-icon fas fa-edit"></i>
        <p>Catatan Medik
          <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('catatanMedik/antrian') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Catatan Medik Pasien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('catatanMedik/riwayat') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Riwayat Pasien </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'laporan' ? 'menu-open' : '' ?>"">
          <a href=" #"
        class="nav-link <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' || $this->uri->segment(1) == 'kunjungan' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Laporan
          <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('laporan/laporan_penyakit') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Penyakit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/kesakitan_umum') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Kesakitan Umum </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('laporan/kunjungan') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Kunjungan </p>
            </a>
          </li>
        </ul>
      </li>
      <?php if ($this->session->userdata('role') == 'admin') : ?>
      <li
        class="nav-item has-treeview <?= $this->uri->segment(1) == 'admin' ? 'menu-open' : '' || $this->uri->segment(1) == 'admin' ? 'menu-open' : '' ?>"">
          <a href=" #"
        class="nav-link <?= $this->uri->segment(3) == 'users' ? 'active' : '' || $this->uri->segment(3) == 'keaktifan' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Data Klinik
          <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= site_url('admin/klinik/keaktifan') ?>"
              class="nav-link <?= $this->uri->segment(3) == 'keaktifan' ? 'active' : '' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Keaktifan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('admin/klinik/users') ?>"
              class="nav-link <?= $this->uri->segment(3) == 'users' ? 'active' : '' ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </li>
      <?php endif; ?>

      <li class="nav-header">MASTER</li>
      <li class="nav-item">
        <a href="<?= site_url('master/dokter') ?>" class="nav-link">
          <i class="fas fa-circle nav-icon"></i>
          <p>Dokter</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('master/tindakan') ?>" class="nav-link">
          <i class="fas fa-circle nav-icon"></i>
          <p>Tindakan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('master/obat') ?>" class="nav-link">
          <i class="fas fa-circle nav-icon"></i>
          <p>Obat</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('ketentuan') ?>"
          class="nav-link <?= $this->uri->segment(1) == 'ketentuan' ? 'active' : ''; ?>">
          <!-- <i class="fas fa-tachometer-alt nav-icon"></i> -->
          <p>Syarat & Ketentuan Penggunaan</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->