<?= $this->extend('frontend/layout') ?>
<?= $this->section('content') ?>
<style>
    .table {
        font-size: 14px;
    }
</style>
<div class="container mt-4">
    <div class="accordion" id="accordionExample">
        <?php foreach ($biaya as $k => $value) : ?>
            <div class="card">
                <div class="card-header" id="heading<?= $value['id'] ?>">
                    <h5 class="mb-0">
                        <button class="btn btn-link <?= ($k != 0) ? 'collapsed' : '' ?>" type="button" data-toggle="collapse" data-target="#collapse<?= $value['id'] ?>" aria-expanded="<?= ($k != 0) ? 'false' : 'true' ?>" aria-controls="collapse<?= $value['id'] ?>"><?= $value['tipe'] ?></button>
                    </h5>
                </div>
                <div id="collapse<?= $value['id'] ?>" class="<?= ($k != 0) ? 'collapse' : 'accordion-collapse show' ?>" aria-labelledby="heading<?= $value['id'] ?>" data-parent="#accordionExample">
                    <div class="card-body"><?= html_entity_decode(($value['content'])) ?></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection() ?>