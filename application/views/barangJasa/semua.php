<style>
	
</style>
<section class="content">
	 <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Barang/Jasa</li>
        <li class="active">Semua</li>
  </ol>
  <div class="row">
  	<div class="col">
			<?php if ($this->session->userdata('akses') == 'admin' OR $this->session->userdata('akses') == 'superadmin'): ?>
  		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Barang">
            <i class="fa fa-plus"></i> Tambah
        </button>
				
			<?php endif ?>
        <a href="<?= base_url() ?>/barang_jasa/semua" class="btn btn-primary active">Semua</a>
        <a href="<?= base_url() ?>/barang_jasa/barang" class="btn btn-primary">Barang</a>
        <a href="<?= base_url() ?>/barang_jasa/jasa" class="btn btn-primary">Jasa</a>
      <p></p>
      <?= form_error('harga','<div class="alert alert-danger alert-dismissible">','<span class="close" data-dismiss="alert">&times;</span></div>') ?>
      <?= $this->session->flashdata('produksi'); ?>
         <div class="modal fade" id="Barang">
          <div class="modal-dialog">
          	<form action="<?= base_url() ?>/barang_jasa/tambah" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" class="form-control" name="nama" required placeholder="Nama Barang">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" name="harga" required placeholder="Harga">               		
              	</div>
              	<div class="form-group">
	                <select name="kategori" id="" class="form-control">
	                	<option value="Barang">Barang</option>
	                	<option value="Jasa">Jasa</option> 
	                </select>
              	</div>
              	<div class="form-group">
	                <textarea class="form-control" name="deskripsi" required placeholder="Deskripsi"></textarea>               	
              	</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		<p></p>
  		<div class="box">
    	<div class="box-header">
    		Barang dan Jasa
    	</div>
    	<div class="box-body">
    		<div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover" id="table_produk_all">
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
              <?php //if ($this->session->userdata('akses') == 'admin'): ?>
    					<div class="btn-group">

                  	<a href="<?= base_url() ?>/barang_jasa/detail/<?= $data['kode_barang'] ?>" class="btn btn-primary"><span class="fa fa-sticky-note"></span></a>
                  	<a href="<?= base_url() ?>/barang_jasa/delete/<?= $data['kode_barang'] ?>" class="btn btn-danger"><span class="fa fa-warning"></span></a>
                  	<a data-toggle="modal" data-id="<?= $data['kode_barang'] ?>" id="edit_barang" data-target="#edit" class="btn btn-warning"><span class="fa fa-edit"></span></a>


    					</div>
						<?php //endif ?>
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


         <div class="modal fade" id="edit">
          <div class="modal-dialog">
            	<form action="<?= base_url() ?>/barang_jasa/act_update" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Barang Jasa</h4>
              </div>
	                <input type="hidden" class="form-control" name="kode_barang" placeholder="produk">               		
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" class="form-control" name="produk" placeholder="Nama Produk">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" name="harga" placeholder="Harga Produk">               		
              	</div>
              	<div class="form-group">
	                <textarea name="deskripsi" id="" cols="20" class="form-control" rows="10"></textarea>               		
              	</div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



       <script>
       	window.addEventListener('load',function () {
       		$(document).on('click','#edit_barang',function(event) {
       			var id = $(this).data('id')
       			$.ajax({
       				url: '<?= base_url() ?>barang_jasa/update',
       				type: 'post',
       				dataType: 'json',
       				data: {id: id},
       				success: function (data) {
       					console.log(data.deskripsi)
       					$('input[name="kode_barang"]').val(data.kode_barang)
       					$('input[name="produk"]').val(data.nama_barang_jasa)
       					$('input[name="harga"]').val(data.harga)
       					$('textarea[name="deskripsi"]').val(data.deskripsi)
       				}
       			})
       			
       		});;
       	});
       </script>