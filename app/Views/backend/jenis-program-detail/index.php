<?= $this->extend('backend/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Banners</h6>
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
                    <?php foreach ($banners as $k => $value) : ?>
                        <!--ADD CLASSES HERE d-flex align-items-stretch-->
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card">
                                <img src="<?= base_url("show-image-landingpage/$value[image_url]") ?>" class="card-img-top viewerjs" alt="Card Image">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title py-4"><?= html_entity_decode($value['judul']) ?></h5>
                                    <div class="d-flex justify-content-between mt-auto">
                                        <a href="javascript:;" btnUpdate="<?= $value['id'] ?>" class="btnUpdate btn btn-warning mt-auto align-self-start">Update</a>
                                        <a href="javascript:;" btnDelete="<?= $value['id'] ?>" class="btnDelete btn btn-danger mt-auto align-self-start">Delete</a>
                                        <a href="javascript:;" class="btn btn-success mt-auto align-self-start">ACTIVE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '[btnCreate]', function(e) {
            modalCrud(
                'create',
                '<?= base_url('landingpage/banners/create') ?>',
                'Tambah Banner',
            )
        });
        $(document).on('click', '[btnUpdate]', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/banners/update') ?>' + '/' + $(this).attr('btnUpdate'),
                'Ubah Banner',
            )
        });
        $(document).on('click', '[btnDelete]', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/banners/delete') ?>' + '/' + $(this).attr('btnDelete'),
                'Hapus Banner',
            )
        });
    })
</script>
<?php $this->endSection() ?>