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
                            <button class="btn btn-icon btn-3 btn-sm btn-outline-primary mb-0" btnSave="<?= $value['id'] ?>" type="button">
                                <span class="btn-inner--icon"><i class="material-icons fs-5">save</i></span>
                                <span class="btn-inner--text">Simpan Konten</span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <form method="POST" formSave="<?= $value['id'] ?>" action="<?= base_url('landingpage/biaya/save/' . $value['id']) ?>">
                            <textarea id="content-<?= $value['id'] ?>" name="content" style="visibility: hidden;"></textarea>
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
            initTinymce("#content-<?= $value['id'] ?>", `<?= html_entity_decode($value['content']) ?>`, {
                height: 500
            })
        <?php endforeach ?>

        $('[btnSave]').on('click', function(e) {
            const $form = $('[formSave="' + $(this).attr('btnSave') + '"]');
            ajax($form.attr('action'), $form.attr('method'), (new FormData($form[0])));
        });
    })
</script>
<?php $this->endSection() ?>