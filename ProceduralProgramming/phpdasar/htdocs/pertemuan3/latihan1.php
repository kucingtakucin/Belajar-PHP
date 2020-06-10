<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan 1</title>
</head>
<body>
<h1><?= 'Latihan 1'?></h1>
<?php
$nama_depan = 'Adam';
$nama_tengah = 'Arthur';
$nama_belakang = 'Faizal';
echo "Halo, perkenalkan nama saya $nama_depan $nama_tengah $nama_belakang";
?>
<table border="1" cellpadding="10" cellspacing="0">
    <?php for ($i = 1; $i <= 3; $i++) :?>
        <tr>
            <?php for ($j = 1; $j <= 5; $j++) :?>
                <td><?= "$i, $j"?></td>
            <?php endfor ?>
        </tr>
    <?php endfor ?>
</table>
</body>
</html>