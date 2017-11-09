	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Antrian
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Antrian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <table class="table table-bordered table-hover table-condensed" id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pasien</th>
              <th>Unit</th>
              <th>Perawat</th>
              <th>Dokter</th>
              <th>Perihal</th>
              <th>State</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($antrian->result() as $dt) { ?>
            <tr>
              <td><?=$i;?></td>
              <td><?=$dt->nama_pasien?></td>
              <td>
                <?php if ($dt->nama_unit!='') {
                  echo $dt->nama_unit;
                } elseif ($dt->nama_unit_dokter!='') {
                  echo $dt->nama_unit_dokter;
                } elseif ($dt->nama_unit!='' & $dt->nama_unit_dokter!='') {
                  echo $dt->nama_unit;
                } ?>
              </td>
              <td><?=$dt->nama_perawat?></td>
              <td><?=$dt->nama_dokter?></td>
              <td><?=$dt->ku_perihal?></td>
              <td>
                <?php
                  if ($dt->ku_state=='perihal') {
                    echo "Perihal";
                  } elseif ($dt->ku_state=='riwayat') {
                    echo "Riwayat Penyakit";
                  } elseif ($dt->ku_state=='tanda_vital') {
                    echo "Tanda Vital";
                  } elseif ($dt->ku_state=='temuan') {
                    echo "Temuan PF";
                  } elseif ($dt->ku_state=='penunjang_medis') {
                    echo "Penunjang Medis";
                  } elseif ($dt->ku_state=='diagnosa') {
                    echo "Diagnosa";
                  } elseif ($dt->ku_state=='tindakan') {
                    echo "Tindakan";
                  }
                ?>
              </td>
              <td>  
                <a href="<?=base_url('antrian/lanjutan/'.$dt->idkuratif)?>" class="btn btn-xs btn-success btn-flat"><i class="fa fa-refresh"></i> Lanjutkan</a>
                <a href="<?=base_url('antrian/delete/'.$dt->idkuratif)?>" class="btn btn-xs btn-danger btn-flat" onclick="return confirm('Delete <?=$dt->nama_pasien;?> ?')"><i class="fa fa-trash" ></i> Hapus</a>
              </td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->