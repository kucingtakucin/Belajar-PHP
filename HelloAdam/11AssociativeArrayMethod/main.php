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
    <h2>Method pada associative array</h2>
    <?php
    $data = ['nama' => 'adam', 'panggilan' => 'arthur', 'nim' => 'M3119001', 'angkatan' => 2019];
    $data2 = ['alamat'=>'Karanganyar','umur'=>18,'jurusan'=>'Teknik Informatika'];
    print_r($data);
    print_r(array_values($data));
    print_r(array_keys($data2));
    print_r(array_merge($data, $data2));
    ?>
</body>
</html>