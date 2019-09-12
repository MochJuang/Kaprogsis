<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
 


</head>
<body>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px">Data Buku Dengan CodeIgniter & DataTables</h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
	              <tr>
	                  <th>Tanggal</th>
	                  <th>Nama</th>
	                  <th>Kelas</th>
	                  <th>Status</th>
	                </tr>
	                	
                </thead>
                <tbody>
                	
                <?php foreach ($riwayat as $data): ?>
                <tr>
                	<td><?= date('d-m-Y H:s:i',strtotime($data['tanggal'])) ?></td>
                	<td><?= $data['nama'] ?></td>
                	<td><?= $data['kelas'] ?></td>
                	<td><?= $data['status'] ?></td>
                	<td><a href="<?= base_url() ?>/loker/detail_riwayat/<?= $data['nama'] ?>" class="btn btn-primary">Detail</a></td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
</body>
</html>