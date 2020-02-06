<?php
//menyambungkan database
$link = mysqli_connect('localhost', 'root', 'root', 'sekolah');

//menguji error
if( !$link ){
  die('ada error ' . mysqli_connect_error());
}

//menghapus data
//$query = "DELETE FROM murid WHERE id BETWEEN 4 AND 6";

//mengedit data
$query = "UPDATE murid SET nama='mastang', umur=22  WHERE id=7";


if(mysqli_query($link, $query) ){
  echo 'berhasil!';
}

//menutup koneksi
mysqli_close($link);
?>
