<form method="POST" id="form-update" action="<?= base_url('landingpage/jenis-program-detail/update/' . $jenisProgramDetail['id']) ?>">
    <input type="hidden" name="id" value="<?= $jenisProgramDetail['id'] ?>">
    <input type="hidden" name="id_jenis_program" value="<?= $jenisProgramDetail['id_jenis_program'] ?>">
    <div class="my-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image_url">
    </div>

    <div class="my-3">
        <label class="form-label">Keterangan</label>
        <input type="text" class="form-control input-text" name="keterangan" value="<?= $jenisProgramDetail['keterangan'] ?>">
    </div>

    <div class="my-3">
        <label class="form-label">Konten</label>
        <div class="input-group input-group-dynamic">
            <textarea id="content" name="content" class="form-control"></textarea>
        </div>
    </div>

</form>

<script>
    initTinymce('#content', `<?= html_entity_decode($jenisProgramDetail['content']) ?>`);
</script>