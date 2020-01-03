<?php $this->load->view('admin/header');?>
<div class="main">
	<div class="uk-container">
		
		<h4>Artikel</h4>
		<br>
		
		<?php echo form_open_multipart('Admin/artikelUpdate/'.$artikel[0]->id_artikel); ?>
		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
			<label class="uk-form-label" for="form-stacked-text">Tampil</label>
			<label><input class="uk-radio" type="radio" name="status_tampil" value="1" <?php echo $artikel[0]->tampil == 1 ? 'checked' : ''?>>Ya</label>
			<label><input class="uk-radio" type="radio" name="status_tampil" value="0" <?php echo $artikel[0]->tampil == 0 ? 'checked' : ''?>>Tidak</label>
		</div>
		
		<button type="submit" id="btn_delete" class="uk-button uk-button-primary">Hapus</button>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-text">Judul</label>
			<div class="uk-form-controls">
				<input class="uk-input" name="judul" id="judul" value="<?php echo $artikel[0]->judul ?>" id="form-stacked-text" type="text" placeholder="Judul">
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-select">Kategori</label>
			<div class="uk-form-controls">
				<select name="kategori" id="kategori" class="uk-select" id="form-stacked-select">
					<option selected>- Pilih Kategori -</option>
					<?php foreach ($kategori->result() as $value): ?>
						<option value="<?php echo $value->id_kategori?>"><?php echo $value->nama?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-select">Isi</label>
			<div class="uk-form-controls">
				<textarea id="mytextarea" name="isi" id="isi" value="<?php echo $artikel[0]->isi?>"></textarea>
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-select">Foto</label>
			<div uk-form-custom="target: true">
				<input type="file" name="foto" id="foto">
				<input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-text">Sumber Artikel</label>
			<div class="uk-form-controls">
				<input class="uk-input" name="sumber" value="<?php echo $artikel[0]->sumber?>" id="sumber" id="form-stacked-text" type="text" placeholder="Link Artikel">
			</div>
		</div>

		<button type="submit" id="btn_insert" class="uk-button uk-button-primary">Update</button>
	</div>
	<br>
	<?php echo form_close()?>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		//getData();

		function getData(){
			$.ajax({
				type:'get',
				url:'<?php echo site_url('artikel/getIsiArtikel/'.$artikel[0]->id_artikel)?>',
				dataType:'json',
				success:function(data){
					var isi = '';					
					for(var i=0; i<data.length; i++){
						isi = data[i].id_artikel;
					}
					tinymce.activeEditor.setContent(isi);
				}
			})
		}

		$("input:radio[name=status_tampil]").change(function(){
			var status_tampil = $("input[name='status_tampil']:checked").val();
			var id_artikel = '<?php echo $artikel[0]->id_artikel;?>';
			$.ajax({
				type:'post',
				url:'<?php echo site_url('Artikel/ArtikelShow/')?>',
				dataType:'json',
				data: {"status_tampil":status_tampil,"id_artikel":id_artikel},
				success:function(data){
					if (status_tampil == 1) {
						UIkit.notification('Artikel Tampil', 'success');
					}else{
						UIkit.notification('Artikel Tidak Tampil', 'success');
					}
				}
			})
		});

		$('#btn_delete').on('click',function(){
			var id_artikel = '<?php echo $artikel[0]->id_artikel;?>';
			$.ajax({
				type:'post',
				url:'<?php echo site_url('Artikel/ArtikelDelete')?>',
				dataType:'json',
				data:{id_artikel:id_artikel},
				success:function(data){
					window.location = "<?php echo base_url('admin/ArtikelData')?>";
				}
			})
			return false;
		})

	});
</script>

<?php $this->load->view('admin/footer');?>
