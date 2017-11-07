<style type="text/css">
    td>a:hover {
        text-decoration: underline;
    }
    td>a {
        font-weight: 600;
        color: #000;
    }
</style>

<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Semua Farmasi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Farmasi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <a data-toggle="modal" href='#tambah' class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Farmasi</a>
        <hr class="garis"></hr>
        <div class="">
          <table class="table table-bordered table-hover table-farmasi">
            <thead>
              <tr style="background: #0db7c4; color: #fff;">
                <th style="text-align:center;">No</th>
                <th style="text-align:center;">Nama</th>
                <th style="text-align:center;">Harga</th>
                <th style="text-align:center;">Jumlah</th>
                <th style="text-align:center;">Aksi</th>
              </tr> 
            </thead>
            <tbody>
            <?php foreach ($kategori as $dt){ ?>
              <tr>
                  <td colspan="5" class="c_farmasi"><?= $dt->nama ?></td>
              </tr>
              <?php $i=1; for ($d=0; $d < count($obat[$dt->id]); $d++) {?>
              <tr>
                <td><?=$i?></td>
                <td><a href='#' onclick="detail('<?= $obat[$dt->id][$d]['id_obat'] ?>')"><?= $obat[$dt->id][$d]['nama_obat'] ?></a></td>
                <td style="text-align:right;"><?= number_format($obat[$dt->id][$d]['harga'],'2',',','.') ?></td>
                <td style="text-align:right;"><?= $obat[$dt->id][$d]['stok'] ?></td>
                <td>
                  <a href="<?= base_url(); ?>farmasi/delete_obat/?id_obat=<?= $obat[$dt->id][$d]['id_obat'] ?>" class="btn btn-danger btn-sm btn-flat" title="Hapus" onclick="return confirm('Delete <?= $obat[$dt->id][$d]['nama_obat'] ?> ?')"><i class="fa fa-trash"></i></a>
                  <a class="btn btn-info btn-sm btn-flat" href="#" onclick="edit('<?= $obat[$dt->id][$d]['id_obat'] ?>')" title="Edit"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
              <?php $i++; }?>
            <?php } ?>
            </tbody>
          </table>
        </div>
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
      <form action="<?=base_url('farmasi/add_obat');?>" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_obat" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" id="input" class="form-control">
                <?php foreach ($kategori as $kat) {?>
                <option value="<?= $kat->id ?>"><?= $kat->nama ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="inputDeskripsi" class="form-control" rows="2"></textarea>
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
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
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
      <form action="<?=base_url('farmasi/edit_obat')?>" method="post">
      <div class="modal-body">
          <input type="hidden" name="id_obat" id="id_obat">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_obat" value="" placeholder="" id="nama_obat" class="form-control">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="id_kategori" id="kategori" class="form-control">
                <?php foreach ($kategori as $kat) {?>
                <option value="<?= $kat->id ?>"><?= $kat->nama ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="2"></textarea>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" id="harga" value="" placeholder="" class="form-control">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" id="stok" value="" placeholder="" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Keterangan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Keterangan :</label><br>
                    <span id="keterangan"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function edit(id){
        $.ajax({ 
            url: '<?= base_url(); ?>ajax/ajaxObat/?id_obat='+id,
            cache: false,
            type: 'get',
            success: function(data){
                $("#edit").modal();
                $("#id_obat").val(data[0]['id_obat']);
                $("#nama_obat").val(data[0]['nama_obat']);
                $("#kategori").val(data[0]['id_kategori']);
                $("#deskripsi").val(data[0]['deskripsi']);
                $("#harga").val(data[0]['harga']);
                $("#stok").val(data[0]['stok']);
            }
        });
    }
</script>

<script type="text/javascript">
    function detail(id){
        $.ajax({ 
            url: '<?= base_url(); ?>ajax/ajaxObat/?id_obat='+id,
            cache: false,
            type: 'get',
            success: function(data){
                $("#detail").modal();
                $("#keterangan").text(data[0]['deskripsi']);
            }
        });
    }
</script>