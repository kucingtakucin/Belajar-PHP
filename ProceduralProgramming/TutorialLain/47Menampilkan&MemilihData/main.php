<?php
$link = mysqli_connect('localhost', 'root', 'panembahansenopati123kecilsemuatanpaspasi', 'classicmodels');
if (!$link) {
    die('ada error' . mysqli_connect_error());
}
$query = 'create database helloadam';
if (mysqli_query($link, $query)) {
    echo 'database berhasil dibuat<br>';
} else {
    echo 'gagal!<br>';
}
$query = 'drop database helloadam';
if (mysqli_query($link, $query)) {
    echo 'database berhasil dihapus<br>';
} else {
    echo 'gagal!<br>';
}
$query = 'select * from customers';
$data = mysqli_query($link, $query);
if (mysqli_num_rows($data) !== null) {
    $i = 1;
    while ($hasil = mysqli_fetch_assoc($data)) {
        echo $i++.'. '.$hasil['customerName'].' - '. $hasil['contactLastName'] .'<br>';
    }
}
