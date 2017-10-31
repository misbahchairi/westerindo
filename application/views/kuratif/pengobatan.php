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

</style>
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
    <div class="box box-success hide" id="riwayat-pasien">
      <div class="box-header with-border">
        <h3 class="box-title">Info Pasien</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-3">
            <div class="img-pasien" id="img-pasien">
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

                  <li role="presentation" class="active">
                      <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Perihal">
                          <span class="round-tab">
                              Perihal
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="disabled">
                      <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Riwayat Penyakit">
                          <span class="round-tab">
                              Riwayat Penyakit
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="disabled">
                      <a href="#step3" data-toggle="tab" aria-controls="complete" role="tab" title="Tanda Vital">
                          <span class="round-tab">
                              Tanda Vital
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="disabled">
                      <a href="#step4" data-toggle="tab" aria-controls="step3" role="tab" title="Temuan PF">
                          <span class="round-tab">
                              Temuan PF
                          </span>
                      </a>
                  </li>
                  <li role="presentation" class="disabled">
                      <a href="#step5" data-toggle="tab" aria-controls="complete" role="tab" title="Penunjang Medis">
                          <span class="round-tab">
                              Penunjang Medis
                          </span>
                      </a>
                  </li>


                  <li role="presentation" class="disabled">
                      <a href="#step6" data-toggle="tab" aria-controls="complete" role="tab" title="Diagnosa">
                          <span class="round-tab">
                              Diagnosa
                          </span>
                      </a>
                  </li>

                  <li role="presentation" class="disabled">
                      <a href="#step7" data-toggle="tab" aria-controls="complete" role="tab" title="Tindakan">
                          <span class="round-tab">
                              Tindakan
                          </span>
                      </a>
                  </li>
              </ul>
          </div>

              <div class="tab-content">
                  <div class="tab-pane active" role="tabpanel" id="step1">
                    <form method="post" class="form-perihal">
                      <h3>Perihal</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group" style="overflow:hidden;">
                            <label class="control-label col-sm-2">Nama :</label>
                            <div class="col-sm-10">
                              <div class="input-group">
                                <input type="text" id="nama" class="form-control" placeholder="Isi Dengan Nama atau NIP" name="nama">
                                <input type="hidden" name="nik" id="nik">
                                <input type="hidden" name="idpasien" id="idpasien">
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-default btn-flat" id="proses-riwayat">Proses</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">Input Perihal :</label>
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
                        <button type="button" class="btn btn-primary btn-flat next-step perihal-next" id="btn-next" disabled="true">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step2">
                      <h3>Riwayat Penyakit</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="control-label col-sm-2">Status :</label>
                            <div class="col-sm-10">
                              <select class="form-control">
                                <option value="">Gawat</option>
                                <option value="">Tidak</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <button type="button" class="btn btn-primary btn-flat next-step">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step3">
                      <h3>Tanda Vital</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="control-label col-sm-3">Tanda-Tanda Vital :</label>
                            <div class="col-sm-9">
                              <select name="tanda_vital" class="form-control">
                                <option value="td">TD</option>
                                <option value="n">N</option>
                                <option value="s">S</option>
                                <option value="rr">RR</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3">Tekanan Darah :</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" class="form-control" name="nadi" placeholder="Nadi">
                                <span class="input-group-addon">/menit</span>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" class="form-control" name="suhu" placeholder="Suhu">
                                <span class="input-group-addon">&#8451;</span>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <input type="text" class="form-control" name="pernafasan" placeholder="Pernafasan">
                                <span class="input-group-addon">/menit</span>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-3">Kesadaran :</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon">G</span>
                                <input type="text" class="form-control" name="kesadaran_g" placeholder="">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon">C</span>
                                <input type="text" class="form-control" name="kesadaran_c" placeholder="">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <span class="input-group-addon">S</span>
                                <input type="text" class="form-control" name="kesadaran_s" placeholder="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <button type="button" class="btn btn-primary btn-flat next-step">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step4">
                      <h3>Temuan PF</h3>
                        <center>
                      <div class="pf">
                          <div class="ktk-pf">
                            <img src="<?=base_url('assets/dist/img/1baru.jpg');?>" alt="">
                            <div class="markers-pf">
                             <div class="marker-pf" style="top: 8%;left: 46%;"><span data-placement="top" data-toggle="tooltip" title="1.Kepala"><a data-toggle="modal" href='#pf-1'>1</a></span></div>
                             <div class="marker-pf" style="top: 19%;left: 40%;"><span data-placement="top" data-toggle="tooltip" title="2.Mata"><a data-toggle="modal" href='#pf-2' class="danger">2</a></span></div>
                             <div class="marker-pf" style="top: 22%;left: 31%;"><span data-placement="top" data-toggle="tooltip" title="3.Telinga"><a data-toggle="modal" href='#pf-3'>3</a></span></div>
                             <div class="marker-pf" style="top: 34%;left: 47%;"><span data-placement="top" data-toggle="tooltip" title="4.Hidung"><a data-toggle="modal" href='#pf-4'>4</a></span></div>
                             <div class="marker-pf" style="top: 26%;left: 46%;"><span data-placement="top" data-toggle="tooltip" title="5.Tenggorokan,Mulut,Geligi"><a data-toggle="modal" href='#pf-5'>5</a></span></div>
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
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <button type="button" class="btn btn-primary btn-flat next-step">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step5">
                      <h3>Penunjang Medis</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="control-label col-sm-2">Kategori :</label>
                            <div class="col-sm-10">
                              <select class="form-control">
                                <option value="">Lab</option>
                                <option value="">Exray</option>
                                <option value="">Electro Medis</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2">File Upload :</label>
                            <div class="col-sm-10">
                              <input type="file" name="" value="" placeholder="" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <button type="button" class="btn btn-primary btn-flat next-step">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step6">
                      <h3>Diagnosa</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 optionBox-diagnosa">
                          <div class="form-group block-diagnosa">
                            <label class="control-label col-sm-2">Diagnosa :</label>
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-md-10">
                                  <select name="diagnosa[]" class="form-control select2" style="margin-bottom: 10px;width: 377px;" id="diagnosa">
                                    <?php foreach ($diagnosa->result() as $dt_diag): ?>
                                    <option value="<?=$dt_diag->id_diagnosa?>"><?=$dt_diag->nama?></option>
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
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                             <button type="button" class="btn btn-success btn-flat add-diagnosa"><i class="fa fa-plus"></i> Tambah Diagnosa</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>
                        <button type="button" class="btn btn-primary btn-flat next-step">Next <i class="fa fa-long-arrow-right"></i></button>
                      </div>
                  </div>
                  <div class="tab-pane" role="tabpanel" id="step7">
                      <h3>Tindakan</h3>
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 optionBox-obat">
                          <div class="form-group block-obat">
                            <label class="control-label col-sm-2">Pilih Obat :</label>
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="row">
                                  <select name="obat[]" class="form-control select2" id="obat1" style="margin-bottom: 10px;width: 100%;">
                                    <?php foreach ($obat->result() as $dt_obat): ?>
                                    <option value="<?=$dt_obat->id_obat?>"><?=$dt_obat->nama_obat?></option>
                                    <?php endforeach ?>
                                  </select>
                                  </div>
                                  <div class="row">
                                    <div class="aturan-pakai">
                                      <select name="jenis" id="inputJenis1" class="form-control" onchange="obat('1')"  style="margin-top: 10px;">
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
                                          <label class="radio-inline"><input type="radio" name="oral-minum1" checked="true">1x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="oral-minum1">2x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="oral-minum1">3x Sehari</label>
                                        </div>
                                        <div class="radio" id="oral-sendok1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="oral-sendok1" checked="true">1sdm</label>
                                          <label class="radio-inline"><input type="radio" name="oral-sendok1">2sdt</label>
                                          <label class="radio-inline"><input type="radio" name="oral-sendok1">3ml</label>
                                        </div>
                                        <input type="text" name="jml-minum" id="inputjml-minum" class="form-control" value="" required="required" pattern="" title="" placeholder="Jumlah" style="margin-top: 5px;">
                                      </div>
                                      <div class="topikal1" style="display: none;">
                                        <div class="radio" id="topikal-tipe" onclick="topikaltipe('1')">
                                          <label class="radio-inline"><input type="radio" class="topikal-tipe1" name="topikal-tipe1" value="oles" checked="true">Oleskan</label>
                                          <label class="radio-inline"><input type="radio" class="topikal-tipe1" name="topikal-tipe1" value="tetes">Teteskan</label>
                                        </div>
                                        <div class="radio" id="topikal-letak-pakai1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-pakai1" checked="true">Mata</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-pakai1">Hidung</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-pakai1">Telinga</label>
                                        </div>
                                        <div class="radio" id="topikal-letak-spesifik1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-spesifik1" checked="true">Kiri</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-letak-spesifik1">Kanan</label>
                                        </div>
                                        <div class="radio" id="topikal-pakai">
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai1" checked="true">1x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai1">2x Sehari</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai1">3x Sehari</label>
                                        </div>
                                        <div class="radio" id="topikal-pakai-tetes1" style="display: none;">
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai-tetes1" checked="true">1x Tetes</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai-tetes1">2x Tetes</label>
                                          <label class="radio-inline"><input type="radio" name="topikal-pakai-tetes1">3x Tetes</label>
                                        </div>
                                        <input type="text" name="jml-topikal" id="inputjml-topikal" class="form-control" value="" required="required" pattern="" title="" placeholder="Jumlah" style="margin-top: 5px;">
                                      </div>
                                      <div class="suntikan1" style="display: none;">
                                        <div class="radio" id="suntikan-tipe">
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1" checked="true">IM</label>
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1">IV</label>
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1">Subcutan</label>
                                          <label class="radio-inline"><input type="radio" name="suntikan-tipe1">Intracutan</label>
                                        </div>
                                        <div class="input-group" style="margin-top: 5px;">
                                        <input type="text" name="jml-rectum" id="inputjml-rectum" class="form-control" value="" required="required" pattern="" title="" placeholder="Ampul" >
                                        <span class="input-group-addon">Ampul</span>
                                        </div>
                                      </div>
                                      <div class="rectum1" style="display: none;">
                                        <div class="radio" id="rectum-tipe">
                                          <label class="radio-inline"><input type="radio" name="rectum-tipe1" value="prn" checked="true">p.r.n</label>
                                          <label class="radio-inline"><input type="radio" name="rectum-tipe1" value="lain">Lain - lain</label>
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
                              <label><input type="checkbox" name="is_kontrol" value=""> Apakah harus kontrol kembali 3 hari ?</label>
                              <br>
                              <button type="button" class="btn btn-success btn-flat add-obat"><i class="fa fa-plus"></i> Tambah Obat</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="ktk-abu">
                        <button type="button" class="btn btn-warning btn-flat pull-left prev-step"><i class="fa fa-long-arrow-left"></i> Previous</button>

                        <button type="submit" class="btn btn-primary btn-flat next-step"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </div>
                  <div class="clearfix"></div>
              </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->


<?php for ($i=1; $i < 20 ; $i++) { 
?>
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
            <textarea name="<?php if($i==1) { echo 'kepala';  } elseif($i==2) { echo 'mata'; } elseif($i==3) { echo 'telinga'; } elseif($i==4) { echo 'hidung'; } elseif($i==5) { echo 'tenggorokan'; } elseif($i==6) { echo 'dada'; } elseif($i==7) { echo 'paru'; } elseif($i==8) { echo 'jantung'; } elseif($i==9) { echo 'abdomen'; } elseif($i==10) { echo 'liver'; } elseif($i==11) { echo 'maag'; } elseif($i==12) { echo 'usus_besar'; } elseif($i==13) { echo 'appendix'; } elseif($i==14) { echo 'genital'; } elseif($i==15) { echo 'extremitas_atas'; } elseif($i==16) { echo 'extremitas_bawah'; } elseif($i==17) { echo 'punggung'; } elseif($i==18) { echo 'pinggang'; } elseif($i==19) { echo 'bokong'; } ?>"  class="form-control"></textarea>
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

<script type="text/javascript">
  $(document).ready(function(){
      $("button.perihal-next").click(function(){
        var data = $('.form-perihal').serialize();
        var link="<?= base_url('kuratif/ajaxperihal') ?>"
        $.ajax({
          type: 'POST',
          url: link,
          data: data,
          beforeSend: function() {
             $('#loader').show();
          },
          complete: function(){
             $('#loader').hide();
          },
          success: function() {

          }
        });
      });
    });
</script>

<?php
// diagnosa
$json='<div class="form-group block-diagnosa"><label class="control-label col-sm-2">Diagnosa :</label><div class="col-sm-8"><div class="row"><div class="col-md-10"><div class=""><select name="diagnosa[]" class="form-control select2" style="margin-bottom: 10px;">';
foreach ($diagnosa->result() as $dt_diag) {
  $id_diag = $dt_diag->id_diagnosa;
  $nama_diag = $dt_diag->nama;
  $json = $json.'<option value="'.$id_diag.'">'.$nama_diag.'</option>';
}
$json = $json.'</select></div></div><div class="col-sm-2"><button type="button" class="btn btn-flat btn-danger" id="remove-diagnosa"><i class="fa fa-close"></i></button></div></div></div></div>';

?>
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
  $('#proses-riwayat').click(function(){
    var nik = $('input[name="nik"]').val();
    if (nik != "") {
      var nama = $('input[name="nama"]').val();

      $.ajax({ 
          url: '<?= base_url(); ?>kuratif/prosesriwayat',
          data: {"nama": nama,"nik": nik},
          cache: false,
          type: 'post',
          success: function(result){
            $('#riwayat-pasien').removeClass('hide');
            $("#img-pasien").html(result);
            $('#btn-next').prop('disabled', false);
          }
      });
    } else {
      alert("Pastikan anda isi Nama / Nik dengan benar");
    }
  });

  $('.add-diagnosa').click(function() {
      $('.block-diagnosa:last').after(<?="'".$json."'";?>);
      $("select[name='diagnosa[]']").select2();
  });
  $('.optionBox-diagnosa').on('click','#remove-diagnosa',function() {
    $(this).parent().parent().parent().parent().remove();
  });
  var rowCount = 2;
  $('.add-obat').click(function() {
    // var rowCount = 1;
    var maxRow = 5;
  
    if (rowCount <= maxRow) {
      $('.block-obat:last').after('<div class="form-group block-obat" id="o'+rowCount+'">'+
        '<label class="control-label col-sm-2">Pilih Obat :</label>'+
        '<div class="col-sm-8">'+
          '<div class="row">'+
            '<div class="col-md-10">'+
              '<div class="row">'+
                '<select name="obat[]" class="form-control select2" id="obat'+rowCount+'" style="margin-bottom: 10px;">'+
                '<?php foreach ($obat->result() as $dt_obat) { ?>'+
                  '<option value="<?= $dt_obat->id_obat ?>"><?= $dt_obat->nama_obat ?></option>'+
                '<?php } ?>'+
                '</select>'+
              '</div>'+
              '<div class="row"><div class="aturan-pakai"><select name="jenis" id="inputJenis'+rowCount+'" class="form-control" onchange="obat('+rowCount+')"  style="margin-top: 10px;"><option value="">Pilih Jenis Obat</option><option value="oral">Per Oral</option><option value="topikal">Topikal</option><option value="suntikan">Suntikan</option><option value="rectum">Per anus / rectum</option></select><div class="oral'+rowCount+'" style="display: none;"><div class="radio" id="oral-tipe'+rowCount+'" onclick="oraltipe('+rowCount+')"><label class="radio-inline"><input type="radio" class="oral-tipe'+rowCount+'" name="oral-tipe'+rowCount+'" value="tablet" checked="true">Tablet/Kaplet/Kapsul</label><label class="radio-inline"><input type="radio" class="oral-tipe'+rowCount+'" name="oral-tipe'+rowCount+'" value="sirup">Syrup/Liquid</label></div><div class="radio" id="oral-minum"><label class="radio-inline"><input type="radio" name="oral-minum'+rowCount+'" checked="true">1x Sehari</label><label class="radio-inline"><input type="radio" name="oral-minum'+rowCount+'">2x Sehari</label><label class="radio-inline"><input type="radio" name="oral-minum'+rowCount+'">3x Sehari</label></div><div class="radio" id="oral-sendok'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="oral-sendok'+rowCount+'" checked="true">1sdm</label><label class="radio-inline"><input type="radio" name="oral-sendok'+rowCount+'">2sdt</label><label class="radio-inline"><input type="radio" name="oral-sendok'+rowCount+'">3ml</label></div><input type="text" value="0" required="required" name="jml-minum" id="inputjml-minum" class="form-control"  placeholder="Jumlah" style="margin-top: 5px;"></div><div class="topikal'+rowCount+'" style="display: none;"><div class="radio" id="topikal-tipe" onclick="topikaltipe('+rowCount+')"><label class="radio-inline"><input type="radio" class="topikal-tipe'+rowCount+'" name="topikal-tipe'+rowCount+'" value="oles" checked="true">Oleskan</label><label class="radio-inline"><input type="radio" class="topikal-tipe'+rowCount+'" name="topikal-tipe'+rowCount+'" value="tetes">Teteskan</label></div><div class="radio" id="topikal-letak-pakai'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="topikal-letak-pakai'+rowCount+'" checked="true">Mata</label><label class="radio-inline"><input type="radio" name="topikal-letak-pakai'+rowCount+'">Hidung</label><label class="radio-inline"><input type="radio" name="topikal-letak-pakai'+rowCount+'">Telinga</label></div><div class="radio" id="topikal-letak-spesifik'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="topikal-letak-spesifik'+rowCount+'" checked="true">Kiri</label><label class="radio-inline"><input type="radio" name="topikal-letak-spesifik'+rowCount+'">Kanan</label></div><div class="radio" id="topikal-pakai"><label class="radio-inline"><input type="radio" name="topikal-pakai'+rowCount+'" checked="true">1x Sehari</label><label class="radio-inline"><input type="radio" name="topikal-pakai'+rowCount+'">2x Sehari</label><label class="radio-inline"><input type="radio" name="topikal-pakai'+rowCount+'">3x Sehari</label></div><div class="radio" id="topikal-pakai-tetes'+rowCount+'" style="display: none;"><label class="radio-inline"><input type="radio" name="topikal-pakai-tetes'+rowCount+'" checked="true">1x Tetes</label><label class="radio-inline"><input type="radio" name="topikal-pakai-tetes'+rowCount+'">2x Tetes</label><label class="radio-inline"><input type="radio" name="topikal-pakai-tetes'+rowCount+'">3x Tetes</label></div><input type="text" value="0" required="required" name="jml-topikal" id="inputjml-topikal" class="form-control"  placeholder="Jumlah" style="margin-top: 5px;"></div><div class="suntikan'+rowCount+'" style="display: none;"><div class="radio" id="suntikan-tipe"><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'" checked="true">IM</label><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'">IV</label><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'">Subcutan</label><label class="radio-inline"><input type="radio" name="suntikan-tipe'+rowCount+'">Intracutan</label></div><div class="input-group" style="margin-top: 5px;"><input type="text" value="0" required="required" name="jml-rectum" id="inputjml-rectum" class="form-control"  placeholder="Ampul" ><span class="input-group-addon">Ampul</span></div></div><div class="rectum'+rowCount+'" style="display: none;"><div class="radio" id="rectum-tipe"><label class="radio-inline"><input type="radio" name="rectum-tipe'+rowCount+'" value="prn" checked="true">p.r.n</label><label class="radio-inline"><input type="radio" name="rectum-tipe'+rowCount+'" value="lain">Lain - lain</label></div><input type="text" value="0" required="required" name="jml-rectum" id="inputjml-rectum" class="form-control"  placeholder="PCS" style="margin-top: 5px;"></div></div></div>'+
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
<script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.js" type="text/javascript"></script>
<script src="<?=base_url('assets'); ?>/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script>
     $(function () {
        $("#nama").autocomplete({    //id kode sebagai key autocomplete yang akan dibawa ke source url
            minLength:0,
            delay:0,
            source:'<?=base_url('kuratif/getRekamMedis')?>',   //nama source kita ambil langsung memangil fungsi get_allkota
            select:function(event, ui){
                $('#nama').val(ui.item.nama);
                $('#nik').val(ui.item.nik);
                $('#idpasien').val(ui.item.idpasien);
                }
            });
        });
    </script>