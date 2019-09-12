<style>
	
</style>
<section class="content">
	 <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Barang/Jasa</li>
        <li class="active">Barang</li>
  </ol>
  
  <div class="row">
  	<div class="col">
        <a href="<?= base_url() ?>/barang_jasa/semua" class="btn btn-primary">Semua</a>

  		        <a href="<?= base_url() ?>/barang_jasa/barang" class="btn btn-primary active">Barang</a>
        <a href="<?= base_url() ?>/barang_jasa/jasa" class="btn btn-primary">Jasa</a>

  			<br>
  			<br>
  		<div class="box">
    	<div class="box-header">
    		Detail Loker 
    	</div>
    	<div class="box-body">
    		<div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover">
    			<tr style="width: 100px !important">
    				<th>Nama</th>
    				<th>Harga</th>
    				<th>Terjual</th>
    			</tr>
    			<?php foreach($produk as $data): ?>
                <tr>
                    <td><?= $data['nama_barang_jasa'] ?></td>
                    <td>Rp. <?= number_format($data['harga'],0,',','.') ?></td>
                    <td><?= $data['terjual'] ?></td>
                    <td>
    				<a href="<?= base_url() ?>barang_jasa/detail/<?= $data['kode_barang'] ?>" class="btn btn-primary">Detail</a>
                    <?php if ($this->session->userdata('akses') == 'admin'): ?>
    					<div class="btn-group">
    						<a href="<?= base_url() ?>barang_jasa/delete/<?= $data['kode_barang'] ?>" onclick="confirm('Yakin ingin menghapus <?= $data['nama_barang_jasa'] ?>')" class="btn btn-danger">delete</a>
    						<a href="<?= base_url() ?>barang_jasa/edit/<?= $data['kode_barang'] ?>" class="btn btn-warning">edit</a>
    					</div>
						<?php endif ?>
    				</td>
                </tr>
                <?php endforeach ?>
    			
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  	</div>
  </div>
</section>