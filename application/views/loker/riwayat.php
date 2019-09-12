<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Loker</li>
        <li class="active">Riwayat</li>
    </ol>
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table id="tb_riwayat" class="table table-responsive table-hover">
                <thead>
                	<tr>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                	<?php $no =1; foreach ($riwayat as $data): ?>
                <tr>
                	<td><?= date('d-m-Y H:s:i',strtotime($data['tanggal'])) ?></td>
                	<td><?= $data['nama'] ?></td>
                	<td><?= $data['kelas'] ?></td>
                	<td><?= $data['status'] ?></td>
                	<td><a href="<?= base_url() ?>loker/detail_riwayat/<?= $data['id_riwayat'] ?>" data-id="<?= $data['id_riwayat'] ?>" class="btn btn-primary">Detail</a></td>
                </tr>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</section>
<!-- <script>
	$(document).ready(function() {
		$(document).on('click', '#d_riwayat', function(event) {
			event.preventDefault();
			alert('test');
			/* Act on the event */
		});
	});
</script> -->