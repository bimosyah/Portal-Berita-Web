<!DOCTYPE html>
<html>
<head>
    <title>Nama Aplikasi</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/uikit.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/whole.css') ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="<?php echo base_url('assets/js/uikit.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/uikit-icons.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="uikit/dist/js/uikit-icons.min.js"></script>

</head>
<body>
    <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid">
            <div id="">
                <a id="nama_aplikasi" class="text-white navbar-brand" href="<?php echo site_url('')?>">
                    Aplikasi
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="text-white nav-link" href="<?php echo site_url('sains')?>">Sains</a>
                    </li>
                    <li class="nav-item">
                        <a class=" text-white nav-link" href="<?php echo site_url('tekno')?>">Tekno</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="<?php echo site_url('bisnis')?>">Bisnis</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="<?php echo site_url('tokoh')?>">Tokoh</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white nav-link" href="<?php echo site_url('ulasan')?>">Ulasan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#nama_aplikasi').innerHTML = 'jknjn';
          // getData();

          function getData(){
            $.ajax({
                type:'get',
                url:'<?php echo site_url('aplikasi')?>',
                dataType:'json',
                success:function(data){
                    var nama = '';
                    var slogan = '';
                                for(var i=0; i<data.length; i++){
                        nama = data[i].nama;
                        slogan = data[i].slogan;
                    }
                    $('#nama_aplikasi').innerHTML = 'jknjn';
                }
            })
        }
    })
</script>