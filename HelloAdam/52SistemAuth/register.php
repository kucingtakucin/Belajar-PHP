<?php
require_once 'core/init.php';
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if (!empty(trim($user)) && !empty(trim($pass))) {
        if (register_cek_nama($user)) {
            if (register_user($user, $pass)) {
                echo '<script>alert("Berhasil daftar!")</script>';
            } else {
                echo '<script>alert("Gagal!")</script>';
            }
        } else {
            echo '<script>alert("Nama sudah ada!")</script>';
        }
    }
}
require_once 'view/header.php';
?>
<main>
    <form action="register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br><br>
        <input type="submit" name="submit" value="Register">
        <br>
    </form>
</main>
<?php
require_once 'view/footer.php';
?>