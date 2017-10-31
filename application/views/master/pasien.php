	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Pasien
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
              <th>NIK</th>
              <th>Nama</th>
              <th>Umur</th>
              <th>Sex</th>
              <th>Separtment</th>
              <th>Group</th>
              <th>Status</th>
              <th width="90">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($pasien->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nik?></td>
              <td><?=$dt->nama?></td>
              <td><?=$dt->umur?></td>
              <td>
                <?php if ($dt->sex=="l") {
                  echo 'Pria';
                }elseif ($dt->sex=="p") {
                  echo 'Wanita';
                } ?>  
              </td>
              <td><?=$dt->separtment?></td>
              <td><?=$dt->group?></td>
              <td>
                <?php if ($dt->status_pgw=="tetap") {
                  echo '<span class="label label-info">Tetap</span>';
                }elseif ($dt->status_pgw=="kontrak") {
                  echo '<span class="label label-primary">Kontrak</span>';
                } ?>  
              </td>
              <td>
                <a href="<?=base_url('master/pasien_delete/').$dt->id_pasien;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_pasien?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Umur</th>
              <th>Sex</th>
              <th>Separtment</th>
              <th>Group</th>
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
      <form action="<?=base_url('master/pasien_add')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>NIK</label>
            <input type="number" name="nik" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Umur</label>
            <input type="text" name="umur" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Sex</label>
            <select name="sex" class="form-control">
              <option value="l">Pria</option>
              <option value="p">Wanita</option>
            </select>
          </div>
          <div class="form-group">
            <label>Separtment</label>
            <input type="text" name="separtment" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Group</label>
            <input type="text" name="group" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Status Pegawai</label>
            <select name="status_pgw" class="form-control">
              <option value="tetap">Tetap</option>
              <option value="kontrak">Kontrak</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Perusahaan 1</label>
            <input type="text" name="pers1" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Perusahaan 2</label>
            <input type="text" name="pers2" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama Perusahaan 3</label>
            <input type="text" name="pers3" value="" placeholder="" class="form-control">
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

<?php foreach ($pasien->result() as $dt): ?>
  <div class="modal fade" id="edit-<?=$dt->id_pasien?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?=base_url('master/pasien_edit/').$dt->id_pasien?>" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label>NIK</label>
              <input type="number" name="nik" value="<?=$dt->nik?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?=$dt->nama?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Umur</label>
              <input type="text" name="umur" value="<?=$dt->umur?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Sex</label>
              <select name="sex" class="form-control">
                <option value="l" <?php if($dt->sex=="l")echo 'selected'; ?>>Pria</option>
                <option value="p" <?php if($dt->sex=="p")echo 'selected'; ?>>Wanita</option>
              </select>
            </div>
            <div class="form-group">
              <label>Separtment</label>
              <input type="text" name="separtment" value="<?=$dt->separtment?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Group</label>
              <input type="text" name="group" value="<?=$dt->group?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Status Pegawai</label>
              <select name="status_pgw" class="form-control">
                <option value="tetap" <?php if($dt->status_pgw=="tetap")echo 'selected'; ?>>Tetap</option>
                <option value="kontrak" <?php if($dt->status_pgw=="kontrak")echo 'selected'; ?>>Kontrak</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Perusahaan 1</label>
              <input type="text" name="pers1" value="<?=$dt->pers1?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Perusahaan 2</label>
              <input type="text" name="pers2" value="<?=$dt->pers2?>" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Perusahaan 3</label>
              <input type="text" name="pers3" value="<?=$dt->pers3?>" placeholder="" class="form-control">
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