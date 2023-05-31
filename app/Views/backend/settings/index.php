<?php
$settings = SETTINGS;

?>
<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Pengaturan</h6>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="button" class="btn btn-outline-primary btn-sm mb-0" btnSave>Simpan Konten</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form formSave method="POST" action="<?= base_url('landingpage/settings/save') ?>" role="form">
                            <div class="input-group input-group-outline mb-3 <?= (isset($settings['email']) ? 'is-filled' : '') ?>">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $settings['email'] ?? '' ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3 <?= (isset($settings['telephone']) ? 'is-filled' : '') ?>">
                                <label class="form-label">Telephone</label>
                                <input type="text" class="form-control" name="telephone" value="<?= $settings['telephone'] ?? '' ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3 <?= (isset($settings['facebook']) ? 'is-filled' : '') ?>">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="<?= $settings['facebook'] ?? '' ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3 <?= (isset($settings['twitter']) ? 'is-filled' : '') ?>">
                                <label class="form-label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="<?= $settings['twitter'] ?? '' ?>">
                            </div>
                            <div class="input-group input-group-outline mb-3 <?= (isset($settings['linkedin']) ? 'is-filled' : '') ?>">
                                <label class="form-label">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" value="<?= $settings['linkedin'] ?? '' ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>
    <?= $this->section('js') ?>
    <script>
        $(document).ready(function() {
            $('[btnSave]').on('click', function(e) {
                const $form = $('[formSave]');
                console.log($form);
                ajax($form.attr('action'), $form.attr('method'), new FormData($form[0]));
            });
        })
    </script>
    <?php $this->endSection() ?>