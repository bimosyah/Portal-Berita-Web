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
		<h4>Aplikasi</h4>
		<form class="uk-form-horizontal">

			<div class="uk-margin">
				<label class="uk-form-label" for="form-horizontal-text">Nama Aplikasi</label>
				<div class="uk-form-controls">
					<input name="nama" id="nama" disabled class="uk-input" id="form-horizontal-text" type="text">
				</div>
			</div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-horizontal-text">Slogan</label>
				<div class="uk-form-controls">
					<input name="slogan" id="slogan" disabled class="uk-input" id="form-horizontal-text" type="text">
				</div>
			</div>
		</form>
		<button onclick="myFunction()" class="uk-button uk-button-default">Enable</button>
		<button type="submit" id="btn_update" class="uk-button uk-button-primary">Save</button>
	</div>
</div>
<script type="text/javascript">
	function myFunction() {
		document.getElementById("nama").disabled = false;
		document.getElementById("slogan").disabled = false;
	}

	$(document).ready(function(){
		getData();
		
		function getData(){
			$.ajax({
				type:'get',
				url:'<?php echo site_url('admin/AplikasiRead')?>',
				dataType:'json',
				success:function(data){
					var nama = '';
					var slogan = '';
					            for(var i=0; i<data.length; i++){
						nama = data[i].nama;
						slogan = data[i].slogan;
					}
					$('#nama').val(nama);
					$('#slogan').val(slogan);
				}
			})
		}

		function myFunction2() {
			document.getElementById("nama").disabled = true;
			document.getElementById("slogan").disabled = true;
		}

		$('#btn_update').on('click',function(){
			var nama = $('#nama').val();
			var slogan = $('#slogan').val();
			var notifications = UIkit.notification('Sukses tersimpan', 'success');
			$.ajax({
				type:'post',
				url:'<?php echo site_url('admin/AplikasiUpdate')?>',
				dataType:'json',
				data:{nama:nama,slogan:slogan},
				success:function(data){
					getData();
					UIkit.notification('Sukses tersimpan', 'success');
					document.getElementById("nama").disabled = true;
					document.getElementById("slogan").disabled = true;
				}
			})
			return false;
		})
	})
</script>
<?php $this->load->view('admin/footer');?>
