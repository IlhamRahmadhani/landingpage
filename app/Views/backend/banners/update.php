<form method="POST" id="form-update" action="<?= base_url('landingpage/banners/update/' . $banner['id']) ?>">
    <input type="hidden" name="id" value="<?= $banner['id'] ?>">
    <div class="my-3">
        <label class="form-label">Judul</label>
        <div class="input-group input-group-dynamic">
            <textarea id="judul" name="judul" class="form-control"></textarea>
        </div>
    </div>
    <div class="my-3">
        <label class="form-label">Banner</label>
        <input type="file" class="form-control" name="image_url">
    </div>
</form>

<script>
    initTinymce('#judul', `<?= html_entity_decode($banner['judul']) ?>`);
</script>