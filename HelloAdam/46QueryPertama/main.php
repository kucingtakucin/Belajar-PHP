<?php
$link = mysqli_connect('localhost','root','panembahansenopati123kecilsemuatanpaspasi','classicmodels');
if (!$link) {
    die('ada error' . mysqli_connect_error());
}
$query = 'create database helloadam';
if (mysqli_query($link, $query)) {
    echo 'Database berhasil dibuat!';
} else {
    echo 'Gagal!';
}

mysqli_close($link);