<?php
$host = 'localhost';
$username = 'root';
$passwd = 'panembahansenopati123kecilsemuatanpaspasi';
$dbname = 'helloadam';

$mysqli = new mysqli($host, $username, $passwd, $dbname);
if (!$mysqli->connect_errno) echo 'Berhasil tersambung ke database!';
else echo 'Gagal tersambung! ada error ' . $mysqli->error;

$sql = $mysqli->prepare('insert into murid (nama, alamat) values (?, ?)');
$sql->bind_param('ss', $nama, $alamat);
$nama = 'arthur';
$alamat = 'jaten';
$sql->execute();

$mysqli->close();