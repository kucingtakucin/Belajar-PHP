<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom FMIPA UNS</title>
</head>
<body>
    <main>
        <form action="main.php" method="post" enctype="multipart/form-data">
            <input type="file" name="gambar">
            <input type="submit" name="Submit" value="Upload">
        </form>
    </main>
    <?php
    if (isset($_POST['Submit'])) {
        print_r($_FILES);
//        move_uploaded_file()
//        $format = pathinfo($nama,PATHINFO_EXTENSION)
    }
    ?>
</body>
</html>