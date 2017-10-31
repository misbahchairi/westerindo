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
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-laporan table-harian">
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
                <th class="oren" rowspan="2">Date</th>
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
              <?php for ($i=1; $i < 10 ; $i++) { ?>
              <tr>
                <td>1</td>
                <td>1</td>
                <td>8,50</td>
                <td>B</td>
                <td></td>
                <td>1</td>
                <td>-</td>
                <td>Herlina</td>
                <td>24</td>
                <td>F</td>
                <td>PO</td>
                <td>PROD</td>
                <td>-</td>
                <td></td>
                <td>C</td>
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
                <td>86</td>
                <td>36,7</td>
                <td>3404</td>
                <td>MCU</td>
                <td>-</td>
                <td>-</td>
                <td></td>
                <td></td>
                <td>Morning</td>
                <td></td>
                <td></td>
                <td>TIM</td>
                <td>DR. Warda</td>
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