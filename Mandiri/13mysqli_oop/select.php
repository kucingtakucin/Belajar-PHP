<?php

$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = 'root'; //''
$db   = 'sekolah';

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno){
  echo ' gagal konek ke mysql ' . $mysqli->connect_error;
}

//------------------------------------------------------------
//--------- 1. mengeluarkan data cara pertama ----------------
// $query  = "SELECT * FROM murid";
// $result = $mysqli->query($query);
//
// if ( $result->num_rows > 0 ){
//   while($row = $result->fetch_assoc()){
//     echo $row['nama'] . ' ' . $row['alamat'] .' <br> ';
//   }
// }else{
//   echo 'tidak ada data';
// }

//------------------------------------------------------------
//--------- 2. mengeluarkan data prepare statement ---------
$nama_param  = 'utara';

$murid = $mysqli->prepare("SELECT nama, alamat FROM murid WHERE alamat=?");
$murid->bind_param('s', $nama_param);
$murid->execute();

$murid->bind_result($nama, $alamat);

while($murid->fetch()){
  echo $nama . ' -  '. $alamat .'<br>';
}

$mysqli->close();
?>
