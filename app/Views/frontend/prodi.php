<?php $this->setVar('disableSticky', true); ?>
<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>
<div class="react-wrapper-inner">
    <div class="react-breadcrumbs">
        <div class="instructors___page pt---120 pb---140">
            <div class="container pb---60">
                <div class="row justify-content-center">
                    <?php foreach ($prodi as $k => $value) : ?>
                        <div class="col-lg-3">
                            <div class="instructor__content prodi">
                                <div class="instructor__image">
                                    <img src="<?= base_url('show-image-landingpage/' . $value['image_url']) . '/prodi' ?>" style="cursor:zoom-in" onclick="document.getElementById('modal-image-<?= $k ?>').style.display='block'">
                                    <div id="modal-image-<?= $k ?>" class="w3-modal" onclick="this.style.display='none'">
                                        <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
                                        <div class="w3-modal-content w3-animate-zoom">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?= $value['description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content prodi">
                                <div class="text-center">
                                    <h4><a href="#" style="color:#000;"><?= $value['judul'] ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>