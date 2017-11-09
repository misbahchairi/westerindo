<script src="<?=base_url('assets');?>/plugins/chartjs/Chart.min.js"></script>
<style type="text/css">
  table.dataTable.table-condensed thead > tr > th {
    padding-left: 5px;
    padding-right: 5px;
  }
</style>
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
          <form method="get" action="<?=base_url('laporan/kunjungan_by_jam')?>" role="form">
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
          </form>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <table class="table table-bordered table-laporan table-condensed" id="laporan">
              <thead>
                
                <tr>
                  <th rowspan="2">Jam Kunjung</th>
                  <th colspan="6">Karyawan</th>
                </tr>
                <tr>
                  <th>Tetap</th>
                  <th>Contract</th>
                  <th>Outsourching</th>
                  <th>Magang</th>
                  <th>Pre Emp</th>
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody>
                <?php $d=7; for ($i=0; $i < 24 ; $i++) {?>
                <?php if ($d==24) {$d=0;}
                $m=str_pad(($d), 2, "0", STR_PAD_LEFT);?>
                <?php $total=0; for ($di=0; $di < 5 ; $di++) { 
                  $total = $total+$kunjungan[$i][$di];
                } ?>
                <tr>
                  <td><?= $m.".00-".$m.".59" ?></td>
                  <td><?= $kunjungan[$i][0] ?></td>
                  <td><?= $kunjungan[$i][1] ?></td>
                  <td><?= $kunjungan[$i][2] ?></td>
                  <td><?= $kunjungan[$i][3] ?></td>
                  <td><?= $kunjungan[$i][4] ?></td>
                  <td><?= $total ?></td>
                </tr>
                <?php $d++;} ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-6" style="padding-left: 0px;">
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
          labels: ["07.00-07.59","08.00-08.59","09.00-09.59", "10.00-10.59","11.00-11.59","12.00-12.59", "13.00-13.59", "14.00-14.59", "15.00-15.59", "16.00-16.59", "17.00-17.59", "18.00-18.59","19.00-19.59", "20.00-20.59", "21.00-21.59", "22.00-22.59", "23.00-23.59", "00.00-00.59", "01.00-01.59", "02.00-02.59", "03.00-03.59", "04.00-04.59", "05.00-05.59", "06.00-06.59"],
          datasets: [
            {
              label: "Karyawan Tetap SCJMS",
              fillColor: "#00bcd4",
              strokeColor: "#00bcd4",
              pointColor: "#00bcd4",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php for ($i=0; $i < 24 ; $i++) { 
                echo $kunjungan[$i][0].",";
              } ?>]
            },
            {
              label: "Karyawan Contract Direct SCJMS",
              fillColor: "#bd2e24",
              strokeColor: "#bd2e24",
              pointColor: "#bd2e24",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php for ($i=0; $i < 24 ; $i++) { 
                echo $kunjungan[$i][1].",";
              } ?>]
            },
            {
              label: "Karyawan Outsourching",
              fillColor: "#8bc34a",
              strokeColor: "#8bc34a",
              pointColor: "#8bc34a",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php for ($i=0; $i < 24 ; $i++) { 
                echo $kunjungan[$i][2].",";
              } ?>]
            },
            {
              label: "Magang",
              fillColor: "#8252d8",
              strokeColor: "#8252d8",
              pointColor: "#8252d8",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php for ($i=0; $i < 24 ; $i++) { 
                echo $kunjungan[$i][3].",";
              } ?>]
            },
            {
              label: "Pre Emp",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php for ($i=0; $i < 24 ; $i++) { 
                echo $kunjungan[$i][4].",";
              } ?>]
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