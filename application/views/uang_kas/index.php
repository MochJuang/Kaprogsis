  <section class="content">
 <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Uang Kas</li>
  </ol>
  	  <div class="row">
        <div class="col-xs-12">
        	<h3>Jumlah Saldo Akhir  <div class="btn btn-success">Rp.<?= number_format($saldo_akhir,0,',','.') ?></div></h3>
					<?php if($this->session->userdata('akses') == 'admin' OR $this->session->userdata('akses') == 'superadmin'): ?>
        	 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Pemasukan">
            Pemasukan
        </button>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Keluaran">
            Keluaran
        </button>
      <?php endif ?>
        <div class="btn-group">
					<div class="btn btn-flat btn-primary"><div class="fa fa-print"></div> Print</div>
					<button type="button" class="btn btn-flat btn-primary dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only"></span>
					</button>   	
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="<?= base_url() ?>uang_kas/print" class="dropdown-item">All</a>						
						</li>
						<li>
							<a data-toggle="modal" data-target="#custom" class="dropdown-item">Custom</a>	
						</li>
					</ul>
		 		</div>
        
          <div class="box" style="margin-top: 10px !important">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table id="tb_kas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                	<tr>
                	<th>No</th>
                  <th>Tangal</th>
                  <th>Aksi</th>
                  <th>Deskripsi</th>
                  <th>Nominal</th>
                  <th>Jumlah Saldo Akhir</th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach($kas as $kas): ?>
                <tr>
                	<td><?= $kas['id_kas'] ?></td>
                	<?php  
                	$waktu = strtotime($kas['tanggal']);
                	$waktu = date('d-m-Y',$waktu);
                	?>
                	<td><?= $waktu ?></td>
                	<td><?= $kas['aksi'] ?></td>
                	<td><?= $kas['deskripsi'] ?></td>
                	<td>Rp.<?= number_format($kas['nominal'],0,',','.') ?></td>
                	<td>Rp.<?= number_format($kas['saldo'],0,',','.') ?></td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
         <div class="modal fade" id="Pemasukan">
          <div class="modal-dialog">
          	<form action="<?= base_url() ?>uang_kas/tambah_pemasukan" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pemasukan</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">               		
              	</div>
              	<div class="form-group">
	                <input type="text" name="nominal" class="form-control" placeholder="Nominal">               		
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
        <div class="modal fade" id="custom">
          <div class="modal-dialog">
          	<form action="<?= base_url() ?>uang_kas/print_custom" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Print Laporan Uang Kas</h4>
              </div>
              <div class="modal-body">
              	<div class="row">
              		<div class="col-md-5">
		                <input type="date" name="date_1" class="form-control">               		
              		</div>
              		<div class="col-md-2">Sampai</div>
              		<div class="col-md-5">
		                <input type="date" name="date_2" class="form-control">               		
              		</div>
              	</div>
              </div>
              <div class="modal-footer" style="margin-top: 15px">
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
        
         <div class="modal fade" id="Keluaran">
          <div class="modal-dialog">
          	<form action="<?= base_url() ?>uang_kas/tambah_keluaran" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Keluaran</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">               		
              	</div>
              	<div class="form-group">
	                <input type="text" name="nominal" class="form-control" placeholder="Nominal">               		
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
        <div class="box w-25" style="width: 600px !important;margin-top: 10px !important">
        	<div class="box-body">
        		<table class="table">
        			<tr>
        				<td>Jumlah Pemasukan</td>
        				<td>Rp. <?= number_format($jmlh_pemasukan,0,',','.') ?></td>
        			</tr>
        			<tr>
        				<td>Jumlah Keluaran</td>
        				<td>Rp. <?= number_format($jmlh_keluaran,0,',','.') ?></td>
        			</tr>
        			<tr>
        				<td>Jumlah Seluruh</td>
        				<td>Rp. <?= number_format($jmlh_seluruh,0,',','.') ?></td>
        			</tr>
        		</table>
        	</div>
        </div>
        

  </section>