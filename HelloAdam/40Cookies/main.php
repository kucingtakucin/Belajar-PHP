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
    <main>
    <h1>Labkom FMIPA UNS</h1>
    <h1>Cookies</h1>
        <form action="">
            <label for="Username">Username</label>
            <input type="text" name="Username" id="Username">
            <label for="Password">Password</label>
            <input type="password" name="Password" id="Password">
            <input type="submit">
        </form>
    </main>
    <?php
    if (isset($_POST['submit'])) {
        echo $_POST['Username'];
        echo $_POST['Password'];
    }
    setcookie('Data', $_POST, time() + 60);
    ?>
</body>
</html>