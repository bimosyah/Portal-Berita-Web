<div class="uk-margin-medium-top" id="tekno">
        <h3>Tekno</h3>
        <div uk-slider="finite: true">
            <div class="uk-position-relative uk-visible-toggle uk-light">
                <ul class="uk-slider-items uk-child-width-1-3@s uk-grid">
                    <?php foreach ($arr_artikel_tekno->result() as $value): ?>
                        <?php 
                        $_judul = str_replace(' ', '-', $value->judul);
                        $judul = preg_replace('/[^A-Za-z0-9\-]/', '', $_judul);
                        $id_artikel = $value->id_artikel;
                        $tgl = date("Y/m/d",strtotime($value->tgl_dibuat));                     
                        ?>
                        <li>
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-media-top">
                                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                                        <img style="width: 600;height:400" src="<?=base_url("assets/uploads")."/".$value->foto?>">
                                    </a>
                                </div>
                                <div class="uk-padding-small uk-card-body">
                                    <a href="<?php echo site_url('/').$tgl.'/'.$id_artikel.'/'.$judul?>">
                                        <h3 class="uk-card-title"><?php echo $value->judul?></h3>
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach?>
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

            </div>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

        </div>
    </div>