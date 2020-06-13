<?php
$title = 'Latihan 2';
$subtitle = 'Detail Mahasiswa';

if (!isset($_GET['nama'], $_GET['nim'], $_GET['prodi'], $_GET['angkatan'])):
    header('Location: latihan1.php');
endif;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>
    <h2><?= $subtitle ?></h2>

    <ul>
        <li>Nama : <?= $_GET['nama'] ?></li>
        <li>Nim : <?= $_GET['nim'] ?></li>
        <li>Prodi : <?= $_GET['prodi'] ?></li>
        <li>Angkatan : <?= $_GET['angkatan'] ?></li>
    </ul>

    <a href="latihan1.php">Kembali</a>
</body>
</html>
