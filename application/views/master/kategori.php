	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Kategori
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
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Tipe</th>
              <th width="90">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $i=1; foreach ($kategori->result() as $dt): ?>
            <tr>
              <td><?=$i?></td>
              <td><?=$dt->kategori?></td>
              <td><?=$dt->deskripsi?></td>
              <td><?= ($dt->tipe == 1) ? "Promotif" : "Preventif" ;?></td>
              <td>
                <a href="<?=base_url('master/kategori_delete/').$dt->id;?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Anda yakin hapus kategori <?=$dt->kategori;?> ?')"><i class="fa fa-trash"></i></a>

                <button onclick="edit('<?= $dt->id ?>')" class="btn btn-info btn-sm btn-flat" title="Edit"><i class="fa fa-edit"></i></button>
              </td>
            </tr>
            <?php $i++; endforeach ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
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
      <form action="<?=base_url('master/kategori_add')?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Tipe</label>
            <select name="tipe" id="inputTipe" class="form-control">
              <option value="1">Promotif</option>
              <option value="2">Preventif</option>
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

  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <form action="<?=base_url('master/kategori_edit')?>" method="post">
          <div class="modal-body">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="kategori" id="kategori" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <label>Tipe</label>
            <select name="tipe" id="tipe" class="form-control">
              <option value="1">Promotif</option>
              <option value="2">Preventif</option>
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


<script type="text/javascript">
function edit(id){
  $.ajax({ 
        url: '<?= base_url(); ?>master/kategori_ajax/'+id,
        cache: false,
        type: 'get',
        success: function(data){
            $("#edit").modal();
            $("#id").val(data[0]['id']);
            $("#kategori").val(data[0]['kategori']);
            $("#deskripsi").val(data[0]['deskripsi']);
            $("#tipe").val(data[0]['tipe']);

        }
    });
}
</script>