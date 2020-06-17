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
    <h2>If bercabang</h2>
    <?php
    $web_developer = 1000;
    $android_developer = 3000;
    $laptop_baru = 2000;

    if ($web_developer > $laptop_baru) {
        if ($web_developer >= $laptop_baru * 2) {
            echo 'Laptop nya dibeli 2 kali oleh seorang web developer';
        } else {
            echo 'Laptop nya dibeli oleh seorang web developer';
        }
    } else if ($android_developer > $laptop_baru) {
        if ($android_developer >= $laptop_baru * 2) {
            echo 'Laptop nya dibeli 2 kali oleh seorang android developer';
        } else {
            echo 'Laptop nya dibeli oleh seorang android developer';
        }
    }
    ?>
</body>
</html>