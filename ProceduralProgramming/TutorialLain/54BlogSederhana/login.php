<?php
require_once 'core/init.php';
if (isset($_SESSION['user'])) {
    header('Location: index.php');
} else {
    $error = null;
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty(trim($username)) && !empty(trim($password))) {
            if (cek_untuk_login($username, $password)) {
                $_SESSION['user'] = $username;
                header('Location:index.php');
            } else $error = 'Ada masalah saat login!';
        }
    }
}
require_once 'view/header.php';
?>
<main>
    <form method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" placeholder="Masukkan username" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" rows="10" cols="40" placeholder="Masukkan password" required><br><br>
        <div class="error">
            <?php echo $error; ?>
        </div>
        <input type="submit" name="submit" id="submit" value="Login ">
    </form>
</main>
<?php
require_once 'view/footer.php';
?>
