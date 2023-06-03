<form method="POST" id="form-create" action="<?= base_url('landingpage/jenis-program-detail/create/' . $idJenisProgram) ?>">
    <input type="hidden" name="id_jenis_program" value="<?= $idJenisProgram ?>">
    <div class="my-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image_url">
    </div>
    <div class="my-3">
        <label class="form-label">Keterangan</label>
        <input type="text" class="form-control input-text" name="keterangan">
    </div>

    <div class="form-group label-floating mb-4">
        <label class="control-label">Konten</label>
        <div class="input-group input-group-dynamic">
            <textarea id="content" name="content" class="form-control"></textarea>
        </div>
    </div>

</form>
<script>
    initTinymce('#content');
</script>