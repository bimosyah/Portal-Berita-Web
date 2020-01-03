<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<style type="text/css">
		table{
			border-collapse: collapse;
			width: 70%;
			margin: 0 auto;
		}
		table th{
			border:1px solid #000;
			padding: 3px;
			font-weight: bold;
			text-align: center;
		}
		table td{
			border: 1px solid #000;
			padding: 3px;
			vertical-align: top;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<th>No</th>
		<th>Id Artikel</th>
		<th>Judul</th>
		<th>Tanggal Terbit</th>
		<th>Jumlah Klik</th>
	</tr>
	<?php $no=1; foreach ($Artikel->result() as $value): ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $value->id_artikel ?></td>
			<td><?= $value->judul ?></td>
			<td><?= $value->tgl_dibuat ?></td>
			<td><?= $value->klik ?></td>
		</tr>
	<?php $no++; endforeach ?>
</table>
</body>
</html>