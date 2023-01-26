if ($("#beratBadan").val() != "") {
  IMT();
}
if ($("#icdx1").val() != "") {
  diagnosaName($("#icdx1").val(), 1);
}
if ($("#icdx2").val() != "") {
  diagnosaName($("#icdx2").val(), 2);
}
if ($("#icdx3").val() != "") {
  diagnosaName($("#icdx3").val(), 3);
}
if ($("#idCm").val()) {
  historyObat($("#noCm").val(), $("#idCm").val());
  historyTindakan($("#noCm").val(), $("#idCm").val());
}
function IMT() {
  bb = $("#beratBadan").val();
  tb = $("#tinggiBadan").val();
  tb = tb / 100;
  imt = (bb / (tb * tb)).toFixed(2);
  console.log(imt);
  $("#imt").val(imt);
}
function diagnosaName(icd, ke) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "ajax/kamus/diagnosa", { icd: icd }, function (data) {
    if (data.status) {
      $("#penyakit" + ke).val(data.data.nmDiag);
    } else {
      $("#penyakit" + ke).val("");
      $("#icdx" + ke).val("");
      alert("Kode diagnosa dimasukan salah");
      $("#icdx" + ke).focus();
    }
  });
}
function diagnosaDaftar(ke) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "popup/diagnosa/tampil/" + ke, function (data) {
    $("#Popup").html(data);
    $("#diagnosaDaftar").modal("show");
  });
}
function tambahDiagnosa() {
  ke = $("#btnTambahDiag").attr("data-diagNext");
  if (ke == 2) {
    $("#btnTambahDiag").attr("data-diagNext", "3");
  } else {
    $("#btnTambahDiag").prop("disabled", true);
  }
  $("#icdRow" + ke).show();
}
function hideDiagnosa(ke) {
  $("#icdx" + ke).val("");
  $("#penyakit" + ke).val("");
  $("#icdRow" + ke).hide();
  $("#btnTambahDiag").attr("data-diagNext", ke);
  $("#btnTambahDiag").prop("disabled", false);
  if (ke == 3 && $("#icdx2").is(":hidden")) {
    $("#btnTambahDiag").attr("data-diagNext", "2");
  }
}

function tindakanDaftar(ke) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "popup/tindakan/tampil/" + ke, function (data) {
    $("#Popup").html(data);
    $("#tindakanDaftar").modal("show");
  });
}

function tambahTindakan(ke) {
  next = ke + 1;
  append =
    '<div id="RowTindakan' +
    ke +
    '"><div class="input-group">' +
    '<input type="text" id="kodeTindakan' +
    ke +
    '" name="tindakan[]" value="" class="form-control" style="max-width: 16%">' +
    '<input type="text" id="Tindakan' +
    ke +
    '" value="" class="form-control" readonly>' +
    '<div class="input-group-append">' +
    '<button class="btn btn-outline-secondary" type="button" onclick="tindakanDaftar(' +
    ke +
    ')">...</button>' +
    '<button class="btn btn-outline-secondary" type="button" onclick="hapusTindakan(' +
    ke +
    ')">-</button>' +
    "</div></div></div>";
  console.log("append" + ke);
  $("#RowTindakan").append(append);
  $("#tambahTindakanId").attr("onclick", "tambahTindakan(" + next + ")");
}
function hapusTindakan(ke) {
  console.log("hapus" + ke);
  $("#RowTindakan" + ke).remove();
}

function obatDaftar(ke) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "popup/obat/tampil/" + ke, function (data) {
    $("#Popup").html(data);
    $("#obatDaftar").modal("show");
  });
}
function tambahObat(ke) {
  next = ke + 1;
  append =
    '<div id="RowObat' +
    ke +
    '"><div class="input-group">' +
    '<input type="text" id="obat' +
    ke +
    '" name="obat[]" value="" class="form-control" style="max-width: 16%">' +
    '<input type="text" id="namaObat' +
    ke +
    '" value="" class="form-control" readonly>' +
    '<div class="input-group-append">' +
    '<button class="btn btn-outline-secondary" type="button" onclick="obatDaftar(' +
    ke +
    ')">...</button>' +
    '<button class="btn btn-outline-secondary" type="button" onclick="hapusObat(' +
    ke +
    ')">-</button>' +
    '</div></div><div class="input-group">' +
    'Dosis : <input type="text" id="dosis' +
    ke +
    '" name="dosis[]" class="form-control">' +
    'Jumlah : <input type="text" id="jumlah' +
    ke +
    '" name="jumlah[]" class="form-control">' +
    "</div></div>";
  console.log("append" + ke);
  $("#RowObat").append(append);
  $("#tambahObatId").attr("onclick", "tambahObat(" + next + ")");
}
function hapusObat(ke) {
  console.log("hapus" + ke);
  $("#RowObat" + ke).remove();
}

function historyObat(noCm, id) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "ajax/history/obat", { noCm: noCm, id: id }, function (data) {
    obat = data.data;
    if (data.status) {
      for (var i = 0; i < obat.length; i++) {
        j = i + 1;
        if (j > 1) {
          tambahObat(j);
        }
        $("#obat" + j).val(obat[i]["obat"]);
        $("#dosis" + j).val(obat[i]["dosis"]);
        $("#jumlah" + j).val(obat[i]["jumlah"]);
        namaObat(obat[i]["obat"], "#namaObat" + j);
      }
    } else {
      console.log("baru");
    }
  });
}
function historyTindakan(noCm, id) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "ajax/history/tindakan", { noCm: noCm, id: id }, function (data) {
    tindakan = data.data;
    if (data.status) {
      for (var i = 0; i < tindakan.length; i++) {
        j = i + 1;
        if (j > 1) {
          tambahTindakan(j);
        }
        $("#kodeTindakan" + j).val(tindakan[i]["tindakan"]);
        namaTindakan(tindakan[i]["tindakan"], "#Tindakan" + j);
      }
    } else {
      console.log("baru");
    }
  });
}
function namaTindakan(tindakan, id) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "ajax/kamus/tindakan", { tindakan: tindakan }, function (data) {
    $(id).val(data.data.nmTindakan);
  });
}
function namaObat(obat, id) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "ajax/kamus/obat", { obat: obat }, function (data) {
    $(id).val(data.data.nmObat);
  });
}
