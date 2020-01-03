<!DOCTYPE html>
<html>
<head>
	<title>Nama Aplikasi</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.min.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/whole.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sidenav.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/navbar.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/content.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/open-iconic/font/css/open-iconic-bootstrap.css')?>">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/js/uikit.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/uikit-icons.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/tinymce/tinymce.min.js') ?>"></script>
	<script>
		tinymce.init({
			selector: '#mytextarea',
			height: 300,
			plugins: [
			'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
			'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
			'save table contextmenu directionality emoticons template paste textcolor'
			],
			
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		});
	</script>
</head>
<body>
	<nav class="uk-navbar-container" uk-navbar>
		<div class="uk-navbar-left">
			<ul class="uk-navbar-nav ">
				<li class="uk-active"><a style="margin-left: 350px;font-size: 30px" href="#">Web Admin</a></li>
			</ul>
		</div>
	</nav>

	<div class="sidenav">
		<ul class="uk-nav-primary uk-nav-parent-icon" uk-nav>
			<li class="uk-text-small">
				<a style="font-size:17px" href="<?php echo site_url('admin/dashboard')?>">Dashboard</a>
			</li>
			
			<!-- <li class="uk-parent uk-text-small">
				<a style="font-size:17px">Aplikasi</a>
				<ul class="uk-nav-sub uk-iconnav uk-iconnav-vertical">
					<li>
						<a href="<?php // echo site_url('admin/Aplikasi')?>" class="uk-link-reset" >
							<span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span> 
							<span class="uk-text-middle">Aplikasi</span>
						</a>
					</li>
				</ul>		
			</li>	 -->		

			<li class="uk-parent uk-text-small">
				<a style="font-size:17px">Artikel</a>
				<ul class="uk-nav-sub uk-iconnav uk-iconnav-vertical">
					<li>
						<a href="<?php echo site_url('admin/Artikel')?>" class="uk-link-reset" >
							<span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span> 
							<span class="uk-text-middle">Daftar Artikel</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('admin/ArtikelData')?>" class="uk-link-reset" >
							<span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span> 
							<span class="uk-text-middle">Edit Artikel</span>
						</a>
					</li>
				</ul>		
			</li>			

			<li class="uk-parent uk-text-small">
				<a style="font-size:17px">Kategori</a>
				<ul class="uk-nav-sub uk-iconnav uk-iconnav-vertical">
					<li>
						<a href="<?php echo site_url('admin/Kategori')?>" class="uk-link-reset" >
							<span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span> 
							<span class="uk-text-middle">Daftar Kategori</span>
						</a>
					</li>
				</ul>		
			</li>

			<li class="uk-parent uk-text-small">
				<a style="font-size:17px">Laporan</a>
				<ul class="uk-nav-sub uk-iconnav uk-iconnav-vertical">
					<li>
						<a href="<?php echo site_url('admin/Laporan')?>" class="uk-link-reset" >
							<span uk-icon="icon: plus" class="uk-margin-small-right uk-icon"></span> 
							<span class="uk-text-middle">Laporan</span>
						</a>
					</li>
				</ul>		
			</li>

			<li class="uk-text-small">
				<a href="<?php echo site_url('Login/Logout')?>" style="font-size:17px">Logout</a>
			</li>

		</ul>
	</div>