<section class="content">
<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Invoice</li>
        <li class="active">Tambah Invoice</li>
  </ol>
	<div class="tab-pane" id="settings">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Kepada</label>

        <div class="col-sm-5">
          <input type="text"  id="kepada" class="form-control" id="inputName" placeholder="Name">
        </div>
      </div>
      <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-5">
						<select name="" id="status" class="form-control">
							<option value="Lunas">Lunas</option>
							<option value="Belum Lunas">Belum Lunas</option>
						</select>
          </div>
        </div>
        
      </form>
    </div>
    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
             	<div id="invoice_id"></div>
              <table class="table table-responsive table-hover">
              	<thead>
	                <tr>
	                  <th>Kode Barang/Jasa</th>
	                  <th>Nama Barang/Jasa</th>
	                  <th>Qty</th>
	                  <th>Harga</th>
	                  <th>subtotal</th>
	                </tr>
              	</thead>
                <tbody id="table">
                <tr>
                	<td class="kode"></td>
                	<td>
                	<select class="form-control produk" style="width: 200px !important;">
                		<div>
                			
                		</div>
                		<option value="">Pilih Produk</option>
                		<?php foreach($produk as $nama): ?>
										<option class="produk" value="<?= $nama['nama_barang_jasa'] ?>"><?= $nama['nama_barang_jasa'] ?></option>
										<?php endforeach; ?>
									</select>
                	</td>
                	<td><input type="number" name="" class="qty"><input type="hidden" name="" id="input_qty"></td>
                	<td class="satuan"><input type="hidden" name="" id="input_satuan"></td>
                	<td class="total"><input type="hidden" name="" id="input_total"></td>
                </tr>
                </tbody>
              </table>
              <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="box">
        	<div class="box-body text-right">
						<p>Total Harga : Rp. <span id="total_harga"></span></p>
        	</div>
        </div>
       <div class="btn btn-success" id="tambah">Tambah</div>
          <br>
          <br>
				<div class="float-right">
        	<a  id="print" class="btn btn-success"><i class="fa fa-print"> Print</i></a>
        	<a href="<?= base_url() ?>invoice" class="btn btn-warning"><i class="fa fa-back"> Kembali</i></a>
        </div>

  		<div id="barang_jasa" style="display: none;">
	  		<?php foreach($produk as $nama): ?>
				<option value="<?= $nama['nama_barang_jasa'] ?>"><?= $nama['nama_barang_jasa'] ?></option>
				<?php endforeach; ?>
  		</div>

</section>