<?php
$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = 'root'; //''
$db   = 'ajax';

$link = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());

$_SESSION['user'] = 1;
