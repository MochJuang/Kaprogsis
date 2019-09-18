<?php $foto = $this->db->get_where('tb_userdetail',['nama' => $this->session->userdata('user')])->row_array()['foto'];?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kaprogsis</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->

	
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css">
<!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

 -->  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" href="<?= base_url() ?>assets/logo.png">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  	<input type="hidden" name="base_url" value="<?php echo base_url(); ?>">
    <!-- Logo -->
    <a href="<?= base_url() ?>" class="logo" style="background: #000 !important">
    	<input type="hidden" name="user_active" value="<?= $this->session->userdata('user'); ?>">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-lg"><b><img style="size: 20px !important" class="img-fluid" src="<?= base_url() ?>/assets/logo.png"></b>aprogsis</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?= $this->session->userdata('user'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url() ?>assets/foto_kaprog/<?= $foto ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('user'); ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url() ?>/home/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url() ?>/home/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>/assets/foto_kaprog/<?= $foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        	<div class="">
        	</div>
          <p><?= $this->session->userdata('user'); ?></p>
          <a href="#"><i class="fa fa-circle text-success my-1"></i> Online</a>
        </div>
      </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($title=='Dasboard') {echo 'active';} ?>"><a href="<?= base_url() ?>/home"><i class="fa fa-dashboard"></i> <span>Dasboard</span></a></li>
        <li class="treeview <?php if($title=='user') {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?= base_url() ?>/user/male"><i class="fa fa-male"></i>Putra</a></li>
            <li><a href="<?= base_url() ?>user/female"><i class="fa fa-female"></i>Putri</a></li>
          </ul>
        </li>
        </li>      
        <li class="<?php if($title=='invoice') {echo 'active';} ?>"><a href="<?= base_url() ?>invoice"><i class="fa fa-rocket"></i> <span>Invoice</span></a></li>
        <li class="<?php if($title=='Uang Kas') {echo 'active';} ?>"><a href="<?= base_url() ?>uang_kas"><i class="fa fa-money"></i> <span>Uang Kas</span></a></li>
        <li class="<?php if($title=='Barang_jasa') {echo 'active';} ?>"><a href="<?= base_url() ?>barang_jasa/semua"><i class="fa fa-book"></i> <span>Barang/Jasa</span></a></li>
        <li class="<?php if($title=='kegiatan') {echo 'active';} ?>"><a href="<?= base_url() ?>kegiatan"><i class="fa fa-calendar"></i> <span>Kegiatan</span></a></li>
        </li>
        <li class="treeview mt-0 <?php if($title=='loker') {echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Loker</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li>
          <a href="<?= base_url() ?>loker/loker_a">
            <i class="fa fa-share"></i> <span>Data Loker</span>
          </a>
          
        </li>
            <li><a href="<?= base_url() ?>loker/riwayat"><i class="fa fa-circle-o"></i>Riwayat Pengambilan</a></li>
        		<?php if($this->session->userdata('akses') == 'admin' OR $this->session->userdata('akses') == 'superadmin'): ?>
	            <li><a href="<?= base_url() ?>loker/transaksi"><i class="fa fa-circle-o"></i>Transaksi</a></li>
            <?php endif ?>
          </ul>
        </li>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


     
