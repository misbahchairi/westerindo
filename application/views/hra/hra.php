	<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Health Risk Assessment
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Health Risk Assessment</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h5   style="text-align: center;margin:0px 0px 0px 0px;">
          HEALTH RISK ASSESSMENT FOR CARDIOVASCULAR DISEASE OF EMPLOYEE FOR USE IN STARTING AND EVALUATING HEALTH PROMOTION PROGRAM IN THE WORK PLACE   
        </h5>
      </div>
      <div class="box-body">
        
        <div class="row">
          <div class="col-md-4">
            <table class="table" style="border-bottom: 1px solid #f4f4f4;">
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><input type="text"></td>
                </tr>
                <tr>
                  <td>Dept</td>
                  <td>:</td>
                  <td><input type="text"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-4">
            <table class="table" style="border-bottom: 1px solid #f4f4f4;">
              <tbody>
                <tr >
                  <td>Employee Numer</td>
                  <td>:</td>
                  <td><input type="text"></td>
                </tr>
                <tr>
                  <td>Date</td>
                  <td>:</td>
                  <td><input type="text" class="date"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <table class="table table-bordered table-laporan">
          <thead>
            <tr>
              <th style="width: 600px;">Risk factor of cardiovascular disease</th>
              <th colspan="5">Level of risk & Category of risk factor</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i=0; $i < 3 ; $i++) { ?>
            <tr>
              <td>Established  Atherosclerosis</td>
              <td><span class="no-hra">1</span> None</td>
              <td></td>
              <td><span class="no-hra">4</span> Yes</td>
              <td></td>
              <td>Note:</td>
            </tr>
            <tr>
              <td rowspan="3">Dyslipidemia (fasting blood lipids in mg/dl)</td>
              <td><span class="no-hra">1</span> LDL Chol. 0-130 </td>
              <td><span class="no-hra">1.5</span> LDL 130 – 159 </td>
              <td><span class="no-hra">2</span> LDL > 160–190 </td>
              <td><span class="no-hra">3</span> LDL > 190  </td>
              <td rowspan="3"></td>
            </tr>
            <tr>
              <td><span class="no-hra">1</span> HDL Chol. > 60 </td>
              <td><span class="no-hra">1.5</span>  HDL Chol. : 35-60 </td>
              <td><span class="no-hra">2</span>  HDL Chol. < 35 </td>
              <td></td>
            </tr>
            <tr>
              <td><span class="no-hra">1</span> Triglyceride 30-200 </td>
              <td><span class="no-hra">1.5</span> Triglyceride 200-400 </td>
              <td><span class="no-hra">2</span> Triglyceride > 400 </td>
              <td></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->