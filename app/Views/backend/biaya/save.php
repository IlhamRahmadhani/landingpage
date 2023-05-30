<form method="POST" id="form-create" action="<?= base_url('landingpage/biaya/create/' . $idTipePerkuliahan) ?>">
    <div class="my-4">
        <label class="control-label">Konten</label>
        <input type="hidden" name="content">
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
</script>