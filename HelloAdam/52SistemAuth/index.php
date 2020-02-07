<?php
require_once 'core/init.php';
if (!isset($_SESSION['user'])) {
    echo '<script>alert("Kamu belum login!")</script>';
}
?>
<h1>Ini adalah halaman user</h1>
