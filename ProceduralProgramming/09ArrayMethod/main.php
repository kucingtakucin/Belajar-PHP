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
    <h1>Labkom FMIPA UNS</h1>
    <?php
    $nama = ['adam', 'arthur', 'faizal','adam','arthur'];
    $angka = [2, 1, 3, 5, 4];
    print_r(array_unique($nama));
    print_r(array_reverse($angka));
    sort($angka);
    print_r($angka);
    shuffle($nama);
    print_r($nama);
    count($angka);
    print_r($angka)
    ?>
</body>
</html>