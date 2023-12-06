<?= $this->extend('backend/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Fasilitas</h6>
        </div>
        <div class="row mb-3">
            <div class="col text-end">
                <button class="btn btn-icon btn-3 btn-sm btn-outline-primary mb-0" btnCreate type="button">
                    <span class="btn-inner--icon"><i class="material-icons fs-5">add</i></span>
                    <span class="btn-inner--text">Tambah Fasilitas</span>
                </button>
            </div>
        </div>
        <div class="row" id="content-fasilitas">
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        let container = "#content-fasilitas";
        ajaxLoadContent({
            container: container,
            src: '<?= base_url('landingpage/fasilitas/load-content') ?>',
        });
        $(document).on('click', '[btnCreate]', function(e) {
            modalCrud(
                'create',
                '<?= base_url('landingpage/fasilitas/create') ?>',
                'Tambah Fasilitas', {
                    container: container,
                }
            )
        });
        $(document).on('click', '[btnUpdate]', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/fasilitas/update') ?>' + '/' + $(this).attr('btnUpdate'),
                'Ubah Fasilitas', {
                    container: container,
                }
            )
        });
        $(document).on('click', '[btnDelete]', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/fasilitas/delete') ?>' + '/' + $(this).attr('btnDelete'),
                'Hapus Fasilitas', {
                    container: container,
                }
            )
        });
    })
</script>
<?php $this->endSection() ?>