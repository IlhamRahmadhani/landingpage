<?= $this->extend('backend/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row mb-5">
        <div class="col-lg-8 col-md-12 mx-auto">
            <div class="places-sweet-alerts mt-5">
                <h2 class="text-center">Selamat datang <?= USER['name'] ?></h2>
                <p class="category text-center">Di sistem backend landing page <a href="https://smart.bakrie.ac.id/site">Pendaftaran Mahasiswa Baru</a></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">collections</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Banners</p>
                        <h4 class="mb-0"><?= $count['banners'] ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0" />
                <div class="card-footer p-3">
                    <p class="mb-0">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-sm-0 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">content_copy</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Program Seleksi</p>
                        <h4 class="mb-0"><?= $count['program_seleksi'] ?></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0" />
                <div class="card-footer p-3">
                    <p class="mb-0">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">inventory_2</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Fasilitas</p>
                        <h4 class="mb-0"><?= $count['fasilitas'] ?></h4>
                    </div>
                </div>
                <hr class="horizontal my-0 dark" />
                <div class="card-footer p-3">
                    <p class="mb-0">
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mt-lg-0 mt-4">
            <div class="card">
                <div class="card-header p-3 pt-2 bg-transparent">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">monetization_on</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Biaya</p>
                        <h4 class="mb-0"><?= $count['biaya'] ?></h4>
                    </div>
                </div>
                <hr class="horizontal my-0 dark" />
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>