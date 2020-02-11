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
    <form action="" method="post">
        <label for="Username">Username</label>
        <input type="text" name="Username" id="Username">
        <label for="Password">Password</label>
        <input type="password" name="Password" id="Password">
        <input type="submit" name="Submit" id="Submit">
    </form>
    <?php
    session_start();
    $user = 'adam';
    $pass = '123';
    if (isset($_POST['Submit'])) {
        if ($_POST['Username'] === $user && $_POST['Password'] === $pass) {
            setcookie('data_cookie', $_POST['Username'], time() + 60);
            $_SESSION['data_session'] = $_POST['Username'];
            header('Location:profile.php');
        } else {
            echo 'login gagal!';
        }
    }
    ?>
</body>
</html>