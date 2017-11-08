  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Laporan
      <small>Surat Rujukan</small>
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
        <form method="get" action="<?= base_url('laporan/surat_sakit/') ?>">
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
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-laporan">
            <thead>
              <tr class="krem">
                  <th>No</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Badge</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Position</th>
                  <th>Company</th>
                  <th>Anamnesa</th>
                  <th>Diagnose</th>
                  <th>Therapy</th>
                  <th>Mark</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($surat->result() as $val) {?>
              <tr>
                  <td><?=$i?></td>
                  <td><?= date('d-m-Y',strtotime($val->ss_created_at)) ?></td>
                  <td><?= ucwords($val->nama) ?></td>
                  <td><?= $val->nik ?></td>
                  <td><?= $val->umur ?></td>
                  <td><?= ucwords($val->sex) ?></td>
                  <td><?= ucwords($val->separtment) ?></td>
                  <td><?= $val->pers1 ?></td>
                  <td><?= ucfirst($val->ss_anamnesa) ?></td>
                  <td><?= ucwords($val->ss_diagnosa) ?></td>
                  <td><?= ucwords($val->ss_terapi) ?></td>
                  <td><?= $val->ss_mark ?></td>
              </tr>
              <?php $i++;} ?>
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