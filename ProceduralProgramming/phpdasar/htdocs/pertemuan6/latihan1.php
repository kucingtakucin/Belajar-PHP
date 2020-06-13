<?php $title = 'Latihan 1' ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <style>
        .kotak {
            font-size: 40px;
            font-weight: bold;
            width: 100px;
            height: 100px;
            background-color: #BADA55;
            text-align: center;
            line-height: 100px;
            margin: 10px;
            float: left;
            transition: 1s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            border-radius: 50%;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <h1><?= $title ?></h1>

    <?php
    $numbers = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];
    foreach ($numbers as $number) :
        foreach ($number as $item): ?>
            <div class="kotak" id="<?= $item ?>"></div>
            <script>
                const kotak<?= $item ?> = document.getElementById('<?= $item ?>')
                kotak<?= $item ?>.textContent = <?= $item ?>
            </script>
        <?php endforeach ?>
        <div class="clear"></div>
    <?php endforeach ?>
</body>
</html>