<?php $this->load->view('admin/header');?>
<div class="main">
	<div class="uk-container">
		<?php //echo var_dump($aplikasi)?>
		<?php 
		// foreach ($aplikasi as $value) {
		// 	$nama = $value->nama;
		// 	$slogan = $value->slogan;
		// }
		?>
		<?php echo validation_errors(); ?>
		<h4>Kategori</h4>
		<button id="btn_tambah" class="uk-button uk-button-primary uk-inline">Tambah</button>

		<div class="kategori">
			<section id="tambah" style="display: none;">
				<br>
				<form class="uk-form-horizontal">

					<div class="uk-margin">
						<label class="uk-form-label" for="form-horizontal-text">Nama Kategori</label>
						<div class="uk-form-controls">
							<input name="nama" id="nama" class="uk-input" id="form-horizontal-text" type="text">
							<input name="id" id="id" type="hidden">
						</div>
					</div>

				</form>
				<button type="submit" id="btn_insert" class="uk-button uk-button-primary">Save</button>
				<button style="display: none;" type="submit" id="btn_update" class="uk-button uk-button-primary">Update</button>

			</section>
			<br>
			<section id="datatable">
				<table id="table" class="stripe" style="width: 75%">
					<thead>
						<tr>
							<td>ID</td>
							<td>Nama Kategori</td>							
						</tr>
					</thead>
					<tbody id="data">

					</tbody>
				</table>
			</section>

		</div>

	</div>
</div>
<script>
	var table;
	$(document).ready(function(){
		table = $('#table').DataTable(
		{
			"aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
			"pageLength" : 5,
			"ajax": {
				url : "<?php echo site_url("admin/KategoriRead") ?>",
				type : 'GET'
			},
		}
		);

		$("#btn_tambah").click(function(){
			if ($("#btn_update").show()) {
				$("#btn_update").hide();
				$("#btn_insert").show()
			}

			$("#btn_tambah").html($("#btn_tambah").html() == 'Tambah' ? 'Daftar' : 'Tambah');

			$("#tambah").toggle();
			$('#nama').val('');
			$("#datatable").toggle();
		});

		$("#btn_insert").click(function(){
			var nama = $('#nama').val().trim();
			if (nama == '') {
				$('#nama').val('');
				UIkit.notification('Input kosong!', 'danger');
			}else{
				$.ajax({
					type:'post',
					url: '<?php echo site_url('admin/KategoriInsert')?>',
					dataType:'json',
					data:{nama:nama},
					success:function(data){
						UIkit.notification('Sukses tersimpan', 'success');
						reload();
						$('#nama').val('');
					}
				})
				return false;
			}
		});

		$("#btn_update").click(function(){
			var nama = $('#nama').val().trim();
			var id = $('#id').val();
			if (nama == '') {
				UIkit.notification('Input kosong!', 'danger');
				$('#nama').val('');
			}else{
				$.ajax({
					type:'post',
					url: '<?php echo site_url('admin/KategoriUpdate')?>/'+id,
					dataType:'json',
					data:{nama:nama},
					success:function(data){
						UIkit.notification('Sukses terupdate', 'success');
						reload();
						$('#nama').val('');
					}
				})
				return false;
			}
		});
	});
</script>
<script>
	function reload(){
		$('#table').DataTable().ajax.reload();
	}

	function deleteKategori(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			$.ajax({
				type:'post',
				url: "<?php echo site_url('admin/KategoriDelete')?>/"+id,
				dataType:'json',
				success:function(data){
					UIkit.notification('Data terhapus', 'success');
					reload();
				}
			})
		}
	}

	function editKategori(id){
		$("#tambah").toggle();
		$("#btn_insert").hide();
		$("#btn_update").show();
		$("#datatable").toggle();
		$.ajax({
			url: "<?php echo site_url('admin/KategoriEdit')?>/"+id,
			type:'get',
			dataType:'json',
			success:function(data){
				$("#nama").val(data.nama);
				$("#id").val(data.id_kategori);
			}
		})
	}
</script>
<?php $this->load->view('admin/footer');?>
