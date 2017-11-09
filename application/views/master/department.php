  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Department
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
              <th>Kode</th>
              <th>Nama</th>
              <th style="width: 65px;">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($department->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->d_kode?></td>
              <td><?=$dt->d_nama?></td>
              <td>
                <a href="<?=base_url('master/department_delete/').$dt->id_department;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->d_nama;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_department?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Nama</th>
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
      <form action="<?=base_url('master/department_add');?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode</label>
            <input type="text" name="d_kode" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="d_nama" value="" placeholder="" class="form-control">
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

<?php foreach ($department->result() as $dt): ?>
<div class="modal fade" id="edit-<?=$dt->id_department?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form action="<?=base_url('master/department_edit/').$dt->id_department;?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Kode</label>
            <input type="text" name="d_kode" value="<?=$dt->d_kode?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="d_nama" value="<?=$dt->d_nama?>" placeholder="" class="form-control">
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