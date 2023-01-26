function edit(nmObat, kdObat, tarif) {
  console.log("edit");
  $("#nmObat").val(nmObat);
  $("#kdObat").val(kdObat);
  $("#tarif").val(tarif);
  $("#simpan").val("edit");
  $("#formTambah").modal("show");
}
function hapus(nmObat, kdObat, id) {
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "anda akan menghapus obat '" + nmObat + "' dengan kode " + kdObat,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus",
  }).then((result) => {
    if (result.value) {
      $.ajaxSetup({
        data: csfrData,
      });
      $.get(base_url + "ajax/confirm/obatHapus", { id: id }, function (data) {
        if (data.status) {
          Swal.fire("Deleted!", "Obat berhasil dihapus.", "success").then((result) => {
            location.reload();
          });
        } else {
          Swal.fire("Error deleting!", "Silahkan coba beberapa saat lagi.", "Error");
        }
      });
    }
  });
}
