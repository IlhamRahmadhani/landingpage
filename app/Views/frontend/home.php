<?php $this->setVar('showFixedButton', true) ?>
<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>
<?php if (!empty($banner)) : ?>

    <style>
        .glide {
            max-width: 100%;
        }

        .glide__slide--active {
            z-index: 1;
        }
    </style>

    <div class="glide">
        <div class="glide__track" data-glide-el="track">
            <div class="glide__slides">
                <?php foreach ($banner as $k => $value) : ?>
                    <?php
                    $active = ($k == 0) ? 'active' : '';
                    ?>
                    <div class="glide__slide" style="margin-bottom: -1px;">
                        <div class="carousel-title"></div>
                        <img src="<?= base_url('show-image-landingpage/' . $value['image_url']) ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption-custom">
                            <div class="carousel-caption-custom-title">
                                <?= html_entity_decode($value['judul']) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="glide__arrows" data-glide-el="controls">

            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                <svg xmlns="http://www.w3.org/2000/svg" width="10.605" height="15.555" viewBox="0 0 10.605 15.555">
                    <polygon points="10.605 12.727 5.656 7.776 10.605 2.828 7.777 0 0 7.776 7.777 15.555 10.605 12.727" fill="#ffffff" />
                </svg>
            </button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                <svg xmlns="http://www.w3.org/2000/svg" width="10.605" height="15.555" viewBox="0 0 10.605 15.555">
                    <polygon points="2.828 15.555 10.605 7.776 2.828 0 0 2.828 4.949 7.776 0 12.727 2.828 15.555" fill="#ffffff" />
                </svg>
            </button>
        </div>

    </div>
    <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($banner as $k => $value) : ?>
                <?php
                $active = ($k == 0) ? 'active' : '';
                ?>
                <div class="carousel-item <?= $active ?>" data-bs-interval="10000">
                    <div class="carousel-title"></div>
                    <img src="<?= base_url('show-image-landingpage/' . $value['image_url']) ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption-custom">
                        <div class="carousel-caption-custom-title">
                            <?= html_entity_decode($value['judul']) ?>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
        <?php if (count($banner) > 1) : ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        <?php endif ?>
    </div> -->


<?php endif ?>
<div class="w3-bar w3-black tengah">
    <?php foreach ($jenisProgram as $k => $jenis) : ?>
        <?php $w3red = ($k == 0) ? 'w3-red' : ''; ?>
        <button class="w3-bar-item w3-button tablink <?= $w3red ?>" onclick="openCity(event,'<?= $jenis['program'] ?>')"><?= $jenis['program'] ?></button>
    <?php endforeach ?>
</div>
<div class="react_popular_topics pb---70">
    <div class="container">
        <div class="w3-container">
            <?php $i = 0; ?>
            <?php foreach ($jenisProgram as $k => $jenis) : ?>
                <?php
                $dnone = ($i != 0) ? 'display: none;' : '';
                $i++;
                ?>
                <div id="<?= $jenis['program'] ?>" class="w3-container w3-border city" style="<?= $dnone ?>">
                    <h2>Pilihan Program Seleksi</h2>
                    <div class="react_popular_topics pt---28 pb---70">
                        <div class="container">
                            <div class="row">
                                <?php if (isset($jenisProgramDetail[$jenis['program']])) : ?>
                                    <?php foreach ($jenisProgramDetail[$jenis['program']] as $kk => $pilihan) : ?>
                                        <div class="col-md-3">


                                            <a href="<?= $pilihan['content'] == '' ? 'javascript:;' : base_url("detail-program-seleksi/$pilihan[id_pilihan]") ?>">

                                                <div class="item__inner">
                                                    <div class="icon">
                                                        <img src="<?= base_url('show-image-landingpage/' . $pilihan['image_url']) ?>" alt="image">

                                                    </div>
                                                    <?php if ($pilihan['keterangan'] != '') : ?>
                                                        <div class="react-content">
                                                            <a href="javascript:;" class="r__link"><?= $pilihan['keterangan'] ?></a>
                                                        </div>
                                                    <?php endif ?>
                                                </div>

                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
