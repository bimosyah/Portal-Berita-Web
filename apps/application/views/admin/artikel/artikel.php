<?php $this->load->view('admin/header');?>
<div class="main">
	<div class="uk-container">
		
		<h4>Artikel</h4>
		<br>
		<?php echo validation_errors();?>
		<?php echo form_open_multipart('Admin/ArtikelInsert'); ?>
		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-text">Judul</label>
			<div class="uk-form-controls">
				<input class="uk-input" name="judul" id="judul" id="form-stacked-text" type="text" placeholder="Judul">
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-select">Kategori</label>
			<div class="uk-form-controls">
				<select name="kategori" id="kategori" class="uk-select" id="form-stacked-select">
					<option selected>- Pilih Kategori -</option>
					<?php foreach ($artikel->result() as $value): ?>
						<option value="<?php echo $value->id_kategori?>"><?php echo $value->nama?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>

		<div class="uk-margin">
			<label class="uk-form-label" for="form-stacked-select">Isi</label>
			<div class="uk-form-controls">
				<textarea id="mytextarea" name="isi" id="isi"></textarea>
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
				<input class="uk-input" name="sumber" id="sumber" id="form-stacked-text" type="text" placeholder="Link Artikel">
			</div>
		</div>

		<button type="submit" id="btn_insert" class="uk-button uk-button-primary">Save</button>
	</div>
	<br>
	<?php echo form_close()?>
</div>
<?php $this->load->view('admin/footer');?>
