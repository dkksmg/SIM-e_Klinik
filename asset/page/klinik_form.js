$(document).ready(function () {
  $.ajaxSetup({
    data: csfrData,
  });
  $("[name=kode]").on("change", function () {
    var value = $(this).val();
    $.ajax({
      type: "POST",
      url: base_url + "ajax/datatable/cekklinik",
      data: {
        [csrfName]: csrfHash,
        data: value,
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        csrfName = data.data.csrfName;
        csrfHash = data.data.csrfHash;
        if (data.status != false || data.data != null) {
          $("[name=csrf_sim_klinik]").val(csrfHash);
          $("[name=nama]").val(data.data.nama_faskes);
          $("[name=email]").val(data.data.email_faskes);
          $("[name=password]").val(data.data.kode_faskes);
        } else {
          $("[name=" + csrfName + "]").val(csrfHash);
          $("[name=nama]").val("");
          $("[name=email]").val("");
          $("[name=password]").val("");
          alert("Data Tidak Ditemukan");
        }
      },
      error: function () {
        alert("Data Tidak Ditemukan");
      },
    });
  });
});
