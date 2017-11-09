<script src="<?=base_url('assets');?>/plugins/chartjs/Chart.min.js"></script>
<style type="text/css">
  table.dataTable.table-condensed thead > tr > th {
    padding-left: 10px;
    padding-right: 10px;
  }
</style>
<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Laporan
      <small>Penyakit By Departement</small>
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
      <div class="row">
          <form method="get" action="<?=base_url('laporan/penyakit_by_departement')?>" role="form">
            <div class="form-group col-md-4 col-sm-4 col-xs-12">
              <label>Filter tanggal :</label>
              <div id="dtrg" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <span id="tgl"></span> <i class="fa fa-caret-square-o-down pull-right" style=" margin-top: 3px;"></i>
              </div>
            </div>
            <input type="hidden" name="end" id="end" value="">
            <input type="hidden" name="start" id="start" value="">
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
            <div class="col-md-2">
              <button type="submit" class="btn btn-info" style="margin-top: 25px;">Filter</button>
            </div>
          </form>
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-laporan table-condensed" id="laporan">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Penyakit</th>
                  <th>Produksi</th>
                  <th>She</th>
                  <th>Maintenance</th>
                  <th>QC Lab</th>
                  <th>Logistik</th>
                  <th>HRD</th>
                  <th>FAD</th>
                  <th>Engineering</th>
                  <th>GS</th>
                  <th>Plant Manager</th>
                  <th>Kontraktor</th>
                  <th>Others</th>
                  <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($diagnosa as $val) { ?>
              <?php $total=0; for ($d=0; $d < 12 ; $d++) { 
                $total = $total + $laporan[$val->id_diagnosa][$d];
              } ?>
              <tr>
                  <td><?=$i?></td>
                  <td><?= $val->nama ?></td>
                  <td><?= $laporan[$val->id_diagnosa][0] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][1] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][2] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][3] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][4] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][5] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][6] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][7] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][8] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][9] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][10] ?></td>
                  <td><?= $laporan[$val->id_diagnosa][11] ?></td>
                  <td><?= $total ?></td>
              </tr>
              <?php $i++;} ?>
            </tbody>
          </table>
        </div>
        <br>
        <div class="chart">
          <div id="js-legend" class="chart-legend"></div>
          <canvas id="barChart" style="height:300px"></canvas>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
<?php $grafik="";foreach ($diagnosa as $diag) {
  $warna = '#' . dechex(rand(256,16777215));
  $grafik = $grafik."{
  label: '".$diag->nama."',
  fillColor: '".$warna."',
  strokeColor: '".$warna."',
  pointColor: '".$warna."',
  pointStrokeColor: 'rgba(60,141,188,1)',
  pointHighlightFill: '#fff',
  pointHighlightStroke: 'rgba(60,141,188,1)',
  data: [  
  ";for ($dk=0; $dk < 11 ; $dk++){
    $grafik = $grafik.$laporan[$diag->id_diagnosa][$dk].",";
  }  
  $grafik = $grafik."]
  },";
} ?>
</div><!-- /.content-wrapper -->
    <script>
      $(function () {
        

        var ChartData = {
          labels: ["PRODUKSI", "SHE", "MAINTENANCE", "QC LAB", "LOGISTIK", "HRD", "FAD", "ENGINEERING", "GS", "PLANT MANAGER", "KONTRAKTOR", "OTHERS"],
          datasets: [
          <?= $grafik ?>
          ]
        };
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = ChartData;
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true,
          legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
          legend: {
            display: true,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
          },
          multiTooltipTemplate: "<%=datasetLabel%> : <%= value %>"  // Regular use

        };

        barChart.Bar(barChartData, barChartOptions);

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