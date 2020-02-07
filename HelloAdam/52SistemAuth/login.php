<?php
require_once 'core/init.php';
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if (!empty(trim($user)) && !empty(trim($pass))) {
        if (login_cek_nama($user)) {
            if (cek_data($user, $pass)) {
                $_SESSION['user'] = $user;
                header('Location:index.php');
            } else {
                echo '<script>alert("Username atau password salah!")</script>';
            }
        } else {
            echo '<script>alert("Username tidak ada!");</script>';
        }
    }
}
require_once 'view/header.php';
?>
    <main>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br><br>
            <input type="submit" name="submit" value="Login">
            <br>
        </form>
    </main>
<?php
require_once 'view/footer.php';
?>