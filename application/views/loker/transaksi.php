<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Loker</li>
        <li class="active">Transaksi</li>
    </ol>
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
          	<div class="box-header text-center">
          		<h3>Pengambilan dan Penyimpana Laptop</h3>
          	</div>
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
             <div class="box-body no-padding">
              <table class="table table-responsive table-hover" id="tb_transaksi">
              	<thead>
              		                <tr>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>No Loker</th>
                  <th>Transaksi</th>
                  <th>Status</th>
                </tr>

              	</thead>
                <tbody id="trans">
                <?php foreach($loker as $loker): ?>
                	<tr>
                    <td data-id="<?= $loker['id_loker'] ?>"><?= $loker['Nama'] ?></td>
                    <td><?= $loker['kelas'] ?></td>
                	<td><?= $loker['no_loker'] ?></td>
                	<td>
                		<div class="btn-group">
                			<a class="btn btn-sm btn-primary" id="Ambil">Ambil</a>
                			<a class="btn btn-sm btn-primary" id="Simpan">Simpan</a>
                		</div>
                	</td>
                	<td>
                		<div id="status"></div>
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
