<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.min.css') ?>" />
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="main">
		<div class="uk-container">
			<div id="error">
				
			</div>
			<div class="card mx-auto my-lg-5" style="width: 25rem;">
				<div class="card-header">
					Login
				</div>
				<div class="card-body">
					<div class="form-group">
						<input type="text" name="username" class="form-control" id="username" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="text" name="password" class="form-control" id="password" placeholder="Password">
					</div>
					<input type="submit" id="btn_login" class="btn btn-primary btn-block" id="" value="Login">
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('#btn_login').on('click',function(){
			var user = $('#username').val();
			var pass = $('#password').val();

			if (user == '' || pass == '') {
				document.getElementById("error").innerHTML = '<div data-dismiss="alert" style="width: 25rem"; class="alert alert-danger alert-dismissible fade show mx-auto my-lg-5" role="alert"><strong>Gagal !</strong> Cek username dan password anda.<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'; 
			}else{
				$.ajax({
				type:'post',
				url:'<?php echo site_url('login/cekLogin')?>',
				dataType:'json',
				data:{user:user,pass:pass},
				success:function(data){
					window.location = "<?php echo site_url('admin/dashboard') ?>";
				},
				error:function(data){
					document.getElementById("error").innerHTML = '<div data-dismiss="alert" style="width: 25rem"; class="alert alert-danger alert-dismissible fade show mx-auto my-lg-5" role="alert"><strong>Gagal !</strong> Cek username dan password anda.<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'; 
				}
			})
			}
			
		})
	</script>
</body>
</html>


