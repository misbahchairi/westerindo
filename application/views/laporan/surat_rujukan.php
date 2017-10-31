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
                  <th>Departement</th>
                  <th>RS.Rujukan</th>
                  <th>RS.Remark</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=1; $i < 10 ; $i++) { ?>
              <tr>
                  <td><?=$i?></td>
                  <td>05 Apr 16</td>
                  <td>RINI LISTYANINGTYAS</td>
                  <td>125999</td>
                  <td>34</td>
                  <td>F</td>
                  <td>Produksi</td>
                  <td>RS.ROYAL SURABAYA</td>
                  <td></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div><!-- /.content-wrapper -->