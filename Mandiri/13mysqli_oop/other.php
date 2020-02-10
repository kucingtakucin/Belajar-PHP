<?php

$host = 'localhost'; //127.0.0.1
$user = 'root';
$pass = 'root'; //''
$db   = 'sekolah';

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno){
  echo ' gagal konek ke mysql ' . $mysqli->connect_error;
}

//menghapus data
//$sql = "DELETE FROM murid WHERE nama='hilman' ";

//mengedit/mengupdate data
$sql = "UPDATE murid SET nama='transformer', alamat='hollywood' WHERE nama='masmis' ";

if ( $mysqli->query($sql) === TRUE ){
  echo ' berhasil diedit! ';
}else{
  echo 'gagal diedit';
}


$mysqli->close();
?>
