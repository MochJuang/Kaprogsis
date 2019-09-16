 <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>invoice</a></li>
        <li class="active">detail</li>
  </ol>
<section class="content">
	<div class="row">
		<div class="col-3">
			<h3>Detail Invoice</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-4" >
			<table class="table" style="font-size: 20px !important;width: 400px">
        <tr>
          <td>ID Invoice</td>
          <td>:</td>
          <td><?= $invoice['id_invoice'] ?></td>
        </tr>
        <tr>
          <td>User</td>
          <td>:</td>
          <td><?= $invoice['user'] ?></td>
        </tr>
				<tr>
					<td>Penerima</td>
					<td>:</td>
					<td><?= $invoice['penerima'] ?></td>
				</tr>
				<tr>
					<td>Uang</td>
					<td>:</td>
					<td><?= number_format($invoice['uang'],0,',','.') ?></td>
				</tr>
				<tr>
					<td>Kembalian</td>
					<td>:</td>
					<td><?= number_format($invoice['kembalian'],0,',','.') ?></td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>:</td>
					<td><?= $invoice['tempat'] ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td>:</td>
					<td><?= date('d-m-Y',strtotime($invoice['tanggal'])) ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><div class="btn btn-success"><?= $invoice['status'] ?></div></td>
				</tr>
			</table>
		</div>
	</div>
	<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover">
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                </tr>
                <?php foreach($pesanan as $data): ?>
		          <tr>
		            <td><?= $data['kode_barang'];  ?></td>
		            <td><?= $data['nama_barang_jasa'];  ?></td>
		            <td><?= number_format($data['harga'],0,',','.');  ?></td>
		            <td><?= $data['qty'];  ?></td>
		            <td><?= number_format($data['jumlah'],0,',','.');  ?></td>
		          </tr>
		        <?php endforeach; ?>
                <tr>
                	<td colspan="3"></td>
                	<td>Total Harga</td>
                	<td>Rp.<?= number_format($invoice['jumlah_total'],0,',','.') ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
            <div class="float-right">
            	<a href="<?= base_url() ?>invoice/print/<?= $invoice['id_invoice'] ?>" class="btn btn-success"><i class="fa fa-print"> Print</i></a>
            </div>
      </div>
</section>