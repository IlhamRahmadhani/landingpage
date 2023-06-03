<form method="POST" id="form-create" action="<?= base_url('landingpage/banners/create') ?>">
    <div class="my-3">
        <label class="form-label">Judul</label>
        <input type="hidden" name="judul">
        <div class="input-group input-group-dynamic">
            <div id="summernote-judul" class="summernote"></div>
        </div>
    </div>
    <div class="my-3">
        <label class="form-label">Banner</label>
        <input type="file" class="form-control" name="image_url">
    </div>
</form>
<script>
    $('#summernote-judul').summernote({
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['height', ['height']],
            ['view', ['codeview']]
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