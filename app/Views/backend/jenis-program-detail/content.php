<?php foreach ($jenisProgramDetail as $k => $detail) : ?>
    <tr>
        <td class="w-20">
            <div>
                <a href="<?= base_url('show-image-landingpage/' . $detail['image_url']) ?>" data-lightbox="<?= $detail['id_pilihan'] ?>"><img class="img-backend" src="<?= base_url('show-image-landingpage/' . $detail['image_url'])  ?>" alt=""></a>
            </div>
        </td>
        <td class=""><?= $detail['keterangan'] ?></td>
        <td class="w-1"><a class="btn btn-sm btn-outline-info" target="_blank" href="<?= base_url('detail-program-seleksi/' . $detail['id_pilihan']) ?>">Lihat konten</a></td>
        <td class="w-1">
            <button jenisProgram="<?= $detail['id'] ?>" btnUpdatePs="<?= $detail['id_pilihan'] ?>" class="btn btn-sm btn-outline-warning"><i class="material-icons opacity-10 fs-6">mode_edit</i> Ubah</button>
            <button jenisProgram="<?= $detail['id'] ?>" btnDeletePs="<?= $detail['id_pilihan'] ?>" class="btn btn-sm btn-outline-danger"><i class="material-icons opacity-10 fs-6">delete</i> Hapus</button>
        </td>
    </tr>
<?php endforeach ?>