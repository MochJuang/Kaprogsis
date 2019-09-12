<section class="content">
 <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Invoice</li>
  </ol>
	<div class="row mb-3">
		<div class="offset-3 col-4">
			<a href="<?= base_url() ?>/invoice/tambah_invoice" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Invoice</i></a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Invoice Kaprogsis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive table-hover" id="tb_invoice">
                <thead>
                	<tr>
                	<th>No</th>
                  <th>Id Invoice</th>
                  <th>User</th>
                  <th>Kepada</th>
                  <th>Tangal</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                	<?php $no = 1; foreach($invoice as $data): ?>
                <tr>
                	<td><?php echo $no;$no++; ?></td>
                	<td><?= $data['id_invoice'] ?></td>
                	<td><?= $data['user'] ?></td>
                	<td><?= $data['penerima'] ?></td>
                	<td><?= date('d-m-Y',strtotime($data['tanggal'])) ?></td>
                	<td><button class="btn btn-success"><?= $data['status'] ?></i></button></td>
                	<td>
	                	  <a href="<?= base_url() ?>/invoice/detail_invoice/<?= $data['id_invoice'] ?>" class="btn btn-success"><i class="fa fa-sticky-note"></i> Detail</a>
                	</td>
                </tr>
              <?php endforeach ?>
                </tbody>
              </table>
              <script>
              	$(document).ready(function() {
              		$('#tb_invoice').DataTable();
              	});
              </script>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	</div>
</section>