<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Kontak Kami</h6>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-icon btn-3 btn-sm btn-outline-primary mb-0" btnSave type="button">
                    <span class="btn-inner--icon"><i class="material-icons fs-5">save</i></span>
                    <span class="btn-inner--text">Simpan Konten</span>
                </button>
            </div>
        </div>
        <div class="mt-3">
            <form method="POST" formSave action="<?= base_url('landingpage/kontak-kami/save') ?>">
                <textarea name="content" id="content" style="visibility: hidden;"></textarea>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        initTinymce("#content", `<?= html_entity_decode($kontakKami['content']) ?>`, {
            height: 600
        })
        $(document).on('click', '[btnSave]', function(e) {
            const $form = $('[formSave]');
            ajax($form.attr('action'), $form.attr('method'), (new FormData($form[0])));
        });
    });
</script>
<?php $this->endSection() ?>