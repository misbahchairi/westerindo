	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Obat Obatan
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
        <a href="<?=base_url('master/obat_kategori')?>" class="btn btn-success btn-flat pull-right"><i class="fa fa-plus"></i> Tambah Kategori</a>
        <hr class="garis"></hr>
        <table class="table table-bordered table-condensed" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Nama</th>
              <th>Deskripsi</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($obat->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nama?></td>
              <td><?=$dt->nama_obat?></td>
              <td><?=$dt->deskripsi?></td>
              <td><?=$dt->harga?></td>
              <td><?=$dt->stok?></td>
              <td>
                <a href="<?=base_url('master/obat_delete/').$dt->id_obat;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama_obat;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_obat?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Nama</th>
              <th>Deskripsi</th>
              <th>Harga</th>
              <th>Stok</th>
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
      <form action="<?=base_url('master/obat_add');?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Kategori Obat</label>
            <select class="form-control" name="id_kategori">
              <option>--Pilih Kategori--</option>
              <?php foreach ($kategori->result() as $dt_kat): ?>
              <option value="<?=$dt_kat->id?>"><?=$dt_kat->nama?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" name="nama_obat" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="" placeholder="" class="form-control">
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

<?php foreach ($obat->result() as $dt): ?>
<div class="modal fade" id="edit-<?=$dt->id_obat?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form action="<?=base_url('master/obat_edit/').$dt->id_obat;?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Kategori Obat</label>
            <select class="form-control" name="id_kategori">
              <option>--Pilih Kategori--</option>
              <?php foreach ($kategori->result() as $dt_kat): ?>
              <option value="<?=$dt_kat->id?>" <?php if($dt_kat->id==$dt->id_kategori) echo "selected"; ?>><?=$dt_kat->nama?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" name="nama_obat" value="<?=$dt->nama_obat?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" value="<?=$dt->deskripsi?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="<?=$dt->harga?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="<?=$dt->stok?>" placeholder="" class="form-control">
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
<?php endforeach ?>