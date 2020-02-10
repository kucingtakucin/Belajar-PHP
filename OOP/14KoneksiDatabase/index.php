<?php
$host = 'localhost';
$username = 'root';
$password = 'panembahansenopati123kecilsemuatanpaspasi';
$database = 'helloadam';
$mysqli = new mysqli($host, $username, $password, $database);
if (!$mysqli->connect_errno) echo 'Berhasil tersambung ke database!';
else echo 'Gagal tersambung! ada error ' . $mysqli->connect_error;