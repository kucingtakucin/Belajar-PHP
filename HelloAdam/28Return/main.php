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
    <h2>Return pada fungsi</h2>
    <?php
    function angka($x, $y){
        $jumlah = $x + $y;
        return $jumlah;
    }

    echo 'Hasil penjumlahan ' . angka(1, 2);
    ?>
</body>
</html>