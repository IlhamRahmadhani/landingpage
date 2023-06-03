<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Kontak Kami</h6>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="button" class="btn btn-outline-primary btn-sm mb-0" btnSave>Simpan Konten</button>
            </div>
        </div>
        <div class="mt-3">
            <form method="POST" formSave action="<?= base_url('landingpage/kontak-kami/save') ?>">
                <input type="hidden" name="content" value="<?= $kontakKami['content'] ?? '' ?>">
                <div id="summernote-content" class="summernote"></div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        $('#summernote-content').summernote({
            toolbar: [
                ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['codeview']]
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
                onInit: function() {
                    $("button[data-toggle='dropdown']").each(function(index) {
                        $(this).removeAttr("data-toggle").attr("data-bs-toggle", "dropdown");
                    });
                }
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