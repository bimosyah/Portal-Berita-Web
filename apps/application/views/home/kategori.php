<?php $this->load->view('home/header');?>
<div class="mt-lg-5 uk-container uk-container-expand">
	<br>
	<div class="row">
		<div class="col-9">
			<div class="row">
				<!-- headline -->
				<div class="col-6">
					<?php foreach ($arr_artikeltop->result() as $value):?>
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
								<span class="uk-label uk-label-success">Headline</span>
								<br><br><br><br><br><br><br> 
								<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
									<h3 class="text-white card-title"><?php echo $value->judul?></h3>
								</a>
								<p class="text-white" style="font-size: 15px"><?php echo $_tgl?></p>
							</div>
						</div>
					<?php endforeach;?>
				</div>

				<!-- sub headline -->
				<div class="col-6">
					<?php $i =0;?>
					<?php foreach ($arr_artikeltopsub->result() as $value):?>
						<?php 
						$_tgl = date("F j, Y",strtotime($value->tgl_dibuat)); 
						$isi = substr($value->isi , 0, 200);
						$_judul = str_replace(' ', '-', $value->judul);
						$judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
						$id_artikel = $value->id_artikel;
						$tgl = date("Y/m/d",strtotime($value->tgl_dibuat));   
						?>
						<div class="<?php echo $i>0 ? "mt-lg-4":"" ?> uk-flex-top" uk-grid>
							<div class="uk-width-2-3@m">
								<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
									<h2 style="font-size: 15px"><?php echo $value->judul?></h2>
								</a>
								<p style="font-size: 13px"><?php echo $_tgl?></p>
							</div>
							<div class="uk-width-1-3@m uk-flex-first">
								<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
									<img src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="Image">
								</a>
							</div>
						</div>
						<?php 
						$i++;
					endforeach;?>
				</div>
			</div>
			<hr>

			<!-- artikel bawah -->
			<?php foreach ($arr_artikel->result() as $value):?>
				<?php 
				$_tgl = date("F j, Y",strtotime($value->tgl_dibuat)); 
				$isi = substr($value->isi , 0, 200);
				$_judul = str_replace(' ', '-', $value->judul);
				$judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
				$id_artikel = $value->id_artikel;
				$tgl = date("Y/m/d",strtotime($value->tgl_dibuat));  

				?>
				<div class="uk-flex-top" uk-grid>
					<div class="uk-width-2-3@m">
						<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
							<h2 style="font-size: 20px"><?php echo $value->judul?></h2>
						</a>
						<p><?php echo $_tgl?></p>
						<p><?php echo strip_tags($isi)."...";?></p>
						<div>
							<a href="#" uk-icon="icon: facebook"></a>
							<a href="#" uk-icon="icon: google"></a>
							<a href="#" uk-icon="icon: twitter"></a>
							<a href="#" uk-icon="icon: pinterest"></a>
						</div>
					</div>
					<div class="uk-width-1-3@m uk-flex-first">
						<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
							<img src="<?=base_url("assets/uploads")."/".$value->foto?>" alt="Image">
						</a>
					</div>
				</div>
				<hr>	
				<br>
			<?php endforeach?>
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
					<img class="card-img"  src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="Card image">
					<div class="card-img-overlay">
						<br><br><br><br>
						<a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
							<h5 class="text-white card-title"><?php echo $value->judul?></h5>
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