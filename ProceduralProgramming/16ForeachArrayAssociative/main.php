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
    $data = [
        'nama'=>'Adam Arthur Faizal',
        'nim'=>'M3119001',
        'angkatan'=>2019,
        'jurusan'=>'Teknik Informatika'
    ];
    foreach ($data as $item) {
        echo $item.'<br>';
    }
    foreach ($data as $index => $datum) {
        echo $index.'=>'.$datum.'<br>';
    }
    ?>
</body>
</html>