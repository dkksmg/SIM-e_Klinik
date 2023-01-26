function edit(nmTindakan, kdTindakan, tarif) {
  console.log("edit");
  $("#nmTindakan").val(nmTindakan);
  $("#kdTindakan").val(kdTindakan);
  $("#tarif").val(tarif);
  $("#simpan").val("edit");
  $("#formTambah").modal("show");
}

function hapus(nmTindakan, kdTindakan, id) {
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "anda akan menghapus tindakan '" + nmTindakan + "' dengan kode " + kdTindakan,
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
      $.get(base_url + "ajax/confirm/tindakanHapus", { id: id }, function (data) {
        if (data.status) {
          Swal.fire("Deleted!", "Tindakan berhasil dihapus.", "success").then((result) => {
            location.reload();
          });
        } else {
          Swal.fire("Error deleting!", "Silahkan coba beberapa saat lagi.", "Error");
        }
      });
    }
  });
}
