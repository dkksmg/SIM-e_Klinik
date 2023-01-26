function batal(noCm, tanggalKunjungan, nama) {
  Swal.fire({
    title: "Apakah anda yakin?",
    text: "anda akan membatalkan kunjungan pasien " + nama,
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
      $.get(base_url + "ajax/confirm/kunjunganBatal", { noCm: noCm, tanggalKunjungan: tanggalKunjungan }, function (data) {
        if (data.status) {
          Swal.fire("Deleted!", "Kunjungan berhasil di batalkan.", "success").then((result) => {
            location.reload();
          });
        } else {
          Swal.fire("Error deleting!", "Silahkan coba beberapa saat lagi.", "Error");
        }
      });
    }
  });
}
