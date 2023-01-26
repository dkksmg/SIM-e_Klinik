
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catatan Medik</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isi Data</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
             
 <!-- DATA PASIEN -->
               <form method="post" rule="form"> 
                <div class="card-body">


                  <div class="form-group row">
                    <label class="col-1 control-label">No_Reg</label>
                     <div class="col-5">
                      <input type="text" name="no_reg" class="form-control"  placeholder="no_reg" value="<?=$pasien['no_reg']?>">
                    </div > 
                    <label class="col-1 control-label" >Nama Pasien</label>
                   <div class="col-5">
                      <input type="text" name="nama" class="form-control" placeholder="nama" value="<?=$pasien['nama']?>">
                    </div >     
                  </div>
                   
                    <div class="form-group row">
                    <label class="col-1 control-label">Kesadaran</label>
                     <div class="col-5">
                       <input type="text" name="kesadaran" class="form-control"  placeholder="Kesadaran">
                    </div > 
                    <label class="col-1 control-label">Berat Badan</label>
                   <div class="col-5">
                       <input type="text" name="bb" class="form-control"  placeholder="Berat_badan">
                    </div >     
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">TInggi Badan</label>
                     <div class="col-5">
                       <input type="text" name="tb" class="form-control"  placeholder="Tinggi_badan">
                    </div > 
                    <label class="col-1 control-label">detak jantung Rate</label>
                   <div class="col-5">
                        <input type="text" name="respiratory_rate" class="form-control"  placeholder="Respiratory_rate">
                    </div >     
                  </div>

                   <div class="form-group row">
                    <label class="col-1 control-label">Pemeriksaan Fisik</label>
                     <div class="col-5">
                       <input type="text" name="pemeriksaan_fisik" class="form-control"  placeholder="Pemeriksaan_fisik">
                    </div > 
                    <label class="col-1 control-label">Suhu</label>
                   <div class="col-5">
                        <input type="text" name="suhu" class="form-control"  placeholder="suhu">
                    </div >     
                  </div>

                  <div class="form-group row">
                    <label  class="col-1 control-label">Tekanan Darah</label>
                   <div class="col-1">
                      <input type="text" class="form-control" name="tekanan_darah1">
                    </div > /
                    <div class="col-1">
                      <input type="text" class="form-control" name="tekanan_darah2">
                    </div>  
                                    
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label">Penyakit</label>
                     <div class="col-5">
                       <input type="text" name="penyakit" class="form-control"  placeholder="Penyakit">
                    </div > 
                    <label class="col-1 control-label">Tindakan</label>
                   <div class="col-5">
                        <input type="text" name="tindakan" class="form-control" id="exampleInputEmail1" placeholder="Tindakan">
                    </div >     
                  </div>

                <div class="form-group row">
                    <label class="col-1 control-label">Alergi</label>
                     <div class="col-5">
                       <input type="text" name="alergi" class="form-control"  placeholder="Alergi">
                    </div > 
                     <label class="col-1 control-label">Heart Rate</label>
                    <div class="col-3">
                      <input type="text" name="heart_rate" class="form-control"  placeholder="Heart_rate">
                    </div>      
                  </div>
                  
                               
                  
                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 control-label">Kode Obat</label>
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Obat</label>
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Obat</label>
                  <label for="inputPassword3" class="col-sm-2 control-label">Aturan Pakai</label>
                  <label for="inputPassword3" class="col-sm-2 control-label">Exp Obat </label>
                </div>

                <div id="Obat"> 
                <?php $no=1; ?>    

                  <div class="form-group row" id="RowObat<?php echo $no;?>">
                    <div class="col-2">
                      <input type="text" class="form-control" name="kode_obat[]">
                    </div>
                    <div class="col-2">
                      <input type="text" class="form-control" name="nama_obat[]">
                    </div>                    
                    <div class="col-2">
                      <input type="text" class="form-control" name="jml_obat[]">
                    </div>                    
                    <div class="col-2">
                      <input type="text" class="form-control"name="aturan_pakai[]">
                    </div>    
                     <div class="col-2">
                      <input type="text" class="form-control" name="exp_obat[]">
                    </div>

                                    
                
                  <div class="col-1"><a href="javascript:void(0)" onclick="addObat(<?php echo $no+1;?>)" id="actObat<?php echo $no;?>" class="btn btn-sm btn-info">tambah</a></div>                    
                  </div>
                  </div>        

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
         

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  
 <script type="text/javascript">
  function addObat(ke) {
  last=ke-1;next=ke+1;
  var obt ='<div class="form-group row" id="RowObat'+ke+'"><div class="col-2"><input type="text" name="kode_obat[]" class="form-control"></div><div class="col-2"><input type="text" name="nama_obat[]" class="form-control"></div><div class="col-2"><input type="text" name="jml_obat[]" class="form-control"></div><div class="col-2"><input type="text" name="aturan_pakai[]" class="form-control"></div><div class="col-2"><input type="text" name="exp_obat[]" class="form-control"></div><div class="col-1"></div><div class="col-1"><a href="javascript:void(0)" onclick="addObat('+next+')" id="actObat'+ke+'" class="btn btn-sm btn-info">tambah</a></div></div>';
  $('#Obat').append(obt)
  $('#actObat'+last).attr('onclick','hapusObat('+last+')');
  $('#actObat'+last).html('delete');
}
function hapusObat(ke) {
  console.log('hapusObat');
  $('#RowObat'+ke).remove();
}
</script>  