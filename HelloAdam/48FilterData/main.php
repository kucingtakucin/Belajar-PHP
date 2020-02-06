<?php
$link = mysqli_connect('localhost', 'root', 'panembahansenopati123kecilsemuatanpaspasi','classicmodels');
if (!$link) {
    die('ada error '.mysqli_connect_error());
}

$query = 'create database helloadam';
if (mysqli_query($link, $query)) {
    echo 'Database berhasil dibuat <br>';
} else {
    echo 'Gagal!';

}
$query = 'drop database helloadam';
if (mysqli_query($link, $query)) {
    echo 'Database berhasil dihapus <br>';
} else {
    echo 'Gagal!';
}

$query = "select * from products where productLine='Classic Cars'";
$hasil = mysqli_query($link, $query);
if (mysqli_num_rows($hasil) !== null) {
    while ($data = mysqli_fetch_assoc($hasil)) {
        echo $data['productCode']. '. '.$data['productName'].' - '.$data['productLine'].'<br>';
    }
}

mysqli_close($link);