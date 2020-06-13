<?php
    $document = [
        'title' => 'Latihan 4',
        'subtitle' => 'Selamat datang, '
    ]
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $document['title'] ?></title>
</head>
<body>
    <h1><?= $document['title'] ?></h1>
    <h2><?= $document['subtitle'] ?><?= $_POST['nama']?></h2>
    <a href="latihan3.php">Kembali</a>
</body>
</html>
