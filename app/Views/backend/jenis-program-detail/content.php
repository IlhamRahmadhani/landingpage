<?php foreach ($jenisProgramDetail as $k => $detail) : ?>
    <tr>
        <td class="w-20">
            <div>
                <a href="<?= base_url('show-image-landingpage/' . $detail['image_url']) ?>" data-lightbox="<?= $detail['id_pilihan'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $detail['image_url'])  ?>" alt=""></a>
            </div>
        </td>
        <td class=""><?= $detail['keterangan'] ?></td>
        <td class="w-1">
            <button class="btn btn-icon btn-3 btn-sm btn-outline-info" onclick="window.open('<?= base_url('detail-program-seleksi/' . $detail['id_pilihan']) ?>', 'blank')" type="button">
                <span class="btn-inner--icon"><i class="material-icons fs-6">preview</i></span>
                <span class="btn-inner--text">Lihat konten</span>
            </button>
        </td>
        <td class="w-1">
            <button class="btn btn-icon btn-3 btn-sm btn-outline-warning" jenisProgram="<?= $detail['id'] ?>" btnUpdatePs="<?= $detail['id_pilihan'] ?>" type="button">
                <span class="btn-inner--icon"><i class="material-icons fs-6">mode_edit</i></span>
                <span class="btn-inner--text">Ubah</span>
            </button>
            <button class="btn btn-icon btn-3 btn-sm btn-outline-danger" jenisProgram="<?= $detail['id'] ?>" btnDeletePs="<?= $detail['id_pilihan'] ?>" type="button">
                <span class="btn-inner--icon"><i class="material-icons fs-6">delete</i></span>
                <span class="btn-inner--text">Hapus</span>
            </button>
        </td>
    </tr>
<?php endforeach ?>