<style type="text/css">
  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #d2d6de;
    border-radius: 0px;
    height: 35px;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Edit Kegiatan
      <small>promotif</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Promotif</a></li>
      <li class="active">Edit Kegiatan</li>
    </ol>
  </section>
  <?php foreach ($promotif->result() as $dt): ?>
  <!-- Main content -->
  <section class="content">
    <form enctype="multipart/form-data" action="<?php echo base_url('promotif/editproses/').$dt->id_promotif;?>" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary box-tmbh">   
            <div class="box-body">
              <div class="row">
                <div class="col-md-9">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Judul</span>
                      <input type="text" class="form-control" name="judul" placeholder="" value="<?=$dt->judul;?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Deskripsi</span>
                      <textarea name="deskripsi" class="form-control"><?=$dt->deskripsi;?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Kategori</span>
                      <select name="idkategori" id="inputKategori" class="select2 form-control ">
                        <?php foreach ($kategori as $kategori) { ?>
                        <option value="<?= $kategori->id ?>" <?= ($dt->idkategori == $kategori->id) ? "selected" : "" ; ?>><?= $kategori->kategori ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Tanggal Kegiatan</span>
                      <input type="text" class="form-control date" name="tgl_kegiatan" placeholder="" value="<?= $dt->tgl_kegiatan ?>">
                    </div>
                  </div>
  
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Upload Materi 1</span>
                      <input id="materi1" type="file" class="form-control" name="materi1" placeholder="" value="<?=$dt->materi1?>">
                        <?php if ($dt->materi1!=""): ?>
                          <span class="input-group-addon addon2">
                          <?=$dt->materi1?> &nbsp;<a href="<?=base_url('promotif/delmateri')?>?id=<?=$dt->id_promotif?>&materi=materi1" onclick="return confirm('Delete materi 1 ?')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-close"></i></a>
                          </span>
                        <?php endif ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Upload Materi 2</span>
                      <input type="file" class="form-control" name="materi2" placeholder="">
                        <?php if ($dt->materi2!=""): ?>
                          <span class="input-group-addon addon2">
                          <?=$dt->materi2?> &nbsp;<a href="<?=base_url('promotif/delmateri')?>?id=<?=$dt->id_promotif?>&materi=materi2" onclick="return confirm('Delete materi 2 ?')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-close"></i></a>
                          </span>
                        <?php endif ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">Upload Materi 3</span>
                      <input type="file" class="form-control" name="materi3" placeholder="">
                        <?php if ($dt->materi3!=""): ?>
                          <span class="input-group-addon addon2">
                          <?=$dt->materi3?> &nbsp;<a href="<?=base_url('promotif/delmateri')?>?id=<?=$dt->id_promotif?>&materi=materi3" onclick="return confirm('Delete materi 3 ?')" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-close"></i></a>
                          </span>
                        <?php endif ?>
                    </div>
                  </div>

                </div>
                <?php
                if (!file_exists($dt->foto1)) $foto1="assets/dist/img/image-utama.png";
                else $foto1=$dt->foto1;
                if (!file_exists($dt->foto2)) $foto2="assets/dist/img/image-utama.png";
                else $foto2=$dt->foto2;
                if (!file_exists($dt->foto3)) $foto3="assets/dist/img/image-utama.png";
                else $foto3=$dt->foto3;
                if (!file_exists($dt->foto4)) $foto4="assets/dist/img/image-utama.png";
                else $foto4=$dt->foto4;
                if (!file_exists($dt->foto5)) $foto5="assets/dist/img/image-utama.png";
                else $foto5=$dt->foto5;
                ?>
                <div class="col-md-3">
                  <div class="box-imgs">
                    <div class="">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="main_image" >
                            <div class="nm-imgs">Image Utama</div>
                            <div class="ktk-imgs">
                              <span class="helper-imgs"></span>
                              <img id="img1" src="<?= base_url($foto1)?>" class="imgs-responsive" data-placement="left" data-toggle="tooltip" title="Click image to upload file">
                              <a href="<?=base_url('promotif/delfoto')?>?id=<?=$dt->id_promotif?>&foto=foto1" onclick="return confirm('Delete Foto 1 ?')" class="btn btn-warning btn-delete"><i class="fa fa-remove"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="main_image2">  
                            <div class="ktk-imgs2">
                              <span class="helper-imgs"></span>
                              <img id="img2" src="<?= base_url($foto2)?>" class="imgs2-responsive" alt="" data-toggle="tooltip" title="Click image to upload file">
                              <a href="<?=base_url('promotif/delfoto')?>?id=<?=$dt->id_promotif?>&foto=foto2" onclick="return confirm('Delete Foto 2 ?')" class="btn btn-warning btn-delete"><i class="fa fa-remove"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="main_image2">
                            <div class="ktk-imgs2">
                              <span class="helper-imgs"></span>
                              <img id="img3" src="<?= base_url($foto3)?>" class="imgs2-responsive" alt="" data-toggle="tooltip" title="Click image to upload file">
                              <a href="<?=base_url('promotif/delfoto')?>?id=<?=$dt->id_promotif?>&foto=foto3" onclick="return confirm('Delete Foto 3 ?')" class="btn btn-warning btn-delete"><i class="fa fa-remove"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="main_image2">
                            <div class="ktk-imgs2">
                              <span class="helper-imgs"></span>
                              <img id="img4" src="<?= base_url($foto4)?>" class="imgs2-responsive" alt="" data-toggle="tooltip" title="Click image to upload file">
                              <a href="<?=base_url('promotif/delfoto')?>?id=<?=$dt->id_promotif?>&foto=foto4" onclick="return confirm('Delete Foto 4 ?')" class="btn btn-warning btn-delete"><i class="fa fa-remove"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="main_image2">
                            <div class="ktk-imgs2">
                              <span class="helper-imgs"></span>
                              <img id="img5" src="<?= base_url($foto5)?>" class="imgs2-responsive" alt="" data-toggle="tooltip" title="Click image to upload file">
                              <a href="<?=base_url('promotif/delfoto')?>?id=<?=$dt->id_promotif?>&foto=foto5" onclick="return confirm('Delete Foto 5 ?')" class="btn btn-warning btn-delete"><i class="fa fa-remove"></i></a>
                            </div>
                          </div>
                        </div>
                          <div class="col-sm-12">
                            <span>*Ukuran maksimal foto <span style="color:red">400 kb</span><br>*Dimensi yg disarankan : 400px x 500px</span>
                          </div> 
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="ktk-abu">
                <a href="<?=base_url('promotif');?>" class="btn btn-danger btn-flat"><i class="fa fa-long-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i> Edit Kegiatan</button>
              </div>
            </div><!-- /.box-body -->
          </div>
        </div>
      </div>
      <input style="visibility:hidden" type="file" name="foto1" id="foto1" />
      <input style="visibility:hidden" type="file" name="foto2" id="foto2" />
      <input style="visibility:hidden" type="file" name="foto3" id="foto3" />
      <input style="visibility:hidden" type="file" name="foto4" id="foto4" />
      <input style="visibility:hidden" type="file" name="foto5" id="foto5" />
    </form>
  </section><!-- /.content -->
  <?php endforeach ?>

</div><!-- /.content-wrapper -->

<script>
      function removeimage(id,nama){
        var val="<?= base_url();?>/assets/dist/img/image-utama.png";
            
        var con = confirm("yakin melakukan delete foto"+id+" ????");  
        if(con == true){
          document.getElementById("img"+id).src = val;
          
          $.ajax({
            type: 'post',
            cache: false,
            data:{path:nama},
            success: function (result) {
             // $("#resultemail").html(result);
            }
          });
        }
      }  
</script>
<script type="text/javascript">
  function readURL1(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#img1').attr('src', e.target.result);
                  var btn = document.createElement("BUTTON");
                 
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
      function readURL2(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#img2').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
      function readURL3(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#img3').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
      function readURL4(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#img4').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
      function readURL5(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#img5').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
      function readURLPage(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#pageimg').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

$(document).ready(function(){
    $("#img1").click(function(){
        $("input[name=foto1]").trigger('click');
    });
    $("#foto1").change(function(value){
       readURL1(this); 
    });

    $("#img2").click(function(){
        $("input[name=foto2]").trigger('click');
    });
    $("#foto2").change(function(value){
       readURL2(this); 
    });

    $("#img3").click(function(){
        $("input[name=foto3]").trigger('click');
    });
    $("#foto3").change(function(value){
       readURL3(this); 
    });

    $("#img4").click(function(){
        $("input[name=foto4]").trigger('click');
    });
    $("#foto4").change(function(value){
       readURL4(this); 
    });

    $("#img5").click(function(){
        $("input[name=foto5]").trigger('click');
    });
    $("#foto5").change(function(value){
       readURL5(this); 
    });
     $("#pageimg").click(function(){
        $("input[name=pagefoto]").trigger('click');
    });
    $("#pagefoto").change(function(value){
       readURLPage(this); 
    });
   
});
</script>