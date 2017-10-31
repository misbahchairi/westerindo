<link rel="stylesheet" type="text/css" href="<?=base_url('assets/dist/')?>js/lightbox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?=base_url('assets/dist/')?>js/lightbox/jquery.fancybox.js"></script>
<?php foreach ($detail->result() as $dt): ?>
<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Detail Kegiatan
      <small>promotif</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Detail</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?=$dt->judul;?></h3>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <tbody>
            <tr>
              <td width="200">Judul</td>
              <td width="10">:</td>
              <td><?=$dt->judul;?></td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td>:</td>
              <td><?=$dt->kategori;?></td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td>:</td>
              <td><?=$dt->deskripsi;?></td>
            </tr>
            <tr>
              <td>Tanggal Kegiatan</td>
              <td>:</td>
              <td><?=$dt->tgl_kegiatan;?></td>
            </tr>
            <?php if ($dt->materi1 != ""): ?>
            <tr>
              <td>Materi 1</td>
              <td>:</td>
              <td>
                <a href="<?=base_url('uploads/materi/').$dt->materi1?>" target="_blank" class="btn btn-success btn-flat btn-xs"><i class="fa fa-download"></i> Download</a>
                &nbsp; <?=$dt->materi1?>
              </td>
            </tr>
            <?php endif ?>
            <?php if ($dt->materi2 != ""): ?>
            <tr>
              <td>Materi 2</td>
              <td>:</td>
              <td>
                <a href="<?=base_url('uploads/materi/').$dt->materi2?>" target="_blank" class="btn btn-success btn-flat btn-xs"><i class="fa fa-download"></i> Download</a>
                &nbsp; <?=$dt->materi2?>
              </td>
            </tr>
            <?php endif ?>
            <?php if ($dt->materi3 != ""): ?>
            <tr>
              <td>Materi 1</td>
              <td>:</td>
              <td>
                <a href="<?=base_url('uploads/materi/').$dt->materi3?>" target="_blank" class="btn btn-success btn-flat btn-xs"><i class="fa fa-download"></i> Download</a>
                &nbsp; <?=$dt->materi3?>
              </td>
            </tr>
            <?php endif ?>
            <tr>
              <td>Gambar <br> <small>*klik untuk memperbesar</small></td>
              <td>:</td>
              <td>
                <?php if ($dt->foto1 != ""): ?>
                  <a href="<?=base_url().$dt->foto1;?>" class="fancybox" rel="detail1"><img src="<?=base_url().$dt->foto1;?>" alt="" style="border:1px solid #ccc;height: 50px;padding:3px;"></a> &nbsp;
                <?php endif ?>
                <?php if ($dt->foto2 != ""): ?>
                  <a href="<?=base_url().$dt->foto2;?>" class="fancybox" rel="detail1"><img src="<?=base_url().$dt->foto2;?>" alt="" style="border:1px solid #ccc;height: 50px;padding:3px;"></a> &nbsp;
                <?php endif ?>
                <?php if ($dt->foto3 != ""): ?>
                  <a href="<?=base_url().$dt->foto3;?>" class="fancybox" rel="detail1"><img src="<?=base_url().$dt->foto3;?>" alt="" style="border:1px solid #ccc;height: 50px;padding:3px;"></a> &nbsp;
                <?php endif ?>
                <?php if ($dt->foto4 != ""): ?>
                  <a href="<?=base_url().$dt->foto4;?>" class="fancybox" rel="detail1"><img src="<?=base_url().$dt->foto4;?>" alt="" style="border:1px solid #ccc;height: 50px;padding:3px;"></a> &nbsp;
                <?php endif ?>
                <?php if ($dt->foto5 != ""): ?>
                  <a href="<?=base_url().$dt->foto5;?>" class="fancybox" rel="detail1"><img src="<?=base_url().$dt->foto5;?>" alt="" style="border:1px solid #ccc;height: 50px;padding:3px;"></a> &nbsp;
                <?php endif ?>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="ktk-abu">
            <a href="javascript:history.go(-1)" class="btn btn-danger btn-flat"><i class="fa fa-long-arrow-left"></i> Kembali</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->
<?php endforeach ?>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
        });
    });
</script>