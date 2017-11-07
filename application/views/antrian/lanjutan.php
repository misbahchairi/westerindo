<!-- Jquery UI -->
<link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jQueryUI/jquery-ui.min.css">
<style type="text/css">
  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #d2d6de;
    border-radius: 0px;
    height: 35px;
  }
  .radio{
    margin-top: 5px !important;
    border: 1px solid #d2d6de !important;
    padding-top: 0px !important;
    padding-bottom: 5px !important;
    padding-left: 5px !important;
  }
  .form-group{
    overflow: hidden;
  }

</style>
<?php 
  foreach ($lanjutan->result() as $dt) { 
  $state = $dt->ku_state;
?>
  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Kuratif
      <small>pengobatan</small> 
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Kuratif</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Info Pasien</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-3">
            <div class="img-pasien" id="img-pasien">
              <img src="<?=base_url($dt->foto)?>" alt="">
            </div>
          </div>
          <div class="col-md-9">
            <div class="riwayat-pasien">
              <h3>Riwayat Pasien</h3>
              <ul>
                <li>Demam 3 Hari 3 Malam</li>
                <li>Batuk Berdahak</li>
                <li>Usus Buntu</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Pengobatan</h3>
      </div>
      <div class="box-body" style="position: relative;overflow: hidden;">
        <div id="loader"><img src="<?=base_url('assets/dist/img/AjaxLoader.gif')?>" alt=""></div>
        <div class="wizard">
          <div class="wizard-inner">
              <div class="connecting-line"></div>
              <ul class="nav nav-tabs" role="tablist">

                  <li role="presentation" class="<?php if($state == 'perihal'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Perihal">
                          <span class="round-tab">
                              Perihal
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="<?php if($state == 'riwayat'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Riwayat Penyakit">
                          <span class="round-tab">
                              Riwayat Penyakit
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="<?php if($state == 'tanda_vital'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step3" data-toggle="tab" aria-controls="complete" role="tab" title="Tanda Vital">
                          <span class="round-tab">
                              Tanda Vital
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="<?php if($state == 'temuan'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step4" data-toggle="tab" aria-controls="step3" role="tab" title="Temuan PF">
                          <span class="round-tab">
                              Temuan PF
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="<?php if($state == 'penunjang_medis'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step5" data-toggle="tab" aria-controls="complete" role="tab" title="Penunjang Medis">
                          <span class="round-tab">
                              Penunjang Medis
                          </span>
                      </a>
                  </li>


                  <li role="presentation" class="<?php if($state == 'diagnosa'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step6" data-toggle="tab" aria-controls="complete" role="tab" title="Diagnosa">
                          <span class="round-tab">
                              Diagnosa
                          </span>
                      </a>
                  </li>

                  <li role="presentation" class="<?php if($state == 'tindakan'){echo'active';}else{echo'disabled';} ?>">
                      <a href="#step7" data-toggle="tab" aria-controls="complete" role="tab" title="Tindakan">
                          <span class="round-tab">
                              Tindakan
                          </span>
                      </a>
                  </li>
              </ul>
          </div>

              <div class="tab-content">
                  <div class="tab-pane" role="tabpanel" id="step1">
                    <form method="post" class="form-perihal">
                      <h3>Perihal</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group" style="overflow:hidden;">
                            <label class="control-label col-sm-2">Nama :</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" class="form-control" placeholder="Isi Dengan Nama atau NIP" name="nama" value="<?=$dt->nama_pasien?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Perihal :</label>
                            <div class="col-sm-10">
                              <select name="perihal" class="form-control select2" id="perihal">
                                <option value="Berobat Karena Sakit">Berobat Karena Sakit</option>
                                <option value="Kontrol Ulang">Kontrol Ulang</option>
                                <option value="KB">KB</option>
                                <option value="Kontrol Kandungan">Kontrol Kandungan</option>
                                <option value="MCU">MCU</option>
                                <option value="Kecelakaan / Penyakit Akibat Kerja">Kecelakaan / Penyakit Akibat Kerja</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                              <div id="mcu" style="display: none;margin-top: 10px;">
                                <input type="file" name="mcu" value="" placeholder="" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-primary btn-flat next-step perihal-next" id="btn-next">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane <?php if($state=='riwayat')echo'active'; ?>" role="tabpanel" id="step2">
                    <form method="post" class="form-riwayat">
                      <h3>Riwayat Penyakit</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="hidden" name="idpasien2" id="idpasien2">
                            <label class="control-label col-sm-2">Status :</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="status">
                                <option value="Gawat">Gawat</option>
                                <option value="Tidak Gawat">Tidak Gawat</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Penjelasan :</label>
                            <div class="col-sm-10">
                              <textarea name="penjelasan" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <?php if ($state!='riwayat'): ?>
                          <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <?php endif ?>
                        <button type="button" class="btn btn-primary btn-flat next-step riwayat-next">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane <?php if($state=='tanda_vital')echo'active'; ?>" role="tabpanel" id="step3">
                    <form method="post" class="form-vital">
                      <h3>Tanda Vital</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="control-label col-sm-3">Tanda-Tanda Vital :</label>
                            <div class="col-sm-9">
                              <select name="tanda_vital" class="form-control">
                                <option value="TD" <?php if($dt->tv_tandavital=='TD')echo'selected'; ?> >TD</option>
                                <option value="N" <?php if($dt->tv_tandavital=='N')echo'selected'; ?>>N</option>
                                <option value="S" <?php if($dt->tv_tandavital=='S')echo'selected'; ?>>S</option>
                                <option value="RR" <?php if($dt->tv_tandavital=='RR')echo'selected'; ?>>RR</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3">Tekanan Darah :</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" class="form-control" name="nadi" placeholder="Nadi" value="<?=$dt->tv_nadi?>">
                                <span class="input-group-addon">/menit</span>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" class="form-control" name="suhu" placeholder="Suhu" value="<?=$dt->tv_suhu?>">
                                <span class="input-group-addon">&#8451;</span>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" class="form-control" name="pernafasan" placeholder="Pernafasan" value="<?=$dt->tv_pernafasan?>">
                                <span class="input-group-addon">/menit</span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3">Kesadaran :</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon">G</span>
                                <input type="text" class="form-control" name="kesadaran_g" placeholder="" value="<?=$dt->tv_kesadarang?>">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon">C</span>
                                <input type="text" class="form-control" name="kesadaran_c" placeholder="" value="<?=$dt->tv_kesadaranc?>">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon">S</span>
                                <input type="text" class="form-control" name="kesadaran_s" placeholder="" value="<?=$dt->tv_kesadarans?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <?php if ($state!='tanda_vital'): ?>
                          <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <?php endif ?>
                        <button type="button" class="btn btn-primary btn-flat next-step vital-next">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane <?php if($state=='temuan')echo'active'; ?>" role="tabpanel" id="step4">
                      <h3>Temuan PF</h3>
                        <center>
                      <div class="pf">
                          <div class="ktk-pf">
                            <img src="<?=base_url('assets/dist/img/1baru.jpg');?>" alt="">
                            <div class="markers-pf">
                             <div class="marker-pf" style="top: 8%;left: 46%;"><span data-placement="top" data-toggle="tooltip" title="1.Kepala"><a data-toggle="modal" href='#pf-1'>1</a></span></div>
                             <div class="marker-pf" style="top: 19%;left: 40%;"><span data-placement="top" data-toggle="tooltip" title="2.Mata"><a data-toggle="modal" href='#pf-2' class="danger">2</a></span></div>
                             <div class="marker-pf" style="top: 22%;left: 31%;"><span data-placement="top" data-toggle="tooltip" title="3.Telinga"><a data-toggle="modal" href='#pf-3'>3</a></span></div>
                             <div class="marker-pf" style="top: 26%;left: 46%;"><span data-placement="top" data-toggle="tooltip" title="4.Hidung"><a data-toggle="modal" href='#pf-4'>4</a></span></div>
                             <div class="marker-pf" style="top: 34%;left: 47%;"><span data-placement="top" data-toggle="tooltip" title="5.Tenggorokan,Mulut,Geligi"><a data-toggle="modal" href='#pf-5'>5</a></span></div>
                            </div>
                          </div>
                          <div class="ktk-pf">
                            <img src="<?=base_url('assets/dist/img/2baru.jpg');?>" alt="">
                            <div class="markers-pf">
                             <div class="marker-pf" style="top: 9%;left: 48%;"><span data-placement="top" data-toggle="tooltip" title="6.Dada"><a data-toggle="modal" href='#pf-6'>6</a></span></div>
                             <div class="marker-pf" style="top: 17%;left: 48%;"><span data-placement="top" data-toggle="tooltip" title="7.Paru"><a data-toggle="modal" href='#pf-7' class="danger">7</a></span></div>
                             <div class="marker-pf" style="top: 22%;left: 56%;"><span data-placement="top" data-toggle="tooltip" title="8.Jantung"><a data-toggle="modal" href='#pf-8'>8</a></span></div>
                             <div class="marker-pf" style="top: 47%;left:52%"><span data-placement="top" data-toggle="tooltip" title="9.Abdomen"><a data-toggle="modal" href='#pf-9'>9</a></span></div>
                             <div class="marker-pf" style="top: 30%;left: 41%;"><span data-placement="top" data-toggle="tooltip" title="10.Liver"><a data-toggle="modal" href='#pf-10'>10</a></span></div>
                             <div class="marker-pf" style="top: 31%;left: 56%;"><span data-placement="top" data-toggle="tooltip" title="11.Maag"><a data-toggle="modal" href='#pf-11' class="danger">11</a></span></div>
                             <div class="marker-pf" style="top: 55%;left: 39%;"><span data-placement="top" data-toggle="tooltip" title="12.Usus Besar"><a data-toggle="modal" href='#pf-12'>12</a></span></div>
                             <div class="marker-pf" style="top: 62%;left: 48%;"><span data-placement="top" data-toggle="tooltip" title="13.Appendix"><a data-toggle="modal" href='#pf-13'>13</a></span></div>
                             <div class="marker-pf" style="top: 74%;left: 47%;"><span data-placement="top" data-toggle="tooltip" title="14.Genital"><a data-toggle="modal" href='#pf-14'>14</a></span></div>
                            </div>
                          </div>
                          <div class="ktk-pf">
                            <img src="<?=base_url('assets/dist/img/3baru.jpg');?>" alt="">
                            <div class="markers-pf">
                             <div class="marker-pf" style="top: 25%;left: 24%;"><span data-placement="top" data-toggle="tooltip" title="15.Extremitas Atas"><a data-toggle="modal" href='#pf-15'>15</a></span></div>
                             <div class="marker-pf" style="top: 54%;left: 12%;"><span data-placement="top" data-toggle="tooltip" title="16.Extremitas Bawah"><a data-toggle="modal" href='#pf-16'>16</a></span></div>
                             <div class="marker-pf" style="top: 14%;left: 51%;"><span data-placement="top" data-toggle="tooltip" title="17.Punggung"><a data-toggle="modal" href='#pf-17'>17</a></span></div>
                             <div class="marker-pf" style="top: 50%;left: 48%;"><span data-placement="top" data-toggle="tooltip" title="18.Pinggang"><a data-toggle="modal" href='#pf-18' class="danger">18</a></span></div>
                             <div class="marker-pf" style="top: 72%;left: 47%;"><span data-placement="top" data-toggle="tooltip" title="19.Bokong"><a data-toggle="modal" href='#pf-19'>19</a></span></div>
                            </div>
                          </div>
                      </div>
                     </center>

                     <form method="post" class="form-temuanpf">
                        <?php for ($i=1; $i < 20 ; $i++) { ?>
                        <div class="modal fade" id="pf-<?=$i?>">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">
                                  <?php if($i==1) { echo 'Kepala'; } ?>
                                  <?php if($i==2) { echo 'Mata'; } ?>
                                  <?php if($i==3) { echo 'Telinga'; } ?>
                                  <?php if($i==4) { echo 'Hidung'; } ?>
                                  <?php if($i==5) { echo 'Tenggorokan,Mulut,Geligi'; } ?>
                                  <?php if($i==6) { echo 'Dada'; } ?>
                                  <?php if($i==7) { echo 'Paru'; } ?>
                                  <?php if($i==8) { echo 'Jantung'; } ?>
                                  <?php if($i==9) { echo 'Abdomen'; } ?>
                                  <?php if($i==10) { echo 'Liver'; } ?>
                                  <?php if($i==11) { echo 'Maag'; } ?>
                                  <?php if($i==12) { echo 'Usus Besar'; } ?>
                                  <?php if($i==13) { echo 'Appendix'; } ?>
                                  <?php if($i==14) { echo 'Genital'; } ?>
                                  <?php if($i==15) { echo 'Extremitas Atas'; } ?>
                                  <?php if($i==16) { echo 'Extremitas Bawah'; } ?>
                                  <?php if($i==17) { echo 'Punggung'; } ?>
                                  <?php if($i==18) { echo 'Pinggang'; } ?>
                                  <?php if($i==19) { echo 'Bokong'; } ?>
                                </h4>
                              </div>
                              <div class="modal-body" style="overflow: hidden;">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="<?php if($i==1) { echo 'pf-'.$i;  } elseif($i==2) { echo 'pf-'.$i; } elseif($i==3) { echo 'pf-'.$i; } elseif($i==4) { echo 'pf-'.$i; } elseif($i==5) { echo 'pf-'.$i; } elseif($i==6) { echo 'pf-'.$i; } elseif($i==7) { echo 'pf-'.$i; } elseif($i==8) { echo 'pf-'.$i; } elseif($i==9) { echo 'pf-'.$i; } elseif($i==10) { echo 'pf-'.$i; } elseif($i==11) { echo 'pf-'.$i; } elseif($i==12) { echo 'pf-'.$i; } elseif($i==13) { echo 'pf-'.$i; } elseif($i==14) { echo 'pf-'.$i; } elseif($i==15) { echo 'pf-'.$i; } elseif($i==16) { echo 'pf-'.$i; } elseif($i==17) { echo 'pf-'.$i; } elseif($i==18) { echo 'pf-'.$i; } elseif($i==19) { echo 'pf-'.$i; } ?>"  class="form-control"><?php foreach ($temuan as $dttemuan ) { if($dttemuan->pf_nomer==$i) { echo $dttemuan->pf_temuan;  } } ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                      <div class="ktk-abu">
                        <?php if ($state!='temuan'): ?>
                          <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <?php endif ?>
                        <button type="button" class="btn btn-primary btn-flat next-step temuanpf-next">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane <?php if($state=='penunjang_medis')echo'active'; ?>" role="tabpanel" id="step5">
                    <form method="post" class="form-penunjang" enctype="multipart/form-data">
                      <h3>Penunjang Medis</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="control-label col-sm-2">Kategori :</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="kategori" id="kat_penunjang">
                                <option value="Lab" <?php if($dt->ku_penunjangmedis=='Lab'){echo'selected';} ?> >Lab</option>
                                <option value="Exray" <?php if($dt->ku_penunjangmedis=='Exray'){echo'selected';} ?> >Exray</option>
                                <option value="Electro Medis" <?php if($dt->ku_penunjangmedis=='Electro Medis'){echo'selected';} ?> >Electro Medis</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">File Upload :</label>
                            <div class="col-sm-10">
                              <input type="file" name="file" value="" placeholder="" class="form-control" id="file_penunjang">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <?php if ($state!='penunjang_medis'): ?>
                          <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <?php endif ?>
                        <button type="button" class="btn btn-primary btn-flat next-step penunjang-next">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane <?php if($state=='diagnosa')echo'active'; ?>" role="tabpanel" id="step6">
                    <form method="post" class="form-diagnosa">
                      <h3>Diagnosa</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="control-label col-sm-2">Diagnosa :</label>
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-md-10">
                                  <select name="diagnosa" class="form-control select2" style="margin-bottom: 10px;width: 377px;" id="diagnosa">
                                    <?php foreach ($diagnosa->result() as $dt_diag): ?>
                                    <option value="<?=$dt_diag->id_diagnosa?>" <?php if($dt->ku_iddiagnosa==$dt_diag->id_diagnosa) echo'selected'; ?> ><?=$dt_diag->nama?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                                <div class="col-sm-2"> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <?php if ($state!='diagnosa'): ?>
                          <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <?php endif ?>
                        <button type="button" class="btn btn-primary btn-flat next-step diagnosa-next">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane <?php if($state=='tindakan')echo'active'; ?>" role="tabpanel" id="step7">
                    <form method="post" class="form-tindakan">
                      <h3>Tindakan</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 optionBox-obat">
                          <div class="form-group block-obat">
                            <label class="control-label col-sm-2">Pilih Obat :</label><input name="jumlah[]" type="hidden">
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="row">
                                  <select name="obat1" class="form-control select2" id="obat1" style="margin-bottom: 10px;width: 100%;">
                                    <?php foreach ($obat->result() as $dt_obat): ?>
                                    <option value="<?=$dt_obat->id_obat?>"><?=$dt_obat->nama_obat?></option>
                                    <?php endforeach ?>
                                  </select>
                                  </div>
                                  <div class="row">
                                    <div class="aturan-pakai">
                                      <select name="jenis1" id="inputJenis1" class="form-control" onchange="obat('1')"  style="margin-top: 10px;">
                                        <option value="">Pilih Jenis Obat</option>
                                        <option value="oral">Per Oral</option>
                                        <option value="topikal">Topikal</option>
                                        <option value="suntikan">Suntikan</option>
                                        <option value="rectum">Per anus / rectum</option>
                                      </select>
                                      <div class="oral1" style="display: none;">
                                        <div class="radio" id="oral-tipe1" onclick="oraltipe('1')">
                                          <label class="radio-inline"><input type="radio" class="oral-tipe1" name="oral-tipe1" value="tablet" checked="true">Tablet/Kaplet/Kapsul</label>
                                          <label class="radio-inline"><input type="radio" class="oral-tipe1" name="oral-tipe1" value="sirup">Syrup/Liquid</label>
                                        </div>
                                        <div class="radio" id="oral-minum">
                                          <label class="radio-inline"><input type="radio" name="oral-minum1" checked="true" value="1X Sehari">1x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="oral-minum1" value="2X Sehari">2x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="oral-minum1" value="3X Sehari">3x Sehari</label>
                                        </div>
                                        <div class="radio" id="oral-sendok1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="oral-sendok1" checked="true" value="1sdm">1sdm</label>
                                          <label class="radio-inline"><input type="radio" name="oral-sendok1" value="2sdt">2sdt</label>
                                          <label class="radio-inline"><input type="radio" name="oral-sendok1" value="3ml">3ml</label>
                                        </div>
                                        <input type="text" name="jml-minum1" id="inputjml-minum" class="form-control" value="" required="required" pattern="" title="" placeholder="Jumlah" style="margin-top: 5px;">
                                      </div>
                                      <div class="topikal1" style="display: none;">
                                        <div class="radio" id="topikal-tipe" onclick="topikaltipe('1')">
                                          <label class="radio-inline"><input type="radio" class="topikal-tipe1" name="topikal-tipe1" value="oles" checked="true">Oleskan</label>
                                          <label class="radio-inline"><input type="radio" class="topikal-tipe1" name="topikal-tipe1" value="tetes">Teteskan</label>
                                        </div>
                                        <div class="radio" id="topikal-letak-pakai1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-pakai1" checked="true" value="Mata">Mata</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-pakai1" value="Hidung">Hidung</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-pakai1" value="Telinga">Telinga</label>
                                        </div>
                                        <div class="radio" id="topikal-letak-spesifik1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-spesifik1" checked="true" value="Kiri">Kiri</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-spesifik1" value="Kanan">Kanan</label>
                                        </div>
                                        <div class="radio" id="topikal-pakai">
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai1" checked="true" value="1x Sehari">1x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai1" value="2x Sehari">2x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai1" value="3x Sehari">3x Sehari</label>
                                        </div>
                                        <div class="radio" id="topikal-pakai-tetes1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai-tetes1" checked="true" value="1x Tetes">1x Tetes</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai-tetes1" value="2x Tetes">2x Tetes</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai-tetes1" value="3x Tetes">3x Tetes</label>
                                        </div>
                                        <input type="text" name="jml-topikal1" id="inputjml-topikal" class="form-control" value="" required="required" pattern="" title="" placeholder="Jumlah" style="margin-top: 5px;">
                                      </div>
                                      <div class="suntikan1" style="display: none;">
                                        <div class="radio" id="suntikan-tipe">
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1" checked="true" value="IM">IM</label>
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1" value="IV">IV</label>
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1" value="Subcutan">Subcutan</label>
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1" value="Intracutan">Intracutan</label>
                                        </div>
                                        <div class="input-group" style="margin-top: 5px;">
                                        <input type="text" name="jml-suntikan" id="inputjml-rectum" class="form-control" value="" required="required" pattern="" title="" placeholder="Ampul" >
                                        <span class="input-group-addon">Ampul</span>
                                        </div>
                                      </div>
                                      <div class="rectum1" style="display: none;">
                                        <div class="radio" id="rectum-tipe">
                                          <label class="radio-inline"><input type="radio" name="rectum-tipe1" value="p.r.n" checked="true">p.r.n</label>
                                          <label class="radio-inline"><input type="radio" name="rectum-tipe1" value="Lain - lain">Lain - lain</label>
                                        </div>
                                        <input type="text" name="jml-rectum" id="inputjml-rectum" class="form-control" value="" required="required" pattern="" title="" placeholder="PCS" style="margin-top: 5px;">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-2">
                                 <!-- <button type="button" class="btn btn-danger btn-flat disabled"><i class="fa fa-close"></i></button> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                              <label><input type="checkbox" name="is_kontrol" value="kontrol"> Apakah harus kontrol kembali 3 hari ?</label>
                              <br>
                              <button type="button" class="btn btn-success btn-flat add-obat"><i class="fa fa-plus"></i> Tambah Obat</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <?php if ($state!='tindakan'): ?>
                          <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <?php endif ?>
                        <button type="button" class="btn btn-primary btn-flat tindakan-next"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </div>
                  <div class="clearfix"></div>
                </form>
              </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function(){

      $("button.perihal-next").click(function(){
        var data = $('.form-perihal').serialize();
        var link="<?= base_url('kuratif/ajaxperihal') ?>"
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
          },
          success: function(){  

          }
        });
      });

      $("button.riwayat-next").click(function(){
        var data = $('.form-riwayat').serialize();
        var link="<?= base_url('kuratif/ajaxriwayat') ?>"
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
          },
          success: function(){  

          }
        });
      });

      $("button.vital-next").click(function(){
        var data = $('.form-vital').serialize();
        var link="<?= base_url('kuratif/ajaxvital') ?>"
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
          },
          success: function(){  

          }
        });
      });

      $("button.temuanpf-next").click(function(){
        var data = $('.form-temuanpf').serialize();
        var link="<?= base_url('kuratif/ajaxtemuanpf') ?>"
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
          },
          success: function(){  

          }
        });
      });

      $("button.penunjang-next").click(function(){
        var link="<?= base_url('kuratif/ajaxpenunjang') ?>";
        var file_data = $("#file_penunjang").prop("files")[0];   // Getting the properties of file from file field
        var form_data = new FormData();  
        var other_data = $('.form-penunjang').serializeArray();
          $.each(other_data,function(key,input){
              form_data.append(input.name,input.value);
          });
        form_data.append("file", file_data);  
        $.ajax({
          url: link,
          type: 'POST',
          processData: false, // important
          contentType: false, // important
          dataType : 'script',
          data: form_data,
          beforeSend: function(){
            $('#loader').show();
          },
          complete: function(){
            $('#loader').hide();
          },
          success: function(){  

          }
        });
      });


      $("button.diagnosa-next").click(function(){
        var data = $('.form-diagnosa').serialize();
        var link="<?= base_url('kuratif/ajaxdiagnosa') ?>"
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
          },
          success: function(){  

          }
        });
      });

      $("button.tindakan-next").click(function(){
        var data = $('.form-tindakan').serialize();
        var link="<?= base_url('kuratif/ajaxtindakan') ?>"
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
          },
          success: function(){  

          }
        });
      });

    });
</script>

<script type="text/javascript">
  

  function oraltipe(id){
    tipe = $('.oral-tipe'+id+':checked').val();
    if (tipe == 'tablet') {
      $('#oral-sendok'+id).hide();  
    } else if (tipe == 'sirup'){
      $('#oral-sendok'+id).show();
    } 
  }

  function topikaltipe(id){
    tipe = $('.topikal-tipe'+id+':checked').val();
    if (tipe == 'oles') {
      $('#topikal-letak-pakai'+id).hide();  
      $('#topikal-letak-spesifik'+id).hide();  
      $('#topikal-pakai-tetes'+id).hide();  
    } else if (tipe == 'tetes'){
      $('#topikal-letak-pakai'+id).show();  
      $('#topikal-letak-spesifik'+id).show();  
      $('#topikal-pakai-tetes'+id).show();  
    } 
  }


  function obat(id){
   var jenis = $("#inputJenis"+id+" option:selected").val();
   if (jenis == "oral") {
    $('.oral'+id).show();
    $('.topikal'+id).hide();
    $('.suntikan'+id).hide();
    $('.rectum'+id).hide();
   } else if (jenis == "topikal"){
    $('.oral'+id).hide();
    $('.topikal'+id).show();
    $('.suntikan'+id).hide();
    $('.rectum'+id).hide();
   } else if (jenis == "suntikan"){
    $('.oral'+id).hide();
    $('.topikal'+id).hide();
    $('.suntikan'+id).show();
    $('.rectum'+id).hide();
   } else if (jenis == "rectum"){
    $('.oral'+id).hide();
    $('.topikal'+id).hide();
    $('.suntikan'+id).hide();
    $('.rectum'+id).show();
   } else {
    $('.oral'+id).hide();
    $('.topikal'+id).hide();
    $('.suntikan'+id).hide();
    $('.rectum'+id).hide();
   }
  }

  var rowCount = 2;
  $('.add-obat').click(function() {
    // var rowCount = 1;
    var maxRow = 5;
  
    if (rowCount <= maxRow) {
      $('.block-obat:last').after('<div class="form-group block-obat" id="o'+rowCount+'"><input name="jumlah[]" type="hidden">'+
        '<label class="control-label col-sm-2">Pilih Obat :</label>'+
        '<div class="col-sm-8">'+
          '<div class="row">'+
            '<div class="col-md-10">'+
              '<div class="row">'+
                '<select name="obat'+rowCount+'" class="form-control select2" id="obat'+rowCount+'" style="margin-bottom: 10px;">'+
                '<?php foreach ($obat->result() as $dt_obat) { ?>'+
                  '<option value="<?= $dt_obat->id_obat ?>"><?= $dt_obat->nama_obat ?></option>'+
                '<?php } ?>'+
                '</select>'+
              '</div>'+
              '<div class="row"><div class="aturan-pakai"><select name="jenis'+rowCount+'" id="inputJenis'+rowCount+'" class="form-control" onchange="obat('+rowCount+')"  style="margin-top: 10px;"><option value="">Pilih Jenis Obat</option><option value="oral">Per Oral</option><option value="topikal">Topikal</option><option value="suntikan">Suntikan</option><option value="rectum">Per anus / rectum</option></select><div class="oral'+rowCount+'" style="display: none;"><div class="radio" id="oral-tipe'+rowCount+'" onclick="oraltipe('+rowCount+')"><label class="radio-inline"><input type="radio" class="oral-tipe'+rowCount+'" name="oral-tipe'+rowCount+'" value="tablet" checked="true">Tablet/Kaplet/Kapsul</label><label class="radio-inline"><input type="radio" class="oral-tipe'+rowCount+'" name="oral-tipe'+rowCount+'" value="sirup">Syrup/Liquid</label></div><div class="radio" id="oral-minum"><label class="radio-inline"><input type="radio" name="oral-minum'+rowCount+'" checked="true" value="1X Sehari">1x Sehari</label><label class="radio-inline"><input type="radio" name="oral-minum'+rowCount+'" value="2X Sehari">2x Sehari</label><label class="radio-inline"><input type="radio" name="oral-minum'+rowCount+'" value="3X Sehari">3x Sehari</label></div><div class="radio" id="oral-sendok'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="oral-sendok'+rowCount+'" checked="true" value="1sdm">1sdm</label><label class="radio-inline"><input type="radio" name="oral-sendok'+rowCount+'" value="2sdt">2sdt</label><label class="radio-inline"><input type="radio" name="oral-sendok'+rowCount+'" value="3ml">3ml</label></div><input type="text" value="0" required="required" name="jml-minum'+rowCount+'" id="inputjml-minum" class="form-control"  placeholder="Jumlah" style="margin-top: 5px;"></div><div class="topikal'+rowCount+'" style="display: none;"><div class="radio" id="topikal-tipe" onclick="topikaltipe('+rowCount+')"><label class="radio-inline"><input type="radio" class="topikal-tipe'+rowCount+'" name="topikal-tipe'+rowCount+'" value="oles" checked="true">Oleskan</label><label class="radio-inline"><input type="radio" class="topikal-tipe'+rowCount+'" name="topikal-tipe'+rowCount+'" value="tetes">Teteskan</label></div><div class="radio" id="topikal-letak-pakai'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="topikal-letak-pakai'+rowCount+'" checked="true" value="Mata">Mata</label><label class="radio-inline"><input type="radio" name="topikal-letak-pakai'+rowCount+'" value="Hidung">Hidung</label><label class="radio-inline"><input type="radio" name="topikal-letak-pakai'+rowCount+'" value="Telinga">Telinga</label></div><div class="radio" id="topikal-letak-spesifik'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="topikal-letak-spesifik'+rowCount+'" checked="true" value="Kiri">Kiri</label><label class="radio-inline"><input type="radio" name="topikal-letak-spesifik'+rowCount+'" value="Kanan">Kanan</label></div><div class="radio" id="topikal-pakai"><label class="radio-inline"><input type="radio" name="topikal-pakai'+rowCount+'" checked="true" value="1x Sehari">1x Sehari</label><label class="radio-inline"><input type="radio" name="topikal-pakai'+rowCount+'" value="2x Sehari">2x Sehari</label><label class="radio-inline"><input type="radio" name="topikal-pakai'+rowCount+'" value="3x Sehari">3x Sehari</label></div><div class="radio" id="topikal-pakai-tetes'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="topikal-pakai-tetes'+rowCount+'" checked="true">1x Tetes</label><label class="radio-inline"><input type="radio" name="topikal-pakai-tetes'+rowCount+'">2x Tetes</label><label class="radio-inline"><input type="radio" name="topikal-pakai-tetes'+rowCount+'">3x Tetes</label></div><input type="text" value="0" required="required" name="jml-topikal'+rowCount+'" id="inputjml-topikal" class="form-control"  placeholder="Jumlah" style="margin-top: 5px;"></div><div class="suntikan'+rowCount+'" style="display: none;"><div class="radio" id="suntikan-tipe"><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'" checked="true" value="IM">IM</label><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'" value="IV">IV</label><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'" value="Subcutan">Subcutan</label><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'" value="Intracutan">Intracutan</label></div><div class="input-group" style="margin-top: 5px;"><input type="text" value="0" required="required" name="jml-suntikan'+rowCount+'" id="inputjml-rectum" class="form-control"  placeholder="Ampul" ><span class="input-group-addon">Ampul</span></div></div><div class="rectum'+rowCount+'" style="display: none;"><div class="radio" id="rectum-tipe"><label class="radio-inline"><input type="radio" name="rectum-tipe'+rowCount+'" value="p.r.n" checked="true">p.r.n</label><label class="radio-inline"><input type="radio" name="rectum-tipe'+rowCount+'" value="Lain - lain">Lain - lain</label></div><input type="text" value="0" required="required" name="jml-rectum'+rowCount+'" id="inputjml-rectum" class="form-control"  placeholder="PCS" style="margin-top: 5px;"></div></div></div>'+
            '</div>'+
            '<div class="col-sm-2">'+
            '<button type="button" class="btn btn-flat btn-danger" id="remove-obat"><i class="fa fa-close"></i></button>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>');
      $("select[name='obat[]']").select2();
      rowCount ++;
    }
  });
  $('.optionBox-obat').on('click','#remove-obat',function() {
    rowCount--;
    $(this).parent().parent().parent().parent().remove();
  });

  document.getElementById('perihal').addEventListener('change', function () {
      var style = this.value == 'mcu' ? 'block' : 'none';
      document.getElementById('mcu').style.display = style;
  });

  $(document).ready(function () {
      //Select 2
      $(".select3").select2();

      //Initialize tooltips
      $('.nav-tabs > li a[title]').tooltip();
      
      //Wizard
      $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

          var $target = $(e.target);
      
          if ($target.parent().hasClass('disabled')) {
              return false;
          }
      });

      $(".next-step").click(function (e) {

          var $active = $('.wizard .nav-tabs li.active');
          $active.next().removeClass('disabled');
          nextTab($active);

      });
      $(".prev-step").click(function (e) {

          var $active = $('.wizard .nav-tabs li.active');
          prevTab($active);

      });
  });

  function nextTab(elem) {
      $(elem).next().find('a[data-toggle="tab"]').click();
  }
  function prevTab(elem) {
      $(elem).prev().find('a[data-toggle="tab"]').click();
  }
</script>
<?php } ?>
<script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.js" type="text/javascript"></script>
<script src="<?=base_url('assets'); ?>/plugins/jQueryUI/jquery-ui.min.js"></script>