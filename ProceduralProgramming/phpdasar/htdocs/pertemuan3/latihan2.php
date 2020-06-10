<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan 2</title>
</head>
<style>
    tr.peach {
        background-color: peachpuff;
    }
    tr.blue {
        background-color: lightblue;
    }
</style>
<body>
<h1><?= 'Latihan 2'?></h1>
<?php
$nama_depan = 'Adam';
$nama_tengah = 'Arthur';
$nama_belakang = 'Faizal';
echo "Halo, perkenalkan nama saya $nama_depan $nama_tengah $nama_belakang <br><br>";
?>
<table border="1" cellpadding="10" cellspacing="0">
    <?php for ($i = 1; $i <= 10; $i++) :?>
        <tr id="row<?=$i?>">
            <?php if ($i % 2 === 1):?>
                <script>
                    document.getElementById('row<?=$i?>').classList.add('peach')
                </script>
            <?php else: ?>
                <script>
                    document.getElementById('row<?=$i?>').classList.add('blue')
                </script>
            <?php endif ?>
            <?php for ($j = 1; $j <= 10; $j++) :?>
                <td><?= "$i, $j"?></td>
            <?php endfor ?>
        </tr>
    <?php endfor ?>
</table>
</body>
</html>