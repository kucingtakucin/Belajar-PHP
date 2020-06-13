<?php
if (isset($_POST['login'])):
    if ($_POST['username'] === 'admin' && $_POST['password'] === '123'):
        header('Location: admin.php');
        exit(0);
    else:
        $error = true;
    endif;
endif;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <style>
        p {
            font-style: italic;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Login Page</h1>
    <?php if (isset($error)): ?>
        <p>Username/Password salah!</p>
    <?php endif ?>
    <form action="" method="post">
        <label for="username">
            Username :
            <input type="text" name="username" id="username">
        </label>
        <br>
        <label for="password">
            Password :
            <input type="password" name="password" id="password">
        </label>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
