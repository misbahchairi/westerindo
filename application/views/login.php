<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Westerindo| Clinic Apps</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/plugins/select2/select2.min.css">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/plugins/iCheck/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/dist/css/AdminLTE.min.css">
  <!-- Select2 autocomplete dropdown -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/select2/select2.min.css">
  <!-- Jquery UI -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jQueryUI/jquery-ui.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="<?=base_url('assets'); ?>/dist/css/style.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page"  >
  <div class="login-box">
    <div class="login-logo">
      <div class="image">
        <img src="<?= base_url('dist/img/favicon.png')?>" class="img-rectangle img-responsive" style="margin: auto;">
      </div>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.4);">
      <div class="login-logo">
        <span>
        <b>WESTERINDO</b>
        </span>
      </div>
      <p class="login-box-msg"><?= @$message ?> <?= validation_errors(); ?></p>

      <form action="<?= base_url('webadmin/login')?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="username" name="username" >
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-info btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->

        </div>
      </form>
      <br>
      <hr>
      <center>V.1.0.0 - 117. By : <a href="http://smartsoftstudio.com">www.smartsoftstudio.com</a></center>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

</body>
</html>
