<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Jenis Program</h6>
        </div>

        <div class="alert alert-info text-white" role="alert">
            <strong>Menu Jenis Program</strong> Berisi penjelasan blablabal.
        </div>
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1 mb-2" role="tablist">
                <?php foreach ($jenisProgram as $k => $jenis) : ?>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 <?= ($k == 0) ? 'active' : '' ?>" data-bs-toggle="tab" href="#tab-<?= $jenis['id'] ?>" role="tab" aria-controls="tab-control-<?= $jenis['id'] ?>" aria-selected="<?= ($k == 0) ? 'true' : 'false' ?>">
                            <?= $jenis['program'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <?php foreach ($jenisProgram as $k => $jenis) : ?>
                <div class="tab-pane fade  <?= ($k == 0) ? 'show active' : '' ?>" id="tab-<?= $jenis['id'] ?>" role="tabpanel" aria-labelledby="tab-control-<?= $jenis['id'] ?>">
                    <div class="card h-100">
                        <div class="card-header pb-2 p-3">
                            <div class="row">
                                <div class="col text-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0" btnCreatePs="<?= $jenis['id'] ?>">Tambah Program Seleksi</button>
                                </div>
                            </div>
                        </div>

                        <?php  ?>
                        <?php if (isset($jenisProgramDetail[$jenis['program']])) : ?>
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-<?= $jenis['id'] ?>">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konten</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jenisProgramDetail[$jenis['program']] as $k => $detail) : ?>
                                            <tr>
                                                <td class="w-20">
                                                    <div>
                                                        <a href="<?= base_url('show-image-landingpage/' . $detail['image_url']) ?>" data-lightbox="<?= $detail['id_pilihan'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $detail['image_url'])  ?>" alt=""></a>
                                                    </div>
                                                </td>
                                                <td class=""><?= $detail['keterangan'] ?></td>
                                                <td class="w-1"><a class="btn btn-sm btn-info" target="_blank" href="<?= base_url('detail-program-seleksi/' . $detail['id_pilihan']) ?>">Lihat konten</a></td>
                                                <td class="w-1">
                                                    <button btnUpdatePs="<?= $detail['id_pilihan'] ?>" class="btn btn-sm btn-warning">Ubah</button>
                                                    <button btnDeletePs="<?= $detail['id_pilihan'] ?>" class="btn btn-sm btn-danger">Hapus</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <div class="">
                                <h5 class="text-uppercase text-secondary text-xl text-center font-weight-bolder opacity-7 py-4 border rounded">Belum ada data</h5>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="<?= base_url('backend/js/datatables.js') ?>"></script>
<script>
    $(document).ready(function() {
        <?php foreach ($jenisProgram as $k => $jenis) : ?>
            if ($("#datatable-<?= $jenis['id'] ?>").length > 0) {
                const dataTable<?= $jenis['id'] ?> = new simpleDatatables.DataTable("#datatable-<?= $jenis['id'] ?>", {
                    searchable: false,
                    "bProcessing": true
                });
            }
        <?php endforeach ?>
        $('[btnCreatePs]').on('click', function(e) {
            modalCrud(
                'create',
                '<?= base_url('landingpage/jenis-program-detail/create/') ?>' + '/' + $(this).attr('btnCreatePs'),
                'Tambah Program Seleksi', {
                    size: MODAL_SIZE.XL
                }
            )
        });
        $('[btnUpdatePs]').on('click', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/jenis-program-detail/update') ?>' + '/' + $(this).attr('btnUpdatePs'),
                'Ubah Program Seleksi', {
                    size: MODAL_SIZE.XL,
                }
            )
        });
        $('[btnDeletePs]').on('click', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/jenis-program-detail/delete') ?>' + '/' + $(this).attr('btnDeletePs'),
                'Hapus Program Seleksi',
            )
        });
    })
</script>
<?php $this->endSection() ?>