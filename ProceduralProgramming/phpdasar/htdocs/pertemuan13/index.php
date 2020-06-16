<?php require_once 'model.php' ?>
<?php require_once 'controller.php' ?>
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
    <div class="container mt-5 mb-5 border shadow-lg rounded-lg">
        <header class="d-flex flex-column align-items-center justify-content-center">
            <h1 class="font-weight-bold mt-2">Daftar Mahasiswa</h1>
            <button class="btn btn-success mb-3 text-white" data-toggle="modal" data-target="#exampleModal">Insert</button>
        </header>
        <main>
            <form action="" method="post" class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="keyword" id="search" placeholder="Search" autofocus autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary mb-2" name="search">Search</button>
            </form>
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $students = select('SELECT * FROM mahasiswa');
                if (isset($_POST['search'])):
                    $students = search($_POST['keyword']);
                endif;
                ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <th scope="row"><p class="mt-5"><?= $i ?></p></th>
                        <td><img src="img/<?= $student['foto'] ?>" alt="<?= $student['nama']?>" width="250" class="img-fluid"></td>
                        <td><p class="mt-5"><?= $student['nama'] ?></p></td>
                        <td><p class="mt-5"><?= $student['nim'] ?></p></td>
                        <td><p class="mt-5"><?= $student['jurusan'] ?></p></td>
                        <td><p class="mt-5"><?= $student['angkatan'] ?></p></td>
                        <td><a href="index.php?id=<?= $student['id'] ?>&status=update" class="btn btn-warning text-white mr-2 mt-5">Update</a><button class="btn btn-danger mt-5" data-toggle="modal" data-target="#exampleModal3">Delete</button></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
                </tbody>
            </table>

        <!--  Modal 1 & Modal 2 -->
        <?php require_once 'insert.php' ?>
        <!--  Modal 3 & Modal 4 -->
        <?php require_once 'delete.php' ?>
        <!--  Modal 5 & Modal 6 -->
        <?php require_once 'update.php' ?>
        </main>
        <footer>
            <p class="text-center">Copyright &copy; 2020. Adam Arthur Faizal</p>
        </footer>
    </div>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#exampleModal2').modal('show')
            $('#exampleModal4').modal('show')
            $('#exampleModal5').modal('show')
            $('#exampleModal6').modal('show')
        })
    </script>
</body>
</html>