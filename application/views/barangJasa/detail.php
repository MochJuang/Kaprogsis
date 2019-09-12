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
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li>Barang/Jasa</li>
        <li>Semua</li>
        <li class="active">Detail</li>
  </ol>
	<form action="<?= base_url() ?>/barang_jasa/edit_foto/<?= $produk['kode_barang'] ?>" method="post" enctype="multipart/form-data" class="md-form">
	  <div class="fileUpload btn btn-success">
	  	<span>Ubah Foto</span>
	  	<input type="file" name="editfoto" class="upload" >
	  </div>
	  <input type="submit" value="Ok" class="btn btn-success">
	</form>

  <?php  
   if ($produk['foto'] != 'Tidak Ada') : ?>
       
      <figure class="figure">
        <img src="<?= base_url() ?>assets/foto_produk/<?= $produk['foto'] ?>" class="figure-img img-fluid rounded" alt="...">
      </figure>
    </section>
   
   <?php endif; ?>
   <div class="box">
       <div class="box-header text-center"><h3><?= $produk['nama_barang_jasa'] ?></h3></div>
       <div class="modal-body">
           <table class="table table-responsive">
               <tr>
                   <td><h4>Kode Produk</h4></td>
                   <td><h4><?= $produk['kode_barang'] ?></h4></td>
               </tr>
               <tr>
                   <td><h4>Nama Barang/Jasa</h4></td>
                   <td><h4><?= $produk['nama_barang_jasa'] ?></h4></td>
               </tr>
               <tr>
                   <td><h4>Harga</h4></td>
                   <td><h4>Rp. <?= number_format($produk['harga']) ?></h4></td>
               </tr>
               <tr>
                   <td><h4>Kategori</h4></td>
                   <td><h4><?= $produk['kategori'] ?></h4></td>
               </tr>
               <tr>
                   <td><h4>Terjual</h4></td>
                   <td><h4><?= $produk['terjual'] ?> pcs</h4></td>
               </tr>
               <tr>
                   <td><h4>Deskripsi</h4></td>
                   <td><h4><?= $produk['deskripsi'] ?></h4></td>
               </tr>
           </table>
       </div>
   </div>