<script src="<?=base_url('assets');?>/plugins/chartjs/Chart.min.js"></script>

<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Laporan
      <small>Kunjungan By Jam</small>
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
         <form method="get" action="<?= base_url('laporan/kunjungan_by_jam/') ?>">
          <div class="col-md-2 form-group">
              <label class="control-label">Filter Tanggal :</label>
              <input type="text" name="tanggal" class="form-control tgl" readonly="" style="background-color: #fff" value="<?= @$_GET['tanggal'] ?>">
          </div>
          <div class="col-md-2">
              <button type="submit" class="btn btn-info" style="margin-top: 25px;">Filter</button>
          </div>
          </form>
          </div>
          <br>
          <div class="row">
          <div class="col-md-6">
            <table class="table table-bordered table-laporan">
              <thead>
                <tr>
                  <th>Jam Kunjung</th>
                  <th>Karyawan <br> Tetap <br> SCJMS</th>
                  <th>Karyawan <br> Contract <br> Direct <br> SCJMS</th>
                  <th>Karyawan <br> Outsourching</th>
                  <th>Magang</th>
                  <th>Pre Emp</th>
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody>
              <?php $d=7; for ($i=0; $i < 24 ; $i++) {?>
              <?php if ($d==24) {$d=0;} 
              $m=str_pad(($d), 2, "0", STR_PAD_LEFT);?>
                <tr>
                  <td><?= $m.".00-".$m.".59" ?></td>
                  <td><?= $kunjungan[$i][0] ?></td>
                  <td><?= $kunjungan[$i][1] ?></td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
                  <td><?= $kunjungan[$i][0]+$kunjungan[$i][1] ?></td>
                </tr>
                <?php $d++;} ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <div class="chart">
              <div id="js-legend" class="chart-legend"></div>
              <canvas id="barChart" style="height:300px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->
    <script>
      $(function () {
        

        var ChartData = {
          labels: ["07.00-07.59","08.00-08.59","09.00-09.59", "10.00-10.59","11.00-11.59","12.00-12.59", "13.00-13.59", "16.00-16.59", "19.00-19.59", "22.00-22.59", "01.00-01.59", "04.00-04.59"],
          datasets: [
            {
              label: "Karyawan Tetap SCJMS",
              fillColor: "#00bcd4",
              strokeColor: "#00bcd4",
              pointColor: "#00bcd4",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?= $kunjungan[0][0] ?>, <?= $kunjungan[1][0] ?>, <?= $kunjungan[2][0] ?>, <?= $kunjungan[3][0] ?>, <?= $kunjungan[4][0] ?>, <?= $kunjungan[5][0] ?>, <?= $kunjungan[6][0] ?>,<?= $kunjungan[7][0] ?>,<?= $kunjungan[8][0] ?>,<?= $kunjungan[9][0] ?>,<?= $kunjungan[10][0] ?>]
            },
            {
              label: "Karyawan Contract Direct SCJMS",
              fillColor: "#bd2e24",
              strokeColor: "#bd2e24",
              pointColor: "#bd2e24",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [9, 4, 40, 6, 86, 27, 90,4]
            },
            {
              label: "Karyawan Outsourching",
              fillColor: "#8bc34a",
              strokeColor: "#8bc34a",
              pointColor: "#8bc34a",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [2, 0, 40, 2, 86, 27, 90,10]
            },
            {
              label: "Magang",
              fillColor: "#8252d8",
              strokeColor: "#8252d8",
              pointColor: "#8252d8",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 0, 40, 0, 86, 27, 90,20]
            },
            {
              label: "Pre Emp",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0]
            }
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
          }

        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);

      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tgl').datepicker({
                format : 'yyyy-mm-dd',
                autoclose : 'true',
            });
        });
        
    </script>