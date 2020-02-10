<?php

$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = 'root'; //''
$db   = 'sekolah';

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno){
  echo ' gagal konek ke mysql ' . $mysqli->connect_error;
}

// $sql = "INSERT INTO murid (nama, alamat) VALUES ($nama, 'selatan');";
// $sql .= "INSERT INTO murid (nama, alamat) VALUES ('tiqa', 'barat');";
// $mysqli->query($sql)
// $mysqli->multi_query($sql)

//prepare statement
$statement = $mysqli->prepare('INSERT INTO murid (nama, alamat) VALUES (?, ?)');
$statement->bind_param('ss', $nama, $alamat);

//mengisi nilai paramet + mengeksekusi
$nama = 'masmus';
$alamat = 'selatan';
$statement->execute();

$nama = 'masmis';
$alamat = 'selatan';
$statement->execute();

$mysqli->close();

?>
