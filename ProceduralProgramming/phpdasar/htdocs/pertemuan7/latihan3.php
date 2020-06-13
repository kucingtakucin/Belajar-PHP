<?php
    $document = [
        'title' => 'Latihan 3',
        'subtitle' => 'Form Login'
    ]
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $document['title'] ?></title>
</head>
<body>
    <h1><?= $document['title']?></h1>
    <h2><?= $document['subtitle']?></h2>
    <form action="latihan4.php" method="post">
        <label for="nama">
            Nama :
            <input type="text" id="nama" name="nama">
        </label>
        <button type="submit" name="submit">Login!</button>
    </form>
</body>
</html>
