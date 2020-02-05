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
    function berteriak($callback){
        echo 'Haloooooo gaiiss';
        if (is_callable($callback)) {
            $callback('Selamat datang!!');
        }
    }
    $memanggil = static function ($text) {
        echo $text;
    };
    berteriak($memanggil);

    ?>
</body>
</html>