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
        <input type="hidden" name="content" value="<?= $jenisProgramDetail['content'] ?>">
        <div class="input-group input-group-dynamic">
            <div id="summernote-content" class="summernote"></div>
        </div>
    </div>

</form>

<script>
    $('#summernote-content').summernote({
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview']]

        ],
        tabsize: 2,
        height: 250,
        callbacks: {
            onBlur: function() {
                $("[name='content']").val($("#summernote-content").summernote('code'));
            },
            onInit: function() {
                $("button[data-toggle='dropdown']").each(function(index) {
                    $(this).removeAttr("data-toggle").attr("data-bs-toggle", "dropdown");
                });
            }
        }
    });
    $("#summernote-content").summernote("code", `<?= html_entity_decode($jenisProgramDetail['content']) ?>`);
</script>