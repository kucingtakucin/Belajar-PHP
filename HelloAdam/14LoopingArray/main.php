<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom FMIPA UNS</title>
</head>
<body>
    <h1>Labkom FMIPA UNS</h1>
    <h2>Mengeluarkan hasil array</h2>
    <?php
    $buah = array('kucing', 'anjing', 'ular', 'kelinci', 1234);
    for ($i = 0, $iMax = count($buah); $i < $iMax; $i++) {
        echo $buah[$i].'<br>';
    }
    ?>
</body>
</html>