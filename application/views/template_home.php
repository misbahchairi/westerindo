<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Westerindo| Clinic Apps</title>
		<!-- Tell the browser to be responsive to screen width -->
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">

		
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<!-- jQuery 2.1.4 -->
		<script src="<?=base_url('assets'); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>

		<div class="wrapper">

			<header class="main-header">
				<!-- Logo -->
				<div class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span class="logo-mini"><b>W</b>IN</span> <!-- logo for regular state and mobile devices --> <span class="logo-lg"><img src="<?=base_url('assets/dist/img/logo-westerindo.png')?>" style="width: 150px"> </span> </div>
				<!-- Header Navbar: style can be found in header.less --> 
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
			              <li class="dropdown notifications-menu">
			                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			                  <i class="fa fa-bell-o"></i>
			                  <?php $totnotif = count($this->mmaster->getNotifPromotif()) + count($this->mmaster->getNotifPreventif()); ?>
			                  <span class="label label-warning"><?= $totnotif  ?></span>
			                </a>
			                <ul class="dropdown-menu">
			                  <li class="header">You have <?= $totnotif  ?> notifications</li>
			                  <li>
			                    <!-- inner menu: contains the actual data -->
			                    <ul class="menu">
			                      <?php foreach ($this->mmaster->getNotifPromotif() as $value) {?>
			                      <li>
			                        <a href="<?=base_url('promotif/detail/').$value->id_promotif;?>">
			                          <i class="fa fa-users text-aqua"></i> <?= $value->judul ?>
			                        </a>
			                      </li>
			                      <?php } ?>
			                      <?php foreach ($this->mmaster->getNotifPreventif() as $value) {?>
			                      <li>
			                        <a href="<?=base_url('preventif/detail/').$value->id_preventif;?>">
			                          <i class="fa fa-users text-aqua"></i> <?= $value->judul ?>
			                        </a>
			                      </li>
			                      <?php } ?>
			                    </ul>
			                  </li>
			                  <li class="footer"><a href="#">View all</a></li>
			                </ul>
			              </li>
							<!-- Control Sidebar Toggle Button -->
							<li>
								<a href="<?=base_url('webadmin/logout')?>"><i class="fa fa-sign-out"></i> Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">
							MAIN NAVIGATION
						</li>
						<li class="<?php
							if (@$page_name == 'dashboard') { echo 'active';
							}
 							?>">
							<a href="<?=base_url(); ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
						</li>
						<!-- <li class="header">
							PROGRAM K3
						</li> -->
						<li class="treeview <?php
							if (@$page_name == 'promotif' or @$page_name == 'k-promotif' or @$page_name == 't-promotif') { echo 'active';
							}
 ?>">
							<a href="#"> <i class="fa fa-calendar-check-o"></i> <span>Promotif</span> <i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
								<li class="<?php
								if (@$page_name == 'promotif') { echo 'active';
								}
 ?>">
									<a href="<?=base_url('promotif') ?>"><i class="fa fa-circle-o"></i> Semua Kegiatan</a>
								</li>
								<li class="<?php
									if (@$page_name == 't-promotif') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('promotif/add') ?>"><i class="fa fa-circle-o"></i> Tambah Kegiatan</a>
								</li>
								<li class="<?php
									if (@$page_name == 'k-promotif') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('promotif/kalender') ?>"><i class="fa fa-circle-o"></i> Kalender Kegiatan</a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php
							if (@$page_name == 'preventif' or @$page_name == 'k-preventif' or @$page_name == 't-preventif') { echo 'active';
							}
 ?>">
							<a href="#"> <i class="fa fa-calendar-plus-o"></i> <span>Preventif</span> <i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
								<li class="<?php
								if (@$page_name == 'preventif') { echo 'active';
								}
 ?>">
									<a href="<?=base_url('preventif') ?>"><i class="fa fa-circle-o"></i> Semua Kegiatan</a>
								</li>
								<li class="<?php
									if (@$page_name == 't-preventif') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('preventif/add') ?>"><i class="fa fa-circle-o"></i> Tambah Kegiatan</a>
								</li>
								<li class="<?php
									if (@$page_name == 'k-preventif') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('preventif/kalender') ?>"><i class="fa fa-circle-o"></i> Kalender Kegiatan</a>
								</li>
							</ul>
						</li>
						<li class="<?php
							if (@$page_name == 'kuratif') { echo 'active';
							}
 ?>">
							<a href="<?=base_url('kuratif'); ?>"> <i class="fa fa-stethoscope"></i> <span>Kuratif</span> </a>
						</li>
						<li class="<?php
							if (@$page_name == 'antrian') { echo 'active';
							}
 ?>">
							<a href="<?=base_url('kuratif/antrian'); ?>"> <i class="fa fa-users"></i> <span>Antrian</span> </a>
						</li>
						<li class="<?php
							if (@$page_name == 'farmasi') { echo 'active';
							}
 ?>">
							<a href="<?=base_url('farmasi'); ?>"> <i class="fa fa-medkit"></i> <span>Farmasi</span> </a>
						</li>
						<li class="<?php
							if (@$page_name == 'industrial') { echo 'active';
							}
 ?>">
							<a href="<?=base_url('industrial'); ?>"> <i class="fa fa-industry"></i> <span>Industrial Hygiene</span> </a>
						</li>
						<li class="<?php
							if (@$page_name == 'hra') { echo 'active';
							}
 ?>">
							<a href="<?=base_url('hra'); ?>"> <i class="fa fa-wheelchair"></i> <span>Health Risk Assessment</span> </a>
						</li>
						<li class="<?php
							if (@$page_name == 'pasien') { echo 'active';
							}
 ?>">
							<a href="<?=base_url('master/pasien'); ?>"><i class="fa fa-user-md"></i>Rekam Medis</a>
						</li>
						<li class="header">
							MASTER DATA
						</li>
						<li class="treeview <?php
							if (@$page_name == 'obat' or @$page_name == 'anamnesa' or @$page_name == 'pf' or @$page_name == 'rujukan' or @$page_name == 'diagnosa' or @$page_name == 'dokter' or @$page_name == 'unit') { echo 'active';
							}
 ?>">
							<a href="#"> <i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
								<li class="<?php
								if (@$page_name == 'obat') { echo 'active';
								}
 ?>">
									<a href="<?=base_url('master/obat'); ?>"><i class="fa fa-circle-o"></i> Obat Obatan</a>
								</li>
								<li class="<?php
									if (@$page_name == 'anamnesa') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/anamnesa'); ?>"><i class="fa fa-circle-o"></i> Anamnesa</a>
								</li>
								<li class="<?php
									if (@$page_name == 'pf') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/pf'); ?>"><i class="fa fa-circle-o"></i> PF</a>
								</li>
								<li class="<?php
									if (@$page_name == 'rujukan') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/rujukan'); ?>"><i class="fa fa-circle-o"></i> Rujukan</a>
								</li>
								<li class="<?php
									if (@$page_name == 'diagnosa') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/diagnosa'); ?>"><i class="fa fa-circle-o"></i> Diagnosa</a>
								</li>
								<li class="<?php
									if (@$page_name == 'dokter') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/dokter'); ?>"><i class="fa fa-circle-o"></i> Dokter</a>
								</li>
								<li class="<?php
									if (@$page_name == 'unit') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/unit'); ?>"><i class="fa fa-circle-o"></i> Unit</a>
								</li>
								<li class="<?php
									if (@$page_name == 'kategori') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/kategori'); ?>"><i class="fa fa-circle-o"></i> Kategori</a>
								</li>
								<li class="<?php
									if (@$page_name == 'user') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('master/user'); ?>"><i class="fa fa-circle-o"></i> User</a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php
							if (@$page_name == 'rekap_harian' or @$page_name == 'surat_rujukan' or @$page_name == 'surat_sakit' or @$page_name == 'kunjungan_by_jam' or @$page_name == 'penggunaan_obat' or @$page_name == 'penyakit' or @$page_name == 'penyakit_by_departement') { echo 'active';
							}
 ?>">
							<a href="#"> <i class="fa fa-file-pdf-o"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i> </a>
							<ul class="treeview-menu">
								<li class="<?php
								if (@$page_name == 'rekap_harian') { echo 'active';
								}
 ?>">
									<a href="<?=base_url('laporan/rekap_harian') ?>"><i class="fa fa-circle-o"></i> Laporan Rekap Harian</a>
								</li>
								<li class="<?php
									if (@$page_name == 'surat_rujukan') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('laporan/surat_rujukan') ?>"><i class="fa fa-circle-o"></i> Laporan Surat Rujukan</a>
								</li>
								<li class="<?php
									if (@$page_name == 'surat_sakit') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('laporan/surat_sakit') ?>"><i class="fa fa-circle-o"></i> Laporan Surat Sakit</a>
								</li>
								<li class="<?php
									if (@$page_name == 'kunjungan_by_jam') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('laporan/kunjungan_by_jam') ?>"><i class="fa fa-circle-o"></i> Laporan Kunjungan By Jam</a>
								</li>
								<li class="<?php
									if (@$page_name == 'penggunaan_obat') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('laporan/penggunaan_obat') ?>"><i class="fa fa-circle-o"></i> Laporan Penggunaan Obat</a>
								</li>
								<li class="<?php
									if (@$page_name == 'penyakit') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('laporan/penyakit') ?>"><i class="fa fa-circle-o"></i> Laporan Penyakit</a>
								</li>
								<li class="<?php
									if (@$page_name == 'penyakit_by_departement') { echo 'active';
									}
 ?>">
									<a href="<?=base_url('laporan/penyakit_by_departement') ?>"><i class="fa fa-circle-o"></i> <span style="font-size: 12px;">Laporan Penyakit By Departement</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>

			<?php echo $contents; ?>

			<footer class="main-footer">
				<div class="pull-right hidden-xs">
					<b>Version</b> 2.3.0
				</div>
				<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
			</footer>

			<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div><!-- ./wrapper -->

		<script>
			$(document).ready(function() {
				$('[data-toggle="tooltip"]').tooltip();
				$(".select2").select2();
			});
		</script>
		<!-- Select2 -->
		<script src="<?= base_url('assets') ?>/plugins/select2/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="<?=base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?=base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script>
			$.fn.dataTable.ext.errMode = 'none';
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging" : true,
					"lengthChange" : true,
					"searching" : true,
					"ordering" : true,
					"info" : true,
					"autoWidth" : true
				});
				$('#example3').DataTable({
					"paging" : true,
					"lengthChange" : true,
					"searching" : true,
					"ordering" : false,
					"info" : true,
					"autoWidth" : false,
					"scrollX" : true,
					"scrollCollapse" : true,
					fixedColumns : {
						leftColumns : 1,
						rightColumns : 1
					}
				});
				$('#example4').DataTable({
					"ordering" : false
				});
			});
		</script>
		<!-- Bootstrap 3.3.5 -->
		<script src="<?=base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
		<!-- DataTables -->
		<script src="<?=base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?=base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="<?=base_url('assets'); ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="<?=base_url('assets'); ?>/plugins/fastclick/fastclick.min.js"></script>
		<!-- jQueryUI -->
		<script src="<?=base_url('assets'); ?>/plugins/jQueryUI/jquery-ui.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?=base_url('assets'); ?>/dist/js/app.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?=base_url('assets'); ?>/dist/js/demo.js"></script>
		<script src="<?=base_url('assets'); ?>/dist/js/custom.js"></script>
		<!-- Select2 -->
		<script src="<?=base_url('assets'); ?>/plugins/select2/select2.full.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript">
			$('.date').datepicker({
				format : 'yyyy/mm/dd',
				autoclose : 'true',
			});
		</script>
	</body>
</html>
