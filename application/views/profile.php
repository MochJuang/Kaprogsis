<style>
	.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
  </ol>
  <div class="box box-widget widget-user-2">
    <div class="widget-user-header bg-aqua-active" style="padding: 20px;overflow: hidden;">
      <div class="widget-user-image">
        <img class="" style="border-radius: 100% !important;width:100px;margin-right: 20px" src="<?= base_url() ?>assets/foto_kaprog/<?= $profile['foto'] ?>"  alt="User Avatar">
      </div>
      <!-- /.widget-user-image -->
      <h3 class="widget-user-username"><?= $profile['Nama'] ?></h3>
      <h5 class="widget-user-desc"><?= $profile['divisi'] ?></h5>
    </div>
        <form action="<?= base_url() ?>/home/edit_foto/<?= $profile['id_detail'] ?>" method="post" enctype="multipart/form-data" class="md-form">
		  <div class="fileUpload btn btn-success" style="margin-right: 0">
		  	<span>Ubah Foto</span>
		  	<input type="file" name="editfoto" class="upload">
		  </div>
		  <input type="submit" value="Ok" class="btn btn-success">
		</form>
    <div class="box-body">
        <table class="nav nav-stacked table">
            <tr>
                <td>Kelas</td>
                <td><?= $profile['Kelas'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?= $profile['Alamat'] ?></td>
            </tr>
            <tr>
                <td>Kamar</td>
                <td><?= $profile['Kamar'] ?></td>
            </tr>
            <tr>
                <td>Facebook</td>
                <td><?= $profile['facebook'] ?></td>
            </tr>

        </table>
    </div>
    </div>
    <div class="row">
        <div class="col">
            <?php echo $this->session->flashdata('pesan_user'); ?>
        </div>
    <div class="row">
        <div class="col">
            <a id="edit_profile" data-target="#editp" data-toggle="modal" style="margin-left:20px " class="btn btn-info">Edit Profile</a>
            <a style="margin-left:4px" data-target="#editup" data-toggle="modal" class="btn btn-success">Edit Username & Password</a>
        </div>
    </div>
<div class="modal fade" id="editp">
          <div class="modal-dialog">
            <form action="<?= base_url() ?>home/edit_form" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="Alamat" class="form-control" placeholder="Alamat">                       
                </div>
                <div class="form-group">
                    <input type="text" name="Kamar" class="form-control" placeholder="Kamar">                       
                </div>
                <div class="form-group">
                    <input type="text" name="Facebook" class="form-control" placeholder="Facebook">                     
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
        <div class="modal fade" id="editup">
          <div class="modal-dialog">
            <form action="<?= base_url() ?>home/edit_pass" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit User</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username">                       
                </div>
                <div class="form-group">
                    <input type="text" name="password" class="form-control" placeholder="Password Baru">
                </div>
                <div class="form-group">
                    <input type="password" name="password_lama" class="form-control" placeholder="Password Lama">
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


		<?php $data = $this->db->get('tb_user')->result_array(); ?>
            <?php if($this->session->userdata('akses') == 'superadmin'): ?>
            	<hr>
            <a href="<?= base_url() ?>home/empty_pesan" class="btn btn-primary">Kosongkan Pesan</a>
            <a id="tambah_u" data-target="#tambah_user" data-toggle="modal" class="btn btn-primary">Tambah Profile</a>

		<div class="box" style="width: 400px;margin-top: 20px">

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover tb_lokera">
                <thead>
               	<tr>
                  <th>Username</th>
                </tr>
                </thead>
				<tbody>
					<?php foreach($data as $data): ?>
		        	<tr>
		        		<td><?= $data['username'] ?></td>
		        		<td>
		        			<div class="btn-group">
			        			<button id="masuk" data-target="#modal_profile" data-toggle="modal" class="btn btn-primary" data-id="<?= $data['id_user'] ?>"><i class="fa fa-edit"></i></button>
			        			<a class="btn btn-danger" href="<?= base_url() ?>home/delete_user/<?= $data['id_user'] ?>"><i class="fa fa-warning"></i></a></td>
		        			</div>
		        	</tr>
		        	<?php endforeach; ?>
				</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      <?php endif ?>

		<div class="modal fade" id="modal_profile">
          <div class="modal-dialog">
          	<form action="<?= base_url() ?>home/act_edit_masuk" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit User Masuk</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" name="username_user" class="form-control" placeholder="Username">               		
              	</div>
              	<div class="form-group">
	                <input type="text" name="password_user" class="form-control" placeholder="Password">               		
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
</section>
<script>
    window.addEventListener('load', function () {
        $('#edit_profile').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?= base_url() ?>home/edit_profile",
                type: 'post',
                dataType: 'json',
                success:function(data) {
                    console.log(data)
                    $('input[name="Kamar"]').val(data.Kamar);
                    $('input[name="Alamat"]').val(data.Alamat);
                    $('input[name="Facebook"]').val(data.facebook);
                }                 
            })
            
        });

        $(document).on('click', '#masuk', function(event) {
        	event.preventDefault();
        	$.ajax({
        		url: '<?= base_url() ?>home/edit_masuk/'+$(this).data('id'),
        		type: 'get',
        		dataType: 'json',
        		success:function(data) {
        			console.log(data)
                    $('input[name="username_user"]').val(data.username);
                    $('input[name="id_user"]').val(data.id_user);
        		}
        		})
        	});
        	
    });
</script>

<div class="modal fade" id="tambah_user">
          <div class="modal-dialog">
            <form action="<?= base_url() ?>home/add_user" enctype="multipart/form-data" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Profile</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" name="username_user" class="form-control" placeholder="Username">               		
              	</div>
              	<div class="form-group">
	                <input type="text" name="password_user" class="form-control" placeholder="Password">               		
              	</div>
              	<div class="form-group">
	                <input type="text" name="nama_user" class="form-control" placeholder="Nama">               		
              	</div>
              	<div class="form-group">
	                <input type="text" name="kelas_user" class="form-control" placeholder="Kelas">               		
              	</div>
                <div class="form-group">
                    <input type="text" name="alamat_user" class="form-control" placeholder="Alamat">                       
                </div>
                <div class="form-group">
                    <input type="text" name="kamar_user" class="form-control" placeholder="Kamar">                       
                </div>
                <div class="form-group">
                    <input type="text" name="divisi_user" class="form-control" placeholder="Divisi">                       
                </div>
                <div class="form-group">
                    <input type="file" name="foto_user" class="form-control" placeholder="Kamar">                       
                </div>
                <div class="form-group">
                    <input type="text" name="facebook_user" class="form-control" placeholder="Facebook">                     
                </div>
                <div class="form-group">
                    <select name="jenkel_user" class="form-control">
                    	<option value="Putra">Putra</option>
                    	<option value="Putri">Putri</option>
                    </select>                     
                </div>
                <div class="form-group">
                    <select name="role_id" class="form-control">
                    	<option>role id</option>
                    	<option value="0">0</option>
                    	<option value="1">1</option>
                    	<option value="2">2</option>
                    </select>                     
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





