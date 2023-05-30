<?= $this->extend('frontend\layout') ?>
<?= $this->section('content') ?>
<div class="back__course__page_grid react-courses__single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-single-inner">
                    <?= html_entity_decode($detail['content']) ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>