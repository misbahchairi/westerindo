  <div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Laporan
      <small>Penyakit</small>
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
        <form method="get" action="<?=base_url('laporan/penyakit')?>" role="form">
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
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-laporan">
            <thead>
              <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Penyakit</th>
                <th rowspan="2">Total</th>
                <th class="produksi" colspan="3">Produksi</th>
                <th class="she" colspan="3">She</th>
                <th class="maintenance" colspan="3">Maintenance</th>
                <th class="qc" colspan="3">QC Lab</th>
                <th class="logistik" colspan="3">Logistik</th>
                <th class="hrd" colspan="3">HRD</th>
                <th class="fad" colspan="3">FAD</th>
                <th class="engineering" colspan="3">Engineering</th>
                <th class="gs" colspan="3">GS</th>
                <th class="plant" colspan="3">Plant Manager</th>
                <th class="kontraktor" colspan="3">Kontraktor</th>
                <th class="others" colspan="3">Others</th>
                <th class="total" colspan="3">Total</th>
              </tr>
              <tr>
                
                <th class="produksi">T</th>
                <th class="produksi">C</th>
                <th class="produksi-t">Total</th>
                
                <th class="she">T</th>
                <th class="she">C</th>
                <th class="she-t">Total</th>
                
                <th class="maintenance">T</th>
                <th class="maintenance">C</th>
                <th class="maintenance-t">Total</th>
                
                <th class="qc">T</th>
                <th class="qc">C</th>
                <th class="qc-t">Total</th>
                
                <th class="logistik">T</th>
                <th class="logistik">C</th>
                <th class="logistik-t">Total</th>
                
                <th class="hrd">T</th>
                <th class="hrd">C</th>
                <th class="hrd-t">Total</th>
                
                <th class="fad">T</th>
                <th class="fad">C</th>
                <th class="fad-t">Total</th>
                
                <th class="engineering">T</th>
                <th class="engineering">C</th>
                <th class="engineering-t">Total</th>
                
                <th class="gs">T</th>
                <th class="gs">C</th>
                <th class="gs-t">Total</th>
                
                <th class="plant">T</th>
                <th class="plant">C</th>
                <th class="plant-t">Total</th>
                
                <th class="kontraktor">T</th>
                <th class="kontraktor">C</th>
                <th class="kontraktor-t">Total</th>
                
                <th class="others">T</th>
                <th class="others">C</th>
                <th class="others-t">Total</th>
                
                <th class="total">T</th>
                <th class="total">C</th>
                <th class="total-t">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($laporan as $val) {  ?>
              <tr>
                <td><?=$i?></td>
                <td><?= $val->nama ?></td>
                <td><?= $val->total ?></td>

                <td class="produksi">106</td>
                <td class="produksi">32</td>
                <td class="produksi-t">138</td>

                <td class="she">106</td>
                <td class="she">32</td>
                <td class="she-t">138</td>

                <td class="maintenance">106</td>
                <td class="maintenance">32</td>
                <td class="maintenance-t">138</td>

                <td class="qc">106</td>
                <td class="qc">32</td>
                <td class="qc-t">138</td>

                <td class="logistik">106</td>
                <td class="logistik">32</td>
                <td class="logistik-t">138</td>

                <td class="hrd">106</td>
                <td class="hrd">32</td>
                <td class="hrd-t">138</td>

                <td class="fad">106</td>
                <td class="fad">32</td>
                <td class="fad-t">138</td>

                <td class="engineering">106</td>
                <td class="engineering">32</td>
                <td class="engineering-t">138</td>

                <td class="gs">106</td>
                <td class="gs">32</td>
                <td class="gs-t">138</td>

                <td class="plant">106</td>
                <td class="plant">32</td>
                <td class="plant-t">138</td>

                <td class="kontraktor">106</td>
                <td class="kontraktor">32</td>
                <td class="kontraktor-t">138</td>

                <td class="others">106</td>
                <td class="others">32</td>
                <td class="others-t">138</td>

                <td class="total">106</td>
                <td class="total">32</td>
                <td class="total-t">138</td>

              </tr>
              <?php $i++;} ?>
              <tr>
                <td colspan="3"></td>

                <td class="produksi"></td>
                <td class="produksi"></td>
                <td class="produksi-t">437</td>

                <td class="she"></td>
                <td class="she"></td>
                <td class="she-t">7</td>

                <td class="maintenance"></td>
                <td class="maintenance"></td>
                <td class="maintenance-t">0</td>

                <td class="qc"></td>
                <td class="qc"></td>
                <td class="qc-t">21</td>

                <td class="logistik"></td>
                <td class="logistik"></td>
                <td class="logistik-t">19</td>

                <td class="hrd"></td>
                <td class="hrd"></td>
                <td class="hrd-t">2</td>

                <td class="fad"></td>
                <td class="fad"></td>
                <td class="fad-t">0</td>

                <td class="engineering"></td>
                <td class="engineering"></td>
                <td class="engineering-t">27</td>

                <td class="gs"></td>
                <td class="gs"></td>
                <td class="gs-t">26</td>

                <td class="plant"></td>
                <td class="plant"></td>
                <td class="plant-t">0</td>

                <td class="kontraktor"></td>
                <td class="kontraktor"></td>
                <td class="kontraktor-t">0</td>

                <td class="others"></td>
                <td class="others"></td>
                <td class="others-t">15</td>

                <td class="total"></td>
                <td class="total"></td>
                <td class="total-t">554</td>
              </tr>
            </tbody>
          </table>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <table class="table table-hover table-bordered table-laporan">
                    <thead>
                        <tr>
                            <th rowspan="2" colspan="3"></th>
                            <th colspan="2">Seluruh</th>
                        </tr>
                        <tr>
                            <th>T</th>
                            <th>C</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=11; $i < 41 ; $i++) { ?>
                        <tr>
                            <td><?=$i?></td>
                            <td>KB</td>
                            <td>49</td>
                            <td>49</td>
                            <td>0</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <th>TOTAL</th>
                            <td>689</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-bordered table-hover table-laporan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hasil MCU Pre Emp</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>FIT</td>
                            <td>52</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>UNFIT</td>
                            <td>20</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>72</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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