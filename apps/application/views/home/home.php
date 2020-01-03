<?php $this->load->view('home/header');?>
<div class="uk-position-relative uk-visible-toggle" uk-slideshow="autoplay: true;finite:true;ratio: 8:3; animation: push">
    <ul class="uk-slideshow-items">
        <?php foreach ($arr_artikel_top4->result() as $value):?>
            <?php 
            $_judul = str_replace(' ', '-', $value->judul);
            $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
            $id_artikel = $value->id_artikel;
            $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));
            ?>                   
            <li>
                <img src="<?=base_url("assets/uploads")."/".$value->foto?>" alt="" uk-cover>
                <div class="uk-overlay uk-overlay-primary uk-position-bottom uk-text-center">
                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                        <h3 class="uk-margin-remove"><?php echo $value->judul?></h3>
                    </a>
                </div>
            </li>
        <?php endforeach?>
    </ul>

    <div class="uk-light">
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
</div>

<div class="uk-margin-medium-top uk-container uk-container-expand">
    <div id="sains">
        <h3>Sains</h3>
        <div class="row">
          <?php foreach ($arr_artikel_sains->result() as $value): ?>
            <?php 
            $_judul = str_replace(' ', '-', $value->judul);
            $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
            $id_artikel = $value->id_artikel;
            $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));                     
            ?>
            <div class="col-sm-12 col-lg-3">
                <div class="card h-100">
                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                        <img class="card-img-top" src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="<?php echo $value->judul?>">
                    </a>
                    <div class="card-body">
                        <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                            <p class="card-text"><?php echo $value->judul?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        </div>
    </div>

    <div class="uk-margin-medium-top" id="tekno">
        <h3>Tekno</h3>
        <div class="row">
          <?php foreach ($arr_artikel_tekno->result() as $value): ?>
            <?php 
            $_judul = str_replace(' ', '-', $value->judul);
            $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
            $id_artikel = $value->id_artikel;
            $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));                     
            ?>
            <div class="col-sm-12 col-lg-3">
                <div class="card h-100">
                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                        <img class="card-img-top" src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="<?php echo $value->judul?>">
                    </a>
                    <div class="card-body">
                        <a class="" href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                            <?php echo $value->judul?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        </div>
    </div>

    <div class="uk-margin-medium-top" id="bisnis">
        <h3>Bisnis</h3>
        <div class="row">
          <?php foreach ($arr_artikel_bisnis->result() as $value): ?>
            <?php 
            $_judul = str_replace(' ', '-', $value->judul);
            $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
            $id_artikel = $value->id_artikel;
            $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));                     
            ?>
            <div class="col-sm-12 col-lg-3">
                <div class="card h-100">
                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                        <img class="card-img-top" src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="<?php echo $value->judul?>">
                    </a>
                    <div class="card-body">
                        <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                            <p class="card-text"><?php echo $value->judul?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        </div>
    </div>

    <div class="uk-margin-medium-top" id="tokoh">
        <h3>Tokoh</h3>
        <div class="row">
          <?php foreach ($arr_artikel_tokoh->result() as $value): ?>
            <?php 
            $_judul = str_replace(' ', '-', $value->judul);
            $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
            $id_artikel = $value->id_artikel;
            $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));                     
            ?>
            <div class="col-sm-12 col-lg-3">
                <div class="card h-100">
                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                        <img class="card-img-top" src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="<?php echo $value->judul?>">
                    </a>
                    <div class="card-body">
                        <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                            <p class="card-text"><?php echo $value->judul?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        </div>
    </div>

    <div class="uk-margin-medium-top" id="ulasan">
        <h3>Ulasan</h3>
        <div class="row">
          <?php foreach ($arr_artikel_ulasan->result() as $value): ?>
            <?php 
            $_judul = str_replace(' ', '-', $value->judul);
            $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
            $id_artikel = $value->id_artikel;
            $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));                     
            ?>
            <div class="col-sm-12 col-lg-3">
                <div class="card h-100">
                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                        <img class="card-img-top" src="<?=base_url("assets/uploads")."/".$value->foto_thumbnail?>" alt="<?php echo $value->judul?>">
                    </a>
                    <div class="card-body">
                        <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                            <p class="card-text"><?php echo $value->judul?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        </div>
    </div>
</div>
<br>
<!-- <div class="uk-background-muted uk-padding uk-panel">
    <blockquote cite="#">
        <p class="uk-margin-small-bottom">The blockquote element represents content that is quoted from another source, optionally with a citation which must be within a footer or cite element.</p>
        <footer>Someone famous in <cite><a href="#">Source Title</a></cite></footer>
    </blockquote>
</div>
-->
<?php $this->load->view('home/footer');?>