<style>
	
</style>
<section class="content">
	 <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Barang/Jasa</li>
        <li class="active">Jasa</li>
  </ol>
  
  <div class="row">
  	<div class="col">
        <a href="<?= base_url() ?>/barang_jasa/semua" class="btn btn-primary">Semua</a>
        <a href="<?= base_url() ?>/barang_jasa/barang" class="btn btn-primary">Barang</a>
        <a href="<?= base_url() ?>/barang_jasa/jasa" class="btn btn-primary active">Jasa</a>

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
						<?php if($this->session->userdata('akses') == 'admin' OR $this->session->userdata('akses') == 'superadmin'): ?>
    					<div class="btn-group">
			              	<a href="<?= base_url() ?>/barang_jasa/detail/<?= $data['kode_barang'] ?>" class="btn btn-primary"><span class="fa fa-sticky-note"></span></a>
			              	<a href="<?= base_url() ?>/barang_jasa/delete/<?= $data['kode_barang'] ?>" class="btn btn-danger"><span class="fa fa-warning"></span></a>
			              	<a data-toggle="modal" data-id="<?= $data['kode_barang'] ?>" id="edit_barang" data-target="#edit" class="btn btn-warning"><span class="fa fa-edit"></span></a>
    					</div>	
    					<?php else: ?>
			          	<a href="<?= base_url() ?>/barang_jasa/detail/<?= $data['kode_barang'] ?>" class="btn btn-primary"><span class="fa fa-sticky-note"></span></a>

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