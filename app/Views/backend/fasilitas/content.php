<?php foreach ($fasilitas as $k => $value) : ?>
    <div class="col-lg-4 mb-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="d-flex gap-2">
                <div class="flex-even">
                    <a href="<?= base_url('show-image-landingpage/' . $value['image_url']) ?>" data-lightbox="<?= $value['id'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $value['image_url'])  ?>" alt=""></a>
                </div>
                <div class="flex-even">
                    <a href="<?= base_url('show-image-landingpage/' . $value['image_detail_url']) ?>" data-lightbox="detail-<?= $value['id'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $value['image_detail_url'])  ?>" alt=""></a>
                </div>
            </div>
            <div class="card-body py-2">
                <p class="card-title py-4 fw-bold"><?= ($value['judul']) ?></p>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer d-flex flex-column pb-0">
                <div class="d-flex justify-content-center mt-auto gap-2">
                    <button class="btn btn-icon btn-3 btn-sm btn-outline-warning" btnUpdate="<?= $value['id'] ?>" type="button">
                        <span class="btn-inner--icon"><i class="material-icons fs-6">mode_edit</i></span>
                        <span class="btn-inner--text">Ubah</span>
                    </button>
                    <button class="btn btn-icon btn-3 btn-sm btn-outline-danger" btnDelete="<?= $value['id'] ?>" type="button">
                        <span class="btn-inner--icon"><i class="material-icons fs-6">delete</i></span>
                        <span class="btn-inner--text">Hapus</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>