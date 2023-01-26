<div class="modal" id="obatDaftar" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Daftar Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="DiagnosaTable">
          <thead>
            <tr>
              <th>Kode Obat</th>
              <th>Nama Obat</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- <script type="text/javascript" src="<?php echo base_url('asset/plugins/datatables/jquery.dataTables.min.js');?>"></script> -->
<script type="text/javascript">
$("#DiagnosaTable").dataTable().fnDestroy();
$('#DiagnosaTable').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": "<?=site_url('popup/obat/datatable/')?>"
});
function input(kode,obat){
  console.log(obat);
  $('#obat<?=$ke;?>').val(kode);
  $('#namaObat<?=$ke;?>').val(obat);
  $('#obatDaftar').modal('hide');
}
</script>