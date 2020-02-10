<?php
$host = 'localhost';
$username = 'root';
$passwd = 'panembahansenopati123kecilsemuatanpaspasi';
$dbname = 'helloadam';
$mysqli = new mysqli($host, $username, $passwd, $dbname);

if (!$mysqli->connect_errno) echo 'Berhasil tersambung ke database! <br>';
else echo 'Gagal tersambung! ada error ' . $mysqli->error;

$sql = "insert into murid (nama, alamat) values ('adam','jaten')";
$sql .= "insert into murid (nama, alamat) values ('arthur','jaten')";
//$sql .= "insert into murid (nama, alamat) values ('faizal','jaten')";
if ($mysqli->query($sql)) echo 'Berhasil memasukkan data ke database!';
else echo 'Gagal memasukkan data! ada error ' . $mysqli->error;

$mysqli->close();