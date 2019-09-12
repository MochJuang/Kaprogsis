<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Kegiatan</li>
        <li class="active"> Detail</li>
  </ol>

  <div class="box">
  	<div class="box-header"><h4><?= $data['nama_kegiatan'] ?></h4></div>
  	<div class="box-body">
  		<table class="table table-hover">
  			<tr>
  				<td width="30%">Waktu Pelaksanaan</td>
  				<td><?= date('d-m-Y',strtotime($data['waktu_pelaksanaan'])) ?></td>
  			</tr>
  			<tr>
  				<td width="30%">Tempat Pelaksanaan</td>
  				<td><?= $data['tempat_kegiatan'] ?></td>
  			</tr>
  			<tr>
  				<td width="30%">Waktu Kegiatan</td>
  				<td>Dari Jam <?= $data['waktu_kegiatan'] ?></td>
  			</tr>
  			<tr>
  				<td width="30%">Di Hadiri Oleh</td>
  				<td><?= $data['di_hadiri_oleh'] ?></td>
  			</tr>
   			<tr>
  				<td width="30%">Dana Pelaksanaan</td>
  				<td><?= number_format($data['dana'],'0',',','.') ?></td>
  			</tr>
  			<tr>
  				<td width="30%">Deskripsi</td>
  				<td><?= $data['deskripsi'] ?></td>
  			</tr>

  		</table>
  	</div>
  </div>
  <div class="row">
  	<div class="col mt-2">
  		<a href="<?= base_url() ?>kegiatan" class="btn btn-primary">Kembali</a>
  	</div>
  </div>
</section>