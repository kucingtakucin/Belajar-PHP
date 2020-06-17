<?php
require_once 'core/init.php';
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = 'Kamu harus login untuk mengakses halaman ini';
    echo '<script>alert("Kamu belum login!")</script>';
    header('Location:login.php');
}
require_once 'view/header.php'
?>
    <h1>Ini adalah halaman profil <?php echo $_SESSION['user']?></h1>
    <br>
    <br>
    <?php if(cek_status($_SESSION['user'])) { ?>
    <h3>Halo admin</h3>
    <?php } else { ?>
    <h3>Halo user</h3>
    <?php } ?>
    <br>
<?php require_once 'view/footer.php'?>