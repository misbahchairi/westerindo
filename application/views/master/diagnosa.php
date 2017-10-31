	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Diagnosa
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
              <th>Nama Diagnosa</th>
              <th>Keterangan</th>
              <th>status</th>
              <th width="90">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($diagnosa->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nama?></td>
              <td><?=$dt->keterangan?></td>
              <td>
                <?php if ($dt->is_aktif=="1") {
                  echo '<span class="label label-success">Aktif</span>';
                }elseif ($dt->is_aktif=="2") {
                  echo '<span class="label label-danger">Non Aktif</span>';
                } ?>
              </td>
              <td>
                <a href="<?=base_url('master/diagnosa_delete/').$dt->id_diagnosa;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_diagnosa?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Diagnosa</th>
              <th>Keterangan</th>
              <th>status</th>
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
      <form action="<?=base_url('master/diagnosa_add')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="is_aktif" class="form-control">
              <option value="1">Aktif</option>
              <option value="2">Non Aktif</option>
            </select>
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

<?php foreach ($diagnosa->result() as $dt): ?>
  <div class="modal fade" id="edit-<?=$dt->id_diagnosa?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?=base_url('master/pf_edit/').$dt->id_diagnosa?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?=$dt->nama?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>keterangan</label>
              <textarea name="keterangan" class="form-control"><?=$dt->keterangan?></textarea>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="is_aktif" class="form-control">
                <option value="1" <?php if($dt->is_aktif=="1")echo 'selected'; ?>>Aktif</option>
                <option value="2" <?php if($dt->is_aktif=="2")echo 'selected'; ?>>Non Aktif</option>
              </select>
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