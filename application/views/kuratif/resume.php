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
                    <td><?=$nama?></td>
                  </tr>
                  <tr>
                    <td>Input Perihal</td>
                    <td>:</td>
                    <td><?=$perihal?></td>
                  </tr>
                  <?php for ($i=0; $i < $count_anamnesa ; $i++) { 
                  $anamnesa = 'anamnesa'.$i ;
                  $anamnesa_durasi = 'anamnesa_durasi'.$i ;
                  ?>
                  <tr>
                    <td>Keluhan <?=$i+1?></td>
                    <td>:</td>
                    <td><?=$this->mmaster->getAnamnesaByid($$anamnesa)->row()->nama;?> <br> <?=$$anamnesa_durasi?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($kepala!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di kepala</small></td>
                    <td>:</td>
                    <td><?=$kepala?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($mata!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di mata</small></td>
                    <td>:</td>
                    <td><?=$mata?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($telinga!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di telinga</small></td>
                    <td>:</td>
                    <td><?=$telinga?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($hidung!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di hidung</small></td>
                    <td>:</td>
                    <td><?=$hidung?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($tenggorokan!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di tenggorokan,mulut,geligi</small></td>
                    <td>:</td>
                    <td><?=$tenggorokan?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($dada!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di dada</small></td>
                    <td>:</td>
                    <td><?=$dada?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($paru!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di paru</small></td>
                    <td>:</td>
                    <td><?=$paru?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($jantung!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di jantung</small></td>
                    <td>:</td>
                    <td><?=$jantung?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($abdomen!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di abdomen</small></td>
                    <td>:</td>
                    <td><?=$abdomen?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($liver!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di liver</small></td>
                    <td>:</td>
                    <td><?=$liver?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($maag!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di maag</small></td>
                    <td>:</td>
                    <td><?=$maag?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($usus_besar!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di usus besar</small></td>
                    <td>:</td>
                    <td><?=$usus_besar?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($appendix!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di appendix</small></td>
                    <td>:</td>
                    <td><?=$appendix?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($genital!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di genital</small></td>
                    <td>:</td>
                    <td><?=$genital?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($extremitas_atas!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di extremitas atas</small></td>
                    <td>:</td>
                    <td><?=$extremitas_atas?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($extremitas_bawah!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di extremitas bawah</small></td>
                    <td>:</td>
                    <td><?=$extremitas_bawah?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($punggung!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di punggung</small></td>
                    <td>:</td>
                    <td><?=$punggung?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($pinggang!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di pinggang</small></td>
                    <td>:</td>
                    <td><?=$pinggang?></td>
                  </tr>
                  <?php } ?>
                  <?php if ($bokong!="") {?>
                  <tr>
                    <td>Temuan PF <br> <small>Di bokong</small></td>
                    <td>:</td>
                    <td><?=$bokong?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td>Hasil Lab</td>
                    <td>:</td>
                    <td>
                      Tanda vital <span style="text-transform: uppercase;"><?=$tanda_vital?></span> <br>
                      Nadi <u><?=$nadi?> /menit</u> , Suhu <u><?=$suhu?> &#8451;</u> , Pernafasan <u><?=$pernafasan?> /menit</u> <br>
                      Kesadaran G <u><?=$kesadaran_g?></u> C <u><?=$kesadaran_c?></u> S <u><?=$kesadaran_s?></u>
                    </td>
                  </tr>
                  <?php for ($i=0; $i < $count_diagnosa ; $i++) { 
                  $diagnosa = 'diagnosa'.$i ;
                  $keterangan_diagnosa = 'keterangan_diagnosa'.$i ;
                  ?>
                  <tr>
                    <td>Diagnosa <?=$i+1?></td>
                    <td>:</td>
                    <td><?=$this->mmaster->getDiagnosaByid($$diagnosa)->row()->nama;?> <br> <?=$$keterangan_diagnosa?></td>
                  </tr>
                  <?php } ?>
                  <?php for ($i=0; $i < $count_obat ; $i++) { 
                  $obat = 'obat'.$i ;
                  $keterangan_obat = 'keterangan_obat'.$i ;
                  ?>
                  <tr>
                    <td>Tindakan <?=$i+1?></td>
                    <td>:</td>
                    <td><?=$this->mmaster->getObatByid($$obat)->row()->nama_obat;?> <br> <?=$$keterangan_obat?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="3">
                      <label><input type="checkbox" <?php if($is_kontrol!=NULL)echo "checked='checked'"; ?>> Apakah harus kontrol kembali 3 hari ?</label>
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