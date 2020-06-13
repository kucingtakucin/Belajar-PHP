<?php $title = "Latihan 2" ?>
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
    <?php
    $students = [
        [
            'Nama' => 'Adam Arthur Faizal',
            'Nim' => 'AAAAA',
            'Prodi' => 'Teknik Informatika',
            'Angkatan' => 2019
        ],
        [
            'Nama' => 'Aksal Syah Falah',
            'Nim' => 'BBBBB',
            'Prodi' => 'Teknik Informatika',
            'Angkatan' => 2019
        ],
        [
            'Nama' => 'Aqil Satria Ramadhanu',
            'Nim' => 'CCCCC',
            'Prodi' => 'Teknik Informatika',
            'Angkatan' => 2019
        ],
        [
            'Nama' => 'Sari Eka Nur Marifah',
            'Nim' => 'DDDDD',
            'Prodi' => 'Teknik Informatika',
            'Angkatan' => 2019
        ],
        [
            'Nama' => 'Tri Wulandari',
            'Nim' => 'EEEEE',
            'Prodi' => 'Teknik Informatika',
            'Angkatan' => 2019
        ],
    ];
    foreach ($students as $student): ?>
        <ul id="<?= $student['Nim']?>"></ul>
        <script>
            const student<?= $student['Nim'] ?> = document.getElementById('<?= $student['Nim'] ?>')
            student<?= $student['Nim'] ?>.innerHTML = `
            <li><?= $student['Nama'] ?></li>
            <li><?= $student['Nim'] ?></li>
            <li><?= $student['Prodi'] ?></li>
            <li><?= $student['Angkatan'] ?></li>
            `
        </script>
    <?php endforeach ?>
</body>
</html>