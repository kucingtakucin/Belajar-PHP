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
    <h2>Lebih dari satu kondisi</h2>
    <?php
    $web_developer = 1000;
    $laptop_baru = 2000;
    $android_developer = 3000;

    if ($android_developer > $laptop_baru) {
        echo 'Hore bisa beli!';
    } else if ($web_developer < $laptop_baru) {
        echo 'Wah uangnya engga cukup!';
    }
    ?>
</body>
</html>