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
    $kalimat = 'Halo nama saya adam, biasa dipanggil arthur';
    echo $kalimat;
    echo strlen($kalimat);
    echo str_word_count($kalimat);
    echo str_replace('Halo', 'Hai', $kalimat);
    echo str_shuffle($kalimat);
    ?>
</body>
</html>