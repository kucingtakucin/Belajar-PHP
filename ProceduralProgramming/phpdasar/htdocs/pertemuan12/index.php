<?php require_once 'db.php' ?>
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
                        <th scope="row"><?= $i ?></th>
                        <td><?= $student['nama'] ?></td>
                        <td><?= $student['nim'] ?></td>
                        <td><?= $student['jurusan'] ?></td>
                        <td><?= $student['angkatan'] ?></td>
                        <td><a href="index.php?id=<?= $student['id'] ?>&status=update" class="btn btn-warning text-white mr-2">Update</a><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal3">Delete</button></td>
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
                                    <input type="text" class="form-control" required id="nim" autofocus name="nim">
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
                                <button type="submit" id="insert" class="btn btn-primary" name="insert">Insert Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <!--  Modal 2  -->
            <?php
            if (isset($_POST['insert'])): ?>
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
                            <?php if(insert($_POST) > 0): ?>
                                <h5 class="text-success">Data berhasil ditambahkan!</h5>
                            <?php else: ?>
                                <h5>Gagal menambahkan data!</h5>
                                <h5 class="text-danger"><?= mysqli_error($link) ?></h5>
                            <?php endif ?>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php" class="btn btn-secondary">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

        <!--  Modal 3  -->
            <?php if (!isset($_GET['status'])): ?>
                <div class="modal fade" id="exampleModal3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                Apakah kamu yakin untuk menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="index.php?id=<?= $student['id'] ?>&status=delete" class="btn btn-danger">Oke</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

        <!--  Modal 4  -->
            <?php
            if (isset($_GET['id'], $_GET['status']) && $_GET['status'] === 'delete'): ?>
                <div class="modal fade" id="exampleModal4" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                <a href="index.php" class="text-decoration-none">
                                    <button type="button" class="close" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </a>
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

            <!--  Modal 5  -->
            <?php
            if (isset($_GET['id'], $_GET['status']) && $_GET['status'] === 'update' && !isset($_POST['update'])):
                $student_id = $_GET['id'];
                $student_detail = select("SELECT * FROM mahasiswa WHERE id = '$student_id'")[0];
            ?>
                <div class="modal fade" id="exampleModal5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Data Mahasiswa</h5>
                                    <a href="index.php" class="text-decoration-none">
                                        <button type="button" class="close" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" required autofocus id="nim" name="nim" value="<?= $student_detail['nim'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" required id="nama" name="nama" value="<?= $student_detail['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <input type="text" class="form-control" required id="jurusan" name="jurusan" value="<?= $student_detail['jurusan'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="angkatan">Angkatan</label>
                                        <input type="text" class="form-control" required id="angkatan" name="angkatan" value="<?= $student_detail['angkatan'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="index.php" class="btn btn-secondary text-decoration-none text-white">Close</a>
                                    <button type="submit" id="update" class="btn btn-primary" name="update">Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <!--  Modal 6  -->
            <?php
            if (isset($_POST['update'])):
            $student_id = $_GET['id'];
            ?>
                <div class="modal fade" id="exampleModal6" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                                <a href="index.php" class="text-decoration-none">
                                    <button type="button" class="close" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </a>
                            </div>
                            <div class="modal-body text-center">
                                <?php if(update($student_id, $_POST) >= 0): ?>
                                    <h5 class="text-success">Data berhasil diupdate!</h5>
                                <?php else: ?>
                                    <h5>Gagal mengupdate data!</h5>
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
            $('#exampleModal4').modal('show')
            $('#exampleModal5').modal('show')
            $('#exampleModal6').modal('show')
        })
    </script>
</body>
</html>