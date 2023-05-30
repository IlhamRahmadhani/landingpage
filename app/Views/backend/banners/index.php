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
        <div class="alert alert-info text-white" role="alert">
            <strong>Menu Banners</strong> digunakan untuk menambah, merubah serta menghapus gambar berjalan yang terdapat di halaman landing page.
        </div>

        <div class="card h-100">
            <div class="card-header pb-2 p-3">
                <div class="row">
                    <div class="col text-end">
                        <button class="btn btn-outline-primary btn-sm mb-0" btnCreate>Tambah Banner</button>
                    </div>
                </div>
            </div>

            <div class="card-body p-3 pb-0">
                <div class="row">
                    <?php if (count($banners) > 0) : ?>
                        <?php foreach ($banners as $k => $value) : ?>
                            <!--ADD CLASSES HERE d-flex align-items-stretch-->
                            <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <a href="<?= base_url("show-image-landingpage/$value[image_url]") ?>" data-lightbox="<?= $value['id'] ?>"><img class="img-backend" src="<?= base_url("show-image-landingpage/$value[image_url]") ?>" alt="Card Image"></a>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title py-4"><?= html_entity_decode($value['judul']) ?></h5>
                                        <div class="d-flex justify-content-center gap-2 mt-auto">
                                            <a href="javascript:;" btnUpdate="<?= $value['id'] ?>" class="btnUpdate btn btn-warning mt-auto align-self-start">Update</a>
                                            <a href="javascript:;" btnDelete="<?= $value['id'] ?>" class="btnDelete btn btn-danger mt-auto align-self-start">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="">
                            <h5 class="text-uppercase text-secondary text-xl text-center font-weight-bolder opacity-7 py-4 border rounded">Belum ada data</h5>
                        </div>
                    <?php endif ?>
                </div>
            </div>
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
            )
        });
        $('[btnUpdate]').on('click', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/banners/update') ?>' + '/' + $(this).attr('btnUpdate'),
                'Ubah Banner',
            )
        });
        $('[btnDelete]').on('click', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/banners/delete') ?>' + '/' + $(this).attr('btnDelete'),
                'Hapus Banner',
            )
        });
    })
</script>
<?php $this->endSection() ?>