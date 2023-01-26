<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Daftar Dokter Pemeriksa</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered datatable" id="dokter">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Pemeriksa</th>
                <th>Nama Pemeriksa</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($ref) {
                $no = 1;
                foreach ($ref as $key => $value) {
                  echo "<tr><td>" . $no . "</td>
                <td>" . $value['kdDokter'] . "</td>
                <td>" . $value['nmDokter'] . "</td>
                <td><button class='btn btn-warning' onclick=\"edit('" . $value['nmDokter'] . "','" . $value['kdDokter'] . "')\">Edit</button></td><tr>";
                  $no++;
                }
              } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formTambah">Tambah Dokter
          </button>
        </div>
      </div>
    </div>
  </div> <!-- /.row -->
</div><!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="formTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form method="post"> -->
      <?= form_open('', array('class' => 'form-horizontal', 'role' => 'form')); ?>

      <div class="modal-body">
        <table>
          <tr>
            <th>Kode Dokter</th>
            <td>:</td>
            <td><input type="text" name="kdDokter" id="kdDokter" class="form-control"></td>
          </tr>
          <tr>
            <th>Nama Dokter</th>
            <td>:</td>
            <td><input type="text" name="nmDokter" id="nmDokter" class="form-control"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="jenis" id="simpan" value="tambah" class="btn btn-success">Simpan</button>
      </div>
      <!-- </form> -->
      <?= form_close(); ?>
    </div>
  </div>
</div>