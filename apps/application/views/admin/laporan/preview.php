<?php $this->load->view('admin/header');?>
<div class="main">
	<div class="uk-container">
		
		<h4>Laporan</h4>
		<br>
		<table id="example" class="table  " style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Id Artikel</th>
					<th>Judul</th>
					<th>Tanggal Tayang</th>
					<th>Jumlah Klik</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($Artikel->result() as $value): ?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $value->id_artikel ?></td>
					<td><?= $value->judul ?></td>
					<td><?= $value->tgl_dibuat ?></td>
					<td><?= $value->klik ?></td>
				</tr>
				<?php $no++; endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			buttons: [
			'pdf', 'print'
			]
		} );
	} );
</script>
<?php $this->load->view('admin/footer');?>






