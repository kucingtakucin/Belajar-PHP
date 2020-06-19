<?php
$host = '127.0.0.1';
$user = 'root';
$password = 'namaku123';
$database = 'phpdasar';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_error()):
    die(mysqli_error($link));
endif;