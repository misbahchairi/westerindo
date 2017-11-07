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
    <div class="box box-primary">
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
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
                  <?php foreach ($temuan as $temuan) { ?>
                  <tr>
                    <td>Temuan PF <br> <small>Di <?=$temuan->pf_bagian?></small></td>
                    <td>:</td>
                    <td><?=$temuan->pf_temuan?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Hasil Lab</td>
                    <td>:</td>
                    <td>
                      Tanda vital <span style="text-transform: uppercase;"><?=$data->tv_tandavital?></span> <br>
                      Nadi <u> <?=$data->tv_nadi?> /menit</u> , Suhu <u> <?=$data->tv_suhu?> &#8451;</u> , Pernafasan <u> <?=$data->tv_pernafasan?> /menit</u> <br>
                      Kesadaran G : <u> <?=$data->tv_kesadarang?> </u>, C : <u> <?=$data->tv_kesadaranc?> </u> , S : <u> <?=$data->tv_kesadarans?> </u>
                    </td>
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
                      <label><input type="checkbox" <?php if($data->ku_iskontrol=='1'){echo'checked';} ?>> Apakah harus kontrol kembali 3 hari ?</label>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ktk-btn-resume">
              <button type="button" class="btn btn-flat btn-lg btn-success" data-toggle="modal" href='#surat-sakit'>Buat Surat Sakit <i class="fa fa-caret-right"></i></button><br>
              <button type="button" class="btn btn-flat btn-lg btn-success" data-toggle="modal" href='#surat-rujukan'>Buat Surat Rujukan <i class="fa fa-caret-right"></i></button>
            </div>
          </div>
        </div>
        <div class="ktk-abu">
          <button type="button" class="btn btn-primary btn-flat"><i class="fa fa-check"></i> Selesai</button>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->
<div class="modal fade" id="surat-sakit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Surat Keterangan Sakit</h4>
      </div>
      <div class="modal-body form-horizontal ktk-ketsa">
        <p>Dengan ini menerangkan bahwa berdasarkan hasil pemeriksaan yang telah dilakukan kepada pasien :</p>
        <div class="form-group">
          <label class="control-label col-sm-3">Nama <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">Rahmat</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">NIP <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">012380123</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Umur <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">22</label>
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
            <label class="control-label">Batuk</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Terapi / Obat <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">OBH Herbal</label>
          </div>
        </div>
        <p class="bwh-ketsa">
          Diberikan surat sakit selama <input type="text" style="width: 30px;"> ( <input type="text" style="width: 30px;"> ) hari terhitung mulai tanggal <input type="date"> s.d tanggal <input type="date">. Demikian surat keterangan ini diberikan untuk diketahui dan dipergunakan seperlunya.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <button type="button" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Print</button>
        <button type="button" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade ktk-rujukan" id="surat-rujukan">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Surat Rujukan</h4>
      </div>
      <div class="modal-body form-horizontal">
        <h3>
          PROGRAM JAMINAN KESEHATAN <br> PESERTA ASKES WAJIB <br> SURAT RUJUKAN
        </h3>
        <div class="berlaku">Berlaku Satu kali Berobat</div>
        <div class="form-group">
          <label class="control-label col-sm-3">Tanggal <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">17/10/2017</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">RS <span>:</span></label>
          <div class="col-sm-9">
            <select name="" class="">
              <option value="">RSI (Rumah Sakit Islam)</option>
              <option value="">RSK (Rumah Sakit Kristen)</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Yth. TS.Dokter Spesialis <span>:</span></label>
          <div class="col-sm-9">
            <select name="" class="">
              <option value="">Bedah</option>
              <option value="">Gigi</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-12">Mohon pemeriksaan / pengobatan lebih lanjut terhadap penderita,</label>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Nama Pasien <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">Rahmat</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">DOB / USia <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">22</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Status Pekerja <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">Kontrak</label>
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
            <label class="control-label">021931231</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Diagnosa <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">Batuk</label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3">Obat yang telah diberikan <span>:</span></label>
          <div class="col-sm-9">
            <label class="control-label">OBH Herbal</label>
          </div>
        </div>
        <br>
        <p class="text-right">
          Jakarta, <input type="date">
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <button type="button" class="btn btn-success btn-flat"><i class="fa fa-print"></i> Print</button>
        <button type="button" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </div>
  </div>
</div>