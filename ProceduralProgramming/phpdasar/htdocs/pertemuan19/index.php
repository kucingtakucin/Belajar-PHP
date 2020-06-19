<?php require_once 'init.php';
if (!isset($_SESSION['login'])):
    header('Location: login.php');
    exit(0);
endif ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 150px;
            margin-bottom: 150px;
        }
    </style>
</head>
<body>
    <div class="container border shadow-lg rounded-lg">
        <header class="d-flex flex-column align-items-center justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="#"><img src="img/Bootstrap_logo.svg" alt="Navbar Brand" width="30"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
                </div>
            </nav>
            <h1 class="font-weight-bold mt-3 mb-0">Daftar Mahasiswa</h1>
            <h4 class="text-muted mt-0 mb-3">Selamat datang, <?= $_SESSION['username'] ?>!</h4>
            <button class="btn btn-success mb-3 text-white" data-toggle="modal" data-target="#insertModal1">Insert</button>
        </header>
        <main>
            <form action="" method="post" class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="keyword" id="search" placeholder="Search" autofocus autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary mb-2" name="search" id="search-button">Search</button>
            </form>
            <section id="table-mahasiswa"></section>
        <!--  Modal 1 & Modal 2 : Insert  -->
        <?php require_once 'insert.php' ?>
        <!--  Modal 3 & Modal 4 : Delete  -->
        <?php require_once 'delete.php' ?>
        <!--  Modal 5 & Modal 6 : Update  -->
        <?php require_once 'update.php' ?>
        </main>
        <footer>
            <p class="text-center mt-2">Copyright &copy; 2020. Adam Arthur Faizal</p>
        </footer>
    </div>
    <script src="../jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="../bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>