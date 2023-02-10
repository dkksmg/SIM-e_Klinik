$.ajaxSetup({
  data: csfrData,
});
$("#pasien").DataTable({
  processing: true,
  serverSide: true,
  ajax: {
    url: base_url + "ajax/datatable/pasien",
    type: "POST",
    data: { csrf_sim_klinik: $("input[name=csrf_sim_klinik]").val() },
    data: function (d) {
      d.csrf_sim_klinik = $("input[name=csrf_sim_klinik]").val();
    },
    dataSrc: function (response) {
      $("input[name=csrf_sim_klinik]").val(response.csrf_sim_klinik);
      return response.data;
    },
  },
});
