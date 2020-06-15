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
    <div class="container mt-5 border shadow-lg rounded-lg">
        <header class="d-flex flex-column align-items-center justify-content-center">
            <h1 class="font-weight-bold mt-2">Daftar Mahasiswa</h1>
            <button class="btn btn-success mb-3 text-white" data-toggle="modal" data-target="#exampleModal">Insert</button>
        </header>
        <main>
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
                        <td><a href="index.php?id=<?= $student['id'] ?>" class="btn btn-warning text-white mr-2">Update</a><a href="index.php?id=<?= $student['id'] ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
                </tbody>
            </table>

            <!--  Modal 1  -->
            <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Data Mahasiswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" required id="nim" name="nim">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" required id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control" required id="jurusan" name="jurusan">
                                </div>
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input type="text" class="form-control" required id="angkatan" name="angkatan">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Submit Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <!--  Modal 2  -->
            <?php
            if (isset($_POST['submit'])): ?>
                <div class="modal fade" id="exampleModal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                            <?php if(add($_POST) > 0): ?>
                                <h5 class="text-success">Data berhasil ditambahkan!</h5>
                            <?php else: ?>
                                <h5>Gagal menambahkan data!</h5>
                                <h5 class="text-danger"><?= mysqli_error($link) ?></h5>
                            <?php endif ?>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php" type="button" class="btn btn-secondary">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

        <!--  Modal 3  -->
            <?php
            if (isset($_GET['id'])): ?>
                <div class="modal fade" id="exampleModal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                            <?php if (delete($_GET['id'])): ?>
                                <h5 class="text-success">Data berhasil dihapus!</h5>
                            <?php else: ?>
                                <h5>Gagal menghapus data!</h5>
                                <h5 class="text-danger"><?= mysqli_error($link) ?></h5>
                            <?php endif ?>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php" type="button" class="btn btn-secondary">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
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
        })
    </script>
</body>
</html>