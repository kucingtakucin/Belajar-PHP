<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Labkom FMIPA UNS</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
<div class="container">
    <header>
        <section id="judul">
            <h1>Labkom FMIPA UNS</h1>
        </section id="subjudul">
        <h4>Laboratorium Komputasi FMIPA UNS</h4>
        <section id="navigasi">
            <div class="user">
                <?php if (isset($_SESSION['user'])): ?>
                    <?php if (cek_status($_SESSION['user'])): ?>
                        <h4>Halo, <?php echo $_SESSION['user']; ?></h4>
                        <h5>Status: Admin</h5>
                    <?php else: ?>
                        <h4>Halo, <?php echo $_SESSION['user']; ?></h4>
                        <h5>Status: User</h5>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li><a href="add.php">Add</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </section>
    </header>