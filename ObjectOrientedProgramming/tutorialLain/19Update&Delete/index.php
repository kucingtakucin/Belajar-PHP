<?php
$host = 'localhost';
$username = 'root';
$passwd = 'panembahansenopati123kecilsemuatanpaspasi';
$dbname = 'helloadam';

$mysqli = new mysqli($host, $username, $passwd, $dbname);
if (!$mysqli->connect_errno) echo 'Berhasil tersambung ke database!<br>';
else echo 'Gagal tersambung! ada error ' . $mysqli->error;

$query = "delete from murid where nama = 'otong'";
if ($mysqli->query($query)) echo 'Berhasil menghapus data!<br>';
else echo 'Gagal menghapus data! ada error ' . $mysqli->error;

$query = "update murid set nama = 'otong',alamat = 'solo' where nama = 'ucup'";
if ($mysqli->query($query)) echo 'Berhasil mengupdate data!<br>';
else echo 'Gagal mengupdate data! ada error ' . $mysqli->error;

$mysqli->close();