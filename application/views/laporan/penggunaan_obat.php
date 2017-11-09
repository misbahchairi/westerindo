<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Laporan
      <small>Penggunaan Obat</small>
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
        <form method="get" action="<?=base_url('laporan/penggunaan_obat')?>" role="form">
        <div class="row">
          <div class="form-group col-md-4 col-sm-4 col-xs-12">
            <label>Filter tanggal :</label>
            <div id="dtrg" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <span id="tgl"></span> <i class="fa fa-caret-square-o-down pull-right" style=" margin-top: 3px;"></i>
            </div>
          </div>
          <?php if ($this->session->userdata('role')==0): ?>
          <div class="col-md-3">
            <label>Unit :</label>
            <select name="unit" class="form-control" >
            <?php foreach ($unit as $unit) { ?>
              <option value="<?= $unit->id_unit ?>" <?= (@$_GET['unit'] == $unit->id_unit)?"selected":""; ?>><?= $unit->nama ?></option>
            <?php } ?>
            </select>
          </div>  
          <?php endif ?>
          <input type="hidden" name="end" id="end" value="">
          <input type="hidden" name="start" id="start" value="">
          <div class="col-md-2">
            <button type="submit" class="btn btn-info" style="margin-top: 25px;">Filter</button>
          </div>
        </div>
        </form>
        <br>
        <div class="row">
          <div class="col-md-4">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-laporan table-condensed" id="laporan">
                <thead>
                  <tr style="background: #00bcd4;">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Used Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($laporan as $val) {?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=ucwords($val->nama_obat)?></td>
                    <td><?=$val->total_obat?></td>
                  </tr>
                  <?php $i++;} ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-8">
            <canvas id="myChart" height="200px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    pieceLabel: {
      render: 'percentage',
      precision: 3
    },
    data: {
      labels: [<?php foreach ($laporan as $key) {
          echo '"'.$key->nama_obat.'",';
        } ?>],
      datasets: [{
        backgroundColor: [
          "#EC644B",
          "#DB0A5B",
          "#F1A9A0",
          "#DCC6E0",
          "#663399",
          "#81CFE0",
          "#81CFE0",
          "#36D7B7",
          "#FDE3A7",
          "#F89406",
        ],
        data: [<?php foreach ($laporan as $key) {
          echo $key->total_obat.",";
        } ?> ]
      }]
    }
  });
</script>

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