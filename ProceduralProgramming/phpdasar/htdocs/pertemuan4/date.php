<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bermain dengan date time</title>
</head>
<body>
<?php
$nama = 'Adam Arthur Faizal';

//echo time();
?>
<h1><?= $nama?></h1>
<h3><?= date('l, d-M-Y') ?></h3>
<h3><?= time() ?></h3>
<h3><?= date('l', mktime(0,0,0,7,20,2002))?></h3>
<h3><?= date('l, d M Y', strtotime('20 July 2002'))?></h3>
</body>
</html>
