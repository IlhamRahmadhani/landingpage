<?= $this->extend('backend\layout') ?>
<?= $this->section('css') ?>
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Banners</h5>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-icon btn-3 btn-sm btn-outline-primary mb-0" btnCreate type="button">
                    <span class="btn-inner--icon"><i class="material-icons fs-5">add</i></span>
                    <span class="btn-inner--text">Tambah Banner</span>
                </button>
            </div>
        </div>
        <div class="row mt-5">
            <?php if (count($banners) > 0) : ?>
                <?php foreach ($banners as $k => $value) : ?>
                    <!--ADD CLASSES HERE d-flex align-items-stretch-->
                    <div class="col-lg-6 mb-3 <?= !in_array($k, [0, 1]) ? 'mt-5' : '' ?> d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image" href="<?= base_url("show-image-landingpage/$value[image_url]") ?>" data-lightbox="<?= $value['id'] ?>">
                                    <img src="<?= base_url("show-image-landingpage/$value[image_url]") ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                                <div class="colored-shadow" style="background-image: url(&quot;<?= base_url("show-image-landingpage/$value[image_url]") ?>&quot;);"></div>
                            </div>
                            <div class="card-body py-2">
                                <h5 class="card-title py-4"><?= html_entity_decode($value['judul']) ?></h5>
                            </div>

                            <hr class="dark horizontal my-0">
                            <div class="card-footer d-flex flex-column pb-0">
                                <div class="d-flex justify-content-center mt-auto gap-2">
                                    <button class="btn btn-icon btn-3 btn-sm btn-outline-warning" btnUpdate="<?= $value['id'] ?>" type="button">
                                        <span class="btn-inner--icon"><i class="material-icons fs-6">mode_edit</i></span>
                                        <span class="btn-inner--text">Ubah</span>
                                    </button>
                                    <button class="btn btn-icon btn-3 btn-sm btn-outline-danger" btnDelete="<?= $value['id'] ?>" type="button">
                                        <span class="btn-inner--icon"><i class="material-icons fs-6">delete</i></span>
                                        <span class="btn-inner--text">Hapus</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <div class="col">
                    <div class="card border">
                        <div class="card-body">
                            <h5 class="text-uppercase text-secondary text-xl text-center font-weight-bolder opacity-7 py-4 rounded">Belum ada data</h5>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        $('[btnCreate]').on('click', function(e) {
            modalCrud(
                'create',
                '<?= base_url('landingpage/banners/create') ?>',
                'Tambah Banner',
                {size: MODAL_SIZE.LARGE}
            )
        });
        $('[btnUpdate]').on('click', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/banners/update') ?>' + '/' + $(this).attr('btnUpdate'),
                'Ubah Banner',
                {size: MODAL_SIZE.LARGE}
            )
        });
        $('[btnDelete]').on('click', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/banners/delete') ?>' + '/' + $(this).attr('btnDelete'),
                'Hapus Banner',
                {size: MODAL_SIZE.LARGE}
            )
        });
    })
</script>
<?php $this->endSection() ?>