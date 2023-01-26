<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Daftar Obat </h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered datatable" id="dokter">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Tarif </th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($ref) {
                $no = 1;
                foreach ($ref as $key => $value) {
                  echo "<tr><td>" . $no . "</td>
                <td>" . $value['kdObat'] . "</td>
                <td>" . $value['nmObat'] . "</td>
                <td>" . $value['tarif'] . "</td>
                <td>
                  <button onclick=\"edit('" . $value['nmObat'] . "','" . $value['kdObat'] . "','" . $value['tarif'] . "')\" class='btn btn-warning'>Edit</button>
                  <button onclick=\"hapus('" . $value['nmObat'] . "','" . $value['kdObat'] . "','" . $value['ID'] . "')\" class='btn btn-danger'>Hapus</button>
                </td><tr>";
                  $no++;
                }
              } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formTambah">Tambah Obat
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('', array('class' => 'form-horizontal', 'role' => 'form')); ?>
      <div class="modal-body">
        <table>
          <tr>
            <th>Kode Obat</th>
            <td>:</td>
            <td><input type="text" name="kdObat" id="kdObat" class="form-control"></td>
          </tr>
          <tr>
            <th>Nama Obat</th>
            <td>:</td>
            <td><input type="text" name="nmObat" id="nmObat" class="form-control"></td>
          </tr>
          <tr>
            <th>Tarif</th>
            <td>:</td>
            <td><input type="number" name="tarif" id="tarif" class="form-control"></td>
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