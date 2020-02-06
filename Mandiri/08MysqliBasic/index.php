<?php

//membuat database di phpmyadmin

//menyambungkan database
//host, user, password, database
// '127.0.0.1', root, '', nama
$link = mysqli_connect('localhost', 'root', 'root', 'sekolah');

//menguji error
if( !$link ){
  die('ada error ' . mysqli_connect_error());
}

//membuat database
//$query = "CREATE DATABASE sekolahkoding123";

//FILTER : LIMIT, ORDER BY, WHERE
$query = "SELECT * FROM murid WHERE alamat='hertasning' ";
$hasil = mysqli_query($link, $query);

if( mysqli_num_rows($hasil) > 0 ){

  while( $data = mysqli_fetch_assoc($hasil) ){
    echo $data['nama']. " ". $data['alamat'] . "<br>";
  }

}

//menutup koneksi
mysqli_close($link);
?>
