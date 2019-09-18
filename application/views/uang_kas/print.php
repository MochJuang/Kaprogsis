 
 <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<div class="container">
	<h1>Laporan Uang Kas Kaprogsis</h1>
	<hr>
	<table class="table">
		<thead>
			<tr>
            	<th>No</th>
	            <th>Tangal</th>
	            <th>Aksi</th>
	            <th>Deskripsi</th>
	            <th>Nominal</th>
	            <th>Jumlah Saldo Akhir</th>
			</tr>
		</thead>
		<tbody>
    	<?php $no = 1; foreach($kas as $kas): ?>
	        <tr>
	        	<td><?= $no;$no++; ?></td>
	        	<?php  
	        	$waktu = strtotime($kas['tanggal']);
	        	$waktu = date('d-m-Y',$waktu);
	        	?>
	        	<td><?= $waktu ?></td>
	        	<td><?= $kas['aksi'] ?></td>
	        	<td><?= $kas['deskripsi'] ?></td>
	        	<td>Rp.<?= number_format($kas['nominal'],0,',','.') ?></td>
	        	<td>Rp.<?= number_format($kas['saldo'],0,',','.') ?></td>
	        </tr>
	      <?php endforeach; ?>
        </tbody>	
    </table>
    <div class="row">
    	<div class="col-md-4">
    		<table class="table">
    			<tr>
    				<td>Jumlah Pemasukan</td>
    				<td>:</td>
    				<td><?= number_format($pemasukan,0,',','.') ?></td>
    			</tr>
    			<tr>
    				<td>Jumlah Pengeluaran</td>
    				<td>:</td>
    				<td><?= number_format($keluaran,0,',','.') ?></td>
    			</tr>
    			<tr>
    				<td>Jumlah Total</td>
    				<td>:</td>
    				<td><?= number_format($total,0,',','.') ?></td>
    			</tr>
    		</table>
    	</div>
    </div>
    <div class="row">
    	<div class="col"><button id="btn" class="btn btn-success">Print</i></button></div>
    </div>
</div>
<script>
	window.addEventListener('load', function (e) {
		var data = document.getElementById('btn');
		data.addEventListener('click', function (ev) {
			ev.target.remove();
			window.print();
		});
	});
</script>