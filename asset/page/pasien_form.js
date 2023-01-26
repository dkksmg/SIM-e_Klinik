$(":input").inputmask();
updateWilayah("kecamatan", "kota", $("#kota").val(), $("#kecamatan").val());
updateWilayah("kelurahan", "kecamatan", $("#kecamatan").val(), $("#kelurahan").val());
function updateWilayah(cari, parent, parentId, select) {
  $.ajaxSetup({
    data: csfrData,
  });
  $.get(base_url + "ajax/wilayah", { cari: cari, parent: parent, parentId: parentId }, function (data) {
    if (data.status) {
      var opt = "<option></option>";
      ret = data.data;
      for (var i = 0; i < ret.length; i++) {
        var selected = "";
        if (select == ret[i]["ID"]) {
          var selected = "selected";
        }
        opt += "<option value='" + ret[i]["ID"] + "' " + selected + ">" + ret[i][cari] + "</option>";
        console.log(data.data["ID"]);
      }
      $("#" + cari).html(opt);
    }
  });
}
