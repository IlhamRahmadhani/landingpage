<?= $this->extend('backend/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Jenis Program</h6>
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
                    <div class="row mt-3">
                        <div class="col text-end">
                            <button class="btn btn-icon btn-3 btn-sm btn-outline-primary" btnCreatePs="<?= $jenis['id'] ?>" type="button">
                                <span class="btn-inner--icon"><i class="material-icons fs-6">add</i></span>
                                <span class="btn-inner--text">Tambah Program Seleksi</span>
                            </button>
                        </div>
                    </div>

                    <?php  ?>
                    <div class="row">
                        <?php if (isset($jenisProgramDetail[$jenis['program']])) : ?>
                            <div class="col-12">
                                <div class="card">
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
                                            <tbody id="content-jenisprogramdetail-<?= $jenis['id'] ?>">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
            ajaxLoadContent({
                    container: "#content-jenisprogramdetail-<?= $jenis['id'] ?>",
                    src: '<?= base_url('landingpage/jenis-program-detail/load-content/' . $jenis['id']) ?>',
                })
                .then(() => {
                    if ($("#datatable-<?= $jenis['id'] ?>").length > 0) {
                        const dataTable<?= $jenis['id'] ?> =
                            $("#datatable-<?= $jenis['id'] ?>").DataTable();
                    }
                })

        <?php endforeach ?>
        $(document).on('click', '[btnCreatePs]', function(e) {
            let container = "#content-jenisprogramdetail-" + $(this).attr('btnCreatePs');
            modalCrud(
                'create',
                '<?= base_url('landingpage/jenis-program-detail/create/') ?>' + '/' + $(this).attr('btnCreatePs'),
                'Tambah Program Seleksi', {
                    size: MODAL_SIZE.XL,
                    container: container,
                }
            )
        });
        $(document).on('click', '[btnUpdatePs]', function(e) {
            let container = "#content-jenisprogramdetail-" + $(this).attr('jenisprogram');
            modalCrud(
                'update',
                '<?= base_url('landingpage/jenis-program-detail/update') ?>' + '/' + $(this).attr('btnUpdatePs'),
                'Ubah Program Seleksi', {
                    size: MODAL_SIZE.XL,
                    container: container,

                }
            )
        });
        $(document).on('click', '[btnDeletePs]', function(e) {
            let container = "#content-jenisprogramdetail-" + $(this).attr('jenisprogram');
            modalCrud(
                'delete',
                '<?= base_url('landingpage/jenis-program-detail/delete') ?>' + '/' + $(this).attr('btnDeletePs'),
                'Hapus Program Seleksi', {
                    size: MODAL_SIZE.SMALL,
                    container: container,
                }
            )
        });
    })
</script>
<?php $this->endSection() ?>