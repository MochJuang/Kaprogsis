<section class="content">
  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Loker</li>
        <li>Data</li>
        <li class="active">Loker A(Putra)</li>
    </ol>
   <div class="btn-group">
			<div class="btn btn-flat btn-primary">Putra</div>
			<button type="button" class="btn btn-flat btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</button>   	
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="<?= base_url() ?>/loker/loker_a" class="dropdown-item">Loker A</a>						
					</li>
					<li>
						<a href="<?= base_url() ?>/loker/loker_b" class="dropdown-item">Loker B</a>	
					</li>
				</ul>
   </div>
	<a href="<?= base_url() ?>/loker/loker_c" class="btn btn-primary">Putri</a>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah
        </button>
         <div class="modal fade" id="Tambah">
          <div class="modal-dialog">
            	<form action="<?= base_url() ?>loker/tambah/A" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pengguna</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" class="form-control" name="Nama" placeholder="Nama">               		
              	</div>
              	<div class="form-group">
	                <select name="kelas" class="form-control">
	                	<?php $data = ['X A','XI A','XI B','XII A']; 
	                	foreach($data as $data):?>
	                		<option value="<?= $data ?>"><?= $data ?></option>
	                	<?php endforeach; ?>
	                </select>               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" name="Kamar" placeholder="Kamar">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" name="no_loker" placeholder="No Loker 1-75">               		
              	</div>
              	<div class="form-group">
	                <select name="jenis" class="form-control">
	                	<option value="Laptop">Laptop</option>
	                	<option value="Notebook">Notebook</option>
	                </select>              		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" name="Merek" placeholder="Merek">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" name="Warna" placeholder="Warna Laptop">               		
              	</div>
              	<div class="form-group">
	                <select name="ket" class="form-control">
	                	<option value="Lunas">Lunas</option>
	                	<option value="Belum Lunas">Belum Lunas</option>
	                </select>              		
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
	<br>
	<br>
        <?= $this->session->flashdata('loker_a'); ?>	
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover tb_lokera">
                <thead>
                	<tr>
                  <th>No Loker</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                </tr>
                </thead>
								<tbody>
								<?php foreach($loker as $loker): ?>
                <tr>
                  <td><?= $loker['no_loker'] ?></td>
                  <td><?= $loker['nama'] ?></td>
                  <td><?= $loker['kelas'] ?></td>
                  <td>
                  	<a href="<?= base_url() ?>/loker/detail/<?= $loker['id_loker'] ?>" class="btn btn-primary"><span class="fa fa-sticky-note"></span></a>
                  	<a href="<?= base_url() ?>/loker/delete/<?= $loker['id_loker'] ?>/a" class="btn btn-danger"><span class="fa fa-warning"></span></a>
                  	<a id="edit_loker" data-target="#update_loker" data-toggle="modal" data-id="<?= $loker['id_loker'] ?>" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                  </td>
                </tr>
              <?php endforeach ?>

								</tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
</div>
</section>
