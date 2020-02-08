<?php
require_once "core/init.php";

unset($_SESSION['user']);
session_destroy();

header("Location: login.php");

 ?>
