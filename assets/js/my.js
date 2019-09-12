$(document).ready(function() {
	function formatRupiah(angka) {
		var	number_string = angka.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
	}

	$('#table').on('change', '.produk', function(event){

			var nama = $(this).val();
			var baris = $(this).closest('tr');
			var base_url = $('input[name="base_url"]').val();
			 $.ajax({
			 	url: base_url + 'invoice/reload_data',
			 	type: 'POST',
			 	dataType: 'json',
			 	data: {data: nama},
			 	success: function(data){ 
	                baris.find('td').eq(0).html(data.kode_barang);
			 		baris.find('td').eq(3).html(data.harga).data('id', data.harga);
				 	},
			 	error: function(data) {
			 		alert('gagal');
			 	}
			 })
	});

  var produk  = $('#barang_jasa').html();
	$('#tambah').click(function(event) {
		 	$('#table').append(`
                <tr>
                    <td class="kode"></td>
                    <td>
                    <select class="form-control produk" style="width: 200px !important;">
                        <option value="">Pilih Produk</option>
                            `+produk+`
                    </td>
                    <td><input type="number" name="" class="qty"><input type="hidden" name="" id="input_qty"></td>
                    <td class="satuan"><input type="hidden" name="" id="input_satuan"></td>
                    <td class="total"><input type="hidden" name="" id="input_total"></td>
                    <td><div class="btn btn-danger" id="remove"><i class="fa fa-minus"></i></div></td>

                </tr>
		 		`);
	});

	$(document).on('click', '#remove', function(event) {
		event.preventDefault();
		$(this).parent().parent().remove();
	});

	$(document).on('change', '.qty', function(e) {
		var baris = $(this).closest('tr');
		var qty = $(this).val();
		var harga_satuan = baris.find('td').eq(3).text();
		var subtotal = parseInt(qty) * parseInt(harga_satuan);

		baris.find('td').eq(4).text(subtotal);
		baris.find('td').eq(4).data('id', subtotal);

		// hitung total keseluruhan
		var total = 0;
		$('#table tr').each(function(e){
			var subtotal = $(this).find('td').eq(4).text();
			if(isNaN(subtotal) || subtotal == '')
				subtotal = 0;
			total += parseInt(subtotal);	
		})

		$('#total_harga').text(total);

	})
	$(document).on('click', '#print', function(event) {
		event.preventDefault();
		if ($('#kepada').val() == null) {
			$('#print').after(`
			<div class="text-danger small">Inputan Tidak Boleh Kosong !</div>
				`);
		}
		else{
			var kepada = $('#kepada').val();
			var status = $('#status').val();
			var jumlah = $('#total_harga').html();
			var base_url = $('input[name="base_url"]').val();
			$.ajax({
				url: base_url+'invoice/tambah',
				type: 'post',
				dataType: 'json',
				data: {
					'kepada' : kepada,
					'jumlah_total'  : jumlah,
					'status'  : status,
				},
				success: function(data){
					$('#table tr').each(function(index, el) {
						var el = $(this);
						var nama =  el.find('td').eq(1).find('select').val();
						var qty = el.find('td').eq(2).find('input').val();
						var harga = el.find('td').eq(3).data('id');
						var subtotal = el.find('td').eq(4).data('id');
						var kode_barang = el.find('td').eq(0).html();
						$.ajax({
							url: base_url+'invoice/tambah_pesanan',
							type: 'post',
							dataType: 'json',
							data: {
								'id_invoice' : data,
								'kode_barang' : kode_barang,
								'nama_barang' : nama,
								'qty' : qty,
								'harga' : harga,
								'subtotal' : subtotal
							},
							success: function(data){
								window.location = base_url+'invoice/print/'+data;
							},
							error: function(data) {
						 		alert('gagal');
						 	}
						})

					});
				},
				error: function(data) {
			 		alert('gagal');
			 	}
			})
		}
	});
	
	$(document).on('click', '#Ambil', function(event) {
		var base_url = $('input[name="base_url"]').val();
		var aksi = $(this).attr('id');
		var id = $(this).parent().parent().siblings('td').eq(0).data('id');
		var now = $(this);
		$.ajax({
			url: base_url+'loker/aksi_transaksi',
			type: 'post',
			dataType: 'json',
			data: {
				'aksi': aksi,
				'id' :id
			},
			success:function (data) {
				now.parent().parent().parent().find('td').eq(4).html(data)
			},
			error:function(data) {
				alert('test');
			}
		})
		
	});
	$(document).on('click', '#Simpan', function(event) {
		var base_url = $('input[name="base_url"]').val();
		var aksi = $(this).attr('id');
		var id = $(this).parent().parent().siblings('td').eq(0).data('id');
		var now = $(this);
		$.ajax({
			url: base_url+'loker/aksi_transaksi',
			type: 'post',
			dataType: 'json',
			data: {
				'aksi': aksi,
				'id' :id
			},
			success:function (data) {
				now.parent().parent().parent().find('td').eq(4).html(data);
			},
			error:function(data) {
				alert('test');
			}
		})
		
	});

	
});
