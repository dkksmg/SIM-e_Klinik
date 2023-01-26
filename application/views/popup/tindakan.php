<div class="modal" id="tindakanDaftar" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tindakan - ICD-10</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="TindakanTable">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Tindakan</th>
              <th>Max Tarif</th>
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
$("#TindakanTable").dataTable().fnDestroy();
$('#TindakanTable').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": "<?=site_url('popup/tindakan/datatable/')?>"
});
function input(kode,tindakan){
  console.log(tindakan);
  $('#kodeTindakan<?=$ke;?>').val(kode);
  $('#Tindakan<?=$ke;?>').val(tindakan);
  $('#tindakanDaftar').modal('hide');
}
</script>