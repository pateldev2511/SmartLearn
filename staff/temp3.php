<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <h1>Classic editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                cloudServices: {
                    tokenUrl: 'localhost/smartlearn/staff/',
                    uploadUrl: 'temp/'
                }
            })
    </script>
</body>

</html>