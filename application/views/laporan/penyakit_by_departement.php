<script src="<?=base_url('assets');?>/plugins/chartjs/Chart.min.js"></script>
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
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-laporan">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Penyakit</th>
                  <th class="produksi">Produksi</th>
                  <th class="she">She</th>
                  <th class="maintenance">Maintenance</th>
                  <th class="qc">QC Lab</th>
                  <th class="logistik">Logistik</th>
                  <th class="hrd">HRD</th>
                  <th class="fad">FAD</th>
                  <th class="engineering">Engineering</th>
                  <th class="gs">GS</th>
                  <th class="plant">Plant Manager</th>
                  <th class="kontraktor">Kontraktor</th>
                  <th class="others">Others</th>
                  <th class="total">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=1; $i < 10 ; $i++) { ?>
              <tr>
                  <td><?=$i?></td>
                  <td>ISPA</td>
                  <td class="produksi-t">138</td>
                  <td class="she-t">4</td>
                  <td class="maintenance-t">0</td>
                  <td class="qc-t">5</td>
                  <td class="logistik-t">9</td>
                  <td class="hrd-t">0</td>
                  <td class="fad-t">0</td>
                  <td class="engineering-t">7</td>
                  <td class="gs-t">9</td>
                  <td class="plant-t">0</td>
                  <td class="kontraktor-t">0</td>
                  <td class="others-t">6</td>
                  <td class="total-t">178</td>
              </tr>
              <?php } ?>
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

</div><!-- /.content-wrapper -->
    <script>
      $(function () {
        

        var ChartData = {
          labels: ["PRODUKSI", "SHE", "MAINTENANCE", "QC LAB", "LOGISTIK", "HRD", "FAD", "ENGINEERING", "GS", "PLANT MANAGER", "KONTRAKTOR", "OTHERS"],
          datasets: [
            {
              label: "ISPA",
              fillColor: "#C5EFF7",
              strokeColor: "#C5EFF7",
              pointColor: "#C5EFF7",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [37, 21, 12, 25, 56, 55, 40,12 ,33,12,39,55]
            },
            {
              label: "CEPHALGIA",
              fillColor: "#DCC6E0",
              strokeColor: "#DCC6E0",
              pointColor: "#DCC6E0",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [9, 4, 40, 6, 86, 27, 90,4 ,53,29,79,18]
            },
            {
              label: "MYALGIA",
              fillColor: "#FDE3A7",
              strokeColor: "#FDE3A7",
              pointColor: "#FDE3A7",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [2, 0, 40, 2, 86, 27, 90,10 ,31,22,40,55]
            },
            {
              label: "CONJUNGITIVITIS",
              fillColor: "#F5D76E",
              strokeColor: "#F5D76E",
              pointColor: "#F5D76E",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 0, 40, 0, 86, 27, 90,20 ,0,0,0,0]
            },
            {
              label: "GE",
              fillColor: "#C8F7C5",
              strokeColor: "#C8F7C5",
              pointColor: "#C8F7C5",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0 ,28,77,49,10]
            },
            {
              label: "DYSPEPSIA",
              fillColor: "#ECF0F1",
              strokeColor: "#ECF0F1",
              pointColor: "#ECF0F1",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0 ,12,28,66,53]
            },
            {
              label: "DERMATITIS",
              fillColor: "#F1A9A0",
              strokeColor: "#F1A9A0",
              pointColor: "#F1A9A0",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0,20,76,30,52]
            },
            {
              label: "DENTAL SICK",
              fillColor: "#89C4F4",
              strokeColor: "#89C4F4",
              pointColor: "#89C4F4",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0,14,55,21,33]
            },
            {
              label: "OBS.FEBRIS",
              fillColor: "#BE90D4",
              strokeColor: "#BE90D4",
              pointColor: "#BE90D4",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0,13,55,77,12]
            },
            {
              label: "TFA",
              fillColor: "#F9BF3B",
              strokeColor: "#F9BF3B",
              pointColor: "#F9BF3B",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [0, 20, 40, 0, 86, 27, 90,0,23,11,67,74]
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
          },
          multiTooltipTemplate: "<%=datasetLabel%> : <%= value %>"  // Regular use

        };

        barChart.Bar(barChartData, barChartOptions);

      });
    </script>