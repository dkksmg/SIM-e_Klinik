function edit(nmDokter,kdDokter){
	console.log('edit');
	$("#nmDokter").val(nmDokter);
	$("#kdDokter").val(kdDokter);
	$("#simpan").val('edit');
	$("#formTambah").modal('show');
}