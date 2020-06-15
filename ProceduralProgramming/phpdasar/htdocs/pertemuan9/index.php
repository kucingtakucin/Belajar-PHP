<?php
require_once 'db.php';
$students = query('SELECT * FROM mahasiswa');
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center font-weight-bold">Daftar Mahasiswa</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Angkatan</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1?>
            <?php foreach ($students as $student): ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $student['nama'] ?></td>
                <td><?= $student['nim'] ?></td>
                <td><?= $student['jurusan'] ?></td>
                <td><?= $student['angkatan'] ?></td>
                <td><a href="#" class="btn btn-warning">Edit</a> | <a href="" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>