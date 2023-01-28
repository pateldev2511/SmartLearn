<!DOCTYPE html>
<html>

<head>
    <title>How to Upload Image using ckeditor in PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
</head>

<body>
    <?php
    error_reporting(0);
    if (isset($_POST['create'])) {
        # code...
        echo $_REQUEST['content'];
        echo $_REQUEST['video_up'];
    }
    ?>
    <div class="container-fluid">
        <br />
        <h3 align="center">How to Upload Image using ckeditor in PHP</h3>
        <br />

        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">How to Upload Image using ckeditor in PHP</h3>
                </div>
                <div class="form-group files">
                    <label>Upload Your File </label>
                    <input type="file" name="video_up" class="form-control" multiple="">
                </div>
                <hr>
                <div class="panel-body">
                    <textarea name="content" id="content" class="form-control ckeditor"></textarea>
                </div>
            </div>
            <button type="submit" name="create">Check </button>
        </form>
    </div>

</body>

</html>

<!-- <script>
    CKEDITOR.replace('content', {
        height: 300,
        filebrowserUploadUrl: "upload.php"
    });
</script> -->