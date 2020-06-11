<?php $title = 'Latihan 2' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title?></title>
    <style>
        .kotak-A, .kotak-B {
            width: 60px;
            height: 60px;
            text-align: center;
            line-height: 60px;
            margin: 10px;
            float: left;
        }

        .kotak-A {
            background-color: silver;
        }

        .kotak-B {
            background-color: gold;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <h1><?= $title?></h1>
    <?php $angka = [2,1,3,5,4,7,6,8,0,9] ?>
    <?php for ($i = 0, $iMax = count($angka); $i < $iMax; $i++): ?>
        <div class="kotak-A A<?= $i ?>"></div>
        <script>
            const kotakA<?= $i ?> = document.getElementsByClassName('A<?= $i ?>');
            Array.from(kotakA<?= $i ?>).forEach((element) => {
                element.innerHTML = <?= $angka[$i] ?>
            })
        </script>
    <?php endfor ?>

    <div class="clear"></div>

    <?php foreach ($angka as $item): ?>
        <div class="kotak-B B<?= $item ?>"></div>
        <script>
            const kotakB<?= $item ?> = document.getElementsByClassName('B<?= $item ?>');
            Array.from(kotakB<?= $item ?>).forEach((element) => {
                element.textContent = <?= $item ?>
            })
        </script>
    <?php endforeach ?>
</body>
</html>
