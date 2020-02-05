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
    <h2>Anonymous Function</h2>
    <?php
    $haloduniaaa =  function ($teks) {
        echo $teks;
    };
    $haloduniaaa('Hello, World!');
    $hello_world = $haloduniaaa;
    $hello_world('Mantab-mantab')
    ?>
</body>
</html>