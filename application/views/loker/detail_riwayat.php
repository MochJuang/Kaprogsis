<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Loker</li>
        <li>Riwayat</li>
        <li class="active">Detail</li>
    </ol>
    <div class="box">
    	<div class="box-header">
    		Detail Riwayat
    	</div>
    	<div class="box-body">
    		<div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover">
    			<tr style="width: 100px !important">
    				<td>Nama</td>
    				<td>:</td>
    				<td><?= $riwayat['nama'] ?></td>
    			</tr>
    			<tr>
    				<td>Kelas</td>
    				<td>:</td>
    				<td><?= $riwayat['kelas'] ?></td>
    			</tr>
    			<tr>
    				<td>Kaprogsis</td>
    				<td>:</td>
    				<td><?= $riwayat['user'] ?></td>
    			</tr>
    			<tr>
    				<td>Tanggal</td>
    				<td>:</td>
    				<td><?= $riwayat['tanggal'] ?></td>
    			</tr>
    			<tr>
    				<td>No Loker</td>
    				<td>:</td>
    				<td><?= $riwayat['no_loker'] ?></td>
    			</tr>
    			<tr>
    				<td>Status</td>
    				<td>:</td>
    				<td><div class="btn btn-success"><?= $riwayat['status'] ?></div></td>
    			</tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    	</div>
    </div>
</section>