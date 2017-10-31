  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Kuratif
      <small>Tensi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kuratif</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tensi</h3>
      </div>
      <div class="box-body">
        <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" href='#tambah'><i class="fa fa-plus"></i> Tambah Data</button>
        <hr class="garis">
        <table class="table table-hover table-bordered" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Age</th>
              <th>Sex</th>
              <th>Departement</th>
              <th>BP</th>
              <th>Drugs</th>
              <th>Daily Drinking Medicine</th>
              <th>Remark</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($tensi->result() as $dt){ ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->nama?></td>
              <td><?=$dt->umur?></td>
              <td><?=$dt->jenkel?></td>
              <td><?=$dt->departement?></td>
              <td><?=$dt->bp?></td>
              <td><?=$dt->obat?></td>
              <td>
                <?php if ($dt->status_minum=="y") {
                  echo '<span class="label label-success">Yes</span>';
                } elseif ($dt->status_minum=="n") {
                  echo '<span class="label label-danger">No</span>';
                } ?>
              </td>
              <td><?=$dt->remark?></td>
              <td>
                <a href="<?=base_url('kuratif/deletetensi/').$dt->id_tensi;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?=$dt->nama;?> ?')"><i class="fa fa-trash"></i></a>

                <a data-toggle="modal" href='#edit-<?=$dt->id_tensi?>' class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            <?php $i++; } ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Age</th>
              <th>Sex</th>
              <th>Departement</th>
              <th>BP</th>
              <th>Drugs</th>
              <th>Daily Drinking Medicine</th>
              <th>Remark</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form action="<?=base_url('kuratif/addtensi');?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="nama" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="text" name="umur" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Sex</label>
            <select name="jenkel" class="form-control">
              <option value="p">Pria</option>
              <option value="w">Wanita</option>
            </select>
          </div>
          <div class="form-group">
            <label>Departement</label>
            <input type="text" name="departement" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>BP</label>
            <input type="text" name="bp" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Drugs</label>
            <input type="text" name="obat" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Daily Drinking Medicine</label>
            <select name="status_minum" class="form-control">
              <option value="y">Yes</option>
              <option value="n">No</option>
            </select>
          </div>
          <div class="form-group">
            <label>Remark</label>
            <textarea name="remark" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($tensi->result() as $dt): ?>
<div class="modal fade" id="edit-<?=$dt->id_tensi?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <form action="<?=base_url('kuratif/edittensi/').$dt->id_tensi;?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="nama" value="<?=$dt->nama?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="text" name="umur" value="<?=$dt->umur?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Sex</label>
            <select name="jenkel" class="form-control">
              <option value="p" <?php if($dt->jenkel=="p")echo'selected'; ?> >Pria</option>
              <option value="w" <?php if($dt->jenkel=="w")echo'selected'; ?>>Wanita</option>
            </select>
          </div>
          <div class="form-group">
            <label>Departement</label>
            <input type="text" name="departement" value="<?=$dt->departement?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>BP</label>
            <input type="text" name="bp" value="<?=$dt->bp?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Drugs</label>
            <input type="text" name="obat" value="<?=$dt->obat?>" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Daily Drinking Medicine</label>
            <select name="status_minum" class="form-control">
              <option value="y" <?php if($dt->status_minum=="y")echo'selected'; ?> >Yes</option>
              <option value="n" <?php if($dt->status_minum=="n")echo'selected'; ?> >No</option>
            </select>
          </div>
          <div class="form-group">
            <label>Remark</label>
            <textarea name="remark" class="form-control"><?=$dt->remark?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>