	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Semua Kegiatan
      <small>promotif</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Promotif</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <a href="<?=base_url('promotif/add');?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Kegiatan</a>
        <hr class="garis"></hr>
        <table class="table table-bordered table-condensed" id="example4">
          <thead>
            <tr>
              <th>No</th>
              <th width="80">Foto</th>
              <th>Judul</th>
              <th>Tanggal Kegiatan</th>
              <th width="470">Deskripsi</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>

            <?php $i=1; foreach ($promotif->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td>
                <?php if ($dt->foto1==NULL) { ?>
                  <img src="dist/img/image-utama.png " alt="" width="70">
                <?php }else{ ?>
                  <img src="<?=base_url().$dt->foto1?> " alt="" width="70">
                <?php } ?>
              </td>
              <td><?=$dt->judul?></td>
              <td><?=$dt->tgl_kegiatan?></td>
              <td><?=$dt->deskripsi?></td>
              <td>
                <a href="<?=base_url('promotif/delete/').$dt->id_promotif;?>" class="btn btn-danger btn-sm btn-flat" data-placement="bottom" data-toggle="tooltip" title="Hapus" onclick="return confirm('Delete <?=$dt->judul;?> ?')"><i class="fa fa-trash"></i></a>
                <a href="<?=base_url('promotif/edit/').$dt->id_promotif;?>" class="btn btn-info btn-sm btn-flat" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="<?=base_url('promotif/detail/').$dt->id_promotif;?>" class="btn btn-warning btn-sm btn-flat" data-placement="bottom" data-toggle="tooltip" title="Detail"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
            
          </tbody>
          <tfoot>
            <th>No</th>
            <th>Foto</th>
            <th>Judul</th>
            <th>Tanggal Kegiatan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tfoot>
        </table>
      </div>
    </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->