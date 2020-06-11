<?php
$document = "Latihan 1";
$hari = ['Senin', 'Selasa', 'Rabu'];
$bulan = ['January', 'February', 'Maret'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $document ?></title>
</head>
<body>
<h1><?= $document?></h1>
<h3><?php var_dump($hari)?></h3>
<h3><?php print_r($bulan)?></h3>
</body>
</html>