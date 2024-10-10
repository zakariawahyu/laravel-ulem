<script src="{{ asset('assets/backend/libs/tinymce/tinymce.min.js') }}"></script>
<script>
  tinymce.init({
    selector: 'textarea#description', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: [
    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
    'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
  });
</script>