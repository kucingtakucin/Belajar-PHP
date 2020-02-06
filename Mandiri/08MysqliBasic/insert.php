<?php
//menyambungkan database
$link = mysqli_connect('localhost', 'root', 'root', 'sekolah');

//menguji error
if( !$link ){
  die('ada error ' . mysqli_connect_error());
}

$query = "INSERT INTO murid (nama, umur, alamat)
          VALUES ('andis', 25, 'utara'); ";

$query .= "INSERT INTO murid (nama, umur, alamat)
          VALUES ('mas', 21, 'selatan') ";

if(mysqli_multi_query($link, $query) ){
  echo 'berhasil!';
}

//menutup koneksi
mysqli_close($link);
?>
