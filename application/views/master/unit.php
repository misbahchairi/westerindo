	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Unit
      <small>master data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Master Data</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <a data-toggle="modal" href='#tambah' class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
        <hr class="garis"></hr>
        <table class="table table-bordered table-condensed" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Unit</th>
              <th>Nama Unit</th>
              <th width="90">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($unit->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->kode?></td>
              <td><?=$dt->nama?></td>
              <td>
                <a href="<?=base_url('master/unit_delete/').$dt->id_unit;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_unit?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kode Unit</th>
              <th>Nama Unit</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form action="<?=base_url('master/unit_add')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Unit</label>
            <input type="text" name="kode" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Unit</label>
            <input type="text" name="nama" value="" placeholder="" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($unit->result() as $dt): ?>
  <div class="modal fade" id="edit-<?=$dt->id_unit?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?=base_url('master/unit_edit/').$dt->id_unit?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Kode Unit</label>
              <input type="text" name="kode" value="<?=$dt->kode?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Unit</label>
              <input type="text" name="nama" value="<?=$dt->nama?>" placeholder="" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>