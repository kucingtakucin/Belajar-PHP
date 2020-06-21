<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom FMIPA UNS</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <header>
            <section id="judul">
                <h1>Labkom FMIPA UNS</h1>
            </section>
            <section id="sub-judul">
                <h4>Laboratorium Komputasi FMIPA UNS</h4>
            </section>
            <nav>
                <ul>
                    <li><a href="profile.php">Profile</a></li>
                    <?php if (Session::isExist('User')): ?>
                        <?php if ($user->is_admin(Session::get('User'))): ?>
                        <li><a href="admin.php">Admin</a></li>
                        <?php endif; ?>
                        <li><a href="change-password.php">Ganti Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
