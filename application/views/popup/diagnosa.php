<div class="modal" id="diagnosaDaftar" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Diagnosa - ICD-10</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="DiagnosaTable">
          <thead>
            <tr>
              <th>ICD</th>
              <th>Diagnosa</th>
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
  "ajax": "<?=site_url('popup/diagnosa/datatable/')?>"
});
function input(kode,diagnosa){
  console.log(diagnosa);
  $('#icdx<?=$ke;?>').val(kode);
  $('#penyakit<?=$ke;?>').val(diagnosa);
  $('#diagnosaDaftar').modal('hide');
}
</script>