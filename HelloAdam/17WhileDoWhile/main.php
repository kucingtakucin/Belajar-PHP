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
    $data = ['adam', 'arthur', 'M3119001', 2019, 'Teknik Informatika'];
    $j = 0;
    for ($i = 0, $iMax = count($data); $i < $iMax; $i++){
        echo $data[$i].'<br>';
    }
    while ($j < count($data)) {
        echo $data[$j].'<br>';
        $j++;
    }
    $k = 0;
    do {
        echo $data[$k];
        $k++;
    } while ($k < count($data));
    ?>
</body>
</html>