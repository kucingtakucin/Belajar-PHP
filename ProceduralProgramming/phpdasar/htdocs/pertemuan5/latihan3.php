<?php
$title = 'Latihan 3';
$mahasiswa = [
    ['Adam Arthur Faizal', 'AAAAA', 'Teknik Informatika', 2019],
    ['Aksal Syah Falah ', 'BBBBB', 'Teknik Informatika', 2019],
    ['Aqil Satria Ramadhanu', 'CCCCC', 'Teknik Informatika', 2019],
    ['Sari Eka Nur Marifah', 'DDDDD', 'Teknik Informatika', 2019],
    ['Tri Wulandari', 'EEEEE', 'Teknik Informatika', 2019]
]
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

    <?php foreach ($mahasiswa as $element): ?>
        <ul id="mahasiswa<?= $element[1] ?>"></ul>
        <script>
            const mahasiswa<?= $element[1] ?> = document.getElementById('mahasiswa<?= $element[1] ?>')
            mahasiswa<?= $element[1] ?>.innerHTML = `
            <li><?= $element[0] ?></li>
            <li><?= $element[1] ?></li>
            <li><?= $element[2] ?></li>
            <li><?= $element[3] ?></li>
            `
        </script>
    <?php endforeach ?>
</body>
</html>
