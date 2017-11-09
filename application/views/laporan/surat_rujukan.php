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
        <form method="get" action="<?=base_url('laporan/surat_rujukan')?>" role="form">
        <div class="row">
          <div class="form-group col-md-4 col-sm-4 col-xs-12">
            <label>Filter tanggal :</label>
            <div id="dtrg" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <span id="tgl"></span> <i class="fa fa-caret-square-o-down pull-right" style=" margin-top: 3px;"></i>
            </div>
          </div>
          <input type="hidden" name="end" id="end" value="">
          <input type="hidden" name="start" id="start" value="">
          <div class="col-md-2">
            <button type="submit" class="btn btn-info" style="margin-top: 25px;">Filter</button>
          </div>
        </div>
        </form>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-laporan table-condensed" id="laporan">
            <thead>
              <tr class="krem">
                  <th>No</th>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Badge</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Departement</th>
                  <th>RS.Rujukan</th>
                  <th>RS.Remark</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($rujukan->result() as $val) {?>
              <tr>
                  <td><?=$i?></td>
                  <td><?= date('d-m-Y',strtotime($val->r_created_at)) ?></td>
                  <td><?= ucwords($val->nama) ?></td>
                  <td><?= $val->nik ?></td>
                  <td><?= $val->umur ?></td>
                  <td><?= ucwords($val->sex) ?></td>
                  <td><?= ucwords($val->separtment) ?></td>
                  <td><?= strtoupper($val->nama_rs) ?></td>
                  <td><?= $val->r_keterangan ?></td>
              </tr>
              <?php $i++; } ?>
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
      $('#dtrg').daterangepicker(
         {
            startDate: moment().subtract('days', 29),
            endDate: moment(),
            minDate: '12/31/2014',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
               'Last 7 Days': [moment().subtract('days', 6), moment()],
               'Last 30 Days': [moment().subtract('days', 29), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'right',
            format: 'DD MMMM YYYY',
            separator: ' - ',
         },
         function(start, end) {
          $('#dtrg span').html(start.format('DD MMMM YYYY') + ' - ' + end.format('DD MMMM YYYY'));
          $('#start').val(start.format('YYYY-MM-DD'));
          $('#end').val(end.format('YYYY-MM-DD'));
         }
      );
      //Set the initial state of the picker label
      $('#dtrg span').html(moment().subtract('days', 29).format('DD MMMM YYYY') + ' - ' + moment().format('DD MMMM YYYY'));
      $('#start').val(moment().subtract('days', 29).format('YYYY-MM-DD'));
      $('#end').val(moment().format('YYYY-MM-DD'));
      $(".daterangepicker_start_input").hide();
      $(".daterangepicker_end_input").hide();
   });

</script>   