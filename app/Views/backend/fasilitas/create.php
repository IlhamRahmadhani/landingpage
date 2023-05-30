<form method="POST" id="form-create" action="<?= base_url('landingpage/fasilitas/create') ?>">
    <div class="my-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control input-text" name="judul">
    </div>
    <div class="my-3">
        <label class="form-label">Gambar Depan</label>
        <input type="file" class="form-control" name="image_url">
    </div>
    <div class="my-3">
        <label class="form-label">Gambar Belakang</label>
        <input type="file" class="form-control" name="image_detail_url">
    </div>
</form>