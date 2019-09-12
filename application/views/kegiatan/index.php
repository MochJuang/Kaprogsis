<section class="content">
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kegiatan</li>
  </ol>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Kegiatan
        </button>
         <div class="modal fade" id="Tambah">
          <div class="modal-dialog">
            	<form action="<?= base_url() ?>kegiatan/tambah" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kegiatan</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	                <input type="text" class="form-control" required name="nama_kegiatan" placeholder="Nama Kegiatan">               		
              	</div>
              	<div class="form-group">
	                <input type="date" class="form-control" required name="waktu_kegiatan" placeholder="Waktu Kegiatan">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" required name="tempat_kegiatan" placeholder="Tempat Kegiatan">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" required name="dihadiri" placeholder="Di Hadiri Oleh">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" required name="lama_kegiatan" placeholder="Lama Kegiatan">               		
              	</div>
              	<div class="form-group">
	                <input type="text" class="form-control" required name="dana" placeholder="Dana Yang di Keluarakan">               		
              	</div>
              	<div class="form-group">
	                <textarea required name="deskripsi" id="" class="form-control" cols="20" placeholder="Deskripsi Kegiatan" rows="10"></textarea>               		
              	</div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" required name="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	<ul class="timeline timeline-inverse">
		<?php foreach($kegiatan as $data): ?>

    <li class="time-label d-block" style="margin-top: 10px" >
                        <span class="bg-red">
                          <?= date('d-m-Y',strtotime($data['waktu_pelaksanaan'])) ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-calendar bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?= $data['waktu_kegiatan'] ?></span>

                      <h3 class="timeline-header"><a href="#"><?= $data['nama_kegiatan'] ?></a></h3>

                      <div class="timeline-body">
                       <?= $data['deskripsi'] ?>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs" href="<?= base_url() ?>kegiatan/detail/<?= $data['id_kegiatan'] ?>">Detail</a>
                      </div>
                    </div>
                  </li>              
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                  <br>
                <?php endforeach ?>
                </ul>
</section>