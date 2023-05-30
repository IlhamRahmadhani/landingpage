<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Fasilitas</h6>
        </div>
        <div class="alert alert-info text-white" role="alert">
            <strong>Menu Fasilitas</strong> Berisi penjelasan blablabal.
        </div>
        <div class="card h-100">
            <div class="card-header pb-2 p-3">
                <div class="row">
                    <div class="col text-end">
                        <button class="btn btn-outline-primary btn-sm mb-0" btnCreate>Tambah Fasilitas</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-0">
                <div class="row">
                    <?php foreach ($fasilitas as $k => $value) : ?>
                        <!--ADD CLASSES HERE d-flex align-items-stretch-->
                        <div class="col-lg-4 mb-3 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="d-flex gap-2">
                                    <div class="flex-even">
                                        <a href="<?= base_url('show-image-landingpage/' . $value['image_url']) ?>" data-lightbox="<?= $value['id'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $value['image_url'])  ?>" alt=""></a>
                                    </div>
                                    <div class="flex-even">
                                        <a href="<?= base_url('show-image-landingpage/' . $value['image_detail_url']) ?>" data-lightbox="detail-<?= $value['id'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $value['image_detail_url'])  ?>" alt=""></a>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <p class="card-title py-4 fw-bold"><?= ($value['judul']) ?></p>
                                    <div class="d-flex justify-content-center mt-auto gap-2">
                                        <a href="javascript:;" btnUpdate="<?= $value['id'] ?>" class="btnUpdate btn btn-warning mt-auto align-self-start">Update</a>
                                        <a href="javascript:;" btnDelete="<?= $value['id'] ?>" class="btnDelete btn btn-danger mt-auto align-self-start">Delete</a>
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
        $('[btnCreate]').on('click', function(e) {
            modalCrud(
                'create',
                '<?= base_url('landingpage/fasilitas/create') ?>',
                'Tambah Fasilitas',
            )
        });
        $('[btnUpdate]').on('click', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/fasilitas/update') ?>' + '/' + $(this).attr('btnUpdate'),
                'Ubah Fasilitas',
            )
        });
        $('[btnDelete]').on('click', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/fasilitas/delete') ?>' + '/' + $(this).attr('btnDelete'),
                'Hapus Fasilitas',
            )
        });
    })
</script>
<?php $this->endSection() ?>