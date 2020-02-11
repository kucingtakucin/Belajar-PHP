<?php
$host = 'localhost';
$username = 'root';
$password = 'panembahansenopati123kecilsemuatanpaspasi';
$database = 'helloadam';

$mysqli = new mysqli($host, $username, $password, $database);

if (!$mysqli->connect_errno) echo "Koneksi ke database berhasil<br>";
else echo "Gagal tersambung! ada error " . $mysqli->error;

$nama = 'arthur';
$alamat = 'jaten';
$sql = "insert into murid (nama, alamat) values ('$nama','$alamat')";
if ($mysqli->query($sql)) echo "Berhasil memasukkan data";
else echo "Gagal! ada error " . $mysqli->error;

$mysqli->close();