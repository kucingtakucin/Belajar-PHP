<?php
require_once "core/init.php";
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
if (isset($_GET['id'])) {
    delete_data($_GET['id']);
    header('Location: index.php');
} else {
    echo '<script>alert("Ada masalah saat menghapus data");</script>';
    header('Location: index.php');
}