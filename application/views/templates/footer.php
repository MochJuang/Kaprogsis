<div class="modal fade" id="update_loker">
          <div class="modal-dialog">
            	<form action="<?= base_url() ?>loker/act_update" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Pengguna</h4>
              </div>
              <div class="modal-body">
              	<div class="form-group">
              		<input type="hidden" name="id_loker">
	                <input type="text" class="form-control" name="Nama" placeholder="Nama">               		
              	</div>
              	<div class="form-group">
	                <select name="kelas" id="" class="form-control">
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
	                <input type="text" class="form-control" name="no_loker" placeholder="No Loker 1-75">    	     		           <input type="hidden" class="form-control" name="kat">               		
           		
              	</div>
              	<div class="form-group">
	                <select name="jenis" id="" class="form-control">
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

		<?php if($this->session->userdata('akses') == 'admin' OR $this->session->userdata('akses') == 'superadmin'): ?>
		<div class="row fixed-bottom">
        <div class="col-md-4" style="position: fixed;bottom: 0;">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Pesan</h3>

              <div class="box-tools pull-right" id="open_chat">
                <button type="button" class="btn btn-box-tool"  data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="bodybox" onload="scrollBwh()">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" id="bodyPesan" >
                <!-- Message. Default to the left -->
                <!-- /.direct-chat-msg -->
              </div>
              
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <form action="" id="lkj">
                	<div class="input-group">
                  <input type="text" style="overflow: scroll;" name="message" autocomplete="off" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" id="submit" class="btn btn-primary btn-flat">Kirim</button>
                      </span>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->
      </div>
		</div>
    <?php endif ?>
  </aside>
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<div class="d-none" style="display: none;" id="user-active"><?= $this->session->userdata('user'); ?></div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- jQuery 3 -->
<!-- jQuery UI 1.11.4 -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>
<script src="<?= base_url() ?>assets/js/my.js"></script>
<script>
	window.addEventListener('load', function (e) {
		$(document).on('click', '#edit_loker', function(event) {
			event.preventDefault();
			var id = $(this).data('id');
			$.ajax({
				url: '<?= base_url() ?>loker/update/'+id,
				type: 'get',
				dataType: 'json',
				success:function (data) {
					console.log(data.kategori)
					$('input[name="Nama"]').val(data.nama)
					$('input[name="id_loker"]').val(data.id_loker)
					$('input[name="kelas"]').val(data.kelas)
					$('input[name="Kamar"]').val(data.kamar)
					$('input[name="no_loker"]').val(data.no_loker)
					$('input[name="jenis"]').val(data.type)
					$('input[name="Merek"]').val(data.merek)
					$('input[name="Warna"]').val(data.warna)
					$('input[name="kat"]').val(data.kategori)
				}
			})
			
		});
	});
</script>
<script type="text/javascript">
  $(document).ready( function () {
      // $('#tb_riwayat').DataTable();
      $('#tb_kas').DataTable();
      $('#tb_invoice').DataTable();
      $('.tb_lokera').DataTable();
      $('.tb_lokerb').DataTable();
      $('.tb_lokerc').DataTable();
      $('#tb_transaksi').DataTable();



				var base_url = $('input[name="base_url"]').val();
      $(document).on('click', '#submit', function(event) {
				event.preventDefault();
				var base_url = $('input[name="base_url"]').val();
				var isi = $('input[name="message"]').val();
				$.ajax({
					url: base_url+'/pesan/kirim',
					type: 'post',
					dataType: 'json',
					data: {'pesan': isi},
					success: function (data) {
					},
					error: function (data) {
						$('input[name="message"]').val('');
					}
				})
				
			});
			$(document).on('submit', '#lkj', function(event) {
				event.preventDefault();
				var base_url = $('input[name="base_url"]').val();
				var isi = $('input[name="message"]').val();
				$.ajax({
					url: base_url+'/pesan/kirim',
					type: 'post',
					dataType: 'json',
					data: {'pesan': isi},
					success: function (data) {
					},
					error: function (data) {
						$('input[name="message"]').val('');
					}
				})
				
			});


      function pesan() {
      	$.ajax({
      	url: base_url+'pesan/tampil',
      	type: 'post',
      	dataType: 'json',
 				success:function(data) {
 					var isi = '';
 					$.each(data, function(index, val) {
 							 if (val.user === $('#user-active').html()) {
 							 	var clas='';
 							  clas = 	'direct-chat-msg right';
 							 }
 							 else{
 							 	clas = 'direct-chat-msg'; 	
 							 }
 							 isi += (`
								<div class="`+clas+`" style="word-wrap:break-word;">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">`+val.user+`</span>
                    <span class="direct-chat-timestamp pull-right">`+val.waktu+`</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="http://localhost/juang/assets/foto_kaprog/`+val.foto+`" alt=""><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    `+val.pesan+`
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
 							 	`);
 							 $('#bodyPesan').html(isi);
 							});
		 					var tinggi = 0;
 							$('.direct-chat-msg').each(function(index, el) {
 							 console.log(el.find('.direct-chat-text').height())
 							 tinggi = tinggi + el.height();
 							});
 							$('#bodyPesan').scrollTop($('#bodyPesan').height()) ;
 						}
    	  })
      }
      function scrollBwh() {
		     var obj = document.getElementById('#bodyPesan');
				 obj.scrollTop = obj.scrollHeight; 
      }
      
      setInterval(function () {
      	pesan();
      },1000);

  } );
  $(document).on('click', '#open_chat', function(event) {
  	event.preventDefault();
  	alert($(this).height())
		$('#bodyPesan').scrollTop($('#bodyPesan').height()) ;
  });
</script>
 
</body>
</html>
