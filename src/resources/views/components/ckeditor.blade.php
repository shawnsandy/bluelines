@push("scripts")
<script src="//cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body', {
        filebrowserBrowseUrl: '/browser/browse.php',
        filebrowserUploadUrl: '/uploader/upload.php'
    });
</script>
@endpush
