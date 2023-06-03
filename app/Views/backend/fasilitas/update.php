</style>
<form method="POST" id="form-update" action="<?= base_url('landingpage/fasilitas/update/' . $fasilitas['id']) ?>">
    <div class="my-3">
        <label class="form-label">Judul</label>
        <input type="text" class="form-control input-text" name="judul" value="<?= $fasilitas['judul'] ?>">
    </div>
    <div class="my-3">
        <label class="control-label d-block">Thumbnail</label>
        <input type="file" class="form-control" name="image_url">
    </div>
    <div class="my-3">
        <label class="control-label d-block">Preview</label>
        <input type="file" class="form-control" name="image_detail_url">
    </div>
</form>

<script>
</script>