<?php
require_once 'core/init.php';
if (!isset($_SESSION['user'])) {
    echo '<script>alert("Kamu belum login!")</script>';
    header('Location:login.php');
}
require_once 'view/header.php'
?>

<h1>Ini adalah halaman profil <?php echo $_SESSION['user']?></h1>
<br>

<?php require_once 'view/footer.php'?>