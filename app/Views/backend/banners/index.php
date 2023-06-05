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
        <div class="row mt-5" id="content-banner">
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        let container = '#content-banner';

        ajaxLoadContent({
            container: container,
            src: '<?= base_url('landingpage/banners/load-content') ?>',
        });
        
        $(document).on('click', '[btnCreate]', function(e) {
            modalCrud(
                'create',
                '<?= base_url('landingpage/banners/create') ?>',
                'Tambah Banner', {
                    size: MODAL_SIZE.LARGE,
                    container: container,
                }
            )
        });
        $(document).on('click', '[btnUpdate]', function(e) {
            modalCrud(
                'update',
                '<?= base_url('landingpage/banners/update') ?>' + '/' + $(this).attr('btnUpdate'),
                'Ubah Banner', {
                    size: MODAL_SIZE.LARGE,
                    container: container,
                }
            )
        });
        $(document).on('click', '[btnDelete]', function(e) {
            modalCrud(
                'delete',
                '<?= base_url('landingpage/banners/delete') ?>' + '/' + $(this).attr('btnDelete'),
                'Hapus Banner', {
                    size: MODAL_SIZE.SMALL,
                    container: container,
                }
            )
        });
    })
</script>
<?php $this->endSection() ?>