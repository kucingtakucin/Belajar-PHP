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
    $a = 1;
    $b = 2;
    function angka(){
        global $a, $b;
        $c = $a + $b;
        return $c;
    }

    function angka2(){
        $c = $GLOBALS['a'] + $GLOBALS['b'];
        return $c;
    }
    echo angka();
    echo '<br>';
    echo angka2();

    ?>
</body>
</html>