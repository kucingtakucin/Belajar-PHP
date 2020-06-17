<?php require_once 'init.php';
if (isset($_SESSION['login'])):
    header('Location: index.php');
    exit(0);
endif ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <header class="d-flex flex-column align-items-center justify-content-center">
        <h1 class="font-weight-bold mt-2">Login</h1>
    </header>
    <main class="d-flex flex-column align-items-center justify-content-center">
        <div class="card rounded-lg shadow-lg" style="width: 500px;">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary d-block m-auto" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>

        <!--  Login Modal  -->
        <?php if (isset($_POST['login'])): ?>
            <div class="modal fade" id="loginModal" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Pemberitahuan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                        <?php try { ?>
                            <?php if (login($_POST) > 0):
                            header("Location: index.php");
                            exit(0);?>
                            <?php else: ?>
                            <h5>Gagal melakukan login!</h5>
                            <h5 class="text-danger">Error! <?= mysqli_error($link) ?></h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                            <?php endif ?>
                        <?php } catch (\RuntimeException $exception) { ?>
                            <h5>Gagal melakukan login!</h5>
                            <h5 class="text-danger">Exception! <?= $exception->getMessage() ?></h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </main>
    <footer>
        <p class="text-center mt-2">Copyright &copy; 2020. Adam Arthur Faizal</p>
    </footer>
</div>
<script src="../jquery-3.5.1.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="../bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginModal').modal('show')
    })
</script>
</body>
</html>
