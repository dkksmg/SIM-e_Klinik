<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item user-menu">
      <a href="#" class="nav-link" data-toggle="dropdown">
        <img src="<?= base_url('asset/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
        <span class="hidden-xs"><?= $this->session->userdata('nama_klinik'); ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header" style="background-color: #17a2b8; color: #fff;">
          <img src="<?= base_url('asset/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
          <p>
            <?= $this->session->userdata('username') ?>
            <small><?= klinik($this->session->userdata('klinik')) ?></small>
          </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
          <div class="row">
            <div class="col-md-6 text-center">
              <a href="<?= site_url('profile') ?>" class="btn btn-info" style="background-color: #3B71CA !important; color: #fff !important;">Profile</a>
            </div>
            <div class="col-md-6 text-center">
              <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger" style="background-color: #dc3545 !important; color: #fff !important;">Sign out</a>
            </div>
          </div>
          <!-- /.row -->
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.navbar -->