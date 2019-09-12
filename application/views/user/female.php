 <?php $foto = $this->db->get_where('tb_userdetail',['nama' => $this->session->userdata('user')])->row_array()['foto'];?>
  <section class="content">
 <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	  <li>user</li>
	  <li class="active">Male</li>
  </ol>
   <div class="row">
   	<?php foreach($user as $data): ?>
     <div class="col-md-4">
		<div class="box box-widget widget-user detailProfile">
	    <div class="widget-user-header bg-aqua-active">
	      <h3 class="widget-user-username"><?= $data['Nama'] ?></h3>
	      <h5 class="widget-user-desc"><?= $data['divisi'] ?></h5>
	    </div>
	    <div class="widget-user-image">
	      <img class="img-circle" src="<?= base_url() ?>assets/foto_kaprog/<?= $data['foto'] ?>" alt="User Avatar">
	    </div>
	    <div class="box-footer">
	      <div class="row">
	        <div class="col">
	          <div class="description-block">
	            <span class="description-text"><?= $data['Alamat'] ?></span>
	            <p class="description-text">
	            	<a data-target="#modal_profile" data-id="<?= $data['id_detail'] ?>" data-toggle="modal" class="btn btn-primary">Detail</a>
	            </p>

	          </div>
	        </div>
  	      </div>
	    </div>
	  </div>
	</div>
	  
        <!-- /.col -->
 <?php endforeach ?>

   </div>
  </section>
  <div class="modal fade" id="modal_profile">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detail User</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
        		<div class="col-4 float-md-left">
        		</div>
        		<div class="col-7 float-md-right">
    					<table cellpadding="5">
    						<tr>
    							<td rowspan="8">
    								<img src="" alt="gambar Profile" id="img_profile" class="img-fluid float-left" style="width: 250px;margin: 0 10px">
    							</td>
    						</tr>
    						<tr style="border-bottom: 1px solid black;">
    							<td>Nama</td>
    							<td style="padding-right: 10px;padding-left: 10px"> =>   </td>
    							<td id="fullname"></td>
    						</tr>
    						<tr style="border-bottom: 1px solid black;">
    							<td>Kelas</td>
    							<td style="padding-right: 10px;padding-left: 10px"> =>   </td>
    							<td id="kelas"></td>
    						</tr>
    						<tr style="border-bottom: 1px solid black;">
    							<td>Alamat</td>
    							<td style="padding-right: 10px;padding-left: 10px"> =>   </td>
    							<td id="address"></td>
    						</tr>
    						<tr style="border-bottom: 1px solid black;">
    							<td>Divisi</td>
    							<td style="padding-right: 10px;padding-left: 10px"> =>   </td>
    							<td id="bagian"></td>
    						</tr>
    						<tr style="border-bottom: 1px solid black;">
    							<td>Facebook</td>
    							<td style="padding-right: 10px;padding-left: 10px"> =>   </td>
    							<td id="fb"></td>
    						</tr>
    						<tr style="border-bottom: 1px solid black;">
    							<td>Kamar</td>
    							<td style="padding-right: 10px;padding-left: 10px"> =>   </td>
    							<td id="kamar"></td>
    						</tr>
    					</table>
        		</div>
        	</div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script>
  	window.addEventListener('load', function(argument) {
  		$(document).on('click', 'a[data-target="#modal_profile"]', function(event) {
  			event.preventDefault();
  			var id = $(this).data('id');
  			$.ajax({
  				url: '<?= base_url() ?>user/detail/'+id,
  				type: 'get',
  				dataType: 'json',
  				success:function (data) {
  					console.log(data)
  					$('#img_profile').attr('src', '<?= base_url() ?>assets/foto_kaprog/'+data.foto);
  					$('#fullname').html(data.Nama)
  					$('#bagian').html(data.divisi)
  					$('#address').html(data.Alamat)
  					$('#kelas').html(data.Kelas)
  					$('#fb').html(data.facebook)
  					$('#kamar').html(data.Kamar)
  				}
  			})
  		});
  	});
  </script>