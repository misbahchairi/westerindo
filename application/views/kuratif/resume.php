<style>
  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #d2d6de;
    border-radius: 0px;
    height: 35px;
    width: 300px; 
  }
</style>
<div class="modal fade" id="surat-sakit">
  <div class="modal-dialog">
    <div class="modal-content" style="position: relative;">
      <div id="loader"><img src="<?=base_url('assets/dist/img/AjaxLoader.gif')?>" alt=""></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Surat Keterangan Sakit</h4>
      </div>
      <div class="modal-body form-horizontal ktk-ketsa">
        <p>Dengan ini menerangkan bahwa berdasarkan hasil pemeriksaan yang telah dilakukan kepada pasien :</p>
        <div class="form-group">
          <label class="control-label col-sm-3">Nama <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nama_pasien?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">NIP <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nik?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Umur <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->umur?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Departemen <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">Apotik</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Diagnosa <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nama_diagnosa?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Terapi / Obat <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">
            <?php foreach ($tindakan as $rtindakan) { ?>
              <?=$rtindakan->nama_obat?> ,
            <?php  } ?>
            </label>
          </div>
        </div>
        <p class="bwh-ketsa">
          <form class="form-suratsakit">
          <?php $suratsakit = json_decode($data->ku_suratsakit, true);?>
          Diberikan surat sakit terhitung mulai tanggal : <input type="text" class="date" name="dari" value="<?=@$suratsakit['dari']?>"> s.d tanggal <input type="text" name="sampai" class="date" value="<?=@$suratsakit['sampai']?>">. Demikian surat keterangan ini diberikan untuk diketahui dan dipergunakan seperlunya. <br><br>
          <label>Keterangan :</label>
          <textarea name="keterangan" class="form-control"><?=@$suratsakit['keterangan']?></textarea>
          </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

        <?php if ($data->ku_issurat_sakit==1) {?>
          <button type="button" class="btn btn-success btn-flat print-suratsakit" style=""><i class="fa fa-print"></i> Print</button>
        <?php } else { ?>
          <button type="button" class="btn btn-success btn-flat print-suratsakit" style="display: none;"><i class="fa fa-print"></i> Print</button>
        <?php } ?>

        <?php if ($data->ku_issurat_sakit==0): ?>
        <button type="button" class="btn btn-primary btn-flat simpan-suratsakit" onclick="return confirm('Yakin ?')"><i class="fa fa-save"></i> Simpan</button>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade ktk-rujukan" id="surat-rujukan">
  <div class="modal-dialog ">
    <div class="modal-content" style="position: relative;">
      <div id="loader" class="loader2"><img src="<?=base_url('assets/dist/img/AjaxLoader.gif')?>" alt=""></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Surat Rujukan</h4>
      </div>
      <div class="modal-body form-horizontal">
        <h3>
          PROGRAM JAMINAN KESEHATAN <br> PESERTA ASKES WAJIB <br> SURAT RUJUKAN
        </h3>
        <div class="berlaku">Berlaku Satu kali Berobat</div>
        <form class="form-suratrujukan">
        <div class="form-group">
          <label class="control-label col-sm-3">Tanggal <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?= date('d/m/Y') ?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">RS <span>:</span></label>
          <div class="col-sm-9">
            <select name="dokter" class="select2">
              <?php foreach ($dokter as $dokter) { ?>
                <option value="<?=$dokter->id_rujukan?>"><?=$dokter->nama_dr?> (<?=$dokter->nama_rs?>)</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-12">Mohon pemeriksaan / pengobatan lebih lanjut terhadap penderita,</label>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Nama Pasien <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nama_pasien?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">DOB / USia <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->umur?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Status Pekerja <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->status_pgw?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Penjamin <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">BPJS</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">No Peserta <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nik?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Diagnosa <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nama_diagnosa?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Obat yang telah diberikan <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">
              <?php foreach ($tindakan as $rtindakan) { ?>
                <?=$rtindakan->nama_obat?> ,
              <?php  } ?>
            </label>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>

        <?php if ($data->ku_issurat_rujukan==1) {?>
          <button type="button" class="btn btn-success btn-flat print-suratrujukan" style=""><i class="fa fa-print"></i> Print</button>
        <?php } else { ?>
          <button type="button" class="btn btn-success btn-flat print-suratrujukan" style="display: none;"><i class="fa fa-print"></i> Print</button>
        <?php } ?>

        <?php if ($data->ku_issurat_rujukan==0): ?>
        <button type="button" class="btn btn-primary btn-flat simpan-suratrujukan" onclick="return confirm('Yakin ?')"><i class="fa fa-save"></i> Simpan</button>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>
  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Kuratif
      <small>resume</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kuratif</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class=""></div>
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="ktk-resume">
                  <h3>Resume Data Pasien</h3>
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?=$data->nama_pasien?></td>
                      </tr>
                      <tr>
                        <td>Input Perihal</td>
                        <td>:</td>
                        <td><?=$data->ku_perihal?></td>
                      </tr>
                      <tr>
                        <td>Hasil Lab</td>
                        <td>:</td>
                        <td>
                          Tanda vital <span style="text-transform: uppercase;"><?=$data->tv_tandavital?></span> <br>
                          Nadi <u> <?=$data->tv_nadi?> /menit</u> , Suhu <u> <?=$data->tv_suhu?> &#8451;</u> , Pernafasan <u> <?=$data->tv_pernafasan?> /menit</u> <br>
                          Kesadaran G : <u> <?=$data->tv_kesadarang?> </u>, C : <u> <?=$data->tv_kesadaranc?> </u> , S : <u> <?=$data->tv_kesadarans?> </u>
                        </td>
                      </tr>
                      <?php foreach ($temuan as $temuan) { ?>
                      <tr>
                        <td>Temuan PF <br> <small>Di <?=$temuan->pf_bagian?></small></td>
                        <td>:</td>
                        <td><?=$temuan->pf_temuan?></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>Penunjang Medis</td>
                        <td>:</td>
                        <td><?=$data->ku_penunjang_medis?></td>
                      </tr>
                      <tr>
                        <td>Diagnosa</td>
                        <td>:</td>
                        <td><?=$data->nama_diagnosa?> <br> <small><?=$data->ket_diagnosa?></small></td>
                      </tr>
                      <?php $i=1; foreach ($tindakan as $tindakan) { ?>
                        <?php 
                          $json = $tindakan->td_carapenggunaan;
                          $cara = json_decode($json, true);
                        ?>
                      <tr>
                        <td>Tindakan <?=$i;?></td>
                        <td>:</td>
                        <td>
                          <?=$tindakan->nama_obat?>
                          <br>
                          Jenis Obat : <?=$cara['jenis']?>
                          <br>
                          Tipe Obat : <?=$cara['tipe']?>
                          <br>
                          <?php if ($cara['pemakaian'] != '') { ?>
                          Cara Pemakaian : <?=$cara['pemakaian']?>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php $i++; } ?>
                      <tr>
                        <td colspan="3">
                          <?php if($data->ku_iskontrol=='1'){ ?>
                          *harus kontrol kembali 3 hari
                          <?php } ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="">
              </div>
            </div>
            <div class="ktk-btn-resume">
              <div class="row mg-5">
                <div class="col-md-6">
                  <button type="button" class="btn btn-flat btn-lg btn-success" data-toggle="modal" href='#surat-sakit'>Buat Surat Sakit <i class="fa fa-caret-right"></i></button>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-flat btn-lg btn-success" data-toggle="modal" href='#surat-rujukan'>Buat Surat Rujukan <i class="fa fa-caret-right"></i></button>
                </div>
              </div>
            </div>
            <div class="ktk-abu">
              <button type="button" class="btn btn-primary btn-flat"><i class="fa fa-check"></i> Selesai</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->


<script>
  
  $(document).ready(function(){

    $("button.simpan-suratsakit").click(function(){
      var data = $('.form-suratsakit').serialize();
      var link="<?= base_url('kuratif/ajaxsuratsakit') ?>"
      $.ajax({
        type: 'POST',
        url: link,
        data: data,
        dataType: 'json',
        beforeSend: function(){
          $('#loader').show();
        },
        complete: function(){
          $('#loader').hide();
          $('.simpan-suratsakit').hide();  
          $('.print-suratsakit').show();  
        },
        success: function(result){
        }
      });
    });

    $("button.simpan-suratrujukan").click(function(){
      var data = $('.form-suratrujukan').serialize();
      var link="<?= base_url('kuratif/ajaxsuratrujukan') ?>"
      $.ajax({
        type: 'POST',
        url: link,
        data: data,
        dataType: 'json',
        beforeSend: function(){
          $('.loader2').show();
        },
        complete: function(){
          $('.loader2').hide();
          $('.simpan-suratrujukan').hide();  
          $('.print-suratrujukan').show();  
        },
        success: function(result){
        }
      });
    });

  });
</script>