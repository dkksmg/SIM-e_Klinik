$.ajaxSetup({
  data: csfrData,
});
$("#pasien").DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: base_url + "ajax/datatable/pasien",
    type: "POST",
  },
});
