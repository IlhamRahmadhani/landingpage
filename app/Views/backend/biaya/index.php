<?= $this->extend('backend\layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 mb-4">
            <h5 class="text-white text-capitalize ps-3">Biaya</h6>
        </div>
        <div class="nav-wrapper position-relative end-0">

            <ul class="nav nav-pills nav-fill p-1 mb-2" role="tablist">
                <?php foreach ($biaya as $k => $value) : ?>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 <?= ($k == 0) ? 'active' : '' ?>" data-bs-toggle="tab" href="#tab-<?= $value['id'] ?>" role="tab" aria-controls="tab-control-<?= $value['id'] ?>" aria-selected="<?= ($k == 0) ? 'true' : 'false' ?>">
                            <?= $value['tipe'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

        </div>
        <div class="tab-content" id="myTabContent">
            <?php foreach ($biaya as $k => $value) : ?>
                <div class="tab-pane fade  <?= ($k == 0) ? 'show active' : '' ?>" id="tab-<?= $value['id'] ?>" role="tabpanel" aria-labelledby="tab-control-<?= $value['id'] ?>">
                    <div class="row mt-3">
                        <div class="col text-end">
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0" btnSave="<?= $value['id'] ?>">Ubah Konten</button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <form method="POST" formSave="<?= $value['id'] ?>" action="<?= base_url('landingpage/biaya/save/' . $value['id']) ?>">
                            <input type="hidden" name="content" value="<?= $value['content'] ?>">
                            <div id="summernote-biaya-<?= $value['id'] ?>" class="summernote"></div>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(function() {
        <?php foreach ($biaya as $k => $value) : ?>
            $('#summernote-biaya-<?= $value['id'] ?>').summernote({
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
                        $('#summernote-biaya-<?= $value['id'] ?>')
                            .closest('form')
                            .find('[name="content"]')
                            .val($("#summernote-biaya-<?= $value['id'] ?>")
                                .summernote('code'));
                    },
                    onInit: function() {
                        $("button[data-toggle='dropdown']").each(function(index) {
                            $(this).removeAttr("data-toggle").attr("data-bs-toggle", "dropdown");
                        });
                    }
                }
            })
            $("#summernote-biaya-<?= $value['id'] ?>").summernote("code", `<?= html_entity_decode($value['content']) ?>`);

        <?php endforeach ?>

        $('[btnSave]').on('click', function(e) {
            const $form = $('[formSave="' + $(this).attr('btnSave') + '"]');
            ajax($form.attr('action'), $form.attr('method'), (new FormData($form[0])));
        });
    })
</script>
<?php $this->endSection() ?>