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
        <h1>Labkom FMIPA UNS</h1>
        <h2>Mencegah nama kembar saat mendownload file</h2>
        <form action="main.php" method="post" enctype="multipart/form-data">
            <input type="file" name="gambar">
            <input type="submit" name="Submit">
        </form>
    </main>
    <?php
    if (isset($_FILES))
        $namafile = '';
        if (file_exists($namafile)) {
            $namafile = str_replace('.jpg', '', $namafile);
            $namafile .= '_' . time() . '.jpg';
        }
//        move_uploaded_file()
    ?>
</body>
</html>