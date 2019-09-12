<?php 

$tugas = [
	'hari' => array('SENIN','SELASA','RABU','KAMIS','JUM\'AT','SABTU'),
	'waktu'	=> array('07:20-08:40','08:00-08:40','09:20-10:00','09:20-10:00','09:20-10:00','09:20-10:00','09:20-10:00','09:20-10:00','09:20-10:00',),
	'mapel' => [150,150],
	'kelas' => ['XI A','XI B']
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1" cellpadding="6" cellspacing="0" style="text-align: center;">
		<thead>
			<tr>
				<td rowspan="2">HARI</td>
				<td rowspan="2">JAM</td>
				<td colspan="2">KELAS</td>
			</tr>
			<tr>
				<?php foreach($tugas['kelas'] as $d): ?>
				<td><?= $d ?></td>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($tugas['hari'] as $d): ?>
			<tr>
				<td rowspan="9"><?= $d ?></td>
				
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>

			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<tr>
				<td>07:20-08:40</td>
				<td>150</td>
				<td>150</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>