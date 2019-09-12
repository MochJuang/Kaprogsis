<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Loker</li>
        <li>Riwayat</li>
        <li class="active">Detail</li>
    </ol>


    <div class="box">
    	<div class="box-header">
    		Detail Loker 
    	</div>
    	<div class="box-body">
    		<div class="box">
            
            <!-- /.box-header -->
            <input type="file" name="" id="" style="">
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover">
    			<tr style="width: 100px !important">
    				<td>Nama</td>
    				<td>:</td>
    				<td><?= $data['nama'] ?></td>
    			</tr>
    			<tr>
    				<td>Kelas</td>
    				<td>:</td>
    				<td><?= $data['kelas'] ?></td>
    			</tr>
    			<tr>
    				<td>Kamar</td>
    				<td>:</td>
    				<td><?= $data['kamar'] ?></td>
    			</tr>
    			<tr>
    				<td>Type</td>
    				<td>:</td>
    				<td><?= $data['type'] ?></td>
    			</tr>
    			<tr>
    				<td>Merek</td>
    				<td>:</td>
    				<td><?= $data['merek'] ?></td>
    			</tr>
    			 <tr>
    				<td>Warna</td>
    				<td>:</td>
    				<td><?= $data['warna'] ?></td>
    			</tr>
    			<tr>
    				<td>Status</td>
    				<td>:</td>
    				<td><div id="status" data-id="<?= $data['id_loker'] ?>" class="btn btn-success" onclick=""><?= $data['status'] ?></div></td>
    			</tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    	</div>
    </div>
</section>
<script>
	window.addEventListener('load',function() {
		$(document).on('click', '#status', function(event) {
			if (confirm("Apakah Anda Yakin Ingin Mengkonfirmasi Pembayaran")) {
				id = $(this).data('id');
				$.ajax({
					url: '<?= base_url() ?>loker/melunaskan/'+id,
					type: 'post',
					dataType: 'json',
					success:function (data) {
						alert('Berhasil Di Lunaskan');
					}
				})
				
			}else{
				alert('Pembayaran Dibatalakan')
			}
			/* Act on the event */
		});
	});
</script>