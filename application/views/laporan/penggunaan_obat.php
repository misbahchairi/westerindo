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
        <div class="row">
          <div class="col-md-4">
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-laporan">
                <thead>
                  <tr style="background: #00bcd4;">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Used Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=1; $i < 10 ; $i++) { ?>
                  <tr>
                    <td><?=$i?></td>
                    <td>Amoxilin</td>
                    <td><?=48+$i?></td>
                  </tr>
                  <?php } ?>
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
      precision: 2
    },
    data: {
      labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
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
        data: [,7 ,7,7,14,13,12,12,10,9,9 ]
      }]
    }
  });
</script>