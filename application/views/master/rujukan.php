	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Rujukan
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
              <th>Nama RS / DR</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Email</th>
              <th>Ket</th>
              <th>Status</th>
              <th width="90">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($rujukan->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nama_rs_dr?></td>
              <td><?=$dt->alamat?></td>
              <td><?=$dt->no_telp?></td>
              <td><?=$dt->email?></td>
              <td><?=$dt->keterangan?></td>
              <td>
                <?php if ($dt->is_aktif=="1") {
                  echo '<span class="label label-success">Aktif</span>';
                }elseif ($dt->is_aktif=="2") {
                  echo '<span class="label label-danger">Non Aktif</span>';
                } ?>
              </td>
              <td>
                <a href="<?=base_url('master/rujukan_delete/').$dt->id_rujukan;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama_rs_dr;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_rujukan?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama RS / DR</th>
              <th>Alamat</th>
              <th>No Telp</th>
              <th>Email</th>
              <th>Ket</th>
              <th>Status</th>
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
      <form action="<?=base_url('master/rujukan_add')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama RS / DR</label>
            <input type="text" name="nama_rs_dr" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="number" name="no_telp" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
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

<?php foreach ($rujukan->result() as $dt): ?>
  <div class="modal fade" id="edit-<?=$dt->id_rujukan?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?=base_url('master/rujukan_edit/').$dt->id_rujukan?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama RS / DR</label>
              <input type="text" name="nama_rs_dr" value="<?=$dt->nama_rs_dr?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control"><?=$dt->alamat?></textarea>
            </div>
            <div class="form-group">
              <label>No Telepon</label>
              <input type="number" name="no_telp" value="<?=$dt->no_telp?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" value="<?=$dt->email?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
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