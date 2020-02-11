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
    <?php
    $angka = 123.5;
    echo round($angka);
    try {
        echo 'Angka hari ini adalah ' . random_int(0, 10);

    } catch (Exception $e) {
        echo 'ini adalah exceptions'.$e;
    }
    echo 'Angka maksimal hari ini adalah ' . max(0, 1, 2, 3, 4, 5);
    echo 'Angka minimal hari ini adalah ' . min(0, 1, 2, 3, 4, 5);
    ?>
</body>
</html>