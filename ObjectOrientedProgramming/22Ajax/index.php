<?php
require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom FMIPA UNS</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="sass/style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="jumbotron">
                <h1 class="font-weight-bold text-center">Labkom FMIPA UNS</h1>
            </div>
        </header>
        <main>
            <form method="post">
                <div class="form-group">
                    <label for="komentar">Komentar :</label>
                    <textarea class="form-control" name="komentar" id="komentar" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn btn-secondary" value="Kirim">
                </div>
            </form>
       </main>
        <footer>
            <p class="font-italic text-center">Copyright &copy; 2020. Labkom FMIPA UNS. All Rights Reserved.</p>
        </footer>
    </div>
    <script src="js/jquery/dist/jquery.min.js"></script>
    <script src="js/popper.js/dist/umd/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>