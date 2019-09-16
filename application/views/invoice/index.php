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
	<div class="row">
		<div class="col">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Belum Lunas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-responsive table-hover" id="tb_invoice">
                <thead>
                	<tr>
                	<th>No</th>
                  <th>Nama</th>
                  <th>Total</th>
                  <th>Bayar</th>
                  <th>Kurang</th>
                </tr>
                </thead>
                <tbody>
                	<?php $no = 1; foreach($belum as $data): ?>
                <tr>
                	<td><?php echo $no;$no++; ?></td>
                	<td><?= date('d-m-Y',strtotime($data['penerima'])) ?></td>
                	<td><?= number_format($data['jumlah_total'],0,',','.') ?></td>
                	<td><?= number_format($data['uang'],0,',','.') ?></td>
                	<td><?= number_format($data['kembalian'],0,',','.') ?></td>
                	<td>
									<button data-id="<?= $data['id_invoice'] ?>" type="button" class="bayar btn btn-success" data-toggle="modal" data-target="#bayar">
					            Bayar
					        </button>                		
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

<div class="modal fade" id="bayar">
  <div class="modal-dialog">
  	<form action="<?= base_url() ?>invoice/bayar_ulang" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Bayar Ulang</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group">
          <input type="text" name="bayar" class="form-control" placeholder="Bayar">               		
      	</div>
      	<p>Uang Kurang = <span id="kurang"></span></p>
      	<p>Kembalian = <span  id="kembali"></span></p>
      	<input type="hidden" name="kembali">
      	<input type="hidden" name="id_in">
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
<script>
	window.addEventListener('load', function () {
		$('.bayar').click( function(event) {
			// alert($(this).data('id'))
			var id = $(this).data('id')
			$.ajax({
				url: '<?= base_url() ?>invoice/get_data/'+id,
				dataType: 'json',
				success:function(data) {
						$('#kurang').html(Math.abs(data.kembalian));
						$('input[name="id_in"]').val(data.id_invoice)
				}
			})
			
		});
		$(document).on('keyup', 'input[name="bayar"]', function(event) {
			event.preventDefault();
			var kembali = parseInt($('input[name="bayar"]').val()) - parseInt($('#kurang').html()); 
			$('#kembali').html(kembali);
			console.log($('#kurang').html())
			$('input[name="kembali"]').val(kembali);
		});
	});
</script>