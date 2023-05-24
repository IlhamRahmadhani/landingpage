<?= $this->extend('frontend\layout') ?>
<?= $this->section('content') ?>
<!-- 
<section class="hero">
    <div class="hero-content">
        <h1 class="hero-heading">Experience<br>The Real Things</h1>
    </div>
</section> -->
<style>
    /*! CSS Used from: http://landingpage-smart.test/frontend/assets/css/bootstrap.min.css */

    .carousel-caption-custom {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .carousel-caption-custom div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 50px;
        height: 550px;
    }

    .carousel-caption-custom div h1 {
        color: #85171a;
        font-size: 50px;
        font-weight: bold;
        margin: 0;
        margin-left: 91px;
    }
</style>

<?php if (!empty($banner)) : ?>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($banner as $k => $value) : ?>
                <?php
                $active = ($k == 0) ? 'active' : '';
                ?>
                <div class="carousel-item <?= $active ?>">
                    <div class="carousel-title"></div>
                    <img src="<?= base_url($value['image_url']) ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption-custom">
                        <div>
                            <h1>
                                <?= $value['judul'] ?>
                            </h1>
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
    </div>
<?php endif ?>
<div class="w3-bar w3-black tengah">
    <?php $jenisProgram = array_keys($pilihanProgramSeleksi); ?>
    <?php foreach ($jenisProgram as $k => $program) : ?>
        <?php $w3red = ($k == 0) ? 'w3-red' : ''; ?>
        <button class="w3-bar-item w3-button tablink <?= $w3red ?>" onclick="openCity(event,'<?= $program ?>')"><?= $program ?></button>
    <?php endforeach ?>
</div>
<div class="react_popular_topics pb---70">
    <div class="container">
        <div class="w3-container">
            <?php $i = 0; ?>
            <?php foreach ($pilihanProgramSeleksi as $program => $value) : ?>
                <?php
                $dnone = ($i != 0) ? 'display: none;' : '';
                $i++;
                ?>
                <div id="<?= $program ?>" class="w3-container w3-border city" style="<?= $dnone ?>">
                    <h2>Pilihan Program Seleksi</h2>
                    <div class="react_popular_topics pt---28 pb---70">
                        <div class="container">
                            <div class="row">
                                <?php foreach ($value as $kk => $pilihan) : ?>
                                    <div class="col-md-3">

                                   
                                        <a href="<?= base_url("detail-program-seleksi/$pilihan[id_pilihan]") ?>">
                                        
                                            <div class="item__inner">
                                                <div class="icon">
                                                    <img src="<?= base_url($pilihan['image_url']) ?>" alt="image">
                                                    
                                                </div>
                                                <div class="react-content">
                                                    <a href="<?= base_url("detail-program-seleksi/$pilihan[id_pilihan]") ?>" class="r__link"><?= $pilihan['keterangan'] ?></a>
                                                </div>
                                            </div>
                                            
                                        </a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>