<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Kontak Kami</h6>
        </div>
        <div class="alert alert-info text-white" role="alert">
            <strong>Menu Kontak Kami</strong> Berisi penjelasan blablabal.
        </div>
        <div class="card h-100">
            <div class="card-header pb-2 p-3">
                <div class="row">
                    <div class="col text-end">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0" btnSave>Simpan Konten</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" formSave action="<?= base_url('landingpage/kontak-kami/save') ?>">
                    <input type="hidden" name="content" value="<?= $kontakKami['content'] ?? '' ?>">
                    <div id="summernote-content" class="summernote"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        $('#summernote-content').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['color', ['color']],
                ['view', ['fullscreen', 'codeview']]
            ],
            tabsize: 2,
            height: 500,
            callbacks: {
                onBlur: function() {
                    $('#summernote-content')
                        .closest('form')
                        .find('[name="content"]')
                        .val($("#summernote-content")
                            .summernote('code'));
                },
            }
        })
        $("#summernote-content").summernote("code", `<?= html_entity_decode($kontakKami['content'] ?? '') ?>`);
        $('[btnSave]').on('click', function(e) {
            const $form = $('[formSave]');
            ajax($form.attr('action'), $form.attr('method'), (new FormData($form[0])));
        });
    })
</script>
<?php $this->endSection() ?>