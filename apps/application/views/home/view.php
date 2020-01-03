<?php $this->load->view('home/header');?>
<div class="mt-lg-5 container">
	<br>
	<?php foreach ($arr_artikel->result() as $value):?>
		<?php 
		$tgl = date("F j, Y",strtotime($value->tgl_dibuat));
		?>
		<div class="row">
			<div class="col-9">
				<h1 class="font-weight-bold"><?php echo $value->judul?></h1>
				<p  style="font-size:13px;color:#9f9f9f"><?php echo $tgl?></p>
				<div class="container mb-lg-5">
					<img src="<?=base_url("assets/uploads")."/".$value->foto?>">
				</div>
				<?php echo $value->isi?>
			<?php endforeach?>
			<hr>
			<div>
				<p><b>Tags</b></p>
				<a href="<?php echo site_url('tekno')?>"><span style="font-size:11px" class="uk-badge">Tekno</span></a>
			</div>
			<hr>
			<div>
				<a href="#" uk-icon="icon: facebook"></a>
				<a href="#" uk-icon="icon: google"></a>
				<a href="#" uk-icon="icon: twitter"></a>
				<a href="#" uk-icon="icon: pinterest"></a>
			</div>
		</div>

		<!-- artikel kanan -->
		<div class="uk-padding-remove col">
			<?php foreach ($arr_artikeltop4all->result() as $value):?>
				<?php 
				$_tgl = date("F j, Y",strtotime($value->tgl_dibuat)); 
				$isi = substr($value->isi , 0, 200);
				$_judul = str_replace(' ', '-', $value->judul);
				$judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
				$id_artikel = $value->id_artikel;
				$tgl = date("Y/m/d",strtotime($value->tgl_dibuat));   
				?>
				<div style="border: 0;" class="card bg-dark">
					<img class="card-img" src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="Card image">
					<div class="card-img-overlay">
						<br><br><br>
						<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
							<h5 style="font-size: 17px" class="text-white card-title"><?php echo $value->judul?></h5>
						</a>
						<p class="text-white" style="font-size: 14px"><?php echo $_tgl?></p>
					</div>
				</div>
				<br>
			<?php endforeach;?>

		</div>
	</div>	
</div>
<?php $this->load->view('home/footer');?>