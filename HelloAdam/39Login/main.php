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
    <h1>Login</h1>
    <form action="main.php" method="post">
        <label for="Username">Username</label>
        <input type="text" name="Username" id="Username" required>
        <label for="Password">Password</label>
        <input type="password" name="Password" id="Password" required>
        <input type="submit" name="Submit">
    </form>
    <?php
    $user = 'adam';
    $pass = '123';
    if (isset($_POST['Submit'])) {
        if ($_POST['Username'] === $user && $_POST['Password'] === $pass) {
            echo 'Login berhasil';
//            header('Location:');
        } else {
            echo 'Login gagal';
        }
    }

    ?>
</body>
</html>