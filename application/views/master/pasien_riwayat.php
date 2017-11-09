

<style>
  .ktk-btn-resume{
    margin-bottom: 0px;
  }
</style>
  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Riwayat Pengobatan
      <small>pasien</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Riwayat Pengobatan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php foreach ($riwayat->result() as $data): ?>
        <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="ktk-resume" style="position: relative;padding-top:35px;padding:0px;height:430px;overflow-y:auto;">
                  <h3 style="position:absolute;background:#fff;top:0;left:0;z-index:9;width:100%; padding:10px;background: #eee;">Resume Data Pasien <span class="pull-right"><?=$data->ku_created_at?></span></h3>
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
                      <?php foreach ($this->mkuratif->getTemuanByid($data->idkuratif)->result() as $temuan) { ?>
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
                      <?php $i=1; foreach ($this->mkuratif->getTindakanByid($data->idkuratif)->result() as $tindakan) { ?>
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
                  <button type="button" class="btn btn-flat btn-lg btn-success" data-toggle="modal" href='#surat-sakit<?=$data->idkuratif?>' <?php if($data->ku_issurat_sakit==0)echo'disabled'; ?>>Lihat Surat Sakit <i class="fa fa-caret-right"></i></button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-flat btn-lg btn-success" data-toggle="modal" href='#surat-rujukan<?=$data->idkuratif?>'<?php if($data->ku_issurat_rujukan==0)echo'disabled';?>>Lihat Surat Rujukan <i class="fa fa-caret-right"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->

<?php foreach ($riwayat->result() as $data) { ?>
<?php if($data->ku_issurat_sakit==1){?>
  <div class="modal fade" id="surat-sakit<?=$data->idkuratif?>">
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
              <?php foreach ($this->mkuratif->getTindakanByid($data->idkuratif)->result() as $rtindakan) { ?>
                <?=$rtindakan->nama_obat?> ,
              <?php  } ?>
              </label>
            </div>
          </div>
          <p class="bwh-ketsa">
            <form class="form-suratsakit">
            <?php $suratsakit = json_decode($data->ku_suratsakit, true);?>
            Diberikan surat sakit terhitung mulai tanggal : <?=@$suratsakit['dari']?> s.d tanggal <?=@$suratsakit['sampai']?>. Demikian surat keterangan ini diberikan untuk diketahui dan dipergunakan seperlunya. <br><br>
            <label>Keterangan :</label><?=@$suratsakit['keterangan']?>
            </form>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
          <button type="button" class="btn btn-success btn-flat print-suratsakit" style=""><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<?php if($data->ku_issurat_rujukan==1){?>
<div class="modal fade ktk-rujukan" id="surat-rujukan<?=$data->idkuratif?>">
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
            <label class="control-label"><?= $data->ku_created_at ?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">RS <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label"><?=$data->nama_dr?> (<?=$data->nama_rs?>)</label>
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
              <?php foreach ($this->mkuratif->getTindakanByid($data->idkuratif)->result() as $rtindakan) { ?>
                <?=$rtindakan->nama_obat?> ,
              <?php  } ?>
            </label>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <button type="button" class="btn btn-success btn-flat print-suratrujukan" style=""><i class="fa fa-print"></i> Print</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>