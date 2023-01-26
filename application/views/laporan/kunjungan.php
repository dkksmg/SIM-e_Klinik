<div class="container-fluid">
  <div class="row"><!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Laporan Kunjungan</h3>
        </div>
        <div class="card-body">
          <form method="get">
            <div class="form-group row">
              <label class="col-form-label col-md-1">Tanggal Mulai</label>
              <div class="col-md-2">
                <input type="text" name="awal" class="form-control" value="<?=$this->input->get('awal')?>">
              </div>

              <label class="col-form-label col-md-1">Sampai</label>
              <div class="col-md-2">
                <input type="text" name="akhir" class="form-control" value="<?=$this->input->get('akhir')?>">
              </div>

              <div class="col-md-2">
                <button type="submit" class="btn btn-success">Cari</button>
              </div>
            </div>
          </form>
        </div>
        <hr>        
        <div class="card-body">
          <div id="graph"></div>
          <div id="table"></div>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->
