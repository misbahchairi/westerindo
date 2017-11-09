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
              <th>Department</th>
              <th>Status</th>
              <th>Foto</th>
              <th width="90">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($pasien->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nik?></td>
              <td>
                <?=$dt->nama?> <br>
                <a data-toggle="modal" href='#edit-<?=$dt->id_pasien?>' style="color: #FF5722;"><i class="fa fa-edit"></i> Edit</a>
              </td>
              <td><?=$dt->umur?></td>
              <td>
                <?php if ($dt->sex=="l") {
                  echo 'Pria';
                }elseif ($dt->sex=="p") {
                  echo 'Wanita';
                } ?>  
              </td>
              <td>
                Departemen :<?=$dt->separtment?> <br>
                Group : <?=$dt->group?> <br>
                <?php if ($dt->pers1!=""): ?>
                  Perusahaan 1 : <?=$dt->pers1?> <br>
                <?php endif ?>
                <?php if ($dt->pers2!=""): ?>
                  Perusahaan 2 : <?=$dt->pers2?> <br>
                <?php endif ?>
                <?php if ($dt->pers3!=""): ?>
                  Perusahaan 3 : <?=$dt->pers3?>
                <?php endif ?>
               </td>
              <td>
                <?=$dt->status_pgw?>
              </td>
              <td><a data-toggle="modal" href='#show-<?=$dt->id_pasien?>' class="btn btn-success btn-xs btn-flat"><i class="fa fa-search-plus"></i> Show</a></td>
              <td>
                <a href="<?=base_url('master/pasien_riwayat/').$dt->id_pasien;?>" class="btn btn-warning btn-warning btn-xs btn-flat"><i class="fa fa-user-md"></i> Riwayat Pengobatan</a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?php foreach ($pasien->result() as $dt): ?>
  <div class="modal fade" id="edit-<?=$dt->id_pasien?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?=base_url('master/pasien_edit/').$dt->id_pasien?>" method="post" enctype="multipart/form-data">
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
                <option value="kontrak" <?php if($dt->status_pgw=="outsourching")echo 'selected'; ?>>Outsourching</option>
                <option value="kontrak" <?php if($dt->status_pgw=="magang")echo 'selected'; ?>>Magang</option>
                <option value="kontrak" <?php if($dt->status_pgw=="preemp")echo 'selected'; ?>>Pre Emp</option>
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
            <div class="form-group">
              <label>foto</label>
              <input type="file" name="foto" value="" placeholder="" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
              <a href="<?=base_url('master/pasien_delete/').$dt->id_pasien;?>" class="btn btn-warning btn-flat pull-left" onclick="return confirm('Delete <?=$dt->nama;?> ?')"><i class="fa fa-trash"></i> Hapus</a>
            <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="show-<?=$dt->id_pasien?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><?=$dt->nama?></h4>
        </div>
        <div class="modal-body">
          <center><img src="<?=base_url().'/'.$dt->foto;?>" alt="" width="100%"></center>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form action="<?=base_url('master/pasien_add')?>" method="post" enctype="multipart/form-data">
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
                <option value="outsourching">Outsourching</option>
                <option value="magang">Magang</option>
                <option value="preemp">Pre Emp</option>
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

