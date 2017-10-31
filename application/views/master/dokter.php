	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Dokter
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
              <th>Nama</th>
              <th>Spesialis</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Status</th>
              <th>Ket</th>
              <th>Foto</th>
              <th width="55">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($dokter->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nama?></td>
              <td><?=$dt->spesialis?></td>
              <td><?=$dt->alamat?></td>
              <td><?=$dt->email?></td>
              <td><?=$dt->no_telp?></td>
              <td>
                <?php if ($dt->is_aktif=="1") {
                  echo '<span class="label label-success">Aktif</span>';
                }elseif ($dt->is_aktif=="2") {
                  echo '<span class="label label-danger">Non Aktif</span>';
                } ?>  
              </td>
              <td><?=$dt->keterangan?></td>
              <td><a data-toggle="modal" href='#show-<?=$dt->id_dokter?>' class="btn btn-success btn-xs btn-flat"><i class="fa fa-search-plus"></i> Show</a></td>
              <td>
                <a href="<?=base_url('master/dokter_delete/').$dt->id_dokter;?>" class="btn btn-danger btn-xs btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_dokter?>' class="btn btn-info btn-xs btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Spesialis</th>
              <th>Alamat</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Status</th>
              <th>Ket</th>
              <th>Foto</th>
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
      <form enctype="multipart/form-data" action="<?=base_url('master/dokter_add')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Spesialis</label>
            <input type="text" name="spesialis" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input type="number" name="no_telp" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="is_aktif" class="form-control">
              <option value="1">Aktif</option>
              <option value="2">Non Aktif</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>foto</label>
            <input type="file" name="foto" value="" placeholder="" class="form-control">
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

<?php foreach ($dokter->result() as $dt): ?>
  <div class="modal fade" id="edit-<?=$dt->id_dokter?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form enctype="multipart/form-data" action="<?=base_url('master/dokter_edit/').$dt->id_dokter?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?=$dt->nama?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Spesialis</label>
              <input type="text" name="spesialis" value="<?=$dt->spesialis?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control"><?=$dt->alamat?></textarea>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" value="<?=$dt->email?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>No Telepon</label>
              <input type="number" name="no_telp" value="<?=$dt->no_telp?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="is_aktif" class="form-control">
                <option value="1" <?php if($dt->is_aktif=="1")echo 'selected'; ?>>Aktif</option>
                <option value="2" <?php if($dt->is_aktif=="2")echo 'selected'; ?>>Non Aktif</option>
              </select>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" class="form-control"><?=$dt->keterangan?></textarea>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" value="<?=$dt->username?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Password Baru</label>
              <input type="password" name="password" value="" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>foto</label>
              <input type="file" name="foto" value="" placeholder="" class="form-control">
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

  <div class="modal fade" id="show-<?=$dt->id_dokter?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><?=$dt->nama?></h4>
        </div>
        <div class="modal-body">
          <center><img src="<?=base_url().'/'.$dt->foto;?>" alt="" class="img-responsive"></center>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>