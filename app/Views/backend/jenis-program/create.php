<form method="POST" id="form-create" action="<?= base_url('landingpage/banners/create') ?>">
    <div class="form-group label-floating mb-4">
        <label class="control-label">Judul</label>
        <input type="hidden" name="judul">
        <div class="input-group input-group-dynamic">
            <div id="summernote-judul" class="summernote"></div>
        </div>
    </div>
    <div class="form-group label-floating">
        <label class="control-label d-block">Banner</label>
        <input type="file" name="image_url">
    </div>
</form>
<script>
    $('#summernote-judul').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['color', ['color']],
        ],
        tabsize: 2,
        height: 100,
        callbacks: {
            onBlur: function() {
                $("[name='judul']").val($("#summernote-judul").summernote('code'));
            },
            onInit: function() {
                $("button[data-toggle='dropdown']").each(function(index) {
                    $(this).removeAttr("data-toggle").attr("data-bs-toggle", "dropdown");
                });
            }
        }
    });
</script>