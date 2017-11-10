  <style type="text/css">
    table.dataTable thead > tr > th {
        padding-left: 25px;
        padding-right: 25px;
    }
  </style>
  

  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Laporan
      <small>Rekap Harian</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Laporan</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <form method="get" action="<?= base_url('laporan/rekap_harian/') ?>">
        <div class="row">
            <div class="col-md-2 form-group">
                <label class="control-label">Filter Tanggal :</label>
                <input type="text" name="tanggal" class="form-control tgl" readonly="" style="background-color: #fff" value="<?= @$_GET['tanggal'] ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info" style="margin-top: 25px;">Filter</button>
            </div>
        </div>
        </form>
        <br>
        <div class="table">
          <table class="table table-bordered table-hover table-laporan table-harian" id="laporan">
            <thead>
              <tr class="maroon">
                <th colspan="6">Data Of Visite</th>
                <th colspan="4">Information Of Patient</th>
                <th>Work Areal</th>
                <th></th>
                <th></th>
                <th colspan="5">State Of Employee</th>
                <th colspan="4" rowspan="2">Case</th>
                <th colspan="5">Vital Sign Monitoring</th>
                <th colspan="6">Information Of Medical</th>
                <th colspan="3" rowspan="2">Shift</th>
                <th colspan="2">Name Of Nurse / Doctor</th>
              </tr>
              <tr>
                <th class="oren" rowspan="2">No</th>
                <th class="oren" rowspan="2" style="width: 32px;">Date</th>
                <th class="oren" rowspan="2">Hours</th>
                <th class="putih" colspan="3">State Of Visite</th>
                <th class="kuning" rowspan="2">NIK</th>
                <th class="kuning" rowspan="2">Name</th>
                <th class="kuning" rowspan="2">Age</th>
                <th class="kuning" rowspan="2">Sex</th>
                <th class="kuning" rowspan="2">Departement</th>
                <th class="kuning" rowspan="2">Departement</th>
                <th class="kuning" rowspan="2">Group</th>
                <th class="putih" colspan="2">State Of Employee</th>
                <th class="putih" colspan="3">Name Of Company</th>
                <th class="pink" rowspan="2">Anamnesis</th>
                <th class="putih" colspan="4">TTV</th>
                <th class="pink" rowspan="2">Code DX</th>
                <th class="pink" rowspan="2">Diagnosis</th>
                <th class="pink" rowspan="2">Therapy</th>
                <th class="pink" rowspan="2">Quantity</th>
                <th class="pink" rowspan="2">Letter Of Illnes</th>
                <th class="pink" rowspan="2">Refeal</th>
                <th class="abu" rowspan="2">Paramedic</th>
                <th class="abu" rowspan="2">Doctor</th>
              </tr>
              <tr>
                <th class="hijau">New <br> Case</th>
                <th class="hijau">Old <br> Case</th>
                <th class="hijau">Case <br> Visite</th>
                <th class="biru">Permanent</th>
                <th class="biru">Contract</th>
                <th class="krem">PT.SCJMS</th>
                <th class="krem">PT.ISS</th>
                <th class="krem">Others</th>
                <th class="ungu">RJ</th>
                <th class="ungu">MCU</th>
                <th class="ungu">Blood <br> Glucose</th>
                <th class="ungu">Others</th>
                <th class="merah">TD</th>
                <th class="merah">BB</th>
                <th class="merah">Puls</th>
                <th class="merah">Term</th>
                <th class="hijau_m">Morning</th>
                <th class="hijau_m">Afternoon</th>
                <th class="hijau_m">Night</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=1; $i < 2 ; $i++) { ?>
              <?php $dk=1;foreach ($rekap->result() as $data) {?>
              <tr>
                <td><?= $dk ?></td>
                <td><?= @date('d-m-Y',strtotime($data->ku_created_at)) ?></td>
                <td><?= @date('h:i',strtotime($data->ku_created_at)) ?></td>
                <td>B</td>
                <td></td>
                <td>1</td>
                <td><?= $data->nik ?></td>
                <td><?= ucfirst($data->nama_pasien) ?></td>
                <td><?= $data->umur ?></td>
                <td><?= ucfirst($data->sex) ?></td>
                <td><?= ucfirst($data->separtment) ?></td>
                <td><?= ucfirst($data->department) ?></td>
                <td><?= ucfirst($data->group) ?></td>
                <td><?= ($data->status_pgw == "tetap")?"P":""; ?></td>
                <td><?= ($data->status_pgw == "kontrak")?"C":""; ?></td>
                <td>PT.SCJMS</td>
                <td></td>
                <td></td>
                <td></td>
                <td>MCU</td>
                <td></td>
                <td></td>
                <td>MCU Pre Employee</td>
                <td>120/80</td>
                <td>61</td>
                <td><?= $data->tv_nadi ?></td>
                <td><?= $data->tv_suhu ?></td>
                <td>3404</td>
                <td><?= ucfirst($data->nama_diagnosa) ?></td>
                <td>-</td>
                <td>-</td>
                <td></td>
                <td></td>
                <td>Morning</td>
                <td></td>
                <td></td>
                <td><?= ucfirst($data->nama_perawat) ?></td>
                <td><?= ucfirst($data->nama_dokter) ?></td>
              </tr>
              <?php $dk++;} ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.tgl').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : 'true',
        });
    });
    
</script>