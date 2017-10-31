	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Semua Kegiatan
      <small>preventif</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Preventif</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <a href="<?=base_url('preventif/add')?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Kegiatan</a>
        <hr class="garis"></hr>
        <table class="table table-bordered table-condensed" id="example4">
          <thead>
            <tr>
              <th>No</th>
              <th width="80">Foto</th>
              <th>Kategori</th>
              <th>Judul</th>
              <!-- <th>Tanggal Kegiatan</th> -->
              <th>Reccurent</th>
              <th width="320">Deskripsi</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($preventif->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td>
                <?php if ($dt->foto1==NULL) { ?>
                  <img src="<?=base_url()?>/assets/dist/img/image-utama.png " alt="" width="70">
                <?php }else{ ?>
                  <img src="<?=base_url().$dt->foto1?> " alt="" width="70">
                <?php } ?>
              </td>
              <td><?=$dt->kategori?></td>
              <td><?=$dt->judul?></td>
              <!-- <td><?=$dt->tgl_kegiatan?></td> -->
              <td>
                <?php 
                  if ($dt->reccurent=="7") {
                    echo "Mingguan";
                  }  elseif ($dt->reccurent=="30") {
                    echo "Bulanan";
                  }  elseif ($dt->reccurent=="90") {
                    echo "3 Bulan";
                  }  elseif ($dt->reccurent=="180") {
                    echo "Semesteran";
                  }  elseif ($dt->reccurent=="365") {
                    echo "Tahunan";
                  }
                ?>
              </td>
              <td><?=$dt->deskripsi?></td>
              <td>
                <a href="<?=base_url('preventif/delete/').$dt->id_preventif;?>" class="btn btn-danger btn-sm btn-flat" data-placement="bottom" data-toggle="tooltip" title="Hapus" onclick="return confirm('Delete <?=$dt->judul;?> ?')"><i class="fa fa-trash"></i></a>
                <a href="<?=base_url('preventif/edit/').$dt->id_preventif;?>" class="btn btn-info btn-sm btn-flat" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="<?=base_url('preventif/detail/').$dt->id_preventif;?>" class="btn btn-warning btn-sm btn-flat" data-placement="bottom" data-toggle="tooltip" title="Detail"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <th>No</th>
            <th>Foto</th>
            <th>Judul</th>
            <!-- <th>Tanggal Kegiatan</th> -->
            <th>Reccurent</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tfoot>
        </table>
      </div>
    </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->