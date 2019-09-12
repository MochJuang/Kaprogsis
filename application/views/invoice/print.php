<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print()">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header mt-0">
          <img src="<?= base_url() ?>/assets/logo.png" style="width: 30px" alt=""> aprogsis
          <small class="pull-right">Cianjur,  <?php 
          $date = [
          	'01' => "Januari",
          	'02' => "Februari",
          	'03' => "Maret",
          	'04' => "April",
          	'05' => "Mei",
          	'06' => "Juni",
          	'07' => "Juli",
          	'08' => "Agustus",
          	'09' => "September",
          	'10' => "Oktober",
          	'11' => "November",
          	'12' => 'Desember'
          ];
          $tanggal = strtotime($invoice['tanggal']);
          $hari = date('d');
          $bulan = date('m');
          $tahun = date('Y');
          echo $tanggal = $hari.' '.$date [$bulan].' '.$tahun;
          ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Dari
        <address>
          <strong>Unit Produksi Kaprogsis RPL</strong><br>
          Jl .Raya Bandung Km. 03 Rawabango Karangtengah Cianjur<br>
          <br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Kepada
        <address>
          <strong><?= $invoice['penerima'] ?></strong><br>
          Di Tempat<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #<?= $invoice['id_invoice'] ?></b><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          	<?php foreach($pesanan as $data): ?>
          <tr>
            <td><?= $data['kode_barang'];  ?></td>
            <td><?= $data['nama_barang_jasa'];  ?></td>
            <td><?= number_format($data['harga'],0,',','.');  ?></td>
            <td><?= $data['qty'];  ?></td>
            <td><?= number_format($data['jumlah'],0,',','.');  ?></td>
          </tr>
        <?php endforeach; ?>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

      <div class="col-xs-3" style="float: right;margin-top: 	20px">

          <table class="table">
             <tr>
              <th>Total:</th>
              <td>Rp.  <?= number_format($invoice['jumlah_total'],0,',','.');  ?></td>
            </tr>
           </table>
      </div>
      <!-- /.col -->
    <div class="float-right" style="margin: 200px 0 0 0;float: right;">
    		 Kaprogsis
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
