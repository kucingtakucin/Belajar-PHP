<?php
$link = mysqli_connect('localhost', 'root', 'panembahansenopati123kecilsemuatanpaspasi', 'helloadam');
if (!$link) {
    die('ada error '.mysqli_connect_error());
}
//$query = 'create database helloadam';
//if (mysqli_query($link,$query)) {
//    echo 'Database berhasil dibuat <br>';
//}

$query = 'select * from product';
$hasil = mysqli_query($link, $query);
if (mysqli_num_rows($link) !== 0) {
    while ($data = mysqli_fetch_assoc($hasil)) {
        echo $data['productCode'] . ' - ' . $data['productName'] . ' - ' . $data['productLine'].'<br>';
    }
}

//$query = "create table 'helloadam'.'Mahasiswa' ('ID' INT NOT NULL AUTO_INCREMENT , `nama` VARCHAR NOT NULL , `nim` VARCHAR NOT NULL , `jurusan` VARCHAR NOT NULL, PRIMARY KEY ('ID')); ";
$query .= "insert into Mahasiswa (nama, nim, jurusan) values ('adam','M3119000','Teknik Informatika'); ";
$query .= "insert into Mahasiswa (nama, nim, jurusan) values ('arthur','M3119001','Teknik Informatika')";
if (mysqli_multi_query($link, $query)) {
    echo 'Berhasil!';
} else {
    echo 'Ada error ' . mysqli_error($link);
}

mysqli_close($link);