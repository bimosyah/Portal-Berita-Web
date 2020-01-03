<?php $this->load->view('admin/header');?>
<div class="main">
	<div class="uk-container">
		
		<h4>List Artikel</h4>
		<br>
		<table id="example" class="table  " style="width:100%">
			<thead>
				<tr>
					<th>Id Artikel</th>
					<th>Judul</th>
					<th>Tgl Dibuat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_artikel->result() as $key) { ?>
					<tr>
						<td><a href="<?php echo site_url('admin/ArtikelData/').$key->id_artikel?>"><?php echo $key->id_artikel ?></a></td>
						<td><a href="<?php echo site_url('admin/ArtikelData/').$key->id_artikel?>"><?php echo $key->judul ?></a></td>
						<td><?php echo $key->tgl_dibuat ?></td>
					</tr>
				<?php } ?> 
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#example').DataTable();
		$('[data-toggle="tooltip"]').tooltip()
	} );
</script>
<?php $this->load->view('admin/footer');?>