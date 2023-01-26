<div class="container-fluid">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?=$totalPasien?></h3>
        <p>Total Pasien</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="<?=site_url('pasien')?>" class="small-box-footer">
        Pasien
        <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?=$totalKunjungan?></h3>
        <p>Kunjungan Bulan ini</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?=site_url('kunjungan')?>" class="small-box-footer">
        Kunjungan
        <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?=$pasienBaru?></h3>
        <p>Pasien Baru</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="<?=site_url('pasien')?>" class="small-box-footer">
        Pasien
        <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?=$kunjunganPasien?></h3>
        <p>Pasien Berkunjung</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="<?=site_url('kunjungan')?>" class="small-box-footer">
        Kunjungan
        <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        MENU PINTASAN
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-6">
            <a class="btnMenu" href="<?=site_url('pasien/tambah')?>">
            <div class="info-box">
              <span class="info-box-icon bg-success">
                <i class="far fa-user"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Pasien Baru</span>
              </div>
              <!-- /.info-box-content -->
            </div><!-- /.info-box -->
            </a>
          </div>

          <div class="col-md-4 col-sm-6 col-6">
            <a class="btnMenu" href="<?=site_url('kunjungan/cari')?>">
            <div class="info-box">
              <span class="info-box-icon bg-danger">
                <i class="far fa-heart"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Pasien Berkunjung</span>
              </div>
              <!-- /.info-box-content -->
            </div><!-- /.info-box -->
            </a>
          </div>

          <div class="col-md-4 col-sm-6 col-6">
            <a class="btnMenu" href="<?=site_url('catatanMedik/antrian')?>">
            <div class="info-box">
              <span class="info-box-icon bg-warning">
                <i class="fas fa-users"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Antrian Pasien</span>
              </div>
              <!-- /.info-box-content -->
            </div><!-- /.info-box -->
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div> 
<style type="text/css">
.info-box-text{
  font-size: 20px;
  font-weight: bold;
}
</style>