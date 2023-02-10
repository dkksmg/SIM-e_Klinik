// $.ajaxSetup({
//   data: csfrData,
// });
$("#klinik").DataTable({
  processing: true,
  serverSide: true,
  stateSave: true,
  ajax: {
    url: base_url + "ajax/datatable/users",
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
  columnDefs: [
    {
      targets: 0, // your case first column
      className: "text-center",
    },
    {
      targets: 1, // your case first column
      className: "text-center",
    },
    {
      targets: 2, // your case first column
      className: "text-justify",
    },
    {
      targets: 3, // your case first column
      className: "text-center",
    },
    {
      targets: 4, // your case first column
      className: "text-center",
    },
    {
      targets: 5, // your case first column
      className: "text-center",
    },
  ],
});
